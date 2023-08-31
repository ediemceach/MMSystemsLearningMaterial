<?php
class ShopProduct {

}

$book1= new ShopProduct();
$book1->title = "Book One";
$book1->author_main_name = "Doe";
$book1->author_first_name = "John";
$book1->price = 19.99;

$book2= new ShopProduct();
$book2->title="Book two";
$book2->author_main_name = "Smith";
$book2->author_second_name = "Jane";
$book2->price = 29.99;

var_dump($book1);
var_dump($book2);
?>