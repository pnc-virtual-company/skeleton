--
-- Structure of table `users`
--
CREATE TABLE IF NOT EXISTS `skeleton_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Internal unique identifier',
  `firstname` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'User Firstname',
  `lastname` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'User Lastname',
  `login` varchar(32) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Login used for connecting tothe application',
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Email',
  `password` varchar(512) CHARACTER SET utf8 DEFAULT NULL COMMENT 'SHA1 encoded password',
  `role` int(11) DEFAULT NULL COMMENT 'Binary mask for role',
  `active` bool DEFAULT TRUE COMMENT 'Is user active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `skeleton_users`
--

INSERT INTO `skeleton_users` (`id`, `firstname`, `lastname`, `login`, `email`, `password`, `role`, `active`) VALUES
(1, 'Benjamin', 'BALET', 'bbalet', 'benjamin.balet@gmail.com', '$2a$08$LeUbaGFqJjLSAN7to9URsuHB41zcmsMBgBhpZuFp2y2OTxtVcMQ.C', 1, 1),
(2, 'john', 'DOE', 'jdoe', 'jdoe@test.org', '$2a$08$Gk9WE1duEcKhEhxUKFmZteUU0sCZTgZIKkiPxhCe7yi0Jw0pBbDNW', 2, 1),
(3, 'Bob', 'DENARD', 'bdenard', 'bdenard@test.org', '$2a$08$14jdHTPUZe5.zXxQ1NqhhO83xUt2Zkr.csGw10BH75B3VrJiNU8Bq', 2, 1),
(5, 'Admin', 'ADMINISTRATOR', 'admin', 'admin@skeleton.org', '$2a$08$cnX6al6aTkoyh/N/tKZ11e8ec9J/sldA6R4NdP.2qhhDi0OD3ek1G', 1, 1);

--
-- Structure of table `roles`
--
CREATE TABLE IF NOT EXISTS `skeleton_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Content of table `roles`
--
INSERT INTO `skeleton_roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user'),
(8, 'Super admin');
