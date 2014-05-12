<?php
class DocumentosController extends SysAppController {

	var $uses = array('Sys.DocumentoOut');
	
	public $paginate = array(
		'limit' => 25,
		'order' => array(
			'Sacado.nome_razaosocial' => 'asc'
		)
	);
	
	public function ajaxSacado($search = false) {
		$this->layout = false;
		$options = array('conditions'=>array('nome_razaosocial like'=>'%'.$search.'%'));
		if ($search) {
			$ajax_options = array(
				'conditions' => array(
					'nome_razaosocial like' => '%'.$search.'%'
				),
				'fields' => array(
					'id',
					'nome_razaosocial'
				),
				'limit' => 10
			);
			$this->set('Outorgantes', $this->DocumentoOut->Sacado->find('list', $ajax_options));
		}
	}
	
	public function related() {
		$this->set('Outorgantes', array('0'=>'Pesquise Outorgante'));
		$this->set('Representates', array('0'=>'Pesquise Representante'));
		//$this->set('tipospessoa', $this->Sacado->TiposPessoa->find('list',$this->field_list_nome));
		//$this->set('modelospessoa', $this->Sacado->ModelosPessoa->find('list',$this->field_list_nome));
	}
	
	public function save($data = array(), $id = null, $flash = 'Registro salvo com sucesso!') {
		if ($this->request->isPost()) {
			if ($id) {
				$data['Sacado']['id'] = $id;
			}
			$this->Documento->save($data);
			$this->Bootstrap->setFlash($flash);
			$this->redirect(array('action'=>'index'));
		}
	}
	
	public function index() {
		$Documentos = $this->Paginate('DocumentoOut');
		$this->set('data', $Documentos);
	}
	
	public function add() {
		$this->save($this->request->data);
		$this->related();
		$this->render('form');
	}
	
	public function edit($sacado_id = null) {
		$this->save($this->request->data, $sacado_id);
		$this->related();
		$this->request->data = $this->Sacado->read(null, $sacado_id);
		$this->render('form');
	}
}
