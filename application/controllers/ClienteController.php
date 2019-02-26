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

        $flashMessenger = $this->_helper->getHelper('FlashMessenger');

        $this->view->flashmsgs = $flashMessenger->getMessages();
    }

    public function viewAction(){
        $cliente = Application_Model_Cliente::findById($this->_request->getQuery('id'));
        $this->view->cliente = $cliente;
    }

    public function newAction(){
        $request = $this->getRequest();
        $form    = new Application_Form_Cliente();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $cliente = new Application_Model_Cliente();
                $flashMessenger = $this->_helper->getHelper('FlashMessenger');
                try{
                    $cliente->save($form->getValues());
                    $flashMessenger->addMessage('Usuário adicionado com sucesso!');
                }
                catch(Exception $e){
                    print_r($e);
                    die();
                    $flashMessenger->addMessage($e->getMessage());
                }
                return $this->_helper->redirector('index');
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
                try{
                    if($cliente->save($form->getValues(), $id))
                        $this->view->mensagem = "Cliente editado com sucesso!";
                }
                catch(Exception $e){
                    $this->view->errorMensagem = $e->getMessage();
                }
            }
        }

        $ar_cliente = Application_Model_Cliente::findArrayById($id);
        if(! empty($ar_cliente)){
            $form->populate($ar_cliente);
        }

        $this->view->form = $form;

    }

    public function deleteAction(){
        $id = $this->_request->getQuery('id');
        $cliente = Application_Model_Cliente::findById($id);
        $this->view->cliente = $cliente;
    }

    public function confirmaDeleteAction(){
        $id = $this->_request->getQuery('id');
        $cliente = Application_Model_Cliente::findById($id);
        Application_Model_Cliente::delete($id);
        $flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $flashMessenger->addMessage('Usuário \'' . $cliente->getNome() . '\' excluido com sucesso!');
        return $this->_helper->redirector('index');
    }

}

