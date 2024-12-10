<?php
// Include database connection
include("connection.php");

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form inputs
    $version_number = trim($_POST['version_number']);
    $package_nom = trim($_POST['package_nom']);

    $release_date = trim($_POST['release_date']);

    // Validate inputs (basic example)
    if (empty($version_number) || empty($package_nom) || empty($release_date)) {
        echo "Version number, package name, and release date are required.";
        exit;
    }

    // Insert into database
    try {
        $con = getConnection();

        // Insert query
        $sql = "INSERT INTO versions (numero_version, date_publication, package_nom) 
                VALUES (:numero_version, :date_publication, :package_nom)";

        // Prepare statement
        $stmt = $con->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':numero_version', $version_number, PDO::PARAM_STR);
        $stmt->bindParam(':date_publication', $release_date, PDO::PARAM_STR);
        $stmt->bindParam(':package_nom', $package_nom, PDO::PARAM_STR);
        
        $stmt->execute();

        header("Location: http://localhost/echchabli-hamza-sql/pages/add.php?success=true");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
