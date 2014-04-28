<?php $this->extend('Bootstrap./Common/index'); ?>

<?php $this->start('pageHeader');?>Situações de Boletos<?php $this->end(); ?>

<<?php $this->start('table-tr'); ?>
	<tr class="active">
		<th class="col-md-2">&nbsp;</th>
		<th><?php echo $this->Paginator->sort('nome','Nome');?></th>
	</tr>
<?php $this->end(); ?>

<?php $this->start('table-body'); ?>
	<?php foreach ($data as $SituacoesBoleto) { ?>
	<tr>
		<td><?php echo $this->Bootstrap->basicActions($SituacoesBoleto['SituacoesBoleto']['id']); ?></td>
		<td><?php echo $SituacoesBoleto['SituacoesBoleto']['descricao']; ?></td>
	</tr>
	<?php } ?>
<?php $this->end(); ?>