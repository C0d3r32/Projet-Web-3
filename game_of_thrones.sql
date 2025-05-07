INSERT INTO serie (titre) VALUES ('Game of Thrones');

INSERT INTO tag (nom) VALUES ('Action'), ('Fantasy'), ('Drame');

INSERT INTO serie_tag (id_serie, id_tag)
SELECT s.id, t.id
FROM serie s
JOIN tag t ON t.nom IN ('Action', 'Fantasy', 'Drame')
WHERE s.titre = 'Game of Thrones';

-- les saisons ( j'ai fais 5 saisons )
INSERT INTO saison (numero, affiche, id_serie)
VALUES 
(1, 'https://m.media-amazon.com/images/I/81Hz0Wus+jL._AC_UF1000,1000_QL80_.jpg', (SELECT id FROM serie WHERE titre = 'Game of Thrones')),
(2, 'https://m.media-amazon.com/images/I/81FGxNcoJoL._AC_UF1000,1000_QL80_.jpg', (SELECT id FROM serie WHERE titre = 'Game of Thrones')),
(3, 'https://m.media-amazon.com/images/I/61FRb+twp-S._AC_UF1000,1000_QL80_.jpg', (SELECT id FROM serie WHERE titre = 'Game of Thrones')),
(4, 'https://fr.web.img4.acsta.net/c_225_300/pictures/14/02/28/00/50/120605.jpg', (SELECT id FROM serie WHERE titre = 'Game of Thrones')),
(5, 'https://m.media-amazon.com/images/I/61C+Sf-crFL._AC_UF894,1000_QL80_.jpg', (SELECT id FROM serie WHERE titre = 'Game of Thrones'));

-- les acteurs
INSERT INTO acteur (nom, photo) VALUES
('Emilia Clarke', 'https://m.media-amazon.com/images/M/MV5BNjg3OTg4MDczMl5BMl5BanBnXkFtZTgwODc0NzUwNjE@._V1_.jpg'),
('Kit Harington', 'https://m.media-amazon.com/images/M/MV5BMTA2NTI0NjYxMTBeQTJeQWpwZ15BbWU3MDIxMjgyNzY@._V1_.jpg'),
('Peter Dinklage', 'https://m.media-amazon.com/images/M/MV5BMTM1MTI5Mzc0MF5BMl5BanBnXkFtZTYwNzgzOTQz._V1_FMjpg_UX1000_.jpg');

-- chaque acteur et ses saisons !!
INSERT INTO saison_acteur (id_saison, id_acteur)
SELECT s.id, a.id
FROM saison s
JOIN acteur a ON a.nom IN ('Emilia Clarke', 'Kit Harington', 'Peter Dinklage')
WHERE s.id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones')
  AND s.numero BETWEEN 1 AND 5;


INSERT INTO realisateur (nom, photo) VALUES
('Alan Taylor', 'https://m.media-amazon.com/images/M/MV5BMGYwMWY3NjctZTg4My00MzRiLThlODQtMTc5OTEzMzI0ZWQwXkEyXkFqcGc@._V1_.jpg'),
('David Nutter', 'https://upload.wikimedia.org/wikipedia/commons/8/8f/David_Nutter_by_Gage_Skidmore_2.jpg'),
('Timothy Van Patten', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqfoCrXYxzjYrmU_66-NW8hAXL8yne0iD0elyoR7_4WDhzzyjxmAQlBKXl73XZSRgvg0m6CKeKQNmomTLqcW7F1A'),
('Brian Kirk', 'https://encrypted-tbn0.gstatic.com/licensed-image?q=tbn:ANd9GcRJIjEg_ivzKlmSrky96DGSTVAy_Qx8a37GolV5DTFYxU7L_HksrudvHmcPlqWVv2nBVSl37DWb9qXKqb4'),
('Daniel Minahan', 'https://encrypted-tbn1.gstatic.com/licensed-image?q=tbn:ANd9GcRj4FuTq7_0_vUgkx2wqfVJprzV1u1EpsY7syP-Zndz0mtHshPYQS6D-0TLCkR4xUho2VjQRPOtvPv5RVs'),
('Michael J. Bassett', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrtH0FUkoNRXYUo2Cu_Wb7kWJk9T89pF_EkMmD9Ti0Kw0jNadAFP_yCREdW2c84xusWN5eRxPq8J9qyC63xpiLdg'),
('Alik Sakharov', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSMKWF93ZsmE9494U6w8H1c0DfUn-Bs3v0JGQo5-6uFs2jdjEb4WvPHvBj8ATYGB2fiz-2QTZI-iuYBRmzl66WSsw'),
('David Petrarca', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcScgb2k6YyXCiRAgOKfrHQiCk0UuoWEvoSJVHishrhat3NnU-vpYdcFY58feufjhHwwHYy_JOSK1LsM-neExnIMSA'),
('Neil Marshall', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTYYm9BA6-6No9VNTDvwX3cdw827LHEkTe91VqDtj_5JTQ_c20ENrzCgnqJbQeHkPHCc6TbXC2FWBgcMSNddR25Jw'),
('D.B. Weiss', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcT70kFUogmkGSZD65x1OeHkidnk64tg9SaNqqP-BfZEeXvlKJkfdwzx7Ui_w7p0T-ypO3-EuFuct3upthsx3_Eb0A'),
('Alex Graves', 'https://encrypted-tbn3.gstatic.com/licensed-image?q=tbn:ANd9GcS_z8NRCrVu_RXgeBzAJthW3XCXIMqkK4_Y2ADDpMkH2I6Fk8f_aLfmma0LYEGaLCY9fkJLurEmcqtpNu4'),
('Michelle MacLaren', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcS9Dbxi-VXiIw-bzGWulfBwalwA4fcrdpXOlrsZXlh6HvvETWkMXdxRjUVxIErJwcIr1KYWDgQWpwKKMMc3egx5jQ'),
('Michael Slovis', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDaU1q7lHmYGKfs_tmSQItndJ8zG-_wq9-mTB5zDrWSQSi_V7YlGgYB5sOBZhVQHVEl5NqH7Q-XKH-I7ILgtu3CA'),
('Mark Mylod', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQtdo7j9jrdczNODIfmzUGZ9nxD--n1g41rjkX2m2s9Dk0QWboWSc8F3yJCQSupMutbGSxHLvBvogYHXZCBO92TA'),
('Jeremy Podeswa', 'https://encrypted-tbn1.gstatic.com/licensed-image?q=tbn:ANd9GcSIiZozcfbA5ALKkwpyuv2Zzb-jWNNEpgX4jH6cdf2kGUEhF8Us0aynmZ30SyWg3kbnURu8pXMhAaevbwc'),
('Miguel Sapochnik', 'https://encrypted-tbn1.gstatic.com/licensed-image?q=tbn:ANd9GcTzPvXm-PTfSfCo72IRo0wfSWgh3rAd1PSO3M7BGc84ZgnImyKD-U8Tl3UKQcbIksr-tjOATt_cI29KrXM');


-- episodes de s1 
INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 1, 'Winter Is Coming', 'Le roi Robert rend visite à son vieil ami Eddard Stark à Winterfell.', 62, id FROM saison WHERE numero = 1 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 2, 'The Kingsroad', 'Bran lutte entre la vie et la mort ; Jon part pour le Mur.', 56, id FROM saison WHERE numero = 1 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 3, 'Lord Snow', 'Eddard arrive à Port-Réal et rejoint le conseil du roi.', 58, id FROM saison WHERE numero = 1 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 4, 'Cripples, Bastards, and Broken Things', 'Tyrion se rend au Mur ; Jon aide Sam à s’intégrer.', 56, id FROM saison WHERE numero = 1 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 5, 'The Wolf and the Lion', 'Ned enquête sur la mort de Jon Arryn ; tensions entre Stark et Lannister.', 55, id FROM saison WHERE numero = 1 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 6, 'A Golden Crown', 'Viserys reçoit une couronne en or fondue ; Ned rend justice.', 53, id FROM saison WHERE numero = 1 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 7, 'You Win or You Die', 'Robert meurt ; Ned confronte Cersei.', 58, id FROM saison WHERE numero = 1 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 8, 'The Pointy End', 'Ned est trahi ; Arya échappe à la capture.', 59, id FROM saison WHERE numero = 1 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 9, 'Baelor', 'Ned est exécuté ; Robb gagne une bataille clé.', 57, id FROM saison WHERE numero = 1 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 10, 'Fire and Blood', 'Daenerys devient la Mère des Dragons.', 60, id FROM saison WHERE numero = 1 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

-- episodes de s2 
INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 1, 'The North Remembers', 'Robb Stark continue sa guerre contre les Lannister ; Stannis revendique le trône.', 53, id FROM saison WHERE numero = 2 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 2, 'The Night Lands', 'Tyrion exerce son pouvoir ; Arya rencontre de nouveaux alliés.', 54, id FROM saison WHERE numero = 2 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 3, 'What Is Dead May Never Die', 'Theon jure fidélité à son père ; Catelyn tente une alliance.', 53, id FROM saison WHERE numero = 2 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 4, 'Garden of Bones', 'Cersei s’oppose à Tyrion ; Daenerys atteint Qarth.', 50, id FROM saison WHERE numero = 2 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 5, 'The Ghost of Harrenhal', 'Renly est tué ; Tyrion découvre les plans de défense.', 55, id FROM saison WHERE numero = 2 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 6, 'The Old Gods and the New', 'Jon découvre un secret au-delà du Mur ; Theon prend Winterfell.', 54, id FROM saison WHERE numero = 2 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 7, 'A Man Without Honor', 'Jaime tue son cousin ; Daenerys perd ses dragons.', 56, id FROM saison WHERE numero = 2 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 8, 'The Prince of Winterfell', 'Stannis approche de Port-Réal ; Theon se prépare à l’attaque.', 55, id FROM saison WHERE numero = 2 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 9, 'Blackwater', 'La flotte de Stannis attaque Port-Réal ; Tyrion mène la défense.', 55, id FROM saison WHERE numero = 2 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 10, 'Valar Morghulis', 'Tyrion est blessé ; Arya s’échappe ; Daenerys explore la Maison des Immortels.', 59, id FROM saison WHERE numero = 2 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

-- episodes de s3 
INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 1, 'Valar Dohaeris', 'Jon rencontre Mance Rayder ; Daenerys recrute une armée.', 55, id FROM saison WHERE numero = 3 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 2, 'Dark Wings, Dark Words', 'Bran rêve de corbeaux ; Arya rencontre la Fraternité.', 57, id FROM saison WHERE numero = 3 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 3, 'Walk of Punishment', 'Daenerys achète des Immaculés ; Tyrion devient maître de la monnaie.', 56, id FROM saison WHERE numero = 3 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 4, 'And Now His Watch Is Ended', 'Les mutins tuent Lord Commandant Mormont ; Daenerys libère les esclaves.', 54, id FROM saison WHERE numero = 3 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 5, 'Kissed by Fire', 'Jon rompt ses vœux ; Jaime révèle son passé.', 57, id FROM saison WHERE numero = 3 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 6, 'The Climb', 'Petyr complote ; Jon grimpe le Mur.', 55, id FROM saison WHERE numero = 3 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 7, 'The Bear and the Maiden Fair', 'Jaime revient sauver Brienne ; Jon et Ygritte poursuivent leur route.', 57, id FROM saison WHERE numero = 3 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 8, 'Second Sons', 'Tyrion épouse Sansa ; Daenerys obtient l’aide des Seconds Fils.', 56, id FROM saison WHERE numero = 3 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 9, 'The Rains of Castamere', 'Le Mariage Rouge ; Robb et Catelyn sont assassinés.', 52, id FROM saison WHERE numero = 3 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 10, 'Mhysa', 'Daenerys est acclamée à Yunkai ; les survivants se réorganisent.', 63, id FROM saison WHERE numero = 3 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

-- episodes de s4 
INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 1, 'Two Swords', 'La guerre pour le trône continue. Tyrion se retrouve face à un procès pour le meurtre de Joffrey.', 59, id FROM saison WHERE numero = 4 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 2, 'The Lion and the Rose', 'Le mariage de Joffrey et Margaery se termine tragiquement. Tyrion est accusé à tort.', 59, id FROM saison WHERE numero = 4 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 3, 'Breaker of Chains', 'Daenerys libère les esclaves de Meereen. Tyrion échappe à l’assassinat.', 58, id FROM saison WHERE numero = 4 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 4, 'Oathkeeper', 'Jaime et Brienne traversent les terres dévastées. Jon est confronté aux hommes libres.', 57, id FROM saison WHERE numero = 4 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 5, 'First of His Name', 'Tommen devient roi. Cersei complote contre Tyrion et Sansa.', 58, id FROM saison WHERE numero = 4 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 6, 'The Laws of Gods and Men', 'Tyrion est jugé. Daenerys lutte pour maintenir son pouvoir à Meereen.', 60, id FROM saison WHERE numero = 4 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 7, 'Mockingbird', 'Petyr Baelish manipule Sansa. Brienne poursuit sa quête de sauver les filles Stark.', 57, id FROM saison WHERE numero = 4 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 8, 'The Mountain and the Viper', 'Oberyn Martell défie la Montagne, avec des conséquences dramatiques.', 59, id FROM saison WHERE numero = 4 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 9, 'The Watchers on the Wall', 'Les membres de la Garde de Nuit défendent le Mur contre les sauvageons.', 60, id FROM saison WHERE numero = 4 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 10, 'The Children', 'Tyrion se venge, et Bran Stark découvre des révélations sur son destin.', 74, id FROM saison WHERE numero = 4 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

-- episodes de s5
INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 1, 'The Wars to Come', 'Cersei et Jaime affrontent leurs nouveaux rôles. Jon Snow est confronté à un dilemme.', 58, id FROM saison WHERE numero = 5 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 2, 'The House of Black and White', 'Arya arrive à Braavos. Tyrion se retrouve à la merci de Jorah Mormont.', 55, id FROM saison WHERE numero = 5 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 3, 'High Sparrow', 'Tyrion rencontre des alliés inattendus. Cersei et Jaime affrontent des nouvelles menaces à Port-Réal.', 57, id FROM saison WHERE numero = 5 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 4, 'Sons of the Harpy', 'Daenerys lutte pour maintenir son autorité à Meereen, tandis que les sons des harpies font leur apparition.', 56, id FROM saison WHERE numero = 5 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 5, 'Kill the Boy', 'Jon Snow prend des décisions difficiles à la Garde de Nuit. Daenerys fait face à une rébellion à Meereen.', 58, id FROM saison WHERE numero = 5 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 6, 'Unbowed, Unbent, Unbroken', 'Sansa est confrontée à une tragédie. Arya poursuit son entraînement.', 59, id FROM saison WHERE numero = 5 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 7, 'The Gift', 'Jon Snow se retrouve face à une trahison au sein de la Garde de Nuit. Tyrion tente de s’adapter à sa nouvelle vie.', 60, id FROM saison WHERE numero = 5 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 8, 'Hardhome', 'Jon Snow affronte une menace des plus terrifiantes au-delà du Mur.', 60, id FROM saison WHERE numero = 5 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 9, 'The Dance of Dragons', 'Daenerys affronte une rébellion dans l’arène. Jon Snow prend des décisions difficiles pour protéger la Garde de Nuit.', 58, id FROM saison WHERE numero = 5 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison)
SELECT 10, 'Mother’s Mercy', 'Cersei est confrontée à un procès. Jon Snow prend une décision qui change à jamais son avenir.', 59, id FROM saison WHERE numero = 5 AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones');



-- Associer les réalisateurs aux épisodes pour la saison 1 à 5 de Game of Thrones
INSERT INTO episode_realisateur (id_episode, id_realisateur)
SELECT e.id, r.id
FROM episode e, realisateur r
WHERE e.id_saison IN (SELECT id FROM saison WHERE numero IN (1, 2, 3, 4, 5) AND id_serie = (SELECT id FROM serie WHERE titre = 'Game of Thrones'))
  AND (
    (e.titre = 'Winter Is Coming' AND r.nom = 'Timothy Van Patten') OR
    (e.titre = 'The Kingsroad' AND r.nom = 'Timothy Van Patten') OR
    (e.titre = 'Lord Snow' AND r.nom = 'Brian Kirk') OR
    (e.titre = 'Cripples, Bastards, and Broken Things' AND r.nom = 'Brian Kirk') OR
    (e.titre = 'The Wolf and the Lion' AND r.nom = 'Daniel Minahan') OR
    (e.titre = 'A Golden Crown' AND r.nom = 'Daniel Minahan') OR
    (e.titre = 'You Win or You Die' AND r.nom = 'Michael J. Bassett') OR
    (e.titre = 'The Pointy End' AND r.nom = 'Michael J. Bassett') OR
    (e.titre = 'Baelor' AND r.nom = 'Alan Taylor') OR
    (e.titre = 'Fire and Blood' AND r.nom = 'Alan Taylor') OR
    (e.titre = 'The North Remembers' AND r.nom = 'Alan Taylor') OR
    (e.titre = 'The Night Lands' AND r.nom = 'Alan Taylor') OR
    (e.titre = 'What Is Dead May Never Die' AND r.nom = 'Alik Sakharov') OR
    (e.titre = 'Garden of Bones' AND r.nom = 'Alik Sakharov') OR
    (e.titre = 'The Ghost of Harrenhal' AND r.nom = 'David Petrarca') OR
    (e.titre = 'The Prince of Winterfell' AND r.nom = 'David Petrarca') OR
    (e.titre = 'A Man Without Honor' AND r.nom = 'David Nutter') OR
    (e.titre = 'The Prince of Winterfell' AND r.nom = 'David Nutter') OR
    (e.titre = 'Blackwater' AND r.nom = 'Neil Marshall') OR
    (e.titre = 'Valar Morghulis' AND r.nom = 'Neil Marshall') OR
    (e.titre = 'Valar Dohaeris' AND r.nom = 'Daniel Minahan') OR
    (e.titre = 'Dark Wings, Dark Words' AND r.nom = 'Daniel Minahan') OR
    (e.titre = 'Walk of Punishment' AND r.nom = 'David Benioff') OR
    (e.titre = 'And Now His Watch Is Ended' AND r.nom = 'Alex Graves') OR
    (e.titre = 'Kissed by Fire' AND r.nom = 'Alex Graves') OR
    (e.titre = 'The Climb' AND r.nom = 'Alik Sakharov') OR
    (e.titre = 'The Bear and the Maiden Fair' AND r.nom = 'Alik Sakharov') OR
    (e.titre = 'Second Sons' AND r.nom = 'Michelle MacLaren') OR
    (e.titre = 'The Rains of Castamere' AND r.nom = 'David Nutter') OR
    (e.titre = 'Mhysa' AND r.nom = 'David Nutter') OR
    (e.titre = 'Two Swords' AND r.nom = 'D.B. Weiss') OR
    (e.titre = 'The Lion and the Rose' AND r.nom = 'Alex Graves') OR
    (e.titre = 'Breaker of Chains' AND r.nom = 'Alex Graves') OR
    (e.titre = 'Oathkeeper' AND r.nom = 'Michelle MacLaren') OR
    (e.titre = 'First of His Name' AND r.nom = 'Michelle MacLaren') OR
    (e.titre = 'The Laws of Gods and Men' AND r.nom = 'Alik Sakharov') OR
    (e.titre = 'Mockingbird' AND r.nom = 'Alik Sakharov') OR
    (e.titre = 'The Mountain and the Viper' AND r.nom = 'Alex Graves') OR
    (e.titre = 'The Watchers on the Wall' AND r.nom = 'Neil Marshall') OR
    (e.titre = 'The Children' AND r.nom = 'Alex Graves') OR
    (e.titre = 'The Wars to Come' AND r.nom = 'Michael Slovis') OR
    (e.titre = 'The House of Black and White' AND r.nom = 'Michael Slovis') OR
    (e.titre = 'High Sparrow' AND r.nom = 'Mark Mylod') OR
    (e.titre = 'Sons of the Harpy' AND r.nom = 'Mark Mylod') OR
    (e.titre = 'Kill the Boy' AND r.nom = 'Jeremy Podeswa') OR
    (e.titre = 'Unbowed, Unbent, Unbroken' AND r.nom = 'Jeremy Podeswa') OR
    (e.titre = 'The Gift' AND r.nom = 'Miguel Sapochnik') OR
    (e.titre = 'Hardhome' AND r.nom = 'Miguel Sapochnik') OR
    (e.titre = 'The Dance of Dragons' AND r.nom = 'David Nutter') OR
    (e.titre = 'Mother’s Mercy' AND r.nom = 'David Nutter')
  );
