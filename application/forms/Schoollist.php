<?php
class Application_Form_Schoollist extends Zend_Form
{
    public function init()
    {
        $elements = array();

        $this->setName('schoollist');
        $SchoolId = new Zend_Form_Element_Text('SchoolId');
        $SchoolId->setLabel('SchoolId');
        $SchoolId->setRequired(true);
        array_push($elements,$SchoolId);


        $SchoolName = new Zend_Form_Element_Text('SchoolName');
        $SchoolName->setLabel('SchoolName');
        $SchoolName->setRequired(true);
        array_push($elements,$SchoolName);


        $Country = new Zend_Form_Element_Text('Country');
        $Country->setLabel('Country');
        $Country->setRequired(true);
        array_push($elements,$Country);


        $State = new Zend_Form_Element_Text('State');
        $State->setLabel('State');
        $State->setRequired(true);
        array_push($elements,$State);


        $City = new Zend_Form_Element_Text('City');
        $City->setLabel('City');
        $City->setRequired(true);
        array_push($elements,$City);


        $Zipcode = new Zend_Form_Element_Text('Zipcode');
        $Zipcode->setLabel('Zipcode');
        $Zipcode->setRequired(true);
        array_push($elements,$Zipcode);


        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id','submitbutton');
        array_push($elements, $submit);


        $this->addElements($elements);
    }
}