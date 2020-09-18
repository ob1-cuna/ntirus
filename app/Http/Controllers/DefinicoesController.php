<?php

namespace App\Http\Controllers;

use App\Rules\VerificarEmail;
use Illuminate\Http\Request;
use App\Rules\VerificarSenha;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Controllers\Controller;

use App\Notifications\ActualizarEmailNotification;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class DefinicoesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'senha_actual' => ['required', new VerificarSenha],
            'nova_senha' => ['required','same:confirmacao_nova_senha'],
            'confirmacao_nova_senha' => ['required'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->nova_senha)]);

        return back()->with('success-update-password', 'Senha alterada com sucesso');
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'senha_actual' => ['required', new VerificarSenha],
            'email' => ['required','same:confirmacao_nova_senha'],
            'confirmacao_nova_senha' => ['required'],
        ]);

        User::find(auth()->user()->id)->update(['email'=> $request->nova_senha]);

        return back()->with('success-update-email', 'Email alterado com sucesso');
    }

    public function changeEmail(Request $request)
    {
        $request->validate([
            'email_actual' => ['required', new VerificarEmail],
            'email' => 'required|email|unique:users',
            'password_novo_email' => ['required', new VerificarSenha],
        ]);

        User::find(auth()->user()->id)->update(['email'=> $request->email]);
        return back()->with('success-update-email', 'O seu novo email é '.$request->email.'.');
    }

}
