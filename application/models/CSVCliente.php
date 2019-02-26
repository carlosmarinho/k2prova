<?php

class Application_Model_CSVCliente
{
    protected $_data = array();

    public function __construct(){

        $mySession = new Zend_Session_Namespace('mySession');

        if(isset($mySession->clientes)){
            $this->_data = $mySession->clientes;
        }
        else{
            $file = new SplFileObject(APPLICATION_PATH . "/data/base.csv");
            $file->setFlags(SplFileObject::READ_CSV);
            $it = new LimitIterator($file, 1);
            foreach ($it as $row) {
                list($id, $nome, $email, $telefone, $cpf) = $row;
    
                
                $cliente = new Application_Model_Cliente($id, $nome, $email, $telefone, $cpf); 
                $this->_data[$id] = $cliente;
            }

            $mySession->clientes = $this->_data;
        }

    }

    public function getData(){
        return $this->_data;
    }

    public function getDataById($id){
        return $this->_data[$id];
    }

    public function createCliente($data){
        $mySession = new Zend_Session_Namespace('mySession');

        $id = sizeof($this->_data)+1;

        if(array_key_exists($id, $this->_data))
            $id++;

        $cliente = new Application_Model_Cliente( $id , $data['nome'], 
            $data['email'], 
            $data['telefone'], 
            $data['cpf'] 
        );

        $this->_data[$id] = $cliente; 

        $this->updateCsv();
        $mySession->clientes = $this->_data;
    }

    

    public function editCliente($cliente, $id){
        $mySession = new Zend_Session_Namespace('mySession');
        $this->_data[$id] = $cliente;
        $this->updateCsv();
        $mySession->clientes = $this->_data;
    }

    public function deleteCliente($id){
        $mySession = new Zend_Session_Namespace('mySession');
        unset($this->_data[$id]);
        $this->updateCsv();
        $mySession->clientes = $this->_data;
    }

    public function updateCsv(){
        $file = new SplFileObject(APPLICATION_PATH . "/data/base.csv", 'w');
        $str_header = "id,nome,email,telefone,cpf\r\n";
        $file->fwrite($str_header);
        foreach($this->_data as $cliente){
            $str_csv = $cliente->getId() . "," . $cliente->getNome() . "," . $cliente->getEmail() . "," .
            $cliente->getTelefone() . "," . $cliente->getCpf() . "\r\n";
            //Poderia usar o fputcsv porém só iria funcionar com a versão do php > 5.4.0
            $file->fwrite($str_csv);
        }

    }

}