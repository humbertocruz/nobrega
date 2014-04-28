<?php
if ($tipo == 'contrato') $this->extend('contrato'); 
if ($tipo == 'procuracao') $this->extend('procuracao'); 
?>

<?php 
	$this->assign('outorgante_nome', $Sacado['Sacado']['nome_razaosocial'] );
	$this->assign('outorgante_nacionalidade', $Sacado['Sacado']['nacionalidade'] );
	$this->assign('outorgante_estadocivil', $Sacado['EstadosCivil']['descricao'] );
	$this->assign('outorgante_docnumero', $Sacado['Sacado']['docnumero'] );
	$this->assign('outorgante_docorgao', $Sacado['Sacado']['docorgao'] );
	$this->assign('outorgante_cpfcnpj', $Sacado['Sacado']['cpf_cnpj'] );
	$this->assign('outorgante_endereco', $Sacado['Sacado']['endereco'] );
	$this->assign('outorgante_cidade', $Sacado['Sacado']['cidade'] );
	$this->assign('outorgante_uf', $Sacado['Sacado']['uf'] );
	$this->assign('outorgante_telefone', $Sacado['Sacado']['telefone'] );
	if (!empty($Sacado['DocumentoRep'])) {
	$this->assign('representante_nome', $Sacado['Sacado']['telefone'] );
	}
	$this->assign('documento_data', $Sacado['DocumentoOut'][0]['data'] );
	$this->assign('documento_valor', $Sacado['DocumentoOut'][0]['valor'] );
	$this->assign('documento_parcelas', $Sacado['DocumentoOut'][0]['parcelas'] );
	$this->assign('documento_parcelas_valor', floatval( ($Sacado['DocumentoOut'][0]['valor']/$Sacado['DocumentoOut'][0]['parcelas'] )) );	
?>
