INSERT INTO serie (titre) VALUES ('Severance');
INSERT INTO tag (nom) VALUES ('Science-fiction'), ('Thriller');


INSERT INTO serie_tag (id_serie, id_tag)
SELECT s.id, t.id
FROM serie s, tag t
WHERE s.titre = 'Severance' AND t.nom = 'Science-fiction';

INSERT INTO serie_tag (id_serie, id_tag)
SELECT s.id, t.id
FROM serie s, tag t
WHERE s.titre = 'Severance' AND t.nom = 'Thriller';



INSERT INTO saison (numero, affiche, id_serie)
VALUES 
(1, 'https://m.media-amazon.com/images/I/713HILcikjL._AC_SL1500_.jpg', (SELECT id FROM serie WHERE titre = 'Severance')),
(2, 'https://fr.web.img3.acsta.net/img/f3/61/f361e09d400dc55b194a7a58c00556c1.jpg', (SELECT id FROM serie WHERE titre = 'Severance'));


INSERT INTO acteur (nom, photo) VALUES
('Adam Scott', 'https://encrypted-tbn1.gstatic.com/licensed-image?q=tbn:ANd9GcRB1O7Rwy2CBfS9mARo2CSpO7VJyBd5xEAtYrcc-xZeFDdDXNNSlN4QPDKH2SUKwM_mDqCXEzTxbBX3LSk'),
('Britt Lower','https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQfV8GBYEDsWl6XMfKou5JKMCJl5VmGOwxSdmTEESA0TO_aJR5c9LIsUl7iyjcNZktnbXoTubu3pOzw9TqaIYB8YA'),
('Sarah Bock','https://encrypted-tbn0.gstatic.com/licensed-image?q=tbn:ANd9GcS8a24B6gowQLSvmWkEMxtOf5gfYCTlU_6DqNGG2TQ__8YVH4XGe5M1-ImptkP-Nqz1SLCQu7lRtcfIWzg');

-- Acteur adam dans s1 et s2
INSERT INTO saison_acteur (id_saison, id_acteur)
SELECT s.id, a.id
FROM saison s, acteur a
WHERE s.numero = 1 AND s.id_serie = (SELECT id FROM serie WHERE titre = 'Severance')
  AND a.nom = 'Adam Scott';

INSERT INTO saison_acteur (id_saison, id_acteur)
SELECT s.id, a.id
FROM saison s, acteur a
WHERE s.numero = 2 AND s.id_serie = (SELECT id FROM serie WHERE titre = 'Severance')
  AND a.nom = 'Adam Scott';

-- actrice Britt Lower dans s1 et s2
INSERT INTO saison_acteur (id_saison, id_acteur)
SELECT s.id, a.id
FROM saison s, acteur a
WHERE s.numero = 1 AND s.id_serie = (SELECT id FROM serie WHERE titre = 'Severance')
  AND a.nom = 'Britt Lower';

INSERT INTO saison_acteur (id_saison, id_acteur)
SELECT s.id, a.id
FROM saison s, acteur a
WHERE s.numero = 2 AND s.id_serie = (SELECT id FROM serie WHERE titre = 'Severance')
  AND a.nom = 'Britt Lower';


-- actrice Sarah Bock juste dans s2
INSERT INTO saison_acteur (id_saison, id_acteur)
SELECT s.id, a.id
FROM saison s, acteur a
WHERE s.numero = 2 AND s.id_serie = (SELECT id FROM serie WHERE titre = 'Severance')
  AND a.nom = 'Sarah Bock';


INSERT INTO realisateur (nom, photo) VALUES
('Ben Stiller', 'https://encrypted-tbn2.gstatic.com/licensed-image?q=tbn:ANd9GcQUH47X-K9AekCEfyb2S46z4l69zVgfJI9PC9b5arbiV1oAE6VNLdBX95PJ_NpRQUsRT_dTvdeqivz3DBA');


-- Les episodes : 

