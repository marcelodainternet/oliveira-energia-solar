<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class AuthController extends Controller
{
    public function login()
    {
        return view("admin.login");
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $request->validate([
            'usuario' => ['required'],
            'senha' => ['required']
        ]);

        $usuario = Usuario::where("usuario", $request->usuario)->first();

        if (!$usuario) return back()->withErrors(['usuario' => 'Usuário não encontrado.'])->onlyInput('usuario');

        if ($usuario->senha != md5($request->senha)) return back()->withErrors(['senha' => 'Senha incorreta.'])->onlyInput('usuario');

        Auth::login($usuario);
        $request->session()->regenerate();
        $usuario->update(['data_ultimo_acesso' => now()]);

        return redirect()->intended('/adm');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
