<?php


namespace App\Http\Controllers\CFreelancer;

use App\Http\Controllers\Controller;
use App\Review_trab;
use App\Trabalho;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FreelancerAvaliacaoController extends Controller
{
    public function index (Trabalho $trabalho)
    {
        $avaliacoes = Review_trab::where([['id_trabalho', $trabalho->id], ['avaliado_id', Auth::user()->id]])->get();
        return view('freelancer.trabalhos_avaliacao_freelancer', compact([
            'trabalho',
            'avaliacoes'
        ]));
    }

    public function store ( Request $request)
    {
        $request->validate
        ([
            'id_trabalho' => 'required',
            'id_cliente' => 'required',
            'nota' => 'required',
            'descricao' => 'required',

        ]);


        $user_id = Auth::user()->id;
        $trabalho = $request->get('id_trabalho');
        $freelancer = $request->get('id_cliente');
        $nota = $request->get('nota');
        $comentario = $request->get('descricao');


        /*
         * Função para verificar se o usuario já fez uma
         * a avaliacao do freelancer
         */

        $verificador = DB::table('review_trabs')->where([['avaliador_id', $user_id], ['id_trabalho', $trabalho]])->exists();


        if ($verificador == false)
        {
            $proposta = Review_trab::create([
                'id_trabalho' => $trabalho,
                'avaliador_id' => $user_id,
                'avaliado_id' => $freelancer,
                'nota' => $nota,
                'comentario' => $comentario,
            ]);

            //dd('Avaliado');
            return redirect()->back();
        }

        /*
         * Recusa!
         */
        else {
            //dd('Ja Avaliaste');
            //return redirect()->back();
           return dd('Ja Avaliaste');
        }


    }
}