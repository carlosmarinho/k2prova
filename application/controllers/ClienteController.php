<?php

class ClienteController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $file = new SplFileObject(APPLICATION_PATH . "/data/base.csv");
        $file->setFlags(SplFileObject::READ_CSV);
        foreach ($file as $row) {
            list($animal, $class, $legs) = $row;
            printf("A %s is a %s with %d legs\n", $animal, $class, $legs);
        }
        // action body
    }


}

