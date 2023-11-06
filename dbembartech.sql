-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 06-Nov-2023 às 02:34
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbembartech`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbaula`
--

DROP TABLE IF EXISTS `tbaula`;
CREATE TABLE IF NOT EXISTS `tbaula` (
  `idAula` int NOT NULL AUTO_INCREMENT,
  `idCurso` int DEFAULT NULL,
  `nomeAula` varchar(40) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idAula`),
  KEY `idCurso` (`idCurso`)
);

--
-- Extraindo dados da tabela `tbaula`
--

INSERT INTO `tbaula` (`idAula`, `idCurso`, `nomeAula`, `descricao`) VALUES
(1, 1, 'Lógica de Programação', 'Aqui, você aprenderá a lógica necessária para começar a programar'),
(2, 1, 'HTML e CSS', 'O básico para o desenvolvimento web e estilização'),
(3, 0, '', ''),
(4, 0, '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcurso`
--

DROP TABLE IF EXISTS `tbcurso`;
CREATE TABLE IF NOT EXISTS `tbcurso` (
  `idCurso` int NOT NULL AUTO_INCREMENT,
  `idUser` int DEFAULT NULL,
  `nomeCurso` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idCurso`),
  KEY `idUser` (`idUser`)
);

--
-- Extraindo dados da tabela `tbcurso`
--

INSERT INTO `tbcurso` (`idCurso`, `idUser`, `nomeCurso`) VALUES
(1, NULL, 'Introdução à programação'),
(2, NULL, 'Linguagens de programação'),
(3, NULL, 'Bibliotecas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmaterial`
--

DROP TABLE IF EXISTS `tbmaterial`;
CREATE TABLE IF NOT EXISTS `tbmaterial` (
  `idMat` int NOT NULL AUTO_INCREMENT,
  `idCurso` int DEFAULT NULL,
  `nomeMat` varchar(25) DEFAULT NULL,
  `descricaoMat` varchar(100) DEFAULT NULL,
  `PDF` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idMat`),
  KEY `idCurso` (`idCurso`)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbperm`
--

DROP TABLE IF EXISTS `tbperm`;
CREATE TABLE IF NOT EXISTS `tbperm` (
  `idperm` int NOT NULL AUTO_INCREMENT,
  `perm` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idperm`)
);

--
-- Extraindo dados da tabela `tbperm`
--

INSERT INTO `tbperm` (`idperm`, `perm`) VALUES
(1, 'Usuário'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbuser`
--

DROP TABLE IF EXISTS `tbuser`;
CREATE TABLE IF NOT EXISTS `tbuser` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `idperm` int DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  FOREIGN KEY (idperm) REFERENCES tbperm(idperm)
);

--
-- Extraindo dados da tabela `tbuser`
--

INSERT INTO `tbuser` (`idUser`, `email`, `username`, `senha`, `idperm`) VALUES
(1, 'teste@teste.com', 'Teste', '2e6f9b0d5885b6010f9167787445617f553a735f', 1),
(2, 'adm@adm.com', 'Administrador', '42ef63e7836ef622d9185c1a456051edf16095cc', 2),
(3, 'teste@teste2.com', 'Teste2', '96a62ca98bdec7f55343f8cfa594379bdba76cc9', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
