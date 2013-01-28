<?php

class AdminAuthController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form = new Application_Form_Adminauth();
        $form->submit->setLabel('Admin Auth');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
        	$formData = $this->getRequest()->getPost();
        	if ($form->isValid($formData)) {
echo "aaaa";
        		$schoolregDB = new Application_Model_DbTable_Adminauth();
        		 
        		array_pop($formData);
        print_r($formData);

        		$schoolregDB->insert($formData);
$this->_helper->redirector('list');

        	} else {
        		$form->populate($formData);
        	}
        }
        }
    
        public function editAction ()
        {
            
            $id = $this->_getParam('adminid', 0);
            $regdata = new Application_Model_DbTable_AdminAuth();
            $fdata = $regdata->fetchRow($id)->toArray();
            print_r($fdata);
            
            $form = new Application_Form_Adminauth();
            $form->submit->setLabel('Edit');
            $form->populate($fdata);
            
            
            $this->view->form=$form;
            $form->populate($fdata);
            $this->view->form = $form;
            if ($this->getRequest()->isPost()) {
            	$formData = $this->getRequest()->getPost();
            	if ($form->isValid($formData)) {
            	    
            	   
            	   
            		unset($formData['AdminId']);
            		unset($formData['UserId']);
            		unset($formData['submit']);
            		echo"aaa=$id";
            		$schoolregistrationmodel = new Application_Model_DbTable_AdminAuth();
            		$schoolregistrationmodel->update($formData, 'AdminId =' . (int)$id);
            		//$this->_helper->redirector('list');
            	} else {
            		$form->populate($formData);
            	}
            }
        }

}

