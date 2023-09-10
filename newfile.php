<?php
class ShopProduct {

    
    public function __construct(
       public string $title,
        public string $author_sur_name="",
        public string $author_first_name="",
        public float $price=0)
    {

    }
    
    public function NameSurname(){
        return $this->author_first_name . " " . $this->author_sur_name;
    }
    
    public function TitlePrice(){
        return  $this->title . " price " .  $this->price;
    }
    
    public function write():string
    {
        $base="tekst {$this->title} \n" .
        $base="Ime autora :{$this->author_first_name} Prezime Autora: {$this->author_sur_name}\n" .
        $base="Cena{$this->price}\n";
        return $base;
    }
}



class CdProduct extends ShopProduct {
    
    public function __construct(
        public string $title,
        public string $author_sur_name="",
        public string $author_first_name="",
        public float $price=0,
        public int $play_lenght=0)
    {
        
    }
    
    public function playLenght():int
    {
        return $this->play_lenght;
    }
    
    public function write():string
    {
    $base=parent::write() . 
    "Duzina reprodukcije {$this->play_lenght} \n\n";
    return $base;
    }
}

class BookProduct extends ShopProduct{
    
    public function __construct(
        public string $title,
        public string $author_sur_name="",
        public string $author_first_name="",
        public float $price=0,
        public int $num_pages=0)
    {
        
    }
    
 public function numberPages():int{
        return $this->num_pages;
         }
         
        
             public function write():string
             {
                 $base=parent::write() .
                "Broj strana {$this->num_pages} \n\n" ;
                 return $base;
             }
         
}

$book1 = new BookProduct("Book One", "Edis", "Mekic", 10.99, 250);
$book2 = new BookProduct("Book Two", "John", "Doe", 15.99, 320);
$book3 = new ShopProduct("Book One", "Edis", "Mekic", 10.99, 250);


$cd1 = new CdProduct("CD One", "Artist", "LastName", 12.49, 60);


echo $cd1->write();
echo $book1->write();






?>