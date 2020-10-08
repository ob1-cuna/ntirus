<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\ExperEduca;


class ExperEducaController extends Controller
{
    public function update(ExperEduca $Expereduca)
    {
        $Expereduca->update($this->validarDados());

        if (request()->data_terminio == null)
        {
            Expereduca::where('id', $Expereduca->id)->update(['data_terminio'=> '1900-01-01']);
        }

        return redirect()->back();

    }

    public function destroy(ExperEduca $Expereduca)
    {
        $Expereduca->delete();
        return redirect()->back();
    }

    public function store ()
    {
        ExperEduca::create($this->validarDados());
        return redirect()->back();
    }



    protected function validarDados()
    {
        if (request()->data_terminio == null)
            return $data = request()->validate([
                'user_id' => ['required'],
                'tipo' => ['required'],
                'instituicao' => ['required', 'string', 'max:150'],
                'nome' => ['required', 'string', 'max:150'],
                'data_inicio' => ['required'],
                'descricao' => ['string'],

            ]);

        else
            return $data = request()->validate([
                'user_id' => ['required'],
                'tipo' => ['required'],
                'instituicao' => ['required', 'string', 'max:150'],
                'nome' => ['required', 'string', 'max:150'],
                'data_inicio' => ['required'],
                'data_terminio' => ['string'],
                'descricao' => ['string'],
            ]);
    }
}
