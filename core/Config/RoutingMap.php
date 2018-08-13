<?php

	return [
			'/' => //Main page
			[
				'controller' => 'controllers\ArticleController',
				'action' => 'indexAction',
				
			],
			'/article/int' => //search one
			[
				'controller' => 'controllers\ArticleController',
				'action' => 'oneAction',
				'params' =>[
				'int' => 'id_blog'
				]
				
			],
			'/add' => //add one
			[
				'controller' => 'controllers\ArticleController',
				'action' => 'addAction',
			],
			'/edit/int' => //edit one
			[
				'controller' => 'controllers\ArticleController',
				'action' => 'editAction',
				'params' =>[
				'int' => 'id_blog'
				]				
			],
			'/del' => //Delete one
			[
				'controller' => 'controllers\ArticleController',
				'action' => 'delAction',
				
			],
			'/reg' => // New account
			[
				'controller' => 'controllers\UserController',
				'action' => 'regAction',
				
			],
			'/login' => //Login authorization
			[
				'controller' => 'controllers\UserController',
				'action' => 'loginAction',
					
			],
			'/logout' => // Логаут
			[
				'controller' => 'controllers\UserController',
				'action' => 'logoutAction'
			],
			'/default' => //404 page
			[
				'controller' => 'controllers\BaseController',
				'action' => 'page404',
					
			],
            '/account/int' => [
                'controller' => 'controllers\UserController',
                'action' => 'accountAction',
                'params' =>[
                    'int' => 'id_user'
                ]
            ]
		];