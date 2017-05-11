-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Maio-2017 às 03:34
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

CREATE TABLE `despesas` (
  `idDespesas` int(11) NOT NULL,
  `data` varchar(15) NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `valor` double(10,0) NOT NULL,
  `user_idUser` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `despesas`
--

INSERT INTO `despesas` (`idDespesas`, `data`, `motivo`, `valor`, `user_idUser`, `img`) VALUES
(2, '02/05/2017', 'compra de pó de café', 10, 1, '10.png'),
(3, '01/05/2017', 'Compra de agua', 10, 1, 'null.png'),
(5, '01/05/2017', 'Leite moça', 6, 1, 'fluxograma.png'),
(6, '18/05/2017', 'açucar', 6, 1, '7.png'),
(7, '07/06/2017', 'compra de pó de café', 25, 1, 'null.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gastos`
--

CREATE TABLE `gastos` (
  `idGastos` int(11) NOT NULL,
  `data` varchar(15) NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `valor` double NOT NULL,
  `user_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `hierarquia`
--

CREATE TABLE `hierarquia` (
  `idHierarquia` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `hierarquia`
--

INSERT INTO `hierarquia` (`idHierarquia`, `nome`) VALUES
(1, 'Chefe'),
(2, 'Pesquisador(a)'),
(3, 'Doutorando(a)'),
(4, 'Mestre(a)'),
(5, 'Mestrando(a)'),
(6, 'Graduado(a)'),
(7, 'Graduando(a)'),
(8, 'Voluntário(a)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `idPagamentos` int(11) NOT NULL,
  `mesPagamento` varchar(10) NOT NULL,
  `data` varchar(15) NOT NULL,
  `user_idUser` int(11) NOT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagamentos`
--

INSERT INTO `pagamentos` (`idPagamentos`, `mesPagamento`, `data`, `user_idUser`, `valor`) VALUES
(25, '05/2017', '07/05/2017', 1, 15),
(26, '05/2017', '07/05/2017', 1, 10),
(27, '05/2017', '07/05/2017', 1, 25),
(28, '05/2017', '11/05/2017', 1, 12.31),
(29, '05/2017', '08/05/2017', 2, 11.11),
(30, '05/2017', '01/05/2017', 2, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `hierarquia_idHierarquia` int(11) NOT NULL,
  `inativo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`idUser`, `nome`, `email`, `senha`, `hierarquia_idHierarquia`, `inativo`) VALUES
(1, 'Tiago França Ferreira', 'tiago@email.com', 'c11845c9a05c8df7b137f49504dd918b', 1, 0),
(2, 'Pesquisador', 'pesquisador@email.com', 'b348145a28a236b9e597a480bfc04543', 2, 0),
(3, 'Cyntia Doutoranda', 'doutorando@email.com', 'e6f229df5726ddb0496afd0c31f9a3c8', 3, 0),
(4, 'Carlos Mestre', 'mestre@email.com', '989b731fca676f41b6a48c6ccb0d4801', 4, 0),
(5, 'Jessica Mestranda', 'mestrando@email.com', 'c5561ccc1151d76c46b3cb016086bf16', 5, 1),
(6, 'Robert Graduado', 'graduado@email.com', 'aeeddc0a05ea5acc706311ddc7def089', 6, 0),
(7, 'Raul Graduando', 'graduando@email.com', 'f0bfa54cb288cea8b5c46639ef7895ca', 7, 0),
(8, 'Rodrigo voluntario', 'voluntario@email.com', '6c022afc6b0ba0c4f0478c7f558509f0', 8, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `despesas`
--
ALTER TABLE `despesas`
  ADD PRIMARY KEY (`idDespesas`),
  ADD KEY `fk_gastos_user1_idx` (`user_idUser`);

--
-- Indexes for table `hierarquia`
--
ALTER TABLE `hierarquia`
  ADD PRIMARY KEY (`idHierarquia`);

--
-- Indexes for table `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`idPagamentos`),
  ADD KEY `fk_pagamentos_user_idx` (`user_idUser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`,`hierarquia_idHierarquia`),
  ADD KEY `fk_user_hierarquia1_idx` (`hierarquia_idHierarquia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `despesas`
--
ALTER TABLE `despesas`
  MODIFY `idDespesas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `hierarquia`
--
ALTER TABLE `hierarquia`
  MODIFY `idHierarquia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `idPagamentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `despesas`
--
ALTER TABLE `despesas`
  ADD CONSTRAINT `fk_gastos_user1` FOREIGN KEY (`user_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `fk_pagamentos_user` FOREIGN KEY (`user_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_hierarquia1` FOREIGN KEY (`hierarquia_idHierarquia`) REFERENCES `hierarquia` (`idHierarquia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
