<?php $this->extend('Bootstrap./Common/index'); ?>
<?php $this->assign('panelStyle','primary'); ?>
<?php $this->assign('pageHeader','Bancos'); ?>

<?php $this->start('actions'); ?>
	<?php echo $this->Bootstrap->actions(null, $listActions); ?>
<?php $this->end(); ?>

<<?php $this->start('table-tr'); ?>
	<tr class="active">
		<th class="col-md-2">&nbsp;</th>
		<th><?php echo $this->Paginator->sort('nome','Nome');?></th>
	</tr>
<?php $this->end(); ?>

<?php $this->start('table-body'); ?>
	<?php foreach ($data as $Banco) { ?>
	<tr>
		<td><?php echo $this->Bootstrap->actions($Banco['Banco']['id'], $indexActions); ?></td>
		<td><?php echo $Banco['Banco']['nome']; ?></td>
	</tr>
	<?php } ?>
<?php $this->end(); ?>