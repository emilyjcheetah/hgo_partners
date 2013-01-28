<?php
class Application_Form_Projectinvestment extends Zend_Form
{
    public function init()
    {
        $elements = array();

        $this->setName('projectinvestment');
       
        $ProjectId = new Zend_Form_Element_Text('ProjectId');
        $ProjectId->setLabel('ProjectId');
        $ProjectId->setRequired(true);
        array_push($elements,$ProjectId);


        $InvestorId = new Zend_Form_Element_Text('InvestorId');
        $InvestorId->setLabel('InvestorId');
        $InvestorId->setRequired(true);
        array_push($elements,$InvestorId);


        $InvestmentAmount = new Zend_Form_Element_Text('InvestmentAmount');
        $InvestmentAmount->setLabel('InvestmentAmount');
        $InvestmentAmount->setRequired(true);
        array_push($elements,$InvestmentAmount);


        $RecurringInvestment = new Zend_Form_Element_Text('RecurringInvestment');
        $RecurringInvestment->setLabel('RecurringInvestment');
        $RecurringInvestment->setRequired(true);
        array_push($elements,$RecurringInvestment);


        $RecurrancePeriod = new Zend_Form_Element_Text('RecurrancePeriod');
        $RecurrancePeriod->setLabel('RecurrancePeriod');
        $RecurrancePeriod->setRequired(true);
        array_push($elements,$RecurrancePeriod);


        $InvestmentDate = new Zend_Form_Element_Text('InvestmentDate');
        $InvestmentDate->setLabel('InvestmentDate');
        $InvestmentDate->setRequired(true);
        array_push($elements,$InvestmentDate);


        $MatchingAmount = new Zend_Form_Element_Text('MatchingAmount');
        $MatchingAmount->setLabel('MatchingAmount');
        $MatchingAmount->setRequired(true);
        array_push($elements,$MatchingAmount);


        $Anonymous = new Zend_Form_Element_Select('Anonymous');
        $Anonymous->setLabel('Anonymous')
         ->addMultiOptions( array('Yes'=>'yes','No'=>'no') );
        array_push($elements,$Anonymous);


        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id','submitbutton');
        array_push($elements, $submit);


        $this->addElements($elements);
    }
}