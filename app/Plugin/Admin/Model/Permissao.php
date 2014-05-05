<?php
App::uses('AppModel', 'Model');
class Permissao extends AdminAppModel {
	public $useDbConfig = 'Admin';
    public $useTable = 'permissoes';
	public $hasAndBelongsToMany = array(
		'Grupo' => array(
			'className' => 'Admin.Grupo',
			'joinTable' => 'grupos_permissoes',
			'foreignKey' => 'permissao_id'
		)
	);
	
	public $virtualFields = array(
		'item' => 'CONCAT(Permissao.plugin, " - ", Permissao.controller, " - ", Permissao.action)'
	);
	
}