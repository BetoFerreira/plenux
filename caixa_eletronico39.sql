-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Set-2019 às 18:16
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `caixa_eletronico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `id` int(11) UNSIGNED NOT NULL,
  `titular` varchar(100) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `saldo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contas`
--

INSERT INTO `contas` (`id`, `titular`, `cargo`, `telefone`, `senha`, `saldo`) VALUES
(8, 'BETO SILVA', 'Outros', '999775309', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(14, 'C. LOPES', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055 ', 57.69),
(15, 'NASSER', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 57.13),
(17, 'MEDEIROS', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 113.04),
(18, 'CAMARGO', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 110.14),
(19, 'MATHEUS DE CARVALHO', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 125.29),
(20, 'LARYSSA PORTAL', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 74.62),
(21, 'TASSIANA ', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 61.61),
(23, 'DANIEL VIEIRA', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 55.06),
(24, 'MARTINELLI', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 107.51),
(25, 'RENATA BRITO', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 35.38),
(26, 'IGLESIAS', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 57.93),
(27, 'CAIQUE', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 78.57),
(28, 'DILSON', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 107.2),
(29, 'G. ROCHA', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 74.83),
(30, 'MAURO', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 54.67),
(31, 'AGUIAR', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 43.74),
(32, 'RAQUEL', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 42.14),
(33, 'BRUNO CASTRO', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 32.76),
(34, 'LYRIO', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 49.59),
(35, 'TATIANE AGUIAR', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 9.4),
(36, 'PEREIRA', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 57.78),
(37, 'JAPHY', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 90.41),
(38, 'NOGUEIRA', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 63.99),
(39, 'SOARES', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 20.8),
(40, 'GUSTAVO BARRETO', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 13.76),
(41, 'TORQUETE', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 12.09),
(42, 'OCTAVIO AUGUSTO', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 109.71);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_conta` int(11) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `data_operacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `id_conta`, `tipo`, `valor`, `data_operacao`) VALUES
(80, 14, 'Compras', 14.08, '2019-09-03 11:50:23'),
(81, 15, 'Compras', 16.83, '2019-09-03 12:02:37'),
(82, 17, 'Compras', 16.96, '2019-09-03 13:41:43'),
(83, 17, 'Compras', 26.32, '2019-09-03 14:13:26'),
(84, 17, 'Compras', 26.95, '2019-09-03 14:14:10'),
(85, 17, 'Compras', 21.44, '2019-09-03 14:14:37'),
(86, 17, 'Compras', 21.37, '2019-09-03 14:15:51'),
(87, 15, 'Compras', 10.04, '2019-09-03 14:26:33'),
(88, 15, 'Compras', 15.16, '2019-09-03 14:26:59'),
(89, 15, 'Compras', 15.1, '2019-09-03 14:27:14'),
(90, 14, 'Compras', 14.01, '2019-09-03 14:28:18'),
(91, 14, 'Compras', 14.76, '2019-09-03 14:29:46'),
(92, 14, 'Compras', 14.84, '2019-09-03 14:30:03'),
(93, 41, 'Compras', 12.09, '2019-09-03 14:39:08'),
(94, 40, 'Compras', 13.76, '2019-09-03 14:39:58'),
(95, 39, 'Compras', 20.8, '2019-09-03 14:40:36'),
(96, 38, 'Compras', 25.31, '2019-09-03 14:41:27'),
(97, 38, 'Compras', 18.17, '2019-09-03 14:41:44'),
(98, 38, 'Compras', 20.51, '2019-09-03 14:42:14'),
(99, 37, 'Compras', 20.67, '2019-09-03 14:42:53'),
(100, 37, 'Compras', 31.8, '2019-09-03 14:43:07'),
(101, 37, 'Compras', 16.7, '2019-09-03 14:43:27'),
(102, 37, 'Compras', 21.24, '2019-09-03 14:44:02'),
(103, 36, 'Compras', 18.94, '2019-09-03 14:44:46'),
(104, 36, 'Compras', 18.04, '2019-09-03 14:45:03'),
(105, 36, 'Compras', 20.8, '2019-09-03 14:45:19'),
(106, 35, 'Compras', 9.4, '2019-09-03 14:50:10'),
(107, 34, 'Compras', 17.4, '2019-09-03 14:50:49'),
(108, 34, 'Compras', 13.63, '2019-09-03 14:51:06'),
(109, 34, 'Compras', 18.56, '2019-09-03 14:51:27'),
(110, 33, 'Compras', 16.25, '2019-09-03 14:52:10'),
(111, 33, 'Compras', 16.51, '2019-09-03 14:52:25'),
(112, 32, 'Compras', 13.34, '2019-09-03 14:53:22'),
(113, 32, 'Compras', 11, '2019-09-03 14:53:36'),
(114, 32, 'Compras', 17.8, '2019-09-03 14:54:04'),
(115, 31, 'Compras', 13.12, '2019-09-03 14:54:41'),
(116, 31, 'Compras', 16.16, '2019-09-03 14:55:08'),
(117, 31, 'Compras', 14.46, '2019-09-03 14:55:21'),
(118, 30, 'Compras', 19.45, '2019-09-03 14:55:56'),
(119, 30, 'Compras', 13.69, '2019-09-03 14:56:12'),
(120, 30, 'Compras', 21.53, '2019-09-03 14:57:36'),
(121, 24, 'Compras', 23.23, '2019-09-03 14:58:07'),
(122, 24, 'Compras', 24.83, '2019-09-03 14:58:20'),
(123, 24, 'Compras', 20.48, '2019-09-03 14:58:37'),
(124, 24, 'Compras', 23.93, '2019-09-03 14:58:56'),
(125, 24, 'Compras', 15.04, '2019-09-03 14:59:11'),
(126, 23, 'Compras', 19.46, '2019-09-03 15:00:09'),
(127, 23, 'Compras', 15.96, '2019-09-03 15:00:41'),
(128, 23, 'Compras', 13.05, '2019-09-03 15:00:57'),
(129, 23, 'Compras', 6.59, '2019-09-03 15:01:14'),
(130, 42, 'Compras', 20.36, '2019-09-03 15:10:41'),
(131, 42, 'Compras', 23.36, '2019-09-03 15:11:10'),
(132, 42, 'Compras', 23.04, '2019-09-03 15:11:25'),
(133, 42, 'Compras', 21.44, '2019-09-03 15:11:40'),
(134, 42, 'Compras', 21.51, '2019-09-03 15:11:56'),
(135, 21, 'Compras', 18.49, '2019-09-03 15:12:35'),
(136, 21, 'Compras', 16.12, '2019-09-03 15:12:49'),
(137, 21, 'Compras', 16.38, '2019-09-03 15:13:04'),
(138, 21, 'Compras', 10.62, '2019-09-03 15:13:19'),
(139, 20, 'Compras', 20.73, '2019-09-03 15:14:00'),
(140, 20, 'Compras', 15.04, '2019-09-03 15:14:16'),
(141, 20, 'Compras', 24, '2019-09-03 15:14:51'),
(142, 20, 'Compras', 14.85, '2019-09-03 15:15:10'),
(143, 19, 'Compras', 25.79, '2019-09-03 15:16:09'),
(144, 19, 'Compras', 17.72, '2019-09-03 15:16:25'),
(145, 19, 'Compras', 24.7, '2019-09-03 15:16:40'),
(146, 19, 'Compras', 2.5, '2019-09-03 15:16:58'),
(147, 19, 'Compras', 27, '2019-09-03 15:17:12'),
(148, 19, 'Compras', 27.58, '2019-09-03 15:17:29'),
(149, 18, 'Compras', 22.62, '2019-09-03 15:18:20'),
(150, 18, 'Compras', 17.44, '2019-09-03 15:18:35'),
(151, 18, 'Compras', 10, '2019-09-03 15:19:58'),
(152, 18, 'Compras', 15.1, '2019-09-03 15:20:11'),
(153, 18, 'Compras', 16.86, '2019-09-03 15:20:25'),
(154, 18, 'Compras', 19.48, '2019-09-03 15:20:51'),
(155, 18, 'Compras', 8.64, '2019-09-03 15:21:05'),
(156, 29, 'Compras', 23.64, '2019-09-03 15:21:51'),
(157, 29, 'Compras', 15.29, '2019-09-03 15:22:05'),
(158, 29, 'Compras', 22.98, '2019-09-03 15:22:24'),
(159, 29, 'Compras', 12.92, '2019-09-03 15:22:47'),
(160, 28, 'Compras', 14.4, '2019-09-03 15:23:21'),
(161, 28, 'Compras', 21.24, '2019-09-03 15:23:37'),
(162, 28, 'Compras', 5.5, '2019-09-03 15:23:49'),
(163, 28, 'Compras', 24.15, '2019-09-03 15:24:07'),
(164, 28, 'Compras', 29.37, '2019-09-03 15:24:27'),
(165, 28, 'Compras', 12.54, '2019-09-03 15:24:41'),
(166, 27, 'Compras', 20.35, '2019-09-03 15:26:02'),
(167, 27, 'Compras', 13.63, '2019-09-03 15:26:20'),
(168, 27, 'Compras', 13.37, '2019-09-03 15:26:41'),
(169, 27, 'Compras', 18.94, '2019-09-03 15:26:59'),
(170, 27, 'Compras', 12.28, '2019-09-03 15:27:14'),
(171, 26, 'Compras', 20.64, '2019-09-03 15:27:58'),
(172, 26, 'Compras', 20.59, '2019-09-03 15:28:15'),
(173, 26, 'Compras', 16.7, '2019-09-03 15:28:42'),
(174, 25, 'Compras', 16.9, '2019-09-03 15:29:23'),
(175, 25, 'Compras', 3, '2019-09-03 15:29:37'),
(176, 25, 'Compras', 15.48, '2019-09-03 15:29:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `uh46v_postagens`
--

CREATE TABLE `uh46v_postagens` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `conteudo` text COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `autor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `views` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `uh46v_postagens`
--

INSERT INTO `uh46v_postagens` (`id`, `titulo`, `conteudo`, `foto`, `autor`, `data`, `views`) VALUES
(288, 'Casamento ', '', 'fcasa.jpg', 'D Fátima', '10/08/2019', ''),
(289, 'Evento I', '', 'fcasa11.jpg', 'D Fátima', '16/08/2019', ''),
(290, 'Evento II', '', 'fcasa12.jpg', 'Sr João', '16/08/2019', ''),
(291, 'Evento III', '', 'fcasa13.jpg', 'José', '16/08/2019', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `uh46v_postagens`
--
ALTER TABLE `uh46v_postagens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contas`
--
ALTER TABLE `contas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT de tabela `uh46v_postagens`
--
ALTER TABLE `uh46v_postagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
