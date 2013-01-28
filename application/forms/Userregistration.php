<?php

class Application_Form_UserRegistration extends Zend_Form
{

	public function init()
	{
	    $UserId = new Zend_Form_Element_Text('UserId');
	    $UserId->setLabel('UserId');
	    $UserId->setRequired(true);
	    
	    $Password = new Zend_Form_Element_Text('Password');
	    $Password->setLabel('Password');
	    $Password->setRequired(true);
	    
	    $FirstName = new Zend_Form_Element_Text('FirstName');
	    $FirstName->setLabel('FirstName');
	    $FirstName->setRequired(true);
	    
	    $LastName = new Zend_Form_Element_Text('LastName');
	    $LastName->setLabel('LastName');
	    $LastName->setRequired(true);
	    
	    $Email = new Zend_Form_Element_Text('Email');
	    $Email->setLabel('Email');
	    $Email->setRequired(true);
	    
	    $Type = new Zend_Form_Element_Text('Type');
	    $Type->setLabel('Type');
	    $Type->setRequired(true);
	    
	    $Country = new Zend_Form_Element_Text('Country');
	    $Country->setLabel('Country');
	    $Country->setRequired(true);
	    
	    $State = new Zend_Form_Element_Text('State');
	    $State->setLabel('State');
	    $State->setRequired(true);
	    
	    $City = new Zend_Form_Element_Text('City');
	    $City->setLabel('City');
	    $City->setRequired(true);
	    
	    $ZipCode = new Zend_Form_Element_Text('ZipCode');
	    $ZipCode->setLabel('ZipCode');
	    $ZipCode->setRequired(true);
	    
	    $slist = new Application_Model_DbTable_UserRegistration();
	    $school_list = $slist->getSchoolList3();
	    
	    $SchoolRegistrationId = new Zend_Form_Element_Select('SchoolRegistrationId');
	    $SchoolRegistrationId->setLabel('School Name')
	    					 ->addMultiOptions( $school_list ); 

	    
	    
	    $Phone = new Zend_Form_Element_Text('Phone');
	    $Phone->setLabel('Phone');
	    $Phone->setRequired(true);
	    
	    $Mobile = new Zend_Form_Element_Text('Mobile');
	    $Mobile->setLabel('Mobile');
	    $Mobile->setRequired(true);
	    
	    $AccessCode = new Zend_Form_Element_Text('AccessCode');
	    $AccessCode->setLabel('AccessCode');
	    $AccessCode->setRequired(true);
	    
	    $ImagePath = new Zend_Form_Element_File('ImagePath');
	    $ImagePath ->setLabel('Profile Image')
				    ->setDestination(PUBLIC_PATH.'/upload')
				    ->setRequired(false)
				    ->setMaxFileSize(10240000) // limits the filesize on the client side
				    ->setDescription('Click Browse and click on the image file you would like to upload');
	    $ImagePath->addValidator('Count', false, 1);                // ensure only 1 file
	    $ImagePath->addValidator('Size', false, 10240000);            // limit to 10 meg
	    $ImagePath->addValidator('Extension', false, 'jpg,jpeg,png,gif')// only JPEG, PNG, and GIFs
	   
	  ->removeDecorator('HtmlTag') ->removeDecorator('DtDdWrapper')  ->removeDecorator('Errors');
	     
	    
	    
	    $submit = new Zend_Form_Element_Submit ( 'submit' );
	    $submit->setAttrib ( 'id', 'submitbutton' );
	    
	   
	  
	    
	    //$this->setEnctype(Zend_Form::ENCTYPE_MULTIPART);
	     
	    $this->addElements ( array ($UserId,$Password,$FirstName,$LastName,$Email,$Type,$Country,$State,$City,$ZipCode,$SchoolRegistrationId,$Phone,$Mobile,$AccessCode,$ImagePath, $submit ) );
	  
	    
	       $this->setElementDecorators(array(
	    		'ViewHelper',
	    		array(array('data' => 'HtmlTag'),  array('tag' =>'td', 'class'=> 'element')),
	    		array('Label', array('tag' => 'td')),
	    		array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
	       array('Errors', array('class' => 'errors', 'placement' => 'APPEND'))
	       		
	    ));
	    $submit->setDecorators(array('ViewHelper',
	    		array(array('data' => 'HtmlTag'),  array('tag' =>'td', 'class'=> 'element')),
	    		array(array('emptyrow' => 'HtmlTag'),  array('tag' =>'td', 'class'=> 'element', 'placement' => 'PREPEND')),
	    		array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
	    ));
	    
	    $ImagePath->setDecorators(array(
        'File',
	    
        'Errors',
        array(array('data' => 'HtmlTag'), array('tag' => 'td')),
        array('Label', array('tag' => 'td')),
        array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
    
	    ));
	    
	    
	    $this->setDecorators(array(
	    		'FormElements',
	    		array('HtmlTag', array('tag' => 'table')),
	    		'Form'
	    ));
	      
	}
	
	
	}

?>