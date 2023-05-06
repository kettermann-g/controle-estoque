-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 05-Maio-2023 às 20:19
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
-- Criando Banco de dados: `projeto_integrador`
--
CREATE DATABASE IF NOT EXISTS `projeto_integrador` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projeto_integrador`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `idProduto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `marca` varchar(80) DEFAULT NULL,
  `descricao` varchar(80) DEFAULT NULL,
  `id_medida` int(10) NOT NULL,
  `quantidade` int(10) NOT NULL,
  PRIMARY KEY (`idProduto`),
  KEY `FK_id_medida` (`id_medida`),
  KEY `FK_id_user_estoque` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Inserindo dados na tabela `estoque`
--

INSERT INTO `estoque` (`idProduto`, `id_usuario`, `marca`, `descricao`, `id_medida`, `quantidade`) VALUES
(1, 1, 'Razer', 'Mouse DeathAdder V2 Verde', 1, 5),
(2, 1, 'Dell', 'Notebook Dell Inspiron Preto', 1, 2),
(3, 1, 'Samsung', 'Celular Galaxy 30 Branco', 1, 18),
(4, 1, 'Razer', 'Headset Kaira PRO Verde', 1, 5),
(5, 1, 'Razer', 'Headset Kraken Verde', 1, 6),
(6, 1, 'Apple', 'Celular Phone 14 Preto', 1, 5),
(7, 1, 'Xiaomi', 'Relogio MiBand 4 Preto', 1, 6),
(8, 1, 'Gigalan', 'Cabo de rede CAT6', 2, 60),
(9, 1, 'Razer', 'Mouse DeathAdder V2 Mini Verde', 1, 6),
(10, 1, 'Apple', 'Airbuds Branco', 1, 14),
(11, 1, 'Fallen', 'Mouse Kobra Preto/Branco', 1, 8),
(12, 1, 'Sony', 'Playstation 5 Pro Branco', 1, 2),
(13, 1, 'HyperX', 'Headset Cloud Stinger Preto', 1, 7),
(14, 1, 'Husky', 'Monitor 144hz Preto', 1, 6),
(15, 2, 'Gigalan', 'Cabo de rede CAT5e', 2, 600);

-- --------------------------------------------------------

--
-- Estrutura da tabela `medidas`
--

DROP TABLE IF EXISTS `medidas`;
CREATE TABLE IF NOT EXISTS `medidas` (
  `id_medida` int(11) NOT NULL AUTO_INCREMENT,
  `nome_extenso` varchar(100) NOT NULL,
  `abreviatura` varchar(10) NOT NULL,
  PRIMARY KEY (`id_medida`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Inserindo dados na tabela `medidas`
--

INSERT INTO `medidas` (`id_medida`, `nome_extenso`, `abreviatura`) VALUES
(1, 'Unitário', 'un'),
(2, 'Metros', 'mt');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacao`
--

DROP TABLE IF EXISTS `movimentacao`;
CREATE TABLE IF NOT EXISTS `movimentacao` (
  `idMovimento` int(11) NOT NULL,
  `estoque_idProduto` int(11) NOT NULL,
  `tipoMovimento` varchar(8) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `dataMovimento` date DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`idMovimento`),
  KEY `fk_Compra_Estoque_idx` (`estoque_idProduto`),
  KEY `fk_id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Inserindo dados na tabela `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `nome`, `email`, `senha`, `cnpj`) VALUES
(1, 'lucassantos', 'Lucas Santos', 'lucassantos@gmail.com', '$2y$10$LsQVmelMvQuBnNdZV7bJ/e.nkcvx/DHBV4M8q6Y5E31dVxFg/tjSu', 'XX.XX.XXX/0001-XX'),
(2, 'joaosilva', 'Joao Silva', 'joaosilva@gmail.com', '$2y$10$A4tpqS3xSol8b11M8Bi9XORm.waEuLQAEkxKuRA6A7YklGto42m.m', 'XX.XX.XXX/0001-XX'),
(4, 'gustavoramos', 'Gustavo Ramos', 'gustavoramos@gmail.com', '$2y$10$E1Hclb6j6XGhif4228gCJuTcX3pmA489ldoEqxVNG42P5.uxDcYv.', 'XX.XX.XXX/0001-XX');

-- --------------------------------------------------------
--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `FK_id_medida` FOREIGN KEY (`id_medida`) REFERENCES `medidas` (`id_medida`),
  ADD CONSTRAINT `FK_id_user_estoque` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
