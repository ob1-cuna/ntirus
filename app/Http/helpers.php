<?php


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


?>