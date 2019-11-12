select `u`.`id` AS `id` 
from `flx`.`users` `u` 
where 
((cast(`u`.`created_at` as date) < (curdate() - interval 45 day)) and
 isnull((
   select `c`.`cd_compra` 
   from `flx`.`tb_compra` `c` 
   where ((`c`.`cd_user` = `u`.`id`) 
   and (`c`.`ic_processado` = 1) 
   and (cast(`c`.`updated_at` as date) < (curdate() - interval 31 day)
   )
   )
  )
))


select 
  `a`.`ativos` AS `ativos`,
  `b`.`inativos` AS `inativos`,
  `c`.`teste` AS `teste` 
  from 
  (
    select count(0) AS `ativos` 
    from `flx`.`tb_imovel` 
    where (`flx`.`tb_imovel`.`ic_ativo` = 1)
  ) `a` 
  join (
    select count(0) AS `inativos`
     from `flx`.`tb_imovel` 
     where (`flx`.`tb_imovel`.`ic_ativo` = 0)
  ) `b` 
  join (select count(0) AS `teste` from (`flx`.`tb_imovel` `i` left join `flx`.`users` `u` on((`u`.`id` = `i`.`cd_user`))) where ()) `c`


Select 
  SUM(
      IF(
        (
          tb_imovel.ic_ativo = 1 
          OR tb_compra.cd_compra  is not null 
        ) 
        AND cast(`u`.`created_at` as date) < (curdate() - interval 45 day) 
        AND u.is_admin =  0
      , 1 , 0 )
  ) as `ativos`,
  SUM(
      IF( 
        (
          tb_imovel.ic_ativo = 0 
          OR tb_compra.cd_compra  is null 
        ) 
        AND cast(`u`.`created_at` as date) < (curdate() - interval 45 day)
        AND u.is_admin =  0

      , 1 , 0 )) as `inativos`,
  SUM( 
      IF( 
        cast(`u`.`created_at` as date) > (curdate() - interval 45 day) 
        AND u.is_admin =  0
      , 1 , 0 ) 
  ) as `teste`,
  SUM( 
      IF(  
        u.is_admin =  1
      , 1 , 0 ) 
  ) as `admin`
FROM users u
  inner join tb_imovel on tb_imovel.cd_user = u.id
  left join tb_compra on ic_processado = 1 and tb_compra.cd_user = u.id