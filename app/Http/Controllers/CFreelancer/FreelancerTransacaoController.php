<?php

namespace App\Http\Controllers\CFreelancer;


use App\MetodosDePagamento;
use App\Notifications\PedidoDeSaque;
use App\Transacao;
use App\User;
use Auth;
use Illuminate\Support\Facades\Notification;
use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FreelancerTransacaoController extends Controller
{
    public function invoicesPagos ()
    {
        $transacoes = Transacao::where([['user_id', Auth::user()->id], ['estado', 'Concluido']])->get();

        $tako_feito = Transacao::where([['user_id', Auth::user()->id], ['tipo', 'p2f']])->sum('valor');
        $tako_retirado = Transacao::where([['user_id', Auth::user()->id], ['tipo', 'saque']])->sum('valor');

        return view('freelancer.invoices_pagos_freelancer', compact(['transacoes', 'tako_feito', 'tako_retirado']));
    }

    public function invoicesPendentes ()
    {
        $transacoes = Transacao::where('user_id', Auth::user()->id)
                                ->whereIn('estado', ['Pendente', 'Por Confirmar'])
                                ->get();

        $tako_feito = Transacao::where([['user_id', Auth::user()->id], ['tipo', 'p2f']])->sum('valor');
        $tako_retirado = Transacao::where([['user_id', Auth::user()->id], ['tipo', 'saque']])->sum('valor');

        return view('freelancer.invoices_pendentes_freelancer', compact(['transacoes', 'tako_feito', 'tako_retirado']));
    }

    public function invoiceShow (Transacao $transacao)
    {
        return view('freelancer.invoice_show_freelancer', compact('transacao'));
    }

    public function invoiceDownload (Transacao $transacao)
    {
        $data = Transacao::find($transacao->id);
        $data = view()->share('dados', $data);

        $pdf = PDF::loadView('freelancer.pdf-export.factura_unica_freelancer', $data);
        return $pdf->download('factura-nr-000'.$data->id.'.pdf');
    }

    public function saque ()
    {
        $metodos = MetodosDePagamento::all();
        return view( 'freelancer.saque', compact('metodos'));
    }

    public function saqueStore (Request $request)
        {
            $tako_feito = Transacao::where([['user_id', Auth::user()->id], ['tipo', 'p2f']])->sum('valor');
            $tako_retirado = Transacao::where([['user_id', Auth::user()->id], ['tipo', 'saque']])->sum('valor');

            $saldo_disponivel = $tako_feito - $tako_retirado;

            $request->validate([
                'montante' => 'required|integer|max:'.$saldo_disponivel.'',
                'metodo_id' => 'required',
                'destino' => 'required',
                'titular' => 'required',
            ]);
            $transacao = Transacao::create([
                'user_id' => Auth::user()->id,
                'tipo' => 'saque',
                'valor' => $request->get('montante'),
                'metodo_id' => $request->get('metodo_id'),
                'titular' => $request->get ('titular'),
                'destino' => $request->get('destino'),
                'estado' => 'Pendente'
            ]);

            $transacao_id = $transacao->id;

            $admin = User::where('is_permission', 2)->firstOrFail();
            $detalhes = [
                'simples' => Auth::user()->name. ' fez o pedido de saque do valor de '.$request->get('montante').'MZN.',
                'transacao_id' => $transacao_id,
            ];
            Notification::send($admin, new PedidoDeSaque($detalhes));

            return redirect()->route('dashboard.invoices.saque.step-2');
        }
}
