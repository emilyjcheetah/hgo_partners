<?php
class Application_Form_School_socialmedia extends Zend_Form
{
    public function init()
    {
        $elements = array();

        $this->setName('school_socialmedia');
        $LinkId = new Zend_Form_Element_Text('LinkId');
        $LinkId->setLabel('LinkId');
        $LinkId->setRequired(true);
        array_push($elements,$LinkId);


        $Twitterhash = new Zend_Form_Element_Text('Twitterhash');
        $Twitterhash->setLabel('Twitterhash');
        $Twitterhash->setRequired(true);
        array_push($elements,$Twitterhash);


        $WegsiteUrl = new Zend_Form_Element_Text('WegsiteUrl');
        $WegsiteUrl->setLabel('WegsiteUrl');
        $WegsiteUrl->setRequired(true);
        array_push($elements,$WegsiteUrl);


        $FacebookUrl = new Zend_Form_Element_Text('FacebookUrl');
        $FacebookUrl->setLabel('FacebookUrl');
        $FacebookUrl->setRequired(true);
        array_push($elements,$FacebookUrl);


        $TwitterLink = new Zend_Form_Element_Text('TwitterLink');
        $TwitterLink->setLabel('TwitterLink');
        $TwitterLink->setRequired(true);
        array_push($elements,$TwitterLink);


        $YoutubeLink = new Zend_Form_Element_Text('YoutubeLink');
        $YoutubeLink->setLabel('YoutubeLink');
        $YoutubeLink->setRequired(true);
        array_push($elements,$YoutubeLink);


        $SchoolRegistrationId = new Zend_Form_Element_Text('SchoolRegistrationId');
        $SchoolRegistrationId->setLabel('SchoolRegistrationId');
        $SchoolRegistrationId->setRequired(true);
        array_push($elements,$SchoolRegistrationId);


        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id','submitbutton');
        array_push($elements, $submit);


        $this->addElements($elements);
    }
}