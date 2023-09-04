<?php
class ShopProduct {
    public $title="title";
    public $author_sur_name="surname";
    public $author_first_name="name";
    public $price=0;
    
    public function NameSurname(){
        return $this->author_first_name . " " . $this->author_sur_name;
    }
    
    public function TitlePrice(){
        return  $this->title . " price " .  $this->price;
    }
}

$book1= new ShopProduct();
$book1->title = "Book One";
$book1->author_sur_name = "Doe";
$book1->author_first_name = "John";
$book1->price = 19.99;

$book2= new ShopProduct();
$book2->title="Book two";
$book2->author_sur_name = "Smith";
$book2->author_first_name = "Jane";
$book2->price = 29.99;

print "author: {$book1->NameSurname()}";
print "Title: {$book1->TitlePrice()}";
?>