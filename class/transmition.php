<?php
class Transmition {
    public static function fetchGET() {
        if(isset($_GET['id'])) return $_GET['id'];
        else return 0;
    }

    public static function fetchPOST(string $name) {
        if(isset($_POST[$name])) return $_POST[$name];
    }
     
    public static function setPOST() {

    }
}

?>