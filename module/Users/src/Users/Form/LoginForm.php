<?php

namespace Users\Form;

use Zend\Form\Form;
use Zend\Validator\EmailAddress;

class LoginForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('Login');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype', 'multipart/form-data');

        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type' => 'email',
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Email',
            ),
            'filters' => array(
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'EmailAddress',
                    'options' => array(
                        'messages' => array(
                            EmailAddress::INVALID_FORMAT => 'Email address format is invalid'
                        ),
                    ),
                )
            ),
        ));

        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type' => 'password',
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Password',
            ),
            'filters' => array(
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'Password',
                    'options' => array(
                        'messages' => array()
                    )
                )
            )
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Log In',
            ),
        ));
    }
}