<?php

use Illuminate\Support\Facades\Route;


//Pagina Principal (com ou sem login).
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
});

Route::get('/home-2', function () {
    return view('paginas_gerais/home_page');
})->name('home-2');

Route::get('/nav', function () {
    return view('cliente/factura_pay');
});

//PAGINAS VISIVEIS COM OU SEM LOGIN
Route::get('/freelancers/','UserController@ListarUsuariosCategoria')->name('freelancers');
Route::get('/freelancers!p','UserController@filtrarFreelancers')->name('freelancers.filter');
Route::get('/f/{user}', 'UserController@showFreelancer')->name('freelancers.show');
Route::get('/c/{user}', 'UserController@showCliente')->name('cliente.show');

Route::get('/trabalhos', 'TrabalhoController@listarTrabalhos')->name('trabalhos.list');
Route::get('/trabalhos!p', 'TrabalhoController@filtrarTrabalhos')->name('trabalhos.filter');
Route::get('/t/{trabalho}', 'TrabalhoController@exibirTrabalho')->name('trabalho.show');


//VERIFICADOR DE EMAIL DO USUARIO
Auth::routes(['verify'=>true]);

Route::group(['middleware'=>'auth'], function () {

	Route::group(['middleware'=>'verified'], function () {

	    //CADASTRO DO PERFIL E HABILIDADE PRINCIPAL DO USUÁRIO
        Route::get('registro/perfil','PerfilController@cadastro')->name('registro/perfil');
        Route::post('registro/perfil/post','PerfilController@CadastrarPerfil')->name('registro.perfil.post');
        Route::get('/registo/terminado', 'PerfilController@cadastroConcluido')->name('registo.concluido');
        Route::get('/registro/fix', 'PerfilController@cadastroFix')->name('registo.fix');
        Route::patch('perfil/update','PerfilController@perfilEdit')->name('perfil.edit');
        Route::post('definicoes/update/password','DefinicoesController@updatePassword')->name('update.password');
        Route::post('definicoes/update/email','DefinicoesController@changeEmail')->name('update.email');

            Route::group(['middleware'=>'check-permission:freelancer'], function () {

			    Route::group(['middleware'=>'check-perfil:p_completo'], function () {

			        //DASHBOARD DO FREELANCER

                    Route::get('/dashboard','HomeController@freelancer')->name('dashboard');
                    Route::post('/dashboard/trabalho/{trabalho}', 'CFreelancer\FreelancerTrabalhoController@solicitarAprovacao')->name('freelancer.trabalho.solicitar_aprovacao');
                    Route::post('/dashboard/cancelar/trabalho/{trabalho}', 'CFreelancer\FreelancerTrabalhoController@cancelarTrabalho')->name('freelancer.trabalho.cancelar_trabalho');

                    Route::get('/dashboard/propostas','CFreelancer\FreelancerPropostaController@ListarTrabalhosPropostos')->name('dashboard.propostas');
                        Route::get('/t/{trabalho}/concorrer', 'CFreelancer\FreelancerPropostaController@fazerProposta')->name('trabalho.concorrer');
                        Route::post('/t/{trabalho}/concorrer', 'CFreelancer\FreelancerPropostaController@storeProposta')->name('trabalho.concorrer.store');
                        Route::delete('/dashboard/propostas/{proposta}','CFreelancer\FreelancerPropostaController@destroy')->name('dashboard.propostas.delete');

                    Route::get('/dashboard/em-andamento','CFreelancer\FreelancerTrabalhoController@trabalhoEmAndamento')->name('dashboard.trabalhos.em_andamento');
                    Route::get('/dashboard/trabalhos-cancelados','CFreelancer\FreelancerTrabalhoController@trabalhosCancelados')->name('dashboard.trabalhos.cancelados');

                    Route::get('/dashboard/trabalhos-finalizados','CFreelancer\FreelancerTrabalhoController@trabalhosFinalizados')->name('dashboard.trabalhos.finalizados');
                        Route::get('dashboard/avaliacao/{trabalho}','CFreelancer\FreelancerAvaliacaoController@index')->name('dashboard.trabalhos.finalizados.avaliacao');
                            Route::post('dashboard/avaliacao/{trabalho}','CFreelancer\FreelancerAvaliacaoController@store')->name('dashboard.trabalhos.finalizados.avaliacao.store');


                    //PERFIL DO USUARIO CADASTRADO COM SUCESSO
                    Route::get('dashboard/perfil', 'CFreelancer\FreelancerPerfilController@meuPerfilFreelancer')->name('dashboard.perfil');

                    //remocao, adicao e actualizacao de habilidades do perfil do usuario, pelo usuario cadastrado
                    Route::delete('dashboard/perfil/habilidade/{habilidade}', 'HabilidadeUserController@deleteUsersHabilidades')->name('dashboard.perfil.habilidade.apagar');
                    Route::post('dashboard/perfil/habilidade', ('HabilidadeUserController@addUsersHabilidades'))->name('dashboard.perfil.habilidade.sincronizar');

                    //CRUD de Experiencia Profissional e Educação do Usuario, pelo Usuario.
                    Route::patch('dashboard/perfil/edu-exp/{expereduca}', 'ExperEducaController@update')->name('dashboard.perfil.exp-educa.actualizar');
                    Route::post('dashboard/perfil/edu-exp/', 'ExperEducaController@store')->name('dashboard.perfil.exp-educa.adicionar');
                    Route::delete('dashboard/perfil/edu-exp/{expereduca}', 'ExperEducaController@destroy')->name('dashboard.perfil.exp-educa.apagar');

                    //Transações Freelancer
                    Route::get('/dashboard/invoices/pendentes','CFreelancer\FreelancerTransacaoController@invoicesPendentes')->name('dashboard.invoices.pendentes.list');
                    Route::get('/dashboard/invoices/pagos','CFreelancer\FreelancerTransacaoController@invoicesPagos')->name('dashboard.invoices.pagos.list');
                    Route::get('/dashboard/invoices/i/{transacao}','CFreelancer\FreelancerTransacaoController@invoiceShow')->name('dashboard.invoices.show');
                    Route::get('/dashboard/invoices/download/{transacao}','CFreelancer\FreelancerTransacaoController@invoiceDownload')->name('dashboard.invoices.download');
                    Route::get('/dashboard/saque/','CFreelancer\FreelancerTransacaoController@saque')->name('dashboard.invoices.saque');
                    Route::get('/dashboard/saque#step-2','CFreelancer\FreelancerTransacaoController@saque')->name('dashboard.invoices.saque.step-2');
                    Route::post('/dashboard/saque/','CFreelancer\FreelancerTransacaoController@saqueStore')->name('dashboard.invoices.saque.store');

                    //Definições da conta do Freelancer
                    Route::get('/dashboard/definicoes','CFreelancer\FreelancerDefinicoesController@definicoesConta')->name('dashboard.definicoes');
                });
		});

            Route::group(['middleware' => 'check-permission:cliente'], function (){

                Route::group(['middleare' => 'p_completo'], function (){

                    //DASHBOARD CLIENTE

                    Route::get('/cliente/dashboard','HomeController@cliente')->name('cliente.dashboard');

                    Route::get('/cliente/postar-job', 'CCliente\ClienteTrabalhoController@postarTrabalho')->name('cliente.postar_job');
                    Route::post('/cliente/postar-job', 'CCliente\ClienteTrabalhoController@storeTrabalho')->name('cliente.postar_job.store');

                    Route::get('/cliente/actualizar-job/{trabalho}', 'CCliente\ClienteTrabalhoController@editTrabalho')->name('cliente.postar_job.edit.view');
                    Route::post('/cliente/actualizar-job/{trabalho}/store', 'CCliente\ClienteTrabalhoController@editTrabalhoStore')->name('cliente.postar_job.edit');
                    Route::delete('/cliente/apagar-job/{trabalho}/destroy', 'CCliente\ClienteTrabalhoController@destroyTrabalho')->name('cliente.trabalho.destroy');

                    Route::get('/cliente/trabalho/em-andamento','CCliente\ClienteTrabalhoController@listarTrabalhosEmAndamentoCliente')->name('cliente.trabalhos.em_andamento');
                        Route::post('/cliente/trabalho/aprovar/{trabalho}', 'CCliente\ClienteTrabalhoController@aprovarTrabalhoEmExecucao')->name('cliente.trabalho.em_andamento.aprovar');
                        Route::post('/cliente/trabalho/rejeitar/{trabalho}', 'CCliente\ClienteTrabalhoController@rejeitarTrabalhoEmExecucao')->name('cliente.trabalho.em_andamento.rejeitar');
                        Route::post('/cliente/trabalho/cancelar/{trabalho}', 'CCliente\ClienteTrabalhoController@cancelarTrabalhoEmExecucao')->name('cliente.trabalho.em_andamento.cancelar');

                    Route::get('/cliente/trabalho/cancelados','CCliente\ClienteTrabalhoController@trabalhosCancelados')->name('cliente.trabalhos.cancelados');

                    Route::get('/cliente/trabalho/finalizados','CCliente\ClienteTrabalhoController@trabalhosFinalizados')->name('cliente.trabalhos.finalizados');
                        Route::get('cliente/avaliacao/{trabalho}','CCliente\ClienteAvaliacaoController@index')->name('cliente.trabalhos.finalizados.avaliacao');
                            Route::post('cliente/avaliacao/{trabalho}','CCliente\ClienteAvaliacaoController@store')->name('cliente.trabalhos.finalizados.avaliacao.store');

                    Route::get('/cliente/invoices/pagos', 'CCliente\ClientePagamentosController@invoicesPagos')->name('cliente.invoices.pagos');
                    Route::get('/cliente/invoices/pendentes', 'CCliente\ClientePagamentosController@invoicesPendentes')->name('cliente.invoices.pendentes');
                    Route::get('/cliente/invoices/i/{transacao}', 'CCliente\ClientePagamentosController@show')->name('cliente.invoices.show');
                    Route::get('/cliente/invoices/p/{transacao}', 'CCliente\ClientePagamentosController@efectuarPagamento')->name('cliente.invoices.pay');
                    Route::get('/cliente/invoices/p/{transacao}#step-2', 'CCliente\ClientePagamentosController@efectuarPagamento')->name('cliente.invoices.pay-2');
                    Route::post('/cliente/invoices/p/{transacao}/store', 'CCliente\ClientePagamentosController@efectuarPagamentoStore')->name('cliente.invoices.pay.store');
                    Route::get('/factura/pdf/{transacao}', 'CCliente\ClientePagamentosController@printPDF')->name('imprimir.factura.cliente');

                    Route::get('/cliente/perfil', 'CCliente\ClientePerfilController@meuPerfil')->name('cliente.perfil');

                    //Route::post('cliente/interrese/', ('HabilidadeUserController@addUsersHabilidades'))->name('cliente.interrese.post');
                    //Route::delete('cliente/interrese/{habilidade}', 'HabilidadeUserController@deleteUsersHabilidades')->name('cliente.interrese.delete');;


                    Route::get('/cliente/trabalhos/abertos', 'CCliente\ClienteTrabalhoController@listarTrabalhosAbertosCliente')->name('cliente.trabalhos.abertos');
                    Route::get('/cliente/trabalhos/abertos/{trabalho}', 'CCliente\ClienteTrabalhoController@exibirPropostasCliente')->name('cliente.trabalhos.abertos.proposta.show');
                    Route::post('/cliente/proposta/{proposta}', 'CCliente\ClientePropostaController@aceitarProposta')->name('cliente.propostas.aceitar');

                    //Definicoes da conta do cliente
                    Route::get('/cliente/definicoes', 'CCliente\ClienteDefinicoesController@definicoesConta')->name('cliente.definicoes');

                });

            });
	});
//DASHBOARD ADMINISTRADOR
    Route::group(['middleware'=>'check-permission:admin'], function ()
    {
	    Route::get('/admin/dashboard','HomeController@admin')->name('admin.dashboard');
        Route::post('/admin/aprovar/perfil/{user}', 'CAdmin\AdminUsersController@aprovarPerfil')->name('admin.usuario.aprovar_perfil');

        Route::get('/admin/dashboard/categorias','CAdmin\AdminHabilidadesController@index')->name('admin.dashboard.categorias.index');
        Route::post('/admin/dashboard/categoria','CAdmin\AdminHabilidadesController@store')->name('admin.dashboard.categorias.store');
        Route::post('/admin/dashboard/categoria/{habilidade}/update','CAdmin\AdminHabilidadesController@update')->name('admin.dashboard.categorias.update');
        Route::delete('/admin/dashboard/categoria/{habilidade}/delete','CAdmin\AdminHabilidadesController@destroy')->name('admin.dashboard.categorias.delete');
        Route::post('/admin/dashboard/categoria/{habilidade}/ocultar','CAdmin\AdminHabilidadesController@ocultar')->name('admin.dashboard.categorias.ocultar');

        Route::get('/admin/dashboard/usuarios','CAdmin\AdminUsersController@index')->name('admin.dashboard.usuarios.index');
        Route::get('/admin/dashboard/usuarios/p', 'CAdmin\AdminUsersController@pesquisarUser')->name('admin.dashboard.usuarios.pesquisar');
        Route::get('/admin/dashboard/usuario/{user}','CAdmin\AdminUsersController@show')->name('admin.dashboard.usuarios.show');
            Route::post('/admin/dashboard/usuarios/{user}/apagar', 'CAdmin\AdminUsersController@apagarUser')->name('admin.dashboard.usuarios.apagar');
            Route::post('/admin/dashboard/usuarios/{user}/suspender', 'CAdmin\AdminUsersController@suspenderUser')->name('admin.dashboard.usuarios.suspender');
            Route::post('/admin/dashboard/usuarios/{user}/reactivar', 'CAdmin\AdminUsersController@reactivarUser')->name('admin.dashboard.usuarios.reactivar');

        Route::get('/admin/dashboard/trabalhos','CAdmin\AdminTrabalhoController@index')->name('admin.dashboard.trabalho.index');
        Route::get('/admin/dashboard/trabalhos!p','CAdmin\AdminTrabalhoController@pesquisar')->name('admin.dashboard.trabalho.pesquisar');
        Route::get('/admin/dashboard/trabalhos/t/{trabalho}','CAdmin\AdminTrabalhoController@show')->name('admin.dashboard.trabalho.show');
            Route::post('/admin/dashboard/trabalho/{trabalho}/ocultar','CAdmin\AdminTrabalhoController@ocultar')->name('admin.dashboard.trabalho.ocultar');
            Route::post('/admin/dashboard/trabalho/{trabalho}/reabrir','CAdmin\AdminTrabalhoController@reabrir')->name('admin.dashboard.trabalho.reabrir');
            Route::delete('/admin/dashboard/trabalho/{trabalho}/delete','CAdmin\AdminTrabalhoController@delete')->name('admin.dashboard.trabalho.delete');

        Route::get('/admin/dashboard/transacoes/pendentes','CAdmin\AdminPagamentosController@invoicesPendentes')->name('admin.dashboard.transacoes.pendentes');
        Route::get('/admin/dashboard/transacoes/pagos','CAdmin\AdminPagamentosController@invoicesPagos')->name('admin.dashboard.transacoes.pagos');
        Route::get('/admin/dashboard/transacao/{transacao}','CAdmin\AdminPagamentosController@show')->name('admin.dashboard.transacoes.show');
        Route::post('/admin/dashboard/transacao/{transacao}/','CAdmin\AdminPagamentosController@confirmarPagamento')->name('admin.dashboard.transacoes.confirmar');
        Route::get('/admin/dashboard/transacao/{transacao}/pagar','CAdmin\AdminPagamentosController@efectuarPagamentoIndex')->name('admin.dashboard.transacoes.pagar.index');
        Route::get('/admin/dashboard/transacao/{transacao}/pagar#step-2','CAdmin\AdminPagamentosController@efectuarPagamentoIndex')->name('admin.dashboard.transacoes.pagar.index-2');
        Route::post('/admin/dashboard/transacao/{transacao}/pagar','CAdmin\AdminPagamentosController@efectuarPagamentoStore')->name('admin.dashboard.transacoes.pagar.store');

        Route::get('/admin/dashboard/definicoes', 'CAdmin\AdminDefinicoesController@definicoesConta')->name('admin.definicoes');
    });
});

//PAGINAS EM FASE DE TESTES


    Route::get('/teste-01', 'UpdateController@paginaDeTestes')->name('teste');
    Route::get('/teste-02', 'UpdateController@paginaDeTestes01')->name('teste-02');
    Route::get('/form', 'UpdateController@paginaDeTestesForm')->name('teste_form');
    Route::get('/teste-review', 'UpdateController@notaTeste')->name('teste-review');
    Route::get('/teste-notificacao', 'UpdateController@VerUsuariosDaProvincia')->name('teste_de_notificacao');
	Route::get('/upload', 'ImagemController@index');
	Route::post('/upload', 'ImagemController@store')->name('upload.store');
    Route::get('/customer/print-pdf/{transacao}', 'UpdateController@printPDF')->name('pdf-file');

