<?php


namespace App\Http\Controllers\CAdmin;

use App\habilidade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AdminHabilidadesController extends Controller
{
    protected function index()
    {
        $habilidades = habilidade::all();
        return view('admin.gerir_habilidades', compact(['habilidades']));
    }

    protected function store (Request $request)
    {
        habilidade::create($this->validarDados());
        return back()->with('success', 'A categoria '.$request->nome.' foi adicionada com sucesso.');
    }

    protected function update (habilidade $habilidade)
    {
        $habilidade->update($this->validarDados());
        return back()->with('success', 'A categoria '.$habilidade->nome.' foi actualizada com sucesso.');
    }

    protected function destroy (habilidade $habilidade)
    {
        $habilidade->delete();
        return back()->with('success', 'Removeste a categoria '.$habilidade->nome.' com sucesso.');
    }

    protected function ocultar (habilidade $habilidade)
    {
        habilidade::where('id', $habilidade->id)->update(['visibilidade'=> 2]);
        return back()->with('success', 'A habilidade '.$habilidade->nome.' será ocultada da aplicação');
    }

    protected function validarDados()
    {
        return $data = request()->validate( [
            'nome' => ['required', 'string'],
            'slug' => ['required', 'string', 'max:20'],
        ]);
    }
}