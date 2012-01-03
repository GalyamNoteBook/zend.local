<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here 123*/
    }

    public function indexAction()
    {
        // action body
    }

    public function signAction()
    {
        $request = $this->getRequest();
        $form    = new Application_Form_Hotel();
 
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $hotel = new Application_Model_Hotel($form->getValues());
                $mapper  = new Application_Model_HotelMapper();
                $mapper->save($hotel);
                return $this->_helper->redirector('index');
            }
        }
 
        $this->view->form = $form;
    }


}



