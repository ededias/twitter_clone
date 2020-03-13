<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action
{

  public function timeline()
  {
    $this->sessionValidate();
    
    $tweet = Container::getModel('tweet');
    $tweet->__set('iduser', $_SESSION['iduser']);
    
    $tweets = $tweet->getAll();
    $this->view->user = $_SESSION;
    $this->view->tweets = $tweets;
    $this->render("timeline");

  }

  public function tweet()
  {

    $this->sessionValidate();
    $tweet = Container::getModel('tweet');
    $tweet->__set('iduser', $_SESSION['iduser']);
    $tweet->__set('tweet', $_POST['tweet']);
    
    $tweet->save();

    header("location: /timeline");

  }

  public function delete() {
    $this->sessionValidate();
    $dlTweet = Container::getModel('tweet');
    $dlTweet->__set('idTweet', $_GET['idtweet']);
    $dlTweet->__set('iduser', $_SESSION['iduser']);
    
    
    $dlTweet->deleteTweet();

    header("location: /timeline");
  }

  function whotofollow()
  {
    $this->sessionValidate();
    
    $findfor = isset($_GET['findFor']) ? $_GET['findFor'] : '';
    
    $user = array();
    if ($findfor != '') {
     
      $user = Container::getModel('user');
      $user->__set('name', $findfor);
      
      $user = $user->getAll();
    
    }

    $this->view->user = $user;
    $this->render('whotofollow');
  }

  function sessionValidate()
  {
    session_start();
    if (!empty($_SESSION)){
      return $_SESSION;
    } else {
      header('location: /?login=error');
    };
      
  }
}
