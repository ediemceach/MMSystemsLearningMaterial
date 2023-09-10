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
    
    public function write():string
    {
        $base="tekst {$this->title} \n";
        $base="Ime autora{$this->author_first_name} Prezime Autora: {$this->author_sur_name}\n";
        $base="Cena{$this->price}";
        return $base;
    }
}



class CdProduct extends ShopProduct {
    public function playLenght():int
    {
        return $this->play_lenght;
    }
    
    public function write():string
    {
    $base="tekst {$this->title} \n";
    $base="Ime autora{$this->author_first_name} Prezime Autora: {$this->author_sur_name}\n";
    $base="Duzina reprodukcije {$this->play_lenght} Cena{$this->price}";
    return $base;
    }
}

class BookProduct extends ShopProduct
{
 public function numberPages():int{
        return $this->num_pages;
         }
         
        
             public function write():string
             {
                 $base="tekst {$this->title} \n";
                 $base="Ime autora{$this->author_first_name} Prezime Autora: {$this->author_sur_name}\n";
                 $base="Broj strana {$this->num_pages} Cena{$this->price}";
                 return $base;
             }
         
}




?>