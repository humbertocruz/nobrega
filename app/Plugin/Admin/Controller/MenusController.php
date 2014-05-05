<?php
class MenusController extends AdminAppController {

	public $uses = array('Admin.Menu');
	
	function save($id = null) {
		if ($this->request->isPost()) {
			$data = $this->request->data;
			if ( $this->action == 'edit' ) {
				$data['Menu']['id'] = $id;
			}
			if ($this->Menu->save($data)) {
				$this->Bootstrap->setFlash('Registro salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Bootstrap->setFlash('Erro ao salvar o Registro!','warning');
			}
		}
	}
	
	function related() {
		$Grupos = array('0'=>'Selecione') + $this->Menu->Grupo->find('list',array('fields'=>array('id','nome')));
		$this->set('Grupos',$Grupos);
	}
	
	public function index() {
	
		$this->set('title_for_layout','Menus - Lista');
		
		$this->Menu->Behaviors->attach('Containable');
		$this->Menu->contain('Grupo');
		$Menus = $this->Paginator->paginate('Menu');
		$this->set('data', $Menus);
	}
	
	public function add() {
	
		$this->set('title_for_layout','Menus - Adicionar');

		$this->save();
		
		$this->related();
		
		$this->render('form');
	}
	
	public function edit($menu_id = null) {
	
		$this->set('title_for_layout','Menus - Editar');
		
		$this->save($menu_id);
	
		$Menu = $this->Menu->read(null, $menu_id);
		$this->request->data = $Menu;
		
		$this->related();

		$this->render('form');
	}
	
	public function del($id = null) {
		if ($this->request->isPost()) {
			$Grupo = $this->Menu->delete($id);
			$this->Bootstrap->setFlash('Registro excluido com sucesso!');
			$this->redirect( array( 'action'=>'index' ));
		}
	}
	
	public function filter() {
		$this->related();
		if ($this->Session->check('filterMenu')) {
			$this->request->data = $this->Session->read('filterMenu');
		}
	}
	
	public function filterApply() {
		$filters = $this->Session->read('filterMenu');
		$conditions = array();
		foreach ($filters as $key=>$value) {
			$conditions[$key] = '%'.$value.'%';
		}
		return $conditions;
	}

}