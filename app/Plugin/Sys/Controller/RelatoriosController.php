<?php
class RelatoriosController extends SysAppController {

	public $uses = array('Sys.Sacado','Sys.BoletosNovo');
		
	public $paginate_novo = array(
		'fields' => array(
			'BoletosNovo.sacado_id',
			'Sacado.nome_razaosocial',
			'sum(BoletosNovo.valor) as soma',
			'count(BoletosNovo.id) as quantidade'
		),
		'conditions' => array(
			'BoletosNovo.data_vencimento < ' => 'now()',
			'BoletosNovo.situacao_id' => '1'
		),
		'group' => array(
			'BoletosNovo.sacado_id'
		),
		'order' => array(
			'Sacado.nome_razaosocial' => 'ASC'	
		)
		
	);
	
	public $paginate_antigo = array(
		'fields' => array(
			'BoletosAntigo.sacado_id',
			'Sacado.nome_razaosocial',
			'sum(BoletosAntigo.valor) as soma',
			'count(BoletosAntigo.id) as quantidade'
		),
		'conditions' => array(
			'BoletosAntigo.data_vencimento < ' => 'now()',
			'BoletosAntigo.situacao_id' => '1'
		),
		'group' => array(
			'BoletosAntigo.sacado_id'
		),
		'order' => array(
			'Sacado.nome_razaosocial' => 'ASC'	
		)
		
	);
	
	public function index() {
		
	}

	public function atraso() {
		$this->Paginator->settings = $this->paginate_novo;
		$data = $this->Paginator->paginate('BoletosNovo');
		$this->set(compact('data'));
	}
	
	public function atraso_antigos() {
		$this->Paginator->settings = $this->paginate_antigo;
		$data = $this->Paginator->paginate('BoletosAntigo');
		$this->set(compact('data'));
	}
	
	public function mes() {
		
	}
	
}