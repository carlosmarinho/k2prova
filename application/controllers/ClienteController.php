<?php

class ClienteController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $clientes = Application_Model_Cliente::fetchAll();
        $this->view->clientes = $clientes;
        
        // action body
    }

    public function viewAction(){
        //$cliente = new Application_Model_Cliente();
        $cliente = Application_Model_Cliente::findById($this->_request->getQuery('id'));
        $this->view->cliente = $cliente;
    }

    public function newAction(){
        //$cliente = new Application_Model_Cliente();
    }

    public function editAction(){
        //$cliente = new Application_Model_Cliente();
    }

    public function deleteAction(){
        //$cliente = new Application_Model_Cliente();
    }

}

