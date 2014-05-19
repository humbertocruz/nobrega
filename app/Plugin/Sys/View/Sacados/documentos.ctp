<?php
if ($tipo == 'contrato') $this->extend('contrato'); 
if ($tipo == 'procuracao') $this->extend('procuracao');
if ($tipo == 'hipossuficiencia') $this->extend('hipossuficiencia');
if ($tipo == 'recibo') $this->extend('recibo');
if ($tipo == 'promissoria') $this->extend('promissoria');

?>

<?php
	$infos = array(
		'outorgante_nome' => $Documento['Outorgante']['nome_razaosocial'],
		'outorgante_nacionalidade' => $Documento['Outorgante']['nacionalidade'],
		'outorgante_estadocivil' => (isset($Documento['Outorgante']['EstadosCivil']['descricao']))?($Documento['Outorgante']['EstadosCivil']['descricao']):('Nenhum'),
		'outorgante_docnumero' => $Documento['Outorgante']['docnumero'],
		'outorgante_docorgao' => $Documento['Outorgante']['docorgao'],
		'outorgante_cpfcnpj' => $Documento['Outorgante']['cpf_cnpj'],
		'outorgante_endereco' => $Documento['Outorgante']['endereco'],
		'outorgante_cidade' => $Documento['Outorgante']['cidade'],
		'outorgante_uf' => $Documento['Outorgante']['uf'],
		'outorgante_telefone' => $Documento['Outorgante']['telefone']
	);
	
	if (count($Documento['Representante']>0)) {
	$infos = $infos + array(
		'representante_nome' => $Documento['Representante']['nome_razaosocial'],
		'representante_nacionalidade' => $Documento['Representante']['nacionalidade'],
		'representante_estadocivil' => (isset($Documento['Representante']['EstadosCivil']['descricao']))?($Documento['Representante']['EstadosCivil']['descricao']):('Nenhum'),
		'representante_docnumero' => $Documento['Representante']['docnumero'],
		'representante_docorgao' => $Documento['Representante']['docorgao'],
		'representante_cpfcnpj' => $Documento['Representante']['cpf_cnpj'],
		'representante_endereco' => $Documento['Representante']['endereco'],
		'representante_cidade' => $Documento['Representante']['cidade'],
		'representante_uf' => $Documento['Representante']['uf'],
		'representante_telefone' => $Documento['Representante']['telefone']
	);
	}
	if ($modelo == 'Out') {
	$infos = $infos + array(
		'documento_data' => $Documento['DocumentoOut']['data'],
		'documento_valor' => $Documento['DocumentoOut']['valor'],
		'documento_parcelas' => $Documento['DocumentoOut']['parcelas'],
		'documento_parcelas_valor' => floatval( ($Documento['DocumentoOut']['valor']/$Documento['DocumentoOut']['parcelas'] )),
	);
	} else {
	$infos = $infos + array(
		'documento_data' => $Documento['DocumentoRep']['data'],
		'documento_valor' => $Documento['DocumentoRep']['valor'],
		'documento_parcelas' => $Documento['DocumentoRep']['parcelas'],
		'documento_parcelas_valor' => floatval( ($Documento['DocumentoRep']['valor']/$Documento['DocumentoRep']['parcelas'] )),	
	);
	} 
	//$this->start('debug');pr($infos);$this->end(); 
	foreach($infos as $key=>$value) {
		$this->assign($key, (trim($value))?($value):('['. strtoupper($key).' EM BRANCO]') );
	}	
?>
