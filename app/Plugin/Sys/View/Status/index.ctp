<div class="row">

	<div class="col-md-4">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Pagamentos de Ontem ( <?php echo $dt_ontem;?> )</h3>
			</div>
			<?php if (empty($ontem)) { ?>
			<div class="panel-body">
				<h3>Nenhum boleto vencendo deste dia!</h3>
			</div>
			<?php } else { ?>

			<table class="table">
				<tr>
					<th>Sacado</th>
					<th>Valor</th>
				</tr>
				<?php $total = 0; $total_pago = 0; 
				foreach($ontem as $data) { 
				$total+=floatval($data['BoletosNovo']['valor']); 
				$style = ($data['BoletosNovo']['situacao_id']==2)?('text-success'):('text-danger');
				if ($data['BoletosNovo']['situacao_id'] == 4) {
					$total_pago+= floatval($data['BoletosNovo']['valor']);
				}
				?>
				<tr>
					<td><?php echo $this->Html->link( $data['Sacado']['nome_razaosocial'], array('plugin'=>'sys','controller'=>'Sacados','action'=>'view', $data['Sacado']['id']),array('class'=>$style));?></td>
 					<td class="text-right"><?php echo number_format( $data['BoletosNovo']['valor'], 2, ',','.' );?></td>
				</tr>
				<?php } ?>
			</table>
			<div class="panel-footer clearfix">
				<h3 class="">
					Total: R$ <?php echo number_format( $total, 2, ',','.' );?>
				</h3>
				<h5 class="text-success">
					Pago: R$ <?php echo number_format( $total_pago, 2, ',','.' );?>
				</h5>
			</div>
			<?php } ?>
		</div>

	</div>

	<div class="col-md-4">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Pagamentos de Hoje ( <?php echo $dt_hoje;?> )</h3>
			</div>
			<?php if (empty($hoje)) { ?>
			<div class="panel-body">
				<h3>Nenhum boleto vencendo deste dia!</h3>
			</div>
			<?php } else { ?>
			<table class="table">
				<tr>
					<th>Sacado</th>
					<th>Valor</th>
				</tr>
				<?php $total = 0; $total_pago = 0; 
				foreach($hoje as $data) { 
				$total+=floatval($data['BoletosNovo']['valor']);
				$style = ($data['BoletosNovo']['situacao_id']==2)?('text-success'):('text-danger'); 
				if ($data['BoletosNovo']['situacao_id'] == 4) {
					$total_pago+= floatval($data['BoletosNovo']['valor']);
				}
				?>
				<tr>
					<td><?php echo $this->Html->link( $data['Sacado']['nome_razaosocial'], array('plugin'=>'sys','controller'=>'Sacados','action'=>'view', $data['Sacado']['id']),array('class'=>$style));?></td>
 					<td class="text-right"><?php echo number_format( $data['BoletosNovo']['valor'], 2, ',','.' );?></td>
				</tr>
				<?php } ?>
			</table>
			<div class="panel-footer clearfix">
				<h3 class="">
					Total: R$ <?php echo number_format( $total, 2, ',','.' );?>
				</h3>
				<h5 class="text-success">
					Pago: R$ <?php echo number_format( $total_pago, 2, ',','.' );?>
				</h5>
			</div>
			<?php } ?>
		</div>

	</div>

	<div class="col-md-4">

		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Pagamentos para Amanhã ( <?php echo $dt_amanha;?> )</h3>
			</div>
			<?php if (empty($amanha)) { ?>
			<div class="panel-body">
				<h3>Nenhum boleto vencendo deste dia!</h3>
			</div>
			<?php } else { ?>
			<table class="table">
				<tr>
					<th>Sacado</th>
					<th>Valor</th>
				</tr>
				<?php $total = 0; $total_pago = 0; 
				foreach($amanha as $data) { 
				$total+=floatval($data['BoletosNovo']['valor']); 
				$style = ($data['BoletosNovo']['situacao_id']==2)?('text-success'):('text-danger'); 
				if ($data['BoletosNovo']['situacao_id'] == 4) {
					$total_pago+= floatval($data['BoletosNovo']['valor']);
				}
				?>
				<tr>
					<td><?php echo $this->Html->link( $data['Sacado']['nome_razaosocial'], array('plugin'=>'sys','controller'=>'Sacados','action'=>'view', $data['Sacado']['id']), array('class'=>$style));?></td>
 					<td class="text-right"><?php echo number_format( $data['BoletosNovo']['valor'], 2, ',','.' );?></td>
				</tr>
				<?php } ?>
			</table>
			<div class="panel-footer clearfix">
				<h3 class="">
					Total: R$ <?php echo number_format( $total, 2, ',','.' );?>
				</h3>
				<h5 class="text-success">
					Pago: R$ <?php echo number_format( $total_pago, 2, ',','.' );?>
				</h5>
			</div>
			<?php } ?>
		</div>

	</div>
	
	
</div>