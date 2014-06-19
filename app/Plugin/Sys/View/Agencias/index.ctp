<?php $this->extend('Bootstrap./Common/index'); ?>
<?php $this->assign('panelStyle','primary'); ?>
<?php $this->assign('pageHeader','Agências'); ?>

<?php $this->start('actions'); ?>
	<?php echo $this->Bootstrap->actions(null, $listActions); ?>
<?php $this->end(); ?>

<<?php $this->start('table-tr'); ?>
	<tr class="active">
		<th class="col-md-2">&nbsp;</th>
		<th><?php echo $this->Paginator->sort('nome','Nome');?></th>
		<th><?php echo $this->Paginator->sort('numero','Número');?></th>
		<th><?php echo $this->Paginator->sort('banco_id','Banco');?></th>
	</tr>
<?php $this->end(); ?>

<?php $this->start('table-body'); ?>
	<?php foreach ($data as $Agencia) { ?>
	<tr>
		<td><?php echo $this->Bootstrap->actions($Agencia['Agencia']['id'], $indexActions); ?></td>
		<td><?php echo $Agencia['Agencia']['nome']; ?></td>
		<td><?php echo $Agencia['Agencia']['numero']; ?></td>
		<td><?php echo $Agencia['Banco']['nome']; ?></td>
	</tr>
	<?php } ?>
<?php $this->end(); ?>