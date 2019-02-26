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
        $request = $this->getRequest();
        $form    = new Application_Form_Cliente();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                print_r($form->getValues());
                $cliente = new Application_Model_Cliente();
                //$cliente->save($cliente);
                //return $this->_helper->redirector('index');
            }
        }

        $this->view->form = $form;
    }

    public function editAction(){
        
        $id = $this->_request->getQuery('id');

        $request = $this->getRequest();
        $form    = new Application_Form_Cliente();
        
        if ($request->isPost()) {

            if ($form->isValid($request->getPost())) {
                $cliente = new Application_Model_Cliente();
                if($cliente->save($form->getValues(), $id))
                    $this->view->mensagem = "Cliente editado com sucesso!";
                //return $this->_helper->redirector('index');
            }
        }

        $ar_cliente = Application_Model_Cliente::findArrayById($id);
        if(! empty($ar_cliente)){
            $form->populate($ar_cliente);
        }

        $this->view->form = $form;

    }

    public function deleteAction(){
        //$cliente = new Application_Model_Cliente();
    }

}

