<?php $this->extend('Bootstrap./Common/index'); ?>

<?php $this->assign('panelStyle','primary'); ?>
<?php $this->assign('pageHeader','Clientes'); ?>


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
	<?php foreach ($data as $Cliente) { ?>
	<tr>
		<td><?php echo $this->Bootstrap->actions($Cliente['Cliente']['id'],$indexActions); ?></td>
		<td><?php echo $Cliente['Cliente']['nome']; ?></td>
	</tr>
	<?php } ?>
<?php $this->end(); ?>