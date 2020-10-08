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

                    case 'App\Notifications\NovoUsuarioCadastrado':
                        return redirect()->route('admin.dashboard.usuarios.show', ['user' => $notificacao->data['url_id']]);
                        break;

                    case 'App\Notifications\TrabalhoAprovado':
                        return redirect()->route('dashboard.trabalhos.em_andamento');
                        break;

                    case 'App\Notifications\TrabalhoRejeitado':
                        return redirect()->route('dashboard.trabalhos.em_andamento');
                        break;

                    case 'App\Notifications\PedidoDeAprovacaoDeTrabalho':
                        return redirect()->route('cliente.trabalhos.em_andamento');
                        break;

                    case 'App\Notifications\TrabalhoCanceladoFreelancer':
                        return redirect()->route('cliente.trabalhos.cancelados');
                        break;

                    case 'App\Notifications\TrabalhoCanceladoCliente':
                        return redirect()->route('dashboard.trabalhos.cancelados');
                        break;

                    case 'App\Notifications\PedidoDeSaque':
                        return redirect()->route('admin.dashboard.transacoes.pagar.index', ['transacao' => $notificacao->data['url_id']]);
                        break;

                    case 'App\Notifications\SaqueConfirmado':
                        return redirect()->route('dashboard.invoices.show', ['transacao' => $notificacao->data['url_id']]);
                        break;

                    case 'App\Notifications\PagamentoCliente':
                        return redirect()->route('admin.dashboard.transacoes.show', ['transacao' => $notificacao->data['url_id']]);
                        break;

                    case 'App\Notifications\PagamentoConfirmadoCliente':
                        return redirect()->route('cliente.invoices.show', ['transacao' => $notificacao->data['url_id']]);
                        break;

                    case 'App\Notifications\PagamentoConfirmadoFreelancer':
                        return redirect()->route('dashboard.invoices.show', ['transacao' => $notificacao->data['url_id']]);
                        break;
                }


            }
        }
    }
}