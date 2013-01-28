<?php
class Application_Model_DbTable_Investorregistration extends Zend_Db_Table_Abstract
{
    protected $_name = 'investorregistration';
    protected $_id = array('InvestorId', 'UserId');
    public function getInvestorRegistration ($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('InvestorId = ' . $id);
        if (! $row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }
    public function addInvestorRegistration ($UserId, $Password, $FirstName, 
    $LastName, $Email, $Country, $State, $City, $Zipcode, $ImagePath, $Bio, 
    $Phone, $Mobile)
    {
        $data = array('UserId' => $UserId, 'Password' => $Password, 
        'FirstName' => $FirstName, 'LastName' => $LastName, 'Email' => $Email, 
        'Country' => $Country, 'State' => $State, 'City' => $City, 
        'Zipcode' => $Zipcode, 'ImagePath' => $ImagePath, 'Bio' => $Bio, 
        'Phone' => $Phone, 'Mobile' => $Mobile);
        $this->insert($data);
    }
    public function updateInvestorRegistration ($id,$UserId, $Password, $FirstName, 
    $LastName, $Email, $Country, $State, $City, $Zipcode, $ImagePath, $Bio, 
    $Phone, $Mobile)
    {
        $data = array('UserId' => $UserId, 'Password' => $Password, 
        'FirstName' => $FirstName, 'LastName' => $LastName, 'Email' => $Email, 
        'Country' => $Country, 'State' => $State, 'City' => $City, 
        'Zipcode' => $Zipcode, 'ImagePath' => $ImagePath, 'Bio' => $Bio, 
        'Phone' => $Phone, 'Mobile' => $Mobile);
        $this->update($data, 'InvestorId =' . (int) $id);
    }
    public function deleteInvestorRegistration ($id)
    {
        $this->delete('InvestorId =' . (int) $id);
    }
}