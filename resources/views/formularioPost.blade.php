@extends('plantilla')
@section('titulo','Cargar post')
@section('contenido')
  <h2>Crear nuevo post</h2>
   <form action="{{route('post.registrar')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    @csrf
    <label for=""><input type="text" name="titulo" placeholder="Agregar titulo"></label>
    <label for=""><input type="file" name="file_up"></label>
    <label for="" class='textArea textArea_Post'><textarea class="textArea" id="summary-ckeditor" name="body" cols="50" rows="10" placeholder="agregar contenido"></textarea></label>
    <label for="">Categorias<select id="" name="categoria">
      @foreach ($categoria as $dato)
       <option value="{{$dato->id}}">{{$dato->detalle}}</option>
      @endforeach
    </select></label>
    <input class="btn_submit" type="submit" value="Subir post" />
    @error ('file_up')
      {{$message}}
    @enderror
   </form>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
</script>
@endsection
