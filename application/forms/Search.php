<?php
class Application_Form_Search extends Zend_Form
{

	public function init()
	{
	    $search = new Zend_Form_Element_Select('skey');
	    $search->setLabel('Select')
	   
	    ->addMultiOptions(array('ProjectName'=>'ProjectName','Category'=>'Category','AmountCollected'=>'AmountCollected','SchoolName'=>'SchoolName'));
	    
	    
	    $searchval = new Zend_Form_Element_Text('sval');
	    $searchval->setLabel('Search String');
	    $searchval->setRequired(true);
	    
	   
	    
	    $submit = new Zend_Form_Element_Submit ( 'submit' );
	    $submit->setAttrib ( 'id', 'submitbutton' );
	    
	    $this->addElements ( array ($search,$searchval, $submit ) );
	    $this->setOptions(array('class'=>'myform'));
	}
	
}