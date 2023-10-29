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

trait priceCalculator {
    private static float $tax = 0.20; // 20% tax rate
    private static float $discount = 0.10; // 10% discount rate
    
    public static function calculateTax(float $price): float {
        return self::$tax * $price;
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
        return $this->summary;
    }
    
    public function getTax(): float {
        return self::calculateTax($this->getPrice());
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

$product = new ShopProduct("Product", "Author", "John Doe", 29.99);
echo $product->getTax(); // Output: 6.0 (20% tax on $29.99)

$cdProduct = new CDProduct("CD Title", "Artist", "Jane Doe", 14.99, 60);
$bookProduct = new BookProduct("Book Title", "Author", "John Doe", 29.99, 300);

echo "Tax for CD Product: " . $cdProduct->calculateTax($cdProduct->getPrice()) . "\n";
echo "Tax for Book Product: " . $bookProduct->calculateTax($bookProduct->getPrice()) . "\n";?>