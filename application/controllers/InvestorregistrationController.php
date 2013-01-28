<?php
class InvestorRegistrationController extends Zend_Controller_Action
{
    public function init ()
    {
        /*
         * Initialize action controller here
         */
        $dict = new Application_Model_DbTable_Dictionary();
        // $val = $dict->getDictionary('Registered User List', 3);
        $this->view->dictionary = $dict;
    }
    public function indexAction ()
    {
        // action body
        $form = new Application_Form_InvestorRegistration();
        $form->submit->setLabel('InvestorRegistration');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $UserId = $form->getValue('UserId');
                $Password = $form->getValue('Password');
                $FirstName = $form->getValue('FirstName');
                $LastName = $form->getValue('LastName');
                $Email = $form->getValue('Email');
                $Country = $form->getValue('Country');
                $State = $form->getValue('State');
                $City = $form->getValue('City');
                $Zipcode = $form->getValue('Zipcode');
                $ImagePath = $form->getValue('ImagePath');
                $Bio = $form->getValue('Bio');
                $Phone = $form->getValue('Phone');
                $Mobile = $form->getValue('Mobile');
                $investorregistrationmodel = new Application_Model_DbTable_Investorregistration();
                $investorregistrationmodel->addInvestorRegistration($UserId, 
                $Password, $FirstName, $LastName, $Email, $Country, $State, 
                $City, $Zipcode, $ImagePath, $Bio, $Phone, $Mobile);
                
                if($form->ImagePath->isUploaded())
                {
                	$values = $form->getValues();
                	$source = $form->ImagePath->getFileName();
                
                	//to re-name the image, all you need to do is save it with a new name, instead of the name they uploaded it with. Normally, I use the primary key of the database row where I'm storing the name of the image. For example, if it's an image of Person 1, I call it 1.jpg. The important thing is that you make sure the image name will be unique in whatever directory you save it to.
                
                	$new_image_name = date('YmdHis')."jpg";
                
                	//save image to database and filesystem here
                	$image_saved = move_uploaded_file($source, PUBLIC_PATH.'/uploadinvestor/'.$new_image_name);
                	if($image_saved)
                	{
                		$this->view->image = '<img src="/images/'.$new_image_name.'" />';
                		$form->reset();//only do this if it saved ok and you want to re-display the fresh empty form
                	}
                }
                
                
                $this->_helper->redirector('list');
            } else {
                $form->populate($formData);
            }
        }
    }
    
    
    
    public function listAction ()
    {
    	$register = new Application_Model_DbTable_Investorregistration();
    	$this->view->investorregistration = $register->fetchAll();
    
    	$dict = new Application_Model_DbTable_Dictionary();
    	//$val = $dict->getDictionary('Registered User List', 3);
    
    	$this->view->dictionary = $dict;
    }
    
    public function deleteAction()
    {
    
    	$id = $this->_getParam('investorid', 0);
    	var_dump("Delete Id = " . $id);
    	$userReg = new Application_Model_DbTable_Investorregistration();
    	$userReg->deleteInvestorRegistration($id);
    	$this->_helper->redirector('list');
    }
    
    public function editAction()
    {
        
        $id = $this->_getParam('investorid', 0);
        $regdata = new Application_Model_DbTable_Investorregistration();
        $fdata = $regdata->getInvestorRegistration($id);
        
       
        $form = new Application_Form_Investorregistration();
        $form->submit->setLabel('Edit Registration');
        $form->populate($fdata);
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
        	$formData = $this->getRequest()->getPost();
        	if ($form->isValid($formData)) {
        		$UserId = $form->getValue('UserId');
        		$Password = $form->getValue('Password');
        		$FirstName = $form->getValue('FirstName');
        		$LastName = $form->getValue('LastName');
        		$Email = $form->getValue('Email');
        		$Country = $form->getValue('Country');
        		$State = $form->getValue('State');
        		$City = $form->getValue('City');
        		$Zipcode = $form->getValue('Zipcode');
        		$ImagePath2 = $form->getValue('ImagePath');
        		$Bio = $form->getValue('Bio');
        		$Phone = $form->getValue('Phone');
        		$Mobile = $form->getValue('Mobile');
        		
        		
        		if($ImagePath2=="")
        		{
        		    
        		    $ImagePath2 = $fdata['ImagePath'];
        		}
        		
        		$investorregistrationmodel = new Application_Model_DbTable_Investorregistration();
        		$investorregistrationmodel->updateInvestorRegistration($id,$UserId,
        				$Password, $FirstName, $LastName, $Email, $Country, $State,
        				$City, $Zipcode, $ImagePath2, $Bio, $Phone, $Mobile);
        
        		if($form->ImagePath->isUploaded())
        		{
        			$values = $form->getValues();
        			$source = $form->ImagePath->getFileName();
        
        			//to re-name the image, all you need to do is save it with a new name, instead of the name they uploaded it with. Normally, I use the primary key of the database row where I'm storing the name of the image. For example, if it's an image of Person 1, I call it 1.jpg. The important thing is that you make sure the image name will be unique in whatever directory you save it to.
        
        			$new_image_name = date('YmdHis')."jpg";
        
        			//save image to database and filesystem here
        			$image_saved = move_uploaded_file($source, PUBLIC_PATH.'/uploadinvestor/'.$new_image_name);
        			if($image_saved)
        			{
        				$this->view->image = '<img src="/images/'.$new_image_name.'" />';
        				$form->reset();//only do this if it saved ok and you want to re-display the fresh empty form
        			}
        		}
        
        
        		$this->_helper->redirector('list');
        	} else {
        		$form->populate($formData);
        	}
        } 
    }
    
}

