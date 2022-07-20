<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\correoMial;
class contactoController extends Controller
{
    public function formularioContacto(){
      return view('contacto');
    } 
    public function envioMail(request $datos_formulario){
        $datos_formulario->validate([
            'nombre' =>'required',
            'mail' =>'required|email',
            'mensaje' =>'required'
        ]);  
      $correo = new correoMial($datos_formulario);     
      Mail::to($datos_formulario->mail)->send($correo);
      return redirect()->route('home');
    }
}
