<?php

App::uses('Controller', 'Controller');

class PortalAppController extends AppController {
	
	public function beforeFilter() {

		// Carregar Layout bootstrap
		$this->layout = 'Portal.portal';

		// Gera lista de Menus
		$menus = $this->MenuPortal->generate();
		$this->set('menus', $menus);
		
		// Enviar dados do usuario para a view
		$this->set('usuario', $this->Auth->user());
		
		// Botoes padroes para listagem de dados
		// É possível sobre-escrever os botôes padrão criando outra variavel "listButtons" no controller ou na view
		$this->set('indexButtons', array(
			array(
				'text' => false,
				'title' => 'Editar',
				'action' => 'edit',
				'icon' => 'pencil'
			),
			array(
				'text' => false,
				'title' => 'Excluir',
				'action' => 'del',
				'icon' => 'remove',
				'method' => 'post',
				'style' => 'danger',
				'message' => 'Tem Certeza?'
			)
		));
		
		// Ações padroes para listagem de dados
		// É possível sobre-escrever as açõs padrão criando outra variavel "actionButtons" no controller ou na view
		$this->set('indexActions', array(
			array(
				'style' => 'success',
				'text' => 'Adicionar',
				'title' => 'Adicionar',
				'action' => 'add',
				'icon' => 'plus'
			)
		));
		// Ações padroes para o formulario de dados
		$this->set('formActions', array(
			array(
				'style' => 'success',
				'text' => 'Gravar',
				'title' => 'Gravar',
				'icon' => 'floppy-disk',
				'submit' => true
			),
			array(
				'style' => 'default',
				'text' => 'Cancelar',
				'title' => 'Cancelar',
				'action' => 'index',
				'icon' => 'remove'
			)
		));
	}
}
