<?php

class Sacado extends SysAppModel {

	var $useTable = 'sisadv_sacado';
	var $useDbConfig = 'default';
	
	var $hasMany = array(
		'BoletosNovo' => array(
			'className' => 'Sys.BoletosNovo',
			'foreignKey' => 'sacado_id'
		),
		'BoletosAntigo' => array(
			'className' => 'Sys.BoletosAntigo',
			'foreignKey' => 'sacado_id'
		),
		'HistoricosAdm' => array(
			'className' => 'Sys.HistoricosAdm',
			'foreignKey' => 'sacado_id'
		),
		'HistoricosPro' => array(
			'className' => 'Sys.HistoricosPro',
			'foreignKey' => 'sacado_id'
		),
		'DocumentoOut' => array(
			'className' => 'Sys.DocumentoOut',
			'foreignKey' => 'outorgante_id'
		),
		'DocumentoRep' => array(
			'className' => 'Sys.DocumentoRep',
			'foreignKey' => 'representante_id'
		)
	);
	
	var $belongsTo = array(
		'ModelosPessoa' => array(
			'className' => 'Sys.ModelosPessoa',
			'foreignKey' => 'modelopessoa_id'
		),
		'TiposPessoa' => array(
			'className' => 'Sys.TiposPessoa',
			'foreignKey' => 'tipopessoa_id'
		),
		'EstadosCivil' => array(
			'className' => 'Sys.EstadosCivil',
			'foreignKey' => 'estadocivil_id'
		)
	);

}
