<?php $this->extend('Bootstrap./Common/index'); ?>

<?php $this->assign('panelStyle','primary'); ?>
<?php $this->assign('pageHeader','Sacados'); ?>


<?php $this->start('actions'); ?>
	<?php echo $this->Bootstrap->actions(null, $listActions); ?>
<?php $this->end(); ?>

<?php $this->start('table-tr');
	$this->Bootstrap-
$this->end(); ?>

<?php $this->start('table-tr'); ?>
	<tr class="active">
		<th class="col-md-2">&nbsp;</th>
		<th><?php echo $this->Paginator->sort('id','Código');?></th>
		<th><?php echo $this->Paginator->sort('nome_razaosocial','Nome ou Razão Social');?></th>
		<th>Boletos Antigos</th>
		<th>Boletos Novos</th>
		<th>Documentos</th>
	</tr>
<?php $this->end(); ?>

<?php $this->start('table-body'); ?>
	<?php foreach ($data as $Sacado) { 
		if (count($Sacado['DocumentoOut'] > 0)) {
			$btnDocs = '<div class="btn-group">
			<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Documento&nbsp;<span class="caret"></span></button>
			<ul class="dropdown-menu" role="menu">
				<li>'.$this->Html->link('Contrato', array('action'=>'documentos','contrato',$Sacado['Sacado']['id'])).'</li>
				<li>'.$this->Html->link('Procuração', array('action'=>'documentos','procuracao',$Sacado['Sacado']['id'])).'</li>
			</ul>
			</div>';
		}
	?>
	<tr>
		<td><?php echo $this->Bootstrap->actions($Sacado['Sacado']['id'], $indexActions); ?></td>
		<td><?php echo $Sacado['Sacado']['id']; ?></td>
		<td><?php echo $Sacado['Sacado']['nome_razaosocial']; ?></td>
		<td><?php echo count($Sacado['BoletosAntigo']); ?></td>
		<td><?php echo count($Sacado['BoletosNovo']); ?></td>
		<td><?php echo (count( $Sacado['DocumentoOut']) > 0)?( $btnDocs ):('Nenhum'); ?></td>
	</tr>
	<?php } ?>
<?php $this->end(); ?>
