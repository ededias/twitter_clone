<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action
{

	public function index()
	{

		$this->view->login = isset($_GET['login']) ? $_GET['login'] : '';

		$this->render('index');

	}

	public function register()
	{
		$this->view->user = [
			'name' => '',
			'email' => '',
			'password' => ''
		];
		$this->view->wrongRegister = false;
		$this->render('signup');
		
	}

	public function signup()
	{

		$user = Container::getModel('user');

		$user->__set('name', $_POST['name']);
		$user->__set('email', $_POST['email']);
		$user->__set('password', md5($_POST['password']));

		
		if (!$user->getUsers()) {
		
			$user->save();
		
			$this->render('register');

		} else {

			$this->view->user = [
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'password' => $_POST['password']
			];

			$this->view->wrongRegister = true;

			return $this->render('register');
		}
	}
}
