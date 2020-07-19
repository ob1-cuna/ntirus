<?php


namespace App\Http\Controllers\CCliente;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ClienteDefinicoesController extends Controller
{
    public function definicoesConta ()
    {
          return view('cliente.definicoes_da_conta_cliente');
    }
}