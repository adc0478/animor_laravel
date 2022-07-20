@extends('plantilla')
@section('titulo','home')
@section ('contenido')
   <div class="home">
      <h1>Welcome</h1>
      <p>
         Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
      </p>
   </div>

   <!--Services -->
   <div class="services" id="services">
      <h1>Mis servicios</h1>
      <p>
         Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.
      </p>
      <div class="slice">
         <div class="targeta" onmouseout="quitar('.id1')" onmouseover="agregar('.id1')">
             <div class="img img1"><span class="id1">Diseño<span></div>
         </div>
         <div class="targeta" onmouseout="quitar('.id2')" onmouseover="agregar('.id2')">
             <div class="img img2"><span class="id2">Creacion contenido<span></div>
         </div>
         <div class="targeta" onmouseout="quitar('.id3')" onmouseover="agregar('.id3')">
             <div class="img img3"><span class="id3">Desarrollo web<span></div>
         </div>
      </div>

   </div>
   <div class="linea"></div>
  <div class="ultimos_post"> 
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
