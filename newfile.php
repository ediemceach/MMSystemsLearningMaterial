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

$book1= new ShopProduct("Book One");
$book2= new ShopProduct(price:10, title:"Proba");



print "author: {$book1->NameSurname()}";
print "Title: {$book1->TitlePrice()}";
print "author: {$book2->NameSurname()}";
print "Title: {$book2->TitlePrice()}";
?>