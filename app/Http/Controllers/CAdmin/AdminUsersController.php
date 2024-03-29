<?php

namespace App\Http\Controllers\CAdmin;

use App\Http\Controllers\Controller;
use App\Notifications\AprovarProposta;
use Illuminate\Http\Request;

use App\Expereduca;
use App\habilidade;
use App\Review_trab;
use App\Trabalho;
use App\Perfil;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Notifications\PerfilAprovado;
use Illuminate\Support\Facades\Notification;


class AdminUsersController extends Controller
{
    public function aprovarPerfil(User $user)
    {
        $aprovarPerfil = Perfil::where('user_id', $user->id)->update(['status' => 1]);
        $activar_visibilidade = User::where('id', $user->id)->update(['status'=> 1]);

        $detalhes = [
            'saudacao' => 'Olá '.$user->name.'.',
            'simples' => 'O seu perfil foi aprovado',
            'corpo-email' => 'O seu perfil foi aprovado com sucesso, para ter mais informações de como prosseguir clique no link abaixo',
            'agradecimento' => 'Obrigado por usar Ntirus!',
        ];

        Notification::send($user, new PerfilAprovado($detalhes));
        return redirect()->back();
    }

    public function pesquisarUser (Request $request)
    {
        $request->validate([
            'query' => 'required|min:3',
        ]);

        $query = request()->input('query');

        $users_count = User::whereIn('is_permission', [1, 0])->where('name', 'like', "%$query%")->count();

        $freelancers_perfil_activos = DB::table('users')
            ->leftJoin('perfils', 'users.id', '=', 'perfils.user_id')
            ->where([
                ['perfils.status', 1],
                ['users.is_permission', 0],
                ['name', 'like', "%$query%"],
            ])->get();
        $freelancers_perfil_completos = DB::table('users')
            ->leftJoin('perfils', 'users.id', '=', 'perfils.user_id')
            ->where([
                ['perfils.status', 2],
                ['users.is_permission', 0],
                ['name', 'like', "%$query%"],
            ])->get();
        $freelancers_perfil_incompletos = DB::table('users')
            ->leftJoin('perfils', 'users.id', '=', 'perfils.user_id')
            ->where([
                ['perfils.status', 0],
                ['users.is_permission', 0],
                ['name', 'like', "%$query%"],
            ])->get();

        $clientes_perfil_activos = DB::table('users')
            ->leftJoin('perfils', 'users.id', '=', 'perfils.user_id')
            ->where([
                ['perfils.status', 1],
                ['users.is_permission', 1],
                ['name', 'like', "%$query%"],
            ])->get();

        $clientes_perfil_completos = DB::table('users')
            ->leftJoin('perfils', 'users.id', '=', 'perfils.user_id')
            ->where([
                ['perfils.status', 2],
                ['users.is_permission', 1],
                ['name', 'like', "%$query%"],
            ])->get();

        $clientes_perfil_incompletos = DB::table('users')
            ->leftJoin('perfils', 'users.id', '=', 'perfils.user_id')
            ->where([
                ['perfils.status', 0],
                ['users.is_permission', 1],
                ['name', 'like', "%$query%"],
            ])->get();

        if (request()->slug) {
            $users = User::whereIn('is_permission', [1, 0])->where('name', 'like', "%$query%")->whereHas('habilidades',
                function ($query) {
                    $query->where('slug', request()->slug);
                })->paginate(5);
            $habilidades = Habilidade::with('users')->get();
            //$todas_habilidades = Habilidade::all();

        } else {
            $users = User::whereIn('is_permission', [1, 0])->where('name', 'like', "%$query%")->paginate(5);
            $habilidades = Habilidade::with('users')->get();
            $todas_habilidades = Habilidade::all();
        }

        return view('admin.gerir_usuarios_list',
            compact([
                'users',
                'habilidades',
                'todas_habilidades',
                'freelancers_perfil_activos',
                'freelancers_perfil_completos',
                'freelancers_perfil_incompletos',
                'clientes_perfil_activos',
                'clientes_perfil_completos',
                'clientes_perfil_incompletos',
                'users_count']));

    }

