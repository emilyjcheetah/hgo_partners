<?php
class Application_Form_Feedback extends Zend_Form
{

	public function init()
	{
	    $FirstName = new Zend_Form_Element_Text('FirstName');
	    $FirstName->setLabel('FirstName');
	    $FirstName->setRequired(true);
	    
	    $LastName = new Zend_Form_Element_Text('LastName');
	    $LastName->setLabel('LastName');
	    $LastName->setRequired(true);
	    
	    $Email = new Zend_Form_Element_Text('Email');
	    $Email->setLabel('Email');
	    $Email->setRequired(true);
	    
	    $Feedback = new Zend_Form_Element_Textarea('Feedback');
	    $Feedback->setLabel('Feedback');
	    $Feedback->setRequired(true);
	    
	    $submit = new Zend_Form_Element_Submit ( 'submit' );
	    $submit->setAttrib ( 'id', 'submitbutton' );
	    
	    $this->addElements ( array ($FirstName,$LastName,$Email,$Feedback, $submit ) );
	    $this->setOptions(array('class'=>'myform'));
	}
	
}