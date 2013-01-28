<?php

class UserLogoutController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $userDetails = new Zend_Session_Namespace('userDetails');
        $userDetails->unsetAll();
        $this->_helper->redirector('index','Userlogin');
    }


}

