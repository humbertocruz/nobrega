<?php $this->extend('Bootstrap./Common/form'); ?>

<?php $this->start('pageHeader');?>Boletos<?php $this->end(); ?>

<?php $this->start('form-create');?>
	<?php echo $this->Bootstrap->create('BoletosNovo'); ?>
<?php $this->end(); ?>
<?php $this->start('actions');?>
	<?php echo $this->Bootstrap->actions(null, $formActions); ?>
<?php $this->end(); ?>
<?php $this->start('form-body');
	echo $this->Form->input('nosso_numero',array('label'=>'Nosso Número'));
	echo $this->Form->input('valor',array('label'=>'Valor'));
	echo $this->Form->input('data_vencimento',array('label'=>'Data Vencimento','type'=>'text'));
	//echo $this->Form->input('data_pagamento',array('label'=>'Data Pagamento','type'=>'text'));
	echo $this->Form->input('situacao_id',array('label'=>'Situação','options'=>$SituacoesBoleto));
	//echo $this->Form->input('exc_user_id',array('label'=>'Usuário Exclusão','options'=>$Usuarios));
	//echo $this->Form->input('exc_data',array('label'=>'Data Exclusão','type'=>'text'));
$this->end(); ?>