-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Abr-2022 às 17:07
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `Nome` varchar(100) NOT NULL,
  `Cidade` varchar(100) NOT NULL,
  `DataNascimento` date NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Senha` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`Nome`, `Cidade`, `DataNascimento`, `Email`, `Senha`) VALUES
('Daniele Fiori', 'Rio Grande', '0000-00-00', 'aa@aa.com', ''),
('Aaaaa AAA', 'Rio Grande', '0000-00-00', 'aaa@aa.com', ''),
('Admin', 'Rio Grande', '2002-07-07', 'admin@admin.com', 'admin'),
('Alessandro Fernandes', 'Rio Grande', '0000-00-00', 'alessandrofernandess125@gmail.com', ''),
('Marina Fernandes', 'Rio Grande', '2002-07-07', 'marinafernandess103@gmail.com', NULL),
('teste', 'Rio Grande', '0000-00-00', 'teste@teste.com', ''),
('Teste Tester', 'Pelotas', '0000-00-00', 'testesilva@teste.com', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes-produtos`
--

CREATE TABLE `clientes-produtos` (
  `email` varchar(100) NOT NULL,
  `idproduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes-produtos`
--

INSERT INTO `clientes-produtos` (`email`, `idproduto`) VALUES
('aa@aa.com', 1),
('marinafernandess103@gmail.com', 1),
('marinafernandess103@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` int(11) NOT NULL,
  `console` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `tipo`, `categoria`, `quantidade`, `preco`, `console`) VALUES
(1, 'Geladeira', 'Cozinha', '', 14, 15, NULL),
(2, 'Batedeira', 'Cozinha', '', 0, 20, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos-categorias`
--

CREATE TABLE `produtos-categorias` (
  `idproduto` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Email`);

--
-- Índices para tabela `clientes-produtos`
--
ALTER TABLE `clientes-produtos`
  ADD PRIMARY KEY (`email`,`idproduto`),
  ADD KEY `idproduto` (`idproduto`),
  ADD KEY `email` (`email`,`idproduto`),
  ADD KEY `email_2` (`email`,`idproduto`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos-categorias`
--
ALTER TABLE `produtos-categorias`
  ADD PRIMARY KEY (`idproduto`,`idcategoria`),
  ADD KEY `teste1` (`idcategoria`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `clientes-produtos`
--
ALTER TABLE `clientes-produtos`
  ADD CONSTRAINT `1` FOREIGN KEY (`email`) REFERENCES `clientes` (`Email`),
  ADD CONSTRAINT `2` FOREIGN KEY (`idproduto`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `produtos-categorias`
--
ALTER TABLE `produtos-categorias`
  ADD CONSTRAINT `teste1` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `teste2` FOREIGN KEY (`idproduto`) REFERENCES `produtos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
