<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Notifications\NovoUsuarioCadastrado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Perfil;
use App\HabilidadeUser;
use App\ExperEduca;
use App\Habilidade;
use Auth;


class PerfilController extends Controller
{
    public function cadastro ()
    {
        $habilidades = Habilidade::all();
        return view('auth.perfil_cadastro', compact('habilidades'));

    }

    public function perfilEdit (Request $request)
    {
        $user = Auth::user()->id;
        $provincia = $request->input('provincia');
        $cidade = $request->input('cidade');
        $descricao = $request->input('descricao');
        $name = $request->input('name');

        DB::table('perfils')
            ->where('user_id', $user)
            ->update([
                'cidade' => $cidade,
                'provincia' => $provincia,
                'descricao' => $descricao,
                'updated_at' => now(\DateTimeZone::AMERICA),
            ]);

        DB::table('users')
            ->where('id', $user)
            ->update([
                'name' => $name,
                'updated_at' => now(\DateTimeZone::AMERICA),
            ]);
        return back()->with('success', 'Perfil actualizado com sucesso');
    }

    public function cadastroConcluido ()
    {
        return view('auth.cadastro_ultimo_passo');
    }
    public function cadastroFix ()
    {
        $habilidades = Habilidade::all();
        return view('auth.perfil_bug_fix', compact('habilidades'));
    }
    public function CadastrarPerfil (Request $request)
    {

        $user = Auth::user()->id;
        $provincia = $request->input('provincia');
        $cidade = $request->input('cidade');
        $descricao = $request->input('descricao');
        $username = $request->input('username');

        DB::table('perfils')
            ->where('user_id', $user)
            ->update([
                'cidade' => $cidade,
                'provincia' => $provincia,
                'descricao' => $descricao,
                'status' => 2,
                'updated_at' => now(\DateTimeZone::AMERICA),
            ]);

        DB::table('users')
            ->where('id', $user)
            ->update([
                'username' => $username,
                'updated_at' => now(\DateTimeZone::AMERICA),
            ]);

        if ($request->has('habilidade_id'))
        {
            Auth::user()->habilidades()->sync($request->get('habilidade_id'));
        }

        $admin = User::where('is_permission', 2)->firstOrFail();
        $detalhes = [
            'simples' => 'O registro do perfil de '.Auth::user()->name.' foi terminado, veja os detalhes',
            'user_id' => $user,
        ];
        Notification::send($admin, new NovoUsuarioCadastrado($detalhes));

        return redirect('/registo/terminado');
    }
}

/*if ($request->has('habilidade_id'))
{
    $habilidades_user = HabilidadeUser::create([
        'user_id' => Auth::user()->id,
        'habilidade_id' => $request->get('habilidade_id')
    ]);
}*/


