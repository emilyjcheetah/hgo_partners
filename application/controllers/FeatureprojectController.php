<?php

class FeatureProjectController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
         $form = new Application_Form_Featureproject();
        $form->submit->setLabel('Feedback');
        $this->view->form = $form;
        
        
         
        if($this->getRequest()->isPost())
        	 
        {
        
        	 
        	$formData = $this->getRequest()->getPost();
        	 
        	if($form->isValid($formData))
        	  
        	{
        	  
        	  
        	  
        		$schoolregDB = new Application_Model_DbTable_FeatureProject();
        
        	  
        		// remove submit button from $formData
        	  
        		// as it is not the part of
        	  
        		// Application_Model_DbTable_Schoolregistration or Schoolregistration Table
        	  
        		array_pop($formData);
        	  
        
        	  
        
        	  
        		////////////////////////// NOTE //////////////////////
        	  
        		//
        	  
        		// See how only after removing the 'submit' item from the
        	  
        		// $formData, I am using the same array for inserting
        	  
        		// I do not need to extract each field one by one
        	  
        		// like $userid = $form->getValue('UserId');
        	  
        		// as I have used the same id for form elements (while
        	  
        		// generating forms) as are the names of column in tables.
        	  
        
        	  
        		$schoolregDB->insert($formData);
        	  
        
        	  
        	}
        	 
        	else
        	  
        	{
        	  
        		$form->populate($formData);
        	  
        	}
        	 
        	 
        	 
        }
    }


}

