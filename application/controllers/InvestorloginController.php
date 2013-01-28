<?php

class InvestorLoginController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
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
        		$invreg = new Application_Model_DbTable_Investorregistration();
        		$aa = $invreg->fetchRow(
        				$invreg->select()
        				->where('UserId=?', $UserId));
        		//print_r($aa);
echo $aa->InvestorId;
        		if ($aa->UserId == $UserId and $aa->Password == $Password) {
        			Zend_Session::start();
        			$investorDetails = new Zend_Session_Namespace('investorDetails');
        			$investorDetails->UserId = $UserId;
        			$investorDetails->fname = $aa->FirstName;
        			$investorDetails->LastName = $aa->LastName;
        			$investorDetails->invid = $aa->InvestorId;
        			$this->_helper->redirector('index', 'Investorarea');
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

