<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Publicacao extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'pub_id',
        'pub_titulo',
        'pub_texto',
        'pub_img',
        'pub_tip_id',
    ];
}
