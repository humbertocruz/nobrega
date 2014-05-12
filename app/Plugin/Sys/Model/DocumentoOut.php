<?php

class DocumentoOut extends SysAppModel {

	var $useTable = 'sisadv_documento';
	var $useDbConfig = 'default';
	
	var $belongsTo = array(
		'Outorgante' => array(
			'className' => 'Sys.Sacado',
			'foreignKey' => 'outorgante_id'
		),
		'Representante' => array(
			'className' => 'Sys.Sacado',
			'foreignKey' => 'representante_id'
		)
	);
	
	public function afterFind($results , $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['DocumentoOut']['data'])) {
			$results[$key]['DocumentoOut']['data'] = $this->dateFormatAfterFind(
				$val['DocumentoOut']['data']
			);
			}
		}
		return $results;
	}
	
	public function beforeSave($options = array()) {
		if (!empty($this->data['DocumentoOut']['data'])) {
			$this->data['DocumentoOut']['data'] = $this->dateFormatBeforeSave(
				$this->data['DocumentoOut']['data']
			);
		}
	}
	
	public function dateFormatAfterFind($dateString) {
		return date('d/m/Y', strtotime($dateString));
	}
	
	public function dateFormatBeforeSave($dateString) {
		return date('Y-m-d', strtotime($dateString));
	}

}
