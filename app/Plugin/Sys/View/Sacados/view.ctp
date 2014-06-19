<?php echo $this->Bootstrap->pageHeader('Sacados'); ?>

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h2 class="panel-title">Histórico Administrativo</h2>
			</div>
			<table class="table">
				<tr>
					<th class="col-md-2">Data</th>
					<th>Arquivo</th>
					<th>Descrição</th>
				</tr>
				<?php foreach($Sacado['HistoricosAdm'] as $HistoricoAdm) { ?>
				<tr>
					<td><?php echo $HistoricoAdm['data']; ?></td>
					<td><?php echo (!empty($HistoricoAdm['Arquivo']))?('<a href="'.$HistoricoAdm['Arquivo'][0]['arquivo'].'">Download</a>'):('Nenhum');?></td>
					<td><?php echo $HistoricoAdm['descricao']; ?></td>
				</tr>
				<?php } ?>
			</table>
			<div class="panel-footer">
				<form class="form" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label class="sr-only" for="HistoricosAdmDescricao">Descrição</label>
						<textarea rows="5" class="form-control" placeholder="Descrição" name="data[HistoricosAdm][descricao]" id="HistoricosAdmDescricao"></textarea>
					</div>
					<div class="form-group">
						<label class="sr-only" for="HistoricosAdmDescricao">Arquivo</label>
						<input type="file" class="form-control" placeholder="Arquivo" name="data[Arquivo][arquivo]" id="ArquivoArquivo"></textarea>
					</div>
					<input class="btn btn-primary" type="submit" value="Gravar Histórico">
				</form>
			</div>
		</div>
		<div class="panel panel-info">
			<div class="panel-heading">
				<h2 class="panel-title">Histórico Processual</h2>
			</div>
			<table class="table">
				<tr>
					<th class="col-md-2">Data</th>
					<th>Arquivo</th>
					<th>Descrição</th>
				</tr>
				<?php foreach($Sacado['HistoricosPro'] as $HistoricoPro) { ?>
				<tr>
					<td><?php echo $HistoricoPro['data']; ?></td>
					<td><?php echo (!empty($HistoricoPro['Arquivo']))?('<a href="'.$HistoricoPro['Arquivo'][0]['arquivo'].'">Download</a>'):('Nenhum');?></td>
					<td><?php echo $HistoricoPro['descricao']; ?></td>
				</tr>
				<?php } ?>
			</table>
			<div class="panel-footer">
				<form class="form" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label class="sr-only" for="HistoricosProDescricao">Descrição</label>
						<textarea rows="5" class="form-control" placeholder="Descrição" name="data[HistoricosPro][descricao]" id="HistoricosAdmDescricao"></textarea>
					</div>
					<div class="form-group">
						<label class="sr-only" for="HistoricosAdmDescricao">Arquivo</label>
						<input type="file" class="form-control" placeholder="Arquivo" name="data[Arquivo][arquivo]" id="ArquivoArquivo"></textarea>
					</div>
					<input class="btn btn-primary" type="submit" value="Gravar Histórico">
				</form>
			</div>
		</div>
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h2 class="panel-title">Boletos Antigos</h2>
			</div>
			<table class="table">
				<tr>
					<th class="col-md-2">&nbsp;</th>
					<th>Data</th>
					<th>Situação</th>
					<th>Valor</th>
				</tr>
				<?php foreach($Sacado['BoletosAntigo'] as $BoletoAntigo) { ?>
				<tr>
					<td>
					<?php if ($BoletoAntigo['situacao_id'] == '1') { ?>
					<?php echo $this->Bootstrap->btnLink('Editar',array('controller'=>'Sacados','action'=>'editar_boleto', $BoletoAntigo['id']));?>
					<?php echo $this->Bootstrap->btnLink('Baixar',array('controller'=>'Sacados','action'=>'baixar_boleto', $BoletoAntigo['id']));?>
					<?php } ?>
					</td>
					<td><?php echo $BoletoAntigo['data_vencimento']; ?></td>
					<td><?php echo $BoletoAntigo['SituacoesBoleto']['descricao']; ?></td>
					<td class="text-right"><?php echo number_format( $BoletoAntigo['valor'], 2, ',', '.'); ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h2 class="panel-title">Boletos Novos</h2>
			</div>
			<table class="table">
				<tr>
					<th class="col-md-3">&nbsp;</th>
					<th>Data</th>
					<th>Situação</th>
					<th>Valor</th>
				</tr>
				<?php foreach($Sacado['BoletosNovo'] as $BoletoNovo) { ?>
				<tr>
					<td>
					<?php if ($BoletoNovo['situacao_id'] == '1') { ?>
					<?php echo $this->Bootstrap->btnLink('Editar',array('controller'=>'Sacados','action'=>'editar_boleton', $BoletoNovo['id'], $BoletoNovo['sacado_id']), array('style'=>'primary'));?>
					<a target="_blank" class="btn btn-warning" href="/boletophp/boleto_itau.php?boleto=<?php echo $BoletoNovo['id'];?>">Imprimir</a>
					<?php } ?>
					</td>
					<td><?php echo  $BoletoNovo['data_vencimento']; ?></td>
					<td><?php echo $BoletoNovo['SituacoesBoleto']['descricao']; ?></td>
					<td class="text-right"><?php echo number_format( $BoletoNovo['valor'], 2, ',', '.'); ?></td>
				</tr>
				<?php } ?>
			</table>
			<div class="panel-footer">
				<?php echo $this->Bootstrap->btnLink('Novo',array('controller'=>'Sacados','action'=>'novo_boleton',$Sacado['Sacado']['id']),array('style'=>'primary'));?>
			</div>
		</div>
	</div>
</div>

