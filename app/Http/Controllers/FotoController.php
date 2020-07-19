<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Foto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function index()
    {
        $fotos = Foto::orderBy('id', 'desc')->get();
        return view('paginas_de_testes.uploads', compact('fotos'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $foto = new Foto;

        if ($request->file('file'))
        {
            $fotoPath = $request->file('file');
            $fotoImg = $fotoPath->getClientOriginalName();
            $path = $request->file('file')->storeAs('uploads', $fotoImg);
        }

        $foto->img = $fotoImg;
        $foto->path = '/storage/'.$path;
        $foto->save();

        return redirect()->back();
    }

}

