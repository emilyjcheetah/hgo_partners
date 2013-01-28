<?php

class ProjectSearchController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $form = new Application_Form_Search();
        $form->submit->setLabel('Project Search');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
        	$formData = $this->getRequest()->getPost();
        	if ($form->isValid($formData)) {
        		$skey = $form->getValue('skey');
        		$sval = $form->getValue('sval');
        		
        		        		$psearch = new Application_Model_DbTable_Projects();
        		if($skey=="SchoolName")
        		{
        		$aa=$psearch->SearchProjects_school ($sval);
        		}
        		else
        		{
        		$aa = $psearch->SearchProjects ($skey,$sval);
        		}

        		
        		$this->_forward('searchresult','Projectsearch','default',array('results'=>$aa));
        		//$this->view->psearch = $aa;
        		// $this->_helper->redirector('list');
        	} else {
        		$form->populate($formData);
        	}
        }
    }
    
    public function searchresultAction()
    {
        $this->view->result = $this->_request->getParam('results');
    }


}

