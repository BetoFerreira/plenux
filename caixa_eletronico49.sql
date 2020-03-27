-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Set-2019 às 20:03
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
(8, 'BETO SILVA', 'Outros', '999775309', '81dc9bdb52d04dc20036dbd8313ed055', 0),
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
(42, 'OCTAVIO AUGUSTO', 'Cadete', '', '81dc9bdb52d04dc20036dbd8313ed055', 109.71),
(43, 'MJ ROBERTO', 'Major', '', 'c20ad4d76fe97759aa27a0c99bff6710', 38),
(44, 'MJ INEZ', 'Major', '', 'c20ad4d76fe97759aa27a0c99bff6710', 3),
(45, 'MJ LOUANA', 'Major', '', 'c20ad4d76fe97759aa27a0c99bff6710', 15),
(46, 'MJ VINICIUS', 'Major', '', 'c20ad4d76fe97759aa27a0c99bff6710', 15.5),
(47, 'MJ GABRIEL', 'Major', '', 'c20ad4d76fe97759aa27a0c99bff6710', 119),
(48, 'MJ VICTOR', 'Major', '', 'c20ad4d76fe97759aa27a0c99bff6710', 183.15),
(49, 'MJ RONALDO', 'Major', '', 'c20ad4d76fe97759aa27a0c99bff6710', 212.77),
(50, 'MJ CARVALHO', 'Major', '', 'c20ad4d76fe97759aa27a0c99bff6710', 194.45),
(51, 'MJ CLAITON', 'Major', '', 'c20ad4d76fe97759aa27a0c99bff6710', 35.65),
(52, 'MJ ANDERSON', 'Major', '', 'c20ad4d76fe97759aa27a0c99bff6710', 111.36),
(53, 'MJ EULINA ', 'Major', '', 'c20ad4d76fe97759aa27a0c99bff6710', 75),
(54, 'MJ CAMARGO', 'Major', '', 'c20ad4d76fe97759aa27a0c99bff6710', 211.73),
(55, 'MJ CONTI', 'Major', '', 'c20ad4d76fe97759aa27a0c99bff6710', 70.28),
(56, 'MJ CUNHA', 'Major', '', 'c20ad4d76fe97759aa27a0c99bff6710', 59.45),
(57, 'MJ EVERALDO LIMA', 'Major', '', 'c20ad4d76fe97759aa27a0c99bff6710', 3.5);

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
(176, 25, 'Compras', 15.48, '2019-09-03 15:29:53'),
(177, 55, 'Compras', 2, '2019-09-04 13:42:15'),
(178, 55, 'Compras', 11, '2019-09-04 13:42:30'),
(179, 55, 'Compras', 3, '2019-09-04 13:42:43'),
(180, 55, 'Compras', 2.5, '2019-09-04 13:42:58'),
(181, 55, 'Compras', 7.5, '2019-09-04 13:43:10'),
(182, 55, 'Compras', 22.28, '2019-09-04 13:43:24'),
(183, 55, 'Compras', 12, '2019-09-04 13:44:05'),
(184, 55, 'Compras', 10, '2019-09-04 13:44:19'),
(185, 54, 'Compras', 6.5, '2019-09-04 13:45:31'),
(186, 54, 'Compras', 3, '2019-09-04 13:45:42'),
(187, 54, 'Compras', 20.28, '2019-09-04 13:46:01'),
(188, 54, 'Compras', 5, '2019-09-04 13:46:17'),
(189, 54, 'Compras', 16.44, '2019-09-04 13:46:31'),
(190, 54, 'Compras', 8.5, '2019-09-04 13:47:02'),
(191, 54, 'Compras', 19.58, '2019-09-04 13:47:30'),
(192, 54, 'Compras', 8, '2019-09-04 13:47:53'),
(193, 54, 'Compras', 21.27, '2019-09-04 13:48:40'),
(194, 54, 'Compras', 3.5, '2019-09-04 13:49:14'),
(195, 54, 'Compras', 1.5, '2019-09-04 13:49:28'),
(196, 54, 'Compras', 8, '2019-09-04 13:49:58'),
(197, 54, 'Compras', 3, '2019-09-04 13:50:13'),
(198, 54, 'Compras', 19.52, '2019-09-04 13:50:30'),
(199, 54, 'Compras', 18.01, '2019-09-04 13:50:57'),
(200, 54, 'Compras', 8.5, '2019-09-04 13:51:22'),
(201, 54, 'Compras', 10, '2019-09-04 13:51:42'),
(202, 54, 'Compras', 6, '2019-09-04 13:52:39'),
(203, 54, 'Compras', 6, '2019-09-04 13:52:54'),
(204, 54, 'Compras', 19.13, '2019-09-04 13:53:09'),
(205, 49, 'Compras', 17.64, '2019-09-04 13:53:48'),
(206, 49, 'Compras', 3, '2019-09-04 13:54:07'),
(207, 49, 'Compras', 3.5, '2019-09-04 13:54:14'),
(208, 49, 'Compras', 20.93, '2019-09-04 13:54:31'),
(209, 49, 'Compras', 23.32, '2019-09-04 13:54:45'),
(210, 49, 'Compras', 10.58, '2019-09-04 13:55:00'),
(211, 49, 'Compras', 3.5, '2019-09-04 13:55:30'),
(212, 49, 'Compras', 7.5, '2019-09-04 13:56:00'),
(213, 49, 'Compras', 5.5, '2019-09-04 13:56:11'),
(214, 49, 'Compras', 6.5, '2019-09-04 13:56:31'),
(215, 49, 'Compras', 18.43, '2019-09-04 13:57:01'),
(216, 49, 'Compras', 5, '2019-09-04 13:57:14'),
(217, 49, 'Compras', 2.5, '2019-09-04 13:57:36'),
(218, 49, 'Compras', 21.88, '2019-09-04 13:57:54'),
(219, 49, 'Compras', 1.5, '2019-09-04 13:58:08'),
(220, 49, 'Compras', 6, '2019-09-04 13:58:27'),
(221, 49, 'Compras', 2.5, '2019-09-04 13:58:43'),
(222, 49, 'Compras', 6.5, '2019-09-04 13:59:06'),
(223, 49, 'Compras', 18.8, '2019-09-04 13:59:25'),
(224, 49, 'Compras', 3.5, '2019-09-04 13:59:44'),
(225, 49, 'Compras', 14.69, '2019-09-04 13:59:57'),
(226, 49, 'Compras', 4.5, '2019-09-04 14:00:17'),
(227, 49, 'Compras', 5, '2019-09-04 14:00:30'),
(228, 50, 'Compras', 15, '2019-09-04 14:01:16'),
(229, 50, 'Compras', 14.97, '2019-09-04 14:01:30'),
(230, 50, 'Compras', 6, '2019-09-04 14:01:39'),
(231, 50, 'Compras', 3, '2019-09-04 14:01:59'),
(232, 50, 'Compras', 15.8, '2019-09-04 14:02:27'),
(233, 50, 'Compras', 8, '2019-09-04 14:05:26'),
(234, 50, 'Compras', 13, '2019-09-04 14:05:55'),
(235, 50, 'Compras', 20.67, '2019-09-04 14:06:07'),
(236, 50, 'Compras', 11.5, '2019-09-04 14:06:30'),
(237, 50, 'Compras', 13, '2019-09-04 14:06:57'),
(238, 50, 'Compras', 6, '2019-09-04 14:07:29'),
(239, 50, 'Compras', 11, '2019-09-04 14:07:43'),
(240, 50, 'Compras', 18.36, '2019-09-04 14:07:54'),
(241, 50, 'Compras', 10, '2019-09-04 14:08:09'),
(242, 50, 'Compras', 20.15, '2019-09-04 14:08:27'),
(243, 50, 'Compras', 8, '2019-09-04 14:08:46'),
(244, 53, 'Compras', 27, '2019-09-04 14:09:25'),
(245, 53, 'Compras', 6, '2019-09-04 14:09:39'),
(246, 53, 'Compras', 7.5, '2019-09-04 14:09:59'),
(247, 53, 'Compras', 10.5, '2019-09-04 14:10:25'),
(248, 53, 'Compras', 13, '2019-09-04 14:10:41'),
(249, 53, 'Compras', 5.5, '2019-09-04 14:11:05'),
(250, 53, 'Compras', 5.5, '2019-09-04 14:11:23'),
(251, 52, 'Compras', 5.5, '2019-09-04 14:12:25'),
(252, 52, 'Compras', 3, '2019-09-04 14:12:47'),
(253, 52, 'Compras', 19.36, '2019-09-04 14:13:00'),
(254, 52, 'Compras', 21.34, '2019-09-04 14:13:12'),
(255, 52, 'Compras', 4.5, '2019-09-04 14:13:23'),
(256, 52, 'Compras', 3.5, '2019-09-04 14:13:38'),
(257, 52, 'Compras', 3.5, '2019-09-04 14:13:59'),
(258, 52, 'Compras', 6.5, '2019-09-04 14:14:15'),
(259, 52, 'Compras', 4.5, '2019-09-04 14:14:26'),
(260, 52, 'Compras', 4.5, '2019-09-04 14:14:39'),
(261, 52, 'Compras', 8, '2019-09-04 14:14:58'),
(262, 52, 'Compras', 27.16, '2019-09-04 14:15:11'),
(263, 51, 'Compras', 3.5, '2019-09-04 14:16:06'),
(264, 51, 'Compras', 19.23, '2019-09-04 14:16:18'),
(265, 51, 'Compras', 12.92, '2019-09-04 14:16:32'),
(266, 48, 'Compras', 25, '2019-09-04 14:17:03'),
(267, 48, 'Compras', 8, '2019-09-04 14:17:15'),
(268, 48, 'Compras', 17.47, '2019-09-04 14:17:30'),
(269, 48, 'Compras', 14.5, '2019-09-04 14:17:42'),
(270, 48, 'Compras', 31.45, '2019-09-04 14:17:57'),
(271, 48, 'Compras', 19.64, '2019-09-04 14:18:09'),
(272, 48, 'Compras', 10.5, '2019-09-04 14:18:24'),
(273, 48, 'Compras', 11.5, '2019-09-04 14:18:38'),
(274, 48, 'Compras', 6, '2019-09-04 14:18:48'),
(275, 48, 'Compras', 1.5, '2019-09-04 14:19:02'),
(276, 48, 'Compras', 22.59, '2019-09-04 14:19:22'),
(277, 48, 'Compras', 6, '2019-09-04 14:19:36'),
(278, 48, 'Compras', 9, '2019-09-04 14:19:47'),
(279, 47, 'Compras', 16, '2019-09-04 14:20:18'),
(280, 47, 'Compras', 10.5, '2019-09-04 14:20:34'),
(281, 47, 'Compras', 14, '2019-09-04 14:20:47'),
(282, 47, 'Compras', 8, '2019-09-04 14:20:57'),
(283, 47, 'Compras', 10.5, '2019-09-04 14:21:09'),
(284, 47, 'Compras', 10, '2019-09-04 14:21:18'),
(285, 47, 'Compras', 14, '2019-09-04 14:21:27'),
(286, 47, 'Compras', 11, '2019-09-04 14:21:38'),
(287, 47, 'Compras', 17, '2019-09-04 14:21:50'),
(288, 47, 'Compras', 8, '2019-09-04 14:22:01'),
(289, 46, 'Compras', 8, '2019-09-04 14:22:53'),
(290, 46, 'Compras', 7.5, '2019-09-04 14:23:07'),
(291, 45, 'Compras', 9, '2019-09-04 14:23:55'),
(292, 45, 'Compras', 6, '2019-09-04 14:24:04'),
(293, 44, 'Compras', 3, '2019-09-04 14:24:43'),
(295, 43, 'Compras', 14, '2019-09-04 14:29:22'),
(296, 43, 'Compras', 16, '2019-09-04 14:29:31'),
(297, 43, 'Compras', 8, '2019-09-04 14:29:48'),
(298, 57, 'Compras', 3.5, '2019-09-04 14:34:41'),
(299, 56, 'Compras', 1.5, '2019-09-04 14:35:32'),
(300, 56, 'Compras', 13.76, '2019-09-04 14:35:43'),
(301, 56, 'Compras', 4.5, '2019-09-04 14:35:57'),
(302, 56, 'Compras', 10.43, '2019-09-04 14:36:14'),
(303, 56, 'Compras', 6.5, '2019-09-04 14:36:34'),
(304, 56, 'Compras', 16.76, '2019-09-04 14:36:53'),
(305, 56, 'Compras', 6, '2019-09-04 14:37:10');

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT de tabela `uh46v_postagens`
--
ALTER TABLE `uh46v_postagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
