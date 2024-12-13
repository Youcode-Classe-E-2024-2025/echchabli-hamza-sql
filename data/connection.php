<?php

$host = 'localhost'; 
$dbname = 'jspacs';    
$user = 'postgres'; 
$port = 5432; 
$password = 'hamza'; 

function getConnection() {
    global $host, $dbname, $port, $user, $password;

    try {
        // PostgreSQL DSN
        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

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

