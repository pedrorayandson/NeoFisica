<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class View extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'views_us_id',
        'views_pub_id',
    ];
    
    static public function insertView($titulo)
    {
        if(Auth::check()){
        $pubs = DB::table('publicacaos')->where("pub_titulo", "=", $titulo)->get();

        $id = 0;
        foreach ($pubs as $pub) {
            $id += $pub->pub_id;
        }
         View::create([
            'views_us_id' => Auth::user()->id,
            'views_pub_id' => $id,
        ]);
        }
    }
}
