<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Account;

class ApiTest extends TestCase
{
    public function testApiLogin()
    {
        $response = $this->postJson('/api/login', [
            'email' => 'api@test.dk',
            'password' => 'password'
        ]);
        $response->assertStatus(200)
            ->assertJsonStructure(['access_token', 'token_type', 'expires_in']);
    }
}
