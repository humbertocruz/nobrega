<?php $this->extend('Bootstrap./Common/form'); ?>

<?php $this->start('pageHeader');?>Estados Civis<?php $this->end(); ?>

<?php $this->start('form-create');?>
	<?php echo $this->Bootstrap->create('EstadosCivil'); ?>
<?php $this->end(); ?>
<?php $this->start('form-body');
	echo $this->Form->input('descricao',array('label'=>'Descrição'));
$this->end(); ?>