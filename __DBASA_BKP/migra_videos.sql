CREATE TABLE `noticias_videos` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`id_noticia` INT(11) NOT NULL,
	`video` VARCHAR(100) NULL DEFAULT NULL,
	`capa` VARCHAR(100) NULL DEFAULT NULL,
	PRIMARY KEY (`id`),
	INDEX `fk_noticias_videos_id_noticia` (`id_noticia`),
	CONSTRAINT `fk_noticias_videos_id_noticia` FOREIGN KEY (`id_noticia`) REFERENCES `noticias` (`id`)
)
COMMENT='Videos vinculados as noticias'
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=8;

-- Migra Videos para tabela noticias_videos
INSERT noticias_videos (id_noticia, video, capa)
SELECT
  n.id,
  REPLACE(SUBSTR(n.video, LOCATE('v=', n.video)+2),'&featur','') AS video,
  CONCAT('http://i1.ytimg.com/vi/', REPLACE(SUBSTR(n.video, LOCATE('v=', n.video)+2),'&featur',''), '/hqdefault.jpg') as capa
  FROM noticias n
 WHERE n.video != '';

ALTER TABLE `noticias`
 DROP COLUMN `video`;
