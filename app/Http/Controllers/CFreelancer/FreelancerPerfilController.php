<?php


namespace App\Http\Controllers\CFreelancer;

use App\Http\Controllers\Controller;
use App\Perfil;
use Auth;
use Illuminate\Http\Request;
use App\ExperEduca;
use App\habilidade;
use Illuminate\Support\Facades\DB;

class FreelancerPerfilController extends Controller
{
    protected function meuPerfilFreelancer()
    {

        $perfil = Perfil::where('user_id', Auth::user()->id)->firstOrFail();
        $habilidades = Habilidade::all();

        $exper_profs = ExperEduca::where([['user_id', Auth::user()->id],
            ['tipo', 'exper_prof']])->get();

        $educas = ExperEduca::where([['user_id', Auth::user()->id],
            ['tipo', 'educacao']])->get();

        return view('freelancer.meu_perfil_freelancer', compact(['perfil', 'educas', 'exper_profs','habilidades']));
    }


    protected function actualizarPerfilCadastro(Request $request)
    {

        $user = Auth::user()->id;
        $username = $request->input('name');
        $provincia = $request->input('provincia');
        $cidade = $request->input('cidade');
        $descricao = $request->input('descricao');


        DB::table('perfils')
            ->where('user_id', $user)
            ->update([
                'provincia' => $provincia,
                'cidade' => $cidade,
                'descricao' => $descricao,
                'updated_at' => now(\DateTimeZone::AMERICA),
            ]);

        DB::table('users')
            ->where('id', $user)
            ->update([
                'username' => $username,
                'updated_at' => now(\DateTimeZone::AMERICA),
            ]);
        return redirect()->back();
    }
}