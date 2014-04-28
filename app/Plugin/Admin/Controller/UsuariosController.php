<?php
class UsuariosController extends AdminAppController {

	public $uses = array('Admin.Usuario');

	public function home() {
		
	}
	
	public function index() {
	
		$this->set('title_for_layout','Usuarios - Lista');
		
		$this->Usuario->Behaviors->attach('Containable');
		$this->Usuario->contain(
			'Sexo',
			'NiveisAcesso'
		);

		$Usuarios = $this->Paginate('Usuario');
		$this->set('Usuarios', $Usuarios);
	}
	
	public function add() {
	
		$this->set('title_for_layout','Usuarios - Adiciona');
	
		if ($this->request->isPost()) {
			$data = $this->request->data;
			if (isset($data['Usuario']['id'])) unset($data['Usuario']['id']);
			
			$this->Atendente->create();
			if ($this->Atendente->save($data)) {
				$this->Session->setFlash('Usuário adicionado com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Erro ao adicionar Usuário!');
			}
			
		}
	
		$this->set('Sexos', $this->Usuario->Sexo->find('list', array('fields'=>array('id', 'nome'))));
		$this->set('NiveisAcessos', $this->Usuario->NiveisAcesso->find('list', array('fields'=>array('id', 'nome'))));
		
		$this->render('form');
	}
	
	public function edit($Usuario_id = null) {
	
		$this->set('title_for_layout','Usuarios - Edita');
	
		if ($this->request->isPost()) {
			$data = $this->request->data;
			$data['Usuario']['id'] = $usuario_id;
			
			if ($this->Usuario->save($data)) {
				$this->Session->setFlash('Usuário editado com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Erro ao editar Usuário!');
			}
			
		}

		$this->set('Sexos', $this->Usuario->Sexo->find('list', array('fields'=>array('id', 'nome'))));
		$this->set('NiveisAcessos', $this->Usuario->NiveisAcesso->find('list', array('fields'=>array('id', 'nome'))));
		
		$this->request->data = $this->Usuario->read(null, $usuario_id);

		$this->render('form');
	}
	
	
	public function login() {
		
		$this->set('title_for_layout','Sistema Guimarães e Nobrega');
	
		if ($this->request->isPost()) {
			if ($this->Auth->login()) {
				$this->Bootstrap->setFlash('Usuário autenticado com successo!');
				$this->redirect('/');
			} else {
				$this->Bootstrap->setFlash('Erro na autenticação do Usuário!');
			}
			
		}

	}
	
	public function logout() {
		
		$this->Auth->logout();
		$this->Bootstrap->setFlash('Você saiu do sistema!');
		$this->redirect('/');
	}

}