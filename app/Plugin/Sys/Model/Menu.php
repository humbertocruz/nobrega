<?php

class Menu extends SysAppModel {

	var $useTable = 'menus';
	var $useDbConfig = 'Admin';
	
	var $hasMany = array(
		'Link' => array(
			'className' => 'Sys.Link',
			'foreignKey' => 'menu_id'
		)
	);

}
