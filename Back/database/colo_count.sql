/* Création de la table `users` */
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users`(
                                      `id`       integer NOT NULL AUTO_INCREMENT,
                                      `username` varchar(40),
    `email`    varchar(40),
    `password` varchar(255) NOT NULL UNIQUE,
    `created_date`  datetime,
    `updated_date`  datetime,
    `deleted_date`  datetime,
    PRIMARY KEY (`id`)
    );

/* Insertion d'un utilisateur avec le role admin dans la table `Users`*/
INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
    (1, 'Admin', 'Admin@gmail.com', '$2y$10$OgGilVcpTrARPRsrx8YZf');



/* Création de la table `Colocation` */
DROP TABLE IF EXISTS `colocation`;
CREATE TABLE IF NOT EXISTS `colocation` (
                                            `id`            integer NOT NULL AUTO_INCREMENT,
                                            `nom`           varchar(255) NOT NULL,
    `created_date`  datetime,
    `updated_date`  datetime,
    `deleted_date`  datetime,
    PRIMARY KEY (`id`)
    );

/* Insertion d'un post du compte Admin dans la table `Post` */
INSERT INTO `colocation` (`id`,`nom`) VALUES
    (1,'LaColoc');



/* Création de la table `charges` */
DROP TABLE IF EXISTS `charges`;
CREATE TABLE IF NOT EXISTS `charges` (

                                         `id`      integer NOT NULL AUTO_INCREMENT,
                                         `nom` varchar(20) NOT NULL,
    `montant` integer(5) NOT NULL,
    `categorie`    varchar(20) NOT NULL,
    `created_date`  datetime,
    `updated_date`  datetime,
    `deleted_date`  datetime,
    PRIMARY KEY(`id`)

    );

/* Insertion d'un post du compte Admin dans la table `Post` */
INSERT INTO `charges` (`id`,`nom`, `montant`, `categorie`) VALUES
    (1, 'courses',200, 'courses');



/* Création de la table `coloc_user` */
DROP TABLE IF EXISTS `colocation_user`;
CREATE TABLE IF NOT EXISTS `colocation_user` (
    `user_id` integer(11) NOT NULL,
    `colocation_id` integer(11) NOT NULL,
    `account` varchar(20) NOT NULL,
    `role` varchar(20) NOT NULL,
    FOREIGN KEY(`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY(`colocation_id`) REFERENCES `colocation`(`id`) ON DELETE CASCADE

    );

/* Insertion d'un post du compte Admin dans la table `Post` */
INSERT INTO `colocation_user` (`user_id`,`colocation_id`, `account`, `role`) VALUES
    (1,1,'-200', 'admin');


/* Création de la table `depense_user` */
DROP TABLE IF EXISTS `depense_user`;
CREATE TABLE IF NOT EXISTS `depense_user` (
    `user_id` integer(11) NOT NULL,
    `charges_id` integer(11) NOT NULL

    );

/* Insertion d'un post du compte Admin dans la table `Post` */
INSERT INTO `depense_user` (`user_id`,`charges_id`) VALUES
    (1,1);


/* Création de la table `depense_colocation` */
DROP TABLE IF EXISTS `depense_colocation`;
CREATE TABLE IF NOT EXISTS `depense_colocation` (
    `colocation_id` integer(11) NOT NULL,
    `charges_id` integer(11) NOT NULL

    );

/* Insertion d'un post du compte Admin dans la table `Post` */
INSERT INTO `depense_colocation` (`colocation_id`,`charges_id`) VALUES
    (1,1);
