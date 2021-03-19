# Host: 107.180.46.149  (Version 5.6.49-cll-lve)
# Date: 2021-03-19 18:25:29
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "desenvolvedoras"
#

DROP TABLE IF EXISTS `desenvolvedoras`;
CREATE TABLE `desenvolvedoras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `desenvolvedoras_nome_unique` (`nome`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "desenvolvedoras"
#

/*!40000 ALTER TABLE `desenvolvedoras` DISABLE KEYS */;
INSERT INTO `desenvolvedoras` VALUES (1,'Capcom',1575159128,1575159128,NULL),(2,'Square Enix',1575159128,1575159128,NULL),(3,'Konami',1575159128,1575159128,NULL),(4,'Ubisoft',1575159128,1575159128,NULL),(5,'SEGA',1575159128,1575159128,NULL),(6,'Electronic Arts',1575159128,1575159128,NULL),(7,'Activision Blizzard',1575159128,1575159128,NULL),(8,'Nintendo',1575159128,1575159128,NULL),(9,'Sony',1575159128,1575159128,NULL),(10,'Microsoft',1575159128,1575159128,NULL),(11,'Rockstar Studios',1575159128,1575159128,NULL),(12,'Warner Bros.',1575159128,1575159128,NULL);
/*!40000 ALTER TABLE `desenvolvedoras` ENABLE KEYS */;

#
# Structure for table "galerias"
#

DROP TABLE IF EXISTS `galerias`;
CREATE TABLE `galerias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "galerias"
#

/*!40000 ALTER TABLE `galerias` DISABLE KEYS */;
INSERT INTO `galerias` VALUES (1,'Fifa 19',1575159128,1575159128,NULL),(2,'Far Cry 5',1575159128,1575159128,NULL),(3,'Red Dead Redemption II',1575159128,1575159128,NULL),(4,'Middle Earth: Shadow of War',1575159128,1575159128,NULL),(5,'Resident Evil 7: Biohazard',1575159128,1575159128,NULL),(6,'Assassin\'s Creed Odyssey',1575159128,1575159128,NULL);
/*!40000 ALTER TABLE `galerias` ENABLE KEYS */;

#
# Structure for table "galerias_media"
#

