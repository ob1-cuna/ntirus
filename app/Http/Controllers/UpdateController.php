<?php


namespace App\Http\Controllers;

use App\ExperEduca;
use App\Notifications\NovoTrabalhoDisponivel;
use App\Notifications\PerfilAprovado;
use App\Review_tipo;
use App\Review_trab;
use App\Trabalho;
use App\habilidade;
use App\Http\Controllers\Controller;
use App\perfil;
use App\Transacao;
use App\User;
use Auth;
use App\HabilidadeUser;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;


class UpdateController extends Controller
{
    public function ListarUsuarios ()
    {
        $users = User::with('habilidades')->where
        ([
            ['is_permission', '=', '0'],
            ['status', '=', '1'],
        ])->get();

        $habilidades = Habilidade::with('users')->get();
        return view('paginas_de_testes.listar_usuarios', compact(['users','habilidades']));

    }

    public function VerUsuariosDaProvincia ()
    {
        $usuarios = DB::table('users')
            ->leftJoin('perfils', 'users.id', '=', 'perfils.user_id')
            ->where([
                ['users.status', 1],
                ['users.is_permission', 0],
                ['perfils.provincia', 'Inhambane'],

            ])
            ->leftJoin('habilidade_user', 'users.id', '=', 'habilidade_user.user_id')
            ->where([
                ['habilidade_user.habilidade_id', 2],
                    ])
            ->get();




        foreach($usuarios as $usuario)
        {
            $user = User::where('id', $usuario->user_id)->firstOrFail();
            Notification::send($user, new NovoTrabalhoDisponivel());
            //dd($user);
        }

    }

    public function paginaDeTestes()
    {
        //$dados = $transacao;
        //$habilidades = Habilidade::all();
        //return view('user_talentos', compact('habilidades'));
        //return view('cliente.trabalho_em_execucao_unico');
        //return view ('layouts/includes/icones_ficheiros');
        //return view ('pdf_factura', compact('dados'));
        //return view ('about');

        return redirect()->route('dashboard.invoices.saque', ['pedido' => 35]);

    }

    public function paginaDeTestesForm()
    {
        return view ('form');
    }

    public function notaTeste()
    {

        $nota = Review_trab::where([['user_id', 13], ['id_trabalho', 9]])->avg('nota');
        $round_num = round($nota * 2) /2;
        $nota = round($round_num, 2);


        if ($nota == 0 )
        {
            dd('Sem Avaliações');
        }

        else
        {
            dd($nota);
        }


    }

    public function storeTrabalho (Request $request)
    {
        $trabalho = Trabalho::create([
            'nome_trabalho' => 'Nome do Trabalho',
            //'id_freelancer' => Auth::user()->id
        ]);

        if ($request->has('habilidade_id'))
        {
            $trabalho->habilidades()->sync($request->get('habilidade_id'));
        }
        return redirect()->back();
    }

    public function printPDF(Transacao $transacao)
    {

        $data = Transacao::find($transacao->id);
        $data = view()->share('dados', $data);

        $pdf = PDF::loadView('pdf_factura', $data);
        return $pdf->download('factura-nr-000'.$data->id.'.pdf');
    }
}