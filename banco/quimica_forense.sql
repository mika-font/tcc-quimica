-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Dez-2023 às 02:49
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
(13, 'Gregory Villemin - Caso Não Resolvido', 'Lépanges-sur-Vologne, Vorges, França', '1984-10-16', 'Gregory Villemin nasceu em 24 de agosto de 1980, na pacata comunidade de Lépanges-sur-Vologne, localizada em Vorges, no nordeste da França. Filho amoroso de Jean-Marie Villemin e Christine Villemin, Gregory era uma criança notável, dotada de inteligência, e recebia todo o carinho de seus pais.\r\nJean-Marie fazia parte de uma extensa e trabalhadora família, destacando-se entre os parentes por sua posição em uma fábrica local e pela felicidade que desfrutava em sua vida familiar. Entretanto, essa prosperidade causava inveja em algumas pessoas ao seu redor.\r\nA partir de 1981, a vida dos Villemin tomou um rumo sombrio. Uma série de ligações anônimas começou a assombrar diversos membros da família de Jean, proferindo ameaças perturbadoras. O autor dessas ameaças ficou conhecido como \'O Corvo\', uma referência a um filme popular da época. Esse indivíduo possuía conhecimentos e segredos sobre os familiares, ameaçando revelar tais informações e semeando discórdia.\r\nO Corvo, com um foco secundário em Jean, apelidando-o de \'chefinho\', passou a atormentar a integridade da família, enviando cartas e provocando Jean. O ponto fraco de Jean tornou-se evidente quando o Corvo mencionou Gregory em uma ligação, insinuando um sequestro caso o menino estivesse sozinho.\r\nDe 1981 a 1983, as ameaças do Corvo se concentraram em Gregory. Contudo, em uma carta datada de 4 de março de 1983, o Corvo surpreendeu a família ao anunciar sua decisão de encerrar as ameaças. Na carta, ele prometia matar a família Villemin se não colaborassem, mas, ao final, despediu-se, afirmando que eles nunca descobririam sua verdadeira identidade. \r\nNo entanto, em 16 de outubro de 1984, quando a família começou a acreditar que as ameaças do Corvo haviam cessado, um evento inesperado ocorreu. Christine, mãe de Gregory, saiu do trabalho por volta das 16h, pegou o filho na casa da babá e retornou para casa. Ao chegar, Christine permitiu que Gregory brincasse numa pilha de cascalhos na frente da casa antes de entrar. Após algum tempo, Christine voltou para agasalhar o filho, o deixou brincando lá fora e retornou à casa para ouvir música e passar roupa. Contudo, após alguns minutos, Gregory não estava mais na frente da casa.\r\nCerca de uma hora após o desaparecimento, 15 policiais já estavam envolvidos na investigação, coletando informações relevantes. Nesse ínterim, Michel Villemin, irmão de Jean, recebeu uma ligação, com a mesma entonação rouca do Corvo, alegando ter assassinado Gregory e jogado seu corpo no rio Vologne.\r\nEntão, às 19h, o corpo do menino foi encontrado no rio, há 4 km de distância de sua residência. Gregory estava vestindo uma jaqueta azul clara e uma touca que cobria completamente seu rosto; uma corda amarrava seus tornozelos, pulsos e passava ao redor de seu pescoço.\r\nEm 17 de outubro, o resultado da autópsia revelou que Gregory foi jogado vivo no rio e morreu por afogamento. Uma carta, desejando que a dor de Jean pela perda do filho o consumisse, acompanhava essa terrível revelação, enfatizando que dinheiro algum traria o menino de volta.\r\nEm 18 de outubro, as notícias do caso começaram a se espalhar, e o jornalista Jean Kerr, do Paris Match, iniciou sua própria investigação na vila. Fotografou a casa de Gregory, o local do crime e outros pontos relevantes para a elaboração de uma reportagem detalhada.\r\nDurante a investigação, os policiais seguiram uma abordagem semelhante à apresentada no filme que inspirou o próprio Corvo. Reuniram os familiares de Gregory como suspeitos, solicitando que escrevessem cartas para comparar a caligrafia com a do Corvo, um processo demorado e meticuloso.\r\nA polícia inicialmente suspeitava de um familiar como o possível autor do crime e continuou a procurar evidências. No entanto, as pessoas ao redor da cena do crime alegavam não ter visto nada nem saberem de nada, incomodadas pela crescente presença de jornalistas na comunidade.\r\nApós alguns dias, foi divulgado o retrato falado do culpado, graças à segunda testemunha ocular do crime. Um dono de café próximo à ponte De Selle afirmou ter visto um cliente desconhecido no café, que pegou uma cerveja e ficou observando um relógio incansavelmente. Esse cliente peculiar apareceu novamente por volta das 17h, realizando o mesmo ritual com mãos trêmulas, indo embora às 17h10.\r\nAté então, a polícia acreditava que Gregory não havia sido arremessado no lago, já que o corpo não apresentava marcas ou machucados. Contudo, com a chegada de um novo testemunho, que observou marcas de pneus novas na estrada do vilarejo que ia até o rio Vologne, a perspectiva mudou.\r\nOs peritos foram até o local investigar, jogaram um boneco proporcional ao garoto e perceberam que, aos poucos, o boneco ficava preso em alguns arbustos, causando marcas em suas roupas. Surgiu então a possibilidade de que Gregory foi jogado do Barba, um riacho que deságua no rio. O local de encontro das águas apresentava um corpo de bombeiros, reforçando a hipótese de que o garoto foi lançado na água logo após o sequestro.\r\nA complexidade do caso Gregory Villemin atingiu novos patamares à medida que os investigadores, diante do silêncio da família, se viram compelidos a reunir todos os membros para desvendar o mistério do Corvo e compreender por que Jean estava sendo alvo. Divergências surgiram, pois alguns familiares afirmavam ouvir uma voz masculina nas chamadas, enquanto outros, não diretamente ligados aos Villemin, mencionavam uma voz feminina. Essa divergência indicou a possível participação de mais pessoas no caso do que inicialmente suspeitado.\r\nA investigação foi marcada por vieses e rivalidades familiares, além do obstáculo representado pelo juiz Jean-Michel Lambert, que teve sua capacidade de conduzir as investigações limitada. O foco então se voltou para a mãe de Gregory. \r\nEm 19 de dezembro de 1984, as análises de caligrafias foram anuladas, e as referências a Bernard Laroche desapareceram do dossiê.\r\nO jornalista Jean Ker confrontou o casal Villemin com gravações e dados que sugeriam Bernard como o assassino, porém não detinha total confirmação. Num surto de raiva, Jean, convicto da culpa de Laroche, planejou sua morte, mas a intervenção de Jean Ker impediu a tragédia.\r\nDiante das dificuldades enfrentadas, o advogado do casal os aconselhou a tentar ter outro filho. Christine engravidou logo em seguida, e isso resultou em críticas severas por parte da mídia, acusando-os de tentar substituir o filho falecido e desencadeando uma difamação maciça contra Christine, sugerindo que ela era o Corvo.\r\nEm 24 de março de 1985, o resultado dos testes de caligrafia apontou Christine como o Corvo. A revelação a levou a uma hemorragia, e ela foi internada. Jean, tomado pelo desespero e pela ansiedade de ver sua mulher atacada, dirigiu-se à casa de Bernard em 28 de março, planejando vingar-se, resultando na morte de Laroche.\r\nApós a morte de Bernard e a prisão de Jean, os peritos voltaram sua atenção novamente para Christine, especialmente devido à insistência de Lambert, fixado na ideia de sua culpabilidade, mas ainda sem provas, apenas especulações e acusações sem causas reais.\r\nSurgiu a teoria de que Gregory teria sido morto por uma dose de insulina, mas a falta de investigação quanto à presença de uma marca de agulha no corpo levou Sellwen, um jornalista independente, a considerar a seringa de insulina encontrada próxima ao corpo de bombeiros como a possível arma do crime. \r\nNo início de julho de 1985, o juiz Lambert convocou a polícia nacional para entregar o mandado de prisão de Christine. Em 5 de julho, ela foi presa e submetida a avaliações psiquiátricas. Após 11 dias sob custódia, foi libertada através de uma apelação, e em 1 de outubro de 1985, nasceu o segundo filho do casal, Julien.\r\nEm 9 de dezembro de 1986, Lambert ainda sustentava a crença de que Christine era a culpada e possuía provas suficientes para levá-la a julgamento. No entanto, a divisão criminal de Nancy decidiu que ela deveria ser julgada, apesar das dúvidas sobre a viabilidade de um julgamento criminal dadas a repercussão na mídia e a extensão das informações. O caso, com suas 3.500 páginas, exigiu uma revisão substancial, com 450 delas precisando ser reescritas pelo juiz Lambert devido a erros ou inconsistências.\r\nCom a saída de Lambert do caso, Maurice Simon assumiu a posição e reiniciou a investigação. Ele reconstituiu todos os passos, dedicando três dias para organizar o que realmente aconteceu entre os envolvidos. Posteriormente, mais tempo foi necessário para chegar à conclusão de que Gregory foi sequestrado, neutralizado com insulina, entrou em coma, e uma terceira pessoa o colocou na água. \r\nEm 2017, o caso Gregory Villemin foi reaberto, resultando na intimação de três pessoas suspeitas de terem sequestrado Gregory. Contudo, após alguns meses, essas suspeitas foram canceladas devido a erros procedimentais. Jean e Christine decidiram se mudar para os subúrbios de Paris, buscando distância dos holofotes do vilarejo, e atualmente, têm três filhos.\r\nAo longo dos anos, o caso de Gregory Villemin continuou a apresentar novos desenvolvimentos e teorias, mas permanece sem solução. O mistério em torno do assassinato de Gregory Villemin persiste como um dos casos não resolvidos mais notórios da França, sendo tema constante de discussões e especulações.\r\nAlém disso, é importante mencionar o documentário disponível na Netflix que aborda esse caso intrigante, fornecendo uma visão aprofundada do processo investigativo, das reviravoltas e das complexidades envolvidas. Esse documentário oferece uma perspectiva única para aqueles interessados em explorar os detalhes e as nuances do caso Gregory Villemin.\r\nForam utilizados para desenvolvimento deste texto o vídeo da Jaqueline Guerreiro e o documentário da Netflix \'Gregory\'.');

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
(6, 17),
(6, 20),
(6, 24),
(6, 25),
(6, 27),
(6, 28),
(6, 29),
(6, 30),
(6, 31),
(6, 32),
(5, 17),
(5, 18),
(5, 19),
(5, 20),
(5, 21),
(5, 22),
(5, 23),
(5, 24),
(5, 25),
(5, 26);

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
(43, 13, 'uploads/6568cace43230.jpg'),
(44, 13, 'uploads/6568cace634dd.jpg'),
(45, 13, 'uploads/6568cace7181b.jpg'),
(46, 13, 'uploads/6568cace82f56.jpg');

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
(17, 'Um homem foi assassinado enquanto cozinhava, era tarde da noite e ele estava extremamente cansado devido ao desenvolvimento de um projeto da empresa no qual trabalhava. Ao analisar o local do crime, foi obtido encontrada a arma utilizada pelo autor do crime, após um estudo acerca da faca e a aplicação de técnicas de revelação, foi encontrado uma impressão digital, demonstrada na imagem abaixo. Com base nela, classifique a impressão de acordo com a classificação de Juan Vucetich Kovacevich.', 'uploads/65611807a708b.jpg', 'A', 'Verticilo Sinuoso', 'Presilha Interna Ganchosa', 'Arco de Presilha Interna', 'Verticilo Ganchoso'),
(18, 'Ao investigar uma cena de crime, os peritos encontraram uma impressão digital latente em uma superfície porosa. Qual das seguintes técnicas de revelação seria mais apropriada para ressaltar a impressão digital?\r\n', '', 'C', 'Iodeto de prata', 'Pó magnético', 'Ácido ninidrina', 'Luz ultravioleta'),
(19, 'Qual dos seguintes eventos históricos foi um marco significativo no desenvolvimento da papiloscopia como método de identificação?\r\n\r\n', '', 'C', 'a) A criação do FBI em 1908.', 'A publicação do livro \"Fingerprints\" por Sir Francis Galton em 1892.', 'A identificação do primeiro criminoso usando impressões digitais na Índia em 1896. ', 'A implementação do sistema AFIS (Automated Fingerprint Identification System) em 1969.'),
(20, 'Durante uma investigação, uma impressão digital é identificada como uma presilha, caracterizada por linhas que entram em um lado e saem do outro, formando um loop simples. Qual é a classificação correta dessa impressão de acordo com o sistema de classificação de Juan Vucetich Kovacevich?', '', 'C', 'Presilha Externa Ganchosa', 'Arco de Presilha Externa', 'Presilha Interna Ganchosa', 'Arco de Presilha Interna'),
(21, '(SECTEC SSP,  2021) As impressões digitais estão presentes na', '', 'A', 'Epiderme que apresenta origem embrionária na ectoderme.', 'Epiderme que apresenta origem embrionária na mesoderme.', ' Epiderme que apresenta origem embrionária na endoderme.', 'Pele que apresenta origem embrionária somente na ectoderme.'),
(22, 'Existem diferentes abordagens para revelar uma impressão digital, como o uso de pó magnético, cianoacrilato e vapor de iodo. A seleção da técnica pelo perito é extremamente importante para preservação da evidência, em vista que cada uma é eficaz em determinados tipos de superfícies, e uma escolha inadequada pode resultar na destruição do objeto sob investigação. Diante disso, selecione a alternativa que indica qual superfície é adequada para as 3 técnicas de revelação citadas no texto respectivamente.\r\n', '', 'C', 'Superfícies lisas ou rugosas; superfícies porosas; superfícies claras.', 'Superfícies lisas e não porosas; superfícies escuras; superfícies porosas.', 'Superfícies lisas e não porosas; superfícies lisas ou rugosas; superfícies claras.', 'Superfícies escuras; superfícies quentes; superfícies porosas e lisas.'),
(23, '(IDECAN, 2022) Uma mulher foi sequestrada e um dos agressores utilizou fita adesiva transparente para fixar uma mordaça na vítima. Após as investigações policiais, o cativeiro foi descoberto e a vítima foi resgatada ilesa. Ao exame pericial no local, a fita adesiva utilizada por um dos sequestradores foi encaminhada para análise papiloscópica. No laboratório de papiloscopia, foi encontrado um fragmento de impressão digital situado na parte colante da fita adesiva. Este fragmento foi devidamente revelado e a parte adesiva da fita foi colocada em contato com um suporte secundário, de cor branca, que permitiu a identificação e análise dos pontos característicos - vide figura abaixo. Considerando este caso pericial hipotético e os fundamentos de papiloscopia, assinale a alternativa correta e que contém o tipo fundamental do datilograma relacionado ao dedo do criminoso (que era o dedo mínimo da mão direita).\r\n', 'uploads/65611cbc123cb.png', 'D', 'Presilha interna, pois a imagem não deveria ser invertida para a correta classificação.', 'Presilha externa, pois a imagem não deveria ser invertida para a correta classificação.', 'Presilha interna, pois a imagem deveria ser invertida para a correta classificação.', 'Presilha externa, pois a imagem deveria ser invertida para a correta classificação.'),
(24, '(PEFOCE, 2021) Um datilograma que se caracteriza pela presença de um delta à direita e outro à esquerda do observador e um núcleo de forma variada, apresentando pelo menos uma linha curva à frente de cada delta, é denominado\r\n', '', 'A', 'Verticilo', 'Presilha Interna', 'Presilha Externa', 'Arco'),
(25, '(PC-TO 2014) No começo do século XX, Alphonse Bertillon (pai da ciência forense) afirmou e demonstrou que não só as impressões digitais, mas também as impressões palmares (palma da mão) e plantares (sola do pé), são elementos de identificação incontestáveis e que mesmo uma pequena parte destas impressões é suficiente para determinar a identidade do indivíduo, basta que ela apresente certo número de particularidades coincidentes. A papiloscopia foi dividida em: (1) - identificação por meio das impressões palmares; (2) - identificação por meio das impressões plantares; (3) - identificação por meio dos poros das papilas dérmicas e (4) identificação humana por meio das impressões digitais. Esses processos são denominados, respectivamente, de:', '', 'B', 'datiloscopia; quiroscopia; podoscopia; poroscopia.', 'quiroscopia; podoscopia; poroscopia; datiloscopia.', 'podoscopia; quiroscopia; poroscopia; datiloscopia.', 'quiroscopia; datiloscopia; podoscopia; poroscopia.'),
(26, '(PC-TO, 2014) A identificação entre duas impressões digitais faz-se por meio da verificação dos pontos característicos de cada uma das impressões encontradas no local do crime e a fornecida pelo suspeito. No Brasil, aceita-se afirmar que duas impressões são iguais, portanto, foram produzidas pelo mesmo dedo, quando houver um mínimo de pontos característicos coincidentes entre a impressão padrão e a de um indivíduo suspeito. Assim, que quantidade de pontos característicos coincidentes é aceita?', '', 'C', 'Vinte e um pontos. ', 'Quinze pontos. ', 'Doze pontos. ', 'Nove pontos.'),
(27, '(PC-GO, 2013) O isolamento e a preservação dos locais de crimes:', '', 'A', 'resultam em um item obrigatório a ser inserido nos laudos periciais de exame de local, conforme previsão expressa do Código de Processo Penal.', 'estão inseridos na cultura geral e na tradição do brasileiro, sendo raríssimos os episódios de locais de crime prejudicados pela população que, naturalmente, ao se deparar com um cenário de crime, evita a aproximação ou, mesmo, o deslocamento por entre os', 'são de responsabilidade apenas do primeiro policial que chega ao cenário, não havendo qualquer responsabilidade posterior para as autoridades policiais e os agentes sob sua direta subordinação.', 'não encontram qualquer respaldo na legislação processual penal brasileira.'),
(28, '(SECTEC SSP, 2021) Quanto à preservação e (ou) à conservação de documentos assinale a alternativa correta.\r\n', '', 'A', 'A poeira e os gases contribuem para o envelhecimento prematuro de papéis, destruindo suas fibras. ', 'A temperatura ideal para conservação e preservação dos documentos em suporte papel é acima de 35° C.', 'A umidade elevada não afeta a preservação dos documentos em suporte papel.', ' O alisamento é uma operação de conservação que consiste em mergulhar o documento em banho de gelatina.'),
(29, '(SECTEC SSP, 2021) A fluorescência é a capacidade de uma\r\n', '', 'D', 'espécie química de emitir luz quando submetida a uma reação química ionizante. ', 'substância de emitir luz quando exposta a altas temperaturas.', 'espécie química de emitir luz quando exposta a ondas e ultrassom. ', 'substância de emitir luz visível quando exposta a radiações do tipo ultravioleta, raios X ou raios catódicos.'),
(30, '(SECTEC SSP, 2021) A polícia técnico-científica foi chamada para investigar um incêndio em um galpão. Ao chegar ao local, constatou-se que havia uma vítima queimada pelo fogo. Identificou-se também que o incêndio foi provocado por um curto-circuito elétrico no aparelho de ar-condicionado. Após a perícia, diversas irregularidades foram constatadas. Assinale a alternativa que pode apresentar uma dessas irregularidades.\r\n', '', 'A', 'Inexistência de extintor de incêndio do tipo água pressurizada, adequado para uso em instalações elétricas energizadas, ao lado do aparelho de ar condicionado que causou o incêndio.', 'Armazenagem de produtos com obstrução das saídas de emergência.', 'Utilização de umidificadores de ar nas salas. ', 'Iluminação geral das salas uniformemente distribuídas.'),
(31, '(SECTEC SSP, 2021) Um suspeito de assassinato de um garçom, ao ser interrogado, afirmou:\r\n“Se ele morreu baleado, então eu não sou o assassino”.\r\nUm investigador concluiu que a verdade é exatamente a negação da proposição contrária a esta. Com base nisso, é correto afirmar logicamente que\r\n', '', 'C', 'O garçom não morreu baleado, e o suspeito não é o assassino. ', 'O garçom morreu baleado ou o suspeito não é o assassino.', 'O garçom morreu baleado, mas o suspeito não é o assassino. ', 'Se o suspeito é o assassino, então o garçom morreu baleado.'),
(32, '(PC-BA, 2022) Acerca da preservação do local do crime, analise os itens abaixo:\r\nI. Vestígio é todo objeto ou material bruto, visível ou latente, constatado ou recolhido, que se relaciona à infração penal.\r\nII. A preservação do local do crime é uma das formas de se dar o início da cadeia de custódia.\r\nIII. O agente público que reconhecer um elemento como de potencial interesse para a produção da prova pericial fica responsável por sua preservação.\r\nEstá(ão) correto(s) o(s) item(ns): \r\n', '', 'D', 'apenas I.  ', ' apenas II. ', 'apenas I e II. ', ' I, II e III. ');

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
(5, '2023-11-22', '2023-12-06', 'Papiloscopia', 'Conhecimentos de Papiloscopia'),
(6, '2023-11-22', '2023-12-13', 'Conhecimentos Gerais', 'Conhecimentos Específicos');

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
(1, 'Um Corpo na Biblioteca - Agatha Christie', 'O corpo de uma jovem é encontrado no tapete da biblioteca dos Bantry, às sete da manhã. A vítima é uma completa desconhecida e o casal Bantry decide chamar as autoridades para investigar o caso — e também, é claro, Miss Marple, detetive amadora e amiga da sra. Bantry.\r\nTudo se complica ainda mais quando chega até eles a notícia de outra adolescente morta, carbonizada dentro de um carro incendiado em uma pedreira. Qual será a possível conexão entre os dois incidentes?', 'uploads/6568d9771af7d.jpg', ''),
(2, 'Assassinato no Expresso do Oriente - Agatha Christie', 'Em meio a uma viagem, Hercule Poirot é surpreendido por um telegrama solicitando seu retorno a Londres. Então, o famoso detetive belga embarca no Expresso do Oriente, que está inesperadamente cheio para aquela época do ano. Pouco tempo após a meia-noite, o excesso de neve nos trilhos obriga o trem a parar. Na manhã seguinte, o corpo de um dos passageiros é encontrado, golpeado por múltiplas facadas. Isolados, e com um assassino entre eles, a única solução é que Poirot inicie uma investigação para descobrir quem é o criminoso ― antes que ele faça mais uma vítima. ', 'uploads/6568d94dc182d.jpg', ''),
(3, 'Os Crimes ABC - Agatha Christie', 'Ao receber uma carta desafiando-o a solucionar um crime iminente, Hercule Poirot sabe que talvez seja apenas uma brincadeira de mau gosto, mas ainda assim teme pelo pior. E não perde por esperar: na data e no local indicados, o assassinato de fato acontece, e ele recorre ao capitão Hastings e ao inspetor-chefe Japp para juntos investigarem o caso.\r\n\r\nAs peças do quebra-cabeça começam a se encaixar com a chegada de uma nova carta e a ocorrência de um novo homicídio: o remetente identifica-se apenas como ABC, e suas vítimas parecem seguir uma rígida ordem alfabética ? Alice Ascher em Andover, Betty Barnard em Bexhill... Mas o que Poirot pode fazer para capturar esse serial killer, quando seus alvos possuem tão pouco em comum?', 'uploads/6568d9d16c793.jpg', ''),
(4, 'Um Estudo em Vermelho - Arthur Conan Doyle', '“Um estudo em vermelho” marca o início da trajetória de sucesso do maior detetive da literatura mundial: Sherlock Holmes. Publicado originalmente na revista Beeton\'s Christmas Annual em novembro de 1887, foi finalmente lançado em formato de livro em julho de 1888. A obra narra o primeiro encontro do detetive com seu fiel amigo Dr. Watson, imersos em mais um intrigante mistério a ser solucionado. A minúcia da narrativa permite ao leitor conhecer os costumes da época e os acontecimentos históricos, enriquecendo a trama do caso. Com um desfecho que deixará os leitores sem ar, Um estudo em vermelho é mais uma obra genial de Sir Arthur Conan Doyle.', 'uploads/6568da85aa15f.jpg', ''),
(5, 'Seven - Os Sete Crimes Capitais', 'A ponto de se aposentar, o detetive William Somerset pega um último caso, com a ajuda do recém-transferido David Mills. Juntos, descobrem uma série de assassinatos e logo percebem que estão lidando com um assassino que tem como alvo pessoas que ele acredita representar os sete pecados capitais.', 'uploads/6568db06eda40.png', ''),
(6, 'O Silêncio dos Inocentes (1991)', 'A jovem e talentosa agente do FBI Clarice Starling recebe ajuda do encarcerado Dr. Hannibal Lecter, um psiquiatra brilhante e também um psicopata violento e canibal, para tentar encontrar um assassino em série conhecido como Buffalo Bill.', 'uploads/6568db5da39db.png', ''),
(7, 'Entre Facas e Segredos', 'Depois de fazer 85 anos, Harlan Thrombey, um famoso escritor de histórias policiais, é encontrado morto. Contratado para investigar o caso, o detetive Benoit Blanc descobre que, entre os funcionários misteriosos e a família conflituosa de Harlan, todos podem ser considerados suspeitos do crime.', 'uploads/6568dba1622a5.jpg', ''),
(9, 'CSI: Crime Scene Investigation', 'CSI revela as investigações de um grupo de cientistas forenses da polícia de Las Vegas. Esses peritos trabalham desvendando misteriosos crimes que são pouco comuns, a ponto de alguns parecerem impossíveis de se desvendar. O grupo é formado pelo Capitão James Brass (Paul Guilfoyle) que logo no início já é substituído por Gilbert Grissom (William Petersen), um entomologista que já integrava a equipe, pela biomédica Catherine Willows (Marg Helgenberger), pelo analista Nicholas Stokes (George Eads), pelos químicos Warrick Brown (Gary Dourdan) e Gregory Sanders (Eric Szmanda), pela física Sara Sidle (Jorja Fox) e pelo legista Albert Robbins (Robert David Hall). A série vai mostrando o cotidiano dos investigadores, que, enquanto resolvem esses casos surpreendentes, também precisam cuidar de suas vidas.', 'uploads/6568dc183d82c.jpg', ''),
(10, 'Breaking Bad', 'Walter White (Bryan Cranston) é um professor de química na casa dos 50 anos que trabalha em uma escola secundária no Novo México. Para atender às necessidades de Skyler (Anna Gunn), sua esposa grávida, e Walt Junior (RJ Mitte), seu filho deficiente físico, ele tem que trabalhar duplamente. Sua vida fica ainda mais complicada quando descobre que está sofrendo de um câncer de pulmão incurável. Para aumentar rapidamente a quantidade de dinheiro que deixaria para sua família após sua morte, Walter usa seu conhecimento de química para fazer e vender metanfetamina, uma droga sintética. Ele conta com a ajuda do ex-aluno e pequeno traficante Jesse (Aaron Paul) e enfrenta vários desafios, incluindo o fato de seu concunhado ser um importante nome dentro da Agência Anti-Drogas da região.', 'uploads/6568dc5fbd031.jpg', ''),
(11, 'Sherlock', 'O dr. John Watson precisa de um lugar para morar em Londres. Ele é apresentado ao detetive Sherlock Holmes e os dois acabam desenvolvendo uma parceria intrigante, na qual a dupla vagará pela capital inglesa solucionando assassinatos e outros crimes brutais. Tudo isso em pleno século XXI.', 'uploads/6568dcb0c7d79.jpg', ''),
(12, 'A Importância da Papiloscopia na Identificação de Vítimas de Acidentes de Massa', 'Acidente de massa é um evento de grande magnitude e natureza singular cujas vítimas podem ser encontradas em diferentes condições. A identificação papiloscópica de um corpo conservado é um procedimento simples que fornece resultados rápidos. Entretanto, corpos que sofreram danos físico-químicos e alcançaram estágios mais avançados de decomposição são mais difíceis de identificar em razão da má conservação tecidual. Realizou-se um levantamento bibliográfico com o objetivo de elucidar a aplicabilidade da papiloscopia para a identificação de quatro diferentes tipos de vítimas fatais de acidentes de massa. Constatou-se que a identificação positiva das vítimas nesses casos se dá pela escolha da melhor técnica para coletar e analisar o material papiloscópico, a partir da identificação dos danos sofridos, ajudando inclusive a reconstruir e identificar a natureza do acidente, sendo utilizada também para a investigação criminal. ', '', 'uploads/6568dd67eb43e.pdf'),
(13, 'Importância da Perícia Papiloscópica em Laboratório para a Investigação Policial', 'Resumo: Um dos maiores desafios enfrentados pelas autoridades judiciárias é a existência de provas idôneas para a conclusão de investigações policiais. As Ciências Forenses possuem uma série de aplicabilidades que auxiliam nas perícias em locais de crime, contribuindo para a busca da verdade e da justiça. A Papiloscopia é uma ciência que permite a identificação humana através das cristas papilares individualizando suspeitos e identificando vítimas de crimes, dentre muitas outras aplicações. O objetivo deste trabalho foi demonstrar a importância das perícias realizadas em laboratório papiloscópico para as investigações policiais. Para isso, estatísticas das perícias papiloscópicas realizadas por Papiloscopistas Policiais das ocorrências criminais atendidas no Estado de Goiás foram analisadas. Os resultados demonstraram que os exames papiloscópicos realizados exclusivamente no Laboratório Papiloscópico são responsáveis por 29% da indicação de suspeitos no caso para a autoridade policial, demonstrando a importância da existência do Laboratório Papiloscópico nas Unidades Federativas de todo o país como ferramenta crucial para as investigações policiais, contribuindo com a Segurança Pública.', '', 'uploads/656147d744af1.pdf'),
(14, 'Papiloscopia: O Uso da Química na Identificação Humana e no Ensino de Química', 'A ficção científica desperta muita atenção quanto aos conteúdos de química. A química forense será abordada neste trabalho em relação às práticas envolvendo a Papiloscopia como procedimento na resolução de crimes e como metodologia no ensino de Química. A prática pedagógica proposta pode ser usada para atrair o interesse dos alunos uma vez que a química forense é largamente problematizada e invocada em produções cinematográficas. Portanto, se propõe, neste trabalho, alternativas ao ensino tradicional. O que ajuda na construção do conhecimento e do entendimento dos conteúdos de química. Será por meio da demonstração da aplicabilidade da química forense na Papiloscopia, na revelação de impressões latentes, onde se procurará demonstrar o conhecimento químico mais aplicado na vida dos alunos, possibilitando maior relação dos conteúdos de química trabalhados em sala de aula com o cotidiano dos discentes. A papiloscopia é essencial no processo de individualização humana. Serão apresentados neste trabalho alguns métodos de colher impressões latentes através de reagentes químicos em diversos tipos de superfícies. O objetivo do ensino de química na formação do cidadão, implica, sobretudo, a abordagem de informações químicas fundamentais, que possibilita ao aluno interagir com a sociedade na tomada de decisões. A papiloscopia é o estudo das pequenas cristas, sulcos de fricção e padrões de vale existentes na face interna dos dedos, mãos e pés. Este estudo, através de princípios químicos próprios, se torna um sistema eficiente de identificação humana capaz de identificar qualquer indivíduo por características físicas, baseadas em princípios cientificamente comprovados, por meio de dados inexauríveis e imutáveis e com alto grau de precisão.', '', 'uploads/656149189344a.pdf');

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
(1, 6, 9),
(1, 5, 5),
(1, 5, 1),
(16, 5, 5),
(15, 6, 3),
(18, 5, 4),
(20, 5, 4),
(21, 5, 6),
(8, 5, 5),
(8, 6, 5),
(12, 5, 6),
(12, 6, 5),
(10, 5, 5),
(10, 6, 5);

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
(1, 'Mikael', 'mikaelfontoura29@gmail.com', '$2y$10$Z815YQ65P3lUkp5Da.BmreOmaDVm8RiQiu8QSYPTbu1f4CY.0eS.6', 1),
(5, 'Douglas', 'douglas@gmail.com', '$2y$10$vvVeYzA9clS/v.bIUGFbMeHFKyCr3IwOMMcpUIGWraTHes1DI9MZe', 0),
(6, 'Admin', 'admin@gmail.com', '$2y$10$wNRFelFQiQ.WTOIx369Ni.gVXtPFXkLW6nkoE2jTRv0acccfPeeKu', 2),
(7, 'Emilly', 'emilly@gmail.com', '$2y$10$NWzN4c16sc6zh6ExF7N7U.6DFjofo/LKqw2F6uYxk4qDp4JP82.X2', 0),
(8, 'Bianca', 'bianca@gmail.com', '$2y$10$hskbpjUO5k2Hq/b3CQLcRuGz3Mx3PP5z/gaB16xKaf61zslNoRRlu', 0),
(9, 'Julia Lemes', 'julia@gmail.com', '$2y$10$dtTQ494FX9opZ.9ykKJWPuIkAAArtLFMOArmZ8ubZTUu1DbIica3a', 0),
(10, 'Kussuma', 'kussama@gmail.com', '$2y$10$08OfS6smt5kkf.FSlFBs2uPACJjdnnCR2cZMs0m.EXmtqEnKSDlHa', 0),
(11, 'Lavínia', 'lavinia@gmail.com', '$2y$10$LBMHGoXYP7eeAjIgClrAZe9tG5T8pvxo/eiKyPDOdFSsr56wlLuxW', 0),
(12, 'Gabriel ', 'gabriel@gmail.com', '$2y$10$HNJRoWM1.yoTY4i4AKFNOu/3Bxf9oxEuGkmjoP5tGjbCCG9Rj0Poq', 0),
(14, 'Dani', 'dani@gmail.com', '$2y$10$V1CNfAtY0uOS0pYDSu5GQeqgiJPpH.hP5SrSHRIcKUV2DIi8urLLS', 0),
(15, 'Arthur', 'arthur@gmail.com', '$2y$10$cbrBBQjNmhhj/khZyL/Tzevct8EYyFfaUZQCzrwoy2EniXhHxAtmy', 0),
(16, 'Fabio Dias', 'fabiodias@gmail.com', '$2y$10$nUkqiOj.vSx1rQ3MZAZsLOQo1ySpNF1/sBedjfFEk8kugOilkyPDS', 0),
(18, 'Pablo Baioco', 'pablo@gmail.com', '$2y$10$5NDux1wQVUOIFPXENq3bE.nR2W1gaum/.SFv.DH9S.GRRSGxtxCM6', 0),
(20, 'Toni Montenegro', 'toni@gmail.com', '$2y$10$nBFXJM5zR.te7xdFCwuZmO76flDaYq2PWRzTDRGzaaORF1DD8sJA6', 0),
(21, 'Melina', 'melina@gmail.com', '$2y$10$1Bd66HuI1ZO8n2RtfUTzZuu4YrMzMBLVQzjIt81JTAkzbpfLYgYqa', 0);

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
  MODIFY `id_caso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `questao`
--
ALTER TABLE `questao`
  MODIFY `id_questao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `questionario`
--
ALTER TABLE `questionario`
  MODIFY `id_questionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `recomendacao`
--
ALTER TABLE `recomendacao`
  MODIFY `id_recom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
