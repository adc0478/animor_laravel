@extends('plantilla')
@section ('titulo','Mi post')
@section ('contenido')
   <div class="container">
      <h1 class="titulo">{{$post[0]->titulo}} <span>{{$post[0]->detalle}}</span></h1>
      <img src="{{asset('../resources/img/').'/'.$post[0]->directory}}" alt="{{$post[0]->titulo}}"/>
      <div class="body">{!!$post[0]->body!!}</div>
   </div>
   <div class="linea"></div>
      <h2 class="comentarios">Comentarios</h2>
   @foreach ($comentario as $datos)
      <div class="dato">
         <span class="info">{{$datos->email}}</span>
         <span class="info">{{$datos->fecha}}</span>
         <p>{{$datos->comentarios}}</p>
      </div>
   @endforeach
   <h2>Ingresa tus comentarios</h2>
   <form action="{{route('post.comentario',$post[0]->id)}}" method="post" accept-charset="utf-8">
      @csrf
      <label><input type="email" name="email" value="" id="" value="" placeholder="Email"></label>
      <label class="textArea"><textarea class="textArea" name="comentario" id="" placeholder="Comentario"></textarea></label>
      <input class="btn_submit" type="submit" value="enviar"/>
      @error('email')
         <span>{{$message}}</span>
      @enderror
      @error('comentario')
         <span>{{$message}}</span>
      @enderror
   </form>
@endsection
