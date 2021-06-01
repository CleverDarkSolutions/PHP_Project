<?php 

class Product {
    public $id;
    public $name;
    public $price;
    public $storeQuantity;

    function __construct($id,$name,$price, $quantity)
    {
        $this -> id = $id;
        $this -> name = $name;
        $this -> price = $price;
        $this -> storeQuantity = $quantity;
    }

    public function getId(){
        return $this -> id;
    }

    public function getName(){
        return $this -> name;
    }

    public function getPrice(){
        return $this -> price;
    }

    public function getStoreQuantity(){
        return $this ->storeQuantity;
    }

    public function getUserQuantity(){
        return $this->userQuantity;
    }

    public function setUserQuantity($arg){
        $this -> userQuantity = $arg;
    }
}


?>