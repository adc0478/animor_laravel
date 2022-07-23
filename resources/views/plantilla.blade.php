<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>Animor - @yield('titulo')</title>
        <link rel="stylesheet" href="{{asset('../resources/css/animor.css')}}" type="text/css" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="{{asset('../resources/css/menu.css')}}" type="text/css" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="{{asset('../resources/css/home.css')}}" type="text/css" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="{{asset('../resources/css/services.css')}}" type="text/css" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="{{asset('../resources/css/contacto.css')}}" type="text/css" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="{{asset('../resources/css/form_login.css')}}" type="text/css" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="{{asset('../resources/css/targetaPost.css')}}" type="text/css" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="{{asset('../resources/css/post.css')}}" type="text/css" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="{{asset('../resources/css/app.css')}}" type="text/css" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="{{asset('../resources/css/footer.css')}}" type="text/css" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="{{asset('../resources/css/blog.css')}}" type="text/css" media="screen" title="no title" charset="utf-8">
    </head>
    <body>
       <div class="contenido">
       <!--Menu navegacion -->
       <nav>
           <button class="btn" onclick="action_menu()" value="1">Menu</button>
           <ul class="full">
               <li><a href="{{route('home')}}" onclick="action_menu()">Home</a></li>
               <li><a href="{{route('home')}}#services" onclick="action_menu()">Services</a></li>
               <li><a href="" onclick="action_menu()">Client</a></li>
               <li><a href="" onclick="action_menu()">Our Staff</a></li>
               <li><a href="{{route('post.blog')}}" onclick="action_menu()">Blog</a></li>
               <li><a href="{{route('contacto.formulario')}}" >Contactanos</a></li>
               @guest
               <li><a href="{{route('login')}}">Login</a></li>
               @else
                 <li><a href="{{route('post.formulario')}}" onclick="action_menu()">Crear post</a></li>
                 <li><a href="{{route('cerrar_sesion')}}">logout</a></li>
                 <li><a href="{{route('registro')}}">Crear usuario</a></li>
               @endguest
           </ul>
       </nav> 
       @yield('contenido')
       </div>
       <x-footer>
           <x-slot:facebook>https://www.facebook.com/animordg</x-slot>
           <x-slot:twitter></x-slot>
           <x-slot:instagram>https://www.instagram.com/animor_dg/</x-slot>
           <x-slot:whatsapp></x-slot>
       </x-footer>
    </body>
    <script src="{{asset('../resources/js/general.js')}}"charset="utf-8"></script>
</html>
