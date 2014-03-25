<?php
class UsuariosController extends AdminAppController {

	public $uses = array('Advogados.Usuario');

	public function home() {
		
	}
	
	public function index() {
	
		$this->set('title_for_layout','Usuário - Lista');
		
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
			
			$this->Usuario->create();
			if ($this->Usuario->save($data)) {
				$this->Session->setFlash('Usuario adicionado com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Erro ao adicionar Usuario!');
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
			$data['Usuario']['id'] = $Usuario_id;
			
			if ($this->Usuario->save($data)) {
				$this->Session->setFlash('Usuario editado com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Erro ao editar Usuario!');
			}
			
		}

		$this->set('Sexos', $this->Usuario->Sexo->find('list', array('fields'=>array('id', 'nome'))));
		$this->set('NiveisAcessos', $this->Usuario->NiveisAcesso->find('list', array('fields'=>array('id', 'nome'))));
		
		$this->request->data = $this->Usuario->read(null, $Usuario_id);

		$this->render('form');
	}
	
	public function emaberto() {
		$this->uses = array('Chamada');
		// Carrega dados do BD
		$this->Chamada->Behaviors->attach('Containable');
		$this->Chamada->contain(
			'Contato',
			'Instituicao',
			'Instituicao.ContatosInstituicao',
			'Instituicao.ContatosInstituicao.Contato',
			'Instituicao.InstituicoesEndereco',
			'Instituicao.InstituicoesEndereco.Cidade',
			'Fornecedor',
			'Fornecedor.FornecedoresEndereco',
			'Fornecedor.FornecedoresEndereco.Cidade',
			'Assunto',
			'Filhas'
		);
		$user = $this->Auth->user();
		$conditions = array(
			'Chamada.Usuario_id' => $user['id'],
			'Chamada.data_fim' => null
		);
		$chamadas = $this->Paginate('Chamada',$conditions);
		$this->set('Chamadas',$chamadas);
		
	}
	
	public function login() {
		
		$this->set('title_for_layout','Sistema Cáritas');
	
		if ($this->request->isPost()) {
			
			if ($this->Auth->login()) {
				$this->Session->setFlash('Usuario autenticado com successo!');
				$this->redirect('/');
			} else {
				$this->Session->setFlash('Erro na autenticação do Usuario!');
			}
			
		}

	}
	
	public function logout() {
		
		$this->Auth->logout();
		$this->Session->setFlash('Você saiu do sistema!');
		$this->redirect('/');
	}

}