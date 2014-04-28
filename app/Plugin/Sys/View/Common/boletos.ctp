<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $this->fetch('title');?></h3>
	</div>
	<table class="table">
		<?php echo $this->fetch('table-tr'); ?>
		
		<?php echo $this->fetch('table-body'); ?>
	</table>
	<div class="panel-footer">
		<?php echo $this->Bootstrap->paginator(); ?>
	</div>
</div>