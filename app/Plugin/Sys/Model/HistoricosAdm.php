<?php

class HistoricosAdm extends SysAppModel {

	var $useTable = 'sisadv_historico';
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
			'foreignKey' => 'historicoadm_id'
		)
	);
	
	public function afterFind($results , $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['HistoricosAdm']['data'])) {
			$results[$key]['HistoricosAdm']['data'] = $this->dateFormatAfterFind(
				$val['HistoricosAdm']['data']
			);
			}
		}
		return $results;
	}
	
	public function beforeSave($options = array()) {
		if (!empty($this->data['HistoricosAdm']['data'])) {
			$this->data['HistoricosAdm']['data'] = $this->dateFormatBeforeSave(
				$this->data['HistoricosAdm']['data']
			);
		}
	}

}
