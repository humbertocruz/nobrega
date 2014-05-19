<?php $this->extend('Bootstrap./Common/index'); ?>
<?php $this->assign('panelStyle','primary'); ?>
<?php $this->assign('pageHeader','Contas'); ?>

<?php $this->start('actions'); ?>
	<?php echo $this->Bootstrap->actions(null, $listActions); ?>
<?php $this->end(); ?>

<<?php $this->start('table-tr'); ?>
	<tr class="active">
		<th class="col-md-2">&nbsp;</th>
		<th><?php echo $this->Paginator->sort('numero','Número');?></th>
		<th><?php echo $this->Paginator->sort('saldo','Saldo');?></th>
		<th><?php echo $this->Paginator->sort('data_saldo','Data Saldo');?></th>
	</tr>
<?php $this->end(); ?>

<?php $this->start('table-body'); ?>
	<?php foreach ($data as $Conta) { ?>
	<tr>
		<td><?php echo $this->Bootstrap->actions($Conta['Conta']['id'], $indexActions); ?></td>
		<td><?php echo $Conta['Conta']['numero']; ?></td>
		<td><?php echo number_format( $Conta['Conta']['saldo'], 2, ',', '.'); ?></td>
		<td><?php echo $Conta['Conta']['data_saldo']; ?></td>
	</tr>
	<?php } ?>
<?php $this->end(); ?>