<?php

class Application_Model_Cliente
{

    protected $_id;
    protected $_nome;
    protected $_email;
    protected $_telefone;
    protected $_cpf;

    public function __construct($id=null, $nome=null, $email=null, $telefone=null, $cpf=null){
        $this->_id = $id;
        $this->_nome = $nome;
        $this->_email = $email;
        $this->_telefone = $telefone;
        $this->_cpf = $cpf;
    }

    public function getId(){
        return $this->_id;
    }

    public function getNome(){
        return $this->_nome;
    }

    public function getEmail(){
        return $this->_email;
    }

    public function getTelefone(){
        return $this->_telefone;
    }

    public function getCpf(){
        return $this->_cpf;
    }


    public function save($data, $id=null){

        if(is_null($id)){

        }
        else{
            $csv = new Application_Model_CSVCliente();            
            $csv->editData(new Application_Model_Cliente($id, $data['nome'], $data['email'], $data['telefone'], $data['cpf'] ), $id);
            return true;
        }

    }

    public static function findById($id){
        $cliente = new Application_Model_CSVCliente();
        return $cliente->getDataById($id);
    }

    public static function findArrayById($id){
        $array = array();
        $csv = new Application_Model_CSVCliente();
        
        $c = $csv->getDataById($id);
        if(empty($c))
            return null;

        $array['nome'] = $c->getNome();
        $array['email'] = $c->getEmail();
        $array['telefone'] = $c->getTelefone();
        $array['cpf'] = $c->getCpf();

        return $array;
    }

    public static function fetchAll(){
        $cliente = new Application_Model_CSVCliente();
        return $cliente->getData();

    }

}

