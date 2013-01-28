<?php 

class Application_Model_DbTable_Feedback extends Zend_Db_Table_Abstract
{

   protected $_name = 'feedback';
   protected $_id = 'FeedBackId';
    
    
	public function getFeedback($id)
	{
		$id = (int)$id;
		$row = $this->fetchRow('FeedBackId = ' . $id);
		if (!$row) {
			throw new Exception("Could not find row $id");
		}
		return $row->toArray();
	}
	
	public function addFeedback($FirstName, $LastName, $Email, $Feedback)
	{
		$data = array(
		'FirstName' => $FirstName,
		'LastName' => $LastName,
		'Email' => $Email,
		'FeedBack' => $Feedback
		);
		$this->insert($data);
			
	}
	
	public function updateFeedback($FirstName, $LastName, $Email, $Feedback)
	{
		$data = array(
		'FirstName' => $FirstName,
		'LastName' => $LastName,
		'Email' => $Email,
		'FeedBack' => $Feedback
		);		
		$this->update($data, 'FeedBackId =' . (int)$id);
	}
	
	public function deleteFeedback($id)
	{
		$this->delete('FeedBackId =' . (int)$id);		
	}
	
	

}

?>