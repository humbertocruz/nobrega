<?php
App::uses('AppModel', 'Model');
class Link extends AdminAppModel {

	public $useDbConfig = 'Admin';

	public $displayField = 'texto';

    public $belongsTo = array(
        'Menu' => array(
            'className' => 'Admin.Menu'
        ),
        'Permissao' => array(
            'className' => 'Admin.Permissao'
        )
    );
}
