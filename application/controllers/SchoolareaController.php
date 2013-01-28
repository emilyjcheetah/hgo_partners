<?php

class SchoolAreaController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
       
    }

    public function indexAction()
    {
 $this->_helper->layout->setLayout('schoolarea');
        $userDetails = new Zend_Session_Namespace();
        
        if($userDetails->UserId=="")
        {
            $this->_helper->redirector('index','Login');
        }
       
       
        // action body
       
        $sid=$userDetails->sid;
        $pr = new Application_Model_DbTable_Projects();
        $plist=$pr->fetchAll(array('SchoolRegId',$sid));
        
        $this->view->schoolprojects=$plist;
       $this->view->sfirst=$userDetails->fname;
       $this->view->slast=$userDetails->LastName;
       
       $inv=new Application_Model_DbTable_Projectinvestment();
      $tinv= $inv->schoolinvestorsummary($sid);
      //print_r($tinv);
      $schoolprojects = $inv->schoolprojectsdetail($sid);
     // print_r($schoolprojects);
       
       
      
    }
	
    public function pdetailAction()
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
    public function psummaryAction()
    {
        $pid=$this->_getParam('projectid');
      $prinvest = new Application_Model_DbTable_Projectinvestment();
      $aa = $prinvest->fetchRow(
      		$prinvest->select()
      		->from($this,new Zend_Db_Expr("SUM(InvestmentAmount)"))
      		->where('ProjectId=?', $pid));
      
      print_r($aa);
        
    }

}

