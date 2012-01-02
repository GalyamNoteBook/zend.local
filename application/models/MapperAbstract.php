<?php

abstract class Application_Model_MapperAbstract
{
    protected $_dbTableName;
    protected $_dbTable;
    
    /**
     * Сделал Марат Фахреев
     * @param string $dbTable Имя Модели 
     * @return Application_Model_MapperAbstract 
     */
    public function setDbTable($dbTable)
    {
        if (is_string($dbTable))
        {
            $dbTable = new $dbTable;
        }
        if (!($dbTable instanceof Zend_Db_Table_Abstract))
        {
            throw new Exception('Invalid table data gateway provided');
        }
        
        $this->_dbTable = $dbTable;
        return $this;
    }
    
    /**
     *
     * @return Zend_Db_Table_Abstract
     */
    public function getDbTable()
    {        
        if (null === $this->_dbTable)
        {            
            $this->setDbTable('Application_Model_DbTable_' . ucfirst($this->_dbTableName));
        }
        return $this->_dbTable;
    }
    
    /**
     *
     * @param int $id идентификатор записи
     * @return Application_Model 
     */
    public function find($id)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result))
        {
            return null;
        }
        $row = $result->current();
        $model_className = "Application_Model_".ucfirst($this->_dbTableName);
        $customer = new $model_className($row->toArray());
        return $customer;
    }
    
    /**
     *
     * @return Array_Application_Model массив заполненных Application_Model
     */
    public function findAll()
    {        
        return $this->fetchResults($this->getDbTable()->fetchAll());        
    }
    
    /**
     * Приватный метод
     * @param Array $resultSet fetchAll()
     * @return Array_Application_Model массив заполненных Application_Model
     */
    protected function fetchResults($resultSet)
    {
        $entries = array();
        $model_className = "Application_Model_" . ucfirst($this->_dbTableName);
        foreach ($resultSet as $row)
        {            
            $entries[] = new $model_className($row->toArray());
        }        
        return $entries;
    }
}

