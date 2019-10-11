ALTER TABLE `tb_imovel` ADD `ic_ativo` TINYINT(1) NOT NULL DEFAULT '1' AFTER `cd_user`;
ALTER TABLE `tb_imovel` ADD `ic_destaque` TINYINT(1) NOT NULL DEFAULT '0' AFTER `ic_ativo`;
CREATE TABLE `flx`.`tb_pacotes` ( `cd_pacote` INT NOT NULL AUTO_INCREMENT ,  `nm_titulo` VARCHAR(100) NOT NULL ,  `qt_anuncio` INT NOT NULL ,  `vl_pacote` DECIMAL(10,2) NOT NULL ,  `qt_destaques` INT NULL ,  `created_at` TIMESTAMP NULL ,  `updated_at` TIMESTAMP NULL ,  `deleted_at` TIMESTAMP NULL ,    PRIMARY KEY  (`cd_pacote`));
CREATE TABLE `flx`.`tb_compra` ( `cd_compra` INT NOT NULL AUTO_INCREMENT ,  `cd_user` INT NOT NULL ,  `cd_pacote` INT NOT NULL ,  `vl_total` DECIMAL(10,2) NOT NULL ,  `ic_processado` TINYINT(1) NULL DEFAULT '0' ,  `created_at` TIMESTAMP NULL ,  `updated_at` TIMESTAMP NULL ,  `deleted_at` TIMESTAMP NULL ,    PRIMARY KEY  (`cd_compra`));
ALTER TABLE `tb_compra` ADD `cd_cupon` INT NULL AFTER `ic_processado`;
CREATE TABLE `flx`.`tb_cupons` ( `cd_cupon` INT NOT NULL AUTO_INCREMENT ,  `vl_cupon` DECIMAL(10,2) NOT NULL ,  `ic_unico` TINYINT(1) NOT NULL ,  `ic_ativo` TINYINT(1) NOT NULL ,  `ic_usado` TINYINT(1) NOT NULL ,  `created_at` TIMESTAMP NULL DEFAULT NULL ,  `updated_at` TIMESTAMP NULL DEFAULT NULL ,  `deleted_at` TIMESTAMP NULL DEFAULT NULL ,    PRIMARY KEY  (`cd_cupon`));
ALTER TABLE `tb_compra` ADD INDEX(`cd_cupon`);
ALTER TABLE `tb_compra` ADD INDEX(`cd_pacote`);
ALTER TABLE `tb_compra` ADD INDEX(`cd_user`);
ALTER TABLE `tb_compra` CHANGE `cd_user` `cd_user` BIGINT(20) UNSIGNED NOT NULL;
ALTER TABLE `tb_compra` ADD CONSTRAINT `fk_compra_user` FOREIGN KEY (`cd_user`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `tb_compra` ADD CONSTRAINT `fk_compra_pacote` FOREIGN KEY (`cd_pacote`) REFERENCES `tb_pacotes`(`cd_pacote`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `tb_compra` ADD CONSTRAINT `fk_compra_cupon` FOREIGN KEY (`cd_cupon`) REFERENCES `tb_cupons`(`cd_cupon`) ON DELETE RESTRICT ON UPDATE RESTRICT;

 
INSERT INTO `tb_pacotes` (`cd_pacote`, `nm_titulo`, `qt_anuncio`, `vl_pacote`, `qt_destaques`, `created_at`, `updated_at`, `deleted_at`) VALUES 
(NULL, 'PLANO 15', '15', '49.90', '1', '2019-10-03 00:00:00', '2019-10-03 00:00:00', NULL), 
(NULL, 'PLANO 25', '25', '59.90', '3', '2019-10-03 00:00:00', '2019-10-03 00:00:00', NULL);
INSERT INTO `tb_pacotes` (`cd_pacote`, `nm_titulo`, `qt_anuncio`, `vl_pacote`, `qt_destaques`, `created_at`, `updated_at`, `deleted_at`) VALUES 
(NULL, 'PLANO 50', '50', '79.90', '6', '2019-10-03 00:00:00', '2019-10-03 00:00:00', NULL), 
(NULL, 'PLANO 100', '100', '99.90', '10', '2019-10-03 00:00:00', '2019-10-03 00:00:00', NULL); 
INSERT INTO `tb_pacotes` (`cd_pacote`, `nm_titulo`, `qt_anuncio`, `vl_pacote`, `qt_destaques`, `created_at`, `updated_at`, `deleted_at`) VALUES 
(NULL, 'PLANO 250', '250', '199.90', '25', '2019-10-03 00:00:00', '2019-10-03 00:00:00', NULL), 
(NULL, 'PLANO ILIMITADO', '0', '499.90', '50', '2019-10-03 00:00:00', '2019-10-03 00:00:00', NULL); 


create view users_bloqueados as
SELECT id from users u
where (DATE(u.created_at) < CURDATE() - INTERVAL 45 DAY) and 
(
    SELECT c.cd_compra 
    from tb_compra c 
    where c.cd_user = u.id and
    c.ic_processado = 1 and 
    DATE(c.created_at) < CURDATE() - INTERVAL 31 DAY
) is null   