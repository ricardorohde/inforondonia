-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.1.8-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5127
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela _inforondonia_2016.clima_dados
DROP TABLE IF EXISTS `clima_dados`;
CREATE TABLE IF NOT EXISTS `clima_dados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cidade` varchar(100) NOT NULL,
  `uf` char(2) NOT NULL,
  `data_atualizado` date NOT NULL,
  `data_previsao` date NOT NULL,
  `id_sigla` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `temp_max` int(2) NOT NULL,
  `temp_min` int(2) NOT NULL,
  `iuv` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_clima_dados_id_sigla` (`id_sigla`),
  CONSTRAINT `fk_clima_dados_id_sigla` FOREIGN KEY (`id_sigla`) REFERENCES `clima_sigla` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Dados sobre o clima';

-- Copiando dados para a tabela _inforondonia_2016.clima_dados: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `clima_dados` DISABLE KEYS */;
REPLACE INTO `clima_dados` (`id`, `cidade`, `uf`, `data_atualizado`, `data_previsao`, `id_sigla`, `descricao`, `temp_max`, `temp_min`, `iuv`) VALUES
	(1, 'Rolim de Moura', 'RO', '2016-10-30', '2016-10-30', 11, 'Pancadas de Chuva', 33, 21, 13),
	(2, 'Rolim de Moura', 'RO', '2016-10-30', '2016-10-31', 11, 'Pancadas de Chuva', 33, 21, 13),
	(3, 'Rolim de Moura', 'RO', '2016-10-30', '2016-11-01', 11, 'Pancadas de Chuva', 29, 19, 13),
	(4, 'Rolim de Moura', 'RO', '2016-10-30', '2016-11-02', 11, 'Pancadas de Chuva', 28, 19, 14),
	(5, 'Rolim de Moura', 'RO', '2016-10-30', '2016-11-03', 11, 'Pancadas de Chuva', 31, 19, 14),
	(6, 'Rolim de Moura', 'RO', '2016-10-30', '2016-11-04', 11, 'Pancadas de Chuva', 27, 21, 13),
	(7, 'Rolim de Moura', 'RO', '2016-10-30', '2016-11-05', 36, 'Variação de Nebulosidade', 28, 20, 13);
/*!40000 ALTER TABLE `clima_dados` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.clima_sigla
DROP TABLE IF EXISTS `clima_sigla`;
CREATE TABLE IF NOT EXISTS `clima_sigla` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` varchar(3) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COMMENT='Sigla das condições do clima';

-- Copiando dados para a tabela _inforondonia_2016.clima_sigla: ~40 rows (aproximadamente)
/*!40000 ALTER TABLE `clima_sigla` DISABLE KEYS */;
REPLACE INTO `clima_sigla` (`id`, `sigla`, `descricao`) VALUES
	(1, 'ec', 'Encoberto com Chuvas Isoladas'),
	(2, 'ci', 'Chuvas Isoladas'),
	(3, 'c', 'Chuva'),
	(4, 'in', 'Instável'),
	(5, 'pp', 'Poss. de Pancadas de Chuva'),
	(6, 'cm', 'Chuva pela Manhã'),
	(7, 'cn', 'Chuva a Noite'),
	(8, 'pt', 'Pancadas de Chuva a Tarde'),
	(9, 'pm', 'Pancadas de Chuva pela Manhã'),
	(10, 'np', 'Nublado e Pancadas de Chuva'),
	(11, 'pc', 'Pancadas de Chuva'),
	(12, 'pn', 'Parcialmente Nublado'),
	(13, 'cv', 'Chuvisco'),
	(14, 'ch', 'Chuvoso'),
	(15, 't', 'Tempestade'),
	(16, 'ps', 'Predomínio de Sol'),
	(17, 'e', 'Encoberto'),
	(18, 'n', 'Nublado'),
	(19, 'cl', 'Céu Claro'),
	(20, 'nv', 'Nevoeiro'),
	(21, 'g', 'Geada'),
	(22, 'ne', 'Neve'),
	(23, 'nd', 'Não Definido'),
	(24, 'pnt', 'Pancadas de Chuva a Noite'),
	(25, 'psc', 'Possibilidade de Chuva'),
	(26, 'pcm', 'Possibilidade de Chuva pela Manhã'),
	(27, 'pct', 'Possibilidade de Chuva a Tarde'),
	(28, 'pcn', 'Possibilidade de Chuva a Noite'),
	(29, 'npt', 'Nublado com Pancadas a Tarde'),
	(30, 'npn', 'Nublado com Pancadas a Noite'),
	(31, 'ncn', 'Nublado com Poss. de Chuva a Noite'),
	(32, 'nct', 'Nublado com Poss. de Chuva a Tarde'),
	(33, 'ncm', 'Nubl. c/ Poss. de Chuva pela Manhã'),
	(34, 'npm', 'Nublado com Pancadas pela Manhã'),
	(35, 'npp', 'Nublado com Possibilidade de Chuva'),
	(36, 'vn', 'Variação de Nebulosidade'),
	(37, 'ct', 'Chuva a Tarde'),
	(38, 'ppn', 'Poss. de Panc. de Chuva a Noite'),
	(39, 'ppt', 'Poss. de Panc. de Chuva a Tarde'),
	(40, 'ppm', 'Poss. de Panc. de Chuva pela Manhã');
/*!40000 ALTER TABLE `clima_sigla` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
