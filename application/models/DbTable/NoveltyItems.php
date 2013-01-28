<?php
class Application_Model_DbTable_NoveltyItems extends Zend_Db_Table_Abstract
{
    protected $_name = 'noveltyitems';
    protected $_id = 'NoveltyId';
    public function getNoveltyItems ($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('NoveltyId = ' . $id);
        if (! $row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }
    public function addNoveltyItems ($Name, $Title, $Description, $Price, 
    $ImagePath)
    {
        $data = array('Name' => $Name, 'Title' => $Title, 
        'Description' => $Description, 'Price' => $Price, 
        'ImagePath' => $ImagePath);
        $this->insert($data);
    }
    public function updateNoveltyItems ($id,$Name, $Title, $Description, $Price, 
    $ImagePath)
    {
        $data = array('Name' => $Name, 'Title' => $Title, 
        'Description' => $Description, 'Price' => $Price, 
        'ImagePath' => $ImagePath);
        $this->update($data, 'NoveltyId =' . (int) $id);
    }
    public function deleteNoveltyItems ($id)
    {
        $this->delete('NoveltyId =' . (int) $id);
    }
}