<?php
class NiveisAcesso extends AppModel {
	var $useDbConfig = 'Admin';
	var $useTable = 'niveis_acessos';
	
	var $hasMany = array(
		'Usuario' => array(
			'className' => 'Admin.Usuario',
			'foreignKey' => 'nivel_acesso_id'
		)
	);
}