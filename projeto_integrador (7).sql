-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 10-Maio-2023 às 20:42
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
  `id_usuario` int(11) NOT NULL,
  `marca` varchar(80) DEFAULT NULL,
  `descricao` varchar(80) DEFAULT NULL,
  `medida` varchar(30) NOT NULL,
  `quantidade` int(10) NOT NULL,
  PRIMARY KEY (`idProduto`),
  KEY `FK_id_user_estoque` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`idProduto`, `id_usuario`, `marca`, `descricao`, `medida`, `quantidade`) VALUES
(1, 1, 'Razer', 'Mouse DeathAdder V2 Verde', 'Unitário', 5),
(2, 1, 'Dell', 'Notebook Dell Inspiron Preto', 'Unitário', 2),
(3, 1, 'Samsung', 'Celular Galaxy 30 Branco', 'Unitário', 10),
(4, 1, 'Razer', 'Headset Kaira PRO Verde', 'Unitário', 5),
(5, 1, 'Razer', 'Headset Kraken Verde', 'Unitário', 14),
(6, 1, 'Apple', 'Celular Phone 14 Preto', 'Unitário', 5),
(7, 1, 'Xiaomi', 'Relogio MiBand 4 Preto', 'Unitário', 6),
(8, 1, 'Gigalan', 'Cabo de rede CAT6', 'Metros', 60),
(9, 1, 'Razer', 'Mouse DeathAdder V2 Mini Verde', 'Unitário', 6),
(10, 1, 'Apple', 'Airbuds Branco', 'Unitário', 14),
(11, 1, 'Fallen', 'Mouse Kobra Preto/Branco', 'Unitário', 8),
(12, 1, 'Sony', 'Playstation 5 Pro Branco', 'Unitário', 2),
(13, 1, 'HyperX', 'Headset Cloud Stinger Preto', 'Unitário', 7),
(14, 1, 'Husky', 'Monitor 144hz Preto', 'Unitário', 6),
(15, 2, 'Gigalan', 'Cabo de rede CAT5e', 'Metros', 600),
(17, 1, 'HyperX', 'HyperX Cloud II KHX-HSCP Vermelho', 'Unitário', 10);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `itens_nota`
--

INSERT INTO `itens_nota` (`id_item`, `marca_item`, `descricao_item`, `medida`, `quantidade`, `id_nota`) VALUES
(1, 'Samsung', 'Celular Galaxy 30 Branco', 'Unitário', 10, 1),
(2, 'Razer', 'Headset Kraken Verde', 'Unitário', 6, 1),
(3, 'HyperX', 'HyperX Cloud II KHX-HSCP Vermelho', 'Unitário', 10, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacao`
--

DROP TABLE IF EXISTS `movimentacao`;
CREATE TABLE IF NOT EXISTS `movimentacao` (
  `idMovimento` int(11) NOT NULL AUTO_INCREMENT,
  `id_notaFiscal` int(11) NOT NULL,
  `tipoMovimento` varchar(8) NOT NULL,
  `dataMovimento` date DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`idMovimento`),
  KEY `fk_id_usuario` (`id_usuario`),
  KEY `fk_notafiscal_movimentacao` (`id_notaFiscal`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `movimentacao`
--

INSERT INTO `movimentacao` (`idMovimento`, `id_notaFiscal`, `tipoMovimento`, `dataMovimento`, `id_usuario`) VALUES
(5, 1, 'Entrada', '2023-05-10', 1),
(6, 1, 'Saída', '2023-05-10', 1),
(7, 1, 'Saída', '2023-05-10', 1),
(8, 1, 'Saída', '2023-05-10', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notafiscal`
--

DROP TABLE IF EXISTS `notafiscal`;
CREATE TABLE IF NOT EXISTS `notafiscal` (
  `idNota` int(11) NOT NULL AUTO_INCREMENT,
  `numeroNota` varchar(255) NOT NULL,
  `lancada` tinyint(1) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`idNota`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `notafiscal`
--

INSERT INTO `notafiscal` (`idNota`, `numeroNota`, `lancada`, `id_usuario`) VALUES
(1, '001285', 1, 1),
(2, '00328', 1, 1),
(3, '534', 0, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `nome`, `email`, `senha`, `cnpj`) VALUES
(1, 'lucassantos', 'Lucas Santos', 'lucassantos@gmail.com', '$2y$10$LsQVmelMvQuBnNdZV7bJ/e.nkcvx/DHBV4M8q6Y5E31dVxFg/tjSu', 'XX.XX.XXX/0001-XX'),
(2, 'joaosilva', 'Joao Silva', 'joaosilva@gmail.com', '$2y$10$A4tpqS3xSol8b11M8Bi9XORm.waEuLQAEkxKuRA6A7YklGto42m.m', 'XX.XX.XXX/0001-XX'),
(4, 'gustavoramos', 'Gustavo Ramos', 'gustavoramos@gmail.com', '$2y$10$E1Hclb6j6XGhif4228gCJuTcX3pmA489ldoEqxVNG42P5.uxDcYv.', 'XX.XX.XXX/0001-XX');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `FK_id_user_estoque` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `itens_nota`
--
ALTER TABLE `itens_nota`
  ADD CONSTRAINT `itens_nota_ibfk_1` FOREIGN KEY (`id_nota`) REFERENCES `notafiscal` (`idNota`);

--
-- Limitadores para a tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD CONSTRAINT `fk_id_usuario_movimentacao` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `fk_notafiscal_movimentacao` FOREIGN KEY (`id_notaFiscal`) REFERENCES `notafiscal` (`idNota`);

--
-- Limitadores para a tabela `notafiscal`
--
ALTER TABLE `notafiscal`
  ADD CONSTRAINT `notafiscal_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
