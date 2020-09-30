<?php

namespace App\Http\Controllers\CFreelancer;

use App\Http\Controllers\Controller;
use App\Notifications\PedidoDeAprovacaoDeTrabalho;
use App\Notifications\TrabalhoCanceladoFreelancer;
use App\Trabalho;
use App\Review_trab;
use App\Proposta;
use App\User;
use Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FreelancerTrabalhoController extends Controller
{
    public function solicitarAprovacao (Trabalho $trabalho)
    {
        $pedirAprovacao = Trabalho::where('id', $trabalho->id)->update(['status' => 'AguardandoAC']);

        $cliente = User::where('id', $trabalho->user->id)->firstOrFail();
        $detalhes = [
            'simples' => $trabalho->freelancer->name. ' pediu a confirmação para '.$trabalho->nome_trabalho.'.',
        ];
        Notification::send($cliente, new PedidoDeAprovacaoDeTrabalho($detalhes));
        return redirect()->back();
    }

    public function cancelarTrabalho (Trabalho $trabalho)
    {
        $cancelarTrabalho = Trabalho::where('id', $trabalho->id)->update(['status' => 'Cancelado-F']);
        $cliente = User::where('id', $trabalho->user->id)->firstOrFail();
        $detalhes = [
            'simples' => $trabalho->freelancer->name.' cancelou o trabalho '.$trabalho->nome_trabalho.' volte a abrir ou peça o reembolso',
        ];
        Notification::send($cliente, new TrabalhoCanceladoFreelancer($detalhes));

        return redirect()->back();
    }

    public function trabalhoEmAndamento ()
    {
        $trabalhos = Trabalho::where('freelancer_id', Auth::user()->id)
            ->whereIn('status', ['Em Andamento', 'Aprovado', 'Recusado', 'AguardandoAC'])
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
        return view ('freelancer.trabalhos_em_andamento_freelancer', compact([
            'trabalhos',
        ]));
    }

    public function trabalhosCancelados ()
    {
        $trabalhos = Trabalho::where('freelancer_id', Auth::user()->id)
            ->whereIn('status', ['Cancelado-F', 'Cancelado-C'])
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
        return view ('freelancer.trabalhos_cancelados_freelancer', compact([
            'trabalhos',
        ]));
    }

    public function trabalhosFinalizados ()
    {
        $trabalhos = Trabalho::where('freelancer_id', Auth::user()->id)
            ->whereIn('status', ['Finalizado'])
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
        $avaliacoes = Review_trab::where('avaliador_id', Auth::user()->id)->get();
        return view ('freelancer/trabalhos_finalizados_freelancer', compact([
            'trabalhos',
            'avaliacoes',
        ]));
    }
}
