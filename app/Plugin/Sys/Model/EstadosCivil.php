<?php

class EstadosCivil extends SysAppModel {

	var $useTable = 'sisadv_estadocivil';
	var $useDbConfig = 'default';
	
	var $hasMany = array(
		'Sacado' => array(
			'className' => 'Sys.Sacado',
			'foreignKey' => 'modelopessoa_id'
		)
	);

}
