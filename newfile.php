<?php
class ShopProduct {

    
    public function __construct(
       public $title,
        public $author_sur_name="",
        public $author_first_name="",
        public $price=0)
    {

    }
    
    public function NameSurname(){
        return $this->author_first_name . " " . $this->author_sur_name;
    }
    
    public function TitlePrice(){
        return  $this->title . " price " .  $this->price;
    }
}


class ProductWriter {
    
    public function write(ShopProduct $ShopProduct)
    {
      $str=$ShopProduct->title . " : " . $ShopProduct->NameSurname() . " price: " . $ShopProduct->price;
      print $str;
    }
    
}

class wrong{
    
}

$book1= new ShopProduct("Book One","Edis", "Mekic");
$book2= new ShopProduct(price:10, title:"Proba");

$writer= new ProductWriter();
$writer->write($book2);


?>