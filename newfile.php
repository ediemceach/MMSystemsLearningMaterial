<?php
class AddressManager {
    private $addresses = ["209.131.36.159", "216.58.213.174"];
    public function outputAddress($resolve)
    {
foreach ($this->addresses as $address) {
print $address;
if ($resolve) {
print " (" . gethostbyaddr($address) . ")";
            }
print "\n";
        }
    }
}

$xml = simplexml_load_file("settings.xml");

$resolve = (bool) $xml->resolvedomains;
$manager = new AddressManager();
$manager->outputAddress($resolve);


?>