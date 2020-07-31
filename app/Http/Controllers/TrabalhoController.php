<?php

namespace App\Http\Controllers;
use App\Habilidade;
use App\Proposta;
use App\Review_trab;
use App\Trabalho;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class TrabalhoController extends Controller
{

    /*
    // FUNÇÃO RESPONSAVEL PELA LISTAGEM DE TRABALHOS ACTIVOS POSTADOS PELOS CLIENTES
    //
    */
    public function listarTrabalhos()
    {
       $trabalhos = Trabalho::where('status', 'Aberto')->get();    // status=0 (pode-se concorrer)
                                                            // =1 (activo) =2 (terminado) =3 (cancelado)
       return view('trabalhos.todos_trabalhos_list_v2', compact('trabalhos'));
    }




    /*
    // FUNÇÃO RESPONSAVEL PELA EXIBICAO DE TRABALHO REFERENCIADO PELO ID
    //
    */
    public function exibirTrabalho (Trabalho $trabalho)
    {
        $numeroDePropostas = Proposta::where('trabalho_id', $trabalho->id)->count();
        $user = Trabalho::find($trabalho->id);
        $imagems = $user->imagems;


        if($numeroDePropostas==0)
        {
            return view('trabalhos.exibir_trabalho', compact
            ([
                'trabalho',
                'numeroDePropostas',
                'ultimaProposta',
                'imagems',
                'nota'
            ]));
        }

        else
        {
            $ultimaProposta = Proposta::where('trabalho_id', $trabalho->id)->latest()->firstOrFail();
            return view('trabalhos.exibir_trabalho', compact
        ([
            'trabalho',
            'numeroDePropostas',
            'ultimaProposta',
            'imagems',
            'nota'
        ]));
        }




    }
}
