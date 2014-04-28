<?php $this->extend('Bootstrap./Common/index'); ?>

<?php $this->start('pageHeader');?>Estados Civis<?php $this->end(); ?>

<<?php $this->start('table-tr'); ?>
	<tr class="active">
		<th class="col-md-2">&nbsp;</th>
		<th><?php echo $this->Paginator->sort('nome','Nome');?></th>
	</tr>
<?php $this->end(); ?>

<?php $this->start('table-body'); ?>
	<?php foreach ($data as $EstadosCivil) { ?>
	<tr>
		<td><?php echo $this->Bootstrap->basicActions($EstadosCivil['EstadosCivil']['id']); ?></td>
		<td><?php echo $EstadosCivil['EstadosCivil']['descricao']; ?></td>
	</tr>
	<?php } ?>
<?php $this->end(); ?>