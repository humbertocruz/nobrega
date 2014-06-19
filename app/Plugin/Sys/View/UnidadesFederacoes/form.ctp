<?php $this->extend('Bootstrap./Common/form'); ?>

<?php $this->start('pageHeader');?>Unidades da Federação<?php $this->end(); ?>

<?php $this->start('form-create');?>
	<?php echo $this->Bootstrap->create('UnidadesFederacao'); ?>
<?php $this->end(); ?>
<?php $this->start('actions');?>
	<?php echo $this->Bootstrap->actions(null, $formActions); ?>
<?php $this->end(); ?>
<?php $this->start('form-body');
	echo $this->Form->input('sigla',array('label'=>'Sigla'));
	echo $this->Form->input('nome',array('label'=>'Nome'));
$this->end(); ?>