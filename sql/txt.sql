CREATE TABLE auteurs (
   
    nom VARCHAR(255) PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    
);

CREATE TABLE packages (

    nom VARCHAR(255) PRIMARY KEY,
    description TEXT,
    auteur_nom VARCHAR(255),
    FOREIGN KEY (auteur_nom) REFERENCES auteurs(nom)
);

CREATE TABLE versions (
    id INT AUTO_INCREMENT PRIMARY KEY ,
    numero_version VARCHAR(50) NOT NULL,
    date_publication DATE NOT NULL,
    package_nom VARCHAR(255),
    FOREIGN KEY (package_nom) REFERENCES packages(nom)
);


INSERT INTO auteurs (nom, email) VALUES 
('Brendan Eich', 'brendan.eich@mozilla.com'),
('Ryan Dahl', 'ryan.dahl@deno.land'),
('Evan You', 'evan.you@vuejs.org'),
('Rich Harris', 'rich.harris@svelte.dev'),
('Jordan Walke', 'jordan.walke@react.dev');

INSERT INTO packages (nom, description, auteur_nom) VALUES
('Vue', 'Framework progressif pour construire des interfaces utilisateur.', 'Evan You'),
('D3.js', 'Bibliothèque JavaScript pour produire des visualisations de données.', 'Ryan Dahl'),
('Babel', 'Compilateur JavaScript moderne.', 'Brendan Eich'),
('Preact', 'Bibliothèque JavaScript rapide avec une API similaire à React.', 'Jordan Walke'),
('Chakra UI', 'Bibliothèque de composants React accessibles et modifiables.', 'Ryan Dahl'),
('Jest', 'Framework de test JavaScript.', 'Ryan Dahl'),
('Express', 'Framework minimaliste pour les applications Node.js.', 'Ryan Dahl'),

