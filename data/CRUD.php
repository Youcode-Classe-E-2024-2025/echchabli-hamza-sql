<?php

include("connection.php");





function getALL():array{
    try {
       
        $con = getConnection();

        $sql = "SELECT 
    p.nom AS nom, 
    p.description AS descriptionn, 
    p.auteur_nom AS auteur, 
    GROUP_CONCAT(v.numero_version ORDER BY v.date_publication) AS versio
FROM 
    packages p
LEFT JOIN 
    versions v ON p.nom = v.package_nom
GROUP BY 
    p.nom, p.description, p.auteur_nom;
               ";



        $stmt = $con->query($sql);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


        return $results;
    } catch (PDOException $e) {
        
        echo "Error: " . $e->getMessage();
        return [];
    }
    
}


if (isset($_GET['action']) && $_GET['action'] == 'getByAuteurOrNom' && isset($_GET['value'])) {
    $value = $_GET['value'];  

    try {
       
        $result = getByAuteurOrNom($value);

      
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'data' => $result]);
    } catch (Exception $e) {
        
        header('Content-Type: application/json', true, 500);
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }

    exit; 
}


function getByAuteurOrNom($input):array{
    try{
    $con = getConnection();
    $sql  = "SELECT 
    p.nom AS nom, 
    p.description AS descriptionn, 
    p.auteur_nom AS auteur, 
    GROUP_CONCAT(v.numero_version ORDER BY v.date_publication) AS versio
FROM 
    packages p
LEFT JOIN 
    versions v ON p.nom = v.package_nom
WHERE 
    p.nom = :input OR p.auteur_nom = :input
GROUP BY 
    p.nom, p.description, p.auteur_nom;
";

    $stmt = $con->prepare($sql);

    $stmt->bindParam(':input', $input, PDO::PARAM_STR);

        
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $results;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}














?>
