<?php

class Application_Model_CSVCliente
{
    protected $_data = array();

    public function __construct(){
        $file = new SplFileObject(APPLICATION_PATH . "/data/base.csv");
        $file->setFlags(SplFileObject::READ_CSV);
        foreach ($file as $row) {
            $_data[] = $row;
            //printf("A %s is a %s with %d legs\n", $animal, $class, $legs);
        }

        print_r($_data);
    }

    public function getData(){
        return $this->_data;
    }

}

