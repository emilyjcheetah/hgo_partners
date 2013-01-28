<?php
class Application_Model_DbTable_SchoolRegistration extends Zend_Db_Table_Abstract
{
    protected $_name = 'schoolregistration';
    protected $_id = 'registrationid';
    public function getSchoolRegistration ($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('registrationid = ' . $id);
        if (! $row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }
    public function addSchoolRegistration ($UserId, $Password, $ContactFirstName, 
    $ContactLastName, $PhoneOffice, $PhoneHome, $Mobile, $Email, $Address, 
    $SchoolId, $Description)
    {
        $data = array('UserId' => $UserId, 'Password' => $Password, 
        'ContactFirstName' => $ContactFirstName, 
        'ContactLastName' => $ContactLastName, 'PhoneOffice' => $PhoneOffice, 
        'PhoneHome' => $PhoneHome, 'Mobile' => $Mobile, 'Email' => $Email, 
        'Address' => $Address, 'SchoolId' => $SchoolId, 
        'Description' => $Description);
        
        $this->insert($data);
    }
    public function updateSchoolRegistration2 ($id, $userid, $passwd, $FN, $LN)
    {
        $data = array('UserId' => $userid, 'Password' => $passwd, 
        'ContactFirstName' => $FN, 'ContactLastName' => $LN);
        $this->update($data, 'registrationid =' . (int) $id);
    }
    public function updateSchoolRegistration ($id,$Password, $ContactFirstName, 
    $ContactLastName, $PhoneOffice, $PhoneHome, $Mobile, $Email, $Address, 
    $AccessCode, $Latitude, $Longitude, $Description)
    {
        $data = array('Password' => $Password, 
        'ContactFirstName' => $ContactFirstName, 
        'ContactLastName' => $ContactLastName, 'PhoneOffice' => $PhoneOffice, 
        'PhoneHome' => $PhoneHome, 'Mobile' => $Mobile, 'Email' => $Email, 
        'Address' => $Address, 'AccessCode' => $AccessCode, 
        'Latitude' => $Latitude, 'Longitude' => $Longitude, 
        'Description' => $Description);
        $this->update($data, 'RegistrationId =' . (int) $id);
    }
    public function deleteSchoolRegistration ($id)
    {
        $this->delete('registrationid =' . (int) $id);
    }
    public function getSchoolList ()
    {
        
        $select = $this->_db->select()->from(array('s' => 'schoollist'), 
        array('key' => 'SchoolId', 'value' => 'SchoolName'));
       
        		
       
        $ret = $this->getAdapter()->fetchPairs($select);
        
        return $ret;
    }
    
    public function getSchoolList2 ()
    {
    	$sub=$this->_db->select()->from(array('s' => 'schoolregistration'),
    			array('SchoolId'));
    
    	$select = $this->_db->select()->from(array('s' => 'schoollist'),
    			array('key' => 'SchoolId', 'value' => 'SchoolName'))
    			->setIntegrityCheck(false)
    			->where("s.SchoolId not in ($sub)");
    
    	 
    	$ret = $this->getAdapter()->fetchPairs($select);
    
    	return $ret;
    } 
    
    public function PendingSchoolList()
    {
        
      $select = $this->_db->select()->from(array('s' => 'schoolregistration'))
      								->join(array('sl' => 'schoollist'),'s.SchoolId = sl.SchoolId',array('SchoolName')) 
      								->order('sl.SchoolName')
      								->where('s.Status=?','pending'); 
      $ret = $this->getAdapter()->fetchAll($select);
      return $ret;
    
    }
}

