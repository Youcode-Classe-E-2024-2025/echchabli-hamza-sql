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



if (isset($_GET['action']) && $_GET['action'] === 'getAuteur') {
    

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
        
        $con = getConnection();
        
       
        $sql = "SELECT nom FROM auteurs";
        
        
        $stmt = $con->query($sql);
        
      
        $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $authors;  
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}






if (isset($_GET['action']) && $_GET['action'] === 'getPackages') {
    

    try {
       
        $result = getPackages();

       echo json_encode(['success' => true, 'data' => $result]);

        header('Content-Type: application/json');
        
    } catch (Exception $e) {
        
        header('Content-Type: application/json', true, 500);

        echo json_encode(['success' => false, 'message' => $e->getMessage()]);

    }

    exit; 

}


function getPackages(): array {
    try {

        $con = getConnection();
        
        
        $sql = "SELECT nom FROM packages";
        

        $stmt = $con->query($sql);
        

        $packages = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        return $packages;  
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return ['none'];
    }
}


?>
