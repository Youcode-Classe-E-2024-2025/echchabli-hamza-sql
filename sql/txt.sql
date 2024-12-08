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


INSERT INTO versions (numero_version, date_publication, package_nom) VALUES
('1.0', '2021-01-01', 'Vue'),
('1.1', '2021-03-01', 'Vue'),
('2.0', '2022-01-15', 'Vue');


INSERT INTO versions (numero_version, date_publication, package_nom) VALUES
('4.0', '2018-05-20', 'D3.js'),
('5.0', '2019-06-01', 'D3.js'),
('6.0', '2020-08-10', 'D3.js');


INSERT INTO versions (numero_version, date_publication, package_nom) VALUES
('7.0', '2019-05-30', 'Babel'),
('7.1', '2020-06-10', 'Babel'),
('8.0', '2021-01-20', 'Babel');


INSERT INTO versions (numero_version, date_publication, package_nom) VALUES
('10.0', '2020-02-14', 'Preact'),
('10.1', '2020-04-01', 'Preact'),
('11.0', '2021-02-25', 'Preact');


INSERT INTO versions (numero_version, date_publication, package_nom) VALUES
('1.0', '2019-07-15', 'Chakra UI'),
('1.1', '2020-01-10', 'Chakra UI'),
('1.2', '2021-05-20', 'Chakra UI');


INSERT INTO versions (numero_version, date_publication, package_nom) VALUES
('26.0', '2020-08-11', 'Jest'),
('26.1', '2020-10-05', 'Jest'),
('27.0', '2021-03-22', 'Jest');


INSERT INTO versions (numero_version, date_publication, package_nom) VALUES
('4.0', '2014-04-01', 'Express'),
('4.1', '2015-06-25', 'Express'),
('4.2', '2016-09-15', 'Express');
