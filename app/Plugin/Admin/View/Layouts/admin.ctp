<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo $this->fetch('title_for_layout');?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<?php echo $this->Html->script('Bootstrap.jquery-2.1.0.min.js'); ?>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo $this->Html->script('Bootstrap./bootstrap/js/bootstrap.min'); ?>
    <!-- DateRangerPicker -->
    <?php echo $this->Html->script('Bootstrap./js/moment.min'); ?>
    <?php echo $this->Html->script('Bootstrap./js/moment.pt-br'); ?>
    <?php echo $this->Html->script('Bootstrap./js/daterangepicker'); ?>
    <!-- Bootstrap -->
	<?php echo $this->Html->css('Bootstrap./bootstrap/css/bootstrap.min'); ?>
	<?php echo $this->Html->css('Bootstrap./css/daterangepicker-bs3'); ?>
	<?php echo $this->fetch('script'); ?>
    <?php echo $this->fetch('css'); ?>
	<style>
		body {
			margin-top: 60px;
			margin-bottom: 20px;
		}
		
		.affix {
			width: 67px;
			top: 60px;
		}
	</style>
	<?php echo $this->Html->script('authbootstrap'); ?>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<?php echo $this->Element('Admin.navbar-top-admin', array('usuario',$usuario)); ?>
    <div class="container">
    	<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
	</div>
	<?php echo $this->element('sql_dump'); ?>
  </body>
</html>
