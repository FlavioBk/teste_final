<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validação apenas com nome e senha
        $credentials = $request->validate([
            'nome' => 'required|string',
            'senha' => 'required|string'
        ]);

        // Buscar usuário APENAS pelo nome
        $user = Usuario::where('nome', $credentials['nome'])->first();

        // Debug rápido - descomente para testar
        // dd($user, $request->all());

        // Verificar se usuário existe e senha está correta (texto puro)
        if ($user && $user->senha === $credentials['senha']) {
            // Fazer login
            Auth::login($user);
            
            // Redirecionar para dashboard
            return redirect()->intended('/dashboard');
        }

        // Se falhar, retornar com erro
        return back()->withErrors([
            'nome' => 'Nome de usuário ou senha incorretos.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}