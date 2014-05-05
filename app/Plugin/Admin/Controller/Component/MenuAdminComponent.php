<?php
class MenuAdminComponent extends Component {
	
	var $AdminMenu = array(
		array(
			'Link' => array(
				'texto' => 'Usuários',
				'children' => array(
					array(
						'Link' => array(
							'texto' => 'Grupos',
							'plugin' => 'admin',
							'controller' => 'Grupos',
							'action' => 'index',
						)
					),
					array(
						'Link' => array(
							'texto' => 'Usuários',
							'plugin' => 'Admin',
							'controller' => 'Usuarios',
							'action' => 'index',
						)
					)
				)
			)
		),
		array(
			'Link' => array(
				'texto' => 'Menus',
				'children' => array(
					array(
						'Link' => array(
							'texto' => 'Permissões',
							'plugin' => 'Admin',
							'controller' => 'Permissoes',
							'action' => 'index',
						)
					),
					array(
						'Link' => array(
							'texto' => 'Menus',
							'plugin' => 'Admin',
							'controller' => 'Menus',
							'action' => 'index',
						)
					),
					array(
						'Link' => array(
							'texto' => 'Links',
							'plugin' => 'Admin',
							'controller' => 'Links',
							'action' => 'index',
						)
					)
				)
			)
		)
	);
	
    public function generate() {
        return $this->AdminMenu;
    }
}