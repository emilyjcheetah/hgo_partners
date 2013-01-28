<?php

class ProjectVideosController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $form = new Application_Form_Projectvideos();
        $form->submit->setLabel('Project Videos');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
        	$formData = $this->getRequest()->getPost();
        	if ($form->isValid($formData)) {
        		
        		$projectvideo = new Application_Model_DbTable_ProjectVideos();
        		unset($formData['submit']);
        		$projectvideo->insert($formData);
        		
        		$this->_helper->redirector('list');
        	} else {
        		$form->populate($formData);
        	}
        }
    }
    
    
    public function editAction()
    {
    	// action body
    	
        $id = $this->_getParam('projectvideoid', 0);
        $regdata = new Application_Model_DbTable_ProjectVideos();
        $fdata = $regdata->fetchRow($id)->toArray();
        
        
    	$form = new Application_Form_Projectvideos();
    	$form->submit->setLabel('Project Videos');
    	$form->populate($fdata);
    	$this->view->form = $form;
    
    	if ($this->getRequest()->isPost()) {
    		$formData = $this->getRequest()->getPost();
    		if ($form->isValid($formData)) {
    
    			$projectvideo = new Application_Model_DbTable_ProjectVideos();
    			unset($formData['submit']);
    			$projectvideo->update($formData, $id);
    
    			$this->_helper->redirector('list');
    		} else {
    			$form->populate($formData);
    		}
    	}
    }

    
    public function listAction ()
    {
    	$projectvideo = new Application_Model_DbTable_ProjectVideos();
    	$this->view->projectvideo = $projectvideo->fetchAll();
    }
    public function deleteAction ()
    {
    	$id = $this->_getParam('projectvideoid', 0);
    	
    	$project = new Application_Model_DbTable_ProjectVideos();
    	$project->delete($id);
    	$this->_helper->redirector('list');
    }

}

