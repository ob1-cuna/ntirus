<?php

namespace App\Http\Controllers\CCliente;

use App\Http\Controllers\Controller;
use App\Habilidade;
use App\imagem;
use App\Proposta;
use App\Review_trab;
use App\Trabalho;
use App\Transacao;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClienteTrabalhoController extends Controller
{
    /*
   // FUNÇÃO RESPONSAVEL PELA LISTAGEM DE TRABALHOS ACTIVOS POSTADOS PELO CLIENTE AUTENTICADO
   //
   */
    public function listarTrabalhosAbertosCliente()
    {
        $trabalhos = Trabalho::where([['status', 'Aberto'], ['user_id', Auth::user()->id]])->get();    // status=0 (pode-se concorrer)
                                                                                                // =1 (activo) =2 (terminado) =3 (cancelado)

        return view('cliente.trabalhos_abertos_cliente', compact(['trabalhos', 'numeroDePropostas']));
    }


    /*
   // FUNÇÃO RESPONSAVEL PELA LISTAGEM DE TRABALHOS EM ANDAMENTO DO CLIENTE AUTENTICADO
   //
   */
    public function listarTrabalhosEmAndamentoCliente()
    {
        $trabalhos = Trabalho::where('user_id', Auth::user()->id)
            ->whereIn('status', ['Em Andamento', 'AguardandoAC', 'Aprovado', 'Recusado'])
            ->orderBy('updated_at', 'desc')
            ->get();

        $transacoes = \App\Transacao::where('user_id', Auth::user()->id)
            ->whereIn('estado', ['Pendente', 'Por Confirmar'])
            ->get();
        return view('cliente.trabalhos_em_andamento_cliente', compact(['trabalhos', 'numeroDePropostas', 'transacoes']));
    }


    /*
    // FUNÇÃO RESPONSAVEL PELA EXIBICAO DE TRABALHO REFERENCIADO PELO ID
    //
    */
    public function exibirPropostasCliente(Trabalho $trabalho)
    {
        $propostas = Proposta::where('trabalho_id', $trabalho->id)->get();      // status=0 (pode-se concorrer)
                                                                                // =1 (activo) =2 (terminado) =3 (cancelado)

        $nrPropostas = Proposta::where([['trabalho_id', $trabalho->id], ['status', 'Aceite']])->count();
        return view('cliente.trabalhos_abertos_propostas_cliente', compact(['propostas', 'trabalho', 'nrPropostas']));
    }




    /*
    // AQUI SERÁ RETORNADA A VIEW PARA A CRIAÇÃO DE UM TRABALHO
    // QUE IRÁ SER POSTADO USANDO A FUNÇÃO storeTrabalho()
    */
    public function postarTrabalho ()
    {
        $habilidades = Habilidade::all();
        return view ('cliente.postar_trabalho_cliente', compact('habilidades'));
    }



    // VERSAO INCOMPLETA

    /*
    // FUNÇÃO PARA A INSERSÃO DE TRABALHO NO BANCO DE DADOS
    // PARA POSTERIOR EXIBIÇÃO NA listarTrabalhos() E exibirTrabalho().
    */
    public function storeTrabalho (Request $request)
    {
        $request->validate([
            'nome_trabalho' => 'required',
            'descricao' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $trabalho = Trabalho::create([
            'slug' => Str::random(9),
            'nome_trabalho' => $request->get('nome_trabalho'),
            'user_id' => Auth::user()->id,
            'nivel' => $request->get('nivel_trabalho'),
            'tipo' => $request->get('tipo_trabalho'),
            'data_prev' => $request->get('data_prev'),
            'descricao' => $request->get ('descricao'),
            'provincia' => $request->get('provincia'),
            'distrito' => $request->get('cidade')
        ]);

        if ($request->has('habilidade_id'))
        {
            $trabalho->habilidades()->sync($request->get('habilidade_id'));
        }

        $imagem = new Imagem;
        if ($request->file('file'))
        {
            $imagemCaminho = $request->file('file');
            $nomeImagem = $imagemCaminho->getClientOriginalName();
            $path = $request->file('file')->storeAs('uploads', $nomeImagem);

            $imagem->nome_imagem = $nomeImagem;
            $imagem->caminho = '/storage/'.$path;
            $imagem->id_usuario = Auth::user()->id;
            $imagem->imagemable_type = 'App\Trabalho';
            $imagem->imagemable_id = $trabalho->id;
            $imagem->save();
        }
        return redirect()->back();
    }

    public function aprovarTrabalhoEmExecucao (Trabalho $trabalho)
    {
        $aprovarTrabalhoEmExecucao = DB::table('trabalhos')
            ->where('id', $trabalho->id)
            ->update(['status' => 'Aprovado',
                      'data_entrega' => now(\DateTimeZone::AMERICA),]);

        return redirect()->back();

    }

    public function cancelarTrabalhoEmExecucao (Trabalho $trabalho)
    {
        $cancelarTrabalhoEmExecucao = DB::table('trabalhos')
            ->where('id', $trabalho->id)
            ->update(['status' => 'Cancelado-C']);
        //dd($cancelarTrabalhoEmExecucao);
        return redirect()->back();
    }

    public function rejeitarTrabalhoEmExecucao (Trabalho $trabalho)
    {
        $cancelarTrabalhoEmExecucao = DB::table('trabalhos')
            ->where('id', $trabalho->id)
            ->update(['status' => 'Recusado']);
        //dd($cancelarTrabalhoEmExecucao);
        return redirect()->back();
    }

    public function trabalhosCancelados ()
    {
        $trabalhos = Trabalho::where('user_id', Auth::user()->id)
            ->whereIn('status', ['Cancelado-F', 'Cancelado-C'])
            ->orderBy('updated_at', 'desc')
            ->get();
        return view ('cliente/trabalhos_cancelados_cliente', compact([
            'trabalhos',
        ]));
    }

    public function trabalhosFinalizados ()
    {
        $trabalhos = Trabalho::where('user_id', Auth::user()->id)
            ->whereIn('status', ['Finalizado', 'Pagamento Pendente'])
            ->orderBy('updated_at', 'desc')
            ->get();
        $avaliacoes = Review_trab::where('avaliador_id', Auth::user()->id)->get();
        return view ('cliente/trabalhos_finalizados_cliente', compact([
            'trabalhos',
            'avaliacoes',
        ]));
    }
}
