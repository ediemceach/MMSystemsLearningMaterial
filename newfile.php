<?php

class ShopProduct
{
    public function __construct(
        private string $title,
        private ?string $authorSurName = null,
        private ?string $authorFirstName = null,
        protected int|float $price = 0
        ) {
    }
    
    private int|float $discount;
    
    public function getFirstName(): ?string
    {
        return $this->authorFirstName;
    }
    
    public function getSurname(): ?string
    {
        return $this->authorSurName;
    }
    
    public function setDiscount(int|float $num)
    {
        $this->discount = $num;
    }
    
    public function getDiscount(): int|float
    {
        return $this->discount;
    }
    
    public function getTitle(): string
    {
        return $this->title;
    }
    
    public function getPrice(): int|float
    {
        return $this->price;
    }
}

class CdProduct extends ShopProduct
{
    public int $playLength = 0;
    
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
    
    public function getPlayLength(): int
    {
        return $this->playLength;
    }
}

class BookProduct extends ShopProduct
{
    public int $numPages = 0;
    
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
    
    public function getNumberPages(): int
    {
        return $this->numPages;
    }
}

abstract class ShopProductWriter
{
    protected array $products = [];
    
    public function addProduct(ShopProduct $shopProduct): void
    {
        $this->products[] = $shopProduct;
    }
    
    abstract public function printName(ShopProduct $product): string;
    abstract public function printSurname(ShopProduct $product): string;
    abstract public function printNameSurname(ShopProduct $product): string;
    abstract public function printPlayLength(ShopProduct $product): int;
    abstract public function printNumberPages(ShopProduct $product): int;
    abstract public function printDiscountedPrice(ShopProduct $product): float;
    abstract public function printSummary(ShopProduct $product): string;
    abstract public function printXML(): void;
}

class ConcreteShopProductWriter extends ShopProductWriter
{
    public function printName(ShopProduct $product): string
    {
        // Implementation
        return $product->getFirstName();
    }
    
    public function printSurname(ShopProduct $product): string
    {
        // Implementation
        return $product->getSurname();
    }
    
    public function printNameSurname(ShopProduct $product): string
    {
        // Implementation
        return "Author's First Name: " . $product->getFirstName() . "; Author's Last Name: " . $product->getSurname() . " \n";
    }
    
    public function printPlayLength(ShopProduct $product): int
    {
        // Implementation
        return $product->getPlayLength();
    }
    
    public function printNumberPages(ShopProduct $product): int
    {
        // Implementation
        return $product->getNumberPages();
    }
    
    public function printDiscountedPrice(ShopProduct $product): float
    {
        // Implementation
        $discountedPrice = $product->getPrice() - ($product->getPrice() * $product->getDiscount());
        return $discountedPrice;
    }
    
    public function printSummary(ShopProduct $product): string
    {
        // Implementation
        $base =
        "Author's First Name: {$product->getFirstName()} Author's Last Name: {$product->getSurname()}\n" .
        "Title: {$product->getTitle()}" .
        "Price: {$product->getPrice()}\n";
        return $base;
    }
    
    public function printXML(): void
    {
        $writer = new \XMLWriter();
        $writer->openMemory();
        $writer->startDocument('1.0', 'UTF-8');
        $writer->startElement("products");
        
        foreach ($this->products as $shopProduct) {
            $writer->startElement("product");
            $writer->writeAttribute("title", $shopProduct->getTitle());
            $writer->startElement("summary");
            $writer->text($this->printSummary($shopProduct));
            $writer->endElement();
            $writer->endElement();
        }
        
        $writer->endElement();
        $writer->endDocument();
        
        // Save the XML to a file (adjust the file path as needed)
        $xmlFilePath = 'products.xml';
        file_put_contents($xmlFilePath, $writer->flush());
        
        echo "XML file created successfully at: $xmlFilePath";
    }
}

// Instantiate the concrete class
$shopProductWriter = new ConcreteShopProductWriter();

// Fetch all data from the products table
function fetchAllProductData()
{
    try {
        // Create a PDO database connection
        $db = new PDO('sqlite:shopproduct.db');
        
        // Define the SQL query to fetch all product data
        $query = "SELECT * FROM products";
        
        // Prepare the SQL statement
        $statement = $db->prepare($query);
        
        // Execute the query
        $statement->execute();
        
        // Fetch all results as an associative array
        $productDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        // Close the database connection
        $db = null;
        
        return $productDataList;
    } catch (PDOException $e) {
        // Handle any database connection errors
        echo "Error: " . $e->getMessage();
        return false; // Or handle the error in a way that makes sense for your application
    }
}

// Fetch all product data
$productDataList = fetchAllProductData();

// Check if data is fetched successfully
if ($productDataList) {
    foreach ($productDataList as $productData) {
        // Determine the product type
        $productType = $productData['type'];
        
        // Create an instance based on the product type
        if ($productType === 'book') {
            $product = new BookProduct(
                $productData['title'],
                $productData['surname'],
                $productData['name'],
                $productData['price'],
                $productData['numpages']
                );
            // Set additional properties specific to BookProduct
            $product->setDiscount($productData['discount']);
        } elseif ($productType === 'cd') {
            $product = new CdProduct(
                $productData['title'],
                $productData['surname'],
                $productData['name'],
                $productData['price'],
                $productData['playlength']
                );
            // Set additional properties specific to CdProduct
            // (if any, for now, CdProduct doesn't have additional properties)
        } else {
            // Handle unknown product type
            echo "Unknown product type: $productType";
            continue;
        }
        
        // Add the product to the ShopProductWriter's products array
        $shopProductWriter->addProduct($product);
    }
    
    // Print XML for all products
    $shopProductWriter->printXML();
} else {
    echo "No products found in the database.";
}
?>

