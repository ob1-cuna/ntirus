<?php


namespace App\Http\Controllers\CCliente;


use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Transacao;

class ClientePagamentosController extends Controller
{
    public function invoicesPagos ()
    {
        $transacoes = Transacao::where('user_id', Auth::user()->id)->get();
        return view('cliente.invoices_pagos', compact('transacoes'));
    }
}