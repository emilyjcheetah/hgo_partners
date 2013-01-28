<?php

class LoginController extends Zend_Controller_Action
{
    public function init ()
    {
        /*
         * Initialize action controller here
         */
        $this->_helper->layout->setLayout('schoolarea');
    }
    public function indexAction ()
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
                $schoolreg = new Application_Model_DbTable_Schoolregistration();
                $aa = $schoolreg->fetchRow(
                $schoolreg->select()
                    ->where('UserId=?', $UserId));
                if ($aa->UserId == $UserId and $aa->Password == $Password) {
                    Zend_Session::start();
                    $schoolDetails = new Zend_Session_Namespace();
                    $schoolDetails->UserId = $UserId;
                   $schoolDetails->fname = $aa->ContactFirstName;
                    $schoolDetails->LastName = $aa->ContactLastName;
                   $schoolDetails->sid = $aa->RegistrationId;

                   $this->_helper->redirector('index', 'Schoolarea');
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

