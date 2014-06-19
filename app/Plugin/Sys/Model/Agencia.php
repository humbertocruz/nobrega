<?php

class Agencia extends SysAppModel {

	var $useTable = 'sisadv_agencia';
	var $useDbConfig = 'default';
	
	var $belongsTo = array(
		'Banco' => array(
			'className' => 'Sys.Banco',
			'foreignKey' => 'banco_id'
		)
	);

}
