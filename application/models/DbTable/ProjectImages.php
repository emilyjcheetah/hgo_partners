<?php
class Application_Model_DbTable_ProjectImages extends Zend_Db_Table_Abstract
{
    protected $_name = 'projectimages';
    protected $_id = 'ProjectImageId';
    public function getProjectImages ($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('ProjectImagesId = ' . $id);
        if (! $row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }
    public function addProjectImages ($ProjectId, $ImagePath)
    {
        $cdate=date("Y-m-d H:i:s");
        $data = array('ProjectId' => $ProjectId, 'ImagePath' => $ImagePath,'CreateDate'=>$cdate);
        $this->insert($data);
    }
    public function updateProjectImages ($id,$ProjectId, $ImagePath)
    {
        $data = array('ProjectId' => $ProjectId, 'ImagePath' => $ImagePath);
        $this->update($data, 'ProjectImageId =' . (int) $id);
    }
    public function deleteProjectImages ($id)
    {
        $this->delete('ProjectImageId =' . (int) $id);
    }
}