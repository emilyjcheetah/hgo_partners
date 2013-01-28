<?php

class AdminAreaController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        
        
    }

    public function indexAction()
    {
        // action body
        
        $userDetails = new Zend_Session_Namespace('adminDetails');
        if($userDetails->UserId=="")
        {
        	$this->_helper->redirector('index','Adminlogin');
        }
        
         echo "userid = ".$userDetails->FirstName;
         
       
       
        $this->view->firstname=$userDetails->FirstName;
        $this->view->lastname=$userDetails->LastName;
        
        
        $scm=new Application_Model_DbTable_Schoolregistration();
        $schoollist = $scm->PendingSchoolList();
        $this->view->pendingschoollist=$schoollist;
        
        $projects = new Application_Model_DbTable_Projects();
       $topproject=$projects->topProjects ();
       $this->view->topprojects=$topproject;
       
       $topclosingprojects=$projects->topClosingProjects ();
       $this->view->topclosingprojects=$topclosingprojects;
       
       $pendingprojects=$projects->pendingProjectsList();
       $this->view->pendingprojects=$pendingprojects;
       
       
        
    }
    
    
    public function genAccesscode()
    {

        
        
    }
    
    public function acceptschoolAction()
    {
        $userDetails = new Zend_Session_Namespace('adminDetails');
        $loginid=$userDetails->UserId;
       $id=$this->_getParam('schoolid');
       if(!isset($id) && null ==$id)
       {
         throw new Exception('Null id is not allowed');  
       }
       $code = new myLibrary();
       $acode= $code->randomPassword(5);
       $adate=date("Y-m-d");
       $scm=new Application_Model_DbTable_Schoolregistration();
       $data= array('AccessCode'=>$acode,'ApprovedBy'=>$loginid,'ApprovedDate'=>$adate,'Status'=>'approved');
       $scm->update($data, 'RegistrationId =' . (int) $id);
       $this->_helper->redirector('index');
    }
    
    public function rejectschoolAction()
    {
        $userDetails = new Zend_Session_Namespace('adminDetails');
    	$loginid=$userDetails->UserId;
    	$id=$this->_getParam('schoolid');
    	if(!isset($id) && null ==$id)
    	{
    		throw new Exception('Null id is not allowed');
    	}
    	
    	$adate=date("Y-m-d");
    	$scm=new Application_Model_DbTable_Schoolregistration();
    	$data= array('Status'=>'rejected');
    	$scm->update($data, 'RegistrationId =' . (int) $id);
    	$this->_helper->redirector('index');
    }

    public function acceptprojectAction()
    {
        $userDetails = new Zend_Session_Namespace('adminDetails');
    	$loginid=$userDetails->UserId;
    	$id=$this->_getParam('projectid');
    	if(!isset($id) && null ==$id)
    	{
    		throw new Exception('Null id is not allowed');
    	}
    	
    	$adate=date("Y-m-d");
    	$scm=new Application_Model_DbTable_Projects();
    	$data= array('Status'=>'open');
    	$scm->update($data, 'ProjectId =' . (int) $id);
    	$this->_helper->redirector('index');
    }
    
    public function rejectprojectAction()
    {
    	$userDetails = new Zend_Session_Namespace('adminDetails');
    	$loginid=$userDetails->UserId;
    	$id=$this->_getParam('projectid');
	$reason=$this->_getParam('reason');

    	if(!isset($id) && null ==$id)
    	{
    		throw new Exception('Null id is not allowed');
    	}
    	 
    	$adate=date("Y-m-d");
    	$scm=new Application_Model_DbTable_Projects();
    	$data= array('Status'=>'rejected','RejectionReason'=>$reason);
    	$scm->update($data, 'ProjectId =' . (int) $id);
    	$this->_helper->redirector('index');
    }

}

