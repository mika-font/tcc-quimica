-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Nov-2023 às 01:42
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
(13, 'Gregory Villemin - Caso Não Resolvido', 'Lépanges-sur-Vologne, Vorges, França', '1984-10-16', 'Gregory Villemin nasceu em 24 de agosto de 1980, na pacata comunidade de Lépanges-sur-Vologne, localizada em Vorges, no nordeste da França. Filho amoroso de Jean-Marie Villemin e Christine Villemin, Gregory era uma criança notável, dotada de inteligência, e recebia todo o carinho de seus pais.\r\nJean-Marie fazia parte de uma extensa e trabalhadora família, destacando-se entre os parentes por sua posição em uma fábrica local e pela felicidade que desfrutava em sua vida familiar. Entretanto, essa prosperidade causava inveja em algumas pessoas ao seu redor.\r\nA partir de 1981, a vida dos Villemin tomou um rumo sombrio. Uma série de ligações anônimas começou a assombrar diversos membros da família de Jean, proferindo ameaças perturbadoras. O autor dessas ameaças ficou conhecido como \'O Corvo\', uma referência a um filme popular da época. Esse indivíduo possuía conhecimentos e segredos sobre os familiares, ameaçando revelar tais informações e semeando discórdia.\r\nO Corvo, com um foco secundário em Jean, apelidando-o de \'chefinho\', passou a atormentar a integridade da família, enviando cartas e provocando Jean. O ponto fraco de Jean tornou-se evidente quando o Corvo mencionou Gregory em uma ligação, insinuando um sequestro caso o menino estivesse sozinho.\r\nDe 1981 a 1983, as ameaças do Corvo se concentraram em Gregory. Contudo, em uma carta datada de 4 de março de 1983, o Corvo surpreendeu a família ao anunciar sua decisão de encerrar as ameaças. Na carta, ele prometia matar a família Villemin se não colaborassem, mas, ao final, despediu-se, afirmando que eles nunca descobririam sua verdadeira identidade. \r\nNo entanto, em 16 de outubro de 1984, quando a família começou a acreditar que as ameaças do Corvo haviam cessado, um evento inesperado ocorreu. Christine, mãe de Gregory, saiu do trabalho por volta das 16h, pegou o filho na casa da babá e retornou para casa. Ao chegar, Christine permitiu que Gregory brincasse numa pilha de cascalhos na frente da casa antes de entrar.\r\nApós algum tempo, Christine voltou para agasalhar o filho, o deixou brincando lá fora e retornou à casa para ouvir música e passar roupa. Contudo, após alguns minutos, Gregory não estava mais na frente da casa.\r\nCerca de uma hora após o desaparecimento, 15 policiais já estavam envolvidos na investigação, coletando informações relevantes. Nesse ínterim, Michel Villemin, irmão de Jean, recebeu uma ligação, com a mesma entonação rouca do Corvo, alegando ter assassinado Gregory e jogado seu corpo no rio Vologne.\r\nEntão, às 19h, o corpo do menino foi encontrado no rio, há 4 km de distância de sua residência. Gregory estava vestindo uma jaqueta azul clara e uma touca que cobria completamente seu rosto; uma corda amarrava seus tornozelos, pulsos e passava ao redor de seu pescoço.\r\nEm 17 de outubro, o resultado da autópsia revelou que Gregory foi jogado vivo no rio e morreu por afogamento. Uma carta, desejando que a dor de Jean pela perda do filho o consumisse, acompanhava essa terrível revelação, enfatizando que dinheiro algum traria o menino de volta.\r\nEm 18 de outubro, as notícias do caso começaram a se espalhar, e o jornalista Jean Kerr, do Paris Match, iniciou sua própria investigação na vila. Fotografou a casa de Gregory, o local do crime e outros pontos relevantes para a elaboração de uma reportagem detalhada.\r\nDurante a investigação, os policiais seguiram uma abordagem semelhante à apresentada no filme que inspirou o próprio Corvo. Reuniram os familiares de Gregory como suspeitos, solicitando que escrevessem cartas para comparar a caligrafia com a do Corvo, um processo demorado e meticuloso.\r\nA polícia inicialmente suspeitava de um familiar como o possível autor do crime e continuou a procurar evidências. No entanto, as pessoas ao redor da cena do crime alegavam não ter visto nada nem saberem de nada, incomodadas pela crescente presença de jornalistas na comunidade.\r\nApós alguns dias, foi divulgado o retrato falado do culpado, graças à segunda testemunha ocular do crime. Um dono de café próximo à ponte De Selle afirmou ter visto um cliente desconhecido no café, que pegou uma cerveja e ficou observando um relógio incansavelmente. Esse cliente peculiar apareceu novamente por volta das 17h, realizando o mesmo ritual com mãos trêmulas, indo embora às 17h10.\r\nAté então, a polícia acreditava que Gregory não havia sido arremessado no lago, já que o corpo não apresentava marcas ou machucados. Contudo, com a chegada de um novo testemunho, que observou marcas de pneus novas na estrada do vilarejo que ia até o rio Vologne, a perspectiva mudou.\r\nOs peritos foram até o local investigar, jogaram um boneco proporcional ao garoto e perceberam que, aos poucos, o boneco ficava preso em alguns arbustos, causando marcas em suas roupas. Surgiu então a possibilidade de que Gregory foi jogado do Barba, um riacho que deságua no rio. O local de encontro das águas apresentava um corpo de bombeiros, reforçando a hipótese de que o garoto foi lançado na água logo após o sequestro.\r\nA complexidade do caso Gregory Villemin atingiu novos patamares à medida que os investigadores, diante do silêncio da família, se viram compelidos a reunir todos os membros para desvendar o mistério do Corvo e compreender por que Jean estava sendo alvo. Divergências surgiram, pois alguns familiares afirmavam ouvir uma voz masculina nas chamadas, enquanto outros, não diretamente ligados aos Villemin, mencionavam uma voz feminina. Essa divergência indicou a possível participação de mais pessoas no caso do que inicialmente suspeitado.\r\nA investigação foi marcada por vieses e rivalidades familiares, além do obstáculo representado pelo juiz Jean-Michel Lambert, que teve sua capacidade de conduzir as investigações limitada. O foco então se voltou para a mãe de Gregory. \r\nEm 19 de dezembro de 1984, as análises de caligrafias foram anuladas, e as referências a Bernard Laroche desapareceram do dossiê.\r\nO jornalista Jean Ker confrontou o casal Villemin com gravações e dados que sugeriam Bernard como o assassino, porém não detinha total confirmação. Num surto de raiva, Jean, convicto da culpa de Laroche, planejou sua morte, mas a intervenção de Jean Ker impediu a tragédia.\r\nDiante das dificuldades enfrentadas, o advogado do casal os aconselhou a tentar ter outro filho. Christine engravidou logo em seguida, e isso resultou em críticas severas por parte da mídia, acusando-os de tentar substituir o filho falecido e desencadeando uma difamação maciça contra Christine, sugerindo que ela era o Corvo.\r\nEm 24 de março de 1985, o resultado dos testes de caligrafia apontou Christine como o Corvo. A revelação a levou a uma hemorragia, e ela foi internada. Jean, tomado pelo desespero e pela ansiedade de ver sua mulher atacada, dirigiu-se à casa de Bernard em 28 de março, planejando vingar-se, resultando na morte de Laroche.\r\nApós a morte de Bernard e a prisão de Jean, os peritos voltaram sua atenção novamente para Christine, especialmente devido à insistência de Lambert, fixado na ideia de sua culpabilidade, mas ainda sem provas, apenas especulações e acusações sem causas reais.\r\nSurgiu a teoria de que Gregory teria sido morto por uma dose de insulina, mas a falta de investigação quanto à presença de uma marca de agulha no corpo levou Sellwen, um jornalista independente, a considerar a seringa de insulina encontrada próxima ao corpo de bombeiros como a possível arma do crime. \r\nNo início de julho de 1985, o juiz Lambert convocou a polícia nacional para entregar o mandado de prisão de Christine. Em 5 de julho, ela foi presa e submetida a avaliações psiquiátricas. Após 11 dias sob custódia, foi libertada através de uma apelação, e em 1 de outubro de 1985, nasceu o segundo filho do casal, Julien.\r\nEm 9 de dezembro de 1986, Lambert ainda sustentava a crença de que Christine era a culpada e possuía provas suficientes para levá-la a julgamento. No entanto, a divisão criminal de Nancy decidiu que ela deveria ser julgada, apesar das dúvidas sobre a viabilidade de um julgamento criminal dadas a repercussão na mídia e a extensão das informações. O caso, com suas 3.500 páginas, exigiu uma revisão substancial, com 450 delas precisando ser reescritas pelo juiz Lambert devido a erros ou inconsistências.\r\nCom a saída de Lambert do caso, Maurice Simon assumiu a posição e reiniciou a investigação. Ele reconstituiu todos os passos, dedicando três dias para organizar o que realmente aconteceu entre os envolvidos. Posteriormente, mais tempo foi necessário para chegar à conclusão de que Gregory foi sequestrado, neutralizado com insulina, entrou em coma, e uma terceira pessoa o colocou na água. \r\nEm 2017, o caso Gregory Villemin foi reaberto, resultando na intimação de três pessoas suspeitas de terem sequestrado Gregory. Contudo, após alguns meses, essas suspeitas foram canceladas devido a erros procedimentais. Jean e Christine decidiram se mudar para os subúrbios de Paris, buscando distância dos holofotes do vilarejo, e atualmente, têm três filhos.\r\nAo longo dos anos, o caso de Gregory Villemin continuou a apresentar novos desenvolvimentos e teorias, mas permanece sem solução. O mistério em torno do assassinato de Gregory Villemin persiste como um dos casos não resolvidos mais notórios da França, sendo tema constante de discussões e especulações.\r\nAlém disso, é importante mencionar o documentário disponível na Netflix que aborda esse caso intrigante, fornecendo uma visão aprofundada do processo investigativo, das reviravoltas e das complexidades envolvidas. Esse documentário oferece uma perspectiva única para aqueles interessados em explorar os detalhes e as nuances do caso Gregory Villemin.\r\nForam utilizados para desenvolvimento deste texto o vídeo da Jaqueline Guerreiro e o documentário da Netflix \'Gregory\'.');

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
(39, 13, 'uploads/6563da7d4a487.jpg'),
(40, 13, 'uploads/6563da7d5f069.jpg'),
(41, 13, 'uploads/6563da7d6a824.jpg'),
(42, 13, 'uploads/6563da7d73308.jpg');

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
(1, 'Os Crimes ABC - Agatha Christie', '\"Os Crimes ABC\" é um thriller clássico da renomada autora de mistério Agatha Christie. A trama se desenrola quando o detetive Hercule Poirot é chamado para investigar uma série de assassinatos aparentemente aleatórios, ligados apenas pela ordem alfabética das vítimas. Um misterioso assassino conhecido como \"ABC\" deixa pistas enigmáticas antes de cada crime, desafiando Poirot e a polícia a desvendarem o padrão por trás dos homicídios.\r\n\r\nÀ medida que Poirot mergulha na investigação, ele descobre conexões obscuras e motivações complexas por trás dos assassinatos. O suspense aumenta à medida que o detetive belga corre contra o tempo para impedir que o criminoso complete sua macabra série de crimes. Com reviravoltas surpreendentes, uma galeria de personagens intrigantes e o brilhantismo característico de Agatha Christie, \"Os Crimes ABC\" é uma obra-prima do gênero, mantendo os leitores ávidos por descobrir a identidade do astuto assassino.', 'uploads/655d32a9f0df7.jpg', ''),
(2, 'Assassinato no Expresso do Oriente - Agatha Christie', '\"Assassinato no Expresso do Oriente\" é um clássico romance de mistério de Agatha Christie que se desenrola em um dos locais mais exóticos e elegantes do mundo: o luxuoso trem Orient Express. O detetive belga Hercule Poirot, conhecido por sua perspicácia e meticulosidade, embarca no trem para uma viagem tranquila, mas seu destino toma um rumo sombrio quando um assassinato ocorre a bordo.\r\n\r\nO rico empresário americano Ratchett é encontrado morto em sua cabine, e Poirot é convocado para investigar o crime. O detetive descobre que todos os passageiros têm algo a esconder, e à medida que entrevista cada um deles, desvenda uma teia complexa de conexões e segredos. À medida que o Expresso do Oriente corta a paisagem europeia, Poirot se depara com reviravoltas surpreendentes e revelações chocantes, levando a um desfecho brilhantemente elaborado.\r\n\r\nCom sua trama envolvente, personagens intrigantes e uma resolução impressionante, \"Assassinato no Expresso do Oriente\" é uma obra-prima do gênero de mistério que continua a cativar leitores ao redor do mundo desde sua publicação.', 'uploads/655d34b0aa9ed.jpg', ''),
(3, 'Um Corpo na Biblioteca - Agatha Christie', '\"Um Corpo na Biblioteca\" é um clássico romance policial da renomada autora Agatha Christie. A história começa quando um corpo de uma mulher desconhecida é encontrado na biblioteca da mansão do Coronel Bantry e sua esposa Dolly. A vítima, uma bela e desconhecida jovem, aparece misteriosamente durante a noite, intrigando a pacata vila de St. Mary Mead.\r\n\r\nA intrépida Miss Marple, uma idosa detetive amadora conhecida por sua sagacidade e astúcia, entra em ação para desvendar o mistério. À medida que ela investiga o caso, descobre-se que a vítima tinha ligações com várias pessoas na cidade, e segredos do passado começam a emergir.\r\n\r\nCom reviravoltas engenhosas, pistas aparentemente desconexas e o charme característico de Agatha Christie, \"Um Corpo na Biblioteca\" é uma trama inteligentemente construída que desafia os leitores a resolver o enigma junto com Miss Marple. A narrativa habilmente mistura suspense e humor, mantendo o leitor intrigado até o final, quando a verdade por trás do enigma é revelada de maneira surpreendente.', 'uploads/655d349e85860.jpg', ''),
(4, 'Um Estudo em Vermelho - Arthur Conan Doyle', '\"Um Estudo em Vermelho\" é o romance que marca a estreia do lendário detetive Sherlock Holmes, criado pelo escritor Sir Arthur Conan Doyle. A história começa quando o Dr. John Watson, um ex-médico militar em busca de moradia em Londres, encontra-se compartilhando um apartamento com o peculiar e genial detetive Sherlock Holmes.\r\n\r\nOs dois logo se veem envolvidos em um intrigante caso de assassinato. Um corpo é descoberto em uma casa abandonada, e a palavra \"RACHE\" (vingança em alemão) está escrita com sangue na parede. Conforme Holmes investiga o crime, ele utiliza métodos científicos e dedução lógica para desvendar as complexidades do mistério.\r\n\r\nA narrativa se desloca para o passado, revelando eventos na América do Sul que lançam luz sobre os motivos por trás do assassinato em Londres. A história envolve uma trama intricada, elementos de vingança e um suspense crescente.\r\n\r\n\"Um Estudo em Vermelho\" não apenas introduz os leitores ao brilhante raciocínio de Sherlock Holmes e sua parceria com o leal Dr. Watson, mas também estabelece as bases para muitas das futuras aventuras e casos que tornariam Holmes uma figura literária icônica no gênero de mistério e detetive.', 'uploads/655d36b9101db.jpg', ''),
(5, '\"Seven\" (Os Sete Crimes Capitais)', '\"Seven\" (Os Sete Crimes Capitais) é um thriller psicológico dirigido por David Fincher e lançado em 1995. O filme é estrelado por Morgan Freeman e Brad Pitt como dois detetives, o veterano William Somerset e o impulsivo David Mills, que investigam uma série de assassinatos brutais baseados nos sete pecados capitais.\r\n\r\nA trama se desenrola em uma cidade sombria e chuvosa, onde Somerset está prestes a se aposentar, mas é forçado a treinar seu substituto, Mills. Juntos, eles começam a investigar uma série de assassinatos hediondos, cada um representando um dos sete pecados mortais. Conforme a investigação avança, eles se veem mergulhados em um jogo sinistro conduzido por um assassino meticuloso e intelectual.\r\n\r\nO filme é conhecido por sua atmosfera sombria e perturbadora, bem como por suas reviravoltas surpreendentes. A narrativa explora temas de moralidade, redenção e a natureza da maldade humana. \"Seven\" é aclamado por sua direção envolvente, performances convincentes e um final impactante que permanece na memória dos espectadores. É uma experiência intensa que desafia as expectativas e deixa uma impressão duradoura.', 'uploads/65612a70934de.png', ''),
(6, 'O Silêncio dos Inocentes (1991)', '\"O Silêncio dos Inocentes\" é um thriller psicológico dirigido por Jonathan Demme, lançado em 1991. O filme é baseado no romance homônimo de Thomas Harris e é o segundo filme da franquia que apresenta o personagem Hannibal Lecter. O filme conta a história de uma jovem agente do FBI, Clarice Starling, interpretada por Jodie Foster, que busca a ajuda do brilhante, mas assustador, Dr. Hannibal Lecter, interpretado por Anthony Hopkins, para capturar um assassino em série conhecido como \"Buffalo Bill\".\r\n\r\nA trama se desenrola enquanto Clarice Starling é encarregada de entrevistar Hannibal Lecter, um psiquiatra canibal e assassino condenado, na esperança de obter insights sobre a mente do assassino que eles estão perseguindo. O filme é tenso, repleto de suspense e apresenta performances excepcionais, especialmente a de Anthony Hopkins, que ganhou um Oscar por sua interpretação memorável de Hannibal Lecter.\r\n\r\n\"O Silêncio dos Inocentes\" é amplamente elogiado por sua narrativa envolvente, atmosfera sombria e personagens complexos. O filme foi um grande sucesso comercial e crítico, recebendo vários prêmios, incluindo os principais Oscars de Melhor Filme, Melhor Diretor, Melhor Ator (Anthony Hopkins), Melhor Atriz (Jodie Foster) e Melhor Roteiro Adaptado. É considerado um clássico do cinema de suspense e horror.', 'uploads/65612bb111f26.png', ''),
(7, 'Entre Facas e Segredos', '\"Entre Facas e Segredos\" (Knives Out) é um filme de mistério e comédia dirigido por Rian Johnson, lançado em 2019. O filme apresenta um elenco estelar, incluindo Daniel Craig, Chris Evans, Ana de Armas, e outros. A trama gira em torno da morte do renomado autor de mistério Harlan Thrombey, interpretado por Christopher Plummer, durante a comemoração de seu 85º aniversário.\r\n\r\nO detetive Benoit Blanc, interpretado por Daniel Craig, é chamado para investigar o aparente suicídio de Thrombey, mas conforme a investigação avança, ele descobre que cada membro da excêntrica família Thrombey tem motivos para cometer assassinato. O filme é habilmente construído com reviravoltas inteligentes, diálogos afiados e uma trama intricada que mantém os espectadores adivinhando até o final.\r\n\r\n\"Entre Facas e Segredos\" é elogiado por sua originalidade, estilo visual vibrante e performances excepcionais. Além disso, o filme incorpora elementos de humor, proporcionando uma experiência divertida e única no gênero de mistério. Recebeu aclamação da crítica e foi indicado a vários prêmios, tornando-se um sucesso tanto entre os fãs de mistério quanto entre os amantes de cinema em geral.', 'uploads/6561406e8d511.jpg', ''),
(9, 'CSI: Crime Scene Investigation', '\"CSI: Crime Scene Investigation,\" muitas vezes conhecida como \"CSI: Las Vegas,\" é uma série de televisão que estreou em 2000 e se tornou um fenômeno mundial. Criada por Anthony E. Zuiker, a série se concentra em uma equipe de cientistas forenses da polícia de Las Vegas, que utilizam métodos científicos e tecnologia de ponta para resolver crimes complexos. Aqui está uma sinopse da série:\r\n\r\nA série segue a equipe do Laboratório de Criminalística de Las Vegas, liderada pelo investigador sênior Gil Grissom, interpretado por William Petersen. A equipe inclui uma variedade de especialistas, desde especialistas em DNA e impressões digitais até especialistas em balística e entomologistas forenses. Juntos, eles investigam crimes que variam desde homicídios e estupros até fraudes e crimes cibernéticos.\r\n\r\nO apelo da série está na combinação de investigações forenses científicas, intrigas policiais e o desenvolvimento dos personagens. \"CSI: Crime Scene Investigation\" foi conhecida por sua abordagem inovadora e pelo uso de efeitos visuais avançados para mostrar as recriações das cenas dos crimes.\r\n\r\nAo longo de suas 15 temporadas, a série contou com um elenco rotativo que incluiu atores como Marg Helgenberger, Gary Dourdan, Jorja Fox, George Eads e muitos outros. \"CSI: Crime Scene Investigation\" tornou-se uma das séries mais assistidas e influentes da televisão, ajudando a popularizar o gênero de procedimentos policiais e inspirando várias séries do mesmo estilo. A série encerrou sua longa corrida em 2015, mas seu impacto na televisão perdura.', 'uploads/656143426fab9.jpg', ''),
(10, 'Breaking Bad', '\"Breaking Bad\" é uma série de televisão americana criada por Vince Gilligan, que foi ao ar de 2008 a 2013. A série é um drama criminal que segue a transformação do protagonista, Walter White, interpretado por Bryan Cranston, de um pacato professor de química para um poderoso fabricante de metanfetaminas. Aqui está uma breve sinopse:\r\n\r\nWalter White é um professor de química do ensino médio diagnosticado com câncer terminal. Diante de desafios financeiros e da perspectiva de deixar sua família em dificuldades após sua morte, Walter decide utilizar suas habilidades químicas para produzir e vender metanfetaminas de alta qualidade. Ele se associa a um ex-aluno, Jesse Pinkman, interpretado por Aaron Paul, e os dois se veem envolvidos no perigoso mundo do tráfico de drogas.\r\n\r\nA série explora as consequências morais e psicológicas das escolhas de Walter, enquanto ele se aprofunda cada vez mais no submundo do crime. Ao mesmo tempo, a DEA (Agência Antidrogas dos Estados Unidos) intensifica sua busca pelos fabricantes de drogas locais, levando a uma série de confrontos intensos e reviravoltas surpreendentes.\r\n\r\n\"Breaking Bad\" é amplamente elogiada por sua narrativa envolvente, desenvolvimento de personagens complexos e performances notáveis. A série recebeu vários prêmios, incluindo 16 Prêmios Emmy. Bryan Cranston, em particular, foi aclamado por sua interpretação, ganhando vários prêmios Emmy pelo papel de Walter White.', 'uploads/656143acb6f44.jpg', ''),
(11, 'Sherlock', '\"Sherlock\" é uma série de televisão britânica criada por Mark Gatiss e Steven Moffat, baseada nas histórias clássicas de Sherlock Holmes, de Sir Arthur Conan Doyle. A série estreou em 2010 e consiste em quatro temporadas, com Benedict Cumberbatch no papel de Sherlock Holmes e Martin Freeman como Dr. John Watson. Aqui está uma sinopse da série:\r\n\r\nA trama se passa nos tempos modernos, com Sherlock Holmes, um detetive brilhante, mas excêntrico, que usa sua astúcia, lógica afiada e habilidades de observação para resolver os casos mais complexos. John Watson, um médico e veterano de guerra, torna-se seu parceiro relutante e narrador das histórias.\r\n\r\nCada temporada de \"Sherlock\" consiste em um pequeno número de episódios longos, cada um adaptando livremente histórias clássicas de Sherlock Holmes para a Londres contemporânea. A série é conhecida por sua abordagem criativa, ritmo acelerado, reviravoltas surpreendentes e pela representação moderna e carismática dos personagens icônicos.\r\n\r\nAlém da trama central de cada episódio, a série explora o relacionamento complexo e a amizade entre Sherlock e John. Benedict Cumberbatch e Martin Freeman receberam elogios por suas performances, e \"Sherlock\" conquistou uma base de fãs dedicada ao redor do mundo. A série foi aclamada tanto pela crítica quanto pelo público durante sua exibição.', 'uploads/6561446cad25b.jpg', ''),
(12, 'A importância da papiloscopia na identificação de vítimas de acidentes de massa', 'Acidente de massa é um evento de grande magnitude e natureza singular cujas vítimas podem ser encontradas em diferentes condições.\r\nA identificação papiloscópica de um corpo conservado é um procedimento simples que fornece resultados rápidos. Entretanto, corpos\r\nque sofreram danos físico-químicos e alcançaram estágios mais avançados de decomposição são mais difíceis de identificar em razão\r\nda má conservação tecidual. Realizou-se um levantamento bibliográfico com o objetivo de elucidar a aplicabilidade da papiloscopia\r\npara a identificação de quatro diferentes tipos de vítimas fatais de acidentes de massa. Constatou-se que a identificação positiva das\r\nvítimas nesses casos se dá pela escolha da melhor técnica para coletar e analisar o material papiloscópico, a partir da identificação dos\r\ndanos sofridos, ajudando inclusive a reconstruir e identificar a natureza do acidente, sendo utilizada também para a investigação\r\ncriminal. ', '', 'uploads/656146f234344.pdf'),
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
(13, 5, 6);

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
(1, 'Mikael', 'mikael@gmail.com', '$2y$10$cSYEMOIom6rYoH3j6SlVTOwvIDkeS7mXWUkhTOF1bUsITqLuhTdl6', 1),
(2, 'Samuel Devesa', 'samuel@gmail.com', '$2y$10$ESgCpgmDmDqgkic12Es4neLAlKg0IRBwVwF0wM/9XraXS1E5S7gyq', 0),
(5, 'Douglas', 'douglas@gmail.com', '$2y$10$vvVeYzA9clS/v.bIUGFbMeHFKyCr3IwOMMcpUIGWraTHes1DI9MZe', 0),
(6, 'Admin', 'admin@gmail.com', '$2y$10$wNRFelFQiQ.WTOIx369Ni.gVXtPFXkLW6nkoE2jTRv0acccfPeeKu', 2),
(7, 'Emilly', 'emilly@gmail.com', '$2y$10$NWzN4c16sc6zh6ExF7N7U.6DFjofo/LKqw2F6uYxk4qDp4JP82.X2', 0),
(8, 'Bianca', 'bianca@gmail.com', '$2y$10$hskbpjUO5k2Hq/b3CQLcRuGz3Mx3PP5z/gaB16xKaf61zslNoRRlu', 0),
(9, 'Julia Lemes', 'julia@gmail.com', '$2y$10$dtTQ494FX9opZ.9ykKJWPuIkAAArtLFMOArmZ8ubZTUu1DbIica3a', 0),
(10, 'Kussuma', 'kussama@gmail.com', '$2y$10$08OfS6smt5kkf.FSlFBs2uPACJjdnnCR2cZMs0m.EXmtqEnKSDlHa', 0),
(11, 'Lavínia', 'lavinia@gmail.com', '$2y$10$LBMHGoXYP7eeAjIgClrAZe9tG5T8pvxo/eiKyPDOdFSsr56wlLuxW', 0),
(12, 'Gabriel ', 'gabriel@gmail.com', '$2y$10$HNJRoWM1.yoTY4i4AKFNOu/3Bxf9oxEuGkmjoP5tGjbCCG9Rj0Poq', 0),
(13, 'Arthur', 'arthur@gmail.com', '$2y$10$qQOG5a2KbBYDFubOyjDBlORodD4eWc4TtIrQAomXPwkwwFuZXWVwS', 0),
(14, 'Dani', 'dani@gmail.com', '$2y$10$V1CNfAtY0uOS0pYDSu5GQeqgiJPpH.hP5SrSHRIcKUV2DIi8urLLS', 0);

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
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `questao`
--
ALTER TABLE `questao`
  MODIFY `id_questao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `questionario`
--
ALTER TABLE `questionario`
  MODIFY `id_questionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `recomendacao`
--
ALTER TABLE `recomendacao`
  MODIFY `id_recom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
