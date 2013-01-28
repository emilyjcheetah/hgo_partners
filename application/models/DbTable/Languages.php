<?php
class Application_Model_DbTable_Languages extends Zend_Db_Table_Abstract
{
    protected $_name = 'languages';
    protected $_id = array('LanguageId','Name');
}