-- --------------------------------------------------------
-- Servidor:                     198.24.169.241
-- Versão do servidor:           5.5.48-cll - MySQL Community Server (GPL)
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              9.3.0.5072
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela inforobr_cw_db2016.usuarios
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
  `colunista` varchar(3) DEFAULT NULL,
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

-- Copiando dados para a tabela inforobr_cw_db2016.usuarios: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
REPLACE INTO `usuarios` (`id`, `url_name`, `nome`, `email`, `data_nasc`, `sexo`, `login`, `senha`, `foto`, `colunista`, `ativo`, `nivel`, `cont_acesso`, `ip`, `ultimo_acesso`, `qm_cadastr`, `dt_cadastr`, `qm_alterou`, `dt_alterou`) VALUES
	(1, 'creative-websites', 'Creative Websites', 'suporte@creativewebsites.com.br', '2015-02-14', 1, 'creative', '19d910ef608e4947aa0c6dcee352a3e8', 'usuarios/2015/03/creative.jpeg', 'nao', 's', 1, 43, '200.186.30.74', '2015-02-13 22:33:25', 1, NULL, 1, '2015-03-25 21:57:12'),
	(2, 'ricardo-barros-silva', 'Ricardo Barros Silva', 'rikbarros10@hotmail.com', '1983-04-10', 1, 'rikbarros10', '4badaee57fed5610012a296273158f5f', 'usuarios/2016/04/rikbarros10.jpg', 'nao', 's', 1, 14, '201.7.18.44', NULL, 1, '2016-04-13 22:19:56', 2, '2016-04-23 18:07:28'),
	(3, 'luiz-alberto-vicente-ferreira', 'Luiz Alberto Vicente Ferreira', 'luiz_bad@hotmail.com', '1993-02-10', 1, 'luizalberto', '30acd2ea1c996b05cf480c6c29cace72', 'usuarios/2016/04/luizalberto.jpg', 'nao', 's', 1, 5, '179.243.144.159', NULL, 2, '2016-04-13 22:25:18', NULL, NULL),
	(5, 'fernanda-sol', 'Fernanda Sol ', 'nataliassol@hotmail.com', '1981-12-25', 2, 'nataliassol', '4badaee57fed5610012a296273158f5f', 'usuarios/2016/04/nataliassol.jpg', 'nao', 's', 1, 5, '201.88.37.254', '2016-04-25 13:59:33', 2, '2016-04-23 18:12:16', NULL, NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
