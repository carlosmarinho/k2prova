<?php

class Application_Form_Cliente extends Zend_Form
{

    public function init()
    {

        // Set the method for the display form to POST
        $this->setMethod('post');

        // Add an nome element
        $this->addElement('text', 'nome', array(
            'label'      => 'Nome:',
            'required'   => true,
            'filters'    => array('StringTrim'),
        ));

        // Add an email element
        $this->addElement('text', 'email', array(
            'label'      => 'Email:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'EmailAddress',
            )
        ));

        // Add an telefone element
        $this->addElement('text', 'telefone', array(
            'label'      => 'Telefone:',
            'required'   => false,
            'filters'    => array('StringTrim'),
        ));

        // Add an cpf element
        $this->addElement('text', 'cpf', array(
            'label'      => 'CPF:',
            'required'   => true,
            'filters'    => array('StringTrim'),
        ));


        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Enviar',
        ));
 

        // And finally add some CSRF protection
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));

    }


}

