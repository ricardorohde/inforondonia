-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.1.8-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.3.0.5052
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela _inforondonia_2016.banco_fotos
DROP TABLE IF EXISTS `banco_fotos`;
CREATE TABLE IF NOT EXISTS `banco_fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ordem` int(11) DEFAULT NULL COMMENT 'Ordem das Fotos',
  PRIMARY KEY (`id`),
  KEY `id_tipo` (`id_tipo`),
  KEY `tipo` (`tipo`),
  KEY `nome` (`foto`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='Armazena as fotos selecionadas na opção mais fotos, dependendo do tipo.';

-- Copiando dados para a tabela _inforondonia_2016.banco_fotos: ~27 rows (aproximadamente)
/*!40000 ALTER TABLE `banco_fotos` DISABLE KEYS */;
REPLACE INTO `banco_fotos` (`id`, `id_tipo`, `tipo`, `foto`, `data`, `ordem`) VALUES
	(1, 4, 'E', 'banco_fotos/2015/12/tipo-e-id-4-2d5ad.jpg', '2015-12-05 10:58:11', NULL),
	(2, 4, 'E', 'banco_fotos/2015/12/tipo-e-id-4-362fd.jpg', '2015-12-05 10:58:11', NULL),
	(3, 4, 'E', 'banco_fotos/2015/12/tipo-e-id-4-589f2.jpg', '2015-12-05 10:58:11', NULL),
	(4, 4, 'E', 'banco_fotos/2015/12/tipo-e-id-4-2b778.jpg', '2015-12-05 10:58:11', NULL),
	(5, 40, 'N', 'banco_fotos/2015/12/tipo-n-id-40-14a1f.jpg', '2015-12-16 10:00:09', NULL),
	(6, 40, 'N', 'banco_fotos/2015/12/tipo-n-id-40-08432.jpg', '2015-12-16 10:00:14', NULL),
	(7, 40, 'N', 'banco_fotos/2015/12/tipo-n-id-40-b7960.jpg', '2015-12-16 10:00:15', NULL),
	(8, 6, 'E', 'banco_fotos/2015/12/tipo-e-id-6-cb0e3.JPG', '2015-12-16 19:22:39', NULL),
	(9, 6, 'E', 'banco_fotos/2015/12/tipo-e-id-6-82715.JPG', '2015-12-16 19:22:39', NULL),
	(10, 6, 'E', 'banco_fotos/2015/12/tipo-e-id-6-4b22d.JPG', '2015-12-16 19:22:39', NULL),
	(11, 6, 'E', 'banco_fotos/2015/12/tipo-e-id-6-ce37e.JPG', '2015-12-16 19:22:39', NULL),
	(12, 6, 'E', 'banco_fotos/2015/12/tipo-e-id-6-0feef.JPG', '2015-12-16 19:22:39', NULL),
	(13, 6, 'E', 'banco_fotos/2015/12/tipo-e-id-6-7e2e1.JPG', '2015-12-16 19:22:39', NULL),
	(14, 6, 'E', 'banco_fotos/2015/12/tipo-e-id-6-a72a7.JPG', '2015-12-16 19:22:39', NULL),
	(15, 6, 'E', 'banco_fotos/2015/12/tipo-e-id-6-b571a.JPG', '2015-12-16 19:22:40', NULL),
	(16, 6, 'E', 'banco_fotos/2015/12/tipo-e-id-6-11148.JPG', '2015-12-16 19:22:40', NULL),
	(17, 6, 'E', 'banco_fotos/2015/12/tipo-e-id-6-68e30.JPG', '2015-12-16 19:22:40', NULL),
	(18, 6, 'E', 'banco_fotos/2015/12/tipo-e-id-6-1483c.JPG', '2015-12-16 19:22:40', NULL),
	(19, 6, 'E', 'banco_fotos/2015/12/tipo-e-id-6-88579.JPG', '2015-12-16 19:22:40', NULL),
	(20, 6, 'E', 'banco_fotos/2015/12/tipo-e-id-6-30ee4.JPG', '2015-12-16 19:22:40', NULL),
	(21, 6, 'E', 'banco_fotos/2015/12/tipo-e-id-6-59d54.JPG', '2015-12-16 19:22:40', NULL),
	(22, 6, 'E', 'banco_fotos/2015/12/tipo-e-id-6-e3eee.JPG', '2015-12-16 19:22:40', NULL),
	(23, 6, 'E', 'banco_fotos/2015/12/tipo-e-id-6-29565.JPG', '2015-12-16 19:22:40', NULL),
	(24, 6, 'E', 'banco_fotos/2015/12/tipo-e-id-6-9f76a.JPG', '2015-12-16 19:22:40', NULL),
	(25, 6, 'E', 'banco_fotos/2015/12/tipo-e-id-6-8cdb4.JPG', '2015-12-16 19:22:40', NULL),
	(26, 6, 'E', 'banco_fotos/2015/12/tipo-e-id-6-ebb1f.JPG', '2015-12-16 19:22:41', NULL),
	(27, 6, 'E', 'banco_fotos/2015/12/tipo-e-id-6-67177.JPG', '2015-12-16 19:22:41', NULL);
/*!40000 ALTER TABLE `banco_fotos` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COMMENT='Armazena informações sobre banners de publicidade';

-- Copiando dados para a tabela _inforondonia_2016.banners: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.banners_tipo
DROP TABLE IF EXISTS `banners_tipo`;
CREATE TABLE IF NOT EXISTS `banners_tipo` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  `dimens_w` varchar(50) NOT NULL,
  `dimens_h` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Tipos de banners';

-- Copiando dados para a tabela _inforondonia_2016.banners_tipo: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `banners_tipo` DISABLE KEYS */;
REPLACE INTO `banners_tipo` (`id_tipo`, `tipo`, `dimens_w`, `dimens_h`) VALUES
	(1, 'Pop Up', '320', '480'),
	(2, 'Pub. Capa 1', '302', '312'),
	(3, 'Pub. Capa 2', '978', '150'),
	(4, 'Pub. Capa 3', '302', '312'),
	(5, 'Pub. Capa 4', '978', '150'),
	(6, 'Pub. Capa 5', '978', '150'),
	(7, 'Flyers / Destaques ', '382', '310');
/*!40000 ALTER TABLE `banners_tipo` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.eventos
DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_name` varchar(255) NOT NULL,
  `evento` varchar(50) DEFAULT NULL,
  `data` timestamp NULL DEFAULT NULL,
  `local` varchar(150) DEFAULT NULL,
  `cidadeuf` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `marca_foto` int(11) DEFAULT NULL,
  `destaque` varchar(3) DEFAULT 'nao',
  `fotografo` varchar(250) DEFAULT NULL,
  `qm_cadastr` int(11) DEFAULT NULL,
  `qm_alterou` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evento` (`evento`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Armazena informações de cadastro de galerias';

-- Copiando dados para a tabela _inforondonia_2016.eventos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.galerias
DROP TABLE IF EXISTS `galerias`;
CREATE TABLE IF NOT EXISTS `galerias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evento` varchar(50) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `local` varchar(50) DEFAULT NULL,
  `cidadeuf` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `marca_foto` int(11) DEFAULT NULL,
  `destaque` varchar(1) DEFAULT 'n',
  `fotografo` varchar(250) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `qm_cadastr` int(11) DEFAULT NULL,
  `qm_alterou` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fkgalerias_qm_cadastr` (`qm_cadastr`),
  KEY `evento` (`evento`),
  KEY `fkgalerias_categoria` (`categoria`),
  CONSTRAINT `fkgalerias_qm_cadastr` FOREIGN KEY (`qm_cadastr`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Armazena informações de cadastro de galerias';

-- Copiando dados para a tabela _inforondonia_2016.galerias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `galerias` DISABLE KEYS */;
/*!40000 ALTER TABLE `galerias` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.institucional
DROP TABLE IF EXISTS `institucional`;
CREATE TABLE IF NOT EXISTS `institucional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instituicao` varchar(100) NOT NULL,
  `fanpage` varchar(50) DEFAULT NULL,
  `sobre` text,
  `missao` text,
  `visao` text,
  `valores` text,
  `id_presidente` int(11) DEFAULT NULL,
  `qm_cadastr` int(11) DEFAULT NULL,
  `qm_alterou` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Armazena informações institucional do site.';

-- Copiando dados para a tabela _inforondonia_2016.institucional: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `institucional` DISABLE KEYS */;
REPLACE INTO `institucional` (`id`, `instituicao`, `fanpage`, `sobre`, `missao`, `visao`, `valores`, `id_presidente`, `qm_cadastr`, `qm_alterou`) VALUES
	(1, 'ACIRM - ASSOCIAÇÃO EMPRESARIAL DE ROLIM DE MOURA', 'https://www.facebook.com/groupcreativewebsites', '<p>A Associa&ccedil;&atilde;o Empresarial de Rolim de Moura &ndash; ACIRM &eacute; uma entidade associativa, civil, sem&nbsp;fins lucrativos, fundada em 22 de novembro 1983, desde ent&atilde;o n&atilde;o cessou o exerc&iacute;cio da&nbsp;representatividade e as a&ccedil;&otilde;es que beneficiam e contribuem para a melhoria das condi&ccedil;&otilde;es de&nbsp;neg&oacute;cios das empresas rolimourenses. Atua diretamente na classe empresarial, apoiando suas&nbsp;iniciativas, ajudando e orientando seus associados perante poderes P&uacute;blicos/Municipais,&nbsp;Estaduais e Federais, dando-lhes suporte legal e assessoramento t&eacute;cnico na solu&ccedil;&atilde;o de&nbsp;problemas e, na defesa de seus direitos sempre que necess&aacute;rios.</p>\r\n\r\n<p>O prop&oacute;sito da ACIRM &eacute; atuar no desenvolvimento da popula&ccedil;&atilde;o e toda a comunidade&nbsp;empresarial de Rolim de Moura, tendo como compromisso n&atilde;o s&oacute; criar riqueza na nossa&nbsp;cidade, mas, acima de tudo, fazer com que essa riqueza fique na nossa comunidade, de&nbsp;maneira que esta possa ser melhor distribu&iacute;da e alavancar o progresso.</p>\r\n\r\n<p>A ACIRM trabalha em parceria com v&aacute;rias outras entidades para melhor atender as empresas,&nbsp;seus colaboradores e a popula&ccedil;&atilde;o em geral, melhorando a capacidade de neg&oacute;cios das&nbsp;empresas e a efici&ecirc;ncia de seus colaboradores na presta&ccedil;&atilde;o de servi&ccedil;os.</p>\r\n', '<p>Desenvolvimento econ&ocirc;mico e social dos empreendedores e da cidade de Rolim de&nbsp;Moura, de maneira a estimular o desenvolvimento cont&iacute;nuo e sustent&aacute;vel da regi&atilde;o.</p>\r\n', '<p>Consolidar o reconhecimento da entidade pela excel&ecirc;ncia em produtos e servi&ccedil;os oferecidos&nbsp;aos associados e atuar como &oacute;rg&atilde;o representativo nas discuss&otilde;es pol&iacute;ticas, econ&ocirc;micas e&nbsp;sociais em prol do empresariado Rolimourense.</p>\r\n', '<p>1. Lideran&ccedil;a e defesa do empresariado;</p>\r\n\r\n<p>2. Fomento ao empreendedorismo;</p>\r\n\r\n<p>3. Cria&ccedil;&atilde;o de valor aos associados e &agrave; sociedade;</p>\r\n\r\n<p>4. Respeito &agrave; tradi&ccedil;&atilde;o empresarial e social;</p>\r\n\r\n<p>5. Excel&ecirc;ncia na conduta das atividades;</p>\r\n\r\n<p>6. Criatividade e inova&ccedil;&atilde;o nas realiza&ccedil;&otilde;es;</p>\r\n\r\n<p>7. Integridade, Seriedade, &Eacute;tica;</p>\r\n\r\n<p>8. Responsabilidade socioambiental;</p>\r\n\r\n<p>9. Solidariedade e respeito &agrave; diversidade humana.</p>\r\n', 1, 1, 1);
/*!40000 ALTER TABLE `institucional` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='Menu';

-- Copiando dados para a tabela _inforondonia_2016.menu: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
REPLACE INTO `menu` (`id_menu`, `id_menu_tipo`, `titulo`, `case`, `pagina`, `ico_menu`) VALUES
	(1, 1, 'Usuários', 'usuarios', '#', 'fa-users'),
	(2, 1, 'Eventos', 'eventos', '#', 'fa-camera'),
	(5, 1, 'Videos', 'videos', '#', 'fa-video-camera'),
	(6, 1, 'Notícias', 'noticias', '#', 'fa-bullhorn'),
	(14, 1, 'Banners', 'banners', '#', 'fa-photo');
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='Menu Sub';

-- Copiando dados para a tabela _inforondonia_2016.menu_sub: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `menu_sub` DISABLE KEYS */;
REPLACE INTO `menu_sub` (`id_menu_sub`, `id_menu`, `titulo`, `case`, `pagina`, `ico_menu`) VALUES
	(1, 1, 'Novo Cadastro', 'usuarios', 'cadastrar', 'fa-angle-double-right'),
	(2, 1, 'Listar Cadastros', 'usuarios', 'listar', 'fa-angle-double-right'),
	(3, 2, 'Novo Cadastro', 'eventos', 'cadastrar', 'fa-angle-double-right'),
	(4, 2, 'Listar Cadastros', 'eventos', 'listar', 'fa-angle-double-right'),
	(10, 6, 'Novo Cadastro', 'noticias', 'cadastrar', 'fa-angle-double-right'),
	(11, 6, 'Listar Cadastros', 'noticias', 'listar', 'fa-angle-double-right'),
	(16, 5, 'Novo Cadastro', 'videos', 'cadastrar', 'fa-angle-double-right'),
	(17, 5, 'Listar Cadastros', 'videos', 'listar', 'fa-angle-double-right'),
	(30, 14, 'Novo Cadastro', 'banners', 'cadastrar', 'fa-angle-double-right'),
	(31, 14, 'Listar Cadastros', 'banners', 'listar', 'fa-angle-double-right');
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

-- Copiando estrutura para tabela _inforondonia_2016.noticias
DROP TABLE IF EXISTS `noticias`;
CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_name` varchar(255) NOT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `subtitulo` varchar(250) DEFAULT NULL,
  `colunista` varchar(50) DEFAULT NULL,
  `fonte` varchar(100) DEFAULT NULL,
  `destaque` varchar(3) DEFAULT NULL,
  `noticia` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `video` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `marca_foto` int(11) NOT NULL DEFAULT '0' COMMENT '0=não adiciona marca, 1=adiciona marca',
  `contador` int(11) DEFAULT NULL,
  `coluna` varchar(3) DEFAULT NULL,
  `qm_cadastr` int(11) DEFAULT NULL,
  `qm_alterou` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COMMENT='Armazena informações de cadastros de noticias';

-- Copiando dados para a tabela _inforondonia_2016.noticias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.noticias_categoria
DROP TABLE IF EXISTS `noticias_categoria`;
CREATE TABLE IF NOT EXISTS `noticias_categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  `cat_url` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Categorias das Noticias';

-- Copiando dados para a tabela _inforondonia_2016.noticias_categoria: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `noticias_categoria` DISABLE KEYS */;
REPLACE INTO `noticias_categoria` (`id_categoria`, `categoria`, `cat_url`) VALUES
	(1, 'POLÍTICA', 'politica'),
	(2, 'ESPORTE', 'esporte'),
	(3, 'CULTURA', 'cultura'),
	(4, 'POLICIAL', 'policial'),
	(5, 'GERAL', 'geral');
/*!40000 ALTER TABLE `noticias_categoria` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Armazena informações dos usuarios do painel';

-- Copiando dados para a tabela _inforondonia_2016.usuarios: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
REPLACE INTO `usuarios` (`id`, `nome`, `email`, `data_nasc`, `sexo`, `login`, `senha`, `foto`, `colunista`, `ativo`, `nivel`, `cont_acesso`, `ip`, `ultimo_acesso`, `qm_cadastr`, `dt_cadastr`, `qm_alterou`, `dt_alterou`) VALUES
	(1, 'Creative Websites', 'suporte@creativewebsites.com.br', '2015-02-14', 1, 'creative', '19d910ef608e4947aa0c6dcee352a3e8', 'usuarios/2015/03/creative.jpeg', NULL, 's', 1, 40, '::1', '2015-02-13 22:33:25', 1, NULL, 1, '2015-03-25 21:57:12');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.videos
DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_name` varchar(255) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `url` varchar(50) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  `destaque` varchar(3) DEFAULT NULL,
  `autor` varchar(50) DEFAULT NULL,
  `data` timestamp NULL DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `qm_cadastr` int(9) DEFAULT NULL,
  `dt_cadastr` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `qm_alterou` int(9) DEFAULT NULL,
  `dt_alterou` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COMMENT='Armazena informações de cadastro de videos.';

-- Copiando dados para a tabela _inforondonia_2016.videos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.ws_siteviews
DROP TABLE IF EXISTS `ws_siteviews`;
CREATE TABLE IF NOT EXISTS `ws_siteviews` (
  `siteviews_id` int(11) NOT NULL AUTO_INCREMENT,
  `siteviews_date` date NOT NULL,
  `siteviews_users` decimal(10,0) NOT NULL,
  `siteviews_views` decimal(10,0) NOT NULL,
  `siteviews_pages` decimal(10,0) NOT NULL,
  PRIMARY KEY (`siteviews_id`),
  KEY `idx_1` (`siteviews_date`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela _inforondonia_2016.ws_siteviews: ~39 rows (aproximadamente)
/*!40000 ALTER TABLE `ws_siteviews` DISABLE KEYS */;
REPLACE INTO `ws_siteviews` (`siteviews_id`, `siteviews_date`, `siteviews_users`, `siteviews_views`, `siteviews_pages`) VALUES
	(1, '2015-09-02', 2, 8, 45),
	(2, '2015-09-03', 1, 1, 20),
	(3, '2015-09-05', 2, 2, 135),
	(4, '2015-09-06', 1, 1, 59),
	(5, '2015-09-07', 2, 2, 117),
	(6, '2015-09-09', 1, 1, 2),
	(7, '2015-11-06', 1, 1, 21),
	(8, '2015-11-14', 4, 4, 22),
	(9, '2015-11-22', 1, 1, 3),
	(10, '2015-11-25', 2, 2, 2),
	(11, '2015-11-26', 1, 1, 34),
	(12, '2015-11-28', 2, 2, 79),
	(13, '2015-11-29', 1, 1, 35),
	(14, '2015-11-30', 6, 7, 142),
	(15, '2015-12-01', 7, 7, 36),
	(16, '2015-12-02', 2, 3, 6),
	(17, '2015-12-03', 4, 5, 18),
	(18, '2015-12-04', 2, 5, 13),
	(19, '2015-12-05', 14, 16, 48),
	(20, '2015-12-06', 2, 2, 2),
	(21, '2015-12-07', 4, 5, 16),
	(22, '2015-12-08', 1, 4, 17),
	(23, '2015-12-09', 4, 6, 23),
	(24, '2015-12-10', 3, 4, 9),
	(25, '2015-12-11', 1, 1, 4),
	(26, '2015-12-12', 3, 4, 8),
	(27, '2015-12-13', 1, 1, 2),
	(28, '2015-12-14', 18, 22, 108),
	(29, '2015-12-15', 16, 23, 84),
	(30, '2015-12-16', 18, 28, 344),
	(31, '2015-12-18', 2, 2, 3),
	(32, '2015-12-20', 2, 2, 78),
	(33, '2015-12-23', 2, 2, 5),
	(34, '2015-12-28', 1, 1, 1),
	(35, '2016-02-12', 3, 3, 226),
	(36, '2016-03-14', 5, 5, 24),
	(37, '2016-03-17', 1, 1, 2),
	(38, '2016-03-18', 1, 1, 1),
	(39, '2016-03-24', 1, 1, 4);
/*!40000 ALTER TABLE `ws_siteviews` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.ws_siteviews_agent
DROP TABLE IF EXISTS `ws_siteviews_agent`;
CREATE TABLE IF NOT EXISTS `ws_siteviews_agent` (
  `agent_id` int(11) NOT NULL AUTO_INCREMENT,
  `agent_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `agent_views` decimal(10,0) NOT NULL,
  PRIMARY KEY (`agent_id`),
  KEY `idx_1` (`agent_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela _inforondonia_2016.ws_siteviews_agent: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `ws_siteviews_agent` DISABLE KEYS */;
REPLACE INTO `ws_siteviews_agent` (`agent_id`, `agent_name`, `agent_views`) VALUES
	(1, 'Firefox', 10),
	(2, 'Chrome', 118),
	(3, 'Outros', 35),
	(4, 'IE', 20);
/*!40000 ALTER TABLE `ws_siteviews_agent` ENABLE KEYS */;

-- Copiando estrutura para tabela _inforondonia_2016.ws_siteviews_online
DROP TABLE IF EXISTS `ws_siteviews_online`;
CREATE TABLE IF NOT EXISTS `ws_siteviews_online` (
  `online_id` int(11) NOT NULL AUTO_INCREMENT,
  `online_session` varchar(255) CHARACTER SET latin1 NOT NULL,
  `online_startview` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `online_endview` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `online_ip` varchar(255) CHARACTER SET latin1 NOT NULL,
  `online_url` varchar(255) CHARACTER SET latin1 NOT NULL,
  `online_agent` varchar(255) CHARACTER SET latin1 NOT NULL,
  `agent_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`online_id`)
) ENGINE=InnoDB AUTO_INCREMENT=214 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela _inforondonia_2016.ws_siteviews_online: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `ws_siteviews_online` DISABLE KEYS */;
REPLACE INTO `ws_siteviews_online` (`online_id`, `online_session`, `online_startview`, `online_endview`, `online_ip`, `online_url`, `online_agent`, `agent_name`) VALUES
	(212, '57n8dfgt20prq0ea0mla1fgql6', '2016-03-17 18:47:30', '2016-03-25 00:03:29', '::1', '/servidor/inforondonia/2016/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2680.0 Safari/537.36', 'Chrome'),
	(213, '0gbir4ousd5or3arr6mn7qvgt1', '2016-03-24 23:54:10', '2016-03-25 00:06:59', '::1', '/servidor/inforondonia/2016/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2689.0 Safari/537.36', 'Chrome');
/*!40000 ALTER TABLE `ws_siteviews_online` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
