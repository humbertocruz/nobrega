<div style="width: 600px; margin: 10px auto; text-align: justify;">
<strong>GUIMARAES & NOBREGA ADVOCACIA</strong>
<br>
<br>
    <h2><center>
CONTRATO DE PRESTAÇÃO DE<br> 
SERVIÇOS DE ASSESSORIA JURÍDICA
</center></h2>
<br>
</center>
<br>
<br>
<strong>CONTRATANTE:</strong> <?php echo $this->fetch('outorgante_nome'); ?>, <?php echo $this->fetch('outorgante_nacionalidade'); ?>, <?php echo $this->fetch('outorgante_estadocivil'); ?>,
<?php echo $this->fetch('outorgante_profissao'); ?> portador da Carteira de
Identidade de n° <?php echo $this->fetch('outorgante_docnumero'); ?> <?php echo $this->fetch('outorgante_docorgao'); ?> , inscrito no CPF sob o n° <?php echo $this->fetch('outorgante_cpfcnpj'); ?>,
residente na <?php echo $this->fetch('outorgante_endereco'); ?>, <?php echo $this->fetch('outorgante_cidade'); ?>,
<?php echo $this->fetch('outorgante_uf'); ?> , Telefone: <?php echo $this->fetch('outorgante_telefone'); ?>
<?php if( array_search('representante_nome', $this->blocks())) { ?>
, neste ato
representado por {{documento.representante.nomecompleto|upper}},
{{documento.representante.nacionalidade}}, {{documento.representante.estadocivil}}, {{documento.representante.profissao}}, portador(a) da
Carteira de Identidade de nº {{documento.representante.docnumero}} {{documento.representante.docorgao}}, inscrito no CPF: sob o nº {{documento.representante.cpf}},
residente(s) à {{documento.representante.endereco}} {{documento.representante.bairro}}, domiciliado(a) em {{documento.representente.cidade}}-{{documento.representante.uf.sigla}}.
<?php } else { ?>
.
<?php } ?>
<br>
<br>
<strong>CONTRATADOS:</strong> JULIANA INACIO DE MAGALHAES GUIMARAES, brasileira, casada, advogada, inscrita na OAB/DF sob o n° 28.934 e
ÍTALO ANTUNES DA NOBREGA, brasileiro, advogado, solteiro, inscrito na OAB/DF sob o n° 24.925, ambos corn escritorio no CLSW 301, Bloco B, Ed.
Avenida Shopping Sala 57, Subsolo, Sudoeste, CEP: 70,670-100, Fone/Fax: (61) 3342-3342, Brasilia-DF;
<br>
<br>
<strong>OBJETO:</strong> O "Contratado" prestara ao "Contratante" todos os serviços de assessoria juridica e nos demais atos que se fizer
necessário a sua intervenção, referente a Ação exibitoria e ação revisional contra a BV financeira. . Sendo quo as custas judiciais (processuais)
e demais que se fizer necessárias serão pagas pelo CONTRATANTE; e ficando o CONTRATANTE na obrigação de quando solicitado por parte do CONTRATADO
em fornecer as informações e os documentos que se fizerem necessários a instrução da ação, devendo manter seus telefones e enderecos sempre atualizados;
<br>
<br>
<strong>PRAZO:</strong> O presente contrato vigorará até que seja julgada em Última instância a agao que foi promovida, assim sendo, até final
decisão judicial;
<br>
<br>
<strong>VALOR:</strong> Em retribuicao aos servicos de assessoria juridica que estão e será prestada no curso da referida acao, a CONTRATANTE pagará ao
CONTRATADO os honorarios previamente acordados e fixados em o valor de R$ <?php echo number_format($this->fetch('documento_valor'), 2, ',', '.' ); ?> (<?php echo $this->Caritas->extenso($this->fetch('documento_valor')); ?> reais)
<?php if( intval( $this->fetch('documento_parcelas')) > 1 ) { ?>,a ser pago da seguinte forma: 
Entrada de R$ <?php echo number_format( $this->fetch('documento_parcelas_valor'), 2, ',','.'); ?> reais e mais <?php echo intval(( $this->fetch('documento_parcelas') ) - 1); ?> prestaç<?php echo ($this->fetch('documento_parcelas') > 2 )?('ões'):('ão');?> do
mesmo valor f<?php } else { ?>. F<?php } ?>icando estabelecido que se houverem honorarios de sucumbencia, estes serao do CONTRATADO;
b) Se houver algum proveito em dinheiro, como devolução do VRG, indenizações e outros casos semelhantes, mais 30% do valor auferido. Não havendo
proveito, não haverá este ônus.
<br>
<br>
<strong>MULTA</strong>: No caso de atraso no pagamento dos honorarios estipulados, sera devido o acrescimo de multa na razao de 2%. Em caso de
desistencia por motivos pessoais ou alheios a vontade do Advogado, o CONTRATANTE ficara obrigado(a) ao pagamento de multa no montante de
R$ <?php echo number_format($this->fetch('documento_valor'), 2, ',', '.' ); ?> (<?php echo $this->Caritas->extenso($this->fetch('documento_valor')); ?> reais), por cada processo.
<br>
<br>
Caso, o CONTRATANTE, venha no decorrer do processo formalizar acordo judicial ou extrajudicial, em valor inferior ao estipulado no pedido, bem
como determinando que cada parte arcará com o ônus de sucumbência de seu advogado,  fica arbitrado, a título de gratificação, o valor de UM SALÁRIO
MÍNIMO, se outro maior não tiver sido arbitrado pelo juízo da causa, nos termos do artigo 26 do Código de Processo Civil, independente do pagamento dos
honorários advocatícios estipulados no presente contrato.
<br>
<br>
<strong>RESCISÃO DO CONTRATO</strong>: No caso de atraso no parcelamento via boleto bancário, por duas parcelas consecutivas, haverá a rescisão automática do contrato
com o vencimento antecipado das parcelas vincendas, sendo autorizado, desde já, a execução do presente contrato com a autorização expressa para penhora
da conta corrente, conta poupança ou proventos de qualquer natureza, independente de citação prévia,  com a consequente renuncia dos poderes outorgados.
<br>
<br>
<strong>ACORDO</strong>: Havendo composigao no processo, o CONTRATANTE obrigatoriamente devera guitar todas as parcelas vencidas e vincendas deste contrato, bem como o
CONTRATADO tera direto ao pagamento de 20% sobre o valor do acordo, imediatamente retirados no ato do pagamento.
<br>
<br>
<strong>EXECUÇÃO</strong>: O presente contrato é titulo executivo extrajudicial, nos termos do artigo 585, inciso II, do Codigo de Processo Civil, inclusive sendo
assinado por duas testemunhas.
Ficará, ainda, o CONTRATANTE, enquanto perdurar a prestação dos serviços contratados a atualizar seus endereços, bem como os telefones de contatos,
pois que o CONTRATADO não se responsabilizará, caso não consiga entrar em contrato, TORNADO VÁLIDAS TODAS AS NOTIFICAÇÕES ENCAMINHADAS AOS ENDEREÇOS
FORNECIDOS PELOS CONTRATANTES, ficando desde já autorizado pelo CONTRATANTE, o envio de todo o tipo de correspondências, e-mails, SMS, intimações,
telefonemas e etc.
<br>
<br>
<strong>FORO</strong>: Fica eleito o foro de Brasilia-DF, para dirimir as questões emergentes do presente contrato;
<br>
<br>
<strong>AJUSTE</strong>: E por estarem assim justos e contratados, assinam o presente instrumento de Contrato em 2 (duas) vias de igual tear e forma, para urn só efeito legal, na presença das duas testemunhas que também o subscrevem.
<br>
<br>
Brasilia-DF, <?php echo $this->fetch('documento_data'); ?>
<br>
<br>
<br>
----––––––––––––––––––––––––––––––––––––––<br>
<strong><?php echo $this->fetch('outorgante_nome_razaosocial'); ?><br>
CONTRATANTE</strong>
<br>
<br>
<br>
––––––––––––––––––––––––––––––––––––––––––<br>
<strong>GUIMARÃES E NÓBREGA ADVOCACIA<br>
CONTRATADOS</strong>
<br>
<br>
<strong>Testemunhas:</strong>
<br>
<br>
–––––––––––––––––––––––––––––––
<br>
<br>
–––––––––––––––––––––––––––––––
<br>
<br>
<br>
CLSW 301, BLOCO "B", SALA 55/57, Sudoeste, Brasilia - DF, CEP: 70,670-100.
Fone/Fax: (61) 3344-6439; 3342-3342.
E-mail: guimaraesenobregaadv@gmail.com
