<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Account;
use App\Models\Transaction;

class ApiTest extends TestCase
{
    // Test JWT
    public function testApiLogin()
    {
        $response = $this->postJson('/api/login', [
            'email' => 'api@test.dk',
            'password' => 'password'
        ]);
        $response->assertStatus(200)
            ->assertJsonStructure(['access_token', 'token_type', 'expires_in']);
    }

    // Helper for API calls
    public function testSignInApi()
    {
        $response = $this->postJson('/api/login', [
              'email' => 'api@test.dk',
              'password' => 'password'
        ]);

        $response->assertStatus(200);
        $responseData = json_decode($response->getContent(), true);
        $this->assertTrue(isset($responseData['access_token']));

        return $responseData['access_token'];
    }

    public function testAccountCreate(){
        $token = $this->testSignInApi();
        //Account::truncate();
        Account::where('name', '=', 'test account')->delete();
        $response = $this->postJson('/api/v1/accounts', ['name' => 'test account'],
           [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
           ]
        );
        $response->assertStatus(201);
    }

    public function testTransactionCreate(){
        $token = $this->testSignInApi();
        //Transaction::truncate();
        Transaction::where('description', '=', 'test description')->delete();
        $account = Account::where('name', '=', 'test account')->first();
        $response = $this->postJson('/api/v1/transactions', ['account_id' => $account->id, 'description' => 'test description', 'amount' => 123.50],
           [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
           ]
        );
        $response->assertStatus(201);
    }


}
