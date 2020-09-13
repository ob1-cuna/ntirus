<?php


use App\Transacao;

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
      $percentagem =  ($valorMenor * 100)/$valorMaior;
      return $percentagem;
  }

  function getSaldo ($user) {
      $tako_feito = Transacao::where([['user_id', $user], ['tipo', 'p2f']])->sum('valor');
      $tako_retirado = Transacao::where([['user_id', $user], ['tipo', 'saque']])->sum('valor');

      $saldo_disponivel = $tako_feito - $tako_retirado;

      return $saldo_disponivel;
  }

function getTotalFeito ($user) {
    $tako_feito = Transacao::where([['user_id', $user], ['tipo', 'p2f']])->sum('valor');
    return $tako_feito;
}
function getTakoRetirado ($user) {
    $tako_retirado = Transacao::where([['user_id', $user], ['tipo', 'saque']])->sum('valor');
    return $tako_retirado;
}
?>