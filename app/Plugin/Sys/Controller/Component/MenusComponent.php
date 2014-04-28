<?php
App::uses('Component', 'Controller');
class MenusComponent extends Component {
	var $uses = array('Sys.Menu');
    public function generate($Menu) {
    	$Menus = $Menu->Link->find('threaded');
        return $Menus;
    }
}