<?php

class Banco extends SysAppModel {

	var $useTable = 'sisadv_banco';
	var $useDbConfig = 'default';
	
	var $belongsTo = array(
		'Menu' => array(
			'className' => 'Sys.Menu',
			'foreignKey' => 'menu_id'
		)
	);

}
