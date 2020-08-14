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
});

Route::get('/nav', function () {
    return view('paginas_de_testes/nav');
});

//PAGINAS VISIVEIS COM OU SEM LOGIN
Route::get('/freelancers/','UserController@ListarUsuariosCategoria')->name('freelancers');
Route::get('/f/{user}', 'UserController@showFreelancer')->name('freelancers.show');
Route::get('/c/{user}', 'UserController@showCliente')->name('cliente.show');

Route::get('/trabalhos', 'TrabalhoController@listarTrabalhos')->name('trabalhos.list');
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
                        Route::patch('dashboard/perfil/{user}', 'CFreelancer\FreelancerPerfilController@actualizarPerfil')->name('dashboard.perfil.actualizar');

                    //remocao, adicao e actualizacao de habilidades do perfil do usuario, pelo usuario cadastrado
                    Route::delete('dashboard/perfil/habilidade/{habilidade}', 'HabilidadeUserController@deleteUsersHabilidades')->name('dashboard.perfil.habilidade.apagar');
                    Route::post('dashboard/perfil/habilidade', ('HabilidadeUserController@addUsersHabilidades'))->name('dashboard.perfil.habilidade.sincronizar');

                    //CRUD de Experiencia Profissional e Educação do Usuario, pelo Usuario.
                    Route::patch('dashboard/perfil/edu-exp/{expereduca}', 'ExperEducaController@update')->name('dashboard.perfil.exp-educa.actualizar');
                    Route::post('dashboard/perfil/edu-exp/', 'ExperEducaController@store')->name('dashboard.perfil.exp-educa.adicionar');
                    Route::delete('dashboard/perfil/edu-exp/{expereduca}', 'ExperEducaController@destroy')->name('dashboard.perfil.exp-educa.apagar');

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

                    Route::get('/cliente/trabalho/em-andamento','CCliente\ClienteTrabalhoController@listarTrabalhosEmAndamentoCliente')->name('cliente.trabalhos.em_andamento');
                        Route::post('/cliente/trabalho/aprovar/{trabalho}', 'CCliente\ClienteTrabalhoController@aprovarTrabalhoEmExecucao')->name('cliente.trabalho.em_andamento.aprovar');
                        Route::post('/cliente/trabalho/rejeitar/{trabalho}', 'CCliente\ClienteTrabalhoController@rejeitarTrabalhoEmExecucao')->name('cliente.trabalho.em_andamento.rejeitar');
                        Route::post('/cliente/trabalho/cancelar/{trabalho}', 'CCliente\ClienteTrabalhoController@cancelarTrabalhoEmExecucao')->name('cliente.trabalho.em_andamento.cancelar');

                    Route::get('/cliente/trabalho/cancelados','CCliente\ClienteTrabalhoController@trabalhosCancelados')->name('cliente.trabalhos.cancelados');

                    Route::get('/cliente/trabalho/finalizados','CCliente\ClienteTrabalhoController@trabalhosFinalizados')->name('cliente.trabalhos.finalizados');
                        Route::get('cliente/avaliacao/{trabalho}','CCliente\ClienteAvaliacaoController@index')->name('cliente.trabalhos.finalizados.avaliacao');
                            Route::post('cliente/avaliacao/{trabalho}','CCliente\ClienteAvaliacaoController@store')->name('cliente.trabalhos.finalizados.avaliacao.store');

                    Route::get('/cliente/invoices/pagos', 'CCliente\ClientePagamentosController@invoicesPagos')->name('cliente.invoices.pagos');


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
        Route::get('/admin/dashboard/usuarios','CAdmin\AdminUsersController@index')->name('admin.dashboard.usuarios.index');
        Route::get('/admin/dashboard/usuario/{user}','CAdmin\AdminUsersController@show')->name('admin.dashboard.usuarios.show');
        Route::get('/admin/dashboard/transacoes','CAdmin\AdminPagamentosController@index')->name('admin.dashboard.transacoes.index');
        Route::get('/admin/dashboard/transacao/{transacao}','CAdmin\AdminPagamentosController@show')->name('admin.dashboard.transacoes.show');
    });
});

//PAGINAS EM FASE DE TESTES


    Route::get('/teste', 'UpdateController@paginaDeTestes')->name('teste');
    Route::get('/teste-review', 'UpdateController@notaTeste')->name('teste-review');
    Route::get('/teste-notificacao', 'UpdateController@VerUsuariosDaProvincia')->name('teste_de_notificacao');
    Route::post('/teste', 'UpdateController@storeTrabalho')->name('teste.store');
	Route::get('/upload', 'ImagemController@index');
	Route::post('/upload', 'ImagemController@store')->name('upload.store');
