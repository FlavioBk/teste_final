<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Publicacao;

class HomeController extends Controller
{
    
    public function index(Request $request)
{
    if (Auth::user()) {
        return redirect('/dashboard');
    }
      $publicacoes = Publicacao::all();
    return view('home',compact('publicacoes'));
}


    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}

