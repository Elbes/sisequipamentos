-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 01-Dez-2017 às 11:47
-- Versão do servidor: 5.5.58-0ubuntu0.14.04.1
-- PHP Version: 7.1.1-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_equipamentos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_equipamento`
--

CREATE TABLE `tb_equipamento` (
  `id_equipamento` int(11) NOT NULL,
  `nome_equipamento` varchar(150) DEFAULT NULL,
  `num_patrimonio` varchar(45) DEFAULT NULL,
  `num_serie` varchar(45) DEFAULT NULL,
  `fabricante` varchar(100) DEFAULT NULL,
  `modelo_equip` varchar(100) DEFAULT NULL,
  `marca_equip` varchar(100) DEFAULT NULL,
  `executor_contrato` varchar(60) DEFAULT NULL,
  `setor_instalacao` varchar(100) DEFAULT NULL,
  `responsavel_setor` varchar(100) DEFAULT NULL,
  `telefone_setor` varchar(15) DEFAULT NULL,
  `ramal_setor` varchar(15) DEFAULT NULL,
  `assistencia_tec` varchar(50) DEFAULT NULL,
  `tel_assistencia_tec` varchar(15) DEFAULT NULL,
  `recursos` varchar(15) DEFAULT NULL,
  `valor_aquisicao` varchar(30) DEFAULT NULL,
  `vencimento_garantia` date DEFAULT NULL,
  `contrato_manutencao` varchar(5) DEFAULT NULL,
  `numero_nota_fiscal` varchar(50) DEFAULT NULL,
  `data_instalacao` date DEFAULT NULL,
  `manual_tecnico` varchar(5) DEFAULT NULL,
  `tensao_equip` varchar(15) DEFAULT NULL,
  `potencia_equip` varchar(15) DEFAULT NULL,
  `material_entregue` varchar(15) DEFAULT NULL,
  `dhs_cadastro` timestamp NULL DEFAULT NULL,
  `id_estabelecimento` int(11) NOT NULL,
  `id_usuario_cadastro` int(11) NOT NULL,
  `dhs_atualizacao` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_equipamento`
--

