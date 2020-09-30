<?php


namespace App\Http\Controllers\CCliente;


use App\Http\Controllers\Controller;
use App\MetodosDePagamento;
use App\Notifications\PagamentoCliente;
use App\Trabalho;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use PDF;

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

        $meu_pagamento = Transacao::where('id', $transacao_id)
            ->update
            ([
                'metodo_id' => $request->get('metodo_id'),
                'titular' => $request->get('titular'),
                'codigover' => $request->get('codigo_confirmacao'),
                'estado' => 3
            ]);

        $transacao = Transacao::where('id', $transacao_id)->firstOrFail();
        $admin = User::where('is_permission', 2)->firstOrFail();
        $detalhes = [
            'simples' => $transacao->user->name.' fez o pagamento do trabalho '.$transacao->trabalho->nome_trabalho. '.' ,
            'transacao_id' => $transacao_id
        ];

        Notification::send($admin, new PagamentoCliente($detalhes));

        return redirect()->route('cliente.invoices.pay-2', ['transacao' => $transacao_id]);
    }

    public function printPDF(Transacao $transacao)
    {

        $data = Transacao::find($transacao->id);
        $data = view()->share('dados', $data);

        $pdf = PDF::loadView('cliente.gerir_pagamentos_show_print', $data);
        return $pdf->download('factura-nr-000'.$data->id.'.pdf');
    }
}