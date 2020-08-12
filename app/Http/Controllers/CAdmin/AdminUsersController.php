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
}