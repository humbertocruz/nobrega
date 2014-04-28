<?php

class TiposPEssoa extends SysAppModel {

	var $useTable = 'sisadv_tipopessoa';
	var $useDbConfig = 'default';
	
	var $hasMany = array(
		'Sacado' => array(
			'className' => 'Sys.Sacado',
			'foreignKey' => 'tipopessoa_id'
		)
	);

}
