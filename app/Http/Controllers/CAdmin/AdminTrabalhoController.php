<?php

namespace App\Http\Controllers\CAdmin;

use App\Http\Controllers\Controller;
use App\Trabalho;
use Illuminate\Http\Request;

class AdminTrabalhoController extends Controller
{
    public  function index ()
    {
        $trabalhos = Trabalho::all();
        return view('admin.gerir_trabalhos_list_admin', compact('trabalhos'));
    }

    protected function ocultar (Trabalho $trabalho)
    {
        Trabalho::where('id', $trabalho->id)->update(['status'=> 'Ocultado']);
        //User::where('id', $user->id)->update(['status'=> 2]);
        return back()->with('success', 'O trabalho #'.$trabalho->slug.' pertencente a '.$trabalho->user->name.' foi ocultado com sucesso.');
    }

    protected function reabrir (Trabalho $trabalho)
    {
        $trabalho_session = Trabalho::where('id', $trabalho->id)->get();
        Trabalho::where('id', $trabalho->id)->update(['status'=> 'Aberto']);
        //User::where('id', $user->id)->update(['status'=> 2]);
        return back()->with('success', 'O trabalho #'.$trabalho->slug.' pertencente a '.$trabalho->user->name.' foi reaberto com sucesso.');
    }

    public function pesquisar (Request $request)
    {
        $request->validate([
            'query' => 'required|min:3',
        ]);

        $query = request()->input('query');
        $trabalhos_count = Trabalho::where('nome_trabalho', 'like', "%$query%")->count();
        $trabalhos = Trabalho::where('nome_trabalho', 'like', "%$query%")->get();

        return view('admin.gerir_trabalhos_list_admin', compact(['trabalhos', 'trabalhos_count']));
    }
}
