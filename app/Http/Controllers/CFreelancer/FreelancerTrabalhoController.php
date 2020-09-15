<?php

namespace App\Http\Controllers\CFreelancer;

use App\Http\Controllers\Controller;
use App\Trabalho;
use App\Review_trab;
use App\Proposta;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FreelancerTrabalhoController extends Controller
{
    public function solicitarAprovacao (Trabalho $trabalho)
    {
        $pedirAprovacao = DB::table('trabalhos')
            ->where('id', $trabalho->id)
            ->update(['status' => 'AguardandoAC']);
        return redirect()->back();
    }

    public function cancelarTrabalho (Trabalho $trabalho)
    {
        $cancelarTrabalho = DB::table('trabalhos')
            ->where('id', $trabalho->id)
            ->update(['status' => 'Cancelado-F']);
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
