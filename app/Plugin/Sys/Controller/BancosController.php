<?php
class BancosController extends SysAppController {

	var $uses = array('Sys.Banco');
	
	public function save($id = null) {
		
		if ($this->request->isPost()) {
			if ($id) {
				$this->request->data['Banco']['id'] = $id;
			}
			if ($this->Banco->save($this->request->data)) {
				$this->Bootstrap->setFlash('Registro salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Bootstrap->setFlash('Não foi possível salvar!');
				$this->redirect(array('action'=>'index'));
			}
		}
	}
	
	public function index() {
		$this->set('data', $this->Paginator->paginate('Banco'));
	}
	
	public function add() {
		$this->save();
		$this->render('form');
	}
	
	public function edit($banco_id = null) {
		if (!$banco_id) {
			$this->Bootstrap->setFlash('Registro não encontrado!');
			$this->redirect(array('action'=>'index'));
		}
		$this->save($banco_id);
		$this->request->data = $this->Banco->read(null, $banco_id);
		if (empty($this->request->data)) {
			$this->Bootstrap->setFlash('Registro não encontrado!');
			$this->redirect(array('action'=>'index'));
		}
		$this->render('form');
	}
	
	public function del($banco_id = null) {
		if ($this->request->isPost()) {
			if ($this->Banco->delete($banco_id)) {
				$this->Bootstrap->setFlash('Registro excluído com sucesso!');
				$this->redirect(array('action'=>'index'));
			}
		}
		$this->Bootstrap->setFlash('Não foi possível excluir!','danger');
		$this->redirect(array('action'=>'index'));
	}
	
}