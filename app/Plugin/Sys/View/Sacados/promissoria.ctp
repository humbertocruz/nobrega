<?php
$data_doc = explode('/', $this->fetch('documento_data'));
$dia_doc = $data_doc[0];
$mes_doc = $data_doc[1];
$ano_doc = $data_doc[2];
$meses = array(
	1 => 'Janeiro',
	2 => 'Fevereiro',
	3 => 'Março',
	4 => 'Abril',
	5 => 'Maio',
	6 => 'Junho',
	7 => 'Julho',
	8 => 'Agosto',
	9 => 'Setembro',
	10 => 'Outubro',
	11 => 'Novembro',
	12 => 'Dezembro'
);
?>
<div style="width: 600px; margin: 10px auto; text-align: justify;">
<strong>GUIMARAES & NOBREGA ADVOCACIA</strong>
<?php echo $this->fetch('debug'); ?>
<br>
<br>

<div class="panel panel-default">
	<div class="panel-heading clearfix">
		<strong>N. 1/1</strong>
		<strong class="pull-right">Vencimento: <?php echo $this->fetch('documento_data'); ?></strong>
	</div>
	<div class="panel-body">
		Aos <?php echo $this->Caritas->extenso($dia_doc); ?> dias do mês de <?php echo $meses[intval($mes_doc)];?> do ano de <?php echo $this->Caritas->extenso($ano_doc); ?>.***<br>
		<br>
		*** pagarei por esta única via de N O T A  P R O M I S S Ó R I A<br>
		<br>
		A JULIANA INÁCIO DE MAGALHÃES E A ÍTALO ANTUNES DA NÓBREGA
OU A SUA ORDEM A QUANTIA DE **<?php echo $this->Caritas->extenso($this->fetch('documento_valor'));?> REAIS** EM MOEDA CORRENTE NACIONAL
<br>
<br>
Pagável em: <?php echo $this->fetch('outorgante_cidade');?> - <?php echo $this->fetch('outorgante_uf'); ?><br>
<br>
Emitente: <strong><?php echo $this->fetch('outorgante_nome');?></strong><br>
<br>
para maior clareza firmo o presente recibo para que produza os seus efeitos, dando plena, rasa e irrvogável quitação, pelo valor recebido. <br>
<br>
<div class="clearfix">
	<div>CPF: <strong><?php echo $this->fetch('outorgante_cpfcnpj');?></strong></div>
	<div class="pull-right">Vencimento: <strong><?php echo $this->fetch('documento_data'); ?></strong></div>
</div>
<br>
<br>
Endereço: <?php echo $this->fetch('outorgante_endereco');?> - <?php echo $this->fetch('outorgante_cidade');?> - <?php echo $this->fetch('outorgante_uf');?>
<br>
<br>
<br>
<br>
––––––––––––––––––––––––––––––––––––––––––––––<br>
<?php if( array_search('representante_nome', $this->blocks())) { ?>
<?php echo $this->fetch('representante_nome'); ?>
<?php } else { ?>
<?php echo $this->fetch('outorgante_nome'); ?>
<?php } ?>
<br>

	</div>
</div>
