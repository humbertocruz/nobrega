<?php

class ModelosPessoa extends SysAppModel {

	var $useTable = 'sisadv_modelopessoa';
	var $useDbConfig = 'default';
	
	var $hasMany = array(
		'Sacado' => array(
			'className' => 'Sys.Sacado',
			'foreignKey' => 'modelopessoa_id'
		)
	);

}
