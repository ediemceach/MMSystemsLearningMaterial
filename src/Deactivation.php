<?php


namespace PDEV;

class Deactivation {
    
    public static function deactivate() {
        echo "<p> iskljucen plagin </p>";
        $line = readline();
        echo "You pressed Enter.\n";
    }
}