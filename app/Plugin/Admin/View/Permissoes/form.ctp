<?php $this->extend('Bootstrap./Common/form'); ?>

<?php $this->assign('pageHeader', 'Permissões'); ?>


<?php $this->start('form-create');?>
	<?php echo $this->Bootstrap->create('Permissao'); ?>
<?php $this->end(); ?>
<?php $this->start('actions');?>
	<?php echo $this->Bootstrap->actions(null, $formActions); ?>
<?php $this->end(); ?>

<?php $this->start('form-body');
	echo $this->Form->input('plugin',array('label'=>'Plugin'));
	echo $this->Form->input('controller',array('label'=>'Controller'));
	echo $this->Form->input('action',array('label'=>'Action'));
	echo '<div class="row">';
		echo '<div class="col-md-6">';
	
			echo '<div class="panel panel-success">';
				echo '<div class="panel-heading"><h3 class="panel-title">Grupos Selecionados</h3></div>';
				echo '<div class="panel-body">';
					echo '<ul>';
					foreach($this->data['Grupo'] as $Grupo) { 
						echo '<li>'.$Grupo.'</li>';
					}
					echo '</ul>';
				echo '</div>';
			echo '</div>';
		
		echo '</div>';
		echo '<div class="col-md-6">';
			
			echo '<div class="panel panel-warning">';
				echo '<div class="panel-heading"><h3 class="panel-title">Grupos Existentes</h3></div>';
				echo '<div class="panel-body">';
					echo '<ul>';
					foreach($Grupos as $Grupo) { 
						echo '<li>'.$Grupo.'</li>';
					}
					echo '</ul>';
				echo '</div>';
			echo '</div>';
	
		echo '</div>';
	echo '</div>';
$this->end(); ?>
