<?php
class ShopProduct {
    public function __construct(
        public string $title,
        public string $author_sur_name = "",
        public string $author_first_name = "",
        public float $price = 0,
        public float $discount = 0 // Specify the type for $discount
        ) {
    }
    
    public function NameSurname(): string {
        return $this->author_first_name . " " . $this->author_sur_name;
    }
    
    public function TitlePrice(): string {
        return $this->title . " price " . $this->price;
    }
    
    public function write(): string {
        $base = "tekst {$this->title} \n" .
        "Ime autora: {$this->author_first_name} Prezime Autora: {$this->author_sur_name}\n" .
        "Cena: {$this->price}\n";
        return $base;
    }
}

class CdProduct extends ShopProduct {
    public int $play_lenght = 0;
    
    public function __construct(
        string $title,
        string $author_sur_name = "",
        string $author_first_name = "",
        float $price = 0,
        int $play_lenght = 0,
        float $discount = 0 // Match the type with the parent class
        ) {
            parent::__construct($title, $author_sur_name, $author_first_name, $price, $discount);
            $this->play_lenght = $play_lenght;
    }
    
    public function playLenght(): int {
        return $this->play_lenght;
    }
    
    public function write(): string {
        $base = parent::write() . "Duzina reprodukcije {$this->play_lenght} \n\n";
        return $base;
    }
    
    public function CenasaPopustom(): float {
        return ($this->price - $this->discount); // Fix variable names
    }
}

class BookProduct extends ShopProduct {
    public int $num_pages = 0;
    
    public function __construct(
        string $title,
        string $author_sur_name = "",
        string $author_first_name = "",
        float $price = 0,
        int $num_pages = 0,
        float $discount = 0 // Match the type with the parent class
        ) {
            parent::__construct($title, $author_sur_name, $author_first_name, $price, $discount);
            $this->num_pages = $num_pages;
    }
    
    public function numberPages(): int {
        return $this->num_pages;
    }
    
    public function write(): string {
        $base = parent::write() . "Broj strana {$this->num_pages} \n\n";
        return $base;
    }
    
    public function CenasaPopustom(): float {
        return ($this->price - $this->discount); // Fix variable names
    }
}

$book1 = new BookProduct("Book One", "Edis", "Mekic", 10.99, 250, 30);
$cd1 = new CdProduct("CD One", "Artist", "LastName", 12.49, 542, 30);

echo $book1->write();
echo $book1->CenasaPopustom();
echo $cd1->CenasaPopustom();



?>