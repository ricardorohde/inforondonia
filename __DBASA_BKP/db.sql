-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.1.8-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.3.0.5071
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela _inforondonia_2016.banners
DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `data_inicial` date DEFAULT NULL,
  `data_final` date DEFAULT NULL,
  `data_atual` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `qm_cadastr` int(9) DEFAULT NULL,
  `qm_alterou` int(9) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `banner` (`banner`),
  KEY `titulo` (`titulo`),
  KEY `fk_banners_tipo` (`tipo`),
  CONSTRAINT `fk_banners_tipo` FOREIGN KEY (`tipo`) REFERENCES `banners_tipo` (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8 COMMENT='Armazena informações sobre banners de publicidade';

-- Copiando dados para a tabela _inforondonia_2016.banners: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
REPLACE INTO `banners` (`id`, `titulo`, `banner`, `tipo`, `link`, `data_inicial`, `data_final`, `data_atual`, `qm_cadastr`, `qm_alterou`) VALUES
	(92, 'Banner Topo 1', 'banners/2016/04/banner-topo-1.jpg', 2, '#', '2016-04-18', '2016-04-20', '2016-04-18 21:19:20', 1, 1),
	(93, 'Banner Topo 2', 'banners/2016/04/banner-topo-2.jpg', 3, '#', '2016-04-18', '2016-04-20', '2016-04-18 21:35:01', 1, 1),
	(94, 'Banner Capa 1', 'banners/2016/04/banner-capa-1.jpg', 4, '#', '2016-04-18', '2016-04-20', '2016-04-18 21:37:07', 1, 1),
	(95, 'Banner Capa 2', 'banners/2016/04/banner-capa-2.jpg', 5, '#', '2016-04-18', '2016-04-20', '2016-04-18 21:45:33', 1, NULL),
	(96, 'Banner Capa 3', 'banners/2016/04/banner-capa-3.jpg', 6, '#', '2016-04-18', '2016-04-20', '2016-04-18 21:52:45', 1, NULL),
	(97, 'Banner Capa Full', 'banners/2016/04/banner-capa-full.jpg', 7, '#', '2016-04-18', '2016-04-20', '2016-04-18 21:55:10', 1, NULL),
	(98, 'Banner Lateral 1', 'banners/2016/04/banner-lateral-1.jpg', 8, '#', '2016-04-18', '2016-04-20', '2016-04-18 21:58:50', 1, NULL),
	(99, 'Banner Lateral 4', 'banners/2016/04/banner-lateral-4.jpg', 11, '#', '2016-04-18', '2016-04-20', '2016-04-18 21:59:42', 1, NULL),
	(100, 'Banner Lateral 2', 'banners/2016/04/banner-lateral-2.jpg', 9, '#', '2016-04-18', '2016-04-20', '2016-04-18 22:01:03', 1, NULL),
	(101, 'Banner Lateral 3', 'banners/2016/04/banner-lateral-3.jpg', 10, '#', '2016-04-18', '2016-04-20', '2016-04-18 22:01:41', 1, NULL),
	(102, 'Banner Lateral 5', 'banners/2016/04/banner-lateral-5.jpg', 12, '#', '2016-04-18', '2016-04-20', '2016-04-18 22:14:04', 1, NULL),
	(103, 'Banner Noticia Ler 1', 'banners/2016/04/banner-noticia-ler-1.jpg', 13, '#', '2016-04-18', '2016-04-20', '2016-04-18 22:34:41', 1, NULL),
	(104, 'Banner Noticia Ler 2', 'banners/2016/04/banner-noticia-ler-2.jpg', 14, '#', '2016-04-18', '2016-04-20', '2016-04-18 22:35:14', 1, NULL);
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.banners_tipo
DROP TABLE IF EXISTS `banners_tipo`;
CREATE TABLE IF NOT EXISTS `banners_tipo` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  `dimens_w` varchar(50) NOT NULL,
  `dimens_h` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='Tipos de banners';

-- Copiando dados para a tabela _inforondonia_2016.banners_tipo: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `banners_tipo` DISABLE KEYS */;
REPLACE INTO `banners_tipo` (`id_tipo`, `tipo`, `dimens_w`, `dimens_h`) VALUES
	(1, 'Pop Up', '320', '480'),
	(2, 'Pub. Topo 1', '745', '95'),
	(3, 'Pub. Topo 2', '745', '95'),
	(4, 'Pub. Capa 1', '887', '140'),
	(5, 'Pub. Capa 2', '439', '110'),
	(6, 'Pub. Capa 3', '439', '110'),
	(7, 'Pub. Capa Full', '1267', '140'),
	(8, 'Pub. Lateral 1', '346', '438'),
	(9, 'Pub. Lateral 2', '722', '130'),
	(10, 'Pub. Lateral 3', '722', '130'),
	(11, 'Pub. Lateral 4', '346', '438'),
	(12, 'Pub. Lateral 5', '346', '210'),
	(13, 'Pub. Noticia Ler 1', '870', '140'),
	(14, 'Pub. Noticia Ler 2', '870', '140');
/*!40000 ALTER TABLE `banners_tipo` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
