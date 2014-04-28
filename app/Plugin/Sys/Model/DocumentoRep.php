<?php

class DocumentoRep extends SysAppModel {

	var $useTable = 'sisadv_documento';
	var $useDbConfig = 'default';
	
	var $belongsTo = array(
		'Sacado' => array(
			'className' => 'Sys.Sacado',
			'foreignKey' => 'representante_id'
		)
	);

}
