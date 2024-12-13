<?php
include("connection.php");

$conn = getConnection();

try {
    // Check if the 'auteurs' table contains any data
    $stmt = $conn->query("
    SELECT COUNT(*) AS table_count 
    FROM information_schema.tables 
    WHERE table_schema = 'jspacks'
");
$count = $stmt->fetchColumn();

    if ($count == 0) {

        // Run the SQL script if the 'auteurs' table is empty
        $sql = "
        CREATE TABLE IF NOT EXISTS auteurs (
            nom VARCHAR(255) NOT NULL PRIMARY KEY,
            email VARCHAR(255) UNIQUE NOT NULL
        );

        CREATE TABLE IF NOT EXISTS packages (
            nom VARCHAR(255) NOT NULL PRIMARY KEY,
            description TEXT
        );

        CREATE TABLE IF NOT EXISTS auteur_package (
            auteur_nom VARCHAR(255),
            package_nom VARCHAR(255),
            PRIMARY KEY (auteur_nom, package_nom),
            FOREIGN KEY (auteur_nom) REFERENCES auteurs(nom) ON DELETE CASCADE,
            FOREIGN KEY (package_nom) REFERENCES packages(nom) ON DELETE CASCADE
        );

        CREATE TABLE IF NOT EXISTS versions (
            id SERIAL PRIMARY KEY,
            numero_version VARCHAR(50) NOT NULL,
            date_publication DATE NOT NULL,
            package_nom VARCHAR(50),
            FOREIGN KEY (package_nom) REFERENCES packages(nom) ON DELETE CASCADE
        );

        INSERT INTO auteurs (nom, email) VALUES
        ('Dan Abramov', 'dan.abramov@example.com'),
        ('Evan You', 'evan.you@example.com'),
        ('Mike Bostock', 'mike.bostock@example.com'),
        ('TJ Holowaychuk', 'tj.holowaychuk@example.com'),
        ('John Resig', 'john.resig@example.com'),
        ('Tobias Koppers', 'tobias.koppers@example.com')
        ON CONFLICT (nom) DO NOTHING;

        INSERT INTO packages (nom, description) VALUES
        ('React', 'Bibliothèque JavaScript pour créer des interfaces utilisateur.'),
        ('Redux', 'Bibliothèque pour la gestion de létat dans les applications React.'),
        ('Vue', 'Framework progressif pour construire des interfaces utilisateur.'),
        ('Nuxt', 'Framework basé sur Vue.js pour les applications universelles.'),
        ('D3.js', 'Bibliothèque JavaScript pour créer des visualisations de données interactives.'),
        ('Express', 'Framework minimaliste et flexible pour les applications Node.js.'),
        ('jQuery', 'Bibliothèque rapide et concise pour simplifier JavaScript côté client.'),
        ('Webpack', 'Outil pour packager et optimiser des applications JavaScript modernes.'),
        ('Parcel', 'Alternative rapide et facile à Webpack pour packager des applications.')
        ON CONFLICT (nom) DO NOTHING;
        
        INSERT INTO auteur_package (auteur_nom, package_nom) VALUES
('Dan Abramov', 'React'),
('Dan Abramov', 'Redux'),
('Evan You', 'Vue'),
('Evan You', 'Nuxt'),
('Mike Bostock', 'D3.js'),
('TJ Holowaychuk', 'Express'),
('John Resig', 'jQuery'),
('Tobias Koppers', 'Webpack'),
('Tobias Koppers', 'Parcel');



INSERT INTO versions (numero_version, date_publication, package_nom) VALUES
('1.0.0', '2020-01-15', 'React'),
('1.1.0', '2020-03-10', 'React'),
('2.0.0', '2021-06-25', 'React');


INSERT INTO versions (numero_version, date_publication, package_nom) VALUES
('3.0.0', '2019-07-10', 'Redux'),
('3.1.0', '2020-08-22', 'Redux'),
('4.0.0', '2021-11-15', 'Redux');


INSERT INTO versions (numero_version, date_publication, package_nom) VALUES
('2.6.0', '2019-02-05', 'Vue'),
('3.0.0', '2020-09-18', 'Vue'),
('3.2.0', '2021-07-12', 'Vue');


INSERT INTO versions (numero_version, date_publication, package_nom) VALUES
('1.0.0', '2018-12-01', 'Nuxt'),
('2.0.0', '2020-02-15', 'Nuxt'),
('2.14.0', '2021-09-21', 'Nuxt');


INSERT INTO versions (numero_version, date_publication, package_nom) VALUES
('5.0.0', '2019-03-05', 'D3.js'),
('5.12.0', '2020-06-10', 'D3.js'),
('6.0.0', '2021-09-05', 'D3.js');


INSERT INTO versions (numero_version, date_publication, package_nom) VALUES
('4.16.0', '2019-01-22', 'Express'),
('4.17.0', '2020-05-25', 'Express'),
('5.0.0-beta', '2021-11-10', 'Express');


INSERT INTO versions (numero_version, date_publication, package_nom) VALUES
('3.4.1', '2019-05-01', 'jQuery'),
('3.5.0', '2020-04-15', 'jQuery'),
('3.6.0', '2021-08-26', 'jQuery');


INSERT INTO versions (numero_version, date_publication, package_nom) VALUES
('4.44.0', '2019-07-24', 'Webpack'),
('5.0.0', '2020-10-12', 'Webpack'),
('5.52.1', '2021-08-16', 'Webpack');


INSERT INTO versions (numero_version, date_publication, package_nom) VALUES
('1.12.0', '2019-03-20', 'Parcel'),
('2.0.0', '2020-09-15', 'Parcel'),
('2.1.0', '2021-10-11', 'Parcel');

"
;

        // Execute each query in the script
        foreach (explode(";", $sql) as $query) {
            if (trim($query)) {
                $conn->exec($query);
            }
        }

        
    } else {
        echo "Data already exists in 'auteurs'. Skipping SQL execution.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
