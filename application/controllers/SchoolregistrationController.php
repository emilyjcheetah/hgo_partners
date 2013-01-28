<?php
class SchoolRegistrationController extends Zend_Controller_Action
{
    public function init ()
    {
        /*
         * Initialize action controller here
         */
    }
    public function indexAction ()
    {
        $form = new Application_Form_Schoolregistration();
        $form->submit->setLabel('SchoolRegistration');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $UserId = $form->getValue('UserId');
                $Password = $form->getValue('Password');
                $ContactFirstName = $form->getValue('ContactFirstName');
                $ContactLastName = $form->getValue('ContactLastName');
                $PhoneOffice = $form->getValue('PhoneOffice');
                $PhoneHome = $form->getValue('PhoneHome');
                $Mobile = $form->getValue('Mobile');
                $Email = $form->getValue('Email');
                $Address = $form->getValue('Address');
                $SchoolId = $form->getValue('SchoolId');
                $AccessCode = $form->getValue('AccessCode');
                $Description = $form->getValue('Description');
                $schoolregistrationmodel = new Application_Model_DbTable_Schoolregistration();
                $schoolregistrationmodel->addSchoolRegistration($UserId, 
                $Password, $ContactFirstName, $ContactLastName, $PhoneOffice, 
                $PhoneHome, $Mobile, $Email, $Address, $SchoolId, $AccessCode, 
                $Description);
                $this->_helper->redirector('list');
            } else {
                $form->populate($formData);
            }
        }
    }
    public function listAction ()
    {
        $schoolregistration = new Application_Model_DbTable_Schoolregistration();
        $this->view->schoolregistration = $schoolregistration->fetchAll();
    }
    public function addAction ()
    {
        // action body
        $form = new Application_Form_Schoolregistration();
        $form->submit->setLabel('Add');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $userid = $form->getValue('UserId');
                $passwd = $form->getValue('Password');
                $FN = $form->getValue('ContactFirstName');
                $LN = $form->getValue('ContactLastName');
                $schoolregistration = new Application_Model_DbTable_Schoolregistration();
                $schoolregistration->addSchoolRegistration($userid, $passwd, 
                $FN, $LN);
                $this->_helper->redirector('list');
            } else {
                $form->populate($formData);
            }
        }
    }
    public function deleteAction ()
    {
        $id = $this->_getParam('registrationid', 0);
        var_dump("Delete Id = " . $id);
        $schoolReg = new Application_Model_DbTable_SchoolRegistration();
        $schoolReg->deleteSchoolRegistration($id);
        $this->_helper->redirector('list');
        // if ($this->getRequest()->isPost()) {
        // $del = $this->getRequest()->getPost('del');
        // if ($del == 'Yes') {
        // $id = $this->getRequest()->getPost('id');
        // $albums = new Application_Model_DbTable_Albums();
        // $albums->deleteAlbum($id);
        // }
        // $this->_helper->redirector('index');
        // } else {
        // $id = $this->_getParam('id', 0);
        // $albums = new Application_Model_DbTable_Albums();
        // $this->view->album = $albums->getAlbum($id);
        // }
    }
    
    public function editAction ()
    {
        
        $id = $this->_getParam('registrationid', 0);
        $regdata = new Application_Model_DbTable_Schoolregistration();
        $fdata = $regdata->getSchoolRegistration($id);
        
       $form = new Application_Form_EditRegistration();
        $form->submit->setLabel('Edit');
        $form->populate($fdata);

        
        $this->view->form=$form;
        $form->populate($fdata);
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
        	$formData = $this->getRequest()->getPost();
        	if ($form->isValid($formData)) {
        		$registrationid = $form->getValue('RegistrationId');
        		$Password = $form->getValue('Password');
        		$ContactFirstName = $form->getValue('ContactFirstName');
        		$ContactLastName = $form->getValue('ContactLastName');
        		$PhoneOffice = $form->getValue('PhoneOffice');
        		$PhoneHome = $form->getValue('PhoneHome');
        		$Mobile = $form->getValue('Mobile');
        		$Email = $form->getValue('Email');
        		$Address = $form->getValue('Address');
        		$AccessCode = $form->getValue('AccessCode');
        		$Latitude = $form->getValue('Latitude');
        		$Longitude = $form->getValue('Longitude');
        		$Description = $form->getValue('Description');
        		$schoolregistrationmodel = new Application_Model_DbTable_SchoolRegistration();
        		$schoolregistrationmodel->updateSchoolRegistration($registrationid,$Password,
        				$ContactFirstName, $ContactLastName, $PhoneOffice, $PhoneHome,
        				$Mobile, $Email, $Address, $AccessCode, $Latitude, $Longitude,
        				$Description);
        		$this->_helper->redirector('list');
        	} else {
        		$form->populate($formData);
        	}
        }
        
    }
    public function editAction3 ()
    {
        // action body
        $id = $this->_getParam('registrationid', 0);
        $regdata = new Application_Model_DbTable_SchoolRegistration();
        $fdata = $regdata->getSchoolRegistration($id);
        print_r($fdata);
        $form = new Application_Form_EditSchoolRegistration();
        $form->submit->setLabel('Edit');
        $form->populate($fdata);
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $registrationid = $form->getValue('registrationid');
                $Password = $form->getValue('Password');
                $ContactFirstName = $form->getValue('ContactFirstName');
                $ContactLastName = $form->getValue('ContactLastName');
                $PhoneOffice = $form->getValue('PhoneOffice');
                $PhoneHome = $form->getValue('PhoneHome');
                $Mobile = $form->getValue('Mobile');
                $Email = $form->getValue('Email');
                $Address = $form->getValue('Address');
                $AccessCode = $form->getValue('AccessCode');
                $Latitude = $form->getValue('Latitude');
                $Longitude = $form->getValue('Longitude');
                $Description = $form->getValue('Description');
                $schoolregistrationmodel = new Application_Model_DbTable_SchoolRegistration();
                $schoolregistrationmodel->updateSchoolRegistration($Password, 
                $ContactFirstName, $ContactLastName, $PhoneOffice, $PhoneHome, 
                $Mobile, $Email, $Address, $AccessCode, $Latitude, $Longitude, 
                $Description);
                $this->_helper->redirector('list');
            } else {
                $form->populate($formData);
            }
        } else {
            $registrationid = $this->_getParam('registrationid', 0);
            if ($registrationid > 0) {
                $schoolregistration = new Application_Model_DbTable_SchoolRegistration();
                $form->populate(
                $schoolregistration->getSchoolRegistration($registrationid));
                // $form->registrationid->setValue($registrationid); // ?????
            }
        }
    }
}

