@extends('plantilla')
@section ('titulo','login')
@section('contenido')
  @auth
    <h2>registrado</h2>
  @else
    <h2>Login</h2>
  @endauth
  <form action="{{route('ingreso_login')}}" method="post" accept-charset="utf-8">
   @csrf
   <label for=""><input type="email" name="user" placeholder="Nombre de usuario"></label>
   <label for=""><input type="password" name="password" placeholder="Password"></label>
   <input class="btn_submit" type="submit" value="Ingresar" />
  </form>
@endsection
