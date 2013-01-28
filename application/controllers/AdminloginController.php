<?php

class AdminLoginController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $form = new Application_Form_Login();
        $form->submit->setLabel('Admin Login');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
        	$formData = $this->getRequest()->getPost();
        	if ($form->isValid($formData)) {
        		$UserId = $form->getValue('UserId');
        		$Password = $form->getValue('Password');
        		$adminreg = new Application_Model_DbTable_AdminAuth();
        		$aa = $adminreg->fetchRow(
        				$adminreg->select()
        				->where('UserId=?', $UserId)
        				->where('Status=?', 'active'));
        		if ($aa->UserId == $UserId and $aa->Password == $Password) {
        			Zend_Session::start();
        			$adminDetails = new Zend_Session_Namespace('adminDetails');
        			$adminDetails->UserId = $UserId;
        			$adminDetails->FirstName = $aa->FirstName;
        			$adminDetails->LastName = $aa->LastName;
        			$adminDetails->aid = $aa->AdminId;
        			$this->_helper->redirector('index', 'Adminarea');
        		} else {
        			echo "Invalid User";
        		}
        		// $this->_helper->redirector('list');
        	} else {
        		$form->populate($formData);
        	}
        } 
    }


}

