<?php


$host = 'localhost'; 
     
$dbname = 'jspackages';    
$user = 'root';  
$password = ''; 

function getConnection() {
    global $host, $dbname,  $user, $password;

    try {
        // MySQL DSN
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

        // Create PDO instance
        $pdo = new PDO($dsn, $user, $password);

        // Set error mode
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $pdo; 
    } catch (PDOException $e) {
        // Handle connection error
        echo "Database connection failed: " . $e->getMessage();
        return null; 
    }
}

?>
