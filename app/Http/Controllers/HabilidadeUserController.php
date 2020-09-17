<?php

namespace App\Http\Controllers;

use App\Habilidade;
use App\User;
use App\Perfil;
use App\HabilidadeUser;
use Illuminate\Http\Request;
use Auth;


class HabilidadeUserController extends Controller

{
    protected $guarded = [];
    public function verUsersHabilidades ()
    {
        $users = User::with('habilidades')->where('is_permission', 0)->get();
        $habilidades = Habilidade::with('users')->get();
        return view ('user_talentos', compact(['users','habilidades']));

    }

    public function deleteUsersHabilidades (Habilidade $habilidade)
    {
        $user = User::find(Auth::user()->id);
        $user->habilidades()->detach($habilidade);
        return back()->with('success-remove-habilidade', 'Removeste '.$habilidade->nome.' do seu perfil com sucesso');
    }

    //A funcao tambem faz a actualizacao da classificacao da habilidade/talento
    public function addUsersHabilidades (Request $request)
    {
        $user = User::find(Auth::user()->id);
        $classificacao = $request->input('classificacao');
        $habilidade = $request->input('habilidade_id');
        $user->habilidades()->syncWithoutDetaching([$habilidade => ['classificacao' => $classificacao]]);

        return back()->with('success-add-habilidades', 'Habilidades actualizadas com sucesso');

    }
}
