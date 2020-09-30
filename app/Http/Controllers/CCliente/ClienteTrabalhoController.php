<?php

namespace App\Http\Controllers\CCliente;

use App\HabilidadeTrabalho;
use App\Http\Controllers\Controller;
use App\Habilidade;
use App\imagem;
use App\Notifications\TrabalhoAprovado;
use App\Notifications\TrabalhoCanceladoCliente;
use App\Notifications\TrabalhoCanceladoFreelancer;
use App\Notifications\TrabalhoRejeitado;
use App\Proposta;
use App\Review_trab;
use App\Trabalho;
use App\Transacao;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Notification;

class ClienteTrabalhoController extends Controller
{
    /*
   // FUNÇÃO RESPONSAVEL PELA LISTAGEM DE TRABALHOS ACTIVOS POSTADOS PELO CLIENTE AUTENTICADO
   //
   */
    public function listarTrabalhosAbertosCliente()
    {
        $trabalhos = Trabalho::where([['status', 'Aberto'], ['user_id', Auth::user()->id]])->orderBy('created_at', 'desc')->paginate(5);    // status=0 (pode-se concorrer)
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
            ->paginate(5);

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
        $propostas = Proposta::where('trabalho_id', $trabalho->id)->paginate(10);      // status=0 (pode-se concorrer)
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

    public function editTrabalho (Trabalho $trabalho)
    {
        $habilidades = Habilidade::all();
        return view ('cliente.postar_trabalho_cliente_edit', compact(['habilidades', 'trabalho', $trabalho]));
    }

    public function editTrabalhoStore (Trabalho $trabalho, Request $request)
    {
        $trabalho->update($this->validarDados());

        if ($request->has('habilidade_id'))
        {
            $trabalho->habilidades()->sync($request->get('habilidade_id'));
        }

        return back()->with('success', 'Trabalho Actualizado');
    }

    public function destroyTrabalho(Trabalho $trabalho)
    {
        $trabalho->delete();
        return back()->with('success', 'Trabalho Apagado');
    }


    protected function validarDados()
    {
        return $data = request()->validate( [
            'nome_trabalho'  => ['required'],
            'tipo' => ['required'],
            'nivel' => ['required'],
            'data_prev' => ['required'],
            'descricao' => ['required'],
            'provincia' => ['required'],
            'distrito' => ['required'],
        ]);
    }

    /*
    // FUNÇÃO PARA A INSERSÃO DE TRABALHO NO BANCO DE DADOS
    // PARA POSTERIOR EXIBIÇÃO NA listarTrabalhos() E exibirTrabalho().
    */
    public function storeTrabalho (Request $request)
    {
        $request->validate([
            'file' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $trabalho = Trabalho::create($this->validarDados());

        $trabalho_slug = DB::table('trabalhos')
        ->where('id', $trabalho->id)
        ->update([
            'slug' => Str::random(9),
            'user_id' => Auth::user()->id,
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
        return back()->with('success', 'Trabalho Publicado');
    }

    public function aprovarTrabalhoEmExecucao (Trabalho $trabalho)
    {
        $aprovarTrabalhoEmExecucao = Trabalho::where('id', $trabalho->id)
            ->update(['status' => 'Aprovado',
                      'data_entrega' => now(\DateTimeZone::AMERICA),]);
        $freelancer = User::where('id', $trabalho->freelancer->id)->firstOrFail();
        $detalhes = [
            'simples' => $trabalho->user->name.' aprovou '.$trabalho->nome_trabalho.', por si feito, veja o seu saldo.',
        ];
        Notification::send($freelancer, new TrabalhoAprovado($detalhes));
        return redirect()->back();

    }

    public function cancelarTrabalhoEmExecucao (Trabalho $trabalho)
    {
        $cancelarTrabalhoEmExecucao = Trabalho::where('id', $trabalho->id)
            ->update(['status' => 'Cancelado-C']);

        $freelancer = User::where('id', $trabalho->freelancer->id)->firstOrFail();
        $detalhes = [
            'simples' => $trabalho->user->name.' cancelou o trabalho '.$trabalho->nome_trabalho.'.',
        ];
        Notification::send($freelancer, new TrabalhoCanceladoCliente($detalhes));
        return redirect()->back();
    }

    public function rejeitarTrabalhoEmExecucao (Trabalho $trabalho)
    {
        $freelancer = User::where('id', $trabalho->freelancer->id)->firstOrFail();
        $detalhes = [
            'simples' => $trabalho->user->name.' rejeitou a aprovação o trabalho '.$trabalho->nome_trabalho.', faça as correções.',
        ];
        Notification::send($freelancer, new TrabalhoRejeitado($detalhes));

        $cancelarTrabalhoEmExecucao = Trabalho::where('id', $trabalho->id)
            ->update(['status' => 'Recusado']);
        return redirect()->back();
    }

    public function trabalhosCancelados ()
    {
        $trabalhos = Trabalho::where('user_id', Auth::user()->id)
            ->whereIn('status', ['Cancelado-F', 'Cancelado-C'])
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
        return view ('cliente.trabalhos_cancelados_cliente', compact([
            'trabalhos',
        ]));
    }

    public function trabalhosFinalizados ()
    {
        $trabalhos = Trabalho::where('user_id', Auth::user()->id)
            ->whereIn('status', ['Finalizado', 'Pagamento Pendente'])
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
        $avaliacoes = Review_trab::where('avaliador_id', Auth::user()->id)->get();
        return view ('cliente.trabalhos_finalizados_cliente', compact([
            'trabalhos',
            'avaliacoes',
        ]));
    }
}
