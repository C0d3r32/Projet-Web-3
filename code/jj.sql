DROP TABLE IF EXISTS episode_realisateur;
DROP TABLE IF EXISTS saison_acteur;
DROP TABLE IF EXISTS serie_tag;
DROP TABLE IF EXISTS episode;
DROP TABLE IF EXISTS saison;
DROP TABLE IF EXISTS realisateur;
DROP TABLE IF EXISTS acteur;
DROP TABLE IF EXISTS tag;


-- Table des séries
CREATE TABLE serie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL
);

-- Table des tags
CREATE TABLE tag (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

-- Table d'association série-tag (car une série peut avoir plusieurs tags)
CREATE TABLE serie_tag (
    id_serie INT NOT NULL,
    id_tag INT NOT NULL,
    PRIMARY KEY (id_serie, id_tag),
    FOREIGN KEY (id_serie) REFERENCES serie(id) ON DELETE CASCADE,
    FOREIGN KEY (id_tag) REFERENCES tag(id) ON DELETE CASCADE
);

-- Table des saisons
CREATE TABLE saison (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero INT NOT NULL,
    affiche VARCHAR(255),
    id_serie INT NOT NULL,
    FOREIGN KEY (id_serie) REFERENCES serie(id) ON DELETE CASCADE
);

-- Table des acteurs
CREATE TABLE acteur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    photo VARCHAR(255)
);

-- Table d'association saison-acteur (car plusieurs acteurs par saison)
CREATE TABLE saison_acteur (
    id_saison INT NOT NULL,
    id_acteur INT NOT NULL,
    PRIMARY KEY (id_saison, id_acteur),
    FOREIGN KEY (id_saison) REFERENCES saison(id) ON DELETE CASCADE,
    FOREIGN KEY (id_acteur) REFERENCES acteur(id) ON DELETE CASCADE
);

-- Table des réalisateurs
CREATE TABLE realisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    photo VARCHAR(255)
);

-- Table des épisodes
CREATE TABLE episode (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero INT NOT NULL,
    titre VARCHAR(255) NOT NULL,
    synopsis TEXT,
    duree INT, -- durée en minutes
    id_saison INT NOT NULL,
    FOREIGN KEY (id_saison) REFERENCES saison(id) ON DELETE CASCADE
);

-- Table d'association épisode-réalisateur (car plusieurs réalisateurs possibles par épisode)
CREATE TABLE episode_realisateur (
    id_episode INT NOT NULL,
    id_realisateur INT NOT NULL,
    PRIMARY KEY (id_episode, id_realisateur),
    FOREIGN KEY (id_episode) REFERENCES episode(id) ON DELETE CASCADE,
    FOREIGN KEY (id_realisateur) REFERENCES realisateur(id) ON DELETE CASCADE
);
