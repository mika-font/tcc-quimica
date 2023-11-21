-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Nov-2023 às 02:39
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `quimica_forense`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `caso`
--

CREATE TABLE `caso` (
  `id_caso` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `local` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `caso`
--

INSERT INTO `caso` (`id_caso`, `titulo`, `local`, `data`, `descricao`) VALUES
(1, 'Fogo no parquinho', 'Uruguaiana', '2023-08-17', 'Se tudo der certo, deu certo...'),
(2, 'Fogo no parquinho', 'Uruguaiana', '2023-08-17', 'Se tudo der certo, deu certo...'),
(3, 'Fogo no parquinho', 'Uruguaiana', '2023-08-17', 'Se tudo der certo, deu certo...'),
(5, 'Chuva Ácida: Um Perigo', 'Uruguaiana', '2023-08-20', 'xyz'),
(6, 'A revolta de um estudante', 'Uruguaiana', '2023-08-23', 'Um estudante entra em colapso mental e acaba se revoltando!'),
(8, 'Teste de Caso', 'Emirados Árabes', '2023-09-26', 'Tentativa do layout'),
(9, 'ET de Varginha', 'Varginha - Brasil', '2023-10-20', 'Busquem conhecimento.'),
(11, 'RELAÇÕES MÉTRICAS DO TRIÂNGULO RETÂNGULO', 'Varginha - Brasil', '2023-11-30', 'Sei lá, teste do escape string'),
(12, 'Chuva Ácida: Um Perigo', 'Emirados Árabes', '2023-11-17', 'Apresentação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contem`
--

CREATE TABLE `contem` (
  `id_questionario` int(11) NOT NULL,
  `id_questao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contem`
--

INSERT INTO `contem` (`id_questionario`, `id_questao`) VALUES
(4, 5),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(4, 14),
(4, 16),
(3, 16),
(3, 5),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `id_imagem` int(11) NOT NULL,
  `id_caso` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`id_imagem`, `id_caso`, `url`) VALUES
(6, 5, 'uploads/64e25738b09d9.png'),
(7, 5, 'uploads/64e25738b9591.png'),
(8, 6, 'uploads/64e54f09ca98c.jpg'),
(13, 8, 'uploads/650643fdba374.png'),
(14, 9, 'uploads/6529e2bdd9d4e.jpg'),
(17, 11, 'uploads/6553ff1b63b3e.png'),
(18, 12, 'uploads/65566e3952d23.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questao`
--

CREATE TABLE `questao` (
  `id_questao` int(11) NOT NULL,
  `enunciado` text NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `alt_correta` varchar(255) NOT NULL,
  `alt_1` varchar(255) NOT NULL,
  `alt_2` varchar(255) NOT NULL,
  `alt_3` varchar(255) NOT NULL,
  `alt_4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `questao`
--

INSERT INTO `questao` (`id_questao`, `enunciado`, `imagem`, `alt_correta`, `alt_1`, `alt_2`, `alt_3`, `alt_4`) VALUES
(5, 'Qual é a personagem famosa por desvendar crimes criada pela Agatha Christie?\r\n', '', 'C', 'Poirot', 'Miss Marple', 'Edward', 'Ferdinanda'),
(7, 'Teste 2', '', 'D', 'Fulano', 'Ciclano', 'Beltrano', 'Dorito'),
(8, 'Teste 3', 'uploads/64ff630b8d15c.png', 'D', 'Fulano', 'Ciclano', 'Beltrano', 'Ameno'),
(9, 'Teste 4', '', 'B', 'Fulano', 'Ciclano', 'Beltrano', 'Dorito'),
(10, 'Teste 6', '', 'A', 'Fulano', 'Ciclano', 'Beltrano', 'Dorito'),
(11, 'Teste 7', '', 'B', 'Fulano', 'Ciclano', 'Beltrano', 'Dorito'),
(12, 'Vivemos em uma simulação?', '', 'A', 'Fulano', 'Ciclano', 'Beltrano', 'Dorito'),
(13, 'Vamos ver se dá certo', 'uploads/64ff639bad860.ico', 'C', 'Fulano', 'Ciclano', 'Beltrano', 'Dorito'),
(14, 'Estamos vivos?', '', 'B', 'Fulano', 'Ciclano', 'Beltrano', 'Dorito'),
(16, 'Teste 2', '', 'A', 'Poirot', 'Miss Marple', 'Uno', 'Ferdinanda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionario`
--

CREATE TABLE `questionario` (
  `id_questionario` int(11) NOT NULL,
  `date_inic` date NOT NULL,
  `date_fin` date NOT NULL,
  `assunto` varchar(255) NOT NULL,
  `titulo_quest` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `questionario`
--

INSERT INTO `questionario` (`id_questionario`, `date_inic`, `date_fin`, `assunto`, `titulo_quest`) VALUES
(3, '2023-11-08', '2023-11-29', 'Teste 2', 'Teste 2'),
(4, '2023-11-23', '2023-11-30', 'Teste', 'Fogo no parquinho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recomendacao`
--

CREATE TABLE `recomendacao` (
  `id_recom` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `sinopse` text NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `arquivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `recomendacao`
--

INSERT INTO `recomendacao` (`id_recom`, `titulo`, `sinopse`, `imagem`, `arquivo`) VALUES
(1, 'Colecionador de Ossos', 'A revolta de Kian', 'uploads/64ea69ab43a8b.jpg', 'uploads/64ea69ab438a8.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `responde`
--

CREATE TABLE `responde` (
  `id_usuario` int(11) NOT NULL,
  `id_questionario` int(11) NOT NULL,
  `quant_acertos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `responde`
--

INSERT INTO `responde` (`id_usuario`, `id_questionario`, `quant_acertos`) VALUES
(5, 3, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `tipo`) VALUES
(1, 'Mikael', 'mikaelfontoura29@gmail.com', '$2y$10$K7ZkM9D.GJiNJo0f2DAtguHDHhut5nJeyBB85ieKWc.kZoBhPVUue', 1),
(2, 'Samuel', 'samuel@gmail.com', '$2y$10$.3sbftX8b/WR28CZOahqoeaNTG8xE0lgjbNG3irJZOHRgsZBYpwGm', 0),
(3, 'Pedro do Pampa', 'pedro@gmail.com', '$2y$10$oyM3pjd9k/oHpECIEdQp7.EOpPl8SrutDvw7qzeMAOCJH4KOYz4ri', 0),
(4, 'Lavínia', 'lavinia@gmail.com', '12345', 0),
(5, 'Mikael Fontoura', 'mika@gmail.com', '$2y$10$vvVeYzA9clS/v.bIUGFbMeHFKyCr3IwOMMcpUIGWraTHes1DI9MZe', 0),
(6, 'Admin', 'admin@gmail.com', '$2y$10$wNRFelFQiQ.WTOIx369Ni.gVXtPFXkLW6nkoE2jTRv0acccfPeeKu', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `caso`
--
ALTER TABLE `caso`
  ADD PRIMARY KEY (`id_caso`);

--
-- Índices para tabela `contem`
--
ALTER TABLE `contem`
  ADD KEY `id_questionario` (`id_questionario`),
  ADD KEY `id_questao` (`id_questao`);

--
-- Índices para tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`id_imagem`),
  ADD KEY `id_caso` (`id_caso`);

--
-- Índices para tabela `questao`
--
ALTER TABLE `questao`
  ADD PRIMARY KEY (`id_questao`);

--
-- Índices para tabela `questionario`
--
ALTER TABLE `questionario`
  ADD PRIMARY KEY (`id_questionario`);

--
-- Índices para tabela `recomendacao`
--
ALTER TABLE `recomendacao`
  ADD PRIMARY KEY (`id_recom`);

--
-- Índices para tabela `responde`
--
ALTER TABLE `responde`
  ADD KEY `id_questionario` (`id_questionario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `caso`
--
ALTER TABLE `caso`
  MODIFY `id_caso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `questao`
--
ALTER TABLE `questao`
  MODIFY `id_questao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `questionario`
--
ALTER TABLE `questionario`
  MODIFY `id_questionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `recomendacao`
--
ALTER TABLE `recomendacao`
  MODIFY `id_recom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `contem`
--
ALTER TABLE `contem`
  ADD CONSTRAINT `contem_ibfk_1` FOREIGN KEY (`id_questionario`) REFERENCES `questionario` (`id_questionario`) ON DELETE CASCADE,
  ADD CONSTRAINT `contem_ibfk_2` FOREIGN KEY (`id_questao`) REFERENCES `questao` (`id_questao`);

--
-- Limitadores para a tabela `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `imagem_ibfk_1` FOREIGN KEY (`id_caso`) REFERENCES `caso` (`id_caso`);

--
-- Limitadores para a tabela `responde`
--
ALTER TABLE `responde`
  ADD CONSTRAINT `responde_ibfk_1` FOREIGN KEY (`id_questionario`) REFERENCES `questionario` (`id_questionario`),
  ADD CONSTRAINT `responde_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
