<?php $this->extend('Bootstrap./Common/form'); ?>

<?php $this->assign('pageHeader', 'Sacados'); ?>


<?php $this->start('form-create');?>
	<?php echo $this->Bootstrap->create('Banco'); ?>
<?php $this->end(); ?>
<?php $this->start('actions');?>
	<?php echo $this->Bootstrap->actions(null, $formActions); ?>
<?php $this->end(); ?>
<?php $this->start('form-body');
	echo $this->Form->input('nome',array('label'=>'Nome'));
$this->end(); ?>

