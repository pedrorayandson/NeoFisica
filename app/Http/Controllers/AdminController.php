<?php
namespace App\Http\Controllers;

use App\Models\Publicacao;
use App\Models\Tipo_das_pub;
use App\Models\User;
use App\Notifications\NewPubNotification;
use App\Notifications\UpdatedPubNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{//
    public function indexPublish(Request $request)
    {
        // if($request->session()->has('administradores')){
         return view('publicar');
    //     }else{
    //         echo "<script>alert('Você não tem permissão para acessar essa página')</script>";
    //      return view('welcome');
    //    }
    }
    public function storePublish(Request $request)
    {
        $titulo = $request->post('titulo');
        $texto = $request->post('texto');
        $tip = $request->post('tipo');
 
        if($request->hasFile('image') && $request->file('image')->isValid()){
            
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")). "." . $extension;

            $requestImage->move(public_path('/Imagens'), $imageName);

        }
        
        $tipos = DB::table('tipos_das_pubs')->where('tip_tipo', '=', $tip)->get('tip_id');
        $pubTipo = 0;
        foreach ($tipos as $tipo) {
            $pubTipo += $tipo->tip_id;
        }

        $publicacao = Publicacao::create([
            'pub_titulo' => $titulo,
            'pub_texto' => $texto,
            'pub_img' => $imageName, 
            'pub_tip_id' => $pubTipo,
        ]);

        $file = fopen(resource_path("views/paginas/" . str_replace(" ", "_", $titulo).".blade.php"), 'w');

        $text_html = "<?php App\Models\View::insertView($"."pubs->pub_titulo) ?>"; 
        $text_html .= "<html style='background-color:rgba(8, 8, 86, 0.855);'><head><title>{{"."$"."pubs->pub_titulo}}</title><link href= '/css/css.css'></head><body><h1 style='position:absolute; top:20%; left:10%;'>{{"."$"."pubs->pub_titulo}}</h1><br>";
        $text_html .= "<img style='position: absolute; left: 44.5%; top: -23.5%; width: 6.5%; border-radius: 80%; margin-top: 12%;' src='/Imagens/planeta.jpg'></img><img style='position: absolute; top: 30%; left:10%;width: 200px;' class='imagen_not' src='/Imagens/{{"."$"."pubs->pub_img}}'><br><p style='position: absolute; right: 5%; top: 30%; width: 45%;' class = 'texto'>{{"."$"."pubs->pub_texto}}</p>";
        $text_html .= "</body></html>";
        fwrite($file, $text_html);
        echo "<script>alert('$tip foi cadastrado com sucesso')</script>";
        fclose($file);

        Auth::user()->notify(new NewPubNotification($publicacao));

        return redirect("/publicar");
    }

    public function indexCadAdmin(Request $request)
    {
        // if ($request->session()->has('administradors')) {
            return view('auth.registerAdmin');
        // }else{
        //     echo "<script>alert('Você não tem permissão para acessar essa página')</script>";
        //     return view('welcome');
        // }
    }
    public function listagem()
    { 
        $views = DB::table("views")->join("users", "users.id", "=", "views.views_us_id")->join("publicacaos", "views.views_pub_id", "=", "publicacaos.pub_id")->get();
        $users = User::all();
        $pubs = DB::table("publicacaos")->join("tipos_das_pubs", "tipos_das_pubs.tip_id", "=", "pub_tip_id")->get();
        return view("listagem", [
            'views' => $views,
            'users' => $users,
            'pubs' =>$pubs,
        ]);
    }
    public function edit($id)
    {
        $pubs = Publicacao::where('pub_id', $id)->first();

        if(!empty($pubs)){

            return view('editar', [
                'pubs' => $pubs,
            ]);

        }else{
            return redirect('/listagem');
        }
    }

    public function update(Request $request, $id){
        $data = null;
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")). "." . $extension;

            $requestImage->move(public_path('/Imagens'), $imageName);

            $img = Publicacao::where('pub_id', $id)->first();

            Storage::delete(public_path('/Imagens/'.$img->pub_img));

            $data = [
                'pub_titulo' => $request->titulo,
                'pub_texto' => $request->texto,
                'pub_img' => $imageName,
            ];

        }else{
            $data = [
                'pub_titulo' => $request->titulo,
                'pub_texto' => $request->texto,
            ];
        }
        $p = Publicacao::where('pub_id', $id)->first();
        $oldTit = str_replace(" ", "_", $p->pub_titulo);
        $newTit = str_replace(" ", "_", $request->titulo);
        rename(resource_path("views/paginas/$oldTit.blade.php"), resource_path("views/paginas/$newTit.blade.php"));
        Publicacao::where('pub_id', $id)->update($data);
        
        $publicacao = new Publicacao;
        $publicacao->pub_titulo = $request->titulo;
        
        Auth::user()->notify (new UpdatedPubNotification($publicacao));

        return redirect('/listagem');
    }
}