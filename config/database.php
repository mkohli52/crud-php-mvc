<?php
$servername = "127.0.0.1";  
$username = "root";
$password = "";
$dbname = "mohit-crud";

try{
    $db = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8",$username,$password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}catch(PDOException $e){
    die("Connection failed: " . $e->getMessage());
}

return $db;

?>