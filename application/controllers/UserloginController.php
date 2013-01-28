<?php

class UserLoginController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
       // $this->_helper->layout->setLayout('userarea');
    }

    public function indexAction()
    {
        // action body
        $form = new Application_Form_Login();
        $form->submit->setLabel('Login');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
        	$formData = $this->getRequest()->getPost();
        	if ($form->isValid($formData)) {
        	   
        		$UserId = $form->getValue('UserId');
        		$Password = $form->getValue('Password');
        		$userreg = new Application_Model_DbTable_UserRegistration();
        		$aa = $userreg->fetchRow(
        				$userreg->select()
        				->where('UserId=?', $UserId)
        				->where('Status=?', 'active')
        		);
        		if ($aa->UserId == $UserId and $aa->Password == $Password) {
        			Zend_Session::start();
        			$userDetails = new Zend_Session_Namespace('userDetails');
        			$userDetails->UserId = $UserId;
        			$userDetails->fname = $aa->FirstName;
        			$userDetails->LastName = $aa->LastName;
        			$userDetails->rid = $aa->RegisterID;
				$userDetails->schoolid = $aa->SchoolRegistrationId;
        			$this->_helper->redirector('index', 'Userarea');
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

