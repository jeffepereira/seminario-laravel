<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (auth()->attempt(['email' => $email, 'password' => $password])) {
            return redirect(route('home'));
        }
        return back()->with('error', 'Dados inválidos');
    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('login'));
    }

    // auth()->check() - Verifica se o usuário esta logado

    // auth()->user() - Pegar o usuário logado
}
