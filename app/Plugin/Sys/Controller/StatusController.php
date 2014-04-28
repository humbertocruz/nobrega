<?php
class StatusController extends SysAppController {

	public $uses = array('Sys.Sacado','Sys.BoletosNovo');
	 
	public function index() {
		$dt_ontem = getdate(strtotime('yesterday'));
		$dt_hoje = getdate(strtotime('today'));
		$dt_amanha = getdate(strtotime('tomorrow'));
		
		$paginate_ontem = array(
			'fields' => array(
				'Sacado.id',
				'Sacado.nome_razaosocial',
				'BoletosNovo.valor',
				'BoletosNovo.data_vencimento',
				'BoletosNovo.data_pagamento',
				'BoletosNovo.situacao_id'
			),
			'conditions' => array(
				'BoletosNovo.data_vencimento ' => $dt_ontem['year'].'/'.$dt_ontem['mon'].'/'.$dt_ontem['mday'],
				'BoletosNovo.situacao_id <' => 3
			)
		);
		$paginate_hoje = array(
			'fields' => array(
				'Sacado.id',
				'Sacado.nome_razaosocial',
				'BoletosNovo.valor',
				'BoletosNovo.data_vencimento',
				'BoletosNovo.data_pagamento',
				'BoletosNovo.situacao_id'
			),
			'conditions' => array(
				'BoletosNovo.data_vencimento ' => $dt_hoje['year'].'/'.$dt_hoje['mon'].'/'.$dt_hoje['mday'],
				'BoletosNovo.situacao_id <' => 3
			)
		);
		$paginate_amanha = array(
			'fields' => array(
				'Sacado.id',
				'Sacado.nome_razaosocial',
				'BoletosNovo.valor',
				'BoletosNovo.data_vencimento',
				'BoletosNovo.data_pagamento',
				'BoletosNovo.situacao_id'
			),
			'conditions' => array(
				'BoletosNovo.data_vencimento ' => $dt_amanha['year'].'/'.$dt_amanha['mon'].'/'.$dt_amanha['mday'],
				'BoletosNovo.situacao_id <' => 3
			)
		);
	
		$this->Paginator->settings = $paginate_ontem;
		$ontem =  $this->Paginator->paginate('BoletosNovo');
		$this->set('ontem', $ontem);
		$this->set('dt_ontem', $dt_ontem['mday'].'/'.$dt_ontem['mon'].'/'.$dt_ontem['year']);
		
		$this->Paginator->settings = $paginate_hoje;
		$hoje =  $this->Paginator->paginate('BoletosNovo');
		$this->set('hoje', $hoje);
		$this->set('dt_hoje', $dt_hoje['mday'].'/'.$dt_hoje['mon'].'/'.$dt_hoje['year']);
		
		$this->Paginator->settings = $paginate_amanha;
		$amanha =  $this->Paginator->paginate('BoletosNovo');
		$this->set('amanha', $amanha);
		$this->set('dt_amanha', $dt_amanha['mday'].'/'.$dt_amanha['mon'].'/'.$dt_amanha['year']);
	}
	
}
