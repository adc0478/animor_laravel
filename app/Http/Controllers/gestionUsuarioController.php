<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class gestionUsuarioController extends Controller
{
    public function ver_formulario(){
        return view ('login');
    }
    public function ingresar(request $request){
        $request->validate([
            'user'=>'required|email',
            'password'=>'required'
        ]); 
        if (Auth::attempt(['email'=>$request->user,'password'=>$request->password],true)) {
            return redirect()->route('home')->with('registro exitoso');
        }
        return redirect()->route('login');
    }
    public function ver_formularioRegistro(){
        return view('registro');
    }
    public function registrar_log(request $request){

        $request->validate([
            'name'=>'required',
            'user'=>'required|email',
            'password'=>'required'
        ]); 
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->user,
            'password'=>Hash::make($request->password),
        ]);              
        return redirect()->route('login');
    }
    public function logout(request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
