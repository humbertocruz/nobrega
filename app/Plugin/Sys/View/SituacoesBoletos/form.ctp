<?php $this->extend('Bootstrap./Common/form'); ?>

<?php $this->start('pageHeader');?>Situações de Boletos<?php $this->end(); ?>

<?php $this->start('form-create');?>
	<?php echo $this->Bootstrap->create('SituacoesBoleto'); ?>
<?php $this->end(); ?>
<?php $this->start('form-body');
	echo $this->Form->input('descricao',array('label'=>'Descrição'));
$this->end(); ?>