INSERT INTO `tb_equipamento` (`id_equipamento`, `nome_equipamento`, `num_patrimonio`, `num_serie`, `fabricante`, `modelo_equip`, `marca_equip`, `executor_contrato`, `setor_instalacao`, `responsavel_setor`, `telefone_setor`, `ramal_setor`, `assistencia_tec`, `tel_assistencia_tec`, `recursos`, `valor_aquisicao`, `vencimento_garantia`, `contrato_manutencao`, `numero_nota_fiscal`, `data_instalacao`, `manual_tecnico`, `tensao_equip`, `potencia_equip`, `material_entregue`, `dhs_cadastro`, `id_estabelecimento`, `id_usuario_cadastro`, `dhs_atualizacao`) VALUES
(8, 'gffgdg', '5355', '353', 'jghj', 'uluil', 'gjghj', 'jgj', 'htrhtr', 'sfsdf', '3543543', '3535', 'gdf', '35345', 'Comodato', 'R$ 6.332,32', '2017-11-21', 'NÃ£o', '4354354', '2017-11-04', 'Sim', '1221', '23123', 'teste', '2017-11-21 17:53:36', 1, 3, '2017-11-23 14:09:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_estabelecimento`
--

CREATE TABLE `tb_estabelecimento` (
  `id_estabelecimento` int(11) NOT NULL,
  `nome_estabelecimento` varchar(150) DEFAULT NULL,
  `numero_estabelecimento` int(11) DEFAULT NULL,
  `cidade_estabelecimento` varchar(50) DEFAULT NULL,
  `id_tipo_estabelecimento` int(11) NOT NULL,
  `id_regiao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_estabelecimento`
--

INSERT INTO `tb_estabelecimento` (`id_estabelecimento`, `nome_estabelecimento`, `numero_estabelecimento`, `cidade_estabelecimento`, `id_tipo_estabelecimento`, `id_regiao`) VALUES
(1, 'ADMC', 1, 'Brasilia', 1, 1),
(2, 'Hospital Regional de Sobradinho', 6301, 'Sobradinho', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_log_alteracao_equip`
--

CREATE TABLE `tb_log_alteracao_equip` (
  `id_log_alteracao_equip` int(11) NOT NULL,
  `id_equip_alteracao` int(11) DEFAULT NULL,
  `id_usuario_alteracao` int(11) DEFAULT NULL,
  `dhs_alteracao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_log_exclusao_equip`
--

CREATE TABLE `tb_log_exclusao_equip` (
  `id_log` int(11) NOT NULL,
  `id_equipamento` int(11) DEFAULT NULL,
  `id_usuario_exclusao` int(11) DEFAULT NULL,
  `numero_manutencoes` int(11) DEFAULT NULL,
  `dhs_exclusao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_manutencao`
--

CREATE TABLE `tb_manutencao` (
  `id_manutencao` int(11) NOT NULL,
  `id_equipamento` int(11) DEFAULT NULL,
  `servico_solicitado` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `numero_chamado` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `local_falha` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `acessorios` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `local_manutencao` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `data_envio` date DEFAULT NULL,
  `telefone_manutencao` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `contrato_manutencao` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `grau_necessidade` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `origem_falha` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `origem_falha_outro` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `observacao_manutencao` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `previsao_entrega` date DEFAULT NULL,
  `tipo_manutencao` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `responsavel_manutencao` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `falha_relatada` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `servico_realizado` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `data_entrega` date DEFAULT NULL,
  `recebido_por` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pendencia` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `descricao_pendencia` varchar(200) DEFAULT NULL,
  `troca_peca` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `peca_trocada` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `valor_total` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `venc_garantia_servico` date DEFAULT NULL,
  `observacao_fechamento` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `id_usuario_abertura` int(11) DEFAULT NULL,
  `id_usuario_fechamento` int(11) DEFAULT NULL,
  `dhs_abertura` timestamp NULL DEFAULT NULL,
  `dhs_fechamento` timestamp NULL DEFAULT NULL,
  `status_manutencao` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_manutencao`
--

INSERT INTO `tb_manutencao` (`id_manutencao`, `id_equipamento`, `servico_solicitado`, `numero_chamado`, `local_falha`, `acessorios`, `local_manutencao`, `data_envio`, `telefone_manutencao`, `contrato_manutencao`, `grau_necessidade`, `origem_falha`, `origem_falha_outro`, `observacao_manutencao`, `previsao_entrega`, `tipo_manutencao`, `responsavel_manutencao`, `falha_relatada`, `servico_realizado`, `data_entrega`, `recebido_por`, `pendencia`, `descricao_pendencia`, `troca_peca`, `peca_trocada`, `valor_total`, `venc_garantia_servico`, `observacao_fechamento`, `id_usuario_abertura`, `id_usuario_fechamento`, `dhs_abertura`, `dhs_fechamento`, `status_manutencao`) VALUES
(9, 8, 'ManutenÃ§Ã£o Corretiva', '242', 'No Equipamento', 'mhkmhj', 'tht', '2017-10-16', '2572', NULL, 'Urgente', 'Abuso na utilizaÃ§Ã£o', NULL, 'nhnghn', NULL, NULL, NULL, 'dsfsdffdsf ', 'Parcial', '2017-11-28', 'Elbes', 'NÃ£o', '', 'Sim', 'torno', '582365', '2017-11-30', 'sdfsdf sdfdf', 3, 3, '2017-10-11 19:08:23', '2017-11-23 17:18:24', 'Fechada'),
(11, 8, 'CalibraÃ§Ã£o', '569', 'No Equipamento', 'jkjk.', 'h.k.j', '2017-11-27', '56156445', '454564564', 'Normal', 'Erro de operaÃ§Ã£o', NULL, 'tyjtjtj ghtrhtrh', '2017-11-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, '2017-11-27 14:37:26', NULL, 'Aberta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_perfil`
--

CREATE TABLE `tb_perfil` (
  `id_perfil` int(11) NOT NULL,
  `tipo_perfil` varchar(45) DEFAULT NULL,
  `nome_perfil` varchar(45) DEFAULT NULL,
  `descricao_perfil` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_perfil`
--

INSERT INTO `tb_perfil` (`id_perfil`, `tipo_perfil`, `nome_perfil`, `descricao_perfil`) VALUES
(1, 'ADMG', 'Administrador Geral', NULL),
(2, 'NUCLEO', 'Nucleo de Engenharia', 'Perfi, tutilizado pelo núcleo de engenharia, nas unidades - inserir equipamentos e manutenções');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_regiao`
--

CREATE TABLE `tb_regiao` (
  `id_regiao` int(11) NOT NULL,
  `numero_regiao` int(11) DEFAULT NULL,
  `nome_regiao` varchar(50) DEFAULT NULL,
  `sigla_regiao` varchar(45) DEFAULT NULL,
  `descricao_regiao` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_regiao`
--

INSERT INTO `tb_regiao` (`id_regiao`, `numero_regiao`, `nome_regiao`, `sigla_regiao`, `descricao_regiao`) VALUES
(1, 1, 'Administração Central', 'ADMC', ''),
(2, 2, 'Região de Saúde Centro-Norte', 'SRSCN', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_estabelecimento`
--

CREATE TABLE `tb_tipo_estabelecimento` (
  `id_tipo_estabelecimento` int(11) NOT NULL,
  `tipo` varchar(150) DEFAULT NULL,
  `obs_tipo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_tipo_estabelecimento`
--

INSERT INTO `tb_tipo_estabelecimento` (`id_tipo_estabelecimento`, `tipo`, `obs_tipo`) VALUES
(1, 'ADMC', 'Administração Central da SES DF'),
(3, 'UPA', 'Unidade de Pronto Atendimento'),
(4, 'Hospital', 'Hospitais Regionais'),
(5, 'Centro de Saúde', 'CS'),
(6, 'Unidade Mista de Saúde', 'UMS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `matricula` varchar(20) DEFAULT NULL,
  `nome_usuario` varchar(60) DEFAULT NULL,
  `sobrenome_usuario` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `status_usuario` varchar(20) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_estabelecimento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `matricula`, `nome_usuario`, `sobrenome_usuario`, `email`, `senha`, `status_usuario`, `data_cadastro`, `id_perfil`, `id_estabelecimento`) VALUES
(3, '1836889', 'Elbes', 'Alves', 'elbes2009@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Ativo', '2017-07-19', 1, 1),
(4, 'A009999', 'Teste', 'Teste', 'teste@saude.df.gov.br', '698dc19d489c4e4db73e28a713eab07b', 'Ativo', '2017-09-15', 1, 1),
(5, '16724801', 'David', 'Oliveira', 'nusrad.saude@gmail.com', '65e99844dca6148c698c1190d6d8ff3f', 'Ativo', '2017-09-14', 1, 1),
(6, '14410834', 'Brenno ', 'AraÃºjo Da Silva', 'nusrad.saude@gmail.com', '22082e643d7ed3279642a312f7b965ac', 'Ativo', '2017-11-28', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_equipamento`
--
ALTER TABLE `tb_equipamento`
  ADD PRIMARY KEY (`id_equipamento`),
  ADD KEY `fk_tb_equipamento_tb_estabelecimento1_idx` (`id_estabelecimento`),
  ADD KEY `fk_tb_equipamento_tb_usuario1_idx` (`id_usuario_cadastro`);

--
-- Indexes for table `tb_estabelecimento`
--
ALTER TABLE `tb_estabelecimento`
  ADD PRIMARY KEY (`id_estabelecimento`),
  ADD KEY `fk_tb_estabelecimento_tb_tipo_stabelecimento1_idx` (`id_tipo_estabelecimento`),
  ADD KEY `fk_tb_estabelecimento_tb_regiao1_idx` (`id_regiao`);

--
-- Indexes for table `tb_log_alteracao_equip`
--
ALTER TABLE `tb_log_alteracao_equip`
  ADD PRIMARY KEY (`id_log_alteracao_equip`);

--
-- Indexes for table `tb_log_exclusao_equip`
--
ALTER TABLE `tb_log_exclusao_equip`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `tb_manutencao`
--
ALTER TABLE `tb_manutencao`
  ADD PRIMARY KEY (`id_manutencao`),
  ADD KEY `id_manutencao` (`id_manutencao`);

--
-- Indexes for table `tb_perfil`
--
ALTER TABLE `tb_perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indexes for table `tb_regiao`
--
ALTER TABLE `tb_regiao`
  ADD PRIMARY KEY (`id_regiao`);

--
-- Indexes for table `tb_tipo_estabelecimento`
--
ALTER TABLE `tb_tipo_estabelecimento`
  ADD PRIMARY KEY (`id_tipo_estabelecimento`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_tb_usuario_tb_perfil_idx` (`id_perfil`),
  ADD KEY `fk_tb_usuario_tb_estabelecimento1_idx` (`id_estabelecimento`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_equipamento`
--
ALTER TABLE `tb_equipamento`
  MODIFY `id_equipamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_estabelecimento`
--
ALTER TABLE `tb_estabelecimento`
  MODIFY `id_estabelecimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_log_alteracao_equip`
--
ALTER TABLE `tb_log_alteracao_equip`
  MODIFY `id_log_alteracao_equip` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_log_exclusao_equip`
--
ALTER TABLE `tb_log_exclusao_equip`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_manutencao`
--
ALTER TABLE `tb_manutencao`
  MODIFY `id_manutencao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_perfil`
--
ALTER TABLE `tb_perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_regiao`
--
ALTER TABLE `tb_regiao`
  MODIFY `id_regiao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_tipo_estabelecimento`
--
ALTER TABLE `tb_tipo_estabelecimento`
  MODIFY `id_tipo_estabelecimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_equipamento`
--
ALTER TABLE `tb_equipamento`
  ADD CONSTRAINT `fk_tb_equipamento_tb_estabelecimento1` FOREIGN KEY (`id_estabelecimento`) REFERENCES `tb_estabelecimento` (`id_estabelecimento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_equipamento_tb_usuario1` FOREIGN KEY (`id_usuario_cadastro`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_estabelecimento`
--
ALTER TABLE `tb_estabelecimento`
  ADD CONSTRAINT `fk_tb_estabelecimento_tb_regiao1` FOREIGN KEY (`id_regiao`) REFERENCES `tb_regiao` (`id_regiao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_estabelecimento_tb_tipo_stabelecimento1` FOREIGN KEY (`id_tipo_estabelecimento`) REFERENCES `tb_tipo_estabelecimento` (`id_tipo_estabelecimento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `fk_tb_usuario_tb_estabelecimento1` FOREIGN KEY (`id_estabelecimento`) REFERENCES `tb_estabelecimento` (`id_estabelecimento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_usuario_tb_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `tb_perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
