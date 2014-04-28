<?php $this->extend('Bootstrap./Common/index'); ?>

<?php $this->assign('panelStyle','primary'); ?>
<?php $this->assign('pageHeader','Documentos'); ?>


<?php $this->start('actions'); ?>
	<?php echo $this->Bootstrap->actions(null, $listActions); ?>
<?php $this->end(); ?>

<<?php $this->start('table-tr'); ?>
	<tr class="active">
		<th class="col-md-2">&nbsp;</th>
		<th><?php echo $this->Paginator->sort('data','Data');?></th>
		<th><?php echo $this->Paginator->sort('Sacado.nome','Outorgante');?></th>
		<th><?php echo $this->Paginator->sort('valor','Valor');?></th>
		<th><?php echo $this->Paginator->sort('parcelas','Parcelas');?></th>
	</tr>
<?php $this->end(); ?>

<?php $this->start('table-body'); ?>
	<?php foreach ($data as $Model) { ?>
	<tr>
		<td><?php echo $this->Bootstrap->actions($Model['DocumentoOut']['id'],$indexActions); ?></td>
		<td><?php echo $Model['DocumentoOut']['data']; ?></td>
		<td><?php echo $Model['Sacado']['nome_razaosocial']; ?></td>
		<td><?php echo $Model['DocumentoOut']['valor']; ?></td>
		<td><?php echo $Model['DocumentoOut']['parcelas']; ?></td>
	</tr>
	<?php } ?>
<?php $this->end(); ?>
