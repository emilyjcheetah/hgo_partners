<?php
class Application_Model_DbTable_Projectinvestment extends Zend_Db_Table_Abstract
{
    protected $_name = 'projectinvestment';
    protected $_id = 'InvestmentId';
    
    
    public function totalinvestment($pid)
    {

        $aa = $this->fetchRow(
        		$this->select()
        		->from($this,new Zend_Db_Expr("SUM(InvestmentAmount) as total" ))
        		->where('ProjectId=?', $pid));
        
        return $aa;
    }
    
    public function investorsummary()
    {
        
        $aa = $this->fetchAll(
        		$this->select()
        		->from($this,array('InvestorId',new Zend_Db_Expr("SUM(InvestmentAmount) as total") ))
        		->group('InvestorId'));
        return $aa;
    }
    
    public function schoolinvestorsummary($sid)
    {
    
    	$aa = $this->fetchAll(
    			$this->select()
    			->from($this,array('InvestorId',new Zend_Db_Expr("SUM(InvestmentAmount) as total") ))
    			->where('SchoolRegId=?',$sid)
    			->group('InvestorId'));
    	return $aa;
    }
    
    public function schoolprojectsummary($sid)
    {
    
    	$aa = $this->fetchAll(
    			$this->select()
    			->from($this,array('ProjectId',new Zend_Db_Expr("SUM(InvestmentAmount) as total") ))
    			->where('SchoolRegId=?',$sid)
    			->group('ProjectId'));
    	return $aa;
    }
    
    public function schoolprojectsdetail($sid)
    {
    
    	$aa = $this->fetchAll(
    			$this->select()
    			->from($this,array('ProjectId','InvestorId','InvestmentAmount') )
    			->where('SchoolRegId=?',$sid)
    			->order('ProjectId'));
    	return $aa;
    }
    
    public function investorprojectsdetail($invid)
    {
    
    	
    		$select=$this->_db->select()
    			->from(array('pinv'=>'projectinvestment'),array('ProjectId','InvestmentAmount') )
    			->join(array('p'=>'projects'),'pinv.ProjectId=p.ProjectId')
    			->join(array('s'=>'schoolregistration'),'pinv.SchoolRegId=s.RegistrationId',array('ContactFirstName'))
    			->join(array('sc'=>'schoollist'),'s.SchoolId=sc.SchoolId',array('SchoolName'))
    			->where('pinv.InvestorId=?',$invid)
    			
    			->order('pinv.ProjectId');
    		
    		$ret = $this->getAdapter()->fetchAll($select);
    	return $ret;
    }
}