<?php
class ContasController extends SysAppController {

	var $uses = array('Sys.Conta');
	
	public function save($id = null) {
		
		if ($this->request->isPost()) {
			if ($id) {
				$this->request->data['Conta']['id'] = $id;
			}
			if ($this->Conta->save($this->request->data)) {
				$this->Bootstrap->setFlash('Registro salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Bootstrap->setFlash('Não foi possível salvar!');
				$this->redirect(array('action'=>'index'));
			}
		}
	}
	
	public function index() {
		$this->set('data', $this->Paginator->paginate('Conta'));
	}
	
	public function related() {
		$this->set('Agencias', $this->Conta->Agencia->find('list',array('fields'=>array('id','nome'))));
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
		$this->request->data = $this->Conta->read(null, $id);
		if (empty($this->request->data)) {
			$this->Bootstrap->setFlash('Registro não encontrado!');
			$this->redirect(array('action'=>'index'));
		}
		$this->related();
		$this->render('form');
	}
	
	public function del($id = null) {
		if ($this->request->isPost()) {
			if ($this->Conta->delete($id)) {
				$this->Bootstrap->setFlash('Registro excluído com sucesso!');
				$this->redirect(array('action'=>'index'));
			}
		}
		$this->Bootstrap->setFlash('Não foi possível excluir!','danger');
		$this->redirect(array('action'=>'index'));
	}
	
}