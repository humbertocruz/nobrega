<?php
App::uses('Component', 'Controller');
class MenusComponent extends Component {
	var $uses = array('Admin.Link');
    public function generate($Menu) {
    	$Menu->Link->Behaviors->attach('Containable');
		$Menu->Link->contain(
			'Menu',
			'Permissao'
		);
    	$Menus = $Menu->Link->find('threaded');
        return $Menus;
    }
}