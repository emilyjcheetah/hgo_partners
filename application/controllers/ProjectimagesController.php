<?php
class ProjectImagesController extends Zend_Controller_Action
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
        // action body
        $form = new Application_Form_ProjectImages();
        $form->submit->setLabel('ProjectImages');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $ProjectId = $form->getValue('ProjectId');
                $ImagePath = $form->getValue('ImagePath');
                $projectimagesmodel = new Application_Model_DbTable_ProjectImages();
                $projectimagesmodel->addProjectImages($ProjectId, $ImagePath);
                
                if($form->ImagePath->isUploaded())
                {
                	$values = $form->getValues();
                	$source = $form->ImagePath->getFileName();
                
                	//to re-name the image, all you need to do is save it with a new name, instead of the name they uploaded it with. Normally, I use the primary key of the database row where I'm storing the name of the image. For example, if it's an image of Person 1, I call it 1.jpg. The important thing is that you make sure the image name will be unique in whatever directory you save it to.
                
                	$new_image_name = date('YmdHis')."jpg";
                
                	//save image to database and filesystem here
                	$image_saved = move_uploaded_file($source, PUBLIC_PATH.'/projectsupload/projectimages/'.$new_image_name);
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
        $nvitem = new Application_Model_DbTable_ProjectImages();
        $this->view->projectimages = $nvitem->fetchAll();
    }
    public function deleteAction ()
    {
        $id = $this->_getParam('projectimagesid', 0);
        $project = new Application_Model_DbTable_ProjectImages();
        $project->deleteProjectImages($id);
        $this->_helper->redirector('list');
    }
    public function editAction ()
    {
        $id = $this->_getParam('projectimagesid', 0);
        $regdata = new Application_Model_DbTable_ProjectImages();
        $fdata = $regdata->fetchRow($id)->toArray();
        $form = new Application_Form_ProjectImages();
        $form->submit->setLabel('ProjectImages');
        $form->populate($fdata);
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $ProjectId = $form->getValue('ProjectId');
                $ImagePath = $form->getValue('ImagePath');
                
                if($ImagePath=="")
                {
                
                	$ImagePath = $fdata['ImagePath'];
                }
                $projectimagesmodel = new Application_Model_DbTable_ProjectImages();
                $projectimagesmodel->updateProjectImages($id,$ProjectId, $ImagePath);
                
                if($form->ImagePath->isUploaded())
                {
                	$values = $form->getValues();
                	$source = $form->ImagePath->getFileName();
                
                	//to re-name the image, all you need to do is save it with a new name, instead of the name they uploaded it with. Normally, I use the primary key of the database row where I'm storing the name of the image. For example, if it's an image of Person 1, I call it 1.jpg. The important thing is that you make sure the image name will be unique in whatever directory you save it to.
                
                	$new_image_name = date('YmdHis')."jpg";
                
                	//save image to database and filesystem here
                	$image_saved = move_uploaded_file($source, PUBLIC_PATH.'/projectsupload/projectimages/'.$new_image_name);
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

