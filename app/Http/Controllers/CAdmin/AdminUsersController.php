<?php

namespace App\Http\Controllers\CAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Expereduca;
use App\habilidade;
use App\Review_trab;
use App\Trabalho;
use App\Perfil;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Notifications\PerfilAprovado;



class AdminUsersController extends Controller
{
    public function aprovarPerfil(User $user)
    {
        $aprovarPerfil = DB::table('perfils')
            ->where('user_id', $user->id)
            ->update(['status' => 1]);

        //$user->notify(new PerfilAprovado());
        dd([$aprovarPerfil]);

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
        return view('admin.includes.ver_cliente_admin', compact('user') );
    }

    public function showFreelancer (User $user){
        return view('admin.includes.ver_freelancer_admin', compact('user') );
    }
}