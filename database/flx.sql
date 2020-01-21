-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 20-Jan-2020 às 23:37
-- Versão do servidor: 5.7.28-0ubuntu0.16.04.2
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
-- Stand-in structure for view `dashboard`
--
CREATE TABLE `dashboard` (
`ativos` decimal(23,0)
,`inativos` decimal(23,0)
,`teste` decimal(23,0)
,`admin` decimal(23,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `last_compra_user`
--
CREATE TABLE `last_compra_user` (
`cd_compra` int(11)
,`ic_tipo` tinyint(1)
,`cd_user` bigint(20) unsigned
,`cd_pacote` int(11)
,`cd_destaque` int(11)
,`vl_total` decimal(10,2)
,`ic_processado` tinyint(1)
,`cd_cupon` int(11)
,`cd_pagseguro` varchar(50)
,`created_at` timestamp
,`updated_at` timestamp
,`deleted_at` timestamp
);

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
-- Estrutura da tabela `tb_compra`
--

CREATE TABLE `tb_compra` (
  `cd_compra` int(11) NOT NULL,
  `ic_tipo` tinyint(1) NOT NULL DEFAULT '1',
  `cd_user` bigint(20) UNSIGNED NOT NULL,
  `cd_pacote` int(11) DEFAULT NULL,
  `cd_destaque` int(11) DEFAULT NULL,
  `vl_total` decimal(10,2) NOT NULL,
  `ic_processado` tinyint(1) DEFAULT '0' COMMENT '1 - Ativo, 2 - Inativo, 0 - Processando',
  `cd_cupon` int(11) DEFAULT NULL,
  `cd_pagseguro` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cupons`
--

CREATE TABLE `tb_cupons` (
  `cd_cupon` int(11) NOT NULL,
  `vl_cupon` decimal(10,2) NOT NULL,
  `ic_unico` tinyint(1) NOT NULL,
  `ic_ativo` tinyint(1) NOT NULL,
  `ic_usado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_destaques`
--

CREATE TABLE `tb_destaques` (
  `cd_destaque` int(11) NOT NULL,
  `qt_destaque` int(11) NOT NULL,
  `vl_destaque` decimal(10,2) NOT NULL,
  `ic_super` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
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
  `ic_ativo` tinyint(1) NOT NULL DEFAULT '1',
  `ic_destaque` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pacotes`
--

CREATE TABLE `tb_pacotes` (
  `cd_pacote` int(11) NOT NULL,
  `nm_titulo` varchar(100) NOT NULL,
  `qt_anuncio` int(11) NOT NULL,
  `vl_pacote` decimal(10,2) NOT NULL,
  `qt_destaques` int(11) DEFAULT NULL,
  `cd_status` tinyint(1) NOT NULL DEFAULT '1',
  `cd_pagseguro` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site`
--

CREATE TABLE `tb_site` (
  `cd_site` int(11) NOT NULL,
  `nm_site` varchar(255) DEFAULT NULL,
  `nm_titulo` varchar(255) DEFAULT NULL,
  `ds_site` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
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
  `nm_telefone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `users_bloqueados`
--
CREATE TABLE `users_bloqueados` (
`id` bigint(20) unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_user_qt_destaque`
--
CREATE TABLE `vw_user_qt_destaque` (
`cd_user` bigint(20) unsigned
,`qt_destaques` decimal(33,0)
,`qt_imoveis_destacados` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_user_qt_super_destaque`
--
CREATE TABLE `vw_user_qt_super_destaque` (
`cd_user` bigint(20) unsigned
,`qt_destaque` decimal(32,0)
,`qt_imoveis_destacados` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `dashboard`
--
DROP TABLE IF EXISTS `dashboard`;
-- em utilização(#1046 - No database selected)

-- --------------------------------------------------------

--
-- Structure for view `last_compra_user`
--
DROP TABLE IF EXISTS `last_compra_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`hugobarbatto`@`%` SQL SECURITY DEFINER VIEW `last_compra_user`  AS  select `B`.`cd_compra` AS `cd_compra`,`B`.`ic_tipo` AS `ic_tipo`,`B`.`cd_user` AS `cd_user`,`B`.`cd_pacote` AS `cd_pacote`,`B`.`cd_destaque` AS `cd_destaque`,`B`.`vl_total` AS `vl_total`,`B`.`ic_processado` AS `ic_processado`,`B`.`cd_cupon` AS `cd_cupon`,`B`.`cd_pagseguro` AS `cd_pagseguro`,`B`.`created_at` AS `created_at`,`B`.`updated_at` AS `updated_at`,`B`.`deleted_at` AS `deleted_at` from (((select max(`tb_compra`.`cd_compra`) AS `cd_compra` from `tb_compra` where (`tb_compra`.`ic_tipo` = 1) group by `tb_compra`.`cd_user`)) `A` join `tb_compra` `B` on((`A`.`cd_compra` = `B`.`cd_compra`))) ;

-- --------------------------------------------------------

--
-- Structure for view `users_bloqueados`
--
DROP TABLE IF EXISTS `users_bloqueados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`hugobarbatto`@`%` SQL SECURITY DEFINER VIEW `users_bloqueados`  AS  select `u`.`id` AS `id` from `users` `u` where ((cast(`u`.`created_at` as date) < (curdate() - interval 45 day)) and isnull((select `c`.`cd_compra` from `tb_compra` `c` where ((`c`.`cd_user` = `u`.`id`) and (`c`.`ic_processado` = 1))))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_user_qt_destaque`
--
DROP TABLE IF EXISTS `vw_user_qt_destaque`;
-- em utilização(#1046 - No database selected)

-- --------------------------------------------------------

--
-- Structure for view `vw_user_qt_super_destaque`
--
DROP TABLE IF EXISTS `vw_user_qt_super_destaque`;

CREATE ALGORITHM=UNDEFINED DEFINER=`hugobarbatto`@`%` SQL SECURITY DEFINER VIEW `vw_user_qt_super_destaque`  AS  select `tb_compra`.`cd_user` AS `cd_user`,sum(`tb_destaques`.`qt_destaque`) AS `qt_destaque`,(select count(0) from `tb_imovel` where ((`tb_imovel`.`ic_destaque` = 2) and (`tb_imovel`.`cd_user` = `tb_compra`.`cd_user`))) AS `qt_imoveis_destacados` from (`tb_compra` join `tb_destaques` on((`tb_destaques`.`cd_destaque` = `tb_compra`.`cd_destaque`))) where ((`tb_compra`.`ic_processado` in (3,4)) and (`tb_destaques`.`ic_super` = 1)) group by `tb_compra`.`cd_user` ;

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
-- Indexes for table `tb_compra`
--
ALTER TABLE `tb_compra`
  ADD PRIMARY KEY (`cd_compra`),
  ADD KEY `cd_cupon` (`cd_cupon`),
  ADD KEY `cd_pacote` (`cd_pacote`),
  ADD KEY `cd_user` (`cd_user`),
  ADD KEY `cd_destaque` (`cd_destaque`);

--
-- Indexes for table `tb_cupons`
--
ALTER TABLE `tb_cupons`
  ADD PRIMARY KEY (`cd_cupon`);

--
-- Indexes for table `tb_destaques`
--
ALTER TABLE `tb_destaques`
  ADD PRIMARY KEY (`cd_destaque`);

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
-- Indexes for table `tb_pacotes`
--
ALTER TABLE `tb_pacotes`
  ADD PRIMARY KEY (`cd_pacote`);

--
-- Indexes for table `tb_site`
--
ALTER TABLE `tb_site`
  ADD PRIMARY KEY (`cd_site`);

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
  MODIFY `cd_areas_comuns` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `tb_areas_privativas`
--
ALTER TABLE `tb_areas_privativas`
  MODIFY `cd_areas_privativas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tb_categoria_imovel`
--
ALTER TABLE `tb_categoria_imovel`
  MODIFY `cd_categoria_imovel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_compra`
--
ALTER TABLE `tb_compra`
  MODIFY `cd_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_cupons`
--
ALTER TABLE `tb_cupons`
  MODIFY `cd_cupon` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_destaques`
--
ALTER TABLE `tb_destaques`
  MODIFY `cd_destaque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_imagem`
--
ALTER TABLE `tb_imagem`
  MODIFY `cd_imagem` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12834;
--
-- AUTO_INCREMENT for table `tb_imovel`
--
ALTER TABLE `tb_imovel`
  MODIFY `cd_imovel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=840;
--
-- AUTO_INCREMENT for table `tb_pacotes`
--
ALTER TABLE `tb_pacotes`
  MODIFY `cd_pacote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_site`
--
ALTER TABLE `tb_site`
  MODIFY `cd_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
-- Limitadores para a tabela `tb_compra`
--
ALTER TABLE `tb_compra`
  ADD CONSTRAINT `fk_compra_cupon` FOREIGN KEY (`cd_cupon`) REFERENCES `tb_cupons` (`cd_cupon`),
  ADD CONSTRAINT `fk_compra_destaque` FOREIGN KEY (`cd_destaque`) REFERENCES `tb_destaques` (`cd_destaque`),
  ADD CONSTRAINT `fk_compra_pacote` FOREIGN KEY (`cd_pacote`) REFERENCES `tb_pacotes` (`cd_pacote`),
  ADD CONSTRAINT `fk_compra_user` FOREIGN KEY (`cd_user`) REFERENCES `users` (`id`);

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
