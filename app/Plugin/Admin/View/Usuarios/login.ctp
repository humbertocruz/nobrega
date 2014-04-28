<div class="row">
	<div class="col-md-3">&nbsp;</div>
	<div class="col-md-6">
		
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Autenticação</h3>
			</div>
			<div class="panel-body">
			<div style="background-color: #333; border-radius: 4px;"><?php echo $this->Html->image('gen.png',array('class'=>'center-block')); ?></div>
			<hr>
			<?php
				echo $this->Bootstrap->create('Usuario');
				echo $this->Bootstrap->input('login',array('label'=>'Usuário','required'=>'required'));
				echo $this->Bootstrap->input('senha',array('label'=>'Senha','type'=>'password','value'=>'','required'=>'required'));
				echo $this->Bootstrap->btnLink('Fazer Login', array(), array( 'style'=>'primary', 'block'=>'btn-block','submit'=>true) );
				echo $this->Bootstrap->end();
			?>
			</div>
			<div class="panel-footer clearfix">
				<a href="#" class="pull-right">Esqueceu sua senha?</a>
			</div>
		</div>
		
	</div>
	<div class="col-md-3">&nbsp;</div>
</div>
