<?php

namespace App\Http\Controllers\CFreelancer;

use App\Http\Controllers\Controller;
use App\imagem;
use App\Trabalho;
use App\Proposta;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class FreelancerPropostaController extends Controller
{
    /*
     * Devolve a view onde pode fazer a proposta para o trabalho
     */
    public function fazerProposta (Trabalho $trabalho)
    {
        return view('paginas_gerais.trabalhos.concorrer_trabalho', compact('trabalho'));
    }



    /*
     * Enviar Proposta para o trabalho
     */
    public function storeProposta (Request $request)
    {
        $request->validate
        ([
            'preco_proposta' => 'required',
            'tempo_exec' => 'required',
            'descricao' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);


        $user_id = Auth::user()->id;
        $trabalho_id = $request->get('trabalho_id');
        $preco_proposta = $request->get('preco_proposta');
        $tempo_exec = $request->get('tempo_exec');
        $carta =  $request->get('descricao');


        /*
         * Função para verificar se o usuario já fez uma
         * proposta para o trabalho.
         */

        $verificador = DB::table('propostas')->where([['user_id', $user_id], ['trabalho_id', $trabalho_id]])->exists();

        /*
         * Se o usuario não fez uma proposta para o trabalho devolve FALSE e aceita o envio
         */
        if ($verificador == false)
        {
            $proposta = Proposta::create([
                'trabalho_id' => $trabalho_id,
                'user_id' => $user_id,
                'preco_proposta' => $preco_proposta,
                'tempo_exec' => $tempo_exec,
                'carta' => $carta,
            ]);

            $imagem = new Imagem;
            if ($request->file('file'))
            {
                $imagemCaminho = $request->file('file');
                $nomeImagem = $imagemCaminho->getClientOriginalName();
                $path = $request->file('file')->storeAs('uploads', $nomeImagem);

                $imagem->nome_imagem = $nomeImagem;
                $imagem->caminho = '/storage/'.$path;
                $imagem->id_usuario = Auth::user()->id;
                $imagem->imagemable_type = 'App\Proposta';
                $imagem->imagemable_id = $proposta->id;
                $imagem->save();
            }
            dd('Inserido');
        }

        /*
         * Recusa o envio da proposta!
         */
        else {
            dd('dado existe');
        }

       // return redirect()->back();
    }


    /*
     * Listar Trabalhos Propostos pelo Freelancer :D
     */

    public function ListarTrabalhosPropostos ()
    {
        $propostas = Proposta::where('user_id', Auth::user()->id)->paginate(5);

        return view ('freelancer.trabalhos_propostos_freelancer', compact([
            'propostas',
        ]));
    }

    /*
     * Apagar proposta feita para um trabalho
     */
    public function destroy (Proposta $proposta)
    {
        $proposta->delete();
        return redirect()->back();
    }



}
