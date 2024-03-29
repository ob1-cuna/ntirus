<?php

namespace App\Http\Controllers;
use App\Expereduca;
use App\habilidade;
use App\imagem;
use App\Review_trab;
use App\Trabalho;
use App\Perfil;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\PerfilAprovado;


class UserController extends Controller
{


    public function showFreelancer(User $user)
    {
        $exper_profs = ExperEduca::where([['user_id', $user->id],
            ['tipo', 'exper_prof']])->orderBy('data_inicio', 'DESC')->get();

        $educas = ExperEduca::where([['user_id', $user->id],
            ['tipo', 'educacao']])->orderBy('data_inicio', 'DESC')->get();

        $nota = Review_trab::where([['avaliado_id', $user->id]])->avg('nota');
        $total_avaliacoes = Review_trab::where([['avaliado_id', $user->id]])->count();

            $round_num = round($nota * 2) /2;
            $nota = round($round_num, 2);

        $trabalhos = Trabalho::where([['freelancer_id', $user->id], ['status', 'Finalizado']])->get();
        /*
         * Status do Trabalho colocados do ENUM da do Banco de Dados:
         *
         * 'Aberto','Em Andamento','AguardandoAC','Aprovado','Recusado','Cancelado-C','Cancelado-F','Pagamento Pendente','Finalizado'
         */

        $trabalhos_feitos = Trabalho::where([['freelancer_id', $user->id],['status', 'Finalizado']])->count();
        $trabalhos_cancelados = Trabalho::where([['freelancer_id', $user->id],['status', 'Cancelado-F']])->count();
        $trabalhos_em_execucao = Trabalho::where([['freelancer_id', $user->id],['status', 'Em Andamento']])->count();

        return view('paginas_gerais.usuarios.freelancer_show',
            compact([
                        'educas',
                        'exper_profs',
                        'user',
                        'nota',
                        'trabalhos',
                        'verificador_foto_perfil',
                        'foto_perfil',
                        'trabalhos_feitos',
                        'trabalhos_cancelados',
                        'trabalhos_em_execucao',
                        'total_avaliacoes'
                    ]));
    }

    public function showCliente(User $user)
    {
        /*
         * Status do Trabalho colocados do ENUM da do Banco de Dados:
         *
         * 'Aberto','Em Andamento','AguardandoAC','Aprovado','Recusado','Cancelado-C','Cancelado-F','Pagamento Pendente','Finalizado'
         */
        $trabalhos = Trabalho::where([['user_id', $user->id], ['status', 'Finalizado']])->get();
        $trabalhos_publicados = Trabalho::where('user_id', $user->id)->count();
        $trabalhos_pagos = Trabalho::where([['user_id', $user->id],['status', 'Finalizado']])->count();
        $trabalhos_cancelados = Trabalho::where([['user_id', $user->id],['status', 'Cancelado-C']])->count();
        $trabalhos_abertos = Trabalho::where([['user_id', $user->id],['status', 'Aberto']])->get();
        $trabalhos_abertos_total = Trabalho::where([['user_id', $user->id],['status', 'Aberto']])->count();
        $total_avaliacoes = Review_trab::where([['avaliado_id', $user->id]])->count();

        return view('paginas_gerais.usuarios.cliente_show',
            compact([
                'user',
                'trabalhos',
                'trabalhos_publicados',
                'trabalhos_pagos',
                'trabalhos_cancelados',
                'trabalhos_abertos',
                'trabalhos_abertos_total',
                'total_avaliacoes'
            ]));
    }


    public function ListarUsuariosCategoria ()
    {
        $provincias = perfil::distinct()->whereNotNull('provincia')->get(['provincia']);
        if (request()->slug)
        {
                $users = User::with('habilidades')->where([
                    ['is_permission', '=', '0'],
                    ['status', '=', '1'],])->whereHas('habilidades',
                function ($query){
                $query->where('slug', request()->slug);})->paginate(5);
                $habilidades = Habilidade::with('users')->get();
                $todas_habilidades = Habilidade::all();

        }

        else
        {
            $users = User::with('habilidades')->where([
                ['is_permission', '=', '0'],
                ['status', '=', '1'],])->paginate(5);
            $habilidades = Habilidade::with('users')->get();
            $todas_habilidades = Habilidade::all();
        }

        return view('paginas_gerais.usuarios.freelancers_list', compact(['users','habilidades', 'todas_habilidades', 'provincias']));


    }

    public function filtrarFreelancers (Request $request)
    {
        $provincias = perfil::distinct()->whereNotNull('provincia')->get(['provincia']);
        $pesquisa = request()->get('query-freelancers');
        $provincia_filter = request()->get('prov');
        $categoria_filter = request()->get('cat');

        $habilidades = Habilidade::with('users')->get();
        $todas_habilidades = Habilidade::all();
        $users_count = User::where([['is_permission', 0], ['name', 'like', "%$pesquisa%"], ['status', 1]])->count();

        if ($provincia_filter == null && $categoria_filter != null) {
            $users = User::with('habilidades')->where([
                ['is_permission', '=', '0'],
                ['status', '=', '1'],
                ['name', 'like', "%$pesquisa%"]])->whereHas('habilidades',function ($query){
                    $query->whereIn('slug', request()->get('cat'));})->paginate(5);
        }

        elseif ($categoria_filter == null && $provincia_filter != null) {
            $users = User::with('habilidades')->where([
                ['is_permission', '=', '0'],
                ['status', '=', '1'],
                ['name', 'like', "%$pesquisa%"]])->whereHas('perfil', function ($query) {
                $query->whereIn('provincia', request()->get('prov'));
            })->paginate(5);
        }

        elseif ($categoria_filter == null && $provincia_filter == null) {
            $users = User::with('habilidades')->where([
                ['is_permission', '=', '0'],
                ['status', '=', '1'],
                ['name', 'like', "%$pesquisa%"]])->paginate(5);
        }
        else {
            $users = User::with('habilidades')->where([
                ['is_permission', '=', '0'],
                ['status', '=', '1'],
                ['name', 'like', "%$pesquisa%"]])->whereHas('habilidades',
                function ($query){
                    $query->whereIn('slug', request()->get('cat'));})
                ->whereHas('perfil', function ($query) {
                $query->whereIn('provincia', request()->get('prov'));
            })->paginate(5);
        }

        return view('paginas_gerais.usuarios.freelancers_list', compact(['users','habilidades', 'todas_habilidades', 'provincias', 'users_count']));
    }
}
