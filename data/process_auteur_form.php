<?php
include("connection.php");

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form inputs
    $auteur_nom = trim($_POST['auteur_nom']);
    $auteur_email = trim($_POST['auteur_email']);

    // Validate input (basic example)
    if (empty($auteur_nom) || empty($auteur_email)) {
        echo "Both name and email are required.";
        exit;
    }

    // Insert into database
    try {
        $con = getConnection();

        // Insert query
        $sql = "INSERT INTO auteurs (nom, email) VALUES (:nom, :email)";

        // Prepare statement
        $stmt = $con->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':nom', $auteur_nom, PDO::PARAM_STR);
        $stmt->bindParam(':email', $auteur_email, PDO::PARAM_STR);

        // Execute the query
        $stmt->execute();

        echo "Author information inserted successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
