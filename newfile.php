<?php
class ShopProduct {

    
    public function __construct(
       public string $title,
        public string $author_sur_name="",
        public string $author_first_name="",
        public float $price=0,
        public int $num_pages=0,
        public int $play_lenght=0)
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

class CdProduct extends ShopProduct {
    public function playLenght():int{
        return $this->play_lenght;
        
    }
}

class BookProduct extends ShopProduct{
    public function playLenght():int{
        return $this->num_pages;
        
    }
}

$book1= new ShopProduct("Book One","Edis", "Mekic", "10");
$book2= new ShopProduct(price:10, title:"Proba");

$writer= new ProductWriter();
$writer->write($book2);

print $book1->NameSurname();


?>