@extends('plantilla')
@section('titulo','Blog')
@section('contenido')
  <form action="" method="post" accept-charset="utf-8">
    @csrf
    <select name="categoria" id="categoria">
      <option value="0">All</option>
      @foreach ($cat as $valor)
        <option value="{{$valor->id}}">{{$valor->detalle}}</option>
      @endforeach
    </select> 
    <label for="">Fecha inicial<input name="fechaI" type="date"></label><br>
    <label for="">Fecha final<input name="fechaF" type="date"></label><br>
    <input class="btn_submit" type="submit" value="Buscar" />
  </form>
  <h2>post</h2>
  <div class="contenido_blog">
    @foreach ($datos as $salida)
      <x-targeta_post>
        <x-slot:id>{{$salida->id}}</x-slot>
        <x-slot:img>{{$salida->directory}}</x-slot>
        <x-slot:categoria>{{$salida->detalle}}</x-slot>
        <x-slot:titulo>{{$salida->titulo}}</x-slot>
      </x-targeta_post>
    @endforeach
  </div>
@endsection
