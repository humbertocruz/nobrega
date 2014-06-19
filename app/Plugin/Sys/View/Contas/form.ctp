<?php $this->extend('Bootstrap./Common/form'); ?>

<?php $this->start('pageHeader');?>Contas<?php $this->end(); ?>

<?php $this->start('form-create');?>
	<?php echo $this->Bootstrap->create('Conta'); ?>
<?php $this->end(); ?>
<?php $this->start('actions');?>
	<?php echo $this->Bootstrap->actions(null, $formActions); ?>
<?php $this->end(); ?>
<?php $this->start('form-body');
	echo $this->Form->input('numero',array('label'=>'Número'));
	echo $this->Form->input('agecia_id',array('label'=>'Agência','options'=>$Agencias));
	echo $this->Form->input('descricao',array('label'=>'Descrição'));
	echo $this->Form->input('saldo',array('label'=>'Saldo'));
	echo $this->Form->input('data_saldo',array('label'=>'Data do Saldo','type'=>'text'));
$this->end(); ?>