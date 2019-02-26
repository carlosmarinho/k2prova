<?php

class ClienteController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {

        //$cliente = new Application_Model_Cliente();
        Application_Model_Cliente::fetchAll();
        
        // action body
    }


}

