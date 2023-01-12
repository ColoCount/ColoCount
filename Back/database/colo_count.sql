/* Création de la table `users` */
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users`(
    `id`       integer NOT NULL AUTO_INCREMENT,
    `username` varchar(40),
    `email`    varchar(40),
    `password` varchar(255) NOT NULL,
    `created_at`  datetime DEFAULT NULL,
    `updated_at`  datetime DEFAULT NULL,
    `deleted_at`  datetime DEFAULT NULL,
    PRIMARY KEY (`id`)
    );

/* Insertion d'un utilisateur avec le role admin dans la table `Users`*/
INSERT INTO `users` (`id`, `username`, `email`, `password`,`created_at`,`updated_at`) VALUES
    (1, 'Admin', 'Admin@gmail.com', '$2y$10$OgGilVcpTrARPRsrx8YZf.GRCGW3EAugei7htlwYaGDdbROVRY2pu','2023-01-11 14:15:24', '2023-01-11 14:15:24');
INSERT INTO `users` (`id`, `username`, `email`, `password`,`created_at`,`updated_at`) VALUES
    (2, 'Romain', 'Romain@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6NCwidXNlcm5hbWUiOiJyb21haW4iLCJleHAiOjE2NzM1MTMyODJ9.ChfOhQ7Q1XSzPlURQX53j_qCBj19Byqr-qrMLSmUNL8','2023-01-12 09:15:24', '2023-01-12 09:15:24');



/* Création de la table `colocation` */
DROP TABLE IF EXISTS `colocation`;
CREATE TABLE IF NOT EXISTS `colocation` (
    `id`          integer(11) NOT NULL AUTO_INCREMENT,
    `name`         varchar(255) NOT NULL,
    `description` varchar(255),
    `created_at`  datetime DEFAULT NULL,
    `updated_at`  datetime DEFAULT NULL,
    `deleted_at`  datetime DEFAULT NULL,
    PRIMARY KEY (`id`)
);

/* Insertion d'une colocation dans la table `colocation` */
INSERT INTO `colocation` (`id`,`name`,`description`,`created_at`,`updated_at`) VALUES
    (1,'LaColoc','Une coloc pour ! tous pour la coloc','2023-01-11 11:19:14','2023-01-11 11:19:14');
INSERT INTO `colocation` (`id`,`name`,`description`,`created_at`,`updated_at`) VALUES
    (2,'LaColoc2','Une coloc Abérrante','2023-01-11 11:19:14','2023-01-11 11:19:14');



/* Création de la table `charges` */
DROP TABLE IF EXISTS `charge`;
CREATE TABLE IF NOT EXISTS `charge` (
    `id`            integer NOT NULL AUTO_INCREMENT,
    `name`          varchar(20) NOT NULL,
    `amount`        float NOT NULL,
    `type`          varchar(20) NOT NULL,
    `category`      varchar(20) NOT NULL,
    `created_at`    datetime,
    `updated_at`    datetime,
    `deleted_at`    datetime,
    PRIMARY KEY(`id`)
);


/* Création de la table `colocation_user` */
DROP TABLE IF EXISTS `colocation_user`;
CREATE TABLE IF NOT EXISTS `colocation_user` (
    `colocation_id` integer(11) NOT NULL,
    `user_id` integer(11) NOT NULL,
    `amount` varchar(20) NOT NULL,
    `role` ENUM ('admin', 'user') DEFAULT 'user',
    FOREIGN KEY(`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY(`colocation_id`) REFERENCES `colocation`(`id`) ON DELETE CASCADE
);

/* Insertion d'un colocation_user du compte Admin dans la table `colocation_user` */
INSERT INTO `colocation_user` (`user_id`,`colocation_id`, `amount`, `role`) VALUES
    (1,1,0,'admin');
INSERT INTO `colocation_user` (`user_id`,`colocation_id`, `amount`, `role`) VALUES
    (1,2,0,'admin');
    

/* Création de la table `depense_user` */
DROP TABLE IF EXISTS `charge_user`;
CREATE TABLE IF NOT EXISTS `charge_user` (
    `user_id` integer(11) NOT NULL,
    `charge_id` integer(11) NOT NULL
);

/* Création de la table `depense_colocation` */
DROP TABLE IF EXISTS `charge_colocation`;
CREATE TABLE IF NOT EXISTS `charge_colocation` (
    `colocation_id` integer(11) NOT NULL,
    `charge_id` integer(11) NOT NULL
);


