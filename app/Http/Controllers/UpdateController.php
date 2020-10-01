<?php


namespace App\Http\Controllers;

use App\ExperEduca;
use App\Notifications\NovoTrabalhoDisponivel;
use App\Notifications\NovoUsuarioCadastrado;
use App\Notifications\PerfilAprovado;
use App\Review_tipo;
use App\Review_trab;
use App\Trabalho;
use App\habilidade;
use App\Http\Controllers\Controller;
use App\perfil;
use App\Transacao;
use App\User;
use Auth;
use App\HabilidadeUser;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;


class UpdateController extends Controller
{
    public function ListarUsuarios ()
    {
        $users = User::with('habilidades')->where
        ([
            ['is_permission', '=', '0'],
            ['status', '=', '1'],
        ])->get();

        $habilidades = Habilidade::with('users')->get();
        return view('paginas_de_testes.listar_usuarios', compact(['users','habilidades']));

    }

    public function VerUsuariosDaProvincia ()
    {
        $usuarios = DB::table('users')
            ->leftJoin('perfils', 'users.id', '=', 'perfils.user_id')
            ->where([
                ['users.status', 1],
                ['users.is_permission', 0],
                ['perfils.provincia', 'Inhambane'],

            ])
            ->leftJoin('habilidade_user', 'users.id', '=', 'habilidade_user.user_id')
            ->where([
                ['habilidade_user.habilidade_id', 2],
                    ])
            ->get();




        foreach($usuarios as $usuario)
        {
            $user = User::where('id', $usuario->user_id)->firstOrFail();
            Notification::send($user, new NovoTrabalhoDisponivel());
            //dd($user);
        }

    }


    public function paginaDeTestes01(Request $request)
    {
        $provincias = perfil::distinct()->whereNotNull('provincia')->get(['provincia']);
        $pesquisa = request()->get('query-freelancers');
        $provincia_filter = request()->get('prov');
        $categoria_filter = request()->get('cat');

        $habilidades = Habilidade::with('users')->get();
        $todas_habilidades = Habilidade::all();

        if ($provincia_filter == null) {
            $users = User::with('habilidades')->where([
                ['is_permission', '=', '0'],
                ['status', '=', '1'],
                ['name', 'like', "%$pesquisa%"]])->whereHas('habilidades',
                function ($query){
                    $cat = request()->get('cat');
                    $query->whereIn('slug', $cat);}
               )->paginate(5);
        }

        elseif ($categoria_filter == null) {
            $users = User::with('habilidades')->where([
                ['is_permission', '=', '0'],
                ['status', '=', '1'],
                ['name', 'like', "%$pesquisa%"]])->whereHas('perfil', function ($query) {
                $query->whereIn('provincia', request()->get('prov'));
            })->paginate(5);
        }

        else {
            $users = User::with('habilidades')->where([
                ['is_permission', '=', '0'],
                ['status', '=', '1'],
                ['name', 'like', "%$pesquisa%"]])->whereHas('habilidades',
                function ($query){
                    $cat = request()->get('cat');
                    $query->whereIn('slug', $cat);})->whereHas('perfil', function ($query) {
                $query->whereIn('provincia', request()->get('prov'));
            })->paginate(5);
        }

        return view('paginas_gerais.usuarios.freelancers_list', compact(['users','habilidades', 'todas_habilidades', 'provincias']));
    }
    public function paginaDeTestes()
    {


            $provincias = perfil::distinct()->whereNotNull('provincia')->get(['provincia']);
            //dd($provincias);
            $users = User::with('habilidades')->where([
                ['is_permission', '=', '0'],
                ['status', '=', '1'],
                ['name', 'like', "%A%"]])->whereHas('habilidades',
                function ($query){
                    $cat = ['carpetaria', 'ux-design'];
                    $query->whereIn('slug', $cat);})->whereHas('perfil', function ($query) {
                $query->whereIn('provincia', ['Tete', 'Inhambane']);
            })->paginate(5);

            $habilidades = Habilidade::with('users')->get();
            $todas_habilidades = Habilidade::all();





        return view('paginas_gerais.usuarios.freelancers_list', compact(['users','habilidades', 'todas_habilidades', 'provincias']));
        //return view('about', compact('valores'));

    }

    public function paginaDeTestesForm()
    {
        $admin = User::where('is_permission', 2)->firstOrFail();
        $detalhes = [
           // 'simples' => 'O registro do perfil de '.Auth::user()->name.' foi terminado, veja os detalhes',
            'simples' => '<b>'.$admin->name. '<\/b> pediu a confirmação para '.$admin->name.'.',
            'user_id' => 17,
        ];
        Notification::send($admin, new NovoUsuarioCadastrado($detalhes));
        dd('passou');
    }

    public function notaTeste()
    {

        $nota = Review_trab::where([['user_id', 13], ['id_trabalho', 9]])->avg('nota');
        $round_num = round($nota * 2) /2;
        $nota = round($round_num, 2);


        if ($nota == 0 )
        {
            dd('Sem Avaliações');
        }

        else
        {
            dd($nota);
        }


    }

    public function storeTrabalho (Request $request)
    {
        $trabalho = Trabalho::create([
            'nome_trabalho' => 'Nome do Trabalho',
            //'id_freelancer' => Auth::user()->id
        ]);

        if ($request->has('habilidade_id'))
        {
            $trabalho->habilidades()->sync($request->get('habilidade_id'));
        }
        return redirect()->back();
    }

    public function printPDF(Transacao $transacao)
    {

        $data = Transacao::find($transacao->id);
        $data = view()->share('dados', $data);

        $pdf = PDF::loadView('pdf_factura', $data);
        return $pdf->download('factura-nr-000'.$data->id.'.pdf');
    }

    public function verNotificacao ($notification) {

        $user = Auth::user()->notifications;

        foreach ($user as $notificacao) {
            if ($notification == $notificacao->id){
                $notificacao->markAsRead();
                switch ($notificacao->type){
                    case 'App\Notifications\PerfilAprovado':
                        return redirect('home-2');
                        break;
                    case 'App\Notifications\NovoTrabalhoDisponivel':
                        return redirect('home-2');
                        break;
                    case 'App\Notifications\AprovarProposta':
                        return redirect()->route('trabalho.show', ['trabalho' => $notificacao->data['url_id']]);
                        break;
                }


            }
        }
    }


}