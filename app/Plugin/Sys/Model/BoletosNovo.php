<?php

class BoletosNovo extends SysAppModel {

	var $useTable = 'sisadv_boletonovo';
	var $useDbConfig = 'default';
	var $order = array(
		'BoletosNovo.data_vencimento'=>'desc'
	);
	
	var $belongsTo = array(
		'Sacado' => array(
			'className' => 'Sys.Sacado',
			'foreignKey' => 'sacado_id'
		),
		'SituacoesBoleto' => array(
			'className' => 'Sys.SituacoesBoleto',
			'foreignKey' => 'situacao_id'
		),
		'Usuario' => array(
			'className' => 'Admin.Usuario',
			'foreignKey' => 'exc_user_id'
		)
	);
	
	public function afterFind($results , $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['BoletosNovo']['data_vencimento'])) {
			$results[$key]['BoletosNovo']['data_vencimento'] = $this->dateFormatAfterFind(
				$val['BoletosNovo']['data_vencimento']
			);
			}
		}
		return $results;
	}
	
	public function beforeSave($options = array()) {
		if (!empty($this->data['BoletosNovo']['data_vencimento'])) {
			$this->data['BoletosNovo']['data_vencimento'] = $this->dateFormatBeforeSave(
				$this->data['BoletosNovo']['data_vencimento']
			);
		}
	}
	
	public function dateFormatAfterFind($dateString) {
		return date('d/m/Y', strtotime($dateString));
	}
	
	public function dateFormatBeforeSave($dateString) {
		$data = DateTime::CreateFromFormat('d/m/Y', $dateString);
		return date('Y-m-d', $data->format('U'));
	}

}
