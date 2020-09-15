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
        $todas_habilidades = Habilidade::all();

        if (request()->slug)
        {
            $trabalhos = Trabalho::where('status', 'Aberto')->whereHas('habilidades',
                function ($query) {
                    $query->where('slug', request()->slug);
                })->paginate(5);

        }

        else
        {
            $trabalhos = Trabalho::where('status', 'Aberto')->paginate(5);
        }

       return view('paginas_gerais.trabalhos.trabalhos_abertos_list', compact(['trabalhos', 'todas_habilidades']));
    }


    public function filtros ()
    {
        $variaveis = [1, 5, 6];

        $valores = Habilidade::whereIn('id', $variaveis)->get();
        dd($variaveis);
    }

    /*
    // FUNÇÃO RESPONSÁVEL PELA EXIBIÇÃO DE TRABALHO REFERENCIADO PELO ID
    //
    */
    public function exibirTrabalho (Trabalho $trabalho)
    {
        $numeroDePropostas = Proposta::where('trabalho_id', $trabalho->id)->count();
        $user = Trabalho::find($trabalho->id);
        $imagems = $user->imagems;


        if($numeroDePropostas==0)
        {
            return view('paginas_gerais.trabalhos.exibir_trabalho', compact
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
            return view('paginas_gerais.trabalhos.exibir_trabalho', compact
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
