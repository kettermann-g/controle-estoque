-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18-Maio-2023 às 01:51
-- Versão do servidor: 5.7.40
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_integrador`
--
CREATE DATABASE IF NOT EXISTS `projeto_integrador` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projeto_integrador`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `idProduto` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `marca` varchar(80) DEFAULT NULL,
  `descricao` varchar(80) DEFAULT NULL,
  `medida` varchar(30) NOT NULL,
  `quantidade` int(10) NOT NULL,
  PRIMARY KEY (`idProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`idProduto`, `marca`, `descricao`, `medida`, `quantidade`) VALUES
(1, 'Razer', 'Mouse DeathAdder V2 Verde', 'Unitário', 5),
(2, 'Dell', 'Notebook Dell Inspiron Preto', 'Unitário', 2),
(3, 'Samsung', 'Celular Galaxy 30 Branco', 'Unitário', 60),
(4, 'Razer', 'Headset Kaira PRO Verde', 'Unitário', 5),
(5, 'Razer', 'Headset Kraken Verde', 'Unitário', 32),
(6, 'Apple', 'Celular iPhone 14 Preto', 'Unitário', 2),
(7, 'Xiaomi', 'Relogio MiBand 4 Preto', 'Unitário', 6),
(8, 'Gigalan', 'Cabo de rede CAT6', 'Metros', 60),
(9, 'Razer', 'Mouse DeathAdder V2 Mini Verde', 'Unitário', 6),
(10, 'Apple', 'Airbuds Branco', 'Unitário', 14),
(11, 'Fallen', 'Mouse Kobra Preto/Branco', 'Unitário', 8),
(12, 'Sony', 'Playstation 5 Pro Branco', 'Unitário', 2),
(13, 'HyperX', 'Headset Cloud Stinger Preto', 'Unitário', 7),
(14, 'Husky', 'Monitor 144hz Preto', 'Unitário', 6),
(15, 'Gigalan', 'Cabo de rede CAT5e', 'Metros', 600),
(17, 'HyperX', 'HyperX Cloud II KHX-HSCP Vermelho', 'Unitário', 60);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_nota`
--

DROP TABLE IF EXISTS `itens_nota`;
CREATE TABLE IF NOT EXISTS `itens_nota` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `marca_item` varchar(255) NOT NULL,
  `descricao_item` varchar(255) NOT NULL,
  `medida` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `id_nota` int(11) NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `id_nota` (`id_nota`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `itens_nota`
--

INSERT INTO `itens_nota` (`id_item`, `marca_item`, `descricao_item`, `medida`, `quantidade`, `id_nota`) VALUES
(1, 'Samsung', 'Celular Galaxy 30 Branco', 'Unitário', 10, 1),
(2, 'Razer', 'Headset Kraken Verde', 'Unitário', 6, 1),
(3, 'HyperX', 'HyperX Cloud II KHX-HSCP Vermelho', 'Unitário', 10, 1),
(4, 'Apple', 'Celular iPhone 14 Preto', 'Unitário', 3, 3),
(5, 'Razer', 'Headset Kraken Verde', 'Unitário', 12, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacao`
--

DROP TABLE IF EXISTS `movimentacao`;
CREATE TABLE IF NOT EXISTS `movimentacao` (
  `idMovimento` int(11) NOT NULL AUTO_INCREMENT,
  `marca_item_mov` varchar(255) NOT NULL,
  `descricao_item_mov` varchar(255) NOT NULL,
  `quantidade_mov` int(11) NOT NULL,
  `medida_mov` varchar(50) NOT NULL,
  `origem_destino` varchar(255) NOT NULL,
  `id_notaFiscal` int(11) NOT NULL,
  `tipoMovimento` tinyint(1) NOT NULL,
  `dataMovimento` datetime DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`idMovimento`),
  KEY `fk_notadfiscal_mov` (`id_notaFiscal`),
  KEY `fk_id_usuario_mov` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `movimentacao`
--

INSERT INTO `movimentacao` (`idMovimento`, `marca_item_mov`, `descricao_item_mov`, `quantidade_mov`, `medida_mov`, `origem_destino`, `id_notaFiscal`, `tipoMovimento`, `dataMovimento`, `id_usuario`) VALUES
(27, 'Apple', 'Celular iPhone 14 Preto', 3, 'Unitário', 'Venda', 3, 0, '2023-05-17 22:26:07', 1),
(28, 'Razer', 'Headset Kraken Verde', 12, 'Unitário', 'Venda', 3, 0, '2023-05-17 22:26:07', 1),
(29, 'Samsung', 'Celular Galaxy 30 Branco', 10, 'Unitário', 'Compra', 1, 1, '2023-05-17 22:27:40', 5),
(30, 'Razer', 'Headset Kraken Verde', 6, 'Unitário', 'Compra', 1, 1, '2023-05-17 22:27:40', 5),
(31, 'HyperX', 'Cloud II KHX-HSCP Vermelho', 10, 'Unitário', 'Compra', 1, 1, '2023-05-17 22:27:40', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notafiscal`
--

DROP TABLE IF EXISTS `notafiscal`;
CREATE TABLE IF NOT EXISTS `notafiscal` (
  `idNota` int(11) NOT NULL AUTO_INCREMENT,
  `tipoMov` tinyint(1) NOT NULL,
  `numeroNota` varchar(255) NOT NULL,
  `lancada` tinyint(1) NOT NULL,
  PRIMARY KEY (`idNota`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `notafiscal`
--

INSERT INTO `notafiscal` (`idNota`, `tipoMov`, `numeroNota`, `lancada`) VALUES
(1, 1, '001285', 1),
(2, 1, '00328', 0),
(3, 0, '534', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `nome`, `email`, `senha`, `cnpj`) VALUES
(1, 'lucassantos', 'Lucas Santos', 'lucassantos@gmail.com', '$2y$10$LsQVmelMvQuBnNdZV7bJ/e.nkcvx/DHBV4M8q6Y5E31dVxFg/tjSu', 'XX.XX.XXX/0001-XX'),
(2, 'joaosilva', 'Joao Silva', 'joaosilva@gmail.com', '$2y$10$A4tpqS3xSol8b11M8Bi9XORm.waEuLQAEkxKuRA6A7YklGto42m.m', 'XX.XX.XXX/0001-XX'),
(4, 'gustavoramos', 'Gustavo Ramos', 'gustavoramos@gmail.com', '$2y$10$E1Hclb6j6XGhif4228gCJuTcX3pmA489ldoEqxVNG42P5.uxDcYv.', 'XX.XX.XXX/0001-XX'),
(5, 'pedrocardoso', 'Pedro Cardoso', 'pedrocardoso@gmail.com', '$2y$10$UZqf8CiX.tTW3w2aB6BGsuf.iWoHpaRI7.vgpXXmgh8VzDl09daue', 'XXXXXXXXXX');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `itens_nota`
--
ALTER TABLE `itens_nota`
  ADD CONSTRAINT `itens_nota_ibfk_1` FOREIGN KEY (`id_nota`) REFERENCES `notafiscal` (`idNota`);

--
-- Limitadores para a tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD CONSTRAINT `fk_id_usuario_mov` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `fk_notadfiscal_mov` FOREIGN KEY (`id_notaFiscal`) REFERENCES `notafiscal` (`idNota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
