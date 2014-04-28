<?php
class SacadosController extends SysAppController {

	var $uses = array('Sys.Sacado');
	
	var $field_list = array('fields'=>array('id','descricao'));
	var $field_list_nome = array('fields'=>array('id','nome'));
	
	var $indexActions = array(
		array(
			'text'=>false,
			'icon'=>'eye-open',
			'action' => 'view',
			'style' => 'primary'
		),
		array(
			'text'=>false,
			'icon'=>'pencil',
			'action' => 'edit',
			'style' => 'info'
		),
		array(
			'text'=>false,
			'icon'=>'remove',
			'action' => 'del',
			'style' => 'danger'
		)
	);
	
	public $paginate = array(
		'limit' => 25,
		'order' => array(
			'Sacado.nome_razaosocial' => 'asc'
		)
	);
	
	public function related() {
		$this->set('estadoscivil', $this->Sacado->EstadosCivil->find('list',$this->field_list));
		$this->set('tipospessoa', $this->Sacado->TiposPessoa->find('list',$this->field_list_nome));
		$this->set('modelospessoa', $this->Sacado->ModelosPessoa->find('list',$this->field_list_nome));
	}
	public function related_boleto() {
		$this->set('SituacoesBoleto', $this->Sacado->BoletosNovo->SituacoesBoleto->find('list',$this->field_list));
		$this->set('Usuarios', array('0'=>'Nenhum') + $this->Sacado->BoletosNovo->Usuario->find('list',$this->field_list_nome));
	}
	
	public function save($data = array(), $id = null) {
		if ($id) {
			$data['Sacado']['id'] = $id;
		}
		$this->Sacado->save($data);
	}
	
	public function index() {
		$Sacados = $this->Paginator->paginate('Sacado');
		$this->Sacado->Behaviors->attach('Containable');
		$this->Sacado->contain(
			'TiposPessoa',
			'DocumentoOut'
		);
		$this->set('data', $Sacados);
	}
	
	public function view( $id = null ) {
		if ($this->request->isPost()) {
			$data = $this->request->data;
			if (isset($data['HistoricosAdm'])) {
				$data['HistoricosAdm']['sacado_id'] = $id;
				$data['HistoricosAdm']['data'] = date( 'Y-m-d', time());
				$data['HistoricosAdm']['user_id'] = $this->Auth->user()['id'];

				$this->Sacado->HistoricosAdm->create();
				$this->Sacado->HistoricosAdm->save($data['HistoricosAdm']);
				if ($data['Arquivo']['arquivo']['name'] != '') {
					$file = $data['Arquivo']['arquivo'];
					$data['Arquivo']['arquivo'] = '/arquivos/'.$id.'/'.$file['name'];
					$data['Arquivo']['historicoadm_id'] = $this->Sacado->HistoricosAdm->id;
					if (!is_dir(WWW_ROOT.'/arquivos')) mkdir(WWW_ROOT.'/arquivos');
					if (!is_dir(WWW_ROOT.'/arquivos/'.$id)) mkdir(WWW_ROOT.'/arquivos/'.$id);
					move_uploaded_file($file['tmp_name'], WWW_ROOT.'/arquivos/'.$id.'/'.$file['name']);
					$this->Sacado->HistoricosAdm->Arquivo->create();
					$this->Sacado->HistoricosAdm->Arquivo->save($data);
				}

			}
			if (isset($data['HistoricosPro'])) {
				$data['HistoricosPro']['sacado_id'] = $id;
				$data['HistoricosPro']['data'] = date( 'Y-m-d', time());
				$data['HistoricosPro']['user_id'] = $this->Auth->user()['id'];
				
				$this->Sacado->HistoricosPro->create();
				$this->Sacado->HistoricosPro->save($data);
				if ($data['Arquivo']['arquivo']['name'] != '') {
					$file = $data['Arquivo']['arquivo'];
					$data['Arquivo']['arquivo'] = '/arquivos/'.$id.'/'.$file['name'];
					$data['Arquivo']['historicopro_id'] = $this->Sacado->HistoricosPro->id;
					if (!is_dir(WWW_ROOT.'/arquivos')) mkdir(WWW_ROOT.'/arquivos');
					if (!is_dir(WWW_ROOT.'/arquivos/'.$id)) mkdir(WWW_ROOT.'/arquivos/'.$id);
					move_uploaded_file($file['tmp_name'], WWW_ROOT.'/arquivos/'.$id.'/'.$file['name']);
					$this->Sacado->HistoricosPro->Arquivo->create();
					$this->Sacado->HistoricosPro->Arquivo->save($data);
				}

			}
			$this->redirect(array('action'=>'view', $id));
		}
		$this->Sacado->Behaviors->attach('Containable');
		$this->Sacado->contain(
			'TiposPessoa',
			'BoletosAntigo',
			'BoletosAntigo.SituacoesBoleto',
			'BoletosNovo',
			'BoletosNovo.SituacoesBoleto',
			'HistoricosAdm',
			'HistoricosAdm.Arquivo',
			'HistoricosPro',
			'HistoricosPro.Arquivo',
			'DocumentoOut'
		);
		$Sacado = $this->Sacado->read(null, $id);
		$this->set('Sacado',$Sacado);
	}
	
	public function documentos($tipo, $id) {
		$Sacado = $this->Sacado->read(null, $id);
		$this->set('Sacado',$Sacado);
		$this->set('tipo', $tipo);
	}
	
	public function add() {
		if ($this->request->isPost()) {
			$this->save($this->request->data);
			$this->Bootstrap->setFlash('Registro salvo com sucesso!');
			$this->redirect(array('action'=>'index'));
		}
		$this->related();
		$this->render('form');
	}
	
	public function edit($sacado_id = null) {
		if ($this->request->isPost()) {
			$this->save($this->request->data, $sacado_id);
			$this->Bootstrap->setFlash('Registro salvo com sucesso!');
			$this->redirect(array('action'=>'index'));
		}

		$this->related();
		$this->request->data = $this->Sacado->read(null, $sacado_id);
		$this->render('form');
	}
	
	public function del($sacado_id = null) {
		if ($this->request->isPost()) {
			$this->Sacado->delete($sacado_id);
			$this->Bootstrap->setFlash('Registro excluído com sucesso!');
			$this->redirect(array('action'=>'index'));
		}
	}
	
	public function save_boleto($data = array(), $id = null) {
		if ($id) {
			$data['BoletosNovo']['id'] = $id;
		}
		$this->Sacado->BoletosNovo->save($data);
	}
	
	public function novo_boleton($sacado_id = null) {
		if ($this->request->isPost()) {
			$this->save_boleto($this->request->data);
			$this->Bootstrap->setFlash('Registro salvo com sucesso!');
			$this->redirect(array('action'=>'view', $sacado_id));
		}
		$this->related_boleto();
		$this->render('form_boleto');
	}
	
	public function editar_boleton($boleto_id = null, $sacado_id = null) {
		if ($this->request->isPost()) {
			$this->save_boleto($this->request->data, $boleto_id);
			$this->Bootstrap->setFlash('Registro salvo com sucesso!');
			$this->redirect(array('action'=>'view', $sacado_id));
		}
		$this->related_boleto();
		$this->request->data = $this->Sacado->BoletosNovo->read(null, $boleto_id);
		$this->render('form_boleto');
	}
	
}
