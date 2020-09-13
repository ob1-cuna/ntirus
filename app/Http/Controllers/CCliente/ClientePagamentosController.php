<?php


namespace App\Http\Controllers\CCliente;


use App\Http\Controllers\Controller;
use App\MetodosDePagamento;
use App\Trabalho;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Transacao;

class ClientePagamentosController extends Controller
{
    public function invoicesPagos ()
    {
        $transacoes = Transacao::where([['user_id', Auth::user()->id], ['estado', 'Concluido']])->get();
        return view('cliente.invoices_pagos', compact('transacoes'));
    }

    public function invoicesPendentes ()
    {
        $transacoes = Transacao::where
            ('user_id', Auth::user()->id)
            ->whereIn('estado', ['Pendente', 'Por Confirmar'])
            ->get();
        return view('cliente.invoices_pendentes', compact('transacoes'));
    }

    public function show (Transacao $transacao)
    {
        return view( 'cliente.gerir_pagamentos_show', compact('transacao'));
    }

    public function efectuarPagamento (Transacao $transacao)
    {
        $metodos = MetodosDePagamento::all();
        return view( 'cliente.factura_pay', compact(['transacao', 'metodos']));
    }

    public function efectuarPagamentoStore (Request $request)
    {
        $request->validate([
            'metodo_id' => ['required'],
            'codigo_confirmacao' => ['required'],
            'titular' => ['required'],
        ]);

        $transacao_id =  $request->get('transacao_id');

        $meu_pagamento = DB::table('transacaos')
            ->where('id', $transacao_id)
            ->update
            ([
                'metodo_id' => $request->get('metodo_id'),
                'titular' => $request->get('titular'),
                'codigover' => $request->get('codigo_confirmacao'),
                'estado' => 3
            ]);
        return redirect()->route('cliente.invoices.pay-2', ['transacao' => $transacao_id]);
    }
}