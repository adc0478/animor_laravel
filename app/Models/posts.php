<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\imagenes;
use App\Models\categorias;
class posts extends Model
{
    use HasFactory;
    static function obtener_post($id){
    $datos = posts::latest()
            ->where('posts.id', $id)
            ->join('images','images.post_id','=','posts.id')
            ->join('categorias','categorias.id','=','posts.categoria_id')
            ->join('bodys','bodys.post_id','=','posts.id')
            ->select('posts.*','categorias.detalle','images.directory','bodys.body')
            ->get();
        return $datos;
    
    }
    public function ultimos_post($total){
        $datos = posts::latest()
            ->take($total)
            ->join('images','images.post_id','=','posts.id')
            ->join('categorias','categorias.id','=','posts.categoria_id')
            ->select('posts.*','categorias.detalle','images.directory')
            ->get();
        return $datos;
    }
}
