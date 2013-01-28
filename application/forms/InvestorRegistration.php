<?php
class Application_Form_InvestorRegistration extends Zend_Form
{
    public function init()
    {
        $elements = array();

        $this->setName('investorregistration');
        

        $UserId = new Zend_Form_Element_Text('UserId');
        $UserId->setLabel('UserId');
        $UserId->setRequired(true);
        array_push($elements,$UserId);


        $Password = new Zend_Form_Element_Text('Password');
        $Password->setLabel('Password');
        $Password->setRequired(true);
        array_push($elements,$Password);


        $FirstName = new Zend_Form_Element_Text('FirstName');
        $FirstName->setLabel('FirstName');
        $FirstName->setRequired(true);
        array_push($elements,$FirstName);


        $LastName = new Zend_Form_Element_Text('LastName');
        $LastName->setLabel('LastName');
        $LastName->setRequired(true);
        array_push($elements,$LastName);


        $Email = new Zend_Form_Element_Text('Email');
        $Email->setLabel('Email');
        $Email->setRequired(true);
        array_push($elements,$Email);


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


        $ImagePath = new Zend_Form_Element_File('ImagePath');
	    $ImagePath ->setLabel('Profile Image')
				    ->setDestination(PUBLIC_PATH.'/uploadinvestor')
				    ->setRequired(false)
				   // ->setMaxFileSize(10240000) // limits the filesize on the client side
				    ->setDescription('Click Browse and click on the image file you would like to upload');
	    $ImagePath->addValidator('Count', false, 1);                // ensure only 1 file
	    //$ImagePath->addValidator('Size', false, 10240000);            // limit to 10 meg
	    $ImagePath->addValidator('Extension', false, 'jpg,jpeg,png,gif');// only JPEG, PNG, and GIFs
        array_push($elements,$ImagePath);


        $Bio = new Zend_Form_Element_Text('Bio');
        $Bio->setLabel('Bio');
        $Bio->setRequired(true);
        array_push($elements,$Bio);


        $Phone = new Zend_Form_Element_Text('Phone');
        $Phone->setLabel('Phone');
        $Phone->setRequired(true);
        array_push($elements,$Phone);


        $Mobile = new Zend_Form_Element_Text('Mobile');
        $Mobile->setLabel('Mobile');
        $Mobile->setRequired(true);
        array_push($elements,$Mobile);




        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id','submitbutton');
        array_push($elements, $submit);


        $this->addElements($elements);
    }
}