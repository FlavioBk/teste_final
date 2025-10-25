<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacao;
use App\Models\Empresa;

class PublicacaoController extends Controller
{
   
    public function index()
    {
        $publicacoes = Publicacao::all();
        return view('home', compact('publicacoes'));
    }
}