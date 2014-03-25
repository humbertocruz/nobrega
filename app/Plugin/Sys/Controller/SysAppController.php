<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class SysAppController extends AppController {

	public $helpers = array(
		'Bootstrap.AuthBs',
		'Bootstrap.Bootstrap',
		'Html'
	);
	
	public $uses = array('Sys.Projeto', 'Sys.Menu');
	
	public $components = array(
		'Auth' => array(
			'loginAction' => array(
				'controller' => 'usuarios',
				'action' => 'login',
				'plugin' => 'admin'
			),
			'authError' => 'Você não tem acesso a essa área do sistema!',
			'authenticate' => array(
				'Form' => array(
					'userModel' => 'Usuario',
					'fields' => array('username' => 'email','password'=>'senha')
				)
			)
		)
	);

	public function beforeFilter() {
		
		$user = $this->Auth->user();
		
		// Carregar Layout bootstrap
		$this->layout = 'Bootstrap.bootstrap';

		$this->Menu->Link->Behaviors->attach('Containable');
		$this->Menu->Link->contain(
			'Menu'
		);
		//$user = $this->Auth->user();
		$conditions = array(
			'Menu.nivel_acesso_id' => $user['nivel_acesso_id']
		);

		$Links = $this->Menu->Link->find('threaded', array('conditions'=>$conditions));
		$menus = $Links;
		
		//$allModelNames = Configure::listObjects('model');
		//pr($allModelNames);
		
		$conditions = array(
			'Permissao.nivel_acesso_id' => $user['nivel_acesso_id']
		);
		$PermissoesUser = $this->Menu->NiveisAcesso->Permissao->find('all', array('conditions'=>$conditions));
		
		$Permissoes = array();
		foreach($PermissoesUser as $Permissao) {
			$Permissoes[$Permissao['Permissao']['controller']][$Permissao['Permissao']['action']] = true;
		}
		$controller = $this->params['controller'];
		$action = $this->params['action'];
		
		if ( ($controller == 'Status' and $action == 'index') or $user['NiveisAcesso']['admin'] == 1 ) {
			
		} else {
			if ( !isset( $Permissoes[$controller][$action] ) ) {
				$this->Session->setFlash( 'Seu usuário não tem permissão de acesso a esta página!' );
				$this->redirect( '/' );
			}
		}
		
		
		$this->set('UserPermissoes', $Permissoes);
		
		// Texto do header para os forms add e edit
		$txtAction = '';
		if ($this->action == 'edit' ) $txtAction = 'Editar ';
		if ($this->action == 'add' ) $txtAction = 'Adicionar';
		$this->set('txtAction', $txtAction);
		
		$this->set('superMenu', $menus);
		$this->set('usuario', $this->Auth->user());
	}

}
