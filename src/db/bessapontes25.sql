-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: mysql04-farm2.uni5.net
-- Tempo de geração: 26/06/2022 às 12:33
-- Versão do servidor: 10.2.32-MariaDB-log
-- Versão do PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `bessapontes25`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Administrador`
--

CREATE TABLE IF NOT EXISTS `Administrador` (
  `Siape` int(11) NOT NULL,
  `Nome` varchar(80) NOT NULL,
  `Senha` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Sexo` enum('M','F') NOT NULL,
  `Nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Administrador`
--

INSERT INTO `Administrador` (`Siape`, `Nome`, `Senha`, `Email`, `Sexo`, `Nascimento`) VALUES
(1, 'Wesley', '1234a', 'wesley@bol.com.br', 'M', '0000-00-00'),
(2, 'Felipe', '1234b', 'felipe@bol.com.br', 'M', '2000-07-25');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Descricoes`
--

CREATE TABLE IF NOT EXISTS `Descricoes` (
  `Id` int(11) NOT NULL,
  `Fk_id_objeto` int(11) NOT NULL,
  `Campus` enum('Juazeiro do Norte','Crato','Barbalha','Brejo Santo','Ico') NOT NULL,
  `Descricao` mediumtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Descricoes`
--

INSERT INTO `Descricoes` (`Id`, `Fk_id_objeto`, `Campus`, `Descricao`) VALUES
(32, 53, 'Juazeiro do Norte', 'Perdi o celular no banco em frente ao bloco e'),
(33, 54, 'Juazeiro do Norte', 'teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Devolvidos`
--

CREATE TABLE IF NOT EXISTS `Devolvidos` (
  `Id` int(11) NOT NULL,
  `Fk_id_objeto` int(11) NOT NULL,
  `Fk_siape_adm` int(11) NOT NULL,
  `Nome_proprietario` varchar(80) NOT NULL,
  `Email_proprietario` varchar(100) NOT NULL,
  `Data_devolvido` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Devolvidos`
--

INSERT INTO `Devolvidos` (`Id`, `Fk_id_objeto`, `Fk_siape_adm`, `Nome_proprietario`, `Email_proprietario`, `Data_devolvido`) VALUES
(5, 53, 1, 'wesley', 'wesley@bol.com.br', '2022-06-25');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Fotos`
--

CREATE TABLE IF NOT EXISTS `Fotos` (
  `Id` int(11) NOT NULL,
  `Fk_id_objeto` int(11) NOT NULL,
  `Foto` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Fotos`
--

INSERT INTO `Fotos` (`Id`, `Fk_id_objeto`, `Foto`) VALUES
(29, 53, '../uploads/53questao2.PNG'),
(30, 54, '../uploads/54bliss.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Objeto`
--

CREATE TABLE IF NOT EXISTS `Objeto` (
  `Id` int(11) NOT NULL,
  `Fk_siape_adm` int(11) NOT NULL,
  `Nome` varchar(80) NOT NULL,
  `Data_cadastro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Devolvido` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Objeto`
--

INSERT INTO `Objeto` (`Id`, `Fk_siape_adm`, `Nome`, `Data_cadastro`, `Devolvido`) VALUES
(53, 1, 'Celular', '2022-06-25', 1),
(54, 2, 'teste', '2022-06-25', 0);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `Administrador`
--
ALTER TABLE `Administrador`
  ADD PRIMARY KEY (`Siape`);

--
-- Índices de tabela `Descricoes`
--
ALTER TABLE `Descricoes`
  ADD PRIMARY KEY (`Id`), ADD KEY `Id_objeto` (`Fk_id_objeto`), ADD KEY `Id_campus` (`Campus`);

--
-- Índices de tabela `Devolvidos`
--
ALTER TABLE `Devolvidos`
  ADD PRIMARY KEY (`Id`), ADD KEY `Id_objeto1` (`Fk_id_objeto`), ADD KEY `Siape_adm1` (`Fk_siape_adm`);

--
-- Índices de tabela `Fotos`
--
ALTER TABLE `Fotos`
  ADD PRIMARY KEY (`Id`), ADD KEY `Id_objeto2` (`Fk_id_objeto`);

--
-- Índices de tabela `Objeto`
--
ALTER TABLE `Objeto`
  ADD PRIMARY KEY (`Id`), ADD KEY `Siape_adm` (`Fk_siape_adm`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `Descricoes`
--
ALTER TABLE `Descricoes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de tabela `Devolvidos`
--
ALTER TABLE `Devolvidos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `Fotos`
--
ALTER TABLE `Fotos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de tabela `Objeto`
--
ALTER TABLE `Objeto`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `Descricoes`
--
ALTER TABLE `Descricoes`
ADD CONSTRAINT `Descricoes_ibfk_1` FOREIGN KEY (`Fk_id_objeto`) REFERENCES `Objeto` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `Devolvidos`
--
ALTER TABLE `Devolvidos`
ADD CONSTRAINT `Devolvidos_ibfk_1` FOREIGN KEY (`Fk_id_objeto`) REFERENCES `Objeto` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `Devolvidos_ibfk_2` FOREIGN KEY (`Fk_siape_adm`) REFERENCES `Administrador` (`Siape`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Restrições para tabelas `Fotos`
--
ALTER TABLE `Fotos`
ADD CONSTRAINT `Fotos_ibfk_1` FOREIGN KEY (`Fk_id_objeto`) REFERENCES `Objeto` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `Objeto`
--
ALTER TABLE `Objeto`
ADD CONSTRAINT `Objeto_ibfk_1` FOREIGN KEY (`Fk_siape_adm`) REFERENCES `Administrador` (`Siape`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
