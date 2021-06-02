<?php 

class Product {
    public $id;
    public $name;
    public $price;
    public $storeQuantity;
    public $image;

    function __construct($id,$name,$price, $quantity, $image)
    {
        $this -> id = $id;
        $this -> name = $name;
        $this -> price = $price;
        $this -> storeQuantity = $quantity;
        $this -> image = $image;
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

    public function getImage(){
        return $this -> image;
    }
}


?>