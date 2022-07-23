<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
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
    public function filtrar_post($fechaI = "1900-01-01 00:01",$fechaF = "",$categoria = 1){
        $igualdad = "=";
        if ($fechaF == ""){$fechaF = date('Y-m-d H:i:s');}
        if ($categoria == 0){$igualdad='<>';}
        $datos = posts::latest()
            ->where ('posts.categoria_id',$igualdad, $categoria)
            ->where ('posts.created_at', '>', $fechaI)
            ->where ('posts.created_at', '<', $fechaF)
            ->join('images','images.post_id','=','posts.id')
            ->join('categorias','categorias.id','=','posts.categoria_id')
            ->select('posts.*','categorias.detalle','images.directory')
            ->get(); 
        return $datos;
    }
    public function filtrar_postAll(){
        $datos = posts::latest()
            ->join('images','images.post_id','=','posts.id')
            ->join('categorias','categorias.id','=','posts.categoria_id')
            ->select('posts.*','categorias.detalle','images.directory')
            ->get();
        return $datos;
    }
}
