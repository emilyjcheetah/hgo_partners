<?php

class UserAreaController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->_helper->layout->setLayout('userarea');
    }

    public function indexAction()
    {
        // action body
        $userDetails = new Zend_Session_Namespace('userDetails');
        
                if($userDetails->UserId=="")
        {
        	$this->_helper->redirector('index','Userlogin');
        }
        
        $rid=$userDetails->rid;
        $pr = new Application_Model_DbTable_Projects();
        $prdetails=$pr->UserProjectsList ($rid);
         
         $this->view->prdetails = $prdetails;
        $this->view->firstname=$userDetails->fname;
        $this->view->lastname=$userDetails->LastName;
	$this->view->registrationid=$userDetails->rid;
    }

public function projectdetailAction()
    {
        
        
        $pid=$this->_getParam('projectid');
         
        $pr = new Application_Model_DbTable_Projects();
        $plist=$pr->getProjects($pid);
        
        
        $this->view->schoolprojects=$plist;
        
         
        $prinvest = new Application_Model_DbTable_Projectinvestment();
        
        $aa = $prinvest->totalinvestment($pid);
        $ss = $prinvest->investorsummary();
        
         
        $this->view->totalinvestment= $aa['total'];
    }

}

