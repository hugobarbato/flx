-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 29-Set-2019 às 20:02
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_areas_comuns`
--

CREATE TABLE `tb_areas_comuns` (
  `cd_areas_comuns` int(11) NOT NULL,
  `nm_areas_comuns` varchar(255) NOT NULL,
  `cd_categoria_imovel` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_areas_privativas`
--

CREATE TABLE `tb_areas_privativas` (
  `cd_areas_privativas` int(11) NOT NULL,
  `nm_areas_privativas` varchar(255) DEFAULT NULL,
  `cd_categoria_imovel` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categoria_imovel`
--

CREATE TABLE `tb_categoria_imovel` (
  `cd_categoria_imovel` int(11) NOT NULL,
  `nm_categoria_imovel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imagem`
--

CREATE TABLE `tb_imagem` (
  `cd_imagem` bigint(20) UNSIGNED NOT NULL,
  `nm_imagem` varchar(100) NOT NULL,
  `nm_descricao` varchar(255) DEFAULT NULL,
  `nm_link` varchar(500) NOT NULL,
  `nm_link_sm` varchar(255) DEFAULT NULL,
  `nm_link_md` varchar(255) DEFAULT NULL,
  `cd_imovel` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imovel`
--

CREATE TABLE `tb_imovel` (
  `cd_imovel` bigint(20) UNSIGNED NOT NULL,
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
  `ic_status` tinyint(1) DEFAULT NULL,
  `dt_previsao_entrega` date DEFAULT NULL,
  `cd_classificacao_hotel` int(11) DEFAULT NULL,
  `vl_distancia_centro` decimal(10,2) DEFAULT NULL,
  `ic_animais` tinyint(1) DEFAULT NULL,
  `vl_diaria` decimal(10,2) DEFAULT NULL,
  `vl_promocao` int(2) DEFAULT NULL,
  `ic_cancelamento_diaria` tinyint(1) DEFAULT NULL,
  `cd_image_anunciante` bigint(20) UNSIGNED DEFAULT NULL,
  `nm_link_youtube` varchar(500) DEFAULT NULL,
  `ic_permuta` tinyint(1) NOT NULL DEFAULT '0',
  `ic_valor_mensagem` tinyint(1) DEFAULT '1',
  `cd_tipo_anunciante` int(11) DEFAULT NULL,
  `cd_tipo_anuncio` int(11) DEFAULT NULL,
  `cd_tipo_imovel` int(11) DEFAULT NULL,
  `cd_user` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_anunciante`
--

CREATE TABLE `tb_tipo_anunciante` (
  `cd_tipo_anunciante` int(11) NOT NULL,
  `nm_tipo_anunciante` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_anuncio`
--

CREATE TABLE `tb_tipo_anuncio` (
  `cd_tipo_anuncio` int(11) NOT NULL,
  `nm_tipo_anuncio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_imovel`
--

CREATE TABLE `tb_tipo_imovel` (
  `cd_tipo_imovel` int(11) NOT NULL,
  `nm_tipo_imovel` varchar(255) DEFAULT NULL,
  `cd_categoria_imovel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tb_areas_comuns`
--
ALTER TABLE `tb_areas_comuns`
  ADD PRIMARY KEY (`cd_areas_comuns`),
  ADD KEY `cd_categoria_imovel` (`cd_categoria_imovel`);

--
-- Indexes for table `tb_areas_privativas`
--
ALTER TABLE `tb_areas_privativas`
  ADD PRIMARY KEY (`cd_areas_privativas`),
  ADD KEY `cd_areas_comuns` (`cd_categoria_imovel`);

--
-- Indexes for table `tb_categoria_imovel`
--
ALTER TABLE `tb_categoria_imovel`
  ADD PRIMARY KEY (`cd_categoria_imovel`);

--
-- Indexes for table `tb_imagem`
--
ALTER TABLE `tb_imagem`
  ADD PRIMARY KEY (`cd_imagem`),
  ADD KEY `cd_imovel` (`cd_imovel`);

--
-- Indexes for table `tb_imovel`
--
ALTER TABLE `tb_imovel`
  ADD PRIMARY KEY (`cd_imovel`),
  ADD KEY `cd_cep` (`cd_cep`),
  ADD KEY `nm_bairro` (`nm_bairro`),
  ADD KEY `nm_cidade` (`nm_cidade`),
  ADD KEY `cd_uf` (`cd_uf`),
  ADD KEY `qt_quartos` (`qt_quartos`),
  ADD KEY `qt_suites` (`qt_suites`),
  ADD KEY `qt_banheiro` (`qt_banheiro`),
  ADD KEY `qt_vagas` (`qt_vagas`),
  ADD KEY `vl_area_util` (`vl_area_util`),
  ADD KEY `vl_area_total` (`vl_area_total`),
  ADD KEY `cd_forma_pagamento` (`cd_forma_pagamento`),
  ADD KEY `cd_classificacao_hotel` (`cd_classificacao_hotel`),
  ADD KEY `cd_user` (`cd_user`),
  ADD KEY `cd_tipo_imovel` (`cd_tipo_imovel`),
  ADD KEY `cd_tipo_anuncio` (`cd_tipo_anuncio`),
  ADD KEY `cd_tipo_anunciante` (`cd_tipo_anunciante`),
  ADD KEY `ic_cancelamento_diaria` (`ic_cancelamento_diaria`),
  ADD KEY `vl_diaria` (`vl_diaria`),
  ADD KEY `vl_promocao` (`vl_promocao`),
  ADD KEY `ic_animais` (`ic_animais`),
  ADD KEY `cd_image_anunciante` (`cd_image_anunciante`);

--
-- Indexes for table `tb_tipo_anunciante`
--
ALTER TABLE `tb_tipo_anunciante`
  ADD PRIMARY KEY (`cd_tipo_anunciante`);

--
-- Indexes for table `tb_tipo_anuncio`
--
ALTER TABLE `tb_tipo_anuncio`
  ADD PRIMARY KEY (`cd_tipo_anuncio`);

--
-- Indexes for table `tb_tipo_imovel`
--
ALTER TABLE `tb_tipo_imovel`
  ADD PRIMARY KEY (`cd_tipo_imovel`),
  ADD KEY `cd_categoria_imovel` (`cd_categoria_imovel`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `cd_document` (`cd_document`,`nm_bairro`,`nm_cidade`,`cd_uf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_areas_comuns`
--
ALTER TABLE `tb_areas_comuns`
  MODIFY `cd_areas_comuns` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `tb_areas_privativas`
--
ALTER TABLE `tb_areas_privativas`
  MODIFY `cd_areas_privativas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tb_categoria_imovel`
--
ALTER TABLE `tb_categoria_imovel`
  MODIFY `cd_categoria_imovel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_imagem`
--
ALTER TABLE `tb_imagem`
  MODIFY `cd_imagem` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8651;
--
-- AUTO_INCREMENT for table `tb_imovel`
--
ALTER TABLE `tb_imovel`
  MODIFY `cd_imovel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=622;
--
-- AUTO_INCREMENT for table `tb_tipo_anunciante`
--
ALTER TABLE `tb_tipo_anunciante`
  MODIFY `cd_tipo_anunciante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_tipo_anuncio`
--
ALTER TABLE `tb_tipo_anuncio`
  MODIFY `cd_tipo_anuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_tipo_imovel`
--
ALTER TABLE `tb_tipo_imovel`
  MODIFY `cd_tipo_imovel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_areas_comuns`
--
ALTER TABLE `tb_areas_comuns`
  ADD CONSTRAINT `tb_categoria_imovel_tb_areas_comuns` FOREIGN KEY (`cd_categoria_imovel`) REFERENCES `tb_categoria_imovel` (`cd_categoria_imovel`);

--
-- Limitadores para a tabela `tb_areas_privativas`
--
ALTER TABLE `tb_areas_privativas`
  ADD CONSTRAINT `tb_categoria_imovel_tb_areas_privativas` FOREIGN KEY (`cd_categoria_imovel`) REFERENCES `tb_categoria_imovel` (`cd_categoria_imovel`);

--
-- Limitadores para a tabela `tb_imagem`
--
ALTER TABLE `tb_imagem`
  ADD CONSTRAINT `fk_imovel_imagem` FOREIGN KEY (`cd_imovel`) REFERENCES `tb_imovel` (`cd_imovel`);

--
-- Limitadores para a tabela `tb_imovel`
--
ALTER TABLE `tb_imovel`
  ADD CONSTRAINT `fk_imagem_anunciante` FOREIGN KEY (`cd_image_anunciante`) REFERENCES `tb_imagem` (`cd_imagem`),
  ADD CONSTRAINT `imovel_user` FOREIGN KEY (`cd_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tb_imovel_ibfk_1` FOREIGN KEY (`cd_tipo_anuncio`) REFERENCES `tb_tipo_anuncio` (`cd_tipo_anuncio`),
  ADD CONSTRAINT `tipo_anunciante` FOREIGN KEY (`cd_tipo_anunciante`) REFERENCES `tb_tipo_anunciante` (`cd_tipo_anunciante`),
  ADD CONSTRAINT `tipo_imovel` FOREIGN KEY (`cd_tipo_imovel`) REFERENCES `tb_tipo_imovel` (`cd_tipo_imovel`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
