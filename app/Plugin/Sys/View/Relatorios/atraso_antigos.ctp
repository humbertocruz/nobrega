<?php $this->extend('Sys./Common/boletos'); ?>

<?php $this->start('title');?>Clientes em Atraso (Boletos Antigos)<?php $this->end(); ?>

<?php $this->start('table-tr'); ?>
	<tr>
		<th>Cliente</th>
		<th>Quantidade de Boletos</th>
		<th>Valor</th>
	</tr>
<?php $this->end();?>

<?php $this->start('table-body'); ?>
	<?php foreach ($data as $boletos) { ?>
	<tr>
		<td><?php echo $this->Html->link( $boletos['Sacado']['nome_razaosocial'], array('controller'=>'Sacados','action'=>'view',$boletos['BoletosAntigo']['sacado_id'])); ?>
		<td class="text-center"><?php echo $boletos['0']['quantidade'];?>
		<td class="text-right"><?php echo number_format( $boletos['0']['soma'], 2, ',','.');?>
	</tr>
	<?php } ?>
<?php $this->end();?>
