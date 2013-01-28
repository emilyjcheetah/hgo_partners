<?php

class LogoutController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->_helper->layout->setLayout('schoolarea');
    }

    public function indexAction()
    {
        // action body
        $userDetails = new Zend_Session_Namespace('schoolDetails');
        $userDetails->unsetAll();
        $this->_helper->redirector('index','Login');
    }


}

