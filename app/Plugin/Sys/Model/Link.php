<?php

class Link extends SysAppModel {

	var $useTable = 'links';
	var $useDbConfig = 'Admin';
	
	var $belongsTo = array(
		'Menu' => array(
			'className' => 'Sys.Menu',
			'foreignKey' => 'menu_id'
		)
	);

}
