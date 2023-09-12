<?php
class ShopProduct {
    public function __construct(
        private string $title,
        private string $author_sur_name = "",
        private string $author_first_name = "",
        protected int|float $price = 0
        ) {
    }
    
    private int|float $discount;
    
    public function getName(): string {
        return $this->author_first_name;
    }
    
    public function getSurname(): string {
        return  $this->author_sur_name;
    }
    
    public function setDiscount(int|float $num) {
        return $this->discount = $num;
    }
    
    public function getDiscount(): int|float {
        return $this->discount;
    }
    
    public function getTitle(): string {
        return $this->title;
    }
    

public function getPrice(): string {
return $this->price;
}
    
    public function getSummary(): string {
        $base =
        "Ime autora: {$this->author_first_name} Prezime Autora: {$this->author_sur_name}\n" .
        "Naslov dela: {$this->title}" .
        "Cena: {$this->price}\n";
        return $base;
    }
}

class CdProduct extends ShopProduct {
    public int $play_length = 0;
    
    public function __construct(
        string $title,
        string $author_sur_name = "",
        string $author_first_name = "",
        float $price = 0,
        int $play_length = 0
        ) {
            parent::__construct($title, $author_sur_name, $author_first_name, $price);
            $this->play_length = $play_length;
    }
    
    public function getPlayLength(): int {
        return $this->play_length;
    }
}

class BookProduct extends ShopProduct {
    public int $num_pages = 0;
    
    public function __construct(
        string $title,
        string $author_sur_name = "",
        string $author_first_name = "",
        float $price = 0,
        int $num_pages = 0
        ) {
            parent::__construct($title, $author_sur_name, $author_first_name, $price);
            $this->num_pages = $num_pages;
    }
    
    public function getNumberPages(): int {
        return $this->num_pages;
    }
}




class ShopProductWriter {
    public function printName(ShopProduct $ShopProduct): string {
        $str = $ShopProduct->getName(); // Access the product's name
        return $str;
    }
    
    public function printSurname(ShopProduct $ShopProduct): string {
        $str = $ShopProduct->getSurname(); // Access the product's surname
        return $str;
    }
    
    public function printNameSurname(ShopProduct $ShopProduct): string {
        $str = "Ime autora " . $ShopProduct->getName() . " ; Prezime autora " . $ShopProduct->getSurname() . " \n"; // Access the first product's name and surname
        return $str;
    }
    
    public function printplayLength(CdProduct $CdProduct): int {
        $playLength = $CdProduct->getPlayLength(); // Access the product's play length
        return $playLength;
    }
    
    public function printnumberPages(BookProduct $BookProduct): int {
        $numberPages = $BookProduct->getNumberPages(); // Access the product's play length
        return $numberPages;
    }
    
    
    public function printgetSummary(ShopProduct $ShopProduct): string {
        $discountedPrice = $ShopProduct->getPrice() - ($ShopProduct->getPrice() * $ShopProduct->getDiscount());

        return $discountedPrice;
    }
}

$cdProduct = new CdProduct("CD Title", "Artist Name", "Author Name", 12.99, 60);

$printer = new ShopProductWriter();

$cdProduct->setDiscount(0.10);

echo $printer->printNameSurname($cdProduct);
echo $printer->printName($cdProduct);
echo $printer->printSurname($cdProduct);
echo $printer->printplayLength($cdProduct);
echo $printer->printgetSummary($cdProduct);







?>