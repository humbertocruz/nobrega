<?php
	$supMenu = array();
	// Encontra o Menu Superior
	foreach ($menus as $menu) {
		if ($menu['Menu']['title'] == 'Menu Fenapaes') $supMenu = $menu;
	}
?>
<script type="text/javascript">$(document).ready(function(){
	// Adiciona a class "active" ao menu atual
	$('ul.dropdown-menu li.active').each(function(){
		$(this).parents('.dropdown').addClass('active');
	})
});
</script>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Alterar navigação</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse">
		<ul class="nav navbar-nav navbar-left">
			<?php if (!empty($menus)) { ?>
			<?php foreach ($supMenu['Links'] as $link) { ?>
			<?php if (isset($link['Link']['children'])) { ?>
			<?php if ($link['Link']['class'] == 'pull-right') { ?>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<?php } ?>
			?>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $link['Link']['text'];?> <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<?php foreach ($link['children'] as $sublink) {
						//$plugin = ($sublink['plugin'])?(''):('');
						$active = ($sublink['Link']['controller'] == $this->params['controller'] AND $sublink['Link']['action'] == $this->params['action'])?('class="active"'):('');
					?>
					<li <?php echo $active; ?>>
					<span class="<?php echo $sublink['Link']['icon'];?>"></span>
					<?php echo $this->Html->link($sublink['Link']['text'], array('plugin'=>$sublink['Link']['plugin'],'controller'=>$sublink['Link']['controller'],'action'=>$sublink['Link']['action'])); ?>
					</li>
					<?php } ?>
				</ul>
			</li>
			<?php } else { ?>
			<li>
				
				<a href="/<?php echo $link['Link']['plugin'].'/'.$link['Link']['controller'].'/'.$link['Link']['action'];?>">
					<span class="<?php echo $link['Link']['icon'];?>"></span>
					<?php echo $link['Link']['text'];?>
				</a>
			</li>
			<?php } ?>
			<?php } ?>
			<?php } ?>
		</ul>
	</div>
	</div>
</nav>
<?php //} ?>