    public function index()
    {
        $freelancers_perfil_activos = DB::table('users')
            ->leftJoin('perfils', 'users.id', '=', 'perfils.user_id')
            ->where([
                ['perfils.status', 1],
                ['users.is_permission', 0],
            ])->get();
        $freelancers_perfil_completos = DB::table('users')
            ->leftJoin('perfils', 'users.id', '=', 'perfils.user_id')
            ->where([
                ['perfils.status', 2],
                ['users.is_permission', 0],
            ])->get();
        $freelancers_perfil_incompletos = DB::table('users')
            ->leftJoin('perfils', 'users.id', '=', 'perfils.user_id')
            ->where([
                ['perfils.status', 0],
                ['users.is_permission', 0],
            ])->get();

        $clientes_perfil_activos = DB::table('users')
            ->leftJoin('perfils', 'users.id', '=', 'perfils.user_id')
            ->where([
                ['perfils.status', 1],
                ['users.is_permission', 1],
            ])->get();

        $clientes_perfil_completos = DB::table('users')
            ->leftJoin('perfils', 'users.id', '=', 'perfils.user_id')
            ->where([
                ['perfils.status', 2],
                ['users.is_permission', 1],
            ])->get();

        $clientes_perfil_incompletos = DB::table('users')
            ->leftJoin('perfils', 'users.id', '=', 'perfils.user_id')
            ->where([
                ['perfils.status', 0],
                ['users.is_permission', 1],
            ])->get();

        if (request()->slug) {
            $users = User::whereIn('is_permission', [1, 0])->whereHas('habilidades',
                function ($query) {
                    $query->where('slug', request()->slug);
                })->paginate(5);
            $habilidades = Habilidade::with('users')->get();
            //$todas_habilidades = Habilidade::all();

        } else {
            $users = User::whereIn('is_permission', [1, 0])->paginate(5);
            $habilidades = Habilidade::with('users')->get();
            $todas_habilidades = Habilidade::all();
        }

        return view('admin.gerir_usuarios_list',
            compact([
                'users',
                'habilidades',
                'todas_habilidades',
                'freelancers_perfil_activos',
                'freelancers_perfil_completos',
                'freelancers_perfil_incompletos',
                'clientes_perfil_activos',
                'clientes_perfil_completos',
                'clientes_perfil_incompletos']));

    }

    public function show (User $user) {
        if ($user->is_permission==1) {
            return $this->showCliente($user);
        }
           else
               return $this->showFreelancer($user);
    }

    public function showCliente (User $user){
        $transacoes = $user->transacoes()->distinct()->whereNotNull('metodo_id')->get(['metodo_id']);
        return view('admin.includes.ver_cliente_admin', compact(['user', 'transacoes']) );
    }

    public function showFreelancer (User $user){
        $transacoes = $user->transacoes()->distinct()->whereNotNull('metodo_id')->get(['metodo_id']);
        return view('admin.includes.ver_freelancer_admin', compact(['user', 'transacoes']) );
    }

    protected function apagarUser(User $user)
    {
        //Perfil::where('user_id', $user->id)->update(['status'=> 0]);
        //return back()->with('success-apagar-user', 'O seu novo email é '.$request->email.'.');
    }

    protected function suspenderUser(User $user)
    {
        Perfil::where('user_id', $user->id)->update(['status'=> 3]);
        User::where('id', $user->id)->update(['status'=> 2]);
        return back()->with('success', 'A conta de '.$user->name.' foi suspensa com sucesso.');
    }

    protected function reactivarUser(User $user)
    {
        Perfil::where('user_id', $user->id)->update(['status'=> 1]);
        User::where('id', $user->id)->update(['status'=> 1]);
        return back()->with('success', 'A conta de '.$user->name.' foi reactivada com sucesso.');
    }
}