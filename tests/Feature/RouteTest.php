<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Publicacao;
use App\Models\User;
use Tests\TestCase;

class RouteTest extends TestCase
{
    use RefreshDatabase;

    public function test_acesso_a_rota_inicial()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

     public function test_acesso_a_rota_home_admin()
     {
        $user = User::factory()->create(['is_admin' => true]);
        $this->actingAs($user);
         $response = $this->get('/admin/home');
         $response->assertStatus(200);
     }
 
    public function test_acesso_a_rota_publicar()
    {
        $user = User::factory()->create(['is_admin' => true]);
        $this->actingAs($user);

        $response = $this->get('/publicar');
        $response->assertStatus(200);
    }
    
    public function test_acesso_a_rota_listagem()
    {
       $user = User::factory()->create(['is_admin' => true]);
       $this->actingAs($user);
        $response = $this->get('/listagem');
        $response->assertStatus(200);
    }

    public function test_acesso_a_rota_noticias()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/noticias');
        $response->assertStatus(200);
    }

    public function test_acesso_a_rota_conteudos()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/conteudos');
        $response->assertStatus(200);
    }

    public function test_rota_de_email()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/email');
        $response->assertStatus(200);
    }

}
