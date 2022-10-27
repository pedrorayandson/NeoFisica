<?php

namespace App\Http\Controllers;

use App\Models\Publicacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
       $noticias = DB::table('publicacaos')->join('tipos_das_pubs', 'tipos_das_pubs.tip_id', '=', 'publicacaos.pub_tip_id')->where('tip_tipo', '=', 'noticia')->limit(3)->get();
       return view('welcome', [
        'noticias' => $noticias,
       ]);
    }

    public function indexNews(){
        $nots = DB::table("publicacaos")->join("tipos_das_pubs", "tipos_das_pubs.tip_id", "=", "publicacaos.pub_tip_id")->where("tip_tipo", "=", "noticia")->latest('publicacaos.created_at')->get();
        return view('noticias', [
            'nots' => $nots,
        ]);
    }
    public function indexCont()
    {
        $conts = DB::table("publicacaos")->join("tipos_das_pubs", "tipos_das_pubs.tip_id", "=", "publicacaos.pub_tip_id")->where("tip_tipo", "=", "conteudo")->latest('publicacaos.created_at')->get();

        return view('conteudos', [
            'conts' => $conts,
        ]);
    }

    public function redirectPage($titulo)
    {
        $pubs = Publicacao::where('pub_titulo', str_replace("_", " ", $titulo))->first();
 
        return view('paginas.'.$titulo, [
            'pubs' => $pubs,
        ]);
    }
}
