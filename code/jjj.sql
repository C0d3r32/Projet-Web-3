INSERT INTO serie (titre) VALUES ('Game of Thrones');

INSERT INTO tag (nom) VALUES ('Action'), ('Fantasy'), ('Drame');

INSERT INTO serie_tag (id_serie, id_tag) VALUES
(1, 1), -- Action
(1, 2), -- Fantasy
(1, 3); -- Drame

INSERT INTO saison (numero, affiche, id_serie) VALUES
(1, 'https://m.media-amazon.com/images/I/81Hz0Wus+jL._AC_UF1000,1000_QL80_.jpg', 1),
(2, 'https://m.media-amazon.com/images/I/81FGxNcoJoL._AC_UF1000,1000_QL80_.jpg', 1),
(3, 'https://m.media-amazon.com/images/I/61FRb+twp-S._AC_UF1000,1000_QL80_.jpg', 1),
(4, 'https://fr.web.img4.acsta.net/c_225_300/pictures/14/02/28/00/50/120605.jpg', 1),
(5, 'https://m.media-amazon.com/images/I/61C+Sf-crFL._AC_UF894,1000_QL80_.jpg', 1);

INSERT INTO acteur (nom, photo) VALUES
('Emilia Clarke', 'https://m.media-amazon.com/images/M/MV5BNjg3OTg4MDczMl5BMl5BanBnXkFtZTgwODc0NzUwNjE@._V1_.jpg'),
('Kit Harington', 'https://m.media-amazon.com/images/M/MV5BMTA2NTI0NjYxMTBeQTJeQWpwZ15BbWU3MDIxMjgyNzY@._V1_.jpg'),
('Peter Dinklage', 'https://m.media-amazon.com/images/M/MV5BMTM1MTI5Mzc0MF5BMl5BanBnXkFtZTYwNzgzOTQz._V1_FMjpg_UX1000_.jpg');

INSERT INTO saison_acteur (id_saison, id_acteur) VALUES
(1, 1), (1, 2), (1, 3),
(2, 1), (2, 2), (2, 3),
(3, 1), (3, 2), (3, 3),
(4, 1), (4, 2), (4, 3),
(5, 1), (5, 2), (5, 3);

INSERT INTO realisateur (nom, photo) VALUES
('Alan Taylor', 'https://m.media-amazon.com/images/M/MV5BMGYwMWY3NjctZTg4My00MzRiLThlODQtMTc5OTEzMzI0ZWQwXkEyXkFqcGc@._V1_.jpg'),
('David Nutter', 'https://upload.wikimedia.org/wikipedia/commons/8/8f/David_Nutter_by_Gage_Skidmore_2.jpg');

INSERT INTO episode (numero, titre, synopsis, duree, id_saison) VALUES
(1, 'Winter Is Coming', 'Lord Eddard Stark is concerned by news of a deserter from the Night"s Watch; King Robert I Baratheon and the Lannisters arrive at Winterfell; the exiled Prince Viserys Targaryen forges a powerful new alliance. North of the Seven Kingdoms of Westeros, Night"s Watch soldiers are attacked by supernatural White Walkers.', 62, 1),
(1, 'The North Remembers', 'The North Remembers" is the first episode of the second season of Game of Thrones. It is the eleventh episode of the series overall.', 53, 2),
(1, 'Valar Dohaeris', 'Valar Dohaeris" is the third season premiere episode of the HBO fantasy television series Game of Thrones. Written by executive producers David Benioff and ...', 55, 3),
(1, 'Two Swords', 'Two Swords" is the first episode of the fourth season of HBO"s medieval fantasy television series Game of Thrones. The fourth season premiere and the 31st ...', 59, 4),
(1, 'The Wars to Come', 'The Wars to Come" is the first episode of the fifth season of HBO"s medieval fantasy television series Game of Thrones, and the 41st overall.', 58, 5);

INSERT INTO episode_realisateur (id_episode, id_realisateur) VALUES
(1, 1),
(2, 2),
(3, 1),
(4, 2),
(5, 1)