<?php
class ShopProduct {
    public function __construct(
        private string $title,
        private string $authorSurName = "",
        private string $authorFirstName = "",
        protected int|float $price = 0
        ) {
    }
    
    private int|float $discount;
    
    public function getFirstName(): string {
        return $this->authorFirstName;
    }
    
    public function getSurname(): string {
        return  $this->authorSurName;
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
    

public function getPrice(): int|float {
return $this->price;
}
    
    public function getSummary(): string {
        $base =
        "Ime autora: {$this->authorFirstName} Prezime Autora: {$this->author_sur_name}\n" .
        "Naslov dela: {$this->title}" .
        "Cena: {$this->price}\n";
        return $base;
    }
}

class CdProduct extends ShopProduct {
    public int $play_length = 0;
    
    public function __construct(
        string $title,
        string $authorSurName = "",
        string $authorFirstName = "",
        float $price = 0,
        int $playLength = 0
        ) {
            parent::__construct($title, $authorSurName, $authorFirstName, $price);
            $this->play_length = $play_length;
    }
    
    public function getPlayLength(): int {
        return $this->playLength;
    }
}

class BookProduct extends ShopProduct {
    public int $numPages = 0;
    
    public function __construct(
        string $title,
        string $author_sur_name = "",
        string $author_first_name = "",
        float $price = 0,
        int $numPages = 0
        ) {
            parent::__construct($title, $authorSurname, $authorFirstName, $price);
            $this->num_pages = $numPages;
    }
    
    public function getNumberPages(): int {
        return $this->numPages;
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
    
    
    public function printgetDiscount(ShopProduct $ShopProduct): string {
        $discountedPrice = $ShopProduct->getPrice() - ($ShopProduct->getPrice() * $ShopProduct->getDiscount());

        return $discountedPrice;
    }
    
    

    

    
    
}










?>