<?php $this->extend('Bootstrap./Common/form'); ?>

<?php $this->assign('pageHeader', 'Sacados'); ?>


<?php $this->start('form-create');?>
	<?php echo $this->Bootstrap->create('Sacado'); ?>
<?php $this->end(); ?>
<?php $this->start('actions');?>
	<?php echo $this->Bootstrap->actions(null, $formActions); ?>
<?php $this->end(); ?>
<?php $this->start('form-body');
	echo $this->Form->input('nome_razaosocial',array('label'=>'Nome ou Razão Social'));
	echo $this->Form->input('email',array('type'=>'text'));
	echo $this->Form->input('tp_inscricao');
	echo $this->Form->input('cpf_cnpj', array('label'=>'CPF ou CNPJ'));
	echo $this->Form->input('endereco');
	echo $this->Form->input('complemento');
	echo $this->Form->input('bairro');
	echo $this->Form->input('cidade');
	echo $this->Form->input('uf',array('label'=>'UF','options'=>array('DF'=>'DF','PI'=>'PI')));
	echo $this->Form->input('cep',array('label'=>'CEP'));
	echo $this->Form->input('ddd',array('label'=>'DDD'));
	echo $this->Form->input('telefone');
	echo $this->Form->input('ramal');
	echo $this->Form->input('nome_contato',array('label'=>'Nome de Contato'));
	echo $this->Form->input('nacionalidade');
	echo $this->Form->input('estadocivil_id',array('label'=>'Estado Civil','options'=>$estadoscivil));
	echo $this->Form->input('profissao',array('label'=>'Profissão'));
	echo $this->Form->input('docnumero',array('label'=>'Número do Documento'));
	echo $this->Form->input('docorgao',array('label'=>'Órgão do Documento'));
	echo $this->Form->input('tipopessoa_id',array('label'=>'Tipo de Pessoa','options'=>$tipospessoa));
	echo $this->Form->input('modelopessoa_id',array('label'=>'Modelo de Pessoa','options'=>$modelospessoa));

$this->end(); ?>