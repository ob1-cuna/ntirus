<?php


namespace App\Http\Controllers\CCliente;

use App\Http\Controllers\Controller;
use App\Perfil;
use Auth;


class ClientePerfilController extends Controller
{

    protected function meuPerfil()
    {
        $perfil = Perfil::where('user_id', Auth::user()->id)->firstOrFail();
        return view('cliente.meu_perfil_cliente', compact(['perfil']));
    }



}
