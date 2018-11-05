-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 05/11/2018 às 19:20
-- Versão do servidor: 10.1.36-MariaDB
-- Versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `PearlRecords`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Disco`
--

CREATE TABLE `Disco` (
  `IdDisco` int(11) NOT NULL,
  `Artista` varchar(50) CHARACTER SET utf8 NOT NULL,
  `AnoLancado` int(11) NOT NULL,
  `Genero` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Nome` varchar(60) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Disco`
--

INSERT INTO `Disco` (`IdDisco`, `Artista`, `AnoLancado`, `Genero`, `Nome`) VALUES
(2, 'Dilsinho', 2018, 'Pagode', 'Cansei de Farra'),
(3, 'Henrique e Juliano', 2018, 'Sertanejo', 'Menos Ã© Mais'),
(4, 'Marilia Mendonca', 2018, 'Sertanejo ', 'Ciumeira');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Loja`
--

CREATE TABLE `Loja` (
  `IdLoja` int(11) NOT NULL,
  `Dono` varchar(100) NOT NULL,
  `Telefone` varchar(20) NOT NULL,
  `EnderecoRua` varchar(30) NOT NULL,
  `EnderecoNumero` int(11) NOT NULL,
  `EnderecoBairro` varchar(30) NOT NULL,
  `EnderecoCEP` varchar(10) NOT NULL,
  `EnderecoCidade` varchar(50) NOT NULL,
  `Nome` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Loja`
--

INSERT INTO `Loja` (`IdLoja`, `Dono`, `Telefone`, `EnderecoRua`, `EnderecoNumero`, `EnderecoBairro`, `EnderecoCEP`, `EnderecoCidade`, `Nome`) VALUES
(4, 'Fernanda', '32245566', 'Rua Dvd', 50, 'Cd', '3090087', 'Rio de Janeiro', 'Dance'),
(5, 'Fausto', '35567765', 'Rua Domingo', 123, 'Copa', '6978900', 'Rio de Janeiro ', 'DingDong');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Loja_Disco`
--

CREATE TABLE `Loja_Disco` (
  `IdLoja` int(11) NOT NULL,
  `IdDisco` int(11) NOT NULL,
  `QtdDisco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Loja_Disco`
--

INSERT INTO `Loja_Disco` (`IdLoja`, `IdDisco`, `QtdDisco`) VALUES
(4, 3, 0);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `Disco`
--
ALTER TABLE `Disco`
  ADD PRIMARY KEY (`IdDisco`);

--
-- Índices de tabela `Loja`
--
ALTER TABLE `Loja`
  ADD PRIMARY KEY (`IdLoja`);

--
-- Índices de tabela `Loja_Disco`
--
ALTER TABLE `Loja_Disco`
  ADD UNIQUE KEY `Relacao` (`IdDisco`,`IdLoja`),
  ADD KEY `IdLoja` (`IdLoja`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `Disco`
--
ALTER TABLE `Disco`
  MODIFY `IdDisco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `Loja`
--
ALTER TABLE `Loja`
  MODIFY `IdLoja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `Loja_Disco`
--
ALTER TABLE `Loja_Disco`
  ADD CONSTRAINT `Loja_Disco_ibfk_1` FOREIGN KEY (`IdLoja`) REFERENCES `Loja` (`IdLoja`),
  ADD CONSTRAINT `Loja_Disco_ibfk_2` FOREIGN KEY (`IdDisco`) REFERENCES `Disco` (`IdDisco`),
  ADD CONSTRAINT `Loja_Disco_ibfk_3` FOREIGN KEY (`IdLoja`) REFERENCES `Loja` (`IdLoja`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Loja_Disco_ibfk_4` FOREIGN KEY (`IdDisco`) REFERENCES `Disco` (`IdDisco`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
