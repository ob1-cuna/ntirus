<?php


namespace App\Http\Controllers\CFreelancer;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FreelancerDefinicoesController extends Controller
{
    public function definicoesConta ()
    {
          return view('freelancer.definicoes_da_conta_freelancer');
    }
}