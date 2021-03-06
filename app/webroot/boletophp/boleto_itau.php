<?php
// +----------------------------------------------------------------------+
// | BoletoPhp - Vers�o Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo est� dispon�vel sob a Licen�a GPL dispon�vel pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Voc� deve ter recebido uma c�pia da GNU Public License junto com     |
// | esse pacote; se n�o, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colabora��es de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de Jo�o Prado Maia e Pablo Martins F. Costa				        |
// | 														                                   			  |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Equipe Coordena��o Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto Ita�: Glauber Portella                        |
// +----------------------------------------------------------------------+

// Le Dados do Banco de Dados Nobrega
$con = mysql_connect('mysql.sejalivre.com.br', 'nobrega_mysql', 'jumipri');
$db = mysql_select_db('nobrega_php');
$boleto_id = $_GET['boleto'];
$sql = 'select * from sisadv_boletonovo where id = '.$boleto_id;
$query = mysql_query($sql);

$boleto = mysql_fetch_assoc($query);

$sql_sacado = 'select * from sisadv_sacado where id = '.$boleto['sacado_id'];
$query_sacado = mysql_query($sql_sacado);
$sacado = mysql_fetch_assoc($query_sacado);
//print_r($sacado);

// ------------------------- DADOS DIN�MICOS DO SEU CLIENTE PARA A GERA��O DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formul�rio c/ POST, GET ou de BD (MySql,Postgre,etc)	//

// DADOS DO BOLETO PARA O SEU CLIENTE
$dias_de_prazo_para_pagamento = 30;
$taxa_boleto = 2.95;
//$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
$data_venc = date("d/m/Y", strtotime($boleto['data_vencimento']));  // Prazo de X dias OU informe data: "13/04/2006"; 

//$valor_cobrado = "2,00"; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = $boleto['valor']; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal

$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

$dadosboleto["nosso_numero"] = sprintf('%08d', $boleto['id']);  // Nosso numero - REGRA: M�ximo de 8 caracteres!
$dadosboleto["numero_documento"] = $dadosboleto['nosso_numero'];	// Num do pedido ou nosso numero
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emiss�o do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com v�rgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $sacado['nome_razaosocial'];
$dadosboleto["endereco1"] = $sacado['endereco'];
$dadosboleto["endereco2"] = $sacado['cidade']. ' - '.$sacado['uf'].' - '.$sacado['cep'];

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "Pagamento Guimar�es e Nobrega Advocacia";
$dadosboleto["demonstrativo2"] = "Referente a �.<br>Taxa banc�ria - R$ ".number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"] = "http://helpconsumidor.com.br";
$dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 5% ap�s o vencimento e juros de 5% ao mes.";
$dadosboleto["instrucoes2"] = "- Receber at� 30 dias ap�s o vencimento - Taxa de R$ 7,00 pela 2a via deste boleto.";
$dadosboleto["instrucoes3"] = "- Em caso de d�vidas entre em contato conosco: financeiro@guimaraesenobrega.com.br";
$dadosboleto["instrucoes4"] = "&nbsp; Emitido pelo Sistmea Nobrega - www.guimaraesenobrega.com.br";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "1";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "";		
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "";


// ---------------------- DADOS FIXOS DE CONFIGURA��O DO SEU BOLETO --------------- //


// DADOS DA SUA CONTA - ITA�
$dadosboleto["agencia"] = "2902"; // Num da agencia, sem digito
$dadosboleto["conta"] = "29555";	// Num da conta, sem digito
$dadosboleto["conta_dv"] = "5"; 	// Digito do Num da conta

// DADOS PERSONALIZADOS - ITA�
$dadosboleto["carteira"] = "175";  // C�digo da Carteira: pode ser 175, 174, 104, 109, 178, ou 157

// SEUS DADOS
$dadosboleto["identificacao"] = "Boleto de Pagamento Advocacia Nobrega";
$dadosboleto["cpf_cnpj"] = "012.432.683/0001-35";
$dadosboleto["endereco"] = "QI 23, 9/12, 537";
$dadosboleto["cidade_uf"] = "Bras�lia / DF";
$dadosboleto["cedente"] = "Guimar�es e N�brega Advocacia";

// N�O ALTERAR!
include("include/funcoes_itau.php"); 
include("include/layout_itau.php");
?>
