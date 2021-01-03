<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['account_id', 'description', 'amount'];
    protected $table = "transactions";

    public function account() {
        return $this->belongsTo(Account::class);
    }
}
