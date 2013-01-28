<?php
class Application_Form_EditRegistration extends Zend_Form
{
    
    
    public function init()
    {
      
$RegistrationId=new Zend_Form_Element_Hidden('RegistrationId');

$Password = new Zend_Form_Element_Text('Password');
$Password->setLabel('Password');
$Password->setRequired(true);

$ContactFirstName = new Zend_Form_Element_Text('ContactFirstName');
$ContactFirstName->setLabel('ContactFirstName');
$ContactFirstName->setRequired(true);

$ContactLastName = new Zend_Form_Element_Text('ContactLastName');
$ContactLastName->setLabel('ContactLastName');
$ContactLastName->setRequired(true);

$PhoneOffice = new Zend_Form_Element_Text('PhoneOffice');
$PhoneOffice->setLabel('PhoneOffice');
$PhoneOffice->setRequired(true);

$PhoneHome = new Zend_Form_Element_Text('PhoneHome');
$PhoneHome->setLabel('PhoneHome');
$PhoneHome->setRequired(true);

$Mobile = new Zend_Form_Element_Text('Mobile');
$Mobile->setLabel('Mobile');
$Mobile->setRequired(true);

$Email = new Zend_Form_Element_Text('Email');
$Email->setLabel('Email');
$Email->setRequired(true);

$Address = new Zend_Form_Element_Text('Address');
$Address->setLabel('Address');
$Address->setRequired(true);

$AccessCode = new Zend_Form_Element_Text('AccessCode');
$AccessCode->setLabel('AccessCode');


$Latitude = new Zend_Form_Element_Text('Latitude');
$Latitude->setLabel('Latitude');


$Longitude = new Zend_Form_Element_Text('Longitude');
$Longitude->setLabel('Longitude');


$Description = new Zend_Form_Element_Text('Description');
$Description->setLabel('Description');


$submit = new Zend_Form_Element_Submit ( 'submit' ); $submit->setAttrib ( 'id', 'submitbutton' );
$this->addElements ( array ($RegistrationId,$Password,$ContactFirstName,$ContactLastName,$PhoneOffice,$PhoneHome,$Mobile,$Email,$Address,$AccessCode,$Latitude,$Longitude,$Description, $submit ) );


  
        
    }
}