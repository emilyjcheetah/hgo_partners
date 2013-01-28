<?php

class SetlangController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        
    }

    public function indexAction()
    {
        // action body
        $this->_helper->layout->disableLayout();
        $pp=$this->_getParam('lang');
        Zend_Session::start();
        $userDetails = new Zend_Session_Namespace('userDetails');
        if($pp!="")
        {
        	$userDetails->lang = $pp;
        }
        else{
        	$userDetails->lang = '3';
        }
        
        echo "this is new page==$pp";
        
    }


}

