<?php

class DocumentoRep extends SysAppModel {

	var $useTable = 'sisadv_documento';
	var $useDbConfig = 'default';
	
	var $belongsTo = array(
		'Outorgante' => array(
			'className' => 'Sys.Sacado',
			'foreignKey' => 'outorgante_id'
		),
		'Representante' => array(
			'className' => 'Sys.Sacado',
			'foreignKey' => 'representante_id'
		)
	);

}
