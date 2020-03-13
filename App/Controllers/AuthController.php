<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action
{

  public function autenticate()
  {

    $user = Container::getModel('user');

    try {

      $user->__set('email', $_POST['email']);
      $user->__set('password', $_POST['password']);
      
    } catch (\PDOException $err) {

      echo $err->getMessage();
    
    }
    $users = $user->autenticateModel();
    
    if (!empty($users)) {

      session_start();
      $_SESSION = $users;
      header("location: /timeline");
    
    } else {
      header("location: /?login=error");
    }

  }

  public function exit()
  {
    session_start();
    session_destroy();
    header("location: /");
  }
}
