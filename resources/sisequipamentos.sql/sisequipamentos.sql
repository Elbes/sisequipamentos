-- phpMyAdmin SQL Dump
-- version 3.2.0
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mar 23, 2017 as 04:30 AM
-- Versão do Servidor: 5.7.12
-- Versão do PHP: 5.2.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `equipamentos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cargo` varchar(45) NOT NULL,
  `status_cargo` varchar(45) NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nome_cargo`, `status_cargo`) VALUES
(1, 'Gerente Geral', 'Ativo'),
(2, 'Gerente de Negocios', 'Ativo'),
(3, 'Guru - Tecnologico', 'Ativo'),
(4, 'Consultor de Relacionamento', 'Ativo'),
(5, 'Consultor de Negocios', 'Ativo'),
(6, 'Analista', 'Ativo'),
(7, 'Outro', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `demanda`
--

CREATE TABLE IF NOT EXISTS `demanda` (
  `id_demanda` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(255) NOT NULL,
  `numero_linha` varchar(15) NOT NULL,
  `obs_demanda` varchar(255) NOT NULL,
  `gerente` varchar(255) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `data_abertura` date NOT NULL,
  `data_fechamento` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `obs_demanda_gerente` varchar(255) NOT NULL,
  `numero_chamado` int(10) DEFAULT NULL,
  `id_tipoDemanda` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_demanda`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=197 ;

--
-- Extraindo dados da tabela `demanda`
--

