<?php $this->extend('Bootstrap./Common/index'); ?>

<?php $this->assign('panelStyle','primary'); ?>
<?php $this->assign('pageHeader','Menus'); ?>


<?php $this->start('actions'); ?>
	<?php echo $this->Bootstrap->actions(null, $listActions); ?>
<?php $this->end(); ?>

<<?php $this->start('table-tr'); ?>
	<tr class="active">
		<th class="col-md-2">&nbsp;</th>
		<th><?php echo $this->Paginator->sort('nome','Nome');?></th>
		<th>Grupo</th>
	</tr>
<?php $this->end(); ?>

<?php $this->start('table-body'); ?>
	<?php foreach ($data as $Model) { ?>
	<tr>
		<td><?php echo $this->Bootstrap->actions($Model['Grupo']['id'],$indexActions, array('size'=>'sm')); ?></td>
		<td><?php echo $Model['Menu']['nome']; ?></td>
		<td><?php echo $Model['Grupo']['nome']; ?></td>
	</tr>
	<?php } ?>
<?php $this->end(); ?>


<?php echo $this->Bootstrap->pageHeader('Menus'); ?>

<?php echo $this->Element('Bootstrap.table/table-create',array(
	'title'=>'Menus',
	'state'=>'info'
)); ?>
<tr>
	<th class="col-md-1">&nbsp;</th>
	<th>Nome</th>
	<th>Posição</th>
	<th>Nível de Acesso</th>
</tr>
<?php foreach ($Menus as $Menu) { ?>
<tr>
	<td><?php echo $this->Bootstrap->basicActions($Menu['Menu']['id']);?></td>
	<td><?php echo $Menu['Menu']['nome']; ?></td>
	<td><?php echo $Menu['Menu']['posicao']; ?></td>
	<td><?php echo $Menu['NiveisAcesso']['nome']; ?></td>
</tr>
<?php } ?>
			</table>
		</div>
		<div class="panel-footer">
		<?php echo $this->Bootstrap->btnLink( 'Adicionar', array('action'=>'add'), 'success'); ?>
		</div>
</div>
