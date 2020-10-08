<?php


namespace App\Http\Controllers\CAdmin;


use App\MetodosDePagamento;
use App\Notifications\PagamentoConfirmadoCliente;
use App\Notifications\PagamentoConfirmadoFreelancer;
use App\Notifications\SaqueConfirmado;
use App\Trabalho;
use App\Transacao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

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
        $confirmarTransacao = Transacao::where('id', $transacao->id)
            ->update(['estado' => 'Concluido',
                'data_de_pagamento' => now(\DateTimeZone::AMERICA),]);

        Trabalho::where('id', $transacao->trabalho_id)->update(['status' => 'Finalizado']);

        Transacao::where([
            ['user_id', $transacao->trabalho->freelancer->id],
            ['tipo', 'p2f'],
            ['trabalho_id', $transacao->trabalho_id]])->update(['estado' => 'Concluido',
            'data_de_pagamento' => now(\DateTimeZone::AMERICA),]);

        $cliente = User::where('id', $transacao->user_id)->firstOrFail();

        $transacao_freelancer = Transacao::where([['tipo', 'p2f'], ['trabalho_id', $transacao->trabalho_id]])->firstOrFail();
        $freelancer = User::where('id', $transacao_freelancer->user_id)->firstOrFail();

        $detalhes = [
            'saudacao' => 'Olá '.$cliente->name.'.',
            'simples' => 'O pagamento para o trabalho "'.$transacao->trabalho->nome_trabalho. '" foi confirmado.' ,
            'corpo-email' => 'O pagamento para o trabalho "'.$transacao->trabalho->nome_trabalho. '" foi confirmado com sucesso, para mais detalhes clique no link abaixo.' ,
            'agradecimento' => 'Obrigado por usar Ntirus!',
            'transacao_id' => $transacao->id
        ];
        Notification::send($cliente, new PagamentoConfirmadoCliente($detalhes));

        $detalhes = [
            'saudacao' => 'Olá '.$freelancer->name.'.',
            'simples' => 'O pagamento para o trabalho "'.$transacao->trabalho->nome_trabalho. '" publicado por '.$cliente->name.' foi confirmado.' ,
            'corpo-email' => 'O pagamento para o trabalho "'.$transacao->trabalho->nome_trabalho. '" foi confirmado com sucesso, para mais detalhes clique no link abaixo.' ,
            'agradecimento' => 'Obrigado por usar Ntirus!',
            'transacao_id' => $transacao->id
        ];

        Notification::send($freelancer, new PagamentoConfirmadoFreelancer($detalhes));

        return back()->with('success', 'Transação confirmada!');
    }

    public function efectuarPagamentoStore (Request $request)
    {
        $request->validate([
            'codigo_confirmacao' => ['required'],
        ]);

        $transacao_id =  $request->get('transacao_id');

        $meu_pagamento = Transacao::where('id', $transacao_id)
            ->update
            ([
                'codigover' => $request->get('codigo_confirmacao'),
                'estado' => 2,
                'data_de_pagamento' => now(\DateTimeZone::AMERICA)
            ]);

        $transacao = Transacao::where('id', $transacao_id)->firstOrFail();
        $freelancer = User::where('id', $transacao->user_id)->firstOrFail();
        $detalhes = [
            'saudacao' => 'Olá '.$freelancer->name.'.',
            'simples' => 'O seu saque do valor de '.$transacao->valor. 'MTs foi confirmado.' ,
            'corpo-email' => 'O seu saque do valor de '.$transacao->valor. 'MTs foi confirmado para sua conta '.$transacao->metodo->nome.'.' ,
            'agradecimento' => 'Obrigado por usar Ntirus!',
            'transacao_id' => $transacao_id
        ];

        Notification::send($freelancer, new SaqueConfirmado($detalhes));

        return redirect()->route('admin.dashboard.transacoes.pagar.index-2', ['transacao' => $transacao_id]);
    }

    public function efectuarPagamentoIndex (Transacao $transacao)
    {
        $metodos = MetodosDePagamento::all();
        return view( 'admin.factura_pay', compact(['transacao', 'metodos']));
    }
}