<?php $this->extend('Bootstrap./Common/form'); ?>

<?php $this->assign('pageHeader', 'Clientes'); ?>


<?php $this->start('form-create');?>
	<?php echo $this->Bootstrap->create('Cliente'); ?>
<?php $this->end(); ?>
<?php $this->start('actions');?>
	<?php echo $this->Bootstrap->actions(null, $formActions); ?>
<?php $this->end(); ?>

<?php $this->start('form-body');
	echo $this->Form->input('nome',array('label'=>'Nome'));
	echo $this->Form->input('email',array('label'=>'Email'));
	echo $this->Form->input('nacionalidade',array('label'=>'Nacionalidade'));
	echo $this->Form->input('estadocivil_id',array('label'=>'Estado Civil','options'=>$EstadosCivis));
	echo $this->Form->input('profissao',array('label'=>'Profissão'));
	echo $this->Form->input('docnumero',array('label'=>'Número do Documento'));
	echo $this->Form->input('docorgao',array('label'=>'Órgão do Documento'));
	echo $this->Form->input('cpf',array('label'=>'CPF'));
	echo $this->Form->input('endereco',array('label'=>'Endereço'));
	echo $this->Form->input('cidade',array('label'=>'Cidade'));
	echo $this->Form->input('uf_id',array('label'=>'UF','options'=>$UnidadesFederacoes));
	echo $this->Form->input('tipopessoa_id',array('label'=>'Tipo de Pessoa','options'=>$TiposPessoas));
$this->end(); ?>
