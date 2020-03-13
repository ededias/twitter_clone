<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes['register'] = array(
			'route' => '/register',
			'controller' => 'indexController',
			'action' => 'register'
		);

		$routes['signup'] = array(
			'route' => '/signup',
			'controller' => 'indexController',
			'action' => 'signup'
		);

		$routes['autenticate'] = array(
			'route' => '/autenticate',
			'controller' => 'authController',
			'action' => 'autenticate'
		);
		$routes['exit'] = array(
			'route' => '/exit',
			'controller' => 'authController',
			'action' => 'exit'
		);
		$routes['timeline'] = array(
			'route' => '/timeline',
			'controller' => 'appController',
			'action' => 'timeline'
		);
		$routes['tweet'] = array(
			'route' => '/tweet',
			'controller' => 'appController',
			'action' => 'tweet'
		);
		$routes['delete'] = array(
			'route' => '/delete',
			'controller' => 'appController',
			'action' => 'delete'
		);
		$routes['whotofollow'] = array(
			'route' => '/whotofollow',
			'controller' => 'appController',
			'action' => 'whotofollow'
		);
		$this->setRoutes($routes);
	}

}

?>