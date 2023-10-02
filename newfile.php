<?php
class ShopProduct {
    public function __construct(
        private string $title,
        private ?string $authorSurName = null,
        private ?string $authorFirstName = null,
        protected int|float $price = 0
        ) {
    }
    
    private int|float $discount;
    
    public function getFirstName(): ?string {
        return $this->authorFirstName;
    }
    
    public function getSurname(): ?string {
        return $this->authorSurName;
    }
    
    public function setDiscount(int|float $num) {
        $this->discount = $num;
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
}

class CdProduct extends ShopProduct {
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
    
    public function getPlayLength(): int {
        return $this->playLength;
    }
}

class BookProduct extends ShopProduct {
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
    
    public function getNumberPages(): int {
        return $this->numPages;
    }
}

abstract class ShopProductWriter {
    protected array $products = [];
    
    public function addProduct(ShopProduct $shopProduct): void {
        $this->products[] = $shopProduct;
    }
    
    abstract public function printName(ShopProduct $product): string;
    abstract public function printSurname(ShopProduct $product): string;
    abstract public function printNameSurname(ShopProduct $product): string;
}

class XMLWriter extends ShopProductWriter {
    public function write(): void {
        $writer = new \XMLWriter();
        $writer->openMemory();
        $writer->startDocument('1.0', 'UTF-8');
        $writer->startElement("products");
        
        foreach ($this->products as $shopProduct) {
            $writer->startElement("product");
            $writer->writeAttribute("title", $shopProduct->getTitle());
            $writer->startElement("summary");
            $writer->text($shopProduct->getSurname());
            $writer->endElement(); // summary
            $writer->endElement(); // product
        }
        
        $writer->endElement(); // products
        $writer->endDocument();
        print $writer->flush();
    }
}


    
    function fetchProductData($productId) {
        try {
            // Create a PDO database connection
            $db = new PDO('sqlite:shopproduct.db');
            
            // Define the SQL query to fetch product data based on the product ID
            $query = "SELECT * FROM products WHERE id = :id";
            
            // Prepare the SQL statement
            $statement = $db->prepare($query);
            
            // Bind the product ID parameter
            $statement->bindParam(':id', $productId, PDO::PARAM_INT);
            
            // Execute the query
            $statement->execute();
            
            // Fetch the result as an associative array
            $productData = $statement->fetch(PDO::FETCH_ASSOC);
            
            // Close the database connection
            $db = null;
            
            return $productData;
        } catch (PDOException $e) {
            // Handle any database connection errors
            echo "Error: " . $e->getMessage();
            return false; // Or handle the error in a way that makes sense for your application
        }
    }


    // Assuming you have an instance of ShopProductWriter
    $shopProductWriter = new Printer();
    
    // Fetch data for the product with ID 1
    $productData = fetchProductData(2);

// Check if data is fetched successfully
if ($productData) {
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
        exit;
    }
    
    // Get the summary
    $summary = $shopProductWriter->printNameSurname($product);
    
    // Output the summary
    echo $summary;
} else {
    echo "Product with ID 1 not found.";
}
?>