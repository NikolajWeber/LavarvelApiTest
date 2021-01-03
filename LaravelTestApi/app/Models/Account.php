<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'email', 'phone'];
    protected $table = "accounts";

    protected $appends = ['sum_balance'];

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }

    public function getSumBalanceAttribute() {
        $total = $this->transactions()->sum('amount');
        return round((float)$total, 2);
    }
}
