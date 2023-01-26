<?php

namespace App\Http\Controllers;

use App\Mail\SupportMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
       return view('home');
    }

    public function indexEmail(){
        return view('email');
    }

    public function postEmail(Request $request){ 
     
        $request->validate([
        'name' => 'required',
        'mensagem' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'mensagem' => $request->mensagem,
            'user' => Auth::user(),
        ];
        
        Mail::to('p.rayandson@escolar.ifrn.edu.br')->send(new SupportMail($data));
        return view('home');
    }

    public function indexCadAdmin(Request $request)
    {
            return view('auth.registerAdmin');
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

    public function indexAdmin()
    {
        return view('adminHome');
    }
}
