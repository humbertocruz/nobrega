<div style="width: 600px; margin: 10px auto; text-align: justify;">
<strong>GUIMARAES & NOBREGA ADVOCACIA</strong>
<br>
<br>
<h2>DECLARAÇÃO DE HIPOSSUFICIÊNCIA ECONÔMICA</h2>
<br>
<br>
<br>
<strong>Declarante:</strong> <?php echo $this->fetch('outorgante_nome'); ?>, <?php echo $this->fetch('outorgante_nacionalidade'); ?>, <?php echo $this->fetch('outorgante_estadocivil'); ?>,
<?php echo $this->fetch('outorgante_profissao'); ?> portador da Carteira de
Identidade de n° <?php echo $this->fetch('outorgante_docnumero'); ?> <?php echo $this->fetch('outorgante_docorgao'); ?> , inscrito no CPF sob o n° <?php echo $this->fetch('outorgante_cpfcnpj'); ?>,
residente na <?php echo $this->fetch('outorgante_endereco'); ?>, <?php echo $this->fetch('outorgante_cidade'); ?>,
<?php echo $this->fetch('outorgante_uf'); ?> , Telefone: <?php echo $this->fetch('outorgante_telefone'); ?>
<?php if( array_search('representante_nome', $this->blocks())) { ?>
, neste ato
representado por <?php echo $this->fetch('representante_nome'); ?>,
<?php echo $this->fetch('representante_nacionalidade'); ?>, <?php echo $this->fetch('representante_estado_civil'); ?>, <?php echo $this->fetch('representante_profissao'); ?>, portador(a) da
Carteira de Identidade de nº <?php echo $this->fetch('representante_docnumero'); ?> <?php echo $this->fetch('representante_docorgao'); ?>, inscrito no CPF: sob o nº <?php echo $this->fetch('representante_cpf'); ?>,
residente(s) à <?php echo $this->fetch('representante_endereco'); ?> <?php echo $this->fetch('representante_bairro'); ?>, domiciliado(a) em <?php echo $this->fetch('representante_cidade'); ?>-<?php echo $this->fetch('representante_uf'); ?>.
<?php } else { ?>
.
<?php } ?>
<br>
<br>
O(a) declarante acima qualificado(a), com o intuito de obter os benefícios gratuidade de justiça, declara sob as penas de lei, que não está em condições de pagar as custas do processo e os honorários de advogado, sem prejuízo próprio ou de sua família, nos termos das leis nº 1.060/50 e nº 7.115/ necessitando, portanto, dos benefícios da gratuidade de justiça. 
<br>
<br>

Brasilia-DF, <?php echo $this->fetch('documento_data'); ?>.<br>
<br>
<br>
<br>
<br>
––––––––––––––––––––––––––––––––––––––––––––––<br>
<?php if( array_search('representante_nome', $this->blocks())) { ?>
<?php echo $this->fetch('representante_nome'); ?>
<?php } else { ?>
<?php echo $this->fetch('outorgante_nome'); ?>
<?php } ?>
<br>

</div>
