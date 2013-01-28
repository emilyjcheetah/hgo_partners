<?php
class Application_Model_DbTable_UserRegistration extends Zend_Db_Table_Abstract
{
    protected $_name = 'registration';
    protected $_id = 'RegisterId';
    public function getUserRegistration ($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('RegisterId = ' . $id);
        if (! $row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }
    public function addUserRegistration ($UserId, $Password, $FirstName, 
    $LastName, $Email, $Type, $Country, $State, $City, $ZipCode, 
    $SchoolRegistrationId, $Phone, $Mobile, $AccessCode,$uimage)
    {
        $data = array('UserId' => $UserId, 'Password' => $Password, 
        'FirstName' => $FirstName, 'LastName' => $LastName, 'Email' => $Email, 
        'Type' => $Type, 'Country' => $Country, 'State' => $State, 
        'City' => $City, 'Zipcode' => $ZipCode, 
        'SchoolRegistrationId' => $SchoolRegistrationId, 'Phone' => $Phone, 
        'Mobile' => $Mobile, 'AccessCode' => $AccessCode,'ImagePath'=>$uimage,'Status'=>'inactive');
        $this->insert($data);
    }
    public function updateUserRegistration ($id,$UserId, $Password, $FirstName, 
    $LastName, $Email, $Type, $Country, $State, $City, $ZipCode, 
    $SchoolRegistrationId, $Phone, $Mobile, $AccessCode)
    {
        $data = array('UserId' => $UserId, 'Password' => $Password, 
        'FirstName' => $FirstName, 'LastName' => $LastName, 'Email' => $Email, 
        'Type' => $Type, 'Country' => $Country, 'State' => $State, 
        'City' => $City, 'Zipcode' => $ZipCode, 
        'SchoolRegistrationId' => $SchoolRegistrationId, 'Phone' => $Phone, 
        'Mobile' => $Mobile, 'AccessCode' => $AccessCode);
        $this->update($data, 'RegisterID =' . (int) $id);
    }
    public function deleteUserRegistration ($id)
    {
        $this->delete('RegisterID =' . (int) $id);
    }
    public function getSchoolList3 ()
    {
        $select = $this->_db->select()
            ->from(array('r' => 'schoolregistration'), array('RegistrationId'))
            ->join(array('s' => 'schoollist'), 's.SchoolId = r.SchoolId', 
        array('schoolname'));
        $ret = $this->getAdapter()->fetchPairs($select);
        return $ret;
    }
}
?>