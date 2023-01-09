/* Création de la table `User` */
DROP TABLE IF EXISTS `Users`;
CREATE TABLE IF NOT EXISTS `Users`(
    `id` integer(11) NOT NULL AUTO_INCREMENT,
    `lastname` varchar(40),
    `firstname` varchar(40),
    `login` varchar(30) NOT NULL UNIQUE,
    `password` varchar(60) NOT NULL,
    PRIMARY KEY (`id`)
);

/* Insertion d'un utilisateur avec le role admin dans la table `User`*/
INSERT INTO `Users` (`id`, `lastname`, `firstname`,`login`, `password`) VALUES
('1', 'Admin', 'Admin', 'admin', '$2y$10$OgGilVcpTrARPRsrx8YZf.GRCGW3EAugei7htlwYaGDdbROVRY2pu');
