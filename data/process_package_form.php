<?php

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $package_nom = trim($_POST['package_nom']);
    $package_description = trim($_POST['package_description']);
    $auteur_nom = trim($_POST['auteur_nom']); 



    if (empty($package_nom) || empty($package_description) || empty($auteur_nom)) {
        echo "Package name, description , and author are required.";
        exit;
    }

    try {
        $con = getConnection();

      
        $con->beginTransaction();


        $sql = "INSERT INTO packages (nom, description) VALUES (:nom, :description)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':nom', $package_nom, PDO::PARAM_STR);
        $stmt->bindParam(':description', $package_description, PDO::PARAM_STR);
        $stmt->execute();

        
        $sql = "INSERT INTO auteur_package (auteur_nom, package_nom) VALUES (:auteur_nom, :package_nom)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':auteur_nom', $auteur_nom, PDO::PARAM_STR);
        $stmt->bindParam(':package_nom', $package_nom, PDO::PARAM_STR);
        $stmt->execute();


        $con->commit();
        header("Location: http://localhost/echchabli-hamza-sql/pages/add.php?success=true");
        exit;
    } catch (PDOException $e) {
        
        header("Location: http://localhost/echchabli-hamza-sql/pages/add.php?success=true");
        exit;
    }
} else {
    echo "Invalid request.";
}
?>
