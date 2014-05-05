<?php $this->extend('Bootstrap./Common/index'); ?>

<?php $this->assign('panelStyle','primary'); ?>
<?php $this->assign('pageHeader','Permissões'); ?>


<?php $this->start('actions'); ?>
	<?php echo $this->Bootstrap->actions(null, $listActions); ?>
<?php $this->end(); ?>

<<?php $this->start('table-tr'); ?>
	<tr class="active">
		<th class="col-md-2">&nbsp;</th>
		<th>Plugin</th>
		<th>Controller</th>
		<th>Action</th>
		<th>Grupos</th>
	</tr>
<?php $this->end(); ?>

<?php $this->start('table-body'); ?>
	<?php foreach ($data as $Model) { ?>
	<tr>
		<td><?php echo $this->Bootstrap->actions($Model['Permissao']['id'],$indexActions); ?></td>
		<td><?php echo $Model['Permissao']['plugin']; ?></td>
		<td><?php echo $Model['Permissao']['controller']; ?></td>
		<td><?php echo $Model['Permissao']['action']; ?></td>
		<td><?php foreach($Model['Grupo'] as $grupo) { echo $grupo['nome']; };?></td>
	</tr>
	<?php } ?>
<?php $this->end(); ?>