<?php

namespace App\Http\Controllers;
use App\habilidade;
use App\Perfil;
use App\Proposta;
use App\Trabalho;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     
    public function index()
    {
        return view('welcome');
    }
    */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function freelancer()
    {
        $propostas = Proposta::where('user_id', Auth::user()->id)->get();
        $trabalhos = Trabalho::where('freelancer_id', Auth::user()->id)->get();
        return view ('freelancer/painel_freelancer_home', compact([
            'trabalhos',
            'propostas',
        ]));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function cliente()
    {
        $trabalhos = Trabalho::where('user_id', Auth::user()->id)->get();
        return view('cliente/painel_cliente_home', compact('trabalhos'));
    }


    /**
     * Mostra o Dashboard do admin
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $freelancersTotal = User::where('is_permission', 0)->count();
        $clientesTotal = User::where('is_permission', 1)->count();
        $users = User::with('habilidades')->whereIn('is_permission', [1, 0])->get();
        $trabalhos = Trabalho::with('habilidades')->get();
        $habilidades = Habilidade::with('users')->get();
        $perfils_bloqueados = User::where('status', 1)->get();

        return view ('admin/painel_admin_home', compact([
            'users',
            'habilidades',
            'freelancersTotal',
            'clientesTotal',
            'trabalhos',
            'perfils_bloqueados',
            ]));

    }

}