-- 9 épisodes pour la saison 1
INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 1, 'Good News About Hell', 'Mark commence sa journée de travail en tant que chef d''équipe à Lumon Industries alors qu''une nouvelle recrue rejoint son département.', 57, id
FROM saison WHERE numero = 1 AND id_serie = (SELECT id FROM serie WHERE titre = 'Severance');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 2, 'Half Loop', 'La nouvelle recrue Helly tente de s''adapter à la vie au bureau, tandis que Mark s''occupe de problèmes personnels à l''extérieur.', 55, id 
FROM saison WHERE numero = 1 AND id_serie = (SELECT id FROM serie WHERE titre = 'Severance');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 3, 'In Perpetuity', 'Mark découvre des indices troublants concernant le comportement d''un ancien collègue.', 56, id
FROM saison WHERE numero = 1 AND id_serie = (SELECT id FROM serie WHERE titre = 'Severance');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 4, 'The You You Are', 'L''équipe découvre des informations qui remettent en question leur perception de Lumon Industries.', 54, id
FROM saison WHERE numero = 1 AND id_serie = (SELECT id FROM serie WHERE titre = 'Severance');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 5, 'The Grim Barbarity of Optics and Design', 'La tension monte entre les départements alors que Mark commence à remettre en question l''éthique de la procédure de séparation.', 58, id
FROM saison WHERE numero = 1 AND id_serie = (SELECT id FROM serie WHERE titre = 'Severance');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 6, 'Hide and Seek', 'Le département de Mark se retrouve au centre d''une lutte de pouvoir au sein de Lumon.', 53, id
FROM saison WHERE numero = 1 AND id_serie = (SELECT id FROM serie WHERE titre = 'Severance');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 7, 'Defiant Jazz', 'Les employés découvrent une méthode pour communiquer entre leurs versions internes et externes.', 56, id
FROM saison WHERE numero = 1 AND id_serie = (SELECT id FROM serie WHERE titre = 'Severance');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 8, 'What''s for Dinner?', 'Mark est confronté à des révélations troublantes concernant sa vie personnelle et professionnelle.', 55, id
FROM saison WHERE numero = 1 AND id_serie = (SELECT id FROM serie WHERE titre = 'Severance');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 9, 'The We We Are', 'Saison finale: les employés tentent une manœuvre risquée pour révéler la vérité sur Lumon Industries.', 60, id
FROM saison WHERE numero = 1 AND id_serie = (SELECT id FROM serie WHERE titre = 'Severance');

-- 10 épisodes pour la saison 2
INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 1, 'The Passenger', 'Suite aux événements de la finale de la saison 1, Mark et ses collègues font face aux conséquences de leurs découvertes.', 58, id
FROM saison WHERE numero = 2 AND id_serie = (SELECT id FROM serie WHERE titre = 'Severance');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 2, 'Mirrors', 'De nouvelles procédures sont mises en place à Lumon alors que les employés tentent de s''adapter à leur nouvelle réalité.', 57, id
FROM saison WHERE numero = 2 AND id_serie = (SELECT id FROM serie WHERE titre = 'Severance');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 3, 'The Labyrinth', 'L''équipe explore des zones inconnues de Lumon et découvre des informations troublantes sur la véritable nature de l''entreprise.', 59, id
FROM saison WHERE numero = 2 AND id_serie = (SELECT id FROM serie WHERE titre = 'Severance');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 4, 'Outside In', 'Mark tente de réconcilier ses deux vies alors que les barrières entre elles commencent à s''effondrer.', 56, id
FROM saison WHERE numero = 2 AND id_serie = (SELECT id FROM serie WHERE titre = 'Severance');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 5, 'The Board', 'Des révélations sur les dirigeants de Lumon viennent bouleverser les croyances des employés.', 60, id
FROM saison WHERE numero = 2 AND id_serie = (SELECT id FROM serie WHERE titre = 'Severance');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 6, 'Memory Lane', 'Des fragments de souvenirs refont surface, remettant en question l''efficacité de la procédure de séparation.', 58, id
FROM saison WHERE numero = 2 AND id_serie = (SELECT id FROM serie WHERE titre = 'Severance');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 7, 'The Founders', 'L''histoire de la création de Lumon Industries est révélée, expliquant les motivations derrière la procédure de séparation.', 61, id
FROM saison WHERE numero = 2 AND id_serie = (SELECT id FROM serie WHERE titre = 'Severance');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 8, 'Convergence', 'Les vies intérieures et extérieures des employés commencent à converger de manière inattendue.', 57, id
FROM saison WHERE numero = 2 AND id_serie = (SELECT id FROM serie WHERE titre = 'Severance');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 9, 'Breaking Through', 'Les employés tentent une manœuvre désespérée pour briser définitivement la barrière entre leurs deux vies.', 59, id
FROM saison WHERE numero = 2 AND id_serie = (SELECT id FROM serie WHERE titre = 'Severance');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 10, 'Integration', 'Finale de la saison 2: les conséquences de la fusion des identités sont explorées alors que Lumon fait face à une crise existentielle.', 65, id
FROM saison WHERE numero = 2 AND id_serie = (SELECT id FROM serie WHERE titre = 'Severance');




-- Realisateur des episodes 

-- Associer Ben Stiller comme réalisateur pour certains épisodes
INSERT INTO episode_realisateur (id_episode, id_realisateur)
SELECT e.id, r.id
FROM episode e, realisateur r
WHERE e.id_saison IN (SELECT id FROM saison WHERE numero IN (1, 2) AND id_serie = (SELECT id FROM serie WHERE titre = 'Severance'))
  AND r.nom = 'Ben Stiller';