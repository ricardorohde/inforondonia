-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.1.8-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.3.0.5109
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela _inforondonia_2016.enquete
DROP TABLE IF EXISTS `enquete`;
CREATE TABLE IF NOT EXISTS `enquete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` varchar(250) NOT NULL,
  `resp1` varchar(250) NOT NULL,
  `resp2` varchar(250) NOT NULL,
  `resp3` varchar(250) NOT NULL,
  `resp4` varchar(250) NOT NULL,
  `voto1` int(11) NOT NULL DEFAULT '0',
  `voto2` int(11) NOT NULL DEFAULT '0',
  `voto3` int(11) NOT NULL DEFAULT '0',
  `voto4` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `status` char(1) NOT NULL COMMENT 'A = Ativa | I = Inativa',
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `qm_cadastr` int(11) NOT NULL,
  `qm_alterou` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Informações sobre enquetes';

-- Copiando dados para a tabela _inforondonia_2016.enquete: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `enquete` DISABLE KEYS */;
REPLACE INTO `enquete` (`id`, `pergunta`, `resp1`, `resp2`, `resp3`, `resp4`, `voto1`, `voto2`, `voto3`, `voto4`, `total`, `status`, `data`, `qm_cadastr`, `qm_alterou`) VALUES
	(1, 'Eleições 2016 - Prefeito de Rolim de Moura ?', 'Luizão', 'Maria', 'João', 'Manuel', 0, 0, 0, 0, 0, 'I', '2016-08-24 09:14:13', 1, 1);
/*!40000 ALTER TABLE `enquete` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.enquete_usuario
DROP TABLE IF EXISTS `enquete_usuario`;
CREATE TABLE IF NOT EXISTS `enquete_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_enquete` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Registrar os usuários que votaram';

-- Copiando dados para a tabela _inforondonia_2016.enquete_usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `enquete_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `enquete_usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
