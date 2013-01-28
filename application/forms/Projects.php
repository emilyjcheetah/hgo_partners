<?php
class Application_Form_Projects extends Zend_Form
{
    public function init ()
    {
        $elements = array();
        $this->setName('projects');
        $ProjectName = new Zend_Form_Element_Text('ProjectName');
        $ProjectName->setLabel('ProjectName');
        $ProjectName->setRequired(true);
        $UserRegistrationId = new Zend_Form_Element_Hidden('UserRegistrationId');
                
              
        $SchoolRegId = new Zend_Form_Element_Hidden('SchoolRegId');
        $Description = new Zend_Form_Element_Text('Description');
        $Description->setLabel('Description');
        $Description->setRequired(true);
        $Goal_Investment = new Zend_Form_Element_Text('Goal_Investment');
        $Goal_Investment->setLabel('Goal_Investment');
        $Goal_Investment->setRequired(true);
        $Purpose = new Zend_Form_Element_Text('Purpose');
        $Purpose->setLabel('Purpose');
        $Purpose->setRequired(true);
        
        $cl = new Application_Model_DbTable_Projects();
        $clist=$cl->getProjectCategory();
        
        $Category = new Zend_Form_Element_Select('Category');
        $Category->setLabel('Category')
        			 ->addMultiOptions($clist);
        $Category->setRequired(true);
        $StartDate = new Zend_Form_Element_Text('StartDate');
        $StartDate->setLabel('StartDate');
        $StartDate->setRequired(true);
        $EndDate = new Zend_Form_Element_Text('EndDate');
        $EndDate->setLabel('EndDate');
        $EndDate->setRequired(true);
        $AmountCollected = new Zend_Form_Element_Text('AmountCollected');
        $AmountCollected->setLabel('AmountCollected');
        $AmountCollected->setRequired(true);
        $Students = new Zend_Form_Element_Text('Students');
        $Students->setLabel('Students');
        $Students->setRequired(true);
        $ThankyouVideoPath = new Zend_Form_Element_Text('ThankyouVideoPath');
	    $ThankyouVideoPath ->setLabel('Thankyou Video');
	   
	    
				   
        $ThankyouMessage = new Zend_Form_Element_Text('ThankyouMessage');
        $ThankyouMessage->setLabel('ThankyouMessage');
        $ThankyouMessage->setRequired(true);
        
        $ThankyouImagePath = new Zend_Form_Element_File('ThankyouImagePath');
        $ThankyouImagePath ->setLabel('Thankyou Image')
        ->setDestination(PUBLIC_PATH.'/projectsupload')
        ->setRequired(false)
        ->setMaxFileSize(10240000) // limits the filesize on the client side
        ->setDescription('Click Browse and click on the image file you would like to upload');
        $ThankyouImagePath->addValidator('Count', false, 1);                // ensure only 1 file
        $ThankyouImagePath->addValidator('Size', false, 10240000);            // limit to 10 meg
        $ThankyouImagePath->addValidator('Extension', false, 'jpg,jpeg,png,gif');// only JPEG, PNG, and GIFs
        
       
       
        $SuccessVideoPath = new Zend_Form_Element_Text('SuccessVideoPath');
        $SuccessVideoPath ->setLabel('Success Video link from youtube');
        
        
       
        $SuccessImagePath = new Zend_Form_Element_File('SuccessImagePath');
        $SuccessImagePath ->setLabel('Success Image')
        ->setDestination(PUBLIC_PATH.'/projectsupload')
        ->setRequired(false)
        ->setMaxFileSize(10240000) // limits the filesize on the client side
        ->setDescription('Click Browse and click on the image file you would like to upload');
        $SuccessImagePath->addValidator('Count', false, 1);                // ensure only 1 file
        $SuccessImagePath->addValidator('Size', false, 10240000);            // limit to 10 meg
        $SuccessImagePath->addValidator('Extension', false, 'jpg,jpeg,png,gif');// only JPEG, PNG, and GIFs
        
        $SuccessMessage = new Zend_Form_Element_Text('SuccessMessage');
        $SuccessMessage->setLabel('SuccessMessage');
        $SuccessMessage->setRequired(true);
        $Planb = new Zend_Form_Element_Text('Planb');
        $Planb->setLabel('Planb');
        $Planb->setRequired(true);
        $SchoolGrade = new Zend_Form_Element_Text('SchoolGrade');
        $SchoolGrade->setLabel('SchoolGrade');
        $SchoolGrade->setRequired(true);
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        $this->addElements(
        array($ProjectName, $UserRegistrationId, $Description, $Goal_Investment, 
        $Purpose, $Category, $StartDate, $EndDate, $AmountCollected, $Students, 
        $ThankyouVideoPath, $ThankyouMessage, $ThankyouImagePath, 
        $SuccessVideoPath, $SuccessImagePath, $SuccessMessage, $Planb, 
        $SchoolGrade,$SchoolRegId, $submit));
    }
}