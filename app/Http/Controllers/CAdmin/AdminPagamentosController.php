<?php


namespace App\Http\Controllers\CAdmin;


use App\MetodosDePagamento;
use App\Transacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPagamentosController
{
    public function invoicesPendentes ()
    {
        $transacoes = Transacao::whereIn('estado', ['Por Confirmar', 'Pendente'])->get();
        return view( 'admin.gerir_pagamentos_pendentes', compact('transacoes'));
    }

    public function invoicesPagos ()
    {
        $transacoes = Transacao::where('estado', 'Concluido')->get();
        return view( 'admin.gerir_pagamentos_pagos', compact('transacoes'));
    }




    public function show (Transacao $transacao)
    {
        return view( 'admin.gerir_pagamentos_show', compact('transacao'));
    }

    public function confirmarPagamento (Transacao $transacao)
    {
        $confirmarTransacao = DB::table('transacaos')
            ->where('id', $transacao->id)
            ->update(['estado' => 'Concluido',
                'data_de_pagamento' => now(\DateTimeZone::AMERICA),]);
        return redirect()->back();
    }

    public function efectuarPagamentoStore (Request $request)
    {
        $request->validate([
            'codigo_confirmacao' => ['required'],
        ]);

        $transacao_id =  $request->get('transacao_id');

        $meu_pagamento = DB::table('transacaos')
            ->where('id', $transacao_id)
            ->update
            ([
                'titular' => 'NTIRUS',
                'codigover' => $request->get('codigo_confirmacao'),
                'estado' => 2
            ]);
        return redirect()->route('admin.dashboard.transacoes.pagar.index-2', ['transacao' => $transacao_id]);
    }

    public function efectuarPagamentoIndex (Transacao $transacao)
    {
        $metodos = MetodosDePagamento::all();
        return view( 'admin.factura_pay', compact(['transacao', 'metodos']));
    }
}