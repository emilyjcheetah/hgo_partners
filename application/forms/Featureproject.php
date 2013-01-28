<?php 
class Application_Form_Featureproject extends Zend_Form
{
    public function init()
    {
        $elements = array();

        $this->setName('feature_project');
        

        $ProjectId = new Zend_Form_Element_Text('ProjectId');
        $ProjectId->setLabel('ProjectId');
        $ProjectId->setRequired(true);
        array_push($elements,$ProjectId);


        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id','submitbutton');
        array_push($elements, $submit);


        $this->addElements($elements);
    }
}

?>