<?php
class ShopProduct {

    
    public function __construct(
       public string $title,
        public string $author_sur_name="",
        public string $author_first_name="",
        public string $product_type="",
    public int $num_pages=0,
    public int  $play_lenght=0,
    public float $price=0)
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
    
    public function write(ShopProduct $product): string {
        $base = "{$product->title} ({$product->author_first_name}, {$product->author_sur_name})";
        
        if ($product->product_type === "book") {
        $base .= " Number of pages: {$product->num_pages}";
        } elseif ($product->product_type === "cd") {
            $base .= " Play length: {$product->play_lenght}";
        }
        
        $base .= " Price: {$product->price}";  
        return $base;
    }
}

$book1 = new ShopProduct("Book One", "Edis", "Mekic", "book", 25, 0, 10);
$book2 = new ShopProduct("Book Two", "John", "Doe", "cd", 0, 60, 15);

$writer = new ProductWriter();

// Printing book1's information
echo $writer->write($book1);

// Printing book2's information
echo $writer->write($book2);


?>