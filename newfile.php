<?php
class ShopProduct {
    public $title;
    public $author_sur_name;
    public $author_first_name;
    public $price;
    
    public function __construct(
        $title,
        $author_sur_name,
        $author_first_name,
        $price)
    {
        $this->title=$title;
        $this->author_sur_name=$author_sur_name;
        $this->author_first_name=$author_first_name;
        $this->price=$price;
    }
    
    public function NameSurname(){
        return $this->author_first_name . " " . $this->author_sur_name;
    }
    
    public function TitlePrice(){
        return  $this->title . " price " .  $this->price;
    }
}

$book1= new ShopProduct("Book One", "Doe", "John", 19.99);
$book2= new ShopProduct("Book Two", "Smith", "Jane", 25);



print "author: {$book1->NameSurname()}";
print "Title: {$book1->TitlePrice()}";
print "author: {$book2->NameSurname()}";
print "Title: {$book2->TitlePrice()}";
?>