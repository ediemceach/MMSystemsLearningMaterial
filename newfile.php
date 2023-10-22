<?php

interface ClassDataGetter {
    public function getFirstName(): ?string;
    public function getSurname(): ?string;
    public function getTitle(): string;
    public function getPrice(): int|float;
    public function getDiscount(): int|float;
    public function getPlayLength(): int|float;
    public function getNumPages(): int|float;
    public function getSummary(): string;
}

interface IdentityObject{
    public function generateID(): string;
}

trait PriceUtilities {
    private static int $taxrate = 20;
    
    // Changed to a static method and added $price parameter
    public static function calculateTax(float $price): float
    {
        // Use self:: to access static property
        return ((self::$taxrate / 100) * $price);
    }
}

trait TaxTools{
    public function calculateTax():float
    {
        return 222;
    }
}

trait IdentityTrait
{
    public function generateID(): string{
        return uniqid();
    }
}

class ShopProduct implements ClassDataGetter, IdentityObject {
    
    use PriceUtilities;
    use IdentityTrait;
    use TaxTools {TaxTools::calculateTax insteadof PriceUtilities;}
    
    private int|float $discount;
    protected int|float $playLength;
    protected int|float $numPages;
    protected string $summary;
    protected ?string $authorSurName;
    protected ?string $authorFirstName;
    protected int|float $price;
    
    
    public function __construct(
        private string $title,
        ?string $authorSurName = null,
        ?string $authorFirstName = null,
        int|float $price = 0
        ) {
            $this->authorSurName = $authorSurName;
            $this->authorFirstName = $authorFirstName;
            $this->price = $price;
    }
    
    public function getFirstName(): ?string {
        return $this->authorFirstName;
    }
    
    public function getSurname(): ?string {
        return $this->authorSurName;
    }
    
    public function getPrice(): int|float {
        return $this->price;
    }
    
    public function getTitle(): string {
        return $this->title;
    }
    
    public function getDiscount(): int|float {
        return $this->discount;
    }
    
    public function getPlayLength(): int|float {
        return $this->playLength;
    }
    
    public function getNumPages(): int|float {
        return $this->numPages;
    }
    
    public function getSummary(): string {
        return $this->getSummary();
    }
    

}

class CDProduct extends ShopProduct {
    public function __construct(
        string $title,
        ?string $authorSurName = null,
        ?string $authorFirstName = null,
        float $price = 0,
        int $playLength = 0
        ) {
            parent::__construct($title, $authorSurName, $authorFirstName, $price);
            $this->playLength = $playLength;
    }
    
    public function getSummary(): string {
        $base =
        "Author's First Name: {$this->getFirstName()} Author's Last Name: {$this->getSurname()}\n" .
        "Title: {$this->getTitle()}\n" .
        "Price: {$this->getPrice()}\n" .
        "Length: {$this->getPlayLength()}\n";
        return $base;
    }
}

class BookProduct extends ShopProduct {
    public function __construct(
        string $title,
        ?string $authorSurName = null,
        ?string $authorFirstName = null,
        float $price = 0,
        int $numPages = 0
        ) {
            parent::__construct($title, $authorSurName, $authorFirstName, $price);
            $this->numPages = $numPages;
    }
    
    public function getSummary(): string {
        $base =
        "Author's First Name: {$this->getFirstName()} Author's Last Name: {$this->getSurname()}\n" .
        "Title: {$this->getTitle()}\n" .
        "Price: {$this->getPrice()}\n" .
        "Number pages: {$this->getNumPages()}\n";
        return $base;
    }
}

class ShopProductPrinter  {
    protected array $products = [];
    
    public function addProduct(ShopProduct $shopProduct): void
    {
        $this->products[] = $shopProduct;
    }
    
    public function printFirstName(ShopProduct $product): string
    {
        $base ="Author name: {$product->getFirstName()} \n";
        return $base;
    }
    
    public function printSurname(ShopProduct $product): ?string
    {
        return $product->getSurname();
    }
    
    public function printPrice(ShopProduct $product): int|float
    {
        return $product->getPrice();
    }
    
    public function printTitle(ShopProduct $product): string
    {
        return $product->getTitle();
    }
    
    public function printDiscount(ShopProduct $product): int|float
    {
        return $product->getDiscount();
    }
    
    public function printPlayLength(ShopProduct $product): int|float
    {
        return $product->getPlayLength();
    }
    
    public function printNumPages(ShopProduct $product): int|float
    {
        return $product->getNumPages();
    }
    
    public function printSummary(ShopProduct $product): string
    {
        return $product->getNumPages();
    }
}

abstract class Service {
    // Dodata nova abstraktnq klasa usluge
}

class UtilityService extends Service {
    use PriceUtilities;
}

// Usage example
echo UtilityService::calculateTax(100) . "\n";



?>
