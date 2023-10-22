<?php

namespace Tests\Feature;

use App\Models\Publicacao;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Database\Seeders\DatabaseSeeder; 
use Tests\TestCase;
use App\Models\User;

class PublicacaoTest extends TestCase
{
    use RefreshDatabase;

    public function test_cadastro_de_noticia()
    {
        $user = User::factory()->create(['is_admin' => true]);
        $this->actingAs($user);
        $this->seed(DatabaseSeeder::class); 
    
        $imagePath = public_path('imagens/neof_logo.png');
    
        $tempImagePath = tempnam(sys_get_temp_dir(), 'test_image');
        copy($imagePath, $tempImagePath);
    
        $file = new UploadedFile($tempImagePath, 'imagem.png', null, null, true);
        $tipo = 'noticia';
        $noticia = [
            'titulo' => 'Noticia',
            'texto' => 'teste de noticia',
            'image' => $file,
            'tipo' => $tipo
        ];
    
        $response = $this->post('/publicar', $noticia);
    
        $response->assertRedirect('/publicar'); 
    
        $this->assertDatabaseHas('publicacaos', [
            'pub_titulo' => 'Noticia',
            'pub_texto' => 'teste de noticia',
            'pub_tip_id' => 1, 
        ]);
    
        $this->assertAuthenticated(); 
    }
    public function test_cadastrar_conteudo()
    {
        $user = User::factory()->create(['is_admin' => true]);
        $this->actingAs($user);
        $this->seed(DatabaseSeeder::class); 
    
        $imagePath = public_path('imagens/neof_logo.png');
    
        $tempImagePath = tempnam(sys_get_temp_dir(), 'test_image');
        copy($imagePath, $tempImagePath);
    
        $file = new UploadedFile($tempImagePath, 'imagem.png', null, null, true);
        $tipo = 'conteudo';
        $noticia = [
            'titulo' => 'Conteudo',
            'texto' => 'teste de Conteudo',
            'image' => $file,
            'tipo' => $tipo
        ];
    
        $response = $this->post('/publicar', $noticia);
    
        $response->assertRedirect('/publicar'); 
    
        $this->assertDatabaseHas('publicacaos', [
            'pub_titulo' => 'Conteudo',
            'pub_texto' => 'teste de Conteudo',
            'pub_tip_id' => 2, 
        ]);

        $this->assertAuthenticated(); 
    }
    public function test_editar_noticia()
    {
        $user = User::factory()->create(['is_admin' => true]);
        $this->actingAs($user);
        $this->seed(DatabaseSeeder::class); 
    
        $imagePath = public_path('imagens/neof_logo.png');
    
        $tempImagePath = tempnam(sys_get_temp_dir(), 'test_image');
        copy($imagePath, $tempImagePath);
    
        $file = new UploadedFile($tempImagePath, 'imagem.png', null, null, true);
        $tipo = 'noticia';
        $noticia = [
            'titulo' => 'Criando noticia',
            'texto' => 'teste de noticia',
            'image' => $file,
            'tipo' => $tipo
        ];
        
    
        $response = $this->post('/publicar', $noticia);
    
        $response->assertRedirect('/publicar'); 
        
        $id = DB::table('publicacaos')
        ->where([
            'pub_titulo' => 'Criando noticia',
            'pub_texto' => 'teste de noticia',
            'pub_tip_id' => 1,
        ])
        ->value('pub_id');

        $this->assertDatabaseHas('publicacaos', [
            'pub_titulo' => 'Criando noticia',
            'pub_texto' => 'teste de noticia',
            'pub_tip_id' => 1, 
        ]);

        $response = $this->get('/publicacao/' . $id . '/edit');

        $updateConteudo = [
            'titulo' => 'Nova noticia',
            'texto' => 'testando noticia',
        ];
    
        $response = $this->put('/publicacao/' . $id . '/update', $updateConteudo);
    


    }
    public function test_editar_conteudo()
    {
        $user = User::factory()->create(['is_admin' => true]);
        $this->actingAs($user);
        $this->seed(DatabaseSeeder::class); 
    
        $imagePath = public_path('imagens/neof_logo.png');
    
        $tempImagePath = tempnam(sys_get_temp_dir(), 'test_image');
        copy($imagePath, $tempImagePath);
    
        $file = new UploadedFile($tempImagePath, 'imagem.png', null, null, true);
        $tipo = 'conteudo';
        $noticia = [
            'titulo' => 'Criando Conteudo',
            'texto' => 'teste de Conteudo',
            'image' => $file,
            'tipo' => $tipo
        ];
    
        $response = $this->post('/publicar', $noticia);
    
        $response->assertRedirect('/publicar'); 
        
        $id = DB::table('publicacaos')
        ->where([
            'pub_titulo' => 'Criando Conteudo',
            'pub_texto' => 'teste de Conteudo',
            'pub_tip_id' => 2,
        ])
        ->value('pub_id');

        $this->assertDatabaseHas('publicacaos', [
            'pub_titulo' => 'Criando Conteudo',
            'pub_texto' => 'teste de Conteudo',
            'pub_tip_id' => 2, 
        ]);

        $response = $this->get('/publicacao/' . $id . '/edit');

        $updateConteudo = [
            'titulo' => 'Novo Conteudo',
            'texto' => 'testando Texto',
        ];
    
        $response = $this->put('/publicacao/' . $id . '/update', $updateConteudo);


    }
    
}
