<?php

class Cliente extends SysAppModel {

	var $useTable = 'sisadv_cliente';
	var $useDbConfig = 'default';
	
	var $order = 'Cliente.nome';
	
	var $belongsTo = array(
		'TiposPessoa' => array(
			'className' => 'Sys.TiposPessoa',
			'foreignKey' => 'tipopessoa_id'
		),
		'UnidadesFederacao' => array(
			'className' => 'Sys.UnidadesFederacao',
			'foreignKey' => 'uf_id',
		),
		'EstadosCivil' => array(
			'className' => 'Sys.EstadosCivil',
			'foreignKey' => 'estadocivil_id'
		)
	);

}
