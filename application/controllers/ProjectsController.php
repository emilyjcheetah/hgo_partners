<?php
class ProjectsController extends Zend_Controller_Action
{
    public function init ()
    {
        $dict = new Application_Model_DbTable_Dictionary();
        // $val = $dict->getDictionary('Registered User List', 3);
        $this->view->dictionary = $dict;
        /*
         * Initialize action controller here
         */
    }
    public function indexAction ()
    {
 $userDetails = new Zend_Session_Namespace('userDetails');
        // action body
        $form = new Application_Form_Projects();
        $form->submit->setLabel('Projects');
 $fdata1 = array('UserRegistrationId'=>$userDetails->rid,'SchoolRegId'=>$userDetails->schoolid);
        $form->populate($fdata1);
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $ProjectName = $form->getValue('ProjectName');
                $UserRegistrationId = $form->getValue('UserRegistrationId');
                $Description = $form->getValue('Description');
                $Goal_Investment = $form->getValue('Goal_Investment');
                $Purpose = $form->getValue('Purpose');
                $Category = $form->getValue('Category');
                $StartDate = $form->getValue('StartDate');
                $EndDate = $form->getValue('EndDate');
                $AmountCollected = $form->getValue('AmountCollected');
                $Students = $form->getValue('Students');
                $ThankyouVideoPath = $form->getValue('ThankyouVideoPath');
                $ThankyouMessage = $form->getValue('ThankyouMessage');
                $ThankyouImagePath = $form->getValue('ThankyouImagePath');
                $SuccessVideoPath = $form->getValue('SuccessVideoPath');
                $SuccessImagePath = $form->getValue('SuccessImagePath');
                $SuccessMessage = $form->getValue('SuccessMessage');
                $Planb = $form->getValue('Planb');
                $SchoolGrade = $form->getValue('SchoolGrade');
                $SchoolRegId = $form->getValue('SchoolRegId');
                $projectsmodel = new Application_Model_DbTable_Projects();
                $projectsmodel->addProjects($ProjectName, $UserRegistrationId, 
                $Description, $Goal_Investment, $Purpose, $Category, $StartDate, 
                $EndDate, $AmountCollected, $Students, $ThankyouVideoPath, 
                $ThankyouMessage, $ThankyouImagePath, $SuccessVideoPath, 
                $SuccessImagePath, $SuccessMessage, $Planb, $SchoolGrade,$SchoolRegId);
                
                if ($form->ThankyouImagePath->isUploaded()) {
                	$values = $form->getValues();
                	$source = $form->ThankyouImagePath->getFileName();
                
                	$new_image_name = date('YmdHis') . "jpg";
                	// save image to database and filesystem here
                	$image_saved = move_uploaded_file($source,
                			PUBLIC_PATH . '/projectupload/projectimages/' . $new_image_name);
                	if ($image_saved) {
                		$this->view->image = '<img src="/images/' .
                				$new_image_name . '" />';
                		$form->reset(); // only do this if it saved ok and you
                		// want to re-display the fresh empty
                		// form
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
        $projects = new Application_Model_DbTable_Projects();
        $this->view->projects = $projects->fetchAll();
    }
    public function deleteAction ()
    {
        $id = $this->_getParam('projectid', 0);
        var_dump("Delete Id = " . $id);
        $project = new Application_Model_DbTable_Projects();
        $project->deleteProjects($id);
        $this->_helper->redirector('list');
    }
    public function editAction ()
    {
        $id = $this->_getParam('projectid', 0);
        $regdata = new Application_Model_DbTable_Projects();
        $fdata = $regdata->getProjects($id);
        $form = new Application_Form_Projects();
        $form->submit->setLabel('Projects');
        $form->populate($fdata);
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $ProjectName = $form->getValue('ProjectName');
                $UserRegistrationId = $form->getValue('UserRegistrationId');
                $Description = $form->getValue('Description');
                $Goal_Investment = $form->getValue('Goal_Investment');
                $Purpose = $form->getValue('Purpose');
                $Category = $form->getValue('Category');
                $StartDate = $form->getValue('StartDate');
                $EndDate = $form->getValue('EndDate');
                $AmountCollected = $form->getValue('AmountCollected');
                $Students = $form->getValue('Students');
                $ThankyouVideoPath = $form->getValue('ThankyouVideoPath');
                if ($ThankyouVideoPath == "") {
                    $ThankyouVideoPath = $fdata['ThankyouVideoPath'];
                }
                $ThankyouMessage = $form->getValue('ThankyouMessage');
                $ThankyouImagePath = $form->getValue('ThankyouImagePath');
                if ($ThankyouImagePath == "") {
                    $ThankyouImagePath = $fdata['ThankyouImagePath'];
                }
                $SuccessVideoPath = $form->getValue('SuccessVideoPath');
                if ($SuccessVideoPath == "") {
                    $SuccessImagePath = $fdata['SuccessVideoPath'];
                }
                $SuccessImagePath = $form->getValue('SuccessImagePath');
                if ($SuccessImagePath == "") {
                    $SuccessImagePath = $fdata['SuccessImagePath'];
                }
                $SuccessMessage = $form->getValue('SuccessMessage');
                $Planb = $form->getValue('Planb');
                $SchoolGrade = $form->getValue('SchoolGrade');
                $projectsmodel = new Application_Model_DbTable_Projects();
                $projectsmodel->updateProjects($id,$ProjectName, $UserRegistrationId, 
                $Description, $Goal_Investment, $Purpose, $Category, $StartDate, 
                $EndDate, $AmountCollected, $Students, $ThankyouVideoPath, 
                $ThankyouMessage, $ThankyouImagePath, $SuccessVideoPath, 
                $SuccessImagePath, $SuccessMessage, $Planb, $SchoolGrade);
                $this->_helper->redirector('list');
            } else {
                $form->populate($formData);
            }
        }
    }

function ProjectSearch($key,$val)
    {
        $regdata = new Application_Model_DbTable_Projects();
        $fdata = $regdata->SearchProjects ($key,$val);
        print_r($fdata);
    }
}

