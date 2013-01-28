<?php
class Application_Form_Projectvideos extends Zend_Form
{
    public function init()
    {
        $elements = array();

        $this->setName('projectvideos');
       

        $ProjectId = new Zend_Form_Element_Text('ProjectId');
        $ProjectId->setLabel('ProjectId');
        $ProjectId->setRequired(true);
        array_push($elements,$ProjectId);


        $VideoPath = new Zend_Form_Element_Text('VideoPath');
        $VideoPath->setLabel('VideoPath');
        $VideoPath->setRequired(true);
        array_push($elements,$VideoPath);


        $CreateDate = new Zend_Form_Element_Text('CreateDate');
        $CreateDate->setLabel('CreateDate');
        $CreateDate->setRequired(true);
        array_push($elements,$CreateDate);


        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id','submitbutton');
        array_push($elements, $submit);


        $this->addElements($elements);
    }
}