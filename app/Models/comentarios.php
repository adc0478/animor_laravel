<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comentarios extends Model
{
    use HasFactory;
    static function obtener_comentarios($post_id){
        $datos = comentarios::latest()
            ->where('post_id', $post_id)
            ->get();
        return $datos;
    }
}
