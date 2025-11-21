UPDATE law_firms SET deleted_at = CURRENT_TIMESTAMP();
UPDATE  lf SET lf.deleted_at = null
 from law_firms lf inner join ( 
select id from law_firms GROUP BY name
   ) sq
   on lf.id = sq.id
   where lf.id = sq.id