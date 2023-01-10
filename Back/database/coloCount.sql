/* Création de la table `Users` */
DROP TABLE IF EXISTS `Users`;
CREATE TABLE IF NOT EXISTS `Users`(
                                      `id`       integer NOT NULL AUTO_INCREMENT,
                                      `userName` varchar(40),
    `email`    varchar(40),
    `password` varchar(255) NOT NULL UNIQUE,
    PRIMARY KEY (`id`)
    );

/* Insertion d'un utilisateur avec le role admin dans la table `Users`*/
INSERT INTO `Users` (`id`, `username`, `email`, `password`) VALUES
    (1, 'Admin', 'Admin@gmail.com', '$2y$10$OgGilVcpTrARPRsrx8YZf.GRCGW3EAugei7htlwYaGDdbROVRY2pu');
/* INSERT INTO `Users` (`id`, `username`, `email`, `password`) VALUES
(2, 'Pas admin', 'pasAdmin@gmail.com', '$2y$10$OgGilVcpTrARPRsrx8YZf.GRCGW3EAugei7htlwYaGDdbROVRY2pu');*/


/* Création de la table `Colocation` */
DROP TABLE IF EXISTS `Colocation`;
CREATE TABLE IF NOT EXISTS `Colocation` (
                                            `id`            integer NOT NULL AUTO_INCREMENT,
                                            `nom`           varchar(255) NOT NULL,
    `totalSomme`    integer(11) NOT NULL,
    `date` datetime NOT NULL,
    PRIMARY KEY (`id`)
    );

/* Insertion d'un post du compte Admin dans la table `Post` */
INSERT INTO `Colocation` (`id`,`nom`, `totalSomme`, `date`) VALUES
    (1,'LaColoc', 200, '2022-12-10 14:15:24');



/* Création de la table `ColocUser` */
DROP TABLE IF EXISTS `ColocUser`;
CREATE TABLE IF NOT EXISTS `ColocUser` (
    `idUser` integer(11) NOT NULL,
    `idColoc` integer(11) NOT NULL,
    `role` varchar(20) NOT NULL,
    `dateArriver` datetime NOT NULL,
    FOREIGN KEY(`idUser`) REFERENCES `Users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY(`idColoc`) REFERENCES `Colocation`(`id`) ON DELETE CASCADE

    );

/* Insertion d'un post du compte Admin dans la table `Post` */
INSERT INTO `ColocUser` (`idUser`,`idColoc`, `role`, `dateArriver`) VALUES
    (1,1,'admin', '2022-12-10 14:15:24');


/* Création de la table `Depenses` */
DROP TABLE IF EXISTS `Depenses`;
CREATE TABLE IF NOT EXISTS `Depenses` (

                                          `id`      integer NOT NULL AUTO_INCREMENT,
                                          `montant` integer(5) NOT NULL,
    `type`    varchar(20) NOT NULL,
    `date`    date NOT NULL,
    `idUser`  integer(11) NOT NULL,
    `idColoc` integer(11) NOT NULL,
    FOREIGN KEY(`idUser`) REFERENCES `Users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY(`idColoc`) REFERENCES `Colocation`(`id`) ON DELETE CASCADE,
    PRIMARY KEY(`id`)

    );

/* Insertion d'un post du compte Admin dans la table `Post` */
INSERT INTO `Depenses` (`id`,`montant`, `type`, `date`,`idUser`, `idColoc`) VALUES
    (1,205, 'courses', '2022-12-10 14:15:24', 1, 1);

