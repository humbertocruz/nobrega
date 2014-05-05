<?php
class LinksController extends AdminAppController {

	public $uses = array('Admin.Link');
	
	function save($id = null) {
		if ($this->request->isPost()) {
			$data = $this->request->data;
			if ( $this->action == 'edit' ) {
				$data['Link']['id'] = $id;
			}
			if ( $data['Link']['parent_id'] == 0 ) {
				unset($data['Link']['parent_id']);
			}
			if ($this->Link->save($data)) {
				$this->Bootstrap->setFlash('Registro salvo com sucesso!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Bootstrap->setFlash('Erro ao salvar o Registro!','warning');
			}
		}
	}
	
	function related() {
		$Menus = $this->Link->Menu->find('list',array('fields'=>array('id','nome')));
		$this->set('Menus',$Menus);
		$Permissoes = $this->Link->Permissao->find('list',array('fields'=>array('id','item')));
		$this->set('Permissoes',$Permissoes);
		$Links = array('0'=>'Nenhum') + $this->Link->find('list',array('fields'=>array('id','texto')));
		$this->set('Links',$Links);
	}
	
	public function index() {
	
		$this->set('title_for_layout','Links - Lista');
		
		$this->Link->Behaviors->attach('Containable');
		$this->Link->contain('Permissao');
		$Links = $this->Link->find('all');
		$this->set('data', $Links);
	}
	
	public function add() {
		$this->set('title_for_layout','Links - Adicionar');
		$this->save();
		$this->related();
		$this->render('form');
	}
	
	public function edit($link_id = null) {
	
		$this->set('title_for_layout','Links - Editar');
		
		$this->save($link_id);
	
		$Link = $this->Link->read(null, $link_id);
		$this->request->data = $Link;
		$this->related();
		$this->render('form');
	}
	
	public function del($id = null) {
		if ($this->request->isPost()) {
			$Grupo = $this->Link->delete($id);
			$this->Bootstrap->setFlash('Registro excluido com sucesso!');
			$this->redirect( array( 'action'=>'index' ));
		}
	}
	
	public function filter() {
		$this->related();
		if ($this->Session->check('filterLink')) {
			$this->request->data = $this->Session->read('filterLink');
		}
	}
	
	public function filterApply() {
		$filters = $this->Session->read('filterLink');
		$conditions = array();
		foreach ($filters as $key=>$value) {
			$conditions[$key] = '%'.$value.'%';
		}
		return $conditions;
	}

}