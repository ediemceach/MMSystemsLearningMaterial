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
    public function getTax():float;
}

interface IdentityObject{
    public function generateID(): string;
}

trait priceCalculator {
    
    
    
    public function calculateTax(float $price): float {
        return $price;
    }
    
    public function calculateDiscount(float $price): float {
        return $this->discountRate * $price;
    }
}


class ShopProduct implements ClassDataGetter {
    
    use priceCalculator;
    
    protected int|float $playLength;
    protected int|float $numPages;
    protected string $summary;
    protected ?string $authorSurName;
    protected ?string $authorFirstName;
    protected int|float $price;
    protected float $taxRate;
    protected float $discountRate;
    
    public function __construct(
        private string $title,
        ?string $authorSurName = null,
        ?string $authorFirstName = null,
        int|float $price = 0,
        float $taxRate,
        float $discount
        ) {
            $this->title="";
            $this->authorSurName = $authorSurName;
            $this->authorFirstName = $authorFirstName;
            $this->price = $price;
            $this->taxRate=0.20;
            $this->discountRate=0;
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
        return $this->summary;
    }
    
    public function getTax(): float {
        return $this->taxRate;
    }
}

class CDProduct extends ShopProduct {
    
    public function __construct(
        string $title,
        ?string $authorSurName = null,
        ?string $authorFirstName = null,
        float $price = 0,
        int $playLength = 0,
        int $numberOfTracks = 0,
        float $tax = 0.20,
        float $discount = 0.10
        ) {
            parent::__construct($title, $authorSurName, $authorFirstName, $price, $tax, $discount);
            $this->playLength = $playLength;
            $this->numberOfTracks = $numberOfTracks;
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
        int $numPages = 0,
        string $genre = '',
        float $tax = 0.20,
        float $discount = 0.10
        ) {
            parent::__construct($title, $authorSurName, $authorFirstName, $price, $taxRate, $discountRate);
            $this->numPages = $numPages;
            $this->genre = $genre;
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

class ShopProductPrinter {
    protected array $products = [];
    
    public function addProduct(ShopProduct $shopProduct): void {
        $this->products[] = $shopProduct;
    }
    
    public function printFirstName(ShopProduct $product): string {
        $base = "Author name: {$product->getFirstName()} \n";
        return $base;
    }
    
    public function printSurname(ShopProduct $product): ?string {
        return $product->getSurname();
    }
    
    public function printPrice(ShopProduct $product): int|float {
        return $product->getPrice();
    }
    
    public function printTitle(ShopProduct $product): string {
        return $product->getTitle();
    }
    
    public function printDiscount(ShopProduct $product): int|float {
        return $product->getDiscount();
    }
    
    public function printPlayLength(ShopProduct $product): int|float {
        return $product->getPlayLength();
    }
    
    public function printNumPages(ShopProduct $product): int|float {
        return $product->getNumPages();
    }
    
    public function printSummary(ShopProduct $product): string {
        return $product->getSummary();
    }
}

class FinancialDataPrinter {
    use priceCalculator;
    
    public function printTaxValue(ShopProduct $product): void {
        echo "Tax rate: " . ($product->getTax() * 100) . "%\n";
        echo "Tax value for {$product->getTitle()}: " . $this->calculateTax($product->getPrice()) . "\n";
    }
    

}

// Create an instance of FinancialDataPrinter
$financialDataPrinter = new FinancialDataPrinter();

// Create an instance of ShopProduct
$product = new ShopProduct("Product", "Author", "John Doe", 29.99, 0.18, 0.07);

// Print tax information for the product
$financialDataPrinter->printTaxValue($product);


?>