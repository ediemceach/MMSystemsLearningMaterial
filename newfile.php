<?php

interface classDataGetter{
    
    
    
    public function getFirstName(): ?string;
    
    public function getSurname(): ?string;
  
    public function getTitle(): string;
    
    public function getPrice():int|float;
    
    public function getDiscount(): int|float;
    
    public function getplayLenght(): int|float;
    

    
}


class ShopProduct implements classDataGetter
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
    
    public function getPrice(): int|float
    {
        return $this->price;
    }
    
    public function getTitle(): string
    {
        return $this->title;
    }
    
    public function getDiscount(): int|float
    {
        return $this->discount;
    }
    
    public function getplayLenght(): int|float
    {
        return $this->playLenght;
    }
    
    public function numPages(): int|float
    {
        return $this->numPages;
    }
    
}
    class CDProduct extends ShopProduct implements classdataGetter 
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
        
    }

    class BookProduct extends ShopProduct implements classdataGetter
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
        
    }

?>

