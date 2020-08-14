<?php


namespace App\Http\Controllers\CAdmin;


use App\Transacao;

class AdminPagamentosController
{
    public function index ()
    {
        $transacoes = Transacao::all();
        return view( 'admin.gerir_pagamentos_list', compact('transacoes'));
    }

    public function show (Transacao $transacao)
    {
        return view( 'admin.gerir_pagamentos_show', compact('transacao'));
    }
}