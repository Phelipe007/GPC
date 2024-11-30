CREATE DATABASE IF NOT EXISTS gpc;
USE gpc;

CREATE TABLE `Usuario` (
  `id_usuario` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nome` varchar(250) DEFAULT NULL,
  `telefone` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `iFMT` varchar(50) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL
);