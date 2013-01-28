<?php

class ProjectInvestmentController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $form = new Application_Form_Projectinvestment();
        $form->submit->setLabel('Project Investment');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
        	$formData = $this->getRequest()->getPost();
        	if ($form->isValid($formData)) {
        		
        		$feedbackmodel = new Application_Model_DbTable_Projectinvestment();
        		unset($formData['submit']);
        		$feedbackmodel->insert($formData);
        		$this->_helper->redirector('list');
        	} else {
        		$form->populate($formData);
        	}
        }
    }

    public function listAction() {
    	$pinv = new Application_Model_DbTable_Projectinvestment();
    	$this->view->pinvestment = $pinv->fetchAll();
    }
    

}