INSERT INTO `demanda` (`id_demanda`, `nome_cliente`, `numero_linha`, `obs_demanda`, `gerente`, `usuario`, `data_abertura`, `data_fechamento`, `status`, `obs_demanda_gerente`, `numero_chamado`, `id_tipoDemanda`, `id_usuario`) VALUES
(42, 'Familia Especial', '(61) 9933-3333', 'Testando abertura da demanda com o login da Jaque', 'Najara', 'Emisso', '2016-01-23', '2016-02-21', 'ConcluÃ­do', 'Criada com sucesso!', 0, 6, 1),
(46, 'Joao Gordo', '(61) 9988-7766', 'Teste', 'Ivanilson', 'Emisso', '2016-01-29', '2016-04-25', 'ConcluÃ­do', ' ok!', NULL, 2, 1),
(85, 'XUXA MENEGUEL', '(61) 9988-7734', 'Cliente quer incluir Contas no Plano V', 'Najara', 'Acrizio', '2016-02-01', '0000-00-00', 'Em progresso', '  Esperando o vivo 360 voltar...', NULL, 5, 14),
(86, 'PelÃ© rei do Futebol', '(61) 9988-7734', 'Migrar para o Pre', 'Ivanilson', 'Najara', '2016-02-01', '0000-00-00', 'Pendente', 'Linha Migrada com Sucesso!', NULL, 8, 40),
(87, 'Jesus de NazarÃ©', '6199887712', 'Teste para ver se o AcrÃ­zio consegue visualizar a prÃ³pria demanda!', 'Acrizio', 'Acrizio', '2016-02-04', '0000-00-00', 'Pendente', 'OK Visualizado!!', NULL, 5, 14),
(88, 'Maria de NazarÃ©', '6199333333', 'Teste de Data com input type text', 'Acrizio', 'Acrizio', '2016-03-13', '2016-03-13', 'ConcluÃ­do', 'ok', 2147483, 10, 14),
(95, 'Ticiane', '6199887766', 'migrar para o controle cliente ciente dos valores e  multa', 'Ivanilson', 'Tayna', '2016-02-05', '0000-00-00', 'Pendente', 'Estou esperando o sistema voltar', NULL, 2, 17),
(107, 'Carnaval de Souza', '6199237766', 'Cliente em loja solicita o Desbloqueio por FRD', 'Ivanilson', 'Nanciara', '2016-02-09', '0000-00-00', 'Pendente', 'ok', 0, 2, 17),
(115, 'Karen Fugita', '6196773443', 'Abrir Chamado linha nÃ£o navega.', 'Ivanilson', 'Tayna', '2016-02-10', '2016-04-16', 'ConcluÃ­do', 'Faltou o print das telas', NULL, 6, 17),
(145, 'Php Orientado a Objeto', '6199888755', 'Fazer algumas FunÃ§Ãµes para automatizar as demandas.', 'Najara', 'Emisso', '2016-02-21', '2016-03-27', 'ConcluÃ­do', 'FunÃ§Ãµes feitas!', NULL, 1, 1),
(160, 'Marina da Silva Santos', '6199237743', 'Desmembrar contas passar o Dep para o plano 3GB.', 'Ivanilson', 'Tayna', '2016-03-02', '0000-00-00', 'Novo', '', 0, 2, 13),
(174, 'Claudia Leite', '7656765767', 'ttretretertretrew', 'Acrizio', 'Tayna', '2016-03-13', '0000-00-00', 'Pendente', '  ', NULL, 5, 13),
(175, 'Shing Ling da Silva', '6199888787', 'Migrar para o Pos', 'Acrizio', 'Tayna', '2016-03-13', '2016-03-13', 'ConcluÃ­do', ' ', NULL, 6, 13),
(176, 'fulano de tal', '6199347474', 'teste ', 'Acrizio', 'Acrizio', '2016-03-13', '2016-03-13', 'ConcluÃ­do', 'ja adicionando resposta', NULL, 7, 14),
(177, 'teste todo', '6199999999', 'teste 2', 'Acrizio', 'Acrizio', '2016-03-13', '0000-00-00', 'Pendente', '', NULL, 6, 14),
(178, 'teste de Data', '6199989849', 'teste', 'Acrizio', 'Acrizio', '2016-03-13', '0000-00-00', 'Novo', '', 0, 7, 14),
(179, '', '', '', 'selecione', 'Acrizio', '2016-03-17', '0000-00-00', 'Novo', '', 0, 2, 14),
(181, 'Antonia Fontenelle', '6194848484', 'efetuar  a migraÃ§Ã£o para o prÃ© pago cliente ciente de multa', 'Acrizio', 'Acrizio', '2016-03-26', '2016-03-27', 'ConcluÃ­do', 'migrando...', NULL, 1, 14),
(185, 'Raimundo Nonato da Silva', '6199864343', 'Migrar para o controle', 'Najara', 'Tayna', '2016-03-27', '0000-00-00', 'Novo', '', 0, 2, 13),
(193, 'teste de Datavteste', '(61) 9999-9999', 'teste', 'Acrizio', 'Acrizio', '2016-04-25', '0000-00-00', 'Novo', '', 0, 2, 14),
(194, 'fulano de tal', '(61) 9988-7766', 'TESTE', 'Ivanilson', 'Acrizio', '2016-05-01', '0000-00-00', 'Novo', '', 0, 2, 14),
(195, 'teste de id', '(61) 9994-9484', 'teste', 'Ivanilson', 'Ivanilson', '2016-05-01', '0000-00-00', 'Novo', '', 0, 8, 17),
(196, 'teste de id usuario blz', '(61) 9994-4949', 'teste', 'Ivanilson', 'Ivanilson', '2016-05-01', '0000-00-00', 'Novo', '', 0, 1, 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

CREATE TABLE IF NOT EXISTS `equipamento` (
  `id_equipamento` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `num_patrimonio` varchar(50) DEFAULT NULL,
  `fabricante` varchar(150) DEFAULT NULL,
  `modelo` varchar(150) DEFAULT NULL,
  `id_estabelecimento` varchar(150) DEFAULT NULL,
  `departamento` varchar(150) DEFAULT NULL,
  `valor_aquisicao` varchar(15) DEFAULT NULL,
  `ultima_manutencao` date DEFAULT NULL,
  `idade_equipamento` varchar(100) DEFAULT NULL,
  `situacao_equipamento` varchar(100) DEFAULT NULL,
  `num_utilizacao` int(11) DEFAULT NULL,
  `manutencao_equipamento` varchar(100) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  PRIMARY KEY (`id_equipamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `equipamento`
--

INSERT INTO `equipamento` (`id_equipamento`, `codigo`, `tipo`, `num_patrimonio`, `fabricante`, `modelo`, `id_estabelecimento`, `departamento`, `valor_aquisicao`, `ultima_manutencao`, `idade_equipamento`, `situacao_equipamento`, `num_utilizacao`, `manutencao_equipamento`, `data_cadastro`) VALUES
(1, NULL, 'Escritorio', '1234', 'nasa', 'iso 3535', '29', 'centro cirurgico', '3000,00', '2013-05-05', 'Menos de 1 ano', 'Seminovo', NULL, 'Sem contrato', '2017-02-17'),
(2, NULL, 'Escritorio', '123', 'nasa', 'iso 3535', '29', 'centro cirurgico', '3000,00', '2013-05-05', NULL, 'Seminovo', 18, 'Sem contrato', '2017-02-17'),
(3, NULL, 'Escritorio', '123', 'nasa', 'iso 3535', '29', 'centro cirurgico', '3000,00', '2013-05-05', 'Entre 1 e 2 anos', 'Seminovo', 18, 'Sem contrato', '2017-02-17'),
(4, NULL, 'Outros', '123', 'nasa', 'iso 3535', '29', 'centro cirurgico', '3000,00', '2013-05-05', 'Entre 1 e 2 anos', 'Seminovo', NULL, 'Sem contrato', '2017-02-17'),
(5, NULL, 'Outros', '123', 'nasa', 'iso 3535', '30', 'centro cirurgico', '3000,00', '1990-12-12', 'Entre 2 e 4 anos', 'Seminovo', 18, 'Sem contrato', '2017-02-17'),
(6, NULL, 'Escritorio', '369', 'HRS', 'HRS2000', '30', 'Pediatria', 'R$ 3.000,00', '2016-10-25', 'Entre 2 e 4 anos', 'Seminovo', 100, 'Garantia do fabricante', '2017-02-18'),
(7, NULL, 'Escritorio', '1234', 'nasa', 'fdasfasf', '29', 'centro cirurgico', 'R$ 54.656,56', '2012-12-22', 'Menos de 1 ano', 'Seminovo', 25, 'Contrato', '2017-03-23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estabelecimento`
--

CREATE TABLE IF NOT EXISTS `estabelecimento` (
  `id_estabelecimento` int(11) NOT NULL AUTO_INCREMENT,
  `id_regiao` int(11) DEFAULT NULL,
  `nome_estabelecimento` varchar(150) DEFAULT NULL,
  `numero_estabelecimento` int(11) DEFAULT NULL,
  `tipo_estabelecimento` varchar(50) DEFAULT NULL,
  `cidade_estabelecimento` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_estabelecimento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Extraindo dados da tabela `estabelecimento`
--

INSERT INTO `estabelecimento` (`id_estabelecimento`, `id_regiao`, `nome_estabelecimento`, `numero_estabelecimento`, `tipo_estabelecimento`, `cidade_estabelecimento`) VALUES
(29, 62, 'Hospital Regional de Sobradinho', 1, '1', 'Sobradinho'),
(30, 62, 'Hospital Regional de Planaltina', 2, '1', 'Planaltina'),
(39, 62, 'bdfb', 3, '1', 'Planaltina'),
(40, 62, 'clinica da familia complexo da saude', 22, '2', 'Sobradinho'),
(42, 62, 'Centro de SaÃºde 03', 21, '2', 'Sobradinho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_perfil` varchar(45) DEFAULT NULL,
  `nome_perfil` varchar(45) DEFAULT NULL,
  `descricao_perfil` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `tipo_perfil`, `nome_perfil`, `descricao_perfil`) VALUES
(1, 'ADMG', 'Administrador Geral', 'Possui todos os privilÃ©gios do Sistema');

-- --------------------------------------------------------

--
-- Estrutura da tabela `regiao`
--

CREATE TABLE IF NOT EXISTS `regiao` (
  `id_regiao` int(11) NOT NULL AUTO_INCREMENT,
  `numero_regiao` int(11) DEFAULT NULL,
  `nome_regiao` varchar(50) DEFAULT NULL,
  `sigla` varchar(50) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_regiao`),
  KEY `id_regional` (`id_regiao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

--
-- Extraindo dados da tabela `regiao`
--

INSERT INTO `regiao` (`id_regiao`, `numero_regiao`, `nome_regiao`, `sigla`, `descricao`) VALUES
(62, 50, 'SuperintendÃªncia da RegiÃ£o de SaÃºde Norte', 'SRSNo', 'sssd'),
(76, 51, 'SuperintendÃªncia da RegiÃ£o de SaÃºde Sul', 'SRSS', 'dfsdgdsg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_demanda`
--

CREATE TABLE IF NOT EXISTS `tipo_demanda` (
  `id_tipoDemanda` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_demanda` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipoDemanda`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `tipo_demanda`
--

INSERT INTO `tipo_demanda` (`id_tipoDemanda`, `tipo_demanda`) VALUES
(1, 'Migracao Pos para o Pre'),
(2, 'Migracao Pos para o Controle'),
(5, 'Desmembramento de Contas'),
(6, 'Unir Contas'),
(7, 'Alterar Carteira'),
(8, 'Contestacao'),
(9, 'Desbloqueio FRD'),
(10, 'Abrir Chamado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_estabelecimento`
--

CREATE TABLE IF NOT EXISTS `tipo_estabelecimento` (
  `id_tipo_estabelecimento` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) DEFAULT NULL,
  `obs` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_estabelecimento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tipo_estabelecimento`
--

INSERT INTO `tipo_estabelecimento` (`id_tipo_estabelecimento`, `tipo`, `obs`) VALUES
(1, 'Hospital', 'alteraÃ§Ã£o'),
(2, 'CLINICA DA FAMILIA', 'teste de alteraÃ§Ã£o, agora vai');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE IF NOT EXISTS `unidade` (
  `id_unidade` int(11) NOT NULL AUTO_INCREMENT,
  `numero_unidade` int(11) DEFAULT NULL,
  `nome_unidade` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `cnes_unidade` varchar(45) DEFAULT NULL,
  `telefone_unidade` varchar(15) DEFAULT NULL,
  `email_unidade` varchar(45) DEFAULT NULL,
  `endereco_unidade` varchar(200) DEFAULT NULL,
  `id_regional` int(11) NOT NULL,
  PRIMARY KEY (`id_unidade`),
  KEY `fk_tb_unidade_tb_regional` (`id_regional`),
  KEY `id_unidade` (`id_unidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=332 ;

--
-- Extraindo dados da tabela `unidade`
--

INSERT INTO `unidade` (`id_unidade`, `numero_unidade`, `nome_unidade`, `tipo`, `cnes_unidade`, `telefone_unidade`, `email_unidade`, `endereco_unidade`, `id_regional`) VALUES
(1, 603, 'ESF Corrego do Arrozal', 'ESF', '0011568', '3591-1635', 'clinica@gmail.com', 'Clinica da Familia de Nova Colina', 9),
(2, 1, 'PSU AREAL QS 08', 'ESF', '3742822', '33331111', 'TESTE@GMAIL.COM', NULL, 14),
(3, 11, 'PSR INCRA 08  ', 'ESF', '0011509', '33331111', ' TESTE@GMAIL.COM', '', 3),
(4, 13, 'PSR Almecegas', 'ESF', '0011495', '33331111', ' TESTE@GMAIL.COM', NULL, 3),
(5, 15, 'UBS Chapadinha', 'ESF', '3144631', '33331111', ' TESTE@GMAIL.COM', NULL, 3),
(6, 16, 'PSU Brazlandia 01', 'EACS', '3144658', '33331111', ' TESTE@GMAIL.COM', NULL, 3),
(7, 19, 'UBS Veredas II 07', 'ESF', '3742865', '33331111', ' TESTE@GMAIL.COM', NULL, 3),
(8, 20, 'CSBZ 01 08', 'EACS', '0011215', '33331111', ' TESTE@GMAIL.COM', NULL, 3),
(9, 21, 'Vila Sao Jose 02', 'ESF', '6662358', '33331111', ' TESTE@GMAIL.COM', NULL, 3),
(10, 22, 'Vila Sao Jose 04', 'ESF', '6662358', '33331111', ' TESTE@GMAIL.COM', NULL, 3),
(11, 23, 'Vila Sao Jose 09', 'ESF', '6662358', '33331111', ' TESTE@GMAIL.COM', NULL, 3),
(12, 24, 'Vila Sao Jose 10', 'EACS', '6662358', '33331111', ' TESTE@GMAIL.COM', NULL, 3),
(13, 25, 'Vila Sao Jose 11', 'ESF', '6662358', '33331111', ' TESTE@GMAIL.COM', NULL, 3),
(14, 31, 'CSCA 01 01', 'EACS', '0011185', '33331111', ' TESTE@GMAIL.COM', NULL, 5),
(15, 38, 'PSR Boa Esperanca 01', 'EACS', '3144542', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(16, 39, 'PSU Condominio Prive 02', 'ESF', '3677044', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(17, 41, 'CSC 02 04', 'ESF', '0010987', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(18, 42, 'CSC 03 05', 'ESF', '0010995', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(19, 43, 'CSC 04 06', 'ESF', '0011002', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(20, 44, 'CSC 05 07', 'ESF', '0011010', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(21, 51, 'CSC 05 14', 'ESF', '0011010', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(22, 45, 'CSC 06 08', 'EACS', '0011029', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(23, 46, 'CSC 07 09', 'ESF', '0011037', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(24, 47, 'CSC 08 10', 'ESF', '0011045', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(25, 54, 'CSC 08 17', 'ESF', '0011045', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(26, 56, 'Laboratorio 19', 'ESF', '7347715', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(27, 57, 'Laboratorio 20', 'ESF', '7347715', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(28, 72, 'Laboratorio 18', 'EACS', '7347715', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(29, 58, 'Vila Olimpica 21', 'ESF', '7347723', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(30, 48, 'CSC 09 11', 'ESF', '0011053', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(31, 52, 'CSC 09 15', 'ESF', '0011053', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(32, 53, 'CSC 09 16', 'ESF', '0011053', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(33, 49, 'CSC 10 12', 'ESF', '0011207', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(34, 60, 'CSC 10 23', 'ESF', '0011207', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(35, 61, 'CSC 10 24', 'ESF', '0011207', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(36, 62, 'CSC 10 25', 'ESF', '0011207', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(37, 50, 'CSC 11 13', 'ESF', '0011061', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(38, 64, 'CSC 12 27', 'ESF', '2617293', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(39, 66, 'CSC 12 29', 'ESF', '2617293', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(40, 67, 'CSC 12 30', 'ESF', '2617293', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(41, 68, 'CSC 12 31', 'ESF', '2617293', '33331111', ' TESTE@GMAIL.COM', NULL, 4),
(42, 203, 'PSU DVO 01', 'ESF', '2673894', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(43, 204, 'UBS Ponte Alta Norte 02', 'EACS', '3144577', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(44, 205, 'PSR Engenho das Lages 03', 'ESF', '2779404', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(45, 206, 'UBS Ponte Alta  04', 'EACS', '3144615', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(46, 215, 'CSG 01 13', 'ESF', '0010820', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(47, 235, 'CSG 01 14', 'ESF', '0010820', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(48, 248, 'CSG 01 27', 'ESF', '0010820', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(49, 208, 'CSG 02 06', 'ESF', '0010839', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(50, 236, 'CSG 02 15', 'ESF', '0010839', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(51, 242, 'CSG 02 21', 'ESF', '0010839', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(52, 250, 'CSG 02 29', 'ESF', '0010839', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(53, 209, 'CSG 03 07', 'ESF', '0010847', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(54, 237, 'CSG 03 16', 'ESF', '0010847', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(55, 243, 'CSG 03 22', 'ESF', '0010847', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(56, 207, 'CSG 04 05', 'ESF', '0010855', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(57, 210, 'CSG 04 08', 'ESF', '0010855', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(58, 238, 'CSG 04 17', 'ESF', '0010855', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(59, 244, 'CSG 04 23', 'ESF', '0010855', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(60, 239, 'CSG 05 18', 'ESF', '0010863', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(61, 211, 'CSG 06 09', 'ESF', '0010871', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(62, 240, 'CSG 06 19', 'EACS', '0010871', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(63, 245, 'CSG 06 24', 'ESF', '0010871', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(64, 246, 'CSG 06 25', 'ESF', '0010871', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(65, 212, 'CSG 08 10', 'ESF', '0010898', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(66, 241, 'CSG 08 20', 'ESF', '0010898', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(67, 247, 'CSG 08 26', 'ESF', '0010898', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(68, 249, 'CSG 08 28', 'ESF', '0010898', '33331111', ' TESTE@GMAIL.COM', NULL, 6),
(69, 254, 'CSGu 01 01', 'EACS', '0011118', '33331111', ' TESTE@GMAIL.COM', NULL, 7),
(70, 255, 'CSGu 02 02', 'EACS', '0011266', '33331111', ' TESTE@GMAIL.COM', NULL, 7),
(71, 256, 'CSGu 03 03', 'EACS', '0011274', '33331111', ' TESTE@GMAIL.COM', NULL, 7),
(72, 301, 'CSNB 02 03', 'EACS', '0011126', '33331111', ' TESTE@GMAIL.COM', NULL, 5),
(73, 313, 'PSR PAD-DF 01', 'ESF', '0011630', '33331111', ' TESTE@GMAIL.COM', NULL, 15),
(74, 314, 'PSR Jardim II 02', 'ESF', '0011606', '33331111', ' TESTE@GMAIL.COM', NULL, 15),
(75, 316, 'PSR Capao Seco 04', 'ESF', '0011614', '33331111', ' TESTE@GMAIL.COM', NULL, 15),
(76, 317, 'PSR Cariru 05', 'ESF', '2804107', '33331111', ' TESTE@GMAIL.COM', NULL, 15),
(77, 318, 'PSU Quadra 18 PA 06', 'ESF', '3286975', '33331111', ' TESTE@GMAIL.COM', NULL, 15),
(78, 321, 'CSPA 01 09', 'EACS', '0010634', '33331111', ' TESTE@GMAIL.COM', NULL, 15),
(79, 328, 'PSR Cafe sem Troco 16', 'EACS', '7075596', '33331111', ' TESTE@GMAIL.COM', NULL, 15),
(80, 334, 'PSR Santos Dumont 01', 'ESF', '2672235', '33331111', ' TESTE@GMAIL.COM', 'DF 130 Km 25 Santos Dumont', 8),
(81, 335, 'PSR Taquara  02', 'ESF', '2804174', '33331111', ' TESTE@GMAIL.COM', 'Nucleo Rural Taquara', 8),
(82, 336, 'UBS Rajadinha 03', 'ESF', '0011576', '33331111', ' TESTE@GMAIL.COM', 'Nucleo Rural Rajadinha Chacara n 13 Riacho Doce', 8),
(83, 337, 'UBS Bica do DER 04', 'ESF', '2804123', '33331111', ' TESTE@GMAIL.COM', 'Condominio Cachoeira Conjunto D lote 01 area Especial', 8),
(84, 338, 'PSR Sao Jose 05', 'ESF', '0011622', '33331111', ' TESTE@GMAIL.COM', 'Nucleo Rural Sao Jose', 8),
(85, 339, 'PSR Tabatinga 06', 'ESF', '0011584', '33331111', ' TESTE@GMAIL.COM', 'Nucleo Rural Tabatinga', 8),
(86, 340, 'PSR Rio Preto 07', 'ESF', '2672227', '33331111', ' TESTE@GMAIL.COM', 'Nucleo Rural Rio Preto', 8),
(87, 341, 'PSR Pipiripau 08', 'ESF', '0011592', '33331111', ' TESTE@GMAIL.COM', 'Nucleo Rural Pipiripau', 8),
(88, 342, 'UBS Jardim Morumbi 09', 'ESF', '3144666', '33331111', ' TESTE@GMAIL.COM', 'Condominio Morumbi Quadra N lote 15  Vale do Sol  BR 020 Km 04', 8),
(89, 345, 'CSP 01 10', 'EACS', '0011088', '33331111', ' TESTE@GMAIL.COM', 'area Especial Setor Hospitalar Centro de Saude I', 8),
(90, 346, 'CSP 02 11', 'EACS', '0010650', '33331111', ' TESTE@GMAIL.COM', 'area Especial A B SRL Buritis', 8),
(91, 347, 'CSP 03 12', 'EACS', '0011096', '33331111', ' TESTE@GMAIL.COM', 'Ver endereo', 8),
(92, 349, 'PSU Vale do Amanhecer 13', 'ESF', '5050359', '33331111', ' TESTE@GMAIL.COM', 'CR 71 lote 171 Vale do Amanhecer', 8),
(93, 350, 'PSU Vale do Amanhecer 14', 'ESF', '5050359', '33331111', ' TESTE@GMAIL.COM', 'CR 71 lote 171 Vale do Amanhecer', 8),
(94, 354, 'CSP 05  Arapoanga 18', 'ESF', '6216021', '33331111', ' TESTE@GMAIL.COM', 'Quadra 12 Setor de area Especial de Fut Arapoangas', 8),
(95, 355, 'CSP 05  Arapoanga 19', 'ESF', '6216021', '33331111', ' TESTE@GMAIL.COM', 'Quadra 12 Setor de area Especial de Fut Arapoangas', 8),
(96, 356, 'CSP 05  Arapoanga 20', 'ESF', '6216021', '33331111', ' TESTE@GMAIL.COM', 'Quadra 12 Setor de area Especial de Fut Arapoangas', 8),
(97, 357, 'CSP 05  Arapoanga 21', 'ESF', '6216021', '33331111', ' TESTE@GMAIL.COM', 'Quadra 12 Setor de area Especial de Fut Arapoangas', 8),
(98, 358, 'CSP 05 Arapoanga 22', 'ESF', '6216021', '33331111', ' TESTE@GMAIL.COM', 'Quadra 12 Setor de area Especial de Fut Arapoangas', 8),
(99, 359, 'CSP 05 Arapoanga 23', 'ESF', '6216021', '33331111', ' TESTE@GMAIL.COM', 'Quadra 12 Setor de area Especial de Fut Arapoangas', 8),
(100, 361, 'PSU Arapoanga 25', 'ESF', '5050340', '33331111', ' TESTE@GMAIL.COM', 'Quadra 08 Conjunto 01 ESF Arapoanga', 8),
(101, 362, 'PSU Arapoanga 26', 'EACS', '5050340', '33331111', ' TESTE@GMAIL.COM', 'Quadra 08 Conjunto 01 ESF Arapoanga', 8),
(102, 363, 'PSU Arapoanga 27', 'ESF', '5050340', '33331111', ' TESTE@GMAIL.COM', 'Quadra 08 Conjunto 01 ESF Arapoanga', 8),
(103, 366, 'Mestre D Armas 30', 'ESF', '6216013', '33331111', ' TESTE@GMAIL.COM', 'Estancia Nova Planaltina Quadra 02 Rua A area Especial Planaltina', 8),
(104, 367, 'Mestre D armas 31', 'ESF', '6216013', '33331111', ' TESTE@GMAIL.COM', 'Estancia Nova Planaltina Quadra 02 Rua A area Especial Planaltina', 8),
(105, 368, 'Mestre D armas 32', 'ESF', '6216013', '33331111', ' TESTE@GMAIL.COM', 'Estancia Nova Planaltina Quadra 02 Rua A area Especial Planaltina', 8),
(106, 369, 'Mestre D armas 33', 'ESF', '6216013', '33331111', ' TESTE@GMAIL.COM', 'Estancia Nova Planaltina Quadra 02 Rua A area Especial Planaltina', 8),
(107, 370, 'Mestre D armas 34', 'ESF', '6216013', '33331111', ' TESTE@GMAIL.COM', 'Estancia Nova Planaltina Quadra 02 Rua A area Especial Planaltina', 8),
(108, 374, 'PSU n  1 Jardim Roriz 38', 'ESF', '6216013', '33331111', ' TESTE@GMAIL.COM', 'AE 01 Quadras 3/4 area Jardim Roriz', 8),
(109, 391, 'UBS Sao Francisco I 01', 'ESF', '2804247', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(110, 392, 'UBS Sao Francisco II 02', 'ESF', '2804247', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(111, 393, 'UBS Casa Grande 03', 'ESF', '2779331', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(112, 394, 'PSU Recanto das Emas  01 04', 'ESF', '3144623', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(113, 395, 'PSU Recanto das Emas  01 05', 'ESF', '3144623', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(114, 396, 'CSRE 01 06', 'ESF', '0010804', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(115, 400, 'CSRE 01 10', 'ESF', '0010804', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(116, 404, 'CSRE 01 14', 'ESF', '0010804', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(117, 405, 'CSRE 01 15', 'ESF', '0010804', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(118, 406, 'CSRE 01 16', 'ESF', '0010804', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(119, 407, 'CSRE 01 17', 'ESF', '0010804', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(120, 397, 'CSRE 02 07', 'EACS', '0011134', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(121, 398, 'CEF Qd 803 - R. das Emas 08', 'ESF', '7059892', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(122, 399, 'UBS Qd 101 - R. das Emas 09', 'ESF', '7059957', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(123, 401, 'UBS Qd 101 - R. das Emas 11', 'ESF', '7059957', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(124, 402, 'UBS Qd 101 - R. das Emas 12', 'ESF', '7059957', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(125, 403, 'UBS - Qd 604 - Centro Olimpico 13', 'ESF', '7059965', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(126, 408, 'Clinica da Familia Qd 104 Amarela 18', 'ESF', '7170939', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(127, 409, 'Clinica da Familia Qd 104 Laranja 19', 'ESF', '7170939', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(128, 410, 'Clinica da Familia Qd 104 Verde 20', 'ESF', '7170939', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(129, 413, 'Clinica da Familia Qd 104 Rosa 23', 'ESF', '7170939', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(130, 414, 'Clinica da Familia Qd 104 Cinza 24', 'ESF', '7170939', '33331111', ' TESTE@GMAIL.COM', NULL, 10),
(131, 429, 'PSU RF I 01', 'ESF', '0011169', '33331111', ' TESTE@GMAIL.COM', NULL, 5),
(132, 430, 'UBS R.Fundo I 02', 'ESF', '3781437', '33331111', ' TESTE@GMAIL.COM', NULL, 5),
(133, 428, 'PSU 2 - RF II 01', 'ESF', '3410196', '33331111', ' TESTE@GMAIL.COM', NULL, 5),
(134, 37, 'PSU 2 - RF II 13', 'ESF', '3410196', '33331111', ' TESTE@GMAIL.COM', NULL, 5),
(135, 432, 'PSU - RF II 02', 'ESF', '2660199', '33331111', ' TESTE@GMAIL.COM', NULL, 5),
(136, 447, 'PSU - RF II 08', 'ESF', '2660199', '33331111', ' TESTE@GMAIL.COM', NULL, 5),
(137, 36, 'PSU - RF II 14', 'ESF', '2660199', '33331111', ' TESTE@GMAIL.COM', NULL, 5),
(138, 445, 'UBS RF II QN 14 C 03', 'ESF', '7060343', '33331111', ' TESTE@GMAIL.COM', NULL, 5),
(139, 444, 'UBS RF II QN 15 D 04', 'ESF', '7060343', '33331111', ' TESTE@GMAIL.COM', NULL, 5),
(140, 452, 'UBS RF II QN 14 C 06', 'ESF', '7060343', '33331111', ' TESTE@GMAIL.COM', NULL, 5),
(141, 453, 'UBS RF II QN 15 D 07', 'ESF', '7060343', '33331111', ' TESTE@GMAIL.COM', NULL, 5),
(142, 446, 'PSR CAUB I 05', 'ESF', '2673924', '33331111', ' TESTE@GMAIL.COM', NULL, 5),
(143, 448, 'PSU - RF II 09', 'ESF', '5038669', '33331111', ' TESTE@GMAIL.COM', NULL, 5),
(144, 449, 'PSU - RF II  10', 'ESF', '5038669', '33331111', ' TESTE@GMAIL.COM', NULL, 5),
(145, 450, 'PSU - RF II 11', 'ESF', '5038669', '33331111', ' TESTE@GMAIL.COM', NULL, 5),
(146, 451, 'PSU - RF II 12', 'ESF', '5038669', '33331111', ' TESTE@GMAIL.COM', NULL, 5),
(147, 454, 'CFSAM 01  01', 'ESF', '6921736', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(148, 458, 'CFSAM 01 05', 'ESF', '6921736', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(149, 456, 'PSU Samambaia Qd 317 03', 'ESF', '3742857', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(150, 474, 'PSU Samambaia Qd 317 06', 'ESF', '3742857', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(151, 461, 'UBS Samambaia QD 501 08', 'ESF', '3633845', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(152, 479, 'CSSA 01 15', 'ESF', '0010642', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(153, 480, 'CSSA 01 16', 'ESF', '0010642', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(154, 481, 'CSSA 01 17', 'ESF', '0010642', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(155, 482, 'CSSA 01 18', 'ESF', '0010642', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(156, 483, 'CSSA 01 19', 'ESF', '0010642', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(157, 484, 'CSSA 01 20', 'ESF', '0010642', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(158, 485, 'CSSA 01 21', 'ESF', '0010642', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(159, 486, 'CSSA 01 22', 'ESF', '0010642', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(160, 487, 'CSSA 01 23', 'ESF', '0010642', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(161, 488, 'CSSA 01 24', 'ESF', '0010642', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(162, 505, 'CSSA 01 41', 'ESF', '0010642', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(163, 506, 'CSSA 01 42', 'ESF', '0010642', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(164, 507, 'CSSA 01 43', 'ESF', '0010642', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(165, 491, 'CSSA 02 27', 'ESF', '0010774', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(166, 492, 'CSSA 02 28', 'ESF', '0010774', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(167, 493, 'CSSA 02 29', 'ESF', '0010774', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(168, 494, 'CSSA 02 30', 'ESF', '0010774', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(169, 495, 'CSSA 0231', 'ESF', '0010774', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(170, 496, 'CSSA 02 32', 'ESF', '0010774', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(171, 497, 'CSSA 02 33', 'ESF', '0010774', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(172, 498, 'CSSA 02 34', 'ESF', '0010774', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(173, 499, 'CSSA 02 35', 'ESF', '0010774', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(174, 471, 'CSSA 03  07', 'ESF', '0010677', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(175, 472, 'CSSA 03  09', 'ESF', '0010677', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(176, 473, 'CSSA 03  10', 'ESF', '0010677', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(177, 475, 'CSSA 03  11', 'ESF', '0010677', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(178, 514, 'CSSA 03 46', 'ESF', '0010677', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(179, 515, 'CSSA 03 47', 'ESF', '0010677', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(180, 500, 'CFSAM 03 36', 'ESF', '7114397', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(181, 502, 'CFSAM 03 38', 'ESF', '7114397', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(182, 504, 'CFSAM 03 40', 'ESF', '7114397', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(183, 501, 'CSSA 04 37', 'ESF', '0010685', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(184, 503, 'CSSA 04  39', 'ESF', '0010685', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(185, 509, 'CSSA 04 12', 'ESF', '0010685', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(186, 510, 'CSSA 04 13', 'ESF', '0010685', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(187, 489, 'CFSAM 02 25', 'ESF', '7053754', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(188, 508, 'CFSAM 02 44', 'EACS', '7053754', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(189, 518, 'UBS Sitio do Gama 01', 'ESF', '3144569', '33331111', ' TESTE@GMAIL.COM', NULL, 12),
(190, 520, 'PSU - Santa Maria 03 03', 'ESF', '3144550', '33331111', ' TESTE@GMAIL.COM', NULL, 12),
(191, 521, 'PSU - Santa Maria 01 04', 'ESF', '3144593', '33331111', ' TESTE@GMAIL.COM', NULL, 12),
(192, 525, 'PSU - Santa Maria 01 08', 'EACS', '3144593', '33331111', ' TESTE@GMAIL.COM', NULL, 12),
(193, 522, 'PSU Santa Maria 02 05', 'ESF', '3144607', '33331111', ' TESTE@GMAIL.COM', NULL, 12),
(194, 526, 'PSU Santa Maria 02 09', 'ESF', '3144607', '33331111', ' TESTE@GMAIL.COM', NULL, 12),
(195, 523, 'CSSM 01 06', 'EACS', '0010782', '33331111', ' TESTE@GMAIL.COM', NULL, 12),
(196, 527, 'CSSM 01 10', 'ESF', '3144607', '33331111', ' TESTE@GMAIL.COM', NULL, 12),
(197, 529, 'CSSM 01 12', 'ESF', '3144607', '33331111', ' TESTE@GMAIL.COM', NULL, 12),
(198, 519, 'CSSM02 02', 'ESF', '0010669', '33331111', ' TESTE@GMAIL.COM', NULL, 12),
(199, 524, 'CSSM 02 07', 'EACS', '0010669', '33331111', ' TESTE@GMAIL.COM', NULL, 12),
(200, 528, 'CSSM 02 11', 'EACS', '0010669', '33331111', ' TESTE@GMAIL.COM', NULL, 12),
(201, 556, 'PSR Nova Betania 01', 'ESF', '0011363', '33331111', ' TESTE@GMAIL.COM', NULL, 13),
(202, 563, 'UBS Morro Azul 08', 'ESF', '3212033', '33331111', ' TESTE@GMAIL.COM', NULL, 13),
(203, 564, 'UBS Vila Nova 09', 'ESF', '3212076', '33331111', ' TESTE@GMAIL.COM', NULL, 13),
(204, 565, 'UBS Posto Urb 1 10', 'ESF', '3742873', '33331111', ' TESTE@GMAIL.COM', NULL, 13),
(205, 578, 'UBS Posto Urb 1 23', 'ESF', '3742873', '33331111', ' TESTE@GMAIL.COM', NULL, 13),
(206, 566, 'UBS Posto Urb 2 11', 'ESF', '3212068', '33331111', ' TESTE@GMAIL.COM', NULL, 13),
(207, 574, 'UBS Posto Urb 2 19', 'ESF', '3212068', '33331111', ' TESTE@GMAIL.COM', NULL, 13),
(208, 567, 'UBS Sao Franc SS 12', 'ESF', '3212017', '33331111', ' TESTE@GMAIL.COM', NULL, 13),
(209, 575, 'UBS Sao Jose SS 20', 'ESF', '3212017', '33331111', ' TESTE@GMAIL.COM', NULL, 13),
(210, 568, 'UBS Bosque 02 13', 'ESF', '3212025', '33331111', ' TESTE@GMAIL.COM', NULL, 13),
(211, 569, 'CSSS 01 Setor Central 14', 'ESF', '0010790', '33331111', ' TESTE@GMAIL.COM', NULL, 13),
(212, 570, 'CSSS 01 Setor Central 01 15', 'ESF', '0010790', '33331111', ' TESTE@GMAIL.COM', NULL, 13),
(213, 571, 'CSSS 01 Setor Central 03 16', 'ESF', '0010790', '33331111', ' TESTE@GMAIL.COM', NULL, 13),
(214, 573, 'UBS Vila Boa 18', 'ESF', '3254909', '33331111', ' TESTE@GMAIL.COM', NULL, 13),
(215, 576, 'UBS ST Tradicional 21', 'ESF', '3254887', '33331111', ' TESTE@GMAIL.COM', NULL, 13),
(216, 577, 'UBS - Joao Candido 22', 'ESF', '3286932', '33331111', ' TESTE@GMAIL.COM', NULL, 13),
(217, 579, 'UBS - Morro da Cruz 24', 'ESF', '3781402', '33331111', ' TESTE@GMAIL.COM', NULL, 13),
(218, 588, 'CS  Estrutural            01', 'ESF', '2779374', '33331111', ' TESTE@GMAIL.COM', NULL, 7),
(219, 582, 'CS  Estrutural            02', 'ESF', '2779374', '33331111', ' TESTE@GMAIL.COM', NULL, 7),
(220, 584, 'CS  Estrutural  03', 'ESF', '2779374', '33331111', ' TESTE@GMAIL.COM', NULL, 7),
(221, 586, 'CS  Estrutural 04', 'ESF', '2779374', '33331111', ' TESTE@GMAIL.COM', NULL, 7),
(222, 587, 'CS   Estrutural   05', 'ESF', '2779374', '33331111', ' TESTE@GMAIL.COM', NULL, 7),
(223, 590, 'CS   Estrutural  06', 'ESF', '2779374', '33331111', ' TESTE@GMAIL.COM', NULL, 7),
(224, 289, 'CS   Estrutural  08', 'ESF', '2779374', '33331111', ' TESTE@GMAIL.COM', NULL, 7),
(225, 290, 'CS   Estrutural  09', 'ESF', '2779374', '33331111', ' TESTE@GMAIL.COM', NULL, 7),
(226, 291, 'CS Estrutural 10', 'ESF', '2779374', '33331111', ' TESTE@GMAIL.COM', NULL, 7),
(227, 591, 'UBS CSN 04 QD 15 07', 'ESF', '3513564', '33331111', ' TESTE@GMAIL.COM', NULL, 7),
(228, 593, 'UBS Lago Oeste  02', 'ESF', '2804387', '33331111', ' TESTE@GMAIL.COM', 'Associacao dos Produtores do Lago Oeste', 9),
(229, 595, 'UBS Nova Digneia 04', 'ESF', '0011568', '33331111', ' TESTE@GMAIL.COM', 'Clinica da Familia de Nova Colina', 9),
(230, 596, 'UBS Nova  Colina 05', 'ESF', '0011568', '33331111', ' TESTE@GMAIL.COM', 'Clinica da Familia de Nova Colina', 9),
(231, 604, 'Rota do Cavalo 09', 'ESF', '3513564', '33331111', ' TESTE@GMAIL.COM', 'Df 440 Km 12 Igreja Nossa Senhora', 9),
(232, 597, 'AGUIA', 'ESF', '0011223', '33331111', ' TESTE@GMAIL.COM', 'Quadra 14 AE 22/23', 9),
(233, 598, 'No Ativa', 'EACS', '0011231', '33331111', ' TESTE@GMAIL.COM', 'Quadra 03 AE conjuntos D/E', 9),
(234, 609, 'UBS DNOCS 11', 'ESF', '7290160', '33331111', ' TESTE@GMAIL.COM', 'Quadra 03 AE conjuntos D/E', 9),
(235, 605, 'UBS BASEVI  10', 'ESF', '6770657', '33331111', ' TESTE@GMAIL.COM', 'Associacao de Moradores da Vila Basevi', 9),
(236, 592, 'UBS Engenho Velho 01', 'ESF', '2804360', '33331111', ' TESTE@GMAIL.COM', 'DF 150 Km 12 Rua 09 lote 02', 9),
(237, 610, 'Queima Lencol 12', 'ESF', '2804360', '33331111', ' TESTE@GMAIL.COM', 'DF 150 Km 12 Rua 09 lote 02', 9),
(238, 599, 'Bem Me Quer 08', 'ESF', '7368895', '33331111', ' TESTE@GMAIL.COM', 'Clinica da Familia Complexo da Saude', 9),
(239, 611, 'Morada da Serra  13', 'ESF', '7368895', '33331111', ' TESTE@GMAIL.COM', 'Clinica da Familia Complexo da Saude', 9),
(240, 612, 'UBS Serra Azul 14', 'ESF', '6996299', '33331111', ' TESTE@GMAIL.COM', 'Clinica da Familia Complexo da Saude', 9),
(241, 613, 'PSR Catingueiro 15', 'ESF', '0011517', '33331111', ' TESTE@GMAIL.COM', 'DF 205 Oeste Km 13', 9),
(242, 614, 'Vale dos Pinheiros 04', 'ESF', '6770681', '61 3485-4292', ' TESTE@GMAIL.COM', 'Quadra 45 A Conjunto A Lote 56 Condominio Vale dos Pinheiros', 9),
(243, 615, 'Mini-chacaras 05', 'ESF', '6770665', '33331111', ' TESTE@GMAIL.COM', 'QMS 30A AE 1 Setor de Mansoes de Sobradinho', 9),
(244, 616, 'Vale das Acacias 06', 'ESF', '7041594', '33331111', ' TESTE@GMAIL.COM', 'Qd 12 Lote 01 Condomino Vale das Acacias Associacao Vale das Acacias', 9),
(245, 642, 'CST 01 01', 'EACS', '0010901', '33331111', ' TESTE@GMAIL.COM', NULL, 14),
(246, 643, 'CST 02 02', 'EACS', '0010928', '33331111', ' TESTE@GMAIL.COM', NULL, 14),
(247, 644, 'CST 03 03', 'EACS', '0010936', '33331111', ' TESTE@GMAIL.COM', NULL, 14),
(248, 645, 'CST 04 04', 'EACS', '0010944', '33331111', ' TESTE@GMAIL.COM', NULL, 14),
(249, 646, 'CST 05 05', 'EACS', '0010626', '33331111', ' TESTE@GMAIL.COM', NULL, 14),
(250, 647, 'CST 06 06', 'EACS', '0010952', '33331111', ' TESTE@GMAIL.COM', NULL, 14),
(251, 648, 'CST 07 07', 'EACS', '0010960', '33331111', ' TESTE@GMAIL.COM', NULL, 14),
(252, 649, 'CST 08 08', 'EACS', '2617269', '33331111', ' TESTE@GMAIL.COM', NULL, 14),
(253, 746, 'Cantinho da Saude  01', 'ESF', '5117666', '33331111', ' TESTE@GMAIL.COM', NULL, 1),
(254, 771, 'PSR Vargem Bonita 01', 'ESF', '0011681', '33331111', ' TESTE@GMAIL.COM', NULL, 5),
(255, 319, 'Itapoa 07', 'ESF', '3286959', '33331111', ' TESTE@GMAIL.COM', NULL, 15),
(256, 320, 'Itapoa 08', 'ESF', '3286959', '33331111', ' TESTE@GMAIL.COM', NULL, 15),
(257, 322, 'CSPA 02 10', 'ESF', '6268269', '33331111', ' TESTE@GMAIL.COM', NULL, 15),
(258, 323, 'CSPA 02 11', 'ESF', '6268269', '33331111', ' TESTE@GMAIL.COM', NULL, 15),
(259, 324, 'CSPA 02 12', 'ESF', '6268269', '33331111', ' TESTE@GMAIL.COM', NULL, 15),
(260, 325, 'CSPA 02 13', 'ESF', '6268269', '33331111', ' TESTE@GMAIL.COM', NULL, 15),
(261, 326, 'CSPA 02 14', 'ESF', '6268269', '33331111', ' TESTE@GMAIL.COM', NULL, 15),
(262, 327, 'CSPA 02 15', 'ESF', '6268269', '33331111', ' TESTE@GMAIL.COM', NULL, 15),
(263, 329, 'CSPA 02 Itapoa 17', 'EAB', '6268269', '33331111', ' TESTE@GMAIL.COM', NULL, 15),
(264, 6402, 'CSS02', 'Centro', '0011231', '61 3387-0045', 'nrcacss02sobradinho@gmail.com', 'Quadra 03 AE conjuntos D/E', 9),
(265, 6403, 'CSS03', 'Centro', '0011258', '61 3387-0045', 'zeluisbraga@hotmail.com', 'AR 13 Conjunto 7 Lote 01 Sobradinho II', 9),
(266, 617, 'Girassol', 'ESF', '7368985', '61 3387-0045', 'diraps.cgss@gmail.com', 'Clinica da Familia Complexo da Saude', 9),
(267, 618, 'Violeta', 'ESF', '7368985', '61 3387-0045', 'diraps.cgss@gmail.com', 'Clinica da Familia Complexo da Saude', 9),
(268, 619, 'erva-doce', 'esf', '7368985', '61 3387-0045', 'diraps.cgss@gmail.com', 'Clinica da Familia Complexo da Saude', 9),
(269, 620, 'Lirio', 'esf', '7368985', '61 3387-0045', 'diraps.cgss@gmail.com', 'Clinica da Familia Complexo da Saude', 9),
(270, 621, 'alfazema', 'esf', '7368985', '61 3387-0045', 'diraps.cgss@gmail.com', 'Clinica da Familia Complexo da Saude', 9),
(271, 622, 'alecrim', 'esf', '7368985', '61 3387-0045', 'diraps.cgss@gmail.com', 'Clinica da Familia Complexo da Saude', 9),
(272, 600, 'Lara', 'esf', '0011568', '61 3487-1642', 'diraps.cgss@gmail.com', 'Clinica da Familia de Nova Colina', 9),
(273, 601, 'uberaba', 'esf', '0011568', '61 3487-1642', 'diraps.cgss@gmail.com', 'Clinica da Familia de Nova Colina', 9),
(274, 999, 'CMC', 'central de marcacao', '0010502', '61 3387-1987', 'centraldemarcacao.diraps.cgss@gmail.com', 'PAAP CEB', 9),
(275, 594, 'Beija Flor', 'ESF', '0011223', '61 3591-1635', 'css01.dgss@gmail.com', 'Quadra 14 AE 22/23', 9),
(276, 602, 'Sabia', 'ESF', '0011223', '61 3591-1635', 'css01.dgss@gmail.com', 'Quadra 14 AE 22/23', 9),
(277, 606, 'ARARA', 'ESF', '0011223', '61 3591-1635', 'css01.dgss@gmail.com', 'Quadra 14 AE 22/23', 9),
(278, 607, 'JOAO DE BARRO', 'ESF', '0011223', '61 3519-1635', 'css01.dgss@gmail.com', 'Quadra 14 AE 22/23', 9),
(279, 608, 'Bem Te Vi', 'ESF', '0011223', '61 3591-1635', 'css01.dgss@gmail.com', 'Quadra 14 AE 22/23', 9),
(280, 5200100, 'Abadiania', 'RIDE', '100', '61 3387-0045', 'diraps-cgss@gmail.com', 'Secretaria Municipal de Saude do Municipio', 16),
(281, 5200175, 'Agua Fria de Goias', 'RIDE', '101', '61 3387-0045', 'diraps-cgss@gmail.com', 'Secretaria Municipal de Saude do Municipio', 17),
(282, 5200258, 'Aguas Lindas de Goias', 'RIDE', '102', '61 3387-0045', 'diraps-cgss@gmail.com', 'Secretaria Municipal de Saude do Municipio', 18),
(283, 5200308, 'Alexania', 'RIDE', '103', '61 3387-0045', 'diraps-cgss@gmail.com', 'Secretaria Municipal de Saude do Municipio', 19),
(284, 5204003, 'Cabeceiras', 'RIDE', '104', '61 3387-0045', 'diraps-cgss@gmail.com', 'Secretaria Municipal de Saude do Municipio', 20),
(285, 5205497, 'Cidade Ocidental', 'RIDE', '105', '61 3387-0045', 'diraps-cgss@gmail.com', 'Secretaria Municipal de Saude do Municipio', 21),
(286, 5205513, 'Cocalzinho de Goias', 'RIDE', '106', '61 3387-0045', 'diraps-cgss@gmail.com', 'Secretaria Municipal de Saude do Municipio', 22),
(287, 5205802, 'Corumba de Goias', 'RIDE', '107', '61 3387-0045', 'diraps-cgss@gmail.com', 'Secretaria Municipal de Saude do Municipio', 23),
(288, 5206206, 'Cristalina', 'RIDE', '108', '61 3387-0045', 'diraps-cgss@gmail.com', 'Secretaria Municipal de Saude do Municipio', 24),
(289, 5208004, 'Formosa', 'RIDE', '109', '61 3387-0045', 'diraps-cgss@gmail.com', 'Secretaria Municipal de Saude do Municipio', 25),
(290, 5212501, 'Luziania', 'RIDE', '110', '61 3387-0045', 'diraps-cgss@gmail.com', 'Secretaria Municipal de Saude do Municipio', 26),
(291, 5213053, 'Mimoso de Goias', 'RIDE', '111', '61 3387-0045', 'diraps-cgss@gmail.com', 'Secretaria Municipal de Saude do Municipio', 27),
(292, 5215231, 'Novo Gama', 'RIDE', '112', '61 3387-0045', 'diraps-cgss@gmail.com', 'Secretaria Municipal de Saude do Municipio', 28),
(293, 5215603, 'Padre Bernardo', 'RIDE', '113', '61 3387-0045', 'diraps-cgss@gmail.com', 'Secretaria Municipal de Saude do Municipio', 29),
(294, 5217302, 'Pirenopolis', 'RIDE', '114', '61 3387-0045', 'diraps-cgss@gmail.com', 'Secretaria Municipal de Saude do Municipio', 30),
(295, 5217609, 'Planaltina', 'RIDE', '115', '61 3387-0045', 'diraps-cgss@gmail.com', 'Procurar a Secretaria Municipal de Saude do Municipio de Planaltina para informacoes', 31),
(296, 5219753, 'Santo Antonio do Descoberto', 'RIDE', '116', '61 3387-0045', 'diraps-cgss@gmail.com', 'Secretaria Municipal de Saude do Municipio', 32),
(297, 5221858, 'Valparaiso de Goias', 'RIDE', '117', '61 3387-0045', 'diraps-cgss@gmail.com', 'Secretaria Municipal de Saude do Municipio', 33),
(298, 5222203, 'Vila Boa', 'RIDE', '118', '61 3387-0045', 'diraps-cgss@gmail.com', 'Secretaria Municipal de Saude do Municipio', 34),
(299, 3109303, 'Buritis', 'RIDE', '119', '61 3387-0045', 'diraps-cgss@gmail.com', 'Secretaria Municipal de Saude do Municipio', 35),
(300, 3109451, 'Cabeceira Grande', 'RIDE', '120', '61 3387-0045', 'diraps-cgss@gmail.com', 'Secretaria Municipal de Saude do Municipio', 36),
(301, 3170404, 'Unai', 'RIDE', '121', '61 3387-0045', 'diraps-cgss@gmail.com', 'Secretaria Municipal de Saude do Municipio', 37),
(302, 623, 'Alto Bela Vista', 'ESF', '2804360', '61 3483-2432', 'eng.velho@gmail.com', 'DF 150 Km 11 Quadra 10 Lote 14', 9),
(303, 2440253, 'UBS 01', 'ESF', '2440253', '61 8500 2954', 'psfplanaltina.go@gmail.com', 'QD 03 AREA ESPECIAL SETOR OESTE', 31),
(304, 2438585, 'UBS 02', 'ESF', '2438585', '61 9113 4371', 'psfplanaltina.go@gmail.com', 'QD 04 AREA ESPECIAL SETOR SUL ', 31),
(305, 2438666, 'UBS 03', 'ESF', '2438666', '61 8491 9282 ', 'psfplanaltina.go@gmail.com', 'QD 04 AREA ESPECIAL SETOR LESTE ', 31),
(306, 2438631, 'UBS 04', 'ESF', '2438631', '61 9399 3075', 'psfplanaltina.go@gmail.com', 'QD 02 AREA ESPECIAL SETOR LESTE', 31),
(307, 2438615, 'UBS 05', 'ESF', '2438615', '61 9977 4772', 'psfplanaltina.go@gmail.com', 'QD 13 AREA ESPECIAL SETOR NORTE', 31),
(308, 2438623, 'UBS 06', 'ESF', '2438623', '61 9269 4885', 'psfplanaltina.go@gmail.com', 'QD 02 Mr 02 Casa 10 Setor Norte', 31),
(309, 2438607, 'UBS 07', 'ESF', '2438607', '61 8606 9266', 'psfplanaltina.go@gmail.com', 'Qd 02 Mr 02 Casa 10 Setor Norte', 31),
(310, 2438682, 'UBS 08', 'ESF', '2438682', '61 8265 3772 ', 'psfplanaltina.go@gmail.com', 'Qd 19 Casa 17 Imigrantes', 31),
(311, 2437937, 'UBS 09', 'ESF', '2437937', '61 9104 1628', 'psfplanaltina.go@gmail.com', 'Mutirao Qd 02 lote 24 Setor Aeroporto', 31),
(312, 2438593, 'UBS 10', 'ESF', '2438593', '61 9289 4133 ', 'psfplanaltina.go@gmail.com', 'QD 19 CASA 24 ITAPUa ', 31),
(313, 2437562, 'UBS 11', 'ESF', '2437562', '61 8135 8460 ', 'psfplanaltina.go@gmail.com', 'Qd 40 Casa 07 PaquetA', 31),
(314, 2438674, 'UBS 12', 'ESF', '2438674', '62 9988 7683 ', 'psfplanaltina.go@gmail.com', 'Qd 20 Casa 20 Panorama 17', 31),
(315, 2438658, 'UBS 13', 'ESF', '2438658', '61 9232 1943', 'psfplanaltina.go@gmail.com', 'QD 07 Mr 07 Casa 32 Setor Leste', 31),
(316, 2437546, 'UBS 14', 'ESF', '2437546', '61 9603 7695', 'psfplanaltina.go@gmail.com', 'Procurar a Secretaria Municipal de Saude de Planaltina para informacoes', 31),
(317, 2438445, 'UBS 15', 'ESF', '2438445', '61 9301 1233', 'psfplanaltina.go@gmail.com', 'AREA ESPECIAL CAIC', 31),
(318, 2438240, 'UBS 16', 'ESF', '2438240', '61 9539 2833 ', 'psfplanaltina.go@gmail.com', 'Qd 153 Lt 8 Barrol', 31),
(319, 243824, 'UBS 17', 'ESF', '243824', '61 9244 2614 ', 'psfplanaltina.go@gmail.com', 'Qd 03 Area Especial Setor Oeste', 31),
(320, 2437562, 'UBS 18', 'ESF', '2437562', '61 9373 9578', 'psfplanaltina.go@gmail.com', 'Qd 40 Casa 07 PaquetA', 31),
(321, 2438631, 'UBS 19', 'ESF', '2438631', '61 9399 3075', 'psfplanaltina.go@gmail.com', 'QD 02 AREA ESPECIAL SETOR LESTE', 31),
(322, 2438445, 'UBS 20', 'ESF', '2438445', '61 9169 0772 ', 'psfplanaltina.go@gmail.com', 'AREA ESPECIAL CAIC', 31),
(323, 5065917, 'UBS 21', 'ESF', '5065917', '61 9291 9991 ', 'psfplanaltina.go@gmail.com', 'QD 12 Area Especial 2 Sao Jose', 31),
(324, 7123337, 'UBS 22', 'ESF', '7123337', '61 8464 5065', 'psfplanaltina.go@gmail.com', 'QD 01 Mr 05 Casa 33 Setor Norte', 31),
(325, 5442397, 'UBS 23', 'ESF', '5442397', '61 9844 0146', 'psfplanaltina.go@gmail.com', 'Lagoa', 31),
(326, 7157347, 'UBS 24', 'ESF', '7157347', '61 9373 9578 ', 'psfplanaltina.go@gmail.com', 'Qd 48 casa 42 palmeiras', 31),
(327, 7116926, 'UBS 25', 'ESF', '7116926', '61 8214 4444 ', 'psfplanaltina.go@gmail.com', 'Qd 19 Mr 01 Casa 46 Setor Norte', 31),
(328, 7157355, 'UBS 26', 'ESF', '7157355', '61 8162 8698 ', 'psfplanaltina.go@gmail.com', 'Quadra 08 Mr 07 Casa 44 Setor Norte', 31),
(329, 6301, 'HRS', 'Hospital', '00000', '61 3387-0045', 'hrs.hrs@gmail.com', 'Quadra 12 Area especial Sob', 9),
(330, 6302, 'HRPL', 'Hospital', '123', '61 6666-6666', 'hrpl@gmail.com', '', 8),
(331, 7368895, 'CLINICA DA FAMILIA 02 SOBRADINHO II', 'CLINICA DA FAMILIA', '7368895', '61 3843-0267', 'gsap05s.srsn@saude.df.gov.br', 'DF 440 sobradinho 2', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(10) NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `sobrenome_usuario` varchar(255) NOT NULL,
  `nivel` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `data_cadastro` date NOT NULL,
  `status_usuario` varchar(20) NOT NULL,
  `id_estabelecimento` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `matricula`, `nome_usuario`, `sobrenome_usuario`, `nivel`, `email`, `senha`, `data_cadastro`, `status_usuario`, `id_estabelecimento`) VALUES
(1, 'A001128', 'Emisso', 'Chagas Barbosa', 2, 'emisso.chagas@telefonica.com', '8a773e6ec736a1497c38685160c963b4', '2016-01-12', 'Ativo', 40),
(4, 'A001135', 'Nanciara', 'Rodrigues', 2, 'nanciara.rodrigues@telefonica.com', '3b712de48137572f3849aabd5666a4e3', '2016-02-03', 'Ativo', 2),
(5, 'A001131', 'Kellen', 'Cristinaa', 2, 'kellen.cristina@telefonica.com', '8a773e6ec736a1497c38685160c963b4', '2016-02-05', 'Ativo', 1),
(6, 'A001136', 'Caio', 'Guilherme', 2, 'caio.guilherme@telefonica.com', '3b712de48137572f3849aabd5666a4e3', '2016-02-05', 'Ativo', 1),
(7, 'A001132', 'Cristiane', 'Fagundes', 2, 'cristiane.fagundes@telefonica.com', '3b712de48137572f3849aabd5666a4e3', '2016-02-05', 'Ativo', 1),
(8, 'A001133', 'Carol', 'Alencar', 2, 'carol.alencar@telefonica.com', '827ccb0eea8a706c4c34a16891f84e7b', '2016-04-19', 'Ativo', 1),
(9, 'A001137', 'Wellington', 'Mineiro', 2, 'wellington.mineiro@telefonica.com', '3b712de48137572f3849aabd5666a4e3', '2016-03-16', 'Ativo', 1),
(11, 'A001134', 'Meurry', 'de Lima', 2, 'meurry.silva@telefonica.com', '498093b34791a0e574437223e84eb768', '2016-04-29', 'Ativo', 1),
(13, 'A001126', 'Tayna', 'Oliveira', 2, 'tayna.oliveira@telefonica.com', '3b712de48137572f3849aabd5666a4e3', '2015-12-21', 'Ativo', 1),
(16, 'A001125', 'Janaina', 'GonÃ§alves', 1, 'janaina.goncalves@telefonica.com', '3b712de48137572f3849aabd5666a4e3', '2016-04-22', 'Ativo', 1),
(17, 'A001123', 'Ivanilson', 'Rodrigues', 1, 'ivanilson.rodrigues@telefonica.com', '3b712de48137572f3849aabd5666a4e3', '2016-01-07', 'Ativo', 1),
(30, 'A001127', 'Papa', 'Francisco', 1, 'papa@papa.com.br', '3b712de48137572f3849aabd5666a4e3', '2016-03-10', 'Desativo', 1),
(40, 'A001124', 'Najara', 'Aquino', 1, 'najara.aquino@telefonica.com', '3b712de48137572f3849aabd5666a4e3', '2016-03-27', 'Ativo', 1),
(53, 'A0023423', 'teste', 'da Silva', 1, 'tayna.oliveira@telefonica.com', 'd41d8cd98f00b204e9800998ecf8427e', '2016-05-02', 'Ativo', 1),
(57, 'A001140', 'fulano de Tal', 'Shopping', 1, 'teste@teste.com', 'd41d8cd98f00b204e9800998ecf8427e', '2016-05-02', 'Ativo', 1),
(61, 'A009999', 'teste', 'teste', 1, 'jailsonjpo@hotmail.com', '698dc19d489c4e4db73e28a713eab07b', '2016-05-04', 'Ativo', 29),
(63, '1836889', 'Elbes', 'Alves', 1, 'elbes2009@gmail.com', '8889dad2f304196156798763626bd29d', '2017-01-07', 'Ativo', 1),
(64, 'B009999', 'Elbes', 'Alves de', 1, 'elbes2009@gmail.com', '38d7355701b6f3760ee49852904319c1', '2017-02-10', 'Ativo', 30);
