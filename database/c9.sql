-- MySQL dump 10.13  Distrib 5.5.57, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: c9
-- ------------------------------------------------------
-- Server version	5.5.57-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migrations`
--
create database flx;
use flx;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('hugobarbato@gmail.com','$2y$10$PpTvK6t5UHhwBvF4FX3xee9yUH9gHEpm8NpEA26NQY5Umt4mK4/tq','2019-04-05 13:04:38');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_categoria_imovel`
--

DROP TABLE IF EXISTS `tb_categoria_imovel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_categoria_imovel` (
  `cd_categoria_imovel` int(11) NOT NULL AUTO_INCREMENT,
  `nm_categoria_imovel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cd_categoria_imovel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categoria_imovel`
--

LOCK TABLES `tb_categoria_imovel` WRITE;
/*!40000 ALTER TABLE `tb_categoria_imovel` DISABLE KEYS */;
INSERT INTO `tb_categoria_imovel` VALUES (1,'Residencial'),(2,'Comercial'),(3,'Outros');
/*!40000 ALTER TABLE `tb_categoria_imovel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_imovel`
--

DROP TABLE IF EXISTS `tb_imovel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_imovel` (
  `cd_imovel` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nm_titulo` varchar(60) NOT NULL,
  `cd_cep` varchar(10) DEFAULT NULL,
  `nm_endereco` varchar(255) DEFAULT NULL,
  `nm_numero` varchar(255) DEFAULT NULL,
  `nm_complemento` varchar(255) DEFAULT NULL,
  `nm_bairro` varchar(255) DEFAULT NULL,
  `nm_cidade` varchar(255) DEFAULT NULL,
  `cd_uf` varchar(2) DEFAULT NULL,
  `qt_quartos` int(11) DEFAULT NULL,
  `qt_suites` int(11) DEFAULT NULL,
  `qt_banheiro` int(11) DEFAULT NULL,
  `qt_vagas` int(11) DEFAULT NULL,
  `vl_area_util` int(11) DEFAULT NULL,
  `vl_area_total` int(11) DEFAULT NULL,
  `ds_imovel` text,
  `vl_imovel` decimal(10,2) DEFAULT NULL,
  `cd_forma_pagamento` tinyint(1) DEFAULT NULL,
  `vl_condominio` decimal(10,2) DEFAULT NULL,
  `vl_iptu` decimal(10,2) DEFAULT NULL,
  `ds_areas_comuns` varchar(500) DEFAULT NULL,
  `ds_areas_privativas` varchar(500) DEFAULT NULL,
  `ds_comodidades` varchar(500) DEFAULT NULL,
  `ic_deposito` tinyint(1) DEFAULT NULL,
  `dt_previsao_entrega` timestamp NULL DEFAULT NULL,
  `cd_classificacao_hotel` int(11) DEFAULT NULL,
  `vl_distancia_centro` decimal(10,2) DEFAULT NULL,
  `ic_animais` tinyint(1) DEFAULT NULL,
  `vl_diaria` decimal(10,2) DEFAULT NULL,
  `vl_promocao` decimal(10,2) DEFAULT NULL,
  `ic_cancelamento_diaria` tinyint(1) DEFAULT NULL,
  `cd_tipo_anunciante` int(11) DEFAULT NULL,
  `cd_tipo_anuncio` int(11) DEFAULT NULL,
  `cd_tipo_imovel` int(11) DEFAULT NULL,
  `cd_user` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cd_imovel`),
  KEY `cd_cep` (`cd_cep`),
  KEY `nm_bairro` (`nm_bairro`),
  KEY `nm_cidade` (`nm_cidade`),
  KEY `cd_uf` (`cd_uf`),
  KEY `qt_quartos` (`qt_quartos`),
  KEY `qt_suites` (`qt_suites`),
  KEY `qt_banheiro` (`qt_banheiro`),
  KEY `qt_vagas` (`qt_vagas`),
  KEY `vl_area_util` (`vl_area_util`),
  KEY `vl_area_total` (`vl_area_total`),
  KEY `cd_forma_pagamento` (`cd_forma_pagamento`),
  KEY `cd_classificacao_hotel` (`cd_classificacao_hotel`),
  KEY `cd_user` (`cd_user`),
  KEY `cd_tipo_imovel` (`cd_tipo_imovel`),
  KEY `cd_tipo_anuncio` (`cd_tipo_anuncio`),
  KEY `cd_tipo_anunciante` (`cd_tipo_anunciante`),
  KEY `ic_cancelamento_diaria` (`ic_cancelamento_diaria`),
  KEY `vl_diaria` (`vl_diaria`),
  KEY `vl_promocao` (`vl_promocao`),
  KEY `ic_animais` (`ic_animais`),
  CONSTRAINT `imovel_user` FOREIGN KEY (`cd_user`) REFERENCES `users` (`id`),
  CONSTRAINT `tb_imovel_ibfk_1` FOREIGN KEY (`cd_tipo_anuncio`) REFERENCES `tb_tipo_anuncio` (`cd_tipo_anuncio`),
  CONSTRAINT `tipo_anunciante` FOREIGN KEY (`cd_tipo_anunciante`) REFERENCES `tb_tipo_anunciante` (`cd_tipo_anunciante`),
  CONSTRAINT `tipo_imovel` FOREIGN KEY (`cd_tipo_imovel`) REFERENCES `tb_tipo_imovel` (`cd_tipo_imovel`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_imovel`
--

LOCK TABLES `tb_imovel` WRITE;
/*!40000 ALTER TABLE `tb_imovel` DISABLE KEYS */;
INSERT INTO `tb_imovel` VALUES (1,'teste','11086-340','Rua René Baccarat','98','ft','Areia Branca','Santos','SP',1,1,1,1,1,NULL,'teste',1.00,1,1.00,1.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,2,3,2,'2019-04-04 23:36:36','2019-04-04 23:36:36',NULL);
/*!40000 ALTER TABLE `tb_imovel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_tipo_anunciante`
--

DROP TABLE IF EXISTS `tb_tipo_anunciante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_tipo_anunciante` (
  `cd_tipo_anunciante` int(11) NOT NULL AUTO_INCREMENT,
  `nm_tipo_anunciante` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cd_tipo_anunciante`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tipo_anunciante`
--

LOCK TABLES `tb_tipo_anunciante` WRITE;
/*!40000 ALTER TABLE `tb_tipo_anunciante` DISABLE KEYS */;
INSERT INTO `tb_tipo_anunciante` VALUES (1,'Proprietário'),(2,'Corretor'),(3,'Imobiliárias');
/*!40000 ALTER TABLE `tb_tipo_anunciante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_tipo_anuncio`
--

DROP TABLE IF EXISTS `tb_tipo_anuncio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_tipo_anuncio` (
  `cd_tipo_anuncio` int(11) NOT NULL AUTO_INCREMENT,
  `nm_tipo_anuncio` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cd_tipo_anuncio`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tipo_anuncio`
--

LOCK TABLES `tb_tipo_anuncio` WRITE;
/*!40000 ALTER TABLE `tb_tipo_anuncio` DISABLE KEYS */;
INSERT INTO `tb_tipo_anuncio` VALUES (1,'Venda'),(2,'Alugar'),(3,'Lançamento'),(4,'Comercial'),(5,'Temportada'),(6,'Permuta');
/*!40000 ALTER TABLE `tb_tipo_anuncio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_tipo_imovel`
--

DROP TABLE IF EXISTS `tb_tipo_imovel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_tipo_imovel` (
  `cd_tipo_imovel` int(11) NOT NULL AUTO_INCREMENT,
  `nm_tipo_imovel` varchar(255) DEFAULT NULL,
  `cd_categoria_imovel` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_tipo_imovel`),
  KEY `cd_categoria_imovel` (`cd_categoria_imovel`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tipo_imovel`
--

LOCK TABLES `tb_tipo_imovel` WRITE;
/*!40000 ALTER TABLE `tb_tipo_imovel` DISABLE KEYS */;
INSERT INTO `tb_tipo_imovel` VALUES (1,'Apartamento',1),(2,'Casa e Sobrado',1),(3,'Casa e Condomínio',1),(4,'Cobertura',1),(5,'Flat',1),(6,'Loft / Studio',1),(7,'Kitnet / Quarto',1),(8,'Sala / Conjunto',2),(9,'Imóveis novos',2),(10,'Imóvel comercial',2),(11,'Ponto Comercial / Loja',2),(12,'Galpão / Armazém',2),(13,'Lote / Terreno',3),(14,'Rural',3);
/*!40000 ALTER TABLE `tb_tipo_imovel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ic_juridica` tinyint(1) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cd_document` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cd_cep` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_endereco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_numero` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_complemento` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_bairro` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_cidade` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cd_uf` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_tratamento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `cd_document` (`cd_document`,`nm_bairro`,`nm_cidade`,`cd_uf`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'Hugo Barbato','hugobarbato@gmail.com',NULL,'$2y$10$QsX1L3VAHFDp.jp7e8/JKupiR24016HBWsFOn/1iYwDOTzKkSvoAS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-03-18 19:35:40','2019-03-18 19:35:40',NULL),(2,NULL,'Hugo B','hugobarbatto@gmail.com',NULL,'$2y$10$bZAxfuT3mXArCGZeB2mFdeXm5x1RWYYmvYfYqL0g8DfQtJ8dyOKQW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-04-03 20:53:59','2019-04-03 20:53:59',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-05 16:56:44
