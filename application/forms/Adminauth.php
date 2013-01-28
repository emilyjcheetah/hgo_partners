<?php
class Application_Form_Adminauth extends Zend_Form
{
    public function init()
    {
        $elements = array();
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
        		array('ViewScript', array('viewScript' => 'adminauth/authform.phtml')),
        		'Form'
        ));

        $this->setName('Admin Auth');
        $UserId = new Zend_Form_Element_Text('UserId');
       
        $UserId->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addErrorMessage("Userid filed cannot be null")
        ->addValidator('NotEmpty');
        
        array_push($elements,$UserId);


        $Password = new Zend_Form_Element_Text('Password');
        $Password->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        array_push($elements,$Password);
        
        $FirstName = new Zend_Form_Element_Text('FirstName');
        $FirstName->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim');
        
        array_push($elements,$FirstName);
        
        $LastName = new Zend_Form_Element_Text('LastName');
        $LastName->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim');
        
        array_push($elements,$LastName);
        
        
        
        $email_validate = new Zend_Validate_Email();
        
        $neValidator = new Zend_Validate_NotEmpty();
        
        $neValidator->setMessage('Please enter email.');
        
       $Email = new Zend_Form_Element_Text('Email');
        $Email->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        
        ->addFilter('StripTags')
        
        ->setAttrib('MaxLength',100)
        
        ->addValidator($neValidator,TRUE)
        
        ->addValidator($email_validate,TRUE);
        array_push($elements,$Email);
        
        $PhoneOffice = new Zend_Form_Element_Text('PhoneOffice');
        $PhoneOffice->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        array_push($elements,$PhoneOffice);
        
         $PhoneHome = new Zend_Form_Element_Text('PhoneHome');
        $PhoneHome->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        array_push($elements,$PhoneHome);
        
        $Mobile = new Zend_Form_Element_Text('Mobile');
        $Mobile->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        array_push($elements,$Mobile);
        
       $Privillages = new Zend_Form_Element_Select('Privillages');
             
        $Privillages->addMultiOptions( array('BASIC'=>'BASIC','PREMIUM'=>'PREMIUM','ADMIN'=>'ADMIN') );
        array_push($elements,$Privillages);
        
        


        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id','submitbutton');
        array_push($elements, $submit);


        $this->addElements($elements);
    }
}