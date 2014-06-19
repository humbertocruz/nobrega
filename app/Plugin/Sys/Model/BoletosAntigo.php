<?php

class BoletosAntigo extends SysAppModel {

	var $useTable = 'sisadv_boletoantigo';
	var $useDbConfig = 'default';
	
	var $belongsTo = array(
		'Sacado' => array(
			'className' => 'Sys.Sacado',
			'foreignKey' => 'sacado_id'
		),
		'SituacoesBoleto' => array(
			'className' => 'Sys.SituacoesBoleto',
			'foreignKey' => 'situacao_id'
		)
	);
	
	public function afterFind($results , $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['BoletosAntigo']['data_vencimento'])) {
			$results[$key]['BoletosAntigo']['data_vencimento'] = $this->dateFormatAfterFind(
				$val['BoletosAntigo']['data_vencimento']
			);
			}
		}
		return $results;
	}
	
	public function beforeSave($options = array()) {
		if (!empty($this->data['BoletosAntigo']['data_vencimento'])) {
			$this->data['BoletosAntigo']['data_vencimento'] = $this->dateFormatBeforeSave(
				$this->data['BoletosAntigo']['data_vencimento']
			);
		}
	}

}
