/* Création de la table `User` */
DROP TABLE IF EXISTS `Users`;
CREATE TABLE IF NOT EXISTS `Users`(
    `id` integer(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(30) NOT NULL UNIQUE,
    `email` varchar (255) NOT NULL UNIQUE,
    `password` varchar(60) NOT NULL,
    PRIMARY KEY (`id`)
);

/* Insertion d'un utilisateur avec le role admin dans la table `User`*/
INSERT INTO `Users` (`id`,`username`, `password`) VALUES
('1', 'Admin','admin@gmail.com','$2y$10$OgGilVcpTrARPRsrx8YZf.GRCGW3EAugei7htlwYaGDdbROVRY2pu');
