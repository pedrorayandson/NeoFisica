<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Models\User;

class CadastroUsuarioTest extends TestCase
{
    use RefreshDatabase;

   
    public function test_cadastro_de_usuario()
    {
        $user = [
            'name' => 'Neo Fisica',
            'email' => 'neo@fisica.com',
            'password' => 'Neofisica123',
            'password_confirmation' => 'Neofisica123',
        ];

        $response = $this->post('/register', $user);

        $response->assertRedirect('/home'); 

        $this->assertDatabaseHas('users', [
            'name' => 'Neo Fisica',
            'email' => 'neo@fisica.com',
        ]);

        $this->assertAuthenticated(); 
    }
    public function test_usuario_email_invalido()
    {
        $user = [
            'name' => 'Neo Fisica',
            'email' => 'neofisica.com', 
            'password' => 'Neofisica123',
            'password_confirmation' => 'Neofisica123',
        ];

        $response = $this->post('/register', $user);

        $response->assertRedirect();


        $this->assertGuest();
    }


    public function test_update_user()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $updateUser = [
            'name' => 'edit User',
            'email' => 'edituser@userr.com',
     
        ];
        $response = $this->put(route('update_user',
         ['id' => $user->id]), $updateUser);

        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'edit User',
            'email' => 'edituser@userr.com',
        ]); 
        
    }
    public function test_usuario_senha_invalida()
    {
        $user = [
            'name' => 'Neo Fisica',
            'email' => 'neo@fisica.com', 
            'password' => 'Neofisica123',
            'password_confirmation' => 'Neofisica13',
        ];

        $response = $this->post('/register', $user);

        $response->assertRedirect();


        $this->assertGuest(); 
    }

    
}



