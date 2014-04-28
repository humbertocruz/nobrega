<?php

Router::connect('/login', array('plugin'=>'Admin','controller' => 'Usuarios', 'action' => 'login'));
Router::connect('/logout', array('plugin'=>'Admin','controller' => 'Usuarios', 'action' => 'logout'));