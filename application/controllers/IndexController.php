<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */

        $mySession = new Zend_Session_Namespace('mySession');
        if($mySession->readOnly){
            unset($mySession->readOnly);
            unset($mySession->clientes);
        }

        Application_Model_Cliente::fetchAll();
    }

    public function indexAction()
    {
        // action body
    }


}

