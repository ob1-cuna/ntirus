<?php


use App\Transacao;
use App\Trabalho;
use App\Proposta;
use App\Review_trab;

function checkPermission($permissions){
    $userAccess = getMyPermission(auth()->user()->is_permission);
    foreach ($permissions as $key => $value) {
        if($value == $userAccess){
            return true;
        }
    }
    return false;
}


function getMyPermission($id)
{
    switch ($id) {
        case 1:
            return 'cliente';
            break;
        case 2:
            return 'admin';
            break;
        default:
            return 'freelancer';
            break;
    }
}

function checkPerfil($permissions){
    $userAccess = getMeuPerfil(auth()->user()->perfil->status);
    foreach ($permissions as $key => $value) {
        if($value == $userAccess){
            return true;
        }
    }
    return false;
}


function getMeuPerfil($id)
{
    switch ($id) {
        case 1:
            return 'p_completo';
            break;
        default:
            return 'p_incompleto';
            break;
    }
}


function tamanhoParaHumanos ($bytes){
    $unidades = ['B', 'KB', 'MB', 'GB', 'TB'];

    for ($i = 0; $bytes > 1024; $i++){
        $bytes /= 1024;
    }

    return round($bytes, 2) . ' ' .$unidades[$i];
}

function nomeFicheiro ($file) {
    $file = preg_replace('/\s+/', '%20', $file);
    return $file;
}

function getPercentagem ($valorMaior, $valorMenor){
    if ($valorMaior == 0 || $valorMenor == 0)
    {
        $percentagem = 0;
        return $percentagem;
    }

    else
        $percentagem =  ($valorMenor * 100)/$valorMaior;
    return $percentagem;
}

function getSaldo ($user) {
    $tako_feito = Transacao::where([['user_id', $user], ['tipo', 'p2f'], ['estado', 'Concluido']])->sum('valor');
    $tako_retirado = Transacao::where([['user_id', $user], ['tipo', 'saque'], ['estado', 'Concluido']])->sum('valor');

    $saldo_disponivel = $tako_feito - $tako_retirado;

    return $saldo_disponivel;
}

function getTotalFeito ($user) {
    $tako_feito = Transacao::where([['user_id', $user], ['tipo', 'p2f'], ['estado', 'Concluido']])->sum('valor');
    return $tako_feito;
}
function getTakoRetirado ($user) {
    $tako_retirado = Transacao::where([['user_id', $user], ['tipo', 'saque'], ['estado', 'Concluido']])->sum('valor');
    return $tako_retirado;
}

function getEstatisticaFreelancer ($id, $tipo){
    $numero_total = Trabalho::where([['freelancer_id', $id], ['status', $tipo]])->count();
    return $numero_total;
}

function getEstatisticaPropostas ($id, $tipo){
    $numero_total = Proposta::where([['user_id', $id], ['status', $tipo]])->count();
    return $numero_total;
}

function getEstatisticaCliente ($id, $tipo, $tabela){
    switch ($tabela) {
        case 'trabalhos':
            $numero_total = Trabalho::where([['user_id', $id], ['status', $tipo]])->count();
            return $numero_total;
            break;

        case 'transacaos':
            $numero_total = Transacao::where([['user_id', $id], ['estado', $tipo], ['tipo', 'c2p']])->count();
            return $numero_total;
            break;
    }
}

function getFotoDePerfil ($id){

    $file = \App\perfil::where('user_id', $id)->firstOrFail();
    $foto = $file->foto_perfil;

    return $foto;
}

function getAvaliacao ($user_id, $trabalho_id, $operacao)
{
    switch ($operacao) {
        case 'comentario':
            $comentario = Review_trab::where([['avaliador_id', $user_id], ['id_trabalho', $trabalho_id]])->firstOrFail();
            return $comentario->comentario;
            break;

        case 'nota':
            $nota = Review_trab::where([['avaliador_id', $user_id], ['id_trabalho', $trabalho_id]])->firstOrFail();
            return $nota->nota;
            break;

        case 'outra_avaliacao':
            $nota = Review_trab::where([['avaliado_id', $user_id], ['id_trabalho', $trabalho_id]])->count();
            return $nota;
            break;

        case 'minha_avaliacao':
            $nota = Review_trab::where([['avaliador_id', $user_id], ['id_trabalho', $trabalho_id]])->count();
            return $nota;
            break;
    }
}
?>