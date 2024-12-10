<?php

include("connection.php");





function getALL():array{
    try {
       
        $con = getConnection();

        $sql = "SELECT 
    p.nom AS package_name, 
    p.description AS package_description, 
    STRING_AGG(DISTINCT ap.auteur_nom, ', ') AS authors, 
    STRING_AGG(v.numero_version, ', ' ORDER BY v.date_publication) AS versions
FROM 
    packages p
LEFT JOIN 
    auteur_package ap ON p.nom = ap.package_nom
LEFT JOIN 
    versions v ON p.nom = v.package_nom
GROUP BY 
    p.nom, p.description;";

    


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



function getByAuteurOrNom($input): array {
    try {
        $con = getConnection();
        
        // Corrected SQL Query
        $sql = "SELECT 
                    p.nom AS package_name, 
                    p.description AS package_description, 
                    STRING_AGG(DISTINCT ap.auteur_nom, ', ' ORDER BY ap.auteur_nom) AS authors, 
                    STRING_AGG(v.numero_version, ', ' ORDER BY v.date_publication) AS versions
                FROM 
                    packages p
                LEFT JOIN 
                    auteur_package ap ON p.nom = ap.package_nom
                LEFT JOIN 
                    versions v ON p.nom = v.package_nom
                WHERE 
                    p.nom = :input OR ap.auteur_nom = :input
                GROUP BY 
                    p.nom, p.description;";

        // Prepare the SQL statement
        $stmt = $con->prepare($sql);

        // Bind the parameter
        $stmt->bindParam(':input', $input, PDO::PARAM_STR);

        // Execute the query
        $stmt->execute();

        // Fetch the results
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;

    } catch (PDOException $e) {
        // Handle and display errors
        echo "Error: " . $e->getMessage();
        return [];
    }
}



if (isset($_GET['action']) && $_GET['action'] == 'getAuteur') {
    

    try {
       
        $result = getAuteur();

      
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'data' => $result]);
    } catch (Exception $e) {
        
        header('Content-Type: application/json', true, 500);
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }

    exit; 
}


function getAuteur(): array {
    try {
        // Get the database connection
        $con = getConnection();
        
        // SQL query to fetch all author names
        $sql = "SELECT nom FROM auteurs";
        
        // Prepare and execute the query
        $stmt = $con->query($sql);
        
        // Fetch all results as an associative array
        $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $authors;  // Return the list of authors
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}


?>
