@extends('plantilla')
@section ('titulo','contacto')
@section ('contenido')
  <h2>Contactanos</h2>
  <form action="" class="formulario" method="post" accept-charset="utf-8">
    @csrf
    <label>
      Nombre y apellido
      <input type="text" value="" name="nombre" id=""/>
      @error('nombre')
       <span>{{$message}}</span>
      @enderror
    </label>
    <label>
      Mail contacto
      <input type="email" value="" name="mail" id=""/>
      @error('mail')
       <span>{{$message}}</span>
      @enderror
    </label>
    <label class="textArea">
      Mensaje
      <textarea class="textArea" name="mensaje" id=""></textarea>
      
      @error('mensaje')
       <span>{{$message}}</span>
      @enderror
    </label>
    <input class="btn_submit" type="submit" value="Enviar mensaje"/>
  </form> 
@endsection
