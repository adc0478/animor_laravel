@extends('plantilla')
@section('titulo','registro de usuario')
@section('contenido')
  <h2>Registrar nuevo usuario</h2>
<form action="{{route('registro_login')}}" method="post" accept-charset="utf-8">
  @csrf
  <label for=""><input type="text" name="name" placeholder="Nombre"></label>
  <label for=""><input type="email" name="user" placeholder="Email"></label>
  <label for=""><input type="password" name="password" placeholder="Password"></label>
  <label for=""><input type="password" name="repassword" placeholder="Repetir password"></label>
  <input  class="btn_submit" type="submit" value="Registrar" />
</form>
@endsection
