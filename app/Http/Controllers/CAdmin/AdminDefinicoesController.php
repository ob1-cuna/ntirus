<?php


namespace App\Http\Controllers\CAdmin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminDefinicoesController extends Controller
{
    public function definicoesConta ()
    {
          return view('admin.definicoes_da_conta');
    }
}