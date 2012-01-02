<?php

class Application_Model_HotelMapper extends Application_Model_MapperAbstract
{
    protected $_dbTableName = "Hotel";        
    
    /**
     * Сохраняет данные
     * @param Application_Model_Hotel $hotel 
     */
    public function save(Application_Model_Hotel $hotel)
    {
        $data = array(
            'title'   => $hotel->getTitle(),
            'description' => $hotel->getDescription(),            
        );
 
        if (null === ($id = $hotel->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }
    
    /**
     *
     * @return Array_Application_Model_Hotel массив заполненных Application_Model_Hotel
     */
    /*public function findAll() {
        return parent::findAll();
    }*/
    
    
    /**
     *
     * @param int $id идентификатор записи
     * @return Application_Model_Hotel 
     */
    public function find($id) {
        return parent::find($id);
    }
    
}

