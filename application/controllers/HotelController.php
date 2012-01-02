<?php

class HotelController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $hotel = new Application_Model_HotelMapper();        
        $this->view->entries = $hotel->findAll();
    }


}

