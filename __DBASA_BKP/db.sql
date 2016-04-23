-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.21 - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.3.0.5072
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela _inforondonia_2016.cotacao
DROP TABLE IF EXISTS `cotacao`;
CREATE TABLE IF NOT EXISTS `cotacao` (
  `id_cotacao` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) NOT NULL,
  `cotacao` float(15,2) NOT NULL,
  `variacao` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `atualizado` date NOT NULL,
  PRIMARY KEY (`id_cotacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Dados de cotação financeira de dolar, euro, bovespa.';

-- Copiando dados para a tabela _inforondonia_2016.cotacao: ~0 rows (aproximadamente)
DELETE FROM `cotacao`;
/*!40000 ALTER TABLE `cotacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `cotacao` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.enquete
DROP TABLE IF EXISTS `enquete`;
CREATE TABLE IF NOT EXISTS `enquete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` varchar(250) NOT NULL,
  `resp1` varchar(250) NOT NULL,
  `resp2` varchar(250) NOT NULL,
  `resp3` varchar(250) NOT NULL,
  `resp4` varchar(250) NOT NULL,
  `status` char(1) NOT NULL COMMENT 'A = Ativa | D = Desativada',
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `qm_cadastr` int(11) NOT NULL,
  `qm_alterou` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Informações sobre enquetes';

-- Copiando dados para a tabela _inforondonia_2016.enquete: ~0 rows (aproximadamente)
DELETE FROM `enquete`;
/*!40000 ALTER TABLE `enquete` DISABLE KEYS */;
/*!40000 ALTER TABLE `enquete` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.enquete_usuario
DROP TABLE IF EXISTS `enquete_usuario`;
CREATE TABLE IF NOT EXISTS `enquete_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_enquete` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Registrar os usuários que votaram';

-- Copiando dados para a tabela _inforondonia_2016.enquete_usuario: ~0 rows (aproximadamente)
DELETE FROM `enquete_usuario`;
/*!40000 ALTER TABLE `enquete_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `enquete_usuario` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.enquete_votos
DROP TABLE IF EXISTS `enquete_votos`;
CREATE TABLE IF NOT EXISTS `enquete_votos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_enquete` int(11) NOT NULL,
  `voto1` int(11) NOT NULL,
  `voto2` int(11) NOT NULL,
  `voto3` int(11) NOT NULL,
  `voto4` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Informações dos votos das respectivas enquetes';

-- Copiando dados para a tabela _inforondonia_2016.enquete_votos: ~0 rows (aproximadamente)
DELETE FROM `enquete_votos`;
/*!40000 ALTER TABLE `enquete_votos` DISABLE KEYS */;
/*!40000 ALTER TABLE `enquete_votos` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.menu
DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu_tipo` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `case` varchar(100) NOT NULL,
  `pagina` varchar(150) NOT NULL,
  `ico_menu` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_menu`),
  KEY `fk_menu_id_menutipo` (`id_menu_tipo`),
  CONSTRAINT `fkmenu_id_menu_tipo` FOREIGN KEY (`id_menu_tipo`) REFERENCES `menu_tipo` (`id_menu_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='Menu';

-- Copiando dados para a tabela _inforondonia_2016.menu: ~6 rows (aproximadamente)
DELETE FROM `menu`;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id_menu`, `id_menu_tipo`, `titulo`, `case`, `pagina`, `ico_menu`) VALUES
	(1, 1, 'Usuários', 'usuarios', '#', 'fa-users'),
	(2, 1, 'Eventos', 'eventos', '#', 'fa-camera'),
	(5, 1, 'Videos', 'videos', '#', 'fa-video-camera'),
	(6, 1, 'Notícias', 'noticias', '#', 'fa-bullhorn'),
	(14, 1, 'Banners', 'banners', '#', 'fa-photo'),
	(15, 1, 'Enquete', 'enquete', '#', 'fa-bar-chart');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.menu_sub
DROP TABLE IF EXISTS `menu_sub`;
CREATE TABLE IF NOT EXISTS `menu_sub` (
  `id_menu_sub` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `case` varchar(100) NOT NULL,
  `pagina` varchar(150) NOT NULL,
  `ico_menu` varchar(50) NOT NULL DEFAULT 'fa-angle-double-right',
  PRIMARY KEY (`id_menu_sub`),
  KEY `fkmenu_sub_id_menu` (`id_menu`),
  KEY `idx_menu_sub_titulo` (`titulo`),
  CONSTRAINT `fkmenu_sub_id_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='Menu Sub';

-- Copiando dados para a tabela _inforondonia_2016.menu_sub: ~12 rows (aproximadamente)
DELETE FROM `menu_sub`;
/*!40000 ALTER TABLE `menu_sub` DISABLE KEYS */;
INSERT INTO `menu_sub` (`id_menu_sub`, `id_menu`, `titulo`, `case`, `pagina`, `ico_menu`) VALUES
	(1, 1, 'Novo Cadastro', 'usuarios', 'cadastrar', 'fa-angle-double-right'),
	(2, 1, 'Listar Cadastros', 'usuarios', 'listar', 'fa-angle-double-right'),
	(3, 2, 'Novo Cadastro', 'eventos', 'cadastrar', 'fa-angle-double-right'),
	(4, 2, 'Listar Cadastros', 'eventos', 'listar', 'fa-angle-double-right'),
	(5, 6, 'Novo Cadastro', 'noticias', 'cadastrar', 'fa-angle-double-right'),
	(6, 6, 'Listar Cadastros', 'noticias', 'listar', 'fa-angle-double-right'),
	(7, 5, 'Novo Cadastro', 'videos', 'cadastrar', 'fa-angle-double-right'),
	(8, 5, 'Listar Cadastros', 'videos', 'listar', 'fa-angle-double-right'),
	(9, 14, 'Novo Cadastro', 'banners', 'cadastrar', 'fa-angle-double-right'),
	(10, 14, 'Listar Cadastros', 'banners', 'listar', 'fa-angle-double-right'),
	(11, 15, 'Novo Cadastro', 'enquete', 'cadastrar', 'fa-angle-double-right'),
	(12, 15, 'Listar Cadastros', 'enquete', 'listar', 'fa-angle-double-right');
/*!40000 ALTER TABLE `menu_sub` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.menu_sub_nav
DROP TABLE IF EXISTS `menu_sub_nav`;
CREATE TABLE IF NOT EXISTS `menu_sub_nav` (
  `id_menu_sub_nav` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu_sub` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `case` varchar(100) NOT NULL,
  `pagina` varchar(150) NOT NULL,
  `ico_menu` varchar(50) NOT NULL DEFAULT 'fa-angle-double-right',
  PRIMARY KEY (`id_menu_sub_nav`),
  KEY `fkmenu_sub_id_menu_sub` (`id_menu_sub`),
  CONSTRAINT `fkmenu_sub_id_menu_sub` FOREIGN KEY (`id_menu_sub`) REFERENCES `menu_sub` (`id_menu_sub`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Menu Sub Nav';

-- Copiando dados para a tabela _inforondonia_2016.menu_sub_nav: ~0 rows (aproximadamente)
DELETE FROM `menu_sub_nav`;
/*!40000 ALTER TABLE `menu_sub_nav` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu_sub_nav` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.noticias_categoria
DROP TABLE IF EXISTS `noticias_categoria`;
CREATE TABLE IF NOT EXISTS `noticias_categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  `cat_url` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='Categorias das Noticias';

-- Copiando dados para a tabela _inforondonia_2016.noticias_categoria: ~18 rows (aproximadamente)
DELETE FROM `noticias_categoria`;
/*!40000 ALTER TABLE `noticias_categoria` DISABLE KEYS */;
INSERT INTO `noticias_categoria` (`id_categoria`, `categoria`, `cat_url`) VALUES
	(1, 'POLÍTICA', 'politica'),
	(2, 'ESPORTE', 'esporte'),
	(3, 'CULTURA', 'cultura'),
	(4, 'POLICIAL', 'policial'),
	(5, 'GERAL', 'geral'),
	(6, 'ENTRETENIMENTO', 'entretenimento'),
	(7, 'JUSTIÇA', 'justica'),
	(8, 'CONCURSOS', 'concursos'),
	(9, 'ACIDENTES', 'acidentes'),
	(10, 'SAÚDE', 'saude'),
	(11, 'ECONOMIA', 'economia'),
	(12, 'EDUCAÇÃO', 'educacao'),
	(13, 'TECNOLOGIA', 'tecnologia'),
	(14, 'SOCIAL', 'social'),
	(15, 'RONDÔNIA', 'rondonia'),
	(16, 'MUNDO', 'mundo'),
	(17, 'BRASIL', 'brasil'),
	(18, 'CULINÁRIA', 'culinaria');
/*!40000 ALTER TABLE `noticias_categoria` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
