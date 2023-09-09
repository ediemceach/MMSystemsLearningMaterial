<?php
class Storage{
    public function add(string $key, $value){
        //ovakva funkcija radi nesto sa promenljivim key i value koji moraju biti stringovi
    }
    
    public function add1(string $kew, mixed $valuse){
        //ova funkcija ogranicava key na string, dok je value tipa mixed(tj. moze biti array, bool, callable, int, float, null, object, resource, or string
        
    }
    
    public function Union(string $key, string|bool $value){
        
        //value je na ovakav nacin ogranicen na string ili boolean
        
    }
    
    public function Union(string $key, string|bool|null $value){
        
        //value je na ovakav nacin ogranicen na string ili boolean, ali i na null vrednost
        
    }
    
    public setShopProduct(ShopProduct|null $product){
        
    }
}


?>