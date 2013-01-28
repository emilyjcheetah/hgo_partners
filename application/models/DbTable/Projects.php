<?php
class Application_Model_DbTable_Projects extends Zend_Db_Table_Abstract
{
    protected $_name = 'projects';
    protected $_id = 'ProjectId';
    public function getProjects ($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('ProjectId = ' . $id);
        if (! $row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }
    public function addProjects ($ProjectName, $UserRegistrationId, $Description, 
    $Goal_Investment, $Purpose, $Category, $StartDate, $EndDate, 
    $AmountCollected, $Students, $ThankyouVideoPath, $ThankyouMessage, 
    $ThankyouImagePath, $SuccessVideoPath, $SuccessImagePath, $SuccessMessage, 
    $Planb, $SchoolGrade, $SchoolRegId)
    {
        $data = array('ProjectName' => $ProjectName, 
        'UserRegistrationId' => $UserRegistrationId, 
        'Description' => $Description, 'Goal_Investment' => $Goal_Investment, 
        'Purpose' => $Purpose, 'Category' => $Category, 
        'StartDate' => $StartDate, 'EndDate' => $EndDate, 
        'AmountCollected' => $AmountCollected, 'Students' => $Students, 
        'ThankyouVideoPath' => $ThankyouVideoPath, 
        'ThankyouMessage' => $ThankyouMessage, 
        'ThankyouImagePath' => $ThankyouImagePath, 
        'SuccessVideoPath' => $SuccessVideoPath, 
        'SuccessImagePath' => $SuccessImagePath, 
        'SuccessMessage' => $SuccessMessage, 'Planb' => $Planb, 
        'SchoolRegId' => $SchoolRegId, 'SchoolGrade' => $SchoolGrade);
        $this->insert($data);
    }
    public function updateProjects ($id, $ProjectName, $UserRegistrationId, 
    $Description, $Goal_Investment, $Purpose, $Category, $StartDate, $EndDate, 
    $AmountCollected, $Students, $ThankyouVideoPath, $ThankyouMessage, 
    $ThankyouImagePath, $SuccessVideoPath, $SuccessImagePath, $SuccessMessage, 
    $Planb, $SchoolGrade, $SchoolRegId)
    {
        $data = array('ProjectName' => $ProjectName, 
        'UserRegistrationId' => $UserRegistrationId, 
        'Description' => $Description, 'Goal_Investment' => $Goal_Investment, 
        'Purpose' => $Purpose, 'Category' => $Category, 
        'StartDate' => $StartDate, 'EndDate' => $EndDate, 
        'AmountCollected' => $AmountCollected, 'Students' => $Students, 
        'ThankyouVideoPath' => $ThankyouVideoPath, 
        'ThankyouMessage' => $ThankyouMessage, 
        'ThankyouImagePath' => $ThankyouImagePath, 
        'SuccessVideoPath' => $SuccessVideoPath, 
        'SuccessImagePath' => $SuccessImagePath, 
        'SuccessMessage' => $SuccessMessage, 'Planb' => $Planb, 
        'SchoolRegId' => $SchoolRegId, 'SchoolGrade' => $SchoolGrade);
        $this->update($data, 'ProjectId =' . (int) $id);
    }
    public function deleteProjects ($id)
    {
        if ($id != "") {
            $this->delete('ProjectId =' . (int) $id);
        }
    }
    public function topProjects ()
    {
        $select = $this->_db->select()
            ->from(array('tp'=>'topprojects'), array('ProjectId', 'TotalAmount'))
            ->join(array('p'=>'projects'),'tp.ProjectId=p.ProjectId',array('ProjectName'))
            ->join(array('s'=>'schoolregistration'),'p.SchoolRegId=s.RegistrationId',array('ContactFirstName'))
            ->join(array('sc'=>'schoollist'),'s.SchoolId=sc.SchoolId',array('SchoolName'))
            ->where('p.Status=?', 'open')
            ->order('TotalAmount DESC')
            ->limit(5, 0);
        $ret = $this->getAdapter()->fetchAll($select);
        if (count($ret) < 1) {
            $select = $this->_db->select()
                ->from(array('p'=>'projects'), 
            array('ProjectId', 'TotalAmount' => 'AmountCollected','ProjectName'))
            ->join(array('s'=>'schoolregistration'),'p.SchoolRegId=s.RegistrationId',array('ContactFirstName'))
            ->join(array('sc'=>'schoollist'),'s.SchoolId=sc.SchoolId',array('SchoolName'))
                ->where('p.Status=?', 'open')
                ->order('TotalAmount DESC')
                ->limit(5, 0);
            $ret = $this->getAdapter()->fetchAll($select);
        }
        return $ret;
    }
    function topClosingProjects ()
    {
        $select = $this->_db->select()
            ->from('projects', 
        array('ProjectId', 'TotalAmount' => 'AmountCollected', 'EndDate'))
            ->where('Status=?', 'open')
            ->order(array('EndDate DESC', 'TotalAmount DESC'))
            ->limit(5, 0);
        $ret = $this->getAdapter()->fetchAll($select);
        return $ret;
    }
    public function getProjectList ()
    {
        $select = $this->_db->select()->from('projects', 
        array('key' => 'ProjectId', 'value' => 'ProjectName'));
        $ret = $this->getAdapter()->fetchPairs($select);
        return $ret;
    }
    public function getProjectCategory ()
    {
        $select = $this->_db->select()->from('projectcategory', 
        array('key' => 'CategoryName', 'value' => 'CategoryName'));
        $ret = $this->getAdapter()->fetchPairs($select);
        return $ret;
    }
    public function UserProjectsList ($rid)
    {
    	$select = $this->_db->select()
    	->from('projects')
    			->where('UserRegistrationId=?', $rid)
    			->order(array('ProjectName ASC'));
    			
    	$ret = $this->getAdapter()->fetchAll($select);
    	return $ret;
    }
    
    public function pendingProjectsList ()
    {
    	$select = $this->_db->select()
    	->from('projects')
    	->where('Status=?', 'pending')
    	->order(array('ProjectName ASC'));
    	 
    	$ret = $this->getAdapter()->fetchAll($select);
    	return $ret;
    }

 public function SearchProjects ($key,$val)
    {
    	 
    	$select = $this->_db->select()
    	->from(array('p'=>'projects'))
    			->join(array('s'=>'schoolregistration'),'p.SchoolRegId=s.RegistrationId',array('ContactFirstName'))
    			->join(array('sc'=>'schoollist'),'s.SchoolId=sc.SchoolId',array('SchoolName'))
    			->where($key.'=?', $val)
    			->order('ProjectName ASC');
    			
    			    	$ret = $this->getAdapter()->fetchAll($select);
    	 
    	return $ret;
    }
    
    public function SearchProjects_school ($val)
    {
    
    	$select = $this->_db->select()
    	->from(array('p'=>'projects'))
    	->join(array('s'=>'schoolregistration'),'p.SchoolRegId=s.RegistrationId',array('ContactFirstName'))
    	->join(array('sc'=>'schoollist'),'s.SchoolId=sc.SchoolId',array('SchoolName'))
    	->where('sc.SchoolName = ?', $val)
    	->order('ProjectName ASC');
    	 
    	 
    	$ret = $this->getAdapter()->fetchAll($select);
    
    	return $ret;
    }
}