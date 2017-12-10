<?php
class checkinoutBean {
    
    var $userid;
    var $name;
    var $checktime;
    var $deptname;       

    private $data = [];
    
    public function __set($name, $value)   {
        $this->data[$name] = $value;    
    }

    public function __get($name) {
        if(array_key_exists($name, $this->data)){
            return $this->data[$name];
            return null;
        }
    }
}
?>
