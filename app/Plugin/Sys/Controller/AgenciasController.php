<?php
class AgenciasController extends SysAppController {

	var $uses = array('Sys.Agencia');
	
	public function save($id = null) {
		
		if ($this->request->isPost()) {
			if ($id) {
				$this->request->data['Agencia']['id'] = $id;
			}
			if ($this->Agencia->save($this->request->data)) {
				$this->Bootstrap->setFlash('Registro salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Bootstrap->setFlash('Não foi possível salvar!');
				$this->redirect(array('action'=>'index'));
			}
		}
	}
	
	public function related() {
		$this->set('Bancos', $this->Agencia->Banco->find('list',array('fields'=>array('id','nome'))));
	}
	
	public function index() {
		$this->set('data', $this->Paginator->paginate('Agencia'));
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
		$this->related();
		$this->request->data = $this->Agencia->read(null, $id);
		if (empty($this->request->data)) {
			$this->Bootstrap->setFlash('Registro não encontrado!');
			$this->redirect(array('action'=>'index'));
		}
		$this->render('form');
	}
	
	public function del($id = null) {
		if ($this->request->isPost()) {
			if ($this->Agencia->delete($id)) {
				$this->Bootstrap->setFlash('Registro excluído com sucesso!');
				$this->redirect(array('action'=>'index'));
			}
		}
		$this->Bootstrap->setFlash('Não foi possível excluir!','danger');
		$this->redirect(array('action'=>'index'));
	}
	
}