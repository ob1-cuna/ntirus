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
}