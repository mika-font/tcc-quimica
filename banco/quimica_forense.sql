-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Set-2023 às 23:22
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
(7, 'Assassinato', 'Uruguaiana', '2023-09-11', 'A noite das bruxas'),
(8, 'Teste de Caso', 'Emirados Árabes', '2023-09-26', 'Tentativa do layout');

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
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14);

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
(9, 7, 'uploads/64ff6182740c4.png'),
(10, 7, 'uploads/64ff61828052f.png'),
(11, 7, 'uploads/64ff618289b1a.png'),
(12, 7, 'uploads/64ff61828ff14.png'),
(13, 8, 'uploads/650643fdba374.png');

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
(5, 'Qual é a personagem famosa por desvendar crimes criada pela Agatha Christie?\r\n', '', 'alt3', 'Poirot', 'Miss Marple', 'Edward', 'Ferdinanda'),
(6, 'Uma nova questão sobre a vida', '', 'alt4', 'Real', 'Ireal', 'Mundano', 'Imaginário'),
(7, 'Teste 2', '', 'alt4', 'Fulano', 'Ciclano', 'Beltrano', 'Dorito'),
(8, 'Teste 3', 'uploads/64ff630b8d15c.png', 'alt4', 'Fulano', 'Ciclano', 'Beltrano', 'Ameno'),
(9, 'Teste 4', '', 'alt2', 'Fulano', 'Ciclano', 'Beltrano', 'Dorito'),
(10, 'Teste 6', '', 'alt1', 'Fulano', 'Ciclano', 'Beltrano', 'Dorito'),
(11, 'Teste 7', '', 'alt1', 'Fulano', 'Ciclano', 'Beltrano', 'Dorito'),
(12, 'Vivemos em uma simulação?', '', 'alt1', 'Fulano', 'Ciclano', 'Beltrano', 'Dorito'),
(13, 'Vamos ver se dá certo', 'uploads/64ff639bad860.ico', 'alt3', 'Fulano', 'Ciclano', 'Beltrano', 'Dorito'),
(14, 'Estamos vivos?', '', 'alt2', 'Fulano', 'Ciclano', 'Beltrano', 'Dorito');

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
(1, '2023-09-11', '2023-09-12', 'Vai dar certo', 'Assassinato');

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
(1, 'Colecionador de Ossos', 'A revolta de Kian', 'uploads/64ea69ab438a8.pdf', 'uploads/64ea69ab43a8b.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `responde`
--

CREATE TABLE `responde` (
  `id_usuario` int(11) NOT NULL,
  `id_questionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Mikael', 'mikaelfontoura29@gmail.com', '12345', 1),
(2, 'Samuel', 'samuel@gmail.com', '12345', 0);

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
  MODIFY `id_caso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `questao`
--
ALTER TABLE `questao`
  MODIFY `id_questao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `questionario`
--
ALTER TABLE `questionario`
  MODIFY `id_questionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `recomendacao`
--
ALTER TABLE `recomendacao`
  MODIFY `id_recom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
