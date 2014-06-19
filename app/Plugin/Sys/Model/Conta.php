<?php

class Conta extends SysAppModel {

	var $useTable = 'sisadv_conta';
	var $useDbConfig = 'default';
	
	var $belongsTo = array(
		'Agencia' => array(
			'className' => 'Sys.Agencia'
		)
	);
	
	public function afterFind($results , $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['Conta']['data_saldo'])) {
			$results[$key]['Conta']['data_saldo'] = $this->dateFormatAfterFind(
				$val['Conta']['data_saldo']
			);
			}
		}
		return $results;
	}
	
	public function beforeSave($options = array()) {
		if (!empty($this->data['Conta']['data_saldo'])) {
			$this->data['Conta']['data_saldo'] = $this->dateFormatBeforeSave(
				$this->data['Conta']['data_saldo']
			);
		}
	}

}
