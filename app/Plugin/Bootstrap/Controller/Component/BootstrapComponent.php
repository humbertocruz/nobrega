<?php
class BootstrapComponent extends Component {
    
    public $components = array(
        'Session'
    );
    
    public function setFlash($message, $style = 'info') {
        $this->Session->setFlash($message, 'Bootstrap.flash', array('style'=>$style));
    }
    
}