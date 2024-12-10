<?php
// Include database connection
include("connection.php");

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form inputs
    $package_nom = trim($_POST['package_nom']);
    $package_description = trim($_POST['package_description']);
    $auteur_nom = trim($_POST['auteur_nom']); // Get the selected author name

    // Validate input (basic example)
    if (empty($package_nom) || empty($package_description) || empty($auteur_nom)) {
        echo "Package name, description, and author are required.";
        exit;
    }

    try {
        $con = getConnection();

        // Start a transaction to ensure both inserts are successful
        $con->beginTransaction();

        // Insert the package into the `packages` table
        $sql = "INSERT INTO packages (nom, description) VALUES (:nom, :description)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':nom', $package_nom, PDO::PARAM_STR);
        $stmt->bindParam(':description', $package_description, PDO::PARAM_STR);
        $stmt->execute();

        // Insert into the `auteur_package` table to associate the author with the package
        $sql = "INSERT INTO auteur_package (auteur_nom, package_nom) VALUES (:auteur_nom, :package_nom)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':auteur_nom', $auteur_nom, PDO::PARAM_STR);
        $stmt->bindParam(':package_nom', $package_nom, PDO::PARAM_STR);
        $stmt->execute();

        // Commit the transaction
        $con->commit();
        header("Location: http://localhost/echchabli-hamza-sql/pages/add.php?success=true");
        exit;
    } catch (PDOException $e) {
        // Rollback the transaction if an error occurs
        header("Location: http://localhost/echchabli-hamza-sql/pages/add.php?success=true");
        exit;
    }
} else {
    echo "Invalid request.";
}
?>
