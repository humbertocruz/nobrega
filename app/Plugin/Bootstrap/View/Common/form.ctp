<?php $panelStyle = ($this->fetch('panelStyle'))?($this->fetch('panelStyle')):('default'); ?>
<?php echo $this->fetch('form-create'); ?>
<div class="row">
	<div class="col-md-4"><h3><?php echo $this->fetch('pageHeader'); ?></32></div>
	<div class="col-md-8 clearfix">
		<div class="pull-right">
			<?php echo $this->fetch('actions');?>
		</div>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-<?php echo $panelStyle;?>">
			<div class="panel-heading"><h3 class="panel-title"><?php echo $this->fetch('pageHeader');?></h3></div>
			<div class="panel-body">
                <?php echo $this->fetch('form-body'); ?>
			</div>
		</div>
	</div>
</div>
<?php echo $this->Bootstrap->end(); ?>

