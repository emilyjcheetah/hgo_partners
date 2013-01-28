<?php
/**
 * Dictionary
 *  
 * @author Dell
 * @version 
 */

class Application_Model_DbTable_Dictionary extends Zend_Db_Table_Abstract
{
    /**
     * The default table name
     */
    protected $_name = 'dictionary';
    protected $_id = 'DictionaryId';
    
    public function getDictionary($key,$langid)
    {
        
        $langid =(int)$langid;
       
        $bugs =  $this->select()->where('Key2 = ?',$key)
       							 ->where('LanguageId = ?',$langid);
       							
      							 
        
        
        $result = $this->fetchRow($bugs);
         
       
        
       
        
        return $result;
    }
    
    
}