DROP TABLE IF EXISTS `galerias_media`;
CREATE TABLE `galerias_media` (
  `galeria_id` int(10) unsigned NOT NULL,
  `media_id` int(10) unsigned NOT NULL,
  `plataforma_id` int(10) unsigned NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'screenshot',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`galeria_id`,`media_id`),
  KEY `galerias_media_media_id_foreign` (`media_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "galerias_media"
#

/*!40000 ALTER TABLE `galerias_media` DISABLE KEYS */;
INSERT INTO `galerias_media` VALUES (1,8,1,'capa',1575159128,1575159128,NULL),(2,3,1,'screenshot',1575159128,1575159128,NULL),(2,10,1,'screenshot',1575159128,1575159128,NULL),(2,11,1,'screenshot',1575159128,1575159128,NULL),(2,12,1,'screenshot',1575159128,1575159128,NULL),(2,13,1,'screenshot',1575159128,1575159128,NULL),(2,14,1,'capa',1575159128,1575159128,NULL),(2,16,1,'trailer',1575159128,1575159128,NULL),(2,17,1,'gameplay',1575159128,1575159128,NULL),(2,18,1,'screenshot',1575159128,1575159128,NULL),(2,19,1,'screenshot',1575159128,1575159128,NULL),(3,4,1,'capa',1575159128,1575159128,NULL),(4,5,1,'capa',1575159128,1575159128,NULL),(5,6,4,'capa',1575159128,1575159128,NULL),(6,7,1,'capa',1575159128,1575159128,NULL);
/*!40000 ALTER TABLE `galerias_media` ENABLE KEYS */;

#
# Structure for table "games"
#

DROP TABLE IF EXISTS `games`;
CREATE TABLE `games` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sinopse` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero1_id` int(10) unsigned NOT NULL,
  `genero2_id` int(10) unsigned DEFAULT NULL,
  `genero3_id` int(10) unsigned DEFAULT NULL,
  `genero4_id` int(10) unsigned DEFAULT NULL,
  `genero5_id` int(10) unsigned DEFAULT NULL,
  `plataforma1_id` int(10) unsigned NOT NULL,
  `plataforma2_id` int(10) unsigned DEFAULT NULL,
  `plataforma3_id` int(10) unsigned DEFAULT NULL,
  `plataforma4_id` int(10) unsigned DEFAULT NULL,
  `plataforma5_id` int(10) unsigned DEFAULT NULL,
  `desenvolvedora_id` int(10) unsigned NOT NULL,
  `galeria_id` int(10) unsigned DEFAULT NULL,
  `trailer_lancamento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trailer_gameplay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lancamento` int(11) NOT NULL,
  `cliques` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `games_genero1_id_foreign` (`genero1_id`),
  KEY `games_genero2_id_foreign` (`genero2_id`),
  KEY `games_genero3_id_foreign` (`genero3_id`),
  KEY `games_plataforma1_id_foreign` (`plataforma1_id`),
  KEY `games_plataforma2_id_foreign` (`plataforma2_id`),
  KEY `games_plataforma3_id_foreign` (`plataforma3_id`),
  KEY `games_desenvolvedora_id_foreign` (`desenvolvedora_id`),
  KEY `games_galeria_id_foreign` (`galeria_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "games"
#

/*!40000 ALTER TABLE `games` DISABLE KEYS */;
INSERT INTO `games` VALUES (1,'Fifa 20','FIFA 20 é um jogo eletrônico de futebol desenvolvido e publicado pela EA Sports, que será lançado mundialmente em 27 de setembro de 2019. Este é o vigésimo sétimo título da série FIFA e o quarto a usar o mecanismo de jogo da Frostbite para Xbox One, PS4 e PC.',4,NULL,NULL,NULL,NULL,1,4,5,NULL,NULL,6,1,NULL,NULL,1568109600,12,1575159128,1615884162,NULL),(2,'Far Cry 5','Bem-vindo a Hope County, Montana. Este lugar idílico é o lar de uma comunidade de pessoas amantes da liberdade - e um culto fanático do apocalipse conhecido como The Project at Eden\'s Gate.Dirigido pelo profeta carismático Joseph Seed e seus devotos irmãos, Eden\'s Gate infiltrou-se silenciosamente em todos os aspectos da vida diária.Quando a sua chegada incita o culto a tomar violentamente o controle da região, tu tens de provocar os incêndios da resistência para levar o Culto á Justiça.',1,2,12,NULL,NULL,1,4,5,NULL,NULL,4,2,NULL,NULL,1522144800,1067,1575159128,1616187222,NULL),(3,'Red Dead Redemption II','Red Dead Redemption II é um jogo eletrônico de ação-aventura western desenvolvido pela Rockstar Studios e publicado pela Rockstar Games. Lançado mundialmente em 26 de outubro de 2018 para PlayStation 4 e Xbox One, é uma prequela de Red Dead Redemption e o terceiro título da franquia Red Dead',1,2,NULL,NULL,NULL,1,4,5,NULL,NULL,11,3,NULL,NULL,1540512000,114,1575159128,1615884376,NULL),(4,'Middle Earth: Shadow of War','Middle Earth: Shadow of War é um jogo de RPG de ação ambientado no universo da saga O Senhor dos Anéis do autor J. R. R. Tolkien, desenvolvido pela Monolith Productions e distribuído pela Warner Bros. Interactive Entertainment.',8,2,NULL,NULL,NULL,1,4,5,NULL,NULL,12,4,NULL,NULL,1506470400,3,1575159128,1612275374,NULL),(5,'Resident Evil 7: Biohazard','Resident Evil 7: Biohazard, conhecido no Japão como Biohazard 7: Resident Evil é um jogo eletrônico do gênero survival horror produzido pela Capcom e lançado em 24 de janeiro de 2017 para Microsoft Windows, PlayStation 4 e Xbox One, com a versão de PlayStation 4 tendo suporte completo para PlayStation VR.',13,12,NULL,NULL,NULL,1,4,5,NULL,NULL,1,5,NULL,NULL,1485216000,7,1575159128,1612275367,NULL),(6,'Assassin\'s Creed Odyssey','Assassin\'s Creed Odissey é um jogo eletrônico de RPG de ação produzido pela Ubisoft Quebec e publicado pela Ubisoft. É o décimo primeiro título principal da série Assassin\'s Creed e foi lançado em 5 de Outubro de 2018.',13,12,NULL,NULL,NULL,1,4,5,NULL,NULL,4,6,NULL,NULL,1538697600,110,1575159128,1616187237,NULL);
/*!40000 ALTER TABLE `games` ENABLE KEYS */;

#
# Structure for table "generos"
#

DROP TABLE IF EXISTS `generos`;
CREATE TABLE `generos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `generos_nome_unique` (`nome`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "generos"
#

/*!40000 ALTER TABLE `generos` DISABLE KEYS */;
INSERT INTO `generos` VALUES (1,'Ação',1575159128,1575159128,NULL),(2,'Aventura',1575159128,1575159128,NULL),(3,'Corrida',1575159128,1575159128,NULL),(4,'Esporte',1575159128,1575159128,NULL),(5,'Estratégia',1575159128,1575159128,NULL),(6,'Fitness',1575159128,1575159128,NULL),(7,'Luta',1575159128,1575159128,NULL),(8,'RPG',1575159128,1575159128,NULL),(9,'MMO',1575159128,1575159128,NULL),(10,'Musical',1575159128,1575159128,NULL),(11,'Simulação',1575159128,1575159128,NULL),(12,'Shooter',1575159128,1575159128,NULL),(13,'Terror',1575159128,1575159128,NULL);
/*!40000 ALTER TABLE `generos` ENABLE KEYS */;

#
# Structure for table "medias"
#

DROP TABLE IF EXISTS `medias`;
CREATE TABLE `medias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tamanho` bigint(20) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `nome_arquivo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extensao` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `medias_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "medias"
#

/*!40000 ALTER TABLE `medias` DISABLE KEYS */;
INSERT INTO `medias` VALUES (3,1,'uploads/2_1.jpg',10368,10368,10368,'2','.jpg',1575159128,1575159128,NULL),(4,1,'uploads/capas/3.jpg',10368,10368,10368,'4','.jpg',1575159128,1575159128,NULL),(5,1,'uploads/capas/4.jpg',10368,10368,10368,'5','.jpg',1575159128,1575159128,NULL),(6,1,'uploads/capas/5.jpg',10368,10368,10368,'6','.jpg',1575159128,1575159128,NULL),(7,1,'uploads/capas/6.jpg',10368,10368,10368,'6','.jpg',1575159128,1575159128,NULL),(8,1,'uploads/capas/1.jpg',10368,10368,10368,'1','.jpg',1575159128,1575159128,NULL),(9,1,'uploads/videos/1.mp4',10368,10368,10368,'1','.mp4',1575159128,1575159128,NULL),(10,1,'uploads/2_2.jpg',10368,10368,10368,'2','.jpg',1575159128,1575159128,NULL),(11,1,'uploads/2_3.jpg',10368,10368,10368,'2','.jpg',1575159128,1575159128,NULL),(12,1,'uploads/2_4.jpg',10368,10368,10368,'2','.jpg',1575159128,1575159128,NULL),(13,1,'uploads/2_5.jpg',10368,10368,10368,'2','.jpg',1575159128,1575159128,NULL),(14,1,'uploads/capas/2.jpg',10368,10368,10368,'2','.jpg',1575159128,1575159128,NULL),(16,1,'uploads/videos/2_trailer.mp4',10368,10368,10368,'1','.mp4',1575159128,1575159128,NULL),(17,1,'uploads/videos/2_gameplay.mp4',10368,10368,10368,'1','.mp4',1575159128,1575159128,NULL),(18,1,'uploads/2_6.jpg',10368,10368,10368,'2','.jpg',1575159128,1575159128,NULL),(19,1,'uploads/2_7.jpg',10368,10368,10368,'2','.jpg',1575159128,1575159128,NULL);
/*!40000 ALTER TABLE `medias` ENABLE KEYS */;

#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "migrations"
#

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_11_15_032003_create_games_table',1),(4,'2018_11_15_042550_create_generos_table',1),(5,'2018_11_15_042656_create_plataformas_table',1),(6,'2018_11_15_042725_create_desenvolvedoras_table',1),(7,'2018_11_15_042821_create_galerias_table',1),(8,'2018_11_15_042837_create_galerias_media_table',1),(9,'2018_11_15_043202_create_medias_table',1),(10,'2018_11_15_043913_update_keys',1),(11,'2019_11_30_231604_alter_table_galerias_media',1),(12,'2019_12_30_175917_alter_table_galerias_media_new_field',1),(13,'2019_12_30_205828_alter_table_plataformas_new_field_slug',1),(14,'2019_12_31_023244_alter_table_games_new_field_cliques',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

#
# Structure for table "password_resets"
#

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "password_resets"
#


#
# Structure for table "plataformas"
#

DROP TABLE IF EXISTS `plataformas`;
CREATE TABLE `plataformas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `plataformas_nome_unique` (`nome`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "plataformas"
#

/*!40000 ALTER TABLE `plataformas` DISABLE KEYS */;
INSERT INTO `plataformas` VALUES (1,'Xbox One','xbox',1575159128,1575159128,NULL),(2,'Xbox 360','xbox',1575159128,1575159128,NULL),(3,'Playstation 3','playstation3',1575159128,1575159128,NULL),(4,'Playstation 4','playstation4',1575159128,1575159128,NULL),(5,'PC','windows',1575159128,1575159128,NULL);
/*!40000 ALTER TABLE `plataformas` ENABLE KEYS */;

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail_id` int(10) unsigned NOT NULL,
  `nascimento` int(11) DEFAULT NULL,
  `sexo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacao` text COLLATE utf8mb4_unicode_ci,
  `ultimo_acesso` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_api_token_unique` (`api_token`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "users"
#

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Alan Pardini Sant\'Ana','alanps2012@gmail.com',NULL,'$2y$10$0XN7dRKk2zRAeDRbVv56Ee26/ifat6qAYN4a6QgIrE9Qy8qx/LGEO',NULL,'NOvgX6zpAh8F0JvZhk2EVV1RxzUk7JDrvJJC2x9lFO3mzz9Lm3rgPGAFyKp6',1,560822400,'Masculino',NULL,NULL,1575159128,1575159128,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
