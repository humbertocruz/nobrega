<?php
class PermissoesController extends AdminAppController {

	public $uses = array('Admin.Permissao');
	
	function save($id = null) {
		if ($this->request->isPost()) {
			$data = $this->request->data;
			if ( $this->action == 'edit' ) {
				$data['Permissao']['id'] = $id;
			}
			if ($this->Permissao->save($data)) {
				$this->Bootstrap->setFlash('Registro salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Bootstrap->setFlash('Erro ao salvar o Registro!','warning');
			}
		}
	}
	
	function related() {
		$Grupos = $this->Permissao->Grupo->find('list',array('fields'=>array('id','nome')));
		$this->set('Grupos',$Grupos);
	}
	
	public function index() {
	
		$this->set('title_for_layout','Permissões - Lista');
		
		$this->Permissao->Behaviors->attach('Containable');
		$this->Permissao->contain('Grupo');
		$Permissoes = $this->Paginator->paginate('Permissao');
		$this->set('data', $Permissoes);
	}
	
	public function add() {
	
		$this->set('title_for_layout','Permissões - Adicionar');

		$this->save();
		
		$this->related();
		
		$this->render('form');
	}
	
	public function edit($menu_id = null) {
	
		$this->set('title_for_layout','Permissões - Editar');
		
		$this->save($menu_id);
	
		$Permissao = $this->Permissao->read(null, $menu_id);
		$this->request->data = $Permissao;
		
		$this->related();

		$this->render('form');
	}
	
	public function del($id = null) {
		if ($this->request->isPost()) {
			$Grupo = $this->Permissao->delete($id);
			$this->Bootstrap->setFlash('Registro excluido com sucesso!');
			$this->redirect( array( 'action'=>'index' ));
		}
	}
	
	public function filter() {
		$this->related();
		if ($this->Session->check('filterPermissao')) {
			$this->request->data = $this->Session->read('filterPermissao');
		}
	}
	
	public function filterApply() {
		$filters = $this->Session->read('filterPermissao');
		$conditions = array();
		foreach ($filters as $key=>$value) {
			$conditions[$key] = '%'.$value.'%';
		}
		return $conditions;
	}

}