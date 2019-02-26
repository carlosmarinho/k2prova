<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        Application_Model_Cliente::fetchAll();
    }

    public function indexAction()
    {
        // action body
    }


}

