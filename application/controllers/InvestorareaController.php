<?php

class InvestorAreaController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->_helper->layout->setLayout('investorarea');
    }

    public function indexAction()
    {
        // action body
        $userDetails = new Zend_Session_Namespace('investorDetails');
       // print_r($userDetails);
        if($userDetails->UserId=="")
        {
        	$this->_helper->redirector('index','Investorlogin');
        }
        
        $invid=$userDetails->invid;
        $pr = new Application_Model_DbTable_Projectinvestment();
        $prdetails=$pr->investorprojectsdetail($invid);
       
      //  print_r($prdetails);
        $this->view->prdetails = $prdetails;
        $this->view->firstname=$userDetails->fname;
        $this->view->lastname=$userDetails->LastName;
        
        
    }


}

