<?php

class Application_Model_Hotel
{
    protected $_id;
    protected $_title;   
    
    /**
     *
     * Конструктор
     * @param array $options Параметры для создания объекта
     */
    public function __construct(array $options = null)
    {        
        if (is_array($options))
        {
            $this->setOptions($options);
        }
    }
 
    public function __set($name, $value)
    {
        $method = 'set' . ucfirst($name);
        if (!method_exists($this, $method))
        {
            throw new Exception('Invalid property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . ucfirst($name);
        if (!method_exists($this, $method))
        {
            throw new Exception('Invalid property');
        }
        return $this->$method();
    }
 
    public function setOptions(array $options)
    {        
        $methods = get_class_methods($this);        
        foreach ($options as $key => $value)
        {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods))
            {                
                $this->$method($value);
            }
        }
        return $this;
    }
 
     
    public function setTitle($email)
    {
        $this->_title = (string)$email;
        return $this;
    }
 
    public function getTitle()
    {
        return $this->_title;
    }      
    
    public function setId($id)
    {
        $this->_id = (int) $id;
        return $this;
    }
 
    public function getId()
    {
        return $this->_id;
    }
}

