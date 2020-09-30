<?php

namespace App\Http\Controllers;
use App\Habilidade;
use App\perfil;
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
        $provincias = Trabalho::distinct()->whereNotNull('provincia')->get(['provincia']);

        if (request()->cat)
        {
            $trabalhos = Trabalho::where('status', 'Aberto')->whereHas('habilidades',
                function ($query) {
                    $query->where('slug', request()->cat);
                })->paginate(5);

        }

        else
        {
            $trabalhos = Trabalho::where('status', 'Aberto')->paginate(5);
        }

       return view('paginas_gerais.trabalhos.trabalhos_abertos_list', compact(['trabalhos', 'todas_habilidades', 'provincias']));
    }


    public function filtrarTrabalhos (Request $request)
    {   $provincias = Trabalho::distinct()->whereNotNull('provincia')->get(['provincia']);

        $pesquisa = request()->get('p-trabalhos');
        $provincia_filter = request()->get('prov');
        $categoria_filter = request()->get('cat');
        $trabalhos_count = User::where([['status', 'Aberto'],['name', 'like', "%$pesquisa%"]])->count();

        $todas_habilidades = Habilidade::all();

        if ($provincia_filter == null && $categoria_filter != null) {
            //apenas categoria & nome
            $trabalhos = Trabalho::where([['status', 'Aberto'], ['nome_trabalho', 'like', "%$pesquisa%"]])->whereHas('habilidades',
                function ($query){
                    $query->whereIn('slug', request()->get('cat'));})->paginate(5);}

        elseif ($categoria_filter == null && $provincia_filter != null) {
            //apenas província e nome
            $trabalhos = Trabalho::where([['status', 'Aberto'], ['nome_trabalho', 'like', "%$pesquisa%"]])->whereIn('provincia', request()->get('prov'))->paginate(5);}


        elseif ($categoria_filter == null && $provincia_filter == null) {
            //apenas nome
            $trabalhos = Trabalho::where([['status', 'Aberto'], ['nome_trabalho', 'like', "%$pesquisa%"]])->paginate(5);}

        else {

            //todos filtros
            $trabalhos = Trabalho::where([['status', 'Aberto'], ['nome_trabalho', 'like', "%$pesquisa%"]])->whereHas('habilidades',
                function ($query)
                {$cat = request()->get('cat');
                    $query->whereIn('slug', $cat);})->whereIn('provincia', request()->get('prov'))->paginate(5);}

        return view('paginas_gerais.trabalhos.trabalhos_abertos_list', compact(['trabalhos', 'todas_habilidades', 'provincias', 'trabalhos_count']));
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
