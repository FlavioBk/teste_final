<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class LoginController extends Controller
{

  public function login(Request $request)
{
    $credentials = $request->only('nome', 'senha');

    $user = Usuario::where('nome', $credentials['nome'])->first();

    if ($user && Hash::check($credentials['senha'], $user->senha)) {
        Auth::login($user);
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors(['nome' => 'Credenciais inválidas.'])->withInput();
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}