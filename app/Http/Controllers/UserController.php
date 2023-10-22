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
    public function __construct() {
        $this->middleware('auth.check');
    }

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
        $this->authorize('createAdmin', Auth::user());

        return view('auth.registerAdmin');
    }
    public function show()
    {
        $this->authorize('viewAny', Auth::user());
        
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

    public function edit($id)
    {
        $user = User::find($id);

        $this->authorize("edit", $user);

        return view("editUser", [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('update', Auth::user());

        $user = User::find($id);
        if ($request->file('avatar') != null) {
        $extension = $request->file('avatar')->getClientOriginalExtension();
        $filename = 'avatar'.$user->id.'.'.$extension;
        $file = $request->file('avatar')->storeAs('avatars', $filename);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $file,
        ]);

        $user->avatar = $file;
        }else{
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }
        $user->save();

        if ($user->is_admin) {
            return view('adminHome');
        } else {
            return view('home');
        }
        
        
    }
}
