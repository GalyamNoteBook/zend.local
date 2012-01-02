<?php

class Application_Form_Hotel extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setMethod('post');
 
        // Add a title element
        $this->addElement('text', 'title', array(
            'label'      => 'Название гостиницы:',
            'required'   => true,
            'filters'    => array('StringTrim'),
        ));              
 
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Сохранить изменения',
        ));
        
    }


}

