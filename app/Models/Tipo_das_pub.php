<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_das_pub extends Model
{
    use HasFactory;

    protected $fillable = [
        'tip_id',
        'tip_tipo',
    ];
}
