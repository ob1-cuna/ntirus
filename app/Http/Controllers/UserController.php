<?php

namespace App\Http\Controllers;
use App\Expereduca;
use App\habilidade;
use App\Review_trab;
use App\Trabalho;
use App\Perfil;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\PerfilAprovado;


class UserController extends Controller
{


    public function show(User $user)
    {
        $exper_profs = ExperEduca::where([['user_id', $user->id],
            ['tipo', 'exper_prof']])->get();

        $educas = ExperEduca::where([['user_id', $user->id],
            ['tipo', 'educacao']])->get();

        $nota = Review_trab::where([['avaliado_id', $user->id]])->avg('nota');

            $round_num = round($nota * 2) /2;
            $nota = round($round_num, 2);

        $trabalhos = Trabalho::where('freelancer_id', $user->id)->get();

        $trabalhos_feitos = Trabalho::where([['freelancer_id', $user->id],['status', 3]])->count();
        $trabalhos_cancelados = Trabalho::where([['freelancer_id', $user->id],['status', 4]])->count();
        $trabalhos_em_execucao = Trabalho::where([['freelancer_id', $user->id],['status', 1]])->count();

        return view('paginas_de_testes.unico_usuario',
            compact([
                        'educas',
                        'exper_profs',
                        'user',
                        'nota',
                        'trabalhos',
                        'trabalhos_feitos',
                        'trabalhos_cancelados',
                        'trabalhos_em_execucao'
                    ]));
    }

    /*public function ListarUsuarios ()
    {
        $users = User::with('habilidades')->where
        ([
            ['is_permission', '=', '0'],
            ['status', '=', '1'],
        ])->get();

        $habilidades = Habilidade::with('users')->get();
        return view('paginas_de_testes.listar_usuarios', compact(['users','habilidades']));

    }*/

    public function ListarUsuariosCategoria ()
    {
        if (request()->slug)
        {
            $users = User::with('habilidades')->where([
                    ['is_permission', '=', '0'],
                    ['status', '=', '1'],])->whereHas('habilidades',
                function ($query){
                $query->where('slug', request()->slug);})->get();
                $habilidades = Habilidade::with('users')->get();
        }

        else
        {
            $users = User::with('habilidades')->where([
                ['is_permission', '=', '0'],
                ['status', '=', '1'],])->get();

            $habilidades = Habilidade::with('users')->get();
        }

        return view('paginas_de_testes.listar_usuarios', compact(['users','habilidades']));

    }

    public function aprovarPerfil(User $user)
    {
        $aprovarPerfil = DB::table('users')
            ->where('id', $user->id)
            ->update(['status' => 1]);

        $user->notify(new PerfilAprovado());

        dd([$aprovarPerfil, $user]);

        return redirect()->back();
    }






}
