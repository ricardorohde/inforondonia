-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.1.8-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.3.0.5086
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

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
  CONSTRAINT `fk_menu_id_menu_tipo` FOREIGN KEY (`id_menu_tipo`) REFERENCES `menu_tipo` (`id_menu_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='Menu';

-- Copiando dados para a tabela _inforondonia_2016.menu: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
REPLACE INTO `menu` (`id_menu`, `id_menu_tipo`, `titulo`, `case`, `pagina`, `ico_menu`) VALUES
	(1, 1, 'Usuários', 'usuarios', '#', 'fa-users'),
	(2, 1, 'Eventos', 'eventos', '#', 'fa-camera'),
	(5, 1, 'Videos', 'videos', '#', 'fa-video-camera'),
	(6, 1, 'Notícias', 'noticias', '#', 'fa-bullhorn'),
	(7, 1, 'Colunistas', 'colunistas', '#', 'fa-comments'),
	(8, 1, 'TVs', 'tvs', '#', 'fa-desktop'),
	(9, 1, 'Institucional', 'institucional', '#', 'fa-bookmark'),
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
  CONSTRAINT `fk_menu_sub_id_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='Menu Sub';

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
	(14, 7, 'Listar Cadastros', 'colunistas', 'listar', 'fa-angle-double-right'),
	(15, 8, 'Novo Cadastro', 'tvs', 'cadastrar', 'fa-angle-double-right'),
	(16, 8, 'Listar Cadastros', 'tvs', 'listar', 'fa-angle-double-right'),
	(17, 9, 'Novo Cadastro', 'institucional', 'cadastrar', 'fa-angle-double-right'),
	(18, 9, 'Listar Cadastros', 'institucional', 'listar', 'fa-angle-double-right');
/*!40000 ALTER TABLE `menu_sub` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
