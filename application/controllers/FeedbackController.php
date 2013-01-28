<?php

class FeedbackController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        
        $this->_helper->layout->setLayout('Feedback2');


        // action body
        $form = new Application_Form_Feedback();
        $form->submit->setLabel('Feedback');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $FirstName = $form->getValue('FirstName');
                $LastName = $form->getValue('LastName');
                $Email = $form->getValue('Email');
                $Feedback = $form->getValue('Feedback');
                $feedbackmodel = new Application_Model_DbTable_Feedback();
                $feedbackmodel->addFeedback($FirstName, $LastName, $Email, $Feedback);
                $this->_helper->redirector('list');
            } else {
                $form->populate($formData);
            }
        }
    }

    public function listAction() {
        $feedback = new Application_Model_DbTable_Feedback();
        $this->view->feedback = $feedback->fetchAll();
    }

}

