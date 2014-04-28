<?php $this->extend('Bootstrap./Common/form'); ?>

<?php $this->assign('pageHeader', 'Documentos'); ?>


<?php $this->start('form-create');?>
	<?php echo $this->Bootstrap->create('DocumentoOut'); ?>
<?php $this->end(); ?>
<?php $this->start('actions');?>
	<?php echo $this->Bootstrap->actions(null, $formActions); ?>
<?php $this->end(); ?>

<?php $this->start('form-body');
	echo $this->Bootstrap->input('data',array('type'=>'text','label'=>'Data'));
	echo $this->Bootstrap->input('outorgante_search',array('label'=>'Pesquise Outorgante'));
	echo $this->Bootstrap->input('outorgante_id',array('label'=>'Outorgante','options'=>$Outorgantes));
	echo $this->Bootstrap->input('valor', array('label'=>'Valor'));
	echo $this->Bootstrap->input('parcelas', array('type'=>'number','label'=>'Parcelas','value'=>1,'min'=>1));
$this->end(); ?>
