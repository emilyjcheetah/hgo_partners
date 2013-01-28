<?php
class Application_Form_ProjectImages extends Zend_Form
{
    public function init ()
    {
        $elements = array();
        $this->setName('projectimages');
        $ProjectId = new Zend_Form_Element_Text('ProjectId');
        $ProjectId->setLabel('ProjectId');
        $ProjectId->setRequired(true);
        $ImagePath = new Zend_Form_Element_File('ImagePath');
	    $ImagePath ->setLabel('Profile Image')
				    ->setDestination(PUBLIC_PATH.'/upload')
				    ->setRequired(false)
				    ->setMaxFileSize(10240000) // limits the filesize on the client side
				    ->setDescription('Click Browse and click on the image file you would like to upload');
	    $ImagePath->addValidator('Count', false, 1);                // ensure only 1 file
	    $ImagePath->addValidator('Size', false, 10240000);            // limit to 10 meg
	    $ImagePath->addValidator('Extension', false, 'jpg,jpeg,png,gif');// only JPEG, PNG, and GIFs
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        $this->addElements(array($ProjectId, $ImagePath, $submit));
    }
}