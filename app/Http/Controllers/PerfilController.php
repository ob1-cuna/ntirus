<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Perfil;
use App\HabilidadeUser;
use App\ExperEduca;
use App\habilidade;
use Auth;


class PerfilController extends Controller
{
    public function cadastro ()
    {
        $habilidades = Habilidade::all();
        return view('paginas_extras.perfil_cadastro', compact('habilidades'));

    }

    public function CadastrarPerfil (Request $request)
    {

        $user = $request->input('user_id');
        $provincia = $request->input('provincia');
        $preco_habitual = $request->input('preco_habitual');
        $slogan = $request->input('slogan');
        $descricao = $request->input('descricao');
        $fb_link = $request->input('fb_link');
        $twt_link = $request->input('twt_link');

        DB::table('perfils')
            ->where('user_id', $user)
            ->update([
                'cidade' => 15,
                'provincia' => $provincia,
                'preco_habitual' => $preco_habitual,
                'slogan' => $slogan,
                'descricao' => $descricao,
                'fb_link' => $fb_link,
                'twt_link' => $twt_link,
                'updated_at' => now(\DateTimeZone::AMERICA),
            ]);


        $habilidadeuser = HabilidadeUser::create($this->validarHabilidades());
        DB::table('users')
            ->where('id', $user)
            ->update([
                'status' => 1,
                'updated_at' => now(\DateTimeZone::AMERICA),
            ]);
        return redirect('/');
    }

    /*protected function validarDados()
    {
        return $data = request()->validate( [

            'preco_habitual' => ['required', 'string', 'max:255'],
            'slogan' => ['required', 'string', 'max:150'],
            'descricao' => ['required', 'string', 'max:150'],
            'provincia' => ['required'],
            'cidade' => ['required', 'string'],
            'fb_link' => ['string'],
            'twt_link' => ['string'],
            ]);
    }*/

    protected function validarHabilidades()
    {
        return $data = request()->validate( [
            'user_id'  => ['required'],
            'habilidade_id' => ['required'],
            'classificacao' => ['required'],
        ]);
    }

}
