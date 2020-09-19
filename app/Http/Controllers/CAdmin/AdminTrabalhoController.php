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
}
