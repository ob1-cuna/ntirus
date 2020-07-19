<?php


namespace App\Http\Controllers\CCliente;


use App\Http\Controllers\Controller;
use App\Review_trab;
use App\Trabalho;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteAvaliacaoController extends Controller
{
    public function index (Trabalho $trabalho)
    {
        return view('cliente.trabalhos_avaliacao_cliente', compact('trabalho'));
    }

    public function store ( Request $request)
    {
        $request->validate
        ([
            'id_trabalho' => 'required',
            'id_freelancer' => 'required',
            'nota' => 'required',
            'descricao' => 'required',
        ]);


        $user_id = Auth::user()->id;
        $trabalho = $request->get('id_trabalho');
        $freelancer = $request->get('id_freelancer');
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
            dd('Ja Avaliaste');
        }
    }
}