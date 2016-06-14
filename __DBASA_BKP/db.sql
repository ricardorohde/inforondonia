-- --------------------------------------------------------
-- Servidor:                     inforondonia.com.br
-- Versão do servidor:           5.5.50-cll - MySQL Community Server (GPL)
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              9.3.0.5093
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela inforobr_cw_db2016.institucional
DROP TABLE IF EXISTS `institucional`;
CREATE TABLE IF NOT EXISTS `institucional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instituicao` varchar(100) NOT NULL,
  `sobre` text,
  `qm_cadastr` int(11) DEFAULT NULL,
  `qm_alterou` int(11) DEFAULT NULL,
  `data_alterou` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Armazena informações institucional do site.';

-- Copiando dados para a tabela inforobr_cw_db2016.institucional: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `institucional` DISABLE KEYS */;
REPLACE INTO `institucional` (`id`, `instituicao`, `sobre`, `qm_cadastr`, `qm_alterou`, `data_alterou`) VALUES
	(1, 'INFORONDONIA', '<p>Ol&aacute;!<br />\r\nPrimeiramente, obrigado por visitar nosso site...<br />\r\nSomos uma equipe s&eacute;ria, que trabalha em conjunto para levar at&eacute; voc&ecirc;,&nbsp;informa&ccedil;&atilde;o de qualidade, n&atilde;o s&oacute; do estado de Rond&ocirc;nia mais do mundo todo.<br />\r\nNosso site disp&otilde;e de noticias, coberturas de eventos e os nossos&nbsp;colunistas que trazem sempre uma tema que abrange o debate.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>Contatos</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ricardo Barros: 69 - 8449 - 4515</p>\r\n\r\n<p>E-mail: <a href="mailto:barrosjornalista@gmail.com" target="_blank">barrosjornalista@gmail.com</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Luiz Alberto: 69 - 8425 - 9695<br />\r\nE-mail: <a href="mailto:luiz_bad@hotmail.com" target="_blank">luiz_bad@hotmail.com</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href="mailto:contato@inforondonia.com.br" target="_blank">contato@inforondonia.com.br</a></p>\r\n\r\n<p><a href="mailto:contatoinforondonia@gmail.com" target="_blank">contatoinforondonia@gmail.com</a></p>\r\n', 1, NULL, '2016-06-13 21:05:24');
/*!40000 ALTER TABLE `institucional` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
