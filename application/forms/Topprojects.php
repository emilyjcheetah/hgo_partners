<?php
class Application_Form_Topprojects extends Zend_Form
{
    public function init()
    {
        $elements = array();

        $this->setName('topprojects');
        $Project1 = new Zend_Form_Element_Text('UserId');
        $UserId->setLabel('UserId');
        $UserId->setRequired(true);
        array_push($elements,$UserId);


        $Password = new Zend_Form_Element_Text('Password');
        $Password->setLabel('Password');
        $Password->setRequired(true);
        array_push($elements,$Password);


        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id','submitbutton');
        array_push($elements, $submit);


        $this->addElements($elements);
    }
}