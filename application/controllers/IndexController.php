<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }
	
    
    public function indexAction()
    {
        
        $pp=$this->_getParam('langid');
        Zend_Session::start();
        $userDetails = new Zend_Session_Namespace('userDetails');
        if($pp!="")
        {
            $userDetails->lang = $pp;
        }
        else{
        $userDetails->lang = '3';
        }
        
        
        // action bodyow
		$test="hello how are you";
		$this->view->test;
		
		
		$dict = new Application_Model_DbTable_Dictionary();
		//$val = $dict->getDictionary('Registered User List', 3);
		
		$this->view->dictionary = $dict;
    }

    public function aboutAction()
    {
    
    
    }
}


