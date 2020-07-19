<?php

namespace App\Http\Controllers;

use App\habilidade;
use App\User;
use App\Imagem;
use App\Trabalho;
use Faker\Provider\Image;
use Illuminate\Http\Request;

class ImagemController extends Controller
{
    public function teste ()
    {
        $habilidades = Habilidade::all();
        return view('paginas_extras.perfil_cadastro', compact('habilidades'));

    }

    public function index()
    {
        $user = User::find(3);
        $imagems = $user->imagems;
        
        return view('paginas_de_testes.uploads', compact('imagems'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagem = new Imagem;

        if ($request->file('file'))
        {
            $imagemCaminho = $request->file('file');
            $nomeImagem = $imagemCaminho->getClientOriginalName();
            $path = $request->file('file')->storeAs('uploads', $nomeImagem);
        }

        $imagem->nome_imagem = $nomeImagem;
        $imagem->caminho = '/storage/'.$path;
        $imagem->id_usuario = 3;
        $imagem->imagemable_type = 'App\User';
        $imagem->imagemable_id = 3;
        $imagem->save();

        return redirect()->back();
    }
}
