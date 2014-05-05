<?php $this->extend('Bootstrap./Common/form'); ?>

<?php $this->assign('pageHeader', 'Links'); ?>
<?php $this->assign('form-create', $this->Bootstrap->create('Link') ); ?>
<?php $this->assign('actions', $this->Bootstrap->actions(null, $formActions) ); ?>


<?php $this->start('form-body');
	echo $this->Bootstrap->input('texto',array('label'=>'Texto'));
	echo $this->Bootstrap->input('menu_id',array('label'=>'Menu','options'=>$Menus));
	echo $this->Bootstrap->input('permissao_id',array('label'=>'Item','options'=>$Permissoes));
	echo $this->Bootstrap->input('parent_id',array('label'=>'Link Pai','options'=>$Links));
$this->end(); ?>
