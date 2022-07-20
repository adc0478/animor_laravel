<?php

namespace App\Http\Controllers;

use App\Models\posts;

class home
{
    public function __invoke(){
      $post = new posts();
      $datos=$post->ultimos_post(5);
      return view('home',['datos'=>$datos]);        
    }
}
