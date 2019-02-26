<?php

class Application_Model_Cliente
{

    protected $_id;
    protected $_nome;
    protected $_email;
    protected $_telefone;
    protected $_cpf;


    public function __construct($id, $nome, $email, $telefone, $cpf){

    }


    public function save($model){

    }

    public function find($id, $model){

    }

    public function fetchAll(){
        $cliente = new Application_Model_CSVCliente();
        $data = $cliente->getData();

        print_r($data);
    }

}

