<?php


namespace App\Http\Controllers;
use Auth;



class NotificacoesController extends Controller
{
    public function verNotificacao ($notification) {

        $notificacoes_user = Auth::user()->notifications;

        foreach ($notificacoes_user as $notificacao) {

            if ($notification == $notificacao->id) {

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