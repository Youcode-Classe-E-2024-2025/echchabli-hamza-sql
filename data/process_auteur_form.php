<?php
include("connection.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $auteur_nom = trim($_POST['auteur_nom']);
    $auteur_email = trim($_POST['auteur_email']);


    if (empty($auteur_nom) || empty($auteur_email)) {
        echo "Both name and email are required.";
        exit;
    }


    try {
        $con = getConnection();


        $sql = "INSERT INTO auteurs (nom, email) VALUES (:nom, :email)";


        $stmt = $con->prepare($sql);


        $stmt->bindParam(':nom', $auteur_nom, PDO::PARAM_STR);
        $stmt->bindParam(':email', $auteur_email, PDO::PARAM_STR);

        
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
