<div class="row">
	<div class="col-md-4"><h3><?php echo ($this->fetch('pageHeader'))?($this->fetch('pageHeader')):('Crie o Block pageHeader'); ?></h3></div>
	<div class="col-md-8 clearfix">
		<div class="pull-right">
			<?php echo ($this->fetch('actions'))?($this->fetch('actions')):('Crie o bloco actions com os botoes');?>
		</div>
	</div>
</div>
<hr>
<?php $panelStyle = ($this->fetch('panelStyle'))?($this->fetch('panelStyle')):('default'); ?>
<div class="row">
	<div class="col-md-12">
		<?php if (count($data) == 0) { ?>
		<div class="alert alert-info">Nenhum registro encontrado!</div>	
		<?php } else { ?>
		<div class="row">
			<div class="col-md-12"><?php echo $this->Bootstrap->paginator(); ?></div>
		</div>
		<div class="panel panel-<?php echo $panelStyle;?>">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo $this->fetch('pageHeader');?></h3>
			</div>
			<table class="table">
				<thead>
				<?php echo $this->fetch('table-tr'); ?>
				</thead>
				<tbody>
				<?php echo $this->fetch('table-body'); ?>
				</tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-md-12"><?php echo $this->Bootstrap->paginator(); ?></div>
		</div>
		<?php } ?>
	</div>
</div>
