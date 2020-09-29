<?php

namespace App\Http\Controllers\CCliente;

use App\Http\Controllers\Controller;
use App\Notifications\AprovarProposta;

use App\Trabalho;
use App\Proposta;
use App\Transacao;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ClientePropostaController extends Controller
{
    /**
     *
     *
     *
     */
    public function aceitarProposta(Proposta $proposta)
    {
        $user = User::where('id', $proposta->user_id)->firstOrFail();
        $detalhes = [
            'trabalho_id' => $proposta->trabalho->slug,
            'saudacao' => 'Olá '.$user->name.'.',
            'simples' => 'A sua proposta para '.$proposta->trabalho->nome_trabalho.' foi aprovada',
            'corpo-email' => $proposta->trabalho->user->name.' aprovou a sua proposta para o trabalho de '.$proposta->trabalho->nome_trabalho.', para ter mais informações de como prosseguir clique no mlink abaixo',
            'agradecimento' => 'Obrigado por usar Ntirus!',
        ];
        Notification::send($user, new AprovarProposta($detalhes));

        $aceitarPropostaA = DB::table('propostas')
            ->where('id', $proposta->id)
            ->update
            ([
                'status' => 2,
                'updated_at' => now(\DateTimeZone::AMERICA),
            ]);

        $aceitarFreelancer = DB::table('trabalhos')
            ->where('id', $proposta->trabalho_id)
            ->update
            ([
                'status' => 'Em Andamento',
                'data_aceite' => $proposta->tempo_exec,
                'freelancer_id' => $proposta->user_id,
                'preco_final' => $proposta->preco_proposta,
                'updated_at' => now(\DateTimeZone::AMERICA),
            ]);

        $rejeitarPropostas = DB::table('propostas')
            ->where([['trabalho_id', $proposta->trabalho_id], ['status', 'Pendente']])
            ->update(['status' => 3,]);


        $criarInvoiceC =  Transacao::create([
            'trabalho_id' => $proposta->trabalho_id,
            'user_id' => Auth::user()->id,
            'valor' => $proposta->preco_proposta,
            'tipo' => 'c2p',
        ]);

        $percentagem = ($proposta->preco_proposta * 0.15);
        $valor_freelancer = $proposta->preco_proposta - $percentagem;

        $criarInvoiceF =  Transacao::create([
            'trabalho_id' => $proposta->trabalho_id,
            'user_id' => $proposta->user_id,
            'valor' => $valor_freelancer,
            'tipo' => 'p2f',
        ]);
        return redirect()->back();
    }
}
