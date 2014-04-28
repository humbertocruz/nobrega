<?php
class Usuario extends AppModel {
	var $useDbConfig = 'Admin';
	var $useTable = 'usuarios';
	
	var $belongsTo = array(
		'NiveisAcesso' => array(
			'className' => 'Admin.NiveisAcesso',
			'foreignKey' => 'nivel_acesso_id'
		)
	);
}