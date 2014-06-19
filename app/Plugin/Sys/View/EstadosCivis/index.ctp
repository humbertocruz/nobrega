<?php $this->extend('Bootstrap./Common/index'); ?>
<?php $this->assign('panelStyle','primary'); ?>
<?php $this->assign('pageHeader','Estados Civis'); ?>

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
	<?php foreach ($data as $EstadosCivil) { ?>
	<tr>
		<td><?php echo $this->Bootstrap->actions($EstadosCivil['EstadosCivil']['id'], $indexActions); ?></td>
		<td><?php echo $EstadosCivil['EstadosCivil']['descricao']; ?></td>
	</tr>
	<?php } ?>
<?php $this->end(); ?>