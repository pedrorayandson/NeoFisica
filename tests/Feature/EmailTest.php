<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class EmailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Email()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $email = [
            'name' => 'Pedro Ranailson',
            'mensagem' => '',
        ];

        $response = $this->post('/email', $email);

        $this->assertAuthenticated(); 

    }
}
