-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.1.8-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.3.0.5072
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela _inforondonia_2016.colunistas
DROP TABLE IF EXISTS `colunistas`;
CREATE TABLE IF NOT EXISTS `colunistas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_name` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobre` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `qm_cadastr` int(11) NOT NULL,
  `qm_alterou` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Informações de Colunistas';

-- Copiando dados para a tabela _inforondonia_2016.colunistas: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `colunistas` DISABLE KEYS */;
REPLACE INTO `colunistas` (`id`, `url_name`, `nome`, `sobre`, `foto`, `data`, `qm_cadastr`, `qm_alterou`) VALUES
	(1, 'neri-de-paula-carneiro', 'Neri de Paula Carneiro', '<p>Mestre em educa&ccedil;&atilde;o, fil&oacute;sofo, te&oacute;logo, historiador - Rolim de Moura - RO</p>\r\n\r\n<p>&nbsp;</p>', 'colunistas/2016/04/neri-de-paula-carneiro.jpg', '2016-04-26 22:40:05', 1, 1),
	(2, 'jose-de-arimatea-dos-santos', 'José de Arimatéa dos Santos', '<p>Professor</p>', 'colunistas/2016/04/jose-de-arimatea-dos-santos.jpg', '2016-04-26 22:32:29', 1, NULL);
/*!40000 ALTER TABLE `colunistas` ENABLE KEYS */;

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

-- Copiando dados para a tabela _inforondonia_2016.menu: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
REPLACE INTO `menu` (`id_menu`, `id_menu_tipo`, `titulo`, `case`, `pagina`, `ico_menu`) VALUES
	(1, 1, 'Usuários', 'usuarios', '#', 'fa-users'),
	(2, 1, 'Eventos', 'eventos', '#', 'fa-camera'),
	(5, 1, 'Videos', 'videos', '#', 'fa-video-camera'),
	(6, 1, 'Notícias', 'noticias', '#', 'fa-bullhorn'),
	(7, 1, 'Colunistas', 'colunistas', '#', 'fa-comments'),
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='Menu Sub';

-- Copiando dados para a tabela _inforondonia_2016.menu_sub: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `menu_sub` DISABLE KEYS */;
REPLACE INTO `menu_sub` (`id_menu_sub`, `id_menu`, `titulo`, `case`, `pagina`, `ico_menu`) VALUES
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
	(12, 15, 'Listar Cadastros', 'enquete', 'listar', 'fa-angle-double-right'),
	(13, 7, 'Novo Cadastro', 'colunistas', 'cadastrar', 'fa-angle-double-right'),
	(14, 7, 'Listar Cadastros', 'colunistas', 'listar', 'fa-angle-double-right');
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
/*!40000 ALTER TABLE `menu_sub_nav` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu_sub_nav` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.menu_tipo
DROP TABLE IF EXISTS `menu_tipo`;
CREATE TABLE IF NOT EXISTS `menu_tipo` (
  `id_menu_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_menu_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Menu Tipo';

-- Copiando dados para a tabela _inforondonia_2016.menu_tipo: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `menu_tipo` DISABLE KEYS */;
REPLACE INTO `menu_tipo` (`id_menu_tipo`, `tipo`) VALUES
	(1, 'painel_adm_sidebar'),
	(2, 'painel_est_sidebar');
/*!40000 ALTER TABLE `menu_tipo` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_name` varchar(255) DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `data_nasc` date DEFAULT NULL,
  `sexo` int(1) DEFAULT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `ativo` varchar(1) DEFAULT 's',
  `nivel` int(1) DEFAULT NULL,
  `cont_acesso` int(11) unsigned DEFAULT '0',
  `ip` varchar(30) DEFAULT NULL,
  `ultimo_acesso` timestamp NULL DEFAULT NULL,
  `qm_cadastr` int(9) DEFAULT NULL,
  `dt_cadastr` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `qm_alterou` int(9) DEFAULT NULL,
  `dt_alterou` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Armazena informações dos usuarios do painel';

-- Copiando dados para a tabela _inforondonia_2016.usuarios: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
REPLACE INTO `usuarios` (`id`, `url_name`, `nome`, `email`, `data_nasc`, `sexo`, `login`, `senha`, `foto`, `ativo`, `nivel`, `cont_acesso`, `ip`, `ultimo_acesso`, `qm_cadastr`, `dt_cadastr`, `qm_alterou`, `dt_alterou`) VALUES
	(1, 'creative-websites', 'Creative Websites', 'suporte@creativewebsites.com.br', '2015-02-14', 1, 'creative', '19d910ef608e4947aa0c6dcee352a3e8', 'usuarios/2015/03/creative.jpeg', 's', 1, 44, '::1', '2015-02-13 22:33:25', 1, NULL, 1, '2015-03-25 21:57:12'),
	(2, 'ricardo-barros-silva', 'Ricardo Barros Silva', 'rikbarros10@hotmail.com', '1983-04-10', 1, 'rikbarros10', '4badaee57fed5610012a296273158f5f', 'usuarios/2016/04/rikbarros10.jpg', 's', 1, 14, '201.7.18.44', NULL, 1, '2016-04-13 22:19:56', 2, '2016-04-23 18:07:28'),
	(3, 'luiz-alberto-vicente-ferreira', 'Luiz Alberto Vicente Ferreira', 'luiz_bad@hotmail.com', '1993-02-10', 1, 'luizalberto', '30acd2ea1c996b05cf480c6c29cace72', 'usuarios/2016/04/luizalberto.jpg', 's', 1, 5, '179.243.144.159', NULL, 2, '2016-04-13 22:25:18', NULL, NULL),
	(5, 'fernanda-sol', 'Fernanda Sol ', 'nataliassol@hotmail.com', '1981-12-25', 2, 'nataliassol', '4badaee57fed5610012a296273158f5f', 'usuarios/2016/04/nataliassol.jpg', 's', 1, 5, '201.88.37.254', '2016-04-25 13:59:33', 2, '2016-04-23 18:12:16', 1, '2016-04-26 21:27:52');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
