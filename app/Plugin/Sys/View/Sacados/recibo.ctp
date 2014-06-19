<div style="width: 600px; margin: 10px auto; text-align: justify;">
<strong>GUIMARAES & NOBREGA ADVOCACIA</strong>
<?php echo $this->fetch('debug'); ?>
<br>
<br>
<?php for($i=1;$i<=2;$i++) { ?>
<div class="panel panel-default">
	<div class="panel-heading clearfix">
		<strong class="pull-right">Recibo R$ <?php echo number_format($this->fetch('documento_valor'), 2, ',', '.' ); ?></strong>
	</div>
	<div class="panel-body">
		Recebi(emos) de a importância supra de "<?php echo number_format($this->fetch('documento_valor'), 2, ',', '.' ); ?> REAIS" referente a:
<br>
<br>
<br>
<br>
<br>
para maior clareza firmo o presente recibo para que produza os seus efeitos, dando plena, rasa e irrvogável quitação, pelo valor recebido. 
<br><br>
<div class="pull-right">Brasilia-DF, <?php echo $this->fetch('documento_data'); ?></div>
	</div>
</div>
<?php } ?>