<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\User; 

class UserTest extends TestCase
{
    use RefreshDatabase, DatabaseTransactions, WithFaker, WithoutMiddleware;

    public function testCadastroComEmailInvalido()
    {
        $response = $this->post('/email', [
            'name' => 'Nome do Usuário',
            'email' => 'email_invalido', // Um email inválido
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(422); // Verifica se o status HTTP 422 (Unprocessable Entity) foi retornado
        $response->assertJsonValidationErrors(['email']); // Verifica se há um erro de validação no campo de email
    }
}
