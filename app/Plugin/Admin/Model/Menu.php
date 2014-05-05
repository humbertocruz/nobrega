<?php
App::uses('AppModel', 'Model');
class Menu extends AdminAppModel {

	public $useDbConfig = 'Admin';
	public $displayField = 'nome';


	public $belongsTo = array(
		'Grupo' => array(
			'className' => 'Admin.Grupo'
		)
	);
	
	public $hasMany = array(
		'Link' => array(
			'className' => 'Admin.Link'
		)
	);

}
