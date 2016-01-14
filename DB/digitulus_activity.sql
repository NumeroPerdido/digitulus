-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 22/12/2015 às 12:56
-- Versão do servidor: 5.5.46-0ubuntu0.14.04.2
-- Versão do PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `goarthacom`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `digitulus_activity`
--

CREATE TABLE IF NOT EXISTS `digitulus_activity` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_opportunity_id` int(11) NOT NULL,
  `activity_date` date NOT NULL,
  `activity_proposal` text COLLATE utf8_unicode_ci NOT NULL,
  `activity_answer` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=113 ;

--
-- Fazendo dump de dados para tabela `digitulus_activity`
--

INSERT INTO `digitulus_activity` (`activity_id`, `activity_opportunity_id`, `activity_date`, `activity_proposal`, `activity_answer`) VALUES
(24, 65, '2015-12-15', 'Escolas - English in Chester, EC, LAL e Dominion', ''),
(27, 65, '2015-12-16', 'Encaminhei orçamento do Canadá, Toronto, ILAC, CLLC', 'Está verificando os orçamentos'),
(28, 37, '2015-09-08', 'E-mail encaminhado dia 08/09/15\r\n', 'Fechou passagem TAP 11 de setembro'),
(29, 38, '2015-09-08', 'E-mail encaminhado dia 08/09/15', 'Fechou passagem aérea Emirates para Tailândia'),
(30, 39, '2015-09-09', 'Enviei email', ''),
(31, 40, '2015-09-09', 'Encaminhei e-mail de Austrália e Irlanda\r\n', ''),
(32, 41, '2015-09-10', 'Encaminhei email com seguro CareMed', 'Falou que iria verificar - 10/09/15\r\n'),
(33, 42, '2015-09-16', 'Seguro Saúde CareMed', 'Fechou Seguro Saúde CareMed Prata'),
(34, 43, '2015-09-22', 'Encaminhei seguro CareMed\r\n', ''),
(35, 44, '2015-09-25', 'Encaminheir orçamentos de Brisbane, Melbourne, Sydney e Noosa\r\n', 'Fechou'),
(36, 45, '2015-10-06', 'Enviei orçamentos', ''),
(37, 46, '2015-10-08', 'Enviei orçamento', ''),
(38, 47, '2015-10-08', 'Enviei orçamentos', 'Fechou'),
(39, 66, '2015-12-16', 'Enviei orçamento da CareMed', ''),
(40, 49, '2015-10-09', 'Enviei opção por email da American Airlines', 'Decidiu comprar diretamente no site da American Airlines que não paga a taxa de emissão. Expliquei das vantagens de comprar conosco, mas preferiu comprar no site da AA.\r\n'),
(41, 50, '2015-10-05', 'Enviei várias opções: Alitalia, Lufthansa, Tam', 'Fechou'),
(42, 51, '2015-10-13', 'Tenho de verificar as informações com a Tatiana', ''),
(43, 52, '2015-10-13', 'Já encaminhei orçamento da Shafston e Navitas em Brisbane\r\n', ''),
(44, 53, '2015-10-16', 'Já encaminhei o CareMed', 'Fechou'),
(45, 54, '2015-10-16', 'Já encaminhei o CareMed', 'Fechou'),
(46, 55, '2015-10-19', 'Já encaminhei o CareMed', 'Fechou'),
(47, 56, '2015-10-26', 'Enviei orçamentos', ''),
(48, 57, '2015-10-29', 'Enviei passagem aérea da TAP. Uma passagem com tarifa de estudante e outra normal.', ''),
(49, 58, '2015-10-29', 'Enviei orçamento', ''),
(50, 59, '2015-11-09', 'Encaminhei opções de Cruzeiros', 'Fechou Cruzeiro da Visual no dia 18 de novembro'),
(51, 60, '2015-11-11', 'Encaminhei orçamentos da escola EC  e ALI \r\n', 'Recebeu os orçamentos e marcou com a mãe de vir na agência dia 26/11/15'),
(52, 61, '2015-11-13', 'Liguei e passei as informações sobre a categoria dos vistos, vai decidir com o amigo e entrar em contato', ''),
(53, 62, '2015-11-24', 'Informações sobre College para a esposa Mariana em Boca Raton ou Fort Lauderdale. Querem viajar com a familia sendo que a esposa estudaria e eles teriam visto de dependente.\r\nFicou de me confirmar se a esposa tem o TOFEL, mandei e-mail perguntando e estou aguardando. ', ''),
(54, 63, '2015-11-25', 'Foi enviado orçamento do seguro CareMed no período de 25/05 à 17/06', ''),
(55, 64, '2015-11-25', 'Enviei e-mail com opções da CareMed porque ele quer um seguro que cobre responsabilidade Civil\r\n', 'O cliente respondeu que esta analisando as propostas e me dar um retorno em breve'),
(56, 67, '2015-09-08', 'A Maria Flávia é mãe da Maria Luiza Guimarães de Carvalho Pereira Figueiroa, e já é cliente antiga da agência. ela veio para se informar do programa de High School para a filha e o local ela foi bem categórica na preferência pelo Canadá. Passei algumas informações básicas e amanhã vou ligar para agendar um horário, pois o atendimento de high school é bem específico e demora cerca de 2 a 3 horas.\r\n\r\n"Bom dia Maria Flávia, tudo bem? Espero que sim!\r\n\r\nGostaria de agradecer a visita ontem em nossa agência e marcar um reunião juntamente com sua filha para falarmos sobre o programa de High School. Por se tratar de um programa bem específico a reunião leva em torno de duas a três horas de duração, pois são muitos os detalhes a serem esclarecidos e debatidos. A Tatiana que trabalha conosco está justamente nesse momento no Canadá realizando pesquisas de escolas, universidades e outros parceiros, ela é especializada no atendimento de High School e estará de volta ao Brasil no final de Setembro, gostaria de agendar um horário com você já logo para a primeira semana de Outubro, me diga qual dia e horário seriam melhores que já deixo programado com a Tatiana, ok?\r\n\r\nFico a disposição e aguardo seu retorno.\r\n\r\nAtenciosamente,"\r\n', 'Mais próximo a data a cliente irá informar o melhor dia e horário para marcarmos o agendamento. Vou entrar em contato na primeira semana de outubro. '),
(57, 68, '2015-09-09', 'Cliente já tinha fechado um programa de intercâmbio na agência para Cidade do Cabo em 2009,  agora quer realizar o mesmo curso na mesma escola.\r\nCliente antigo e deve fechar essa semana ainda, passei 3 orçamentos para ele. Conversamos bastante sobre as experiências da África do Sul e tudo que ele poderia fazer no país. Hoje vou ligar para ele novamente para saber da posição. Ele está querendo realizar o pagamento a vista junto com a Marina vamos negociar um pequeno desconto na taxa de matrícula para ele fechar logo.', 'Cliente ficou de definir essa semana, tentei ligar para ele (10/09) e ainda não tive retorno, continuarei tentando. \r\nFechou 4 semanas na LAL Cidade do Cabo.\r\n\r\n'),
(58, 69, '2015-09-10', 'Cliente é amiga da Bárbara e Natália Cézari de Matozinhos, a mesma já fechou o pacote conosco, agora estamos definindo a acomodação de 5 noites em Toronto e alguns passeios turísticos.', 'Cliente fechou 5 noites em Toronto e um tour no Niagara Falls. Reservas: 16428186 e 16428228.'),
(59, 70, '2015-09-11', 'O filho da Silvânia faria um curso na Alemanha através de uma parceria com a sua universidade, porém a mesma cancelou o benefício e o estudante já havia comprado a passagem, logo quer aproveitar e fazer um curso de alemão por 12 semanas.\r\nJá envie três orçamentos para a cliente e hoje (14/09) entrei em contato e a cliente ainda não tinha uma posição, a passagem do filho é para o dia 23 de setembro. Vou esperar até a tarde, caso ela não se manifeste entrarei em contato novamente.', 'A bolsa que havia sido cancelada pela universidade foi novamente renovada, com isso o cliente não vai necessitar do curso, de toda forma a cliente agradeceu nosso atendimento e agilidade nas informações e entrará em contato em uma oportunidade futura.'),
(60, 71, '2015-09-16', 'Cliente é meu amigo e vai comprar Passagem e Seguro Saúde para filha que vai passar um tempo na Itália, na cidade de Bari. Já enviei os orçamentos do seguro-saúde e agora estou aguardando a cotação das passagens aéreas.', 'Cliente ganhou as passagens aéreas de um parente, cancelando assim as cotações realizadas. '),
(61, 72, '2015-09-18', 'Namorado da cliente realizou o programa Work and Travel na Artha, agora os dois estão querendo realizar o intercâmbio juntos e tentar de alguma maneira imigrar. ', 'No mesmo dia que eles ligaram consegui marcar uma reunião com os dois no final da tarde, eles ficaram muito animados com Brisbane pela Shafston, estou finalizando os orçamentos e enviar para eles hoje. (17/09).'),
(62, 73, '2015-09-17', 'Cliente já tinha feito uma visita anterior e voltou a entrar em contato conosco. Ela vai realizar o curso junto com mais duas amigas. Já atualizei os orçamentos e envie também valores do seguro e vamos mandar as passagens aéreas. (17/09)', 'Cliente alegou que fechará com outra agência por motivo de preço e outros mais em que ela não quis entrar em detalhe. Tinha conseguido uma promoção junto a escola do ano passado para elas, mas mesmo assim não foi suficiente. '),
(63, 74, '2015-09-17', 'Cliente foi minha companheira de trabalho no Garota Carioca e possui duas amigas que moram em San Francisco, ela tem planos de fechar o curso no final do ano. ', 'Já enviei vários orçamentos e hoje postei um link de uma escola em San Francisco no facebook dela apenas para dar uma lembrada, seguirei monitorando. '),
(64, 75, '2015-09-17', 'Cliente trabalhou comigo no Garota Carioca, já estuda francês por 2 anos e gostaria de fazer um curso no país.  Enviei alguns orçamentos e postei alguns links de escola no facebook dele também.', ''),
(65, 76, '2015-09-18', 'Cliente já realizou intercâmbio para Inglaterra e fechou um pacote turístico com a mãe para África do Sul, agora a mesma quer ir para um local onde possa estudar e trabalhar, a Austrália é a opção preferível dela.', 'Já marcamos uma reunião aqui na agência para semana que vem para mostrar os detalhes do curso e escolas recomendadas. '),
(66, 77, '2015-09-21', 'Cliente entrou em contato por e-mail e eu já encaminhei um e-mail de apresentação solicitando o telefone para poder conversar com o cliente de forma detalhada, vou aguardar o retorno para prosseguir com o atendimento. ', 'Cliente me retornar com o número do celular e imediatamente entrei em contato com ele. ficamos cerca de 40 min falando sobre os programas, semana que vem encaminharei vários orçamentos para ajudá-lo na escolha.'),
(67, 78, '2015-09-22', 'Cliente veio até a agência através da indicação da amiga Nayara Rocha que foi para a mesma escola em 2013.', 'Ela já saiu com o orçamento da escola nas mãos, com os valores do seguro, agora aguarda apenas as passagens aéreas para definir o programa. '),
(68, 79, '2015-09-23', 'Marquei para cliente vir amanha na agência.', ''),
(69, 80, '2015-09-29', 'Cliente trabalha na Vale do Rio Doce e devido a uma suposta demissão em massa ele já está preparando para realizar o intercâmbio no início do ano que vem.', ''),
(70, 81, '2015-09-29', 'A filha Nalu ligou para Tati e conversou sobre seus planos e eu conversei com a mãe, ficamos de enviar um curso com uma viagem de Top Deck no meio para casar com o perfil da estudante adequando a data que a mesma pretende viajar.', ''),
(71, 82, '2015-10-01', 'Liguei', 'Adiou'),
(72, 83, '2015-10-02', 'Conversei com ele ontem e o mesmo tem interesse de realizar o programa no ano que vem, vou selecionar alguns pacotes do site e encaminhar para ele.', ''),
(73, 84, '0000-00-00', 'Cliente já conhece o Canadá, tem 2 filhos e está planejando se mudar para o país, achou muito interessante o programa de trabalho, contudo com as vagas esgotadas vou oferecer algum College para o cliente. Já liguei pra ele e estou elaborando os orçamentos.', ''),
(74, 85, '2015-10-05', 'Cliente se interessou pelo programa de trabalho no Canadá, como as vagas foram limitadas vou passar as opções de curso na Irlanda, Austrália', ''),
(75, 86, '2015-10-06', 'Cliente se interessou pelo programa de trabalho no Canadá, como as vagas foram limitadas vou passar as opções de curso na Irlanda, Austrália', ''),
(76, 87, '2015-10-07', 'Passei todas informações para o Octávio que ficou de entrar em contato.', ''),
(77, 88, '2015-10-09', 'Cliente ligou fazendo orçamento do seguro-saúde para a mãe que tem 72 anos de idade e viajará para os Estados Unidos do dia 15/10 a 31/10, enviei os orçamentos com as opções de plano da CareMed. ', 'Como cliente ainda não retornou vou ligar para saber se vai optar por algum dos planos.'),
(78, 89, '2015-10-13', 'Cliente buscava um programa para a filha e sobrinha, que são menores, indiquei e passei alguns orçamentos do Study and Fun, estou monitorando. ', ''),
(79, 90, '2015-10-14', 'Cliente trabalha com dança inicialmente queria o programa de trabalho no Canadá, verificamos outras possibilidades na Irlanda e Austrália que ficaram bem fora do orçamento da cliente. Ela tem interesse em imigrar e assim a Diana olhará algum College no Canadá para indicar a ela.', ''),
(80, 91, '2015-10-15', 'Cliente gostaria de marcar uma reunião com a Tati para o programa de High School para a filha Alice de 16 anos. Mandei e-mail para a Tati para verificar a disponibilidade.', ''),
(81, 92, '2015-10-15', 'Cliente gostaria de realizar um curso de inglês geral ou para advogados ou nos Estados Unidos (San Diego) ou Canadá (Vancouver), ela gostaria de ir em fevereiro do ano que vem e ficar de 4 a 5 meses. marcamos uma reunião aqui na agência ao meio dia.', ''),
(82, 93, '2015-10-16', 'Quer viaja com a esposa por 6 meses para Austrália os dois pensam em trabalhar para ajudar com os custos do programa. Já enviei alguns orçamentos e estamos em fase de negociação.', ''),
(83, 94, '2015-10-19', 'Cliente viajará com a namorada e mais um ou dois casais por 4 semanas, eles gostariam de um lugar que tivesse muita natureza e que o custo-benefício fosse bom. Passei alguns orçamentos da África do Sul através do site e ele gostou muito, ficou de conversar com as pessoas do grupo para me retornar, estou monitorando o cliente. ', ''),
(84, 95, '2015-10-20', 'Conversei com a mãe dele a Sra. Irany devido o filho não ter tempo pela carga pesada de estudos. parece que ela já havia conversado com alguma atendente aqui na Artha mais ninguém a reconheceu então realizarei o atendimento. Já passei algumas opções de programas e a mesma disse que analisará junto com o filho para logo marcar uma visita aqui na agência. Estou monitorando. ', ''),
(85, 96, '2015-10-21', 'Cliente ligou para fazer cotação de seguro-saúde, passei todos os planos da CareMed com apólice e cobertura mas cliente optou por ficar com um seguro bem mais barato do cartão de crédito mesmo sabendo da diferença entre eles. ', ''),
(86, 97, '2015-10-22', 'Cliente ligou para fazer cotação de seguro-saúde, passei todos os planos da CareMed com apólice e cobertura, cliente ainda não definiu, estou monitorando através do telefone e e-mail. ', ''),
(87, 98, '2015-10-26', 'Cliente inicialmente gostaria de ir para o Canadá pois tem uma amiga que já mora em Calgary. Contudo pelo tempo e pelo que conversamos no telefone ela tem interesse de ficar 24 semanas no mínimo e também gostaria de trabalhar, falei um pouco das opções mas vamos aprofundar mais amanhã em reunião agendada para as 15 horas.', ''),
(88, 99, '2015-10-30', 'Cliente ira viajar para Madrid e Barcelona entre os dias 12/11 - 02/12, já envie as nossas opções de seguro para análise, hoje vou entrar em contato para saber do cliente. ', ''),
(89, 100, '2015-11-03', 'Cliente está procurando algum curso na área de Administração para a irmã, focado ou somente no trabalho ou estágio remunerado, vou passar algumas opções no Canadá, que a Diana me indicou. ', ''),
(90, 101, '2015-11-04', 'Cliente gostaria de ir para Melbourne por já ter amigos morando na cidade, realizei alguns orçamentos para ela e já entrei em contato para confirmar o recebimento, continuarei acompanhando através de e-mails e telefonemas periódicos. ', ''),
(91, 102, '2015-11-04', 'Cliente gostaria de ir para Irlanda por um período de 24 semanas, já agendei um horário amanha para conversarmos melhor sobre os detalhes do programa. ', ''),
(92, 103, '2015-11-04', 'Cliente é pai da Giulia, amiga da Ana Luíza que fechou um programa de College no Canadá com a Diana, já encaminhei todas as informações para ela poder dar seguimento no atendimento. ', ''),
(93, 104, '2015-11-09', 'Cliente está em dúvida entre Irlanda e Austrália, conversamos bastante por telefone e já enviei vários orçamentos, cliente parece não ter ainda uma quantia suficiente para realizar o programa. Atendimento será monitorado. ', 'Cliente realizou pesquisa em várias agências mas achou tudo muito caro e resolveu realizar a viagem por conta própria, passei o contato para o Heitor auxiliá-la no processo do visto para os Estados Unidos. '),
(94, 105, '2015-11-12', 'Mandei três opções de seguro CareMed para cliente avaliar, a mesma viajará no dia 24/11, entrarei em contato novamente para verificar a posição da cliente. ', ''),
(95, 106, '2015-11-13', 'Cliente gostaria de ir para Gold Coast com a namorada, o mesmo já tem um amigo que mora por lá e iria ajudá-los. Já envie três orçamentos e marcamos uma reunião para o dia 19/11 aqui na Agência para definirmos a escola. ', ''),
(96, 107, '2015-11-18', 'Cliente teve indicações de amigos próximos sobre a escola ILAC, vou enviar alguns orçamentos para ela hoje ainda, ela mora em Ouro Branco e não virá a Belo Horizonte com muita frequência.', ''),
(97, 108, '2015-11-23', 'Cliente estava em dúvida com relação a Austrália, Inglaterra e Estados Unidos, mas conforme nossa conversa ele vai optar pela Austrália por poder trabalhar legalmente. Marquei uma reunião na sexta-feira às 13 horas. ', ''),
(98, 109, '2015-11-30', 'Viagem para a Holanda de 13/12/16 - 06/01/16\r\n', ''),
(99, 110, '2015-11-30', 'Informações sobre visto, passei a indicação ao Heitor.', ''),
(100, 111, '2015-12-01', 'Cliente vai estudar na Queensland University of Tecnology em parceira com a PUC Minas do dia 10 de fevereiro a 10 de julho e está procurando por uma acomodação para todo tempo de curso. Passei os valores da Shafston Mansions para ela e estou aguardando retorno. ', ''),
(101, 112, '2015-12-01', 'Passei orçamentos', 'Fechou na sexta-feira, 11 de dezembro'),
(102, 113, '2015-12-15', 'Carga de CA$ 1000 no VTM', 'Fechou'),
(103, 114, '2015-12-07', 'Venda de AU$ 2500.00 em espécie.', 'Vendido'),
(104, 115, '2015-12-15', 'Recarga de CAD$ 890.00 no VTM.', 'Vendido'),
(105, 116, '2015-12-16', 'Recarga de cartão VTM € 800,00.', 'Vendido.'),
(106, 117, '2015-12-17', 'Recarga de € 200.00 no cartão VTM.', 'Vendido.'),
(107, 118, '2015-09-18', 'Enviei orçamentos: Georgian College, Seneca, George Brown e Centennial.\r\nTati indicou também: Niagara College e Mohawk College', 'Optou pelo Fanshawe College.\r\nCurso de Inglês iniciando em Março.\r\nAdvanced Diploma iniciando em Setembro.'),
(108, 118, '2015-09-22', '"Dia 18 SET - Mandei email com Informativos Georgian College e Seneca\r\nDia 21 SET - Mandei email com as opções de cursos do Georgian College.\r\nDia 22 SET - Mandei email com as opções de cursos do Seneca"\r\n', 'Optou pelo Fanshawe College. Curso de Inglês iniciando em Março. Advanced Diploma iniciando em Setembro.'),
(109, 119, '2015-12-17', 'topdeck - roman trail e passagem aérea ', 'positiva - fechou 1 dia depois '),
(110, 120, '2015-12-21', 'Proposta bacana e preço bom.', 'Cliente fechou.'),
(111, 121, '2015-11-10', 'Pacote para esquiar nos Estados Unidos', 'Passei pra ele a cotação de Breckenridge com carro.'),
(112, 122, '2015-12-22', 'Ana Batista Garcia - Os valores de seguro Ouro de Cobertura Ilimitada para Europa pelo período de 27/12/2015 a 10/02/2016 (7 Semanas), são:  USD 280,00 (4,069) = R$1.139,32 (cobertura ilimitada)\r\n\r\nClaudia e Fernando - Os valores de seguro Ouro de Cobertura Ilimitada para Europa pelo período de 27/12/2015 a 17/01/2016 (3 Semanas), são: USD 132,00 (4,069) = R$537,10 (cobertura ilimitada)\r\n\r\nSendo assim o valor total para toda família é R$2.213,53', 'Pago');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
