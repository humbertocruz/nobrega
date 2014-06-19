<div style="width: 600px; margin: 10px auto; text-align: justify;">
<strong>GUIMARAES & NOBREGA ADVOCACIA</strong>
<br>
<br>
<h2>PROCURAÇÃO</h2>
<br>
<br>
<br>
<strong>CONTRATANTE:</strong> <?php echo $this->fetch('outorgante_nome'); ?>, <?php echo $this->fetch('outorgante_nacionalidade'); ?>, <?php echo $this->fetch('outorgante_estadocivil'); ?>,
<?php echo $this->fetch('outorgante_profissao'); ?> portador da Carteira de
Identidade de n° <?php echo $this->fetch('outorgante_docnumero'); ?> <?php echo $this->fetch('outorgante_docorgao'); ?> , inscrito no CPF sob o n° <?php echo $this->fetch('outorgante_cpfcnpj'); ?>,
residente na <?php echo $this->fetch('outorgante_endereco'); ?>, <?php echo $this->fetch('outorgante_cidade'); ?>,
<?php echo $this->fetch('outorgante_uf'); ?> , Telefone: <?php echo $this->fetch('outorgante_telefone'); ?>
<?php if( array_search('representante_nome', $this->blocks())) { ?>
, neste ato
representado por <?php echo $this->fetch('representante_nome'); ?>,
<?php echo $this->fetch('representante_nacionalidade'); ?>, <?php echo $this->fetch('representante_estado_civil'); ?>, <?php echo $this->fetch('representante_profissao'); ?>, portador(a) da
Carteira de Identidade de nº <?php echo $this->fetch('representante_docnumero'); ?> <?php echo $this->fetch('representante_docorgao'); ?>, inscrito no CPF: sob o nº <?php echo $this->fetch('representante_cpf'); ?>,
residente(s) à <?php echo $this->fetch('representante_endereco'); ?> <?php echo $this->fetch('representante_bairro'); ?>, domiciliado(a) em <?php echo $this->fetch('representante_cidade'); ?>-<?php echo $this->fetch('representante_estado'); ?>.
<?php } else { ?>
.
<?php } ?>
<br>
<br>
<strong>OUTORGADOS:</strong> JULIANA INACIO DE MAGALHÃES GUIMARÃES, brasileira, casada,
inscrita na OAB/DF sob o nº 28.934 e ITALO ANTUNES DA NOBREGA, brasileiro,
solteiro, inscrito na OAB/DF sob o nº 24.925, ambos com escritório no CLSW 301,
BLOCO B, ED. AVENIDA SHOPING SALA 57, SUBSOLO, SUDOESTE, CEP: 70.670-100,
FONE/FAX: (61) 3342-3342, BRASILIA-DF;
<br>
<br>

<strong>PODERES:</strong> Procuração Publica de fls. 11, confere poderes para tal mister, para o
foro em geral, para, perante qualquer Juízo, Instancia ou Tribunal, propor quaisquer
ações, interpor os recursos permitidos em lei; defender nas ações contrarias,
acompanhando-as ate final decisão, impetrar mandado de segurança, e demais
medidas que se fizerem necessárias, inclusive cautelares, à defesa de seus direitos e
interesses e mais os poderes especiais para desistir, discordar, concordar, transigir,
receber, receber alvará de levantamento, dar quitação e os demais atos à defesa de
seus direitos, ratificando os atos já praticados, podendo inclusive substabelecer.
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
