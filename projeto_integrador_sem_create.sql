-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:1360
-- Tempo de geração: 25-Maio-2023 às 00:17
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `idProduto` int(11) UNSIGNED NOT NULL,
  `marca` varchar(80) DEFAULT NULL,
  `descricao` varchar(80) DEFAULT NULL,
  `medida` varchar(30) NOT NULL,
  `quantidade` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`idProduto`, `marca`, `descricao`, `medida`, `quantidade`) VALUES
(1, 'Razer', 'Mouse DeathAdder V2 Verde', 'Unitário', 5),
(2, 'Dell', 'Notebook Dell Inspiron Preto', 'Unitário', 2),
(3, 'Samsung', 'Celular Galaxy 30 Branco', 'Unitário', 50),
(4, 'Razer', 'Headset Kaira PRO Verde', 'Unitário', 5),
(5, 'Razer', 'Headset Kraken Verde', 'Unitário', 38),
(6, 'Apple', 'Celular Phone 14 Preto', 'Unitário', 5),
(7, 'Xiaomi', 'Relogio MiBand 4 Preto', 'Unitário', 6),
(8, 'Gigalan', 'Cabo de rede CAT6', 'Metros', 60),
(9, 'Razer', 'Mouse DeathAdder V2 Mini Verde', 'Unitário', 6),
(10, 'Apple', 'Airbuds Branco', 'Unitário', 14),
(11, 'Fallen', 'Mouse Kobra Preto/Branco', 'Unitário', 8),
(12, 'Sony', 'Playstation 5 Pro Branco', 'Unitário', 2),
(13, 'HyperX', 'Headset Cloud Stinger Preto', 'Unitário', 7),
(14, 'Husky', 'Monitor 144hz Preto', 'Unitário', 6),
(15, 'Gigalan', 'Cabo de rede CAT5e', 'Metros', 600),
(17, 'HyperX', 'HyperX Cloud II KHX-HSCP Vermelho', 'Unitário', 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_nota`
--

CREATE TABLE `itens_nota` (
  `id_item` int(11) NOT NULL,
  `marca_item` varchar(255) NOT NULL,
  `descricao_item` varchar(255) NOT NULL,
  `medida` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `id_nota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `movimentacao` (
  `idMovimento` int(11) NOT NULL,
  `marca_item_mov` varchar(255) NOT NULL,
  `descricao_item_mov` varchar(255) NOT NULL,
  `quantidade_mov` int(11) NOT NULL,
  `medida_mov` varchar(50) NOT NULL,
  `origem_destino` varchar(255) NOT NULL,
  `id_notaFiscal` int(11) NOT NULL,
  `tipoMovimento` tinyint(1) NOT NULL,
  `dataMovimento` datetime DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notafiscal`
--

CREATE TABLE `notafiscal` (
  `idNota` int(11) NOT NULL,
  `tipoMov` tinyint(1) NOT NULL,
  `numeroNota` varchar(255) NOT NULL,
  `lancada` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `notafiscal`
--

INSERT INTO `notafiscal` (`idNota`, `tipoMov`, `numeroNota`, `lancada`) VALUES
(1, 1, '001285', 1),
(2, 1, '00328', 0),
(3, 0, '534', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `cnpj` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `nome`, `email`, `senha`, `cnpj`) VALUES
(1, 'lucassantos', 'Lucas Santos', 'lucassantos@gmail.com', '$2y$10$LsQVmelMvQuBnNdZV7bJ/e.nkcvx/DHBV4M8q6Y5E31dVxFg/tjSu', 'XX.XX.XXX/0001-XX'),
(2, 'joaosilva', 'Joao Silva', 'joaosilva@gmail.com', '$2y$10$A4tpqS3xSol8b11M8Bi9XORm.waEuLQAEkxKuRA6A7YklGto42m.m', 'XX.XX.XXX/0001-XX'),
(4, 'gustavoramos', 'Gustavo Ramos', 'gustavoramos@gmail.com', '$2y$10$E1Hclb6j6XGhif4228gCJuTcX3pmA489ldoEqxVNG42P5.uxDcYv.', 'XX.XX.XXX/0001-XX');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`idProduto`);

--
-- Índices para tabela `itens_nota`
--
ALTER TABLE `itens_nota`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_nota` (`id_nota`);

--
-- Índices para tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD PRIMARY KEY (`idMovimento`),
  ADD KEY `fk_notadfiscal_mov` (`id_notaFiscal`),
  ADD KEY `fk_id_usuario_mov` (`id_usuario`);

--
-- Índices para tabela `notafiscal`
--
ALTER TABLE `notafiscal`
  ADD PRIMARY KEY (`idNota`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `idProduto` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `itens_nota`
--
ALTER TABLE `itens_nota`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `idMovimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `notafiscal`
--
ALTER TABLE `notafiscal`
  MODIFY `idNota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
