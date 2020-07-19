<?php

namespace App\Http\Controllers\CCliente;

use App\Http\Controllers\Controller;
use App\Notifications\AprovarProposta;

use App\Trabalho;
use App\Proposta;
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

        $aceitarPropostaA = DB::table('propostas')
            ->where('id', $proposta->id)
            ->update(['status' => 2]);

        $aceitarFreelancer = DB::table('trabalhos')
            ->where('id', $proposta->trabalho_id)
            ->update
            ([
                'status' => 'Em Andamento',
                'data_aceite' => $proposta->tempo_exec,
                'freelancer_id' => $proposta->user_id,
                'preco_final' => $proposta->preco_proposta,
            ]);

        $user = User::where('id', $proposta->user_id)->firstOrFail();
        Notification::send($user, new AprovarProposta());

        $rejeitarPropostas = DB::table('propostas')
            ->where([['trabalho_id', $proposta->trabalho_id], ['status', 'Pendente']])
            ->update(['status' => 3,]);


        return redirect()->back();
    }
}
