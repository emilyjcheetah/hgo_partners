<?php
class Application_Form_Login extends Zend_Form
{
    public function init()
    {
        $elements = array();
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
        		array('ViewScript', array('viewScript' => 'userlogin/myform.phtml')),
        		'Form'
        ));

        $this->setName('login');
        $UserId = new Zend_Form_Element_Text('UserId');
       
        $UserId->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        
        array_push($elements,$UserId);


        $Password = new Zend_Form_Element_Text('Password');
        
        $Password->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        array_push($elements,$Password);


        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id','submitbutton');
        array_push($elements, $submit);


        $this->addElements($elements);
    }
}