<?php $this->extend('Bootstrap./Common/form'); ?>

<?php $this->start('pageHeader');?>Agências<?php $this->end(); ?>

<?php $this->start('form-create');?>
	<?php echo $this->Bootstrap->create('Agencia'); ?>
<?php $this->end(); ?>
<?php $this->start('form-body');
	echo $this->Form->input('nome',array('label'=>'Nome'));
	echo $this->Form->input('numero',array('label'=>'Número'));
	echo $this->Form->input('banco_id',array('label'=>'Banco','options'=>$Bancos));
$this->end(); ?>