<?php

namespace App\Http\Controllers;

use App\Models\bodys;
use App\Models\images;
use App\Models\posts;
use App\Models\User;
use App\Models\categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\comentarios;

class postController extends Controller
{
    public function formularioPost(){
        $categorias = categorias::all();
        return view('formularioPost',['categoria' => $categorias]); 
    }
    public function registrarPost(request $request){
        $type = $_FILES['file_up']['type'];
        $request->validate([
           'file_up'=>'required|mimes:jpg,jpeg,png',
           'titulo' =>'required',
           'body' =>'required',
           'categoria' =>'required'
        ]);
                move_uploaded_file($_FILES['file_up']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/animor/resources/img/'.$_FILES['file_up']['name']);
                //registrar en BD post
                $post = new posts();
                $post->titulo = $request->titulo;
                $post->user_id = Auth::id();
                $post->categoria_id = $request->categoria;
                $post->save();
                //registrar imagen
                $this->registrar_img($_FILES['file_up']['name'],'post',$post->id);
                //registrar en body
               $this->registrar_body($request->body,$post->id); 
                return redirect()->route('post.formulario');
     
    } 
    public function registrar_img($File_img, $model,$id_ref){
    //registrar en BD image
                $img = new images();
                $img->directory = $File_img;//$_FILES['file_up']['name'];
                $img->model = $model;
                $img->post_id = $id_ref;
                $img->save();
    }
    public function registrar_body($texto,$id_ref){
                $body = new bodys();
                $body->body = $texto;
                $body->post_id = $id_ref;
                $body->save();
    }
    public function ver_post($id){
        //aqui viene el id como variable por url
        //consultar post/imagen/body
        $post = posts::obtener_post($id);
        //consultar comentarios
        $comentarios =comentarios::obtener_comentarios($id);
      return view('vista_post',['post' => $post,'comentario' => $comentarios]);    
    }
    public function registrarComentario(request $request, $id){
        $request->validate([
            'email' =>'required|email',
            'comentario' =>'required'
        ]);
        $salida = new comentarios();
        $salida->email = $request->email;
        $salida->comentarios = $request->comentario;
        $salida->fecha = date("d-m-y h:i");
        $salida->post_id = $id;
        $salida->save();
        return redirect()->route('post.ver',$id);
    } 
    public function ver_blog(){
        //traer las categorias
        $datos = new posts();
        $categoria = new categorias();
        return view('blog',['datos'=>$datos->filtrar_postAll(),'cat'=>$categoria->all()]);
    } 
    public function ver_blogPost(request $request){
        $request->validate([
            'fechaI'=>'required',
            'fechaF' =>'required'
        ]);
        $datos = new posts();
        $fechaI = $request->fechaI;
        $fechaF = $request->fechaF;
        $categoria = $request->categoria;
        $opt_categoria = new categorias();
        return view('blog',['datos'=>$datos->filtrar_post($fechaI,$fechaF,$categoria),'cat'=>$opt_categoria->all()]);
    }

}
