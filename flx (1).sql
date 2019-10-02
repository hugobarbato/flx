-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 01-Out-2019 às 20:48
-- Versão do servidor: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 5.6.38-3+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flx`
--

--
-- Extraindo dados da tabela `tb_areas_comuns`
--

INSERT INTO `tb_areas_comuns` (`cd_areas_comuns`, `nm_areas_comuns`, `cd_categoria_imovel`, `created_at`, `updated_at`) VALUES
(1, 'playground', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(41, 'brinquedoteca', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(42, 'salão de festas', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(43, 'salão de festas infantil', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(44, 'salão de jogos', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(45, 'espaço gourmet', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(46, 'espaço mulher', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(47, 'home office', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(48, 'quadra poliesportiva', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(49, 'quadra de tênis', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(50, 'quadra de squash', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(51, 'piscina adulto', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(52, 'piscina infantil', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(53, 'sauna seca', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(54, 'sauna úmida', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(55, 'churrasqueira', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(56, 'praça de convivéncia', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(57, 'SOLARIUM', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(58, 'fitness', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(59, 'bicicletário', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(60, 'spa', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(61, 'pet place', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(62, 'lavanderia', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(63, 'wi-fi nas áreas comuns', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(64, 'biometria', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(65, 'portaria blindada', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(66, 'câmeras de segurança', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(67, 'Lounge Bar', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(68, 'pista de cooper', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(69, 'ciclovia', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(70, 'vagas para visitantes', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(71, 'vaga para carro elétrico', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(72, 'aquecimento solar', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(73, 'serviços pay per use', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(74, 'gerador', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(75, 'iluminação em led', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(76, 'bike sharing', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(77, 'horta', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(78, 'Quadra Gramada', 1, '2019-04-25 03:00:00', '2019-04-25 03:00:00'),
(79, 'Piscina Coberta e Aquecida', 1, '2019-04-25 03:00:00', '2019-04-25 03:00:00'),
(80, 'Forno de Pizza', 1, '2019-04-25 03:00:00', '2019-04-25 03:00:00'),
(81, 'Deck Molhado', 1, '2019-04-25 03:00:00', '2019-04-25 03:00:00'),
(82, 'Redário', 1, '2019-04-25 03:00:00', '2019-04-25 03:00:00'),
(83, 'Sala de massagem', 1, '2019-04-25 03:00:00', '2019-04-25 03:00:00'),
(84, 'Cinema', 1, '2019-04-25 03:00:00', '2019-04-25 03:00:00'),
(85, 'Lan house', 1, '2019-04-25 03:00:00', '2019-04-25 03:00:00'),
(86, 'Hidromassagem', 1, '2019-05-07 03:00:00', '2019-05-07 03:00:00'),
(87, 'Coworking', 1, '2019-05-07 03:00:00', '2019-05-07 03:00:00'),
(88, 'Lounge na Cobertura', 1, '2019-05-07 03:00:00', '2019-05-07 03:00:00'),
(89, 'Fitness com Pilates', 1, '2019-05-07 03:00:00', '2019-05-07 03:00:00'),
(90, 'Espaço Teen', 1, '2019-05-07 03:00:00', '2019-05-07 03:00:00'),
(91, 'Sala de Estudo', 1, '2019-05-07 03:00:00', '2019-05-07 03:00:00'),
(92, 'Sala de Games', 1, '2019-05-07 03:00:00', '2019-05-07 03:00:00'),
(93, 'Pista de Skate', 1, '2019-05-07 03:00:00', '2019-05-07 03:00:00'),
(94, 'Agility Dog', 1, '2019-05-07 03:00:00', '2019-05-07 03:00:00'),
(95, 'Cozinha Compartilhada', 1, '2019-05-07 03:00:00', '2019-05-07 03:00:00'),
(96, 'Utensílios compartilhados', 1, '2019-05-07 03:00:00', '2019-05-07 03:00:00'),
(97, 'Guarda Entregas', 1, '2019-05-07 03:00:00', '2019-05-07 03:00:00'),
(98, 'Porte Cocheré', 1, '2019-05-07 03:00:00', '2019-05-07 03:00:00'),
(99, 'Mall', 1, '2019-05-07 03:00:00', '2019-05-07 03:00:00'),
(100, 'Loja de Conveniência', 1, '2019-05-07 03:00:00', '2019-05-07 03:00:00'),
(101, 'Port Cochére', 2, '2019-05-18 00:11:22', '2019-05-18 00:11:22'),
(102, 'Estacionamento Rotativo', 2, '2019-05-18 00:11:22', '2019-05-18 00:11:22'),
(103, 'Bicicletário', 2, '2019-05-18 00:11:22', '2019-05-18 00:11:22'),
(104, 'Praça / Jardins', 2, '2019-05-18 00:11:22', '2019-05-18 00:11:22'),
(105, 'Gerador', 2, '2019-05-18 00:11:22', '2019-05-18 00:11:22'),
(106, 'Café', 2, '2019-05-18 00:11:22', '2019-05-18 00:11:22'),
(107, 'Espaço de Convivência', 2, '2019-05-18 00:11:22', '2019-05-18 00:11:22'),
(108, 'Quadra de Tênis', 2, '2019-05-18 00:11:22', '2019-05-18 00:11:22'),
(109, 'Beaulty Center', 2, '2019-05-18 00:11:22', '2019-05-18 00:11:22'),
(110, 'Hall com Pé Direito Duplo', 2, '2019-05-18 00:11:22', '2019-05-18 00:11:22'),
(111, 'Quadra Recreativa', 2, '2019-05-18 00:11:22', '2019-05-18 00:11:22'),
(112, 'Sala de Reunião', 2, '2019-05-18 00:11:22', '2019-05-18 00:11:22'),
(113, 'CPTV para Monitoramento ', 2, '2019-05-18 00:11:22', '2019-05-18 00:11:22'),
(114, 'Fitness', 2, '2019-05-18 00:11:22', '2019-05-18 00:11:22'),
(115, 'Auditório', 2, '2019-05-18 00:11:22', '2019-05-18 00:11:22');

--
-- Extraindo dados da tabela `tb_areas_privativas`
--

INSERT INTO `tb_areas_privativas` (`cd_areas_privativas`, `nm_areas_privativas`, `cd_categoria_imovel`, `created_at`, `updated_at`) VALUES
(1, 'fechadura digital', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(2, 'persianas de enrolar', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(3, 'terraço gourmet', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(4, 'tomadas usb', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(5, 'infra ar-condicionado', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(6, 'piso terraço nivelado', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(7, 'bacia dual flush', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(8, 'misturador de água quente', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(10, 'vagas demarcadas', 1, '2019-04-06 03:00:00', '2019-04-06 03:00:00'),
(11, 'Piso Laminado', 1, '2019-04-25 03:00:00', '2019-04-25 03:00:00'),
(12, 'Piso porcelanato', 1, '2019-04-25 03:00:00', '2019-04-25 03:00:00'),
(13, 'Hidromassagem', 1, '2019-04-25 03:00:00', '2019-04-25 03:00:00'),
(14, 'Lavabo ', 1, '2019-04-27 03:00:00', '2019-04-27 03:00:00'),
(15, 'Armários', 1, '2019-04-27 03:00:00', '2019-04-27 03:00:00'),
(16, 'Dependência de Empregada', 1, '2019-05-07 03:00:00', '2019-05-07 03:00:00'),
(17, 'Ar Condicionado', 1, '2019-05-07 03:00:00', '2019-05-07 03:00:00'),
(18, 'O Furô', 1, '2019-05-07 03:00:00', '2019-05-07 03:00:00'),
(19, 'Luminárias', 1, '2019-05-07 03:00:00', '2019-05-07 03:00:00'),
(20, 'Lareira', 1, '2019-05-07 03:00:00', '2019-05-07 03:00:00'),
(21, 'Fechadura Eletrônica', 2, '2019-05-18 00:15:08', '2019-05-18 00:15:08'),
(22, 'Luminárias', 2, '2019-05-18 00:15:08', '2019-05-18 00:15:08'),
(23, 'Ar-Condicionado', 2, '2019-05-18 00:15:08', '2019-05-18 00:15:08'),
(24, 'Piso Elevado', 2, '2019-05-18 00:15:08', '2019-05-18 00:15:08'),
(25, 'Sala de Espera', 2, '2019-05-18 00:15:08', '2019-05-18 00:15:08'),
(26, 'Infra para Ar-Condicionado', 2, '2019-05-18 00:15:08', '2019-05-18 00:15:08'),
(27, 'Teto Rebaixado', 2, '2019-05-18 00:15:08', '2019-05-18 00:15:08'),
(28, 'Terraço', 2, '2019-05-18 00:15:08', '2019-05-18 00:15:08'),
(29, 'Armários / Mobiliado', 2, '2019-05-18 00:15:08', '2019-05-18 00:15:08');

--
-- Extraindo dados da tabela `tb_categoria_imovel`
--

INSERT INTO `tb_categoria_imovel` (`cd_categoria_imovel`, `nm_categoria_imovel`) VALUES
(1, 'Residencial'),
(2, 'Comercial'),
(3, 'Outros');

--
-- Extraindo dados da tabela `tb_tipo_anunciante`
--

INSERT INTO `tb_tipo_anunciante` (`cd_tipo_anunciante`, `nm_tipo_anunciante`) VALUES
(1, 'Proprietário'),
(2, 'Corretor'),
(3, 'Imobiliárias'),
(4, 'Incorporadora');

--
-- Extraindo dados da tabela `tb_tipo_anuncio`
--

INSERT INTO `tb_tipo_anuncio` (`cd_tipo_anuncio`, `nm_tipo_anuncio`) VALUES
(1, 'Venda'),
(2, 'Alugar'),
(3, 'Lançamento'),
(4, 'Comercial'),
(5, 'Temporada'),
(6, 'Permuta');

--
-- Extraindo dados da tabela `tb_tipo_imovel`
--

INSERT INTO `tb_tipo_imovel` (`cd_tipo_imovel`, `nm_tipo_imovel`, `cd_categoria_imovel`) VALUES
(1, 'Apartamento', 1),
(2, 'Casa e Sobrado', 1),
(3, 'Casa e Condomínio', 1),
(4, 'Cobertura', 1),
(5, 'Flat', 1),
(6, 'Loft/Studio', 1),
(7, 'Kitnet/Quarto', 1),
(8, 'Sala/Conjunto', 2),
(9, 'Imóveis novos', 2),
(10, 'Imóvel comercial', 2),
(11, 'Ponto Comercial/Loja', 2),
(12, 'Galpão/Armazém', 2),
(13, 'Lote/Terreno', 3),
(14, 'Rural', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
