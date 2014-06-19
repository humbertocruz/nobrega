<?php
class ClientesController extends SysAppController {

	var $uses = array('Sys.Cliente');
	
	var $paginate = array(
		'order' => array(
			'Cliente.nome' => 'asc'
		)
	);
	
	public function save($id = null) {
		
		if ($this->request->isPost()) {
			if ($id) {
				$this->request->data['Cliente']['id'] = $id;
			}
			if ($this->Cliente->save($this->request->data)) {
				$this->Bootstrap->setFlash('Registro salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Bootstrap->setFlash('Não foi possível salvar!');
				$this->redirect(array('action'=>'index'));
			}
		}
	}
	
	public function index() {
		$this->set('data', $this->Paginator->paginate('Cliente'));
	}

	public function related() {
		$this->set('EstadosCivis', $this->Cliente->EstadosCivil->find('list',array('fields'=>array('id','descricao'))));
		$this->set('UnidadesFederacoes', $this->Cliente->UnidadesFederacao->find('list',array('fields'=>array('id','nome'))));
		$this->set('TiposPessoas', $this->Cliente->TiposPessoa->find('list',array('fields'=>array('id','nome'))));

	}
	
	public function add() {
		$this->save();
		$this->related();
		$this->render('form');
	}
	
	public function edit($id = null) {
		if (!$id) {
			$this->Bootstrap->setFlash('Registro não encontrado!');
			$this->redirect(array('action'=>'index'));
		}
		$this->save($id);
		$this->request->data = $this->Cliente->read(null, $id);
		if (empty($this->request->data)) {
			$this->Bootstrap->setFlash('Registro não encontrado!');
			$this->redirect(array('action'=>'index'));
		}
		$this->related();
		$this->render('form');
	}
	
	public function del($id = null) {
		if ($this->request->isPost()) {
			if ($this->Cliente->delete($id)) {
				$this->Bootstrap->setFlash('Registro excluído com sucesso!');
				$this->redirect(array('action'=>'index'));
			}
		}
		$this->Bootstrap->setFlash('Não foi possível excluir!','danger');
		$this->redirect(array('action'=>'index'));
	}
	
}