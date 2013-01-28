<?php
class Application_Form_Languages extends Zend_Form
{
    public function init()
    {
        $elements = array();

        $this->setName('languages');
        $LanguageId = new Zend_Form_Element_Text('LanguageId');
        $LanguageId->setLabel('LanguageId');
        $LanguageId->setRequired(true);
        array_push($elements,$LanguageId);


        $Name = new Zend_Form_Element_Text('Name');
        $Name->setLabel('Name');
        $Name->setRequired(true);
        array_push($elements,$Name);


        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id','submitbutton');
        array_push($elements, $submit);


        $this->addElements($elements);
    }
}