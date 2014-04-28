<?php
class SituacoesBoletosController extends SysAppController {

	var $uses = array('Sys.SituacoesBoleto');
	
	public function save($id = null) {
		
		if ($this->request->isPost()) {
			if ($id) {
				$this->request->data['SituacoesBoleto']['id'] = $id;
			}
			if ($this->SituacoesBoleto->save($this->request->data)) {
				$this->Bootstrap->setFlash('Registro salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Bootstrap->setFlash('Não foi possível salvar!');
				$this->redirect(array('action'=>'index'));
			}
		}
	}
	
	public function index() {
		$this->set('data', $this->Paginator->paginate('SituacoesBoleto'));
	}

	public function related() {
		//$this->set('', $this->Agencia->Banco->find('list',array('fields'=>array('id','nome'))));
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
		$this->request->data = $this->SituacoesBoleto->read(null, $id);
		if (empty($this->request->data)) {
			$this->Bootstrap->setFlash('Registro não encontrado!');
			$this->redirect(array('action'=>'index'));
		}
		$this->related();
		$this->render('form');
	}
	
	public function del($id = null) {
		if ($this->request->isPost()) {
			if ($this->SituacoesBoleto->delete($id)) {
				$this->Bootstrap->setFlash('Registro excluído com sucesso!');
				$this->redirect(array('action'=>'index'));
			}
		}
		$this->Bootstrap->setFlash('Não foi possível excluir!','danger');
		$this->redirect(array('action'=>'index'));
	}
	
}