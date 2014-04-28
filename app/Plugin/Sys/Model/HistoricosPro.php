<?php

class HistoricosPro extends SysAppModel {

	var $useTable = 'sisadv_historicopro';
	var $useDbConfig = 'default';
	
	var $belongsTo = array(
		'Sacado' => array(
			'className' => 'Sys.Sacado',
			'foreignKey' => 'sacado_id'
		)
	);
	
	var $hasMany = array(
		'Arquivo' => array(
			'className' => 'Sys.Arquivo',
			'foreignKey' => 'historicopro_id'
		)
	);
	
	public function afterFind($results , $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['HistoricosPro']['data'])) {
			$results[$key]['HistoricosPro']['data'] = $this->dateFormatAfterFind(
				$val['HistoricosPro']['data']
			);
			}
		}
		return $results;
	}
	
	public function beforeSave($options = array()) {
		if (!empty($this->data['HistoricosPro']['data'])) {
			$this->data['HistoricosPro']['data'] = $this->dateFormatBeforeSave(
				$this->data['HistoricosPro']['data']
			);
		}
	}

}
