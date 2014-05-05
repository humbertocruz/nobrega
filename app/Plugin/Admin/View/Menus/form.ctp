<?php $this->extend('Bootstrap./Common/form'); ?>

<?php $this->assign('pageHeader', 'Menus'); ?>
<?php $this->assign('form-create', $this->Bootstrap->create('Menu') ); ?>
<?php $this->assign('actions', $this->Bootstrap->actions(null, $formActions) ); ?>

<?php $this->start('form-body');
	echo $this->Bootstrap->input('nome', array('label'=>'Nome'));
	echo $this->Bootstrap->input('grupo_id', array('label'=>'Grupo','options'=>$Grupos));
$this->end(); ?>

