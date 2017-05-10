-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Maio-2017 às 04:59
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
(1, 'Chefe(a)'),
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
(1, '05/2017', '01/05/2017', 1, 10),
(2, '05/2017', '01/05/2017', 1, 11.11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `hierarquia_idHierarquia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`idUser`, `nome`, `email`, `senha`, `hierarquia_idHierarquia`) VALUES
(1, 'Tiago França Ferreira', 'tiago@email.com', 'c11845c9a05c8df7b137f49504dd918b', 1),
(2, 'João Pesquisador', 'pesquisador@email.com', 'b348145a28a236b9e597a480bfc04543', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`idGastos`),
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
-- AUTO_INCREMENT for table `gastos`
--
ALTER TABLE `gastos`
  MODIFY `idGastos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hierarquia`
--
ALTER TABLE `hierarquia`
  MODIFY `idHierarquia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `idPagamentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `gastos`
--
ALTER TABLE `gastos`
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
