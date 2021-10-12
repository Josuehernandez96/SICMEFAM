-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-01-2020 a las 02:36:05
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sicmedic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbitacora`
--

CREATE TABLE `tbitacora` (
  `idbitacora` int(11) NOT NULL,
  `fecha_hora_accion` datetime NOT NULL,
  `accion_bitacora` varchar(200) NOT NULL,
  `modulo_bitacora` varchar(20) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbitacora`
--

INSERT INTO `tbitacora` (`idbitacora`, `fecha_hora_accion`, `accion_bitacora`, `modulo_bitacora`, `idusuario`) VALUES
(2, '2019-11-07 04:21:22', 'INICIO DE SESION', 'LOGIN', 1),
(3, '2019-11-22 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(4, '2019-11-22 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(5, '2019-11-22 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(6, '2019-11-22 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(7, '2019-11-22 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(8, '2019-11-22 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(9, '2019-11-22 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(10, '2019-11-22 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(11, '2019-11-22 00:00:00', 'Inicio de sesión', 'LOGIN', 2),
(12, '2019-11-22 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(13, '2019-11-22 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(14, '2019-11-22 00:00:00', 'Inicio de sesión', 'LOGIN', 2),
(15, '2019-11-22 00:00:00', 'Inicio de sesión', 'LOGIN', 2),
(16, '2019-11-22 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(17, '2019-11-22 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(18, '2019-11-22 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(19, '2019-11-22 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(20, '2019-11-22 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(21, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(22, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(23, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(24, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(25, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(26, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(27, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(28, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(29, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(30, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(31, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(32, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 2),
(33, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(34, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 2),
(35, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(36, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(37, '2019-11-23 15:33:00', 'Cierre de sesión', 'LOGIN', 1),
(38, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(39, '2019-11-23 15:36:00', 'Cierre de sesión', 'LOGIN', 1),
(40, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(41, '2019-11-23 15:41:00', 'Cierre de sesión', 'LOGIN', 1),
(42, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(43, '2019-11-23 15:43:00', 'Cierre de sesión', 'LOGIN', 1),
(44, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(45, '2019-11-23 15:44:00', 'Cierre de sesión', 'LOGIN', 1),
(46, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(47, '2019-11-23 15:45:00', 'Cierre de sesión', 'LOGIN', 1),
(48, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(49, '2019-11-23 15:46:00', 'Cierre de sesión', 'LOGIN', 1),
(50, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 2),
(51, '2019-11-23 15:48:00', 'Cierre de sesión', 'LOGIN', 2),
(52, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 2),
(53, '2019-11-23 15:49:00', 'Cierre de sesión', 'LOGIN', 2),
(54, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(55, '2019-11-23 18:48:00', 'Cierre de sesión', 'LOGIN', 1),
(56, '2019-11-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(57, '2019-11-24 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(58, '2019-11-24 17:20:00', 'Cierre de sesión', 'LOGIN', 1),
(59, '2019-11-24 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(60, '2019-11-24 17:24:00', 'Cierre de sesión', 'LOGIN', 1),
(61, '2019-11-24 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(62, '2019-11-24 17:29:00', 'Cierre de sesión', 'LOGIN', 1),
(63, '2019-11-24 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(64, '2019-11-24 17:29:00', 'Cierre de sesión', 'LOGIN', 1),
(65, '2019-11-24 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(66, '2019-11-24 17:30:00', 'Cierre de sesión', 'LOGIN', 1),
(67, '2019-11-25 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(68, '2019-11-25 10:14:00', 'Cierre de sesión', 'LOGIN', 1),
(69, '2019-11-25 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(70, '2019-11-25 10:16:00', 'Cierre de sesión', 'LOGIN', 1),
(71, '2019-11-25 00:00:00', 'Inicio de sesión', 'LOGIN', 2),
(72, '2019-11-25 10:17:00', 'Cierre de sesión', 'LOGIN', 2),
(73, '2019-11-25 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(74, '2019-11-25 10:20:00', 'Cierre de sesión', 'LOGIN', 1),
(75, '2019-11-25 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(76, '2019-11-25 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(77, '2019-11-25 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(78, '2019-11-25 13:50:00', 'Cierre de sesión', 'LOGIN', 1),
(79, '2019-11-26 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(80, '2019-11-26 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(81, '2019-11-26 14:01:00', 'Cierre de sesión', 'LOGIN', 1),
(82, '2019-11-26 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(83, '2019-11-26 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(84, '2019-11-26 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(85, '2019-11-27 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(86, '2019-11-27 08:08:00', 'Cierre de sesión', 'LOGIN', 1),
(87, '2019-11-27 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(88, '2019-11-27 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(89, '2019-11-28 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(90, '2019-11-28 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(91, '2019-11-28 13:06:00', 'Cierre de sesión', 'LOGIN', 1),
(92, '2019-11-28 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(93, '2019-11-28 14:23:00', 'Cierre de sesión', 'LOGIN', 1),
(94, '2019-11-28 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(95, '2019-11-29 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(96, '2019-11-29 09:34:00', 'Cierre de sesión', 'LOGIN', 1),
(97, '2019-11-29 00:00:00', 'Inicio de sesión', 'LOGIN', 2),
(98, '2019-11-29 09:36:00', 'Cierre de sesión', 'LOGIN', 2),
(99, '2019-11-29 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(100, '2019-11-29 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(101, '2019-11-29 10:06:00', 'Cierre de sesión', 'LOGIN', 1),
(102, '2019-11-29 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(103, '2019-11-29 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(104, '2019-11-29 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(105, '2019-11-29 18:07:00', 'Cierre de sesión', 'LOGIN', 1),
(106, '2019-11-29 00:00:00', 'Inicio de sesión', 'LOGIN', 3),
(107, '2019-11-30 00:00:00', 'Inicio de sesión', 'LOGIN', 5),
(108, '2019-11-30 08:59:00', 'Cierre de sesión', 'LOGIN', 5),
(109, '2019-11-30 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(110, '2019-11-30 08:59:00', 'Cierre de sesión', 'LOGIN', 1),
(111, '2019-11-30 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(112, '2019-11-30 08:59:00', 'Cierre de sesión', 'LOGIN', 1),
(113, '2019-11-30 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(114, '2019-11-30 09:00:00', 'Cierre de sesión', 'LOGIN', 1),
(115, '2019-11-30 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(116, '2019-11-30 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(117, '2019-11-30 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(118, '2019-12-01 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(119, '2019-12-01 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(120, '2019-12-01 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(121, '2019-12-01 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(122, '2019-12-01 18:52:00', 'Cierre de sesión', 'LOGIN', 1),
(123, '2019-12-01 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(124, '2019-12-01 18:53:00', 'Cierre de sesión', 'LOGIN', 1),
(125, '2019-12-01 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(126, '2019-12-01 19:24:00', 'Cierre de sesión', 'LOGIN', 1),
(127, '2019-12-01 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(128, '2019-12-01 19:25:00', 'Cierre de sesión', 'LOGIN', 1),
(129, '2019-12-01 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(130, '2019-12-01 19:25:00', 'Cierre de sesión', 'LOGIN', 1),
(131, '2019-12-01 00:00:00', 'Inicio de sesión', 'LOGIN', 2),
(132, '2019-12-01 19:32:00', 'Cierre de sesión', 'LOGIN', 2),
(133, '2019-12-01 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(134, '2019-12-01 19:44:00', 'Cierre de sesión', 'LOGIN', 1),
(135, '2019-12-01 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(136, '2019-12-01 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(137, '2019-12-02 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(138, '2019-12-02 07:40:00', 'Cierre de sesión', 'LOGIN', 1),
(139, '2019-12-02 00:00:00', 'Inicio de sesión', 'LOGIN', 2),
(140, '2019-12-02 07:42:00', 'Cierre de sesión', 'LOGIN', 2),
(141, '2019-12-02 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(142, '2019-12-02 07:55:00', 'Cierre de sesión', 'LOGIN', 1),
(143, '2019-12-02 00:00:00', 'Inicio de sesión', 'LOGIN', 2),
(144, '2019-12-02 07:57:00', 'Cierre de sesión', 'LOGIN', 2),
(145, '2019-12-02 00:00:00', 'Inicio de sesión', 'LOGIN', 2),
(146, '2019-12-02 08:01:00', 'Cierre de sesión', 'LOGIN', 2),
(147, '2019-12-02 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(148, '2019-12-02 08:01:00', 'Cierre de sesión', 'LOGIN', 1),
(149, '2019-12-02 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(150, '2019-12-02 08:14:00', 'Cierre de sesión', 'LOGIN', 1),
(151, '2019-12-03 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(152, '2019-12-07 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(153, '2019-12-07 12:23:00', 'Cierre de sesión', 'LOGIN', 1),
(154, '2019-12-07 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(155, '2019-12-07 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(156, '2019-12-07 12:36:00', 'Cierre de sesión', 'LOGIN', 1),
(157, '2019-12-07 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(158, '2019-12-07 12:36:00', 'Cierre de sesión', 'LOGIN', 1),
(159, '2019-12-07 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(160, '2019-12-07 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(161, '2019-12-07 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(162, '2019-12-07 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(163, '2019-12-07 12:37:00', 'Cierre de sesión', 'LOGIN', 1),
(164, '2019-12-07 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(165, '2019-12-07 12:43:00', 'Cierre de sesión', 'LOGIN', 1),
(166, '2019-12-07 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(167, '2019-12-07 12:44:00', 'Cierre de sesión', 'LOGIN', 1),
(168, '2019-12-07 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(169, '2019-12-07 12:46:00', 'Cierre de sesión', 'LOGIN', 1),
(170, '2019-12-10 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(171, '2019-12-10 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(172, '2019-12-12 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(173, '2019-12-12 00:00:00', 'Inicio de sesión', 'LOGIN', 2),
(174, '2019-12-12 09:24:00', 'Cierre de sesión', 'LOGIN', 2),
(175, '2019-12-12 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(176, '2019-12-12 09:33:00', 'Cierre de sesión', 'LOGIN', 1),
(177, '2019-12-12 00:00:00', 'Inicio de sesión', 'LOGIN', 2),
(178, '2019-12-12 00:00:00', 'Inicio de sesión', 'LOGIN', 2),
(179, '2019-12-12 00:00:00', 'Inicio de sesión', 'LOGIN', 2),
(180, '2019-12-12 10:02:00', 'Cierre de sesión', 'LOGIN', 2),
(181, '2019-12-12 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(182, '2019-12-12 10:03:00', 'Cierre de sesión', 'LOGIN', 1),
(183, '2019-12-12 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(184, '2019-12-12 15:09:00', 'Cierre de sesión', 'LOGIN', 1),
(185, '2019-12-12 00:00:00', 'Inicio de sesión', 'LOGIN', 2),
(186, '2019-12-12 15:10:00', 'Cierre de sesión', 'LOGIN', 2),
(187, '2019-12-12 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(188, '2019-12-12 15:34:00', 'Cierre de sesión', 'LOGIN', 1),
(189, '2019-12-12 00:00:00', 'Inicio de sesión', 'LOGIN', 2),
(190, '2019-12-12 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(191, '2019-12-13 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(192, '2019-12-13 08:49:00', 'Cierre de sesión', 'LOGIN', 1),
(193, '2019-12-13 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(194, '2019-12-13 08:50:00', 'Cierre de sesión', 'LOGIN', 1),
(195, '2019-12-13 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(196, '2019-12-14 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(197, '2019-12-17 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(198, '2019-12-17 14:20:00', 'Cierre de sesión', 'LOGIN', 1),
(199, '2019-12-17 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(200, '2019-12-18 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(201, '2019-12-21 00:00:00', 'Inicio de sesión', 'LOGIN', 2),
(202, '2019-12-21 19:44:00', 'Cierre de sesión', 'LOGIN', 2),
(203, '2019-12-21 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(204, '2019-12-23 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(205, '2019-12-25 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(206, '2019-12-26 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(207, '2019-12-27 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(208, '2019-12-27 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(209, '2019-12-27 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(210, '2019-12-27 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(211, '2019-12-27 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(212, '2019-12-28 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(213, '2019-12-28 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(214, '2019-12-29 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(215, '2019-12-29 00:00:00', 'Inicio de sesión', 'LOGIN', 1),
(216, '2019-12-30 00:00:00', 'Inicio de sesión', 'LOGIN', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcita`
--

CREATE TABLE `tcita` (
  `idcita` int(11) NOT NULL,
  `idpaciente` int(11) DEFAULT NULL,
  `nombre_citado` varchar(50) NOT NULL,
  `telefono_citado` varchar(10) NOT NULL,
  `fecha_hora_cita` datetime NOT NULL,
  `estado_cita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tcita`
--

INSERT INTO `tcita` (`idcita`, `idpaciente`, `nombre_citado`, `telefono_citado`, `fecha_hora_cita`, `estado_cita`) VALUES
(1, 1, '', '', '2019-11-17 12:00:00', 0),
(2, 2, '', '', '2019-11-17 13:00:00', 0),
(3, 4, '', '', '2019-11-17 14:00:00', 0),
(4, NULL, 'MIGUELA ALEJANDRA MOISES MARAVILLA', '7122-4443', '2019-11-17 13:00:00', 0),
(5, NULL, 'MIGUELA ALEJANDRA MOISES MARAVILLA', '7979-2997', '2019-11-17 16:00:00', 0),
(6, NULL, 'CRISTIAN RENE BELTRAN BONILLA', '7979-2997', '2019-11-17 17:00:00', 0),
(7, 11, '', '', '2019-11-17 07:00:00', 0),
(8, 7, '', '', '2019-11-17 12:45:00', 0),
(9, NULL, 'JOSE FRANCISCO AREVALO CORDOVA', '', '2019-11-17 10:30:00', 0),
(10, 10, '', '', '2019-11-17 08:15:00', 0),
(11, 12, '', '', '2019-11-17 15:30:00', 0),
(12, 14, '', '', '2019-11-17 13:30:00', 0),
(13, 14, '', '', '2019-11-18 12:00:00', 0),
(14, 2, '', '', '2019-11-19 12:00:00', 0),
(15, 1, '', '', '2019-11-17 08:30:00', 0),
(16, 8, '', '', '2019-11-21 12:00:00', 0),
(17, NULL, 'DANIEL', '9797-9708', '2019-11-29 12:00:00', 0),
(18, 4, '', '', '2019-11-18 12:00:00', 0),
(19, 4, '', '', '2019-11-18 14:00:00', 0),
(20, 10, '', '', '2019-11-18 15:00:00', 0),
(21, NULL, 'DAVID', '7979-7908', '2019-11-18 13:00:00', 0),
(22, 4, '', '', '2019-11-18 13:00:00', 2),
(23, 2, '', '', '2019-11-19 12:00:00', 2),
(24, 1, '', '', '2019-11-22 13:00:00', 1),
(25, NULL, 'JOSE ELIEZER FLORES CACERES', '7291-3748', '2019-11-23 02:45:00', 1),
(26, NULL, 'DAVID FLORES GUZMAN', '7868-7678', '2019-11-24 12:00:00', 1),
(27, 1, '', '', '2019-11-24 13:00:00', 1),
(28, 1, '', '', '2019-11-25 12:45:00', 1),
(29, 1, '', '', '2019-11-27 12:00:00', 1),
(30, NULL, 'DAVID FLORES GUZMAN', '7978-7979', '2019-11-27 13:00:00', 1),
(31, 1, '', '', '2019-11-29 12:00:00', 1),
(32, NULL, 'DAVID', '7927-9112', '2019-11-30 12:00:00', 1),
(33, 1, '', '', '2019-11-30 13:00:00', 1),
(34, 1, '', '', '2019-12-01 12:00:00', 1),
(35, 2, '', '', '2019-12-02 12:00:00', 1),
(36, 1, '', '', '2019-12-12 12:00:00', 1),
(37, 4, '', '', '2019-12-17 17:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tconsulta`
--

CREATE TABLE `tconsulta` (
  `idconsulta` int(11) NOT NULL,
  `idpaciente` int(11) NOT NULL,
  `fecha_hora_consulta` datetime NOT NULL,
  `razon_consulta` text NOT NULL,
  `antecedentes_consulta` text NOT NULL,
  `diagnostico_consutla` text NOT NULL,
  `observaciones_consulta` text NOT NULL,
  `ordenexamen_consulta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tconsulta`
--

INSERT INTO `tconsulta` (`idconsulta`, `idpaciente`, `fecha_hora_consulta`, `razon_consulta`, `antecedentes_consulta`, `diagnostico_consutla`, `observaciones_consulta`, `ordenexamen_consulta`) VALUES
(2, 10, '2019-12-29 09:48:21', 'aaaaaaaa', 'aaa', 'aaa', 'aaaaa', 'aaaaa'),
(3, 13, '2019-12-29 09:52:49', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa'),
(4, 13, '2019-12-29 09:53:05', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa'),
(5, 13, '2019-12-29 09:58:17', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa'),
(6, 13, '2019-12-29 09:59:50', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa'),
(7, 13, '2019-12-29 10:00:19', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa'),
(8, 13, '2019-12-29 10:03:39', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa'),
(9, 13, '2019-12-29 10:04:34', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa'),
(10, 13, '2019-12-29 10:05:02', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa'),
(11, 13, '2019-12-29 10:06:06', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa'),
(12, 13, '2019-12-29 10:06:11', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa'),
(13, 13, '2019-12-29 10:12:48', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa'),
(14, 13, '2019-12-29 10:13:59', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa'),
(15, 13, '2019-12-29 10:15:55', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa'),
(16, 23, '2019-12-29 15:18:17', 'POR FIEBRE,DOLOR EN EL PECHO,NAUSIAS', 'HIPERTENSION', 'EL PACIENTE SUFRE DE HIPERTENCION....ETC', 'EL PACIENTE PRESENTABA CANSANCIO Y MAREOS', 'EXAMEN DE SANGRE,EXAMEN DE CREATININA'),
(17, 23, '2019-12-29 15:18:32', 'POR FIEBRE,DOLOR EN EL PECHO,NAUSIAS', 'HIPERTENSION', 'EL PACIENTE SUFRE DE HIPERTENCION....ETC', 'EL PACIENTE PRESENTABA CANSANCIO Y MAREOS', 'EXAMEN DE SANGRE,EXAMEN DE CREATININA'),
(18, 23, '2019-12-29 15:19:05', 'POR FIEBRE,DOLOR EN EL PECHO,NAUSIAS', 'HIPERTENSION', 'EL PACIENTE SUFRE DE HIPERTENCION....ETC', 'EL PACIENTE PRESENTABA CANSANCIO Y MAREOS', 'EXAMEN DE SANGRE,EXAMEN DE CREATININA'),
(19, 23, '2019-12-29 15:19:13', 'POR FIEBRE,DOLOR EN EL PECHO,NAUSIAS', 'HIPERTENSION', 'EL PACIENTE SUFRE DE HIPERTENCION....ETC', 'EL PACIENTE PRESENTABA CANSANCIO Y MAREOS', 'EXAMEN DE SANGRE,EXAMEN DE CREATININA'),
(20, 23, '2019-12-29 15:20:09', 'POR FIEBRE,DOLOR EN EL PECHO,NAUSIAS', 'HIPERTENSION', 'EL PACIENTE SUFRE DE HIPERTENCION....ETC', 'EL PACIENTE PRESENTABA CANSANCIO Y MAREOS', 'EXAMEN DE SANGRE,EXAMEN DE CREATININA'),
(21, 12, '2019-12-29 15:29:59', '', '', '', '', ''),
(22, 12, '2019-12-29 15:31:39', '', '', '', '', ''),
(23, 12, '2019-12-29 15:32:08', '', '', '', '', ''),
(24, 12, '2019-12-29 15:32:09', '', '', '', '', ''),
(25, 23, '2019-12-30 15:23:45', 'DOLOR DE CABEZA', 'HIPERTENSO', 'DADKASKHKAHDHLAHDHDHJLSHDLJAHDJLHDJLA', 'EL PACIENTE CHELIABA LOS JOJOS', 'EXAMEN DE LA CABEZA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `texamen`
--

CREATE TABLE `texamen` (
  `idexamen` int(11) NOT NULL,
  `ruta_imagen` varchar(100) NOT NULL,
  `idconsulta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `texamen`
--

INSERT INTO `texamen` (`idexamen`, `ruta_imagen`, `idconsulta`) VALUES
(1, 'expediente/RF12/image-1.jpg', 14),
(2, 'expediente/RF12/image-2.jpg', 14),
(3, 'expediente/RF12/image-3.jpg', 14),
(4, 'expediente/RF12/image-4.jpg', 14),
(5, 'expediente/RF12/image-1.jpg', 15),
(6, 'expediente/RF12/image-2.jpg', 15),
(7, 'expediente/RF12/image-3.jpg', 15),
(8, 'expediente/RF12/image-4.jpg', 15),
(9, 'expediente/EG022/image-1.jpg', 17),
(10, 'expediente/EG022/image-2.jpg', 17),
(11, 'expediente/EG022/image-3.jpg', 17),
(12, 'expediente/EG022/image-4.jpg', 17),
(13, 'expediente/EG022/image-5.jpg', 17),
(14, 'expediente/EG022/image-1.jpg', 19),
(15, 'expediente/EG022/image-2.jpg', 19),
(16, 'expediente/EG022/image-3.jpg', 19),
(17, 'expediente/EG022/image-4.jpg', 19),
(18, 'expediente/EG022/image-5.jpg', 19),
(19, 'expediente/EG022/image-1.jpg', 20),
(20, 'expediente/EG022/image-1.jpg', 20),
(21, 'expediente/EG022/image-2.jpg', 20),
(22, 'expediente/EG022/image-2.jpg', 20),
(23, 'expediente/EG022/image-3.jpg', 20),
(24, 'expediente/EG022/image-3.jpg', 20),
(25, 'expediente/EG022/image-4.jpg', 20),
(26, 'expediente/EG022/image-4.jpg', 20),
(27, 'expediente/EG022/image-5.jpg', 20),
(28, 'expediente/EG022/image-5.jpg', 20),
(29, 'expediente/JF011/image-1.jpg', 22),
(30, 'expediente/JF011/image-2.jpg', 22),
(31, 'expediente/JF011/image-3.jpg', 22),
(32, 'expediente/JF011/image-4.jpg', 22),
(33, 'expediente/JF011/image-5.jpg', 22),
(34, 'expediente/JF011/image-1.jpg', 23),
(35, 'expediente/JF011/image-2.jpg', 23),
(36, 'expediente/JF011/image-3.jpg', 23),
(37, 'expediente/JF011/image-4.jpg', 23),
(38, 'expediente/JF011/image-5.jpg', 23),
(39, 'expediente/JF011/image-1.jpg', 24),
(40, 'expediente/JF011/image-2.jpg', 24),
(41, 'expediente/JF011/image-3.jpg', 24),
(42, 'expediente/JF011/image-4.jpg', 24),
(43, 'expediente/JF011/image-5.jpg', 24),
(44, 'expediente/EG022/image-1.jpg', 25),
(45, 'expediente/EG022/image-2.jpg', 25),
(46, 'expediente/EG022/image-3.jpg', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tinventario_medicamento`
--

CREATE TABLE `tinventario_medicamento` (
  `idreferencia_medicamento` int(11) NOT NULL,
  `idmedicamento` int(11) NOT NULL,
  `fecha_ingreso_medicamento` date NOT NULL,
  `fecha_vencim_medicamento` date NOT NULL,
  `cantidad_medicamento` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tinventario_medicamento`
--

INSERT INTO `tinventario_medicamento` (`idreferencia_medicamento`, `idmedicamento`, `fecha_ingreso_medicamento`, `fecha_vencim_medicamento`, `cantidad_medicamento`, `idproveedor`, `ubicacion`, `estado`) VALUES
(11, 1, '2019-11-29', '2020-01-15', 50, 1, 'Estante A', 1),
(12, 1, '2019-11-29', '2020-03-12', 50, 1, 'Estante A', 1),
(13, 2, '2019-11-29', '2020-02-07', 50, 1, 'Estante A', 1),
(14, 2, '2019-11-29', '2020-02-20', 50, 1, 'Estante A', 1),
(15, 3, '2019-11-29', '2020-04-16', 100, 1, 'ESTANTE A', 1),
(16, 3, '2019-11-29', '2020-07-17', 100, 1, 'ESTANTE A', 1),
(17, 1, '2019-12-01', '2019-12-01', 123, 1, 'ESTANTE 3', 1),
(18, 3, '2019-12-02', '2019-12-27', 300, 1, 'ESTANTE A', 1),
(19, 4, '2019-12-02', '2019-12-27', 30, 1, 'ESTATNTE 3', 1),
(20, 5, '2019-12-13', '2019-12-25', 25, 1, 'ESTANTE 2', 1),
(21, 3, '2019-12-13', '2019-12-13', 200, 1, 'ESTANTE A', 1),
(22, 6, '2019-12-28', '2021-05-12', 50, 2, 'ESTANTE 1 ASPIRINAS', 1),
(23, 6, '2019-12-28', '2019-12-13', 200, 1, 'ESTANTE 2', 1),
(24, 6, '2019-12-28', '2019-12-03', 28, 1, 'ESTANTE 2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmedicamento`
--

CREATE TABLE `tmedicamento` (
  `idmedicamento` int(11) NOT NULL,
  `nombre_medicamento` varchar(50) NOT NULL,
  `presentacion_medicamento` varchar(50) NOT NULL,
  `via_admin_medicamento` varchar(50) NOT NULL,
  `concentracion_medicamento` varchar(50) NOT NULL,
  `stock_minimo_medicamento` int(11) NOT NULL,
  `unidad` varchar(3) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tmedicamento`
--

INSERT INTO `tmedicamento` (`idmedicamento`, `nombre_medicamento`, `presentacion_medicamento`, `via_admin_medicamento`, `concentracion_medicamento`, `stock_minimo_medicamento`, `unidad`, `estado`) VALUES
(1, 'Paracetamol 1', 'capsula', 'intravenosos', '150', 5, 'mg', 0),
(2, 'Paracetamol', 'pastilla', 'Oral', '300', 5, 'mg', 0),
(3, 'PARACETAMOL MK', 'pastilla', 'orales', '500', 5, 'mg', 1),
(4, 'ASPIRINA', 'pastilla', 'orales', '500', 5, 'mg', 1),
(5, 'ASPIRINA FORTE', 'pastilla', 'orales', '500', 10, 'mg', 1),
(6, 'CARDIASPIRINA', 'pastilla', 'orales', '500', 10, 'mg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpaciente`
--

CREATE TABLE `tpaciente` (
  `idpaciente` int(11) NOT NULL,
  `n_expediente` varchar(8) NOT NULL,
  `nombre_paciente` varchar(40) NOT NULL,
  `apellido_paciente` varchar(40) NOT NULL,
  `sexo_paciente` varchar(9) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `dui_paciente` varchar(10) NOT NULL,
  `correo_paciente` varchar(50) NOT NULL,
  `telefonop_paciente` varchar(10) NOT NULL,
  `telefonos_paciente` varchar(10) NOT NULL,
  `direccion_paciente` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tpaciente`
--

INSERT INTO `tpaciente` (`idpaciente`, `n_expediente`, `nombre_paciente`, `apellido_paciente`, `sexo_paciente`, `fecha_nacimiento`, `dui_paciente`, `correo_paciente`, `telefonop_paciente`, `telefonos_paciente`, `direccion_paciente`, `estado`) VALUES
(1, 'DF001', 'WILLIAN MARIAS', 'FLORES GUZMÁN', 'MASCULINO', '1960-01-08', '09089778-9', 'davidflores.guzman.dfg@gmail.net', '7291-3748', '6666-6666', 'colonia santa lucia providencia pasaje#3 casa#4', 1),
(2, 'FF002', 'FLOR DE MARIA', 'FLORES AYALA', 'FEMENINO', '2008-08-05', '', 'florflores.fg@gamil.com', '7817-9297', '', 'colonia santa lucia pasaje #2 casa#3', 1),
(4, 'DF003', 'JOSÉ DANIEL', 'CARCAMOS CORDOVAS', 'MASCULINO', '1985-04-21', '09182089-1', '', '7828-7287', '8727-8287', '', 1),
(5, 'HF004', 'HERMINA', 'FLORES GUZMAN', 'MASCULINO', '1972-11-04', '09808020-8', 'herminia.guzman@gmail.com', '8727-8287', '', 'colonia santa lucia casa#3', 1),
(6, 'CC005', 'CARLA SARAI', 'CARCAMO RODRIGUEZ', 'FEMENINO', '1997-05-21', '', '', '', '', '', 0),
(7, 'VC006', 'VICTOR ERNESTO', 'CACERES QUINTANILLA', 'MASCULINO', '2000-04-21', '', '', '', '', '', 1),
(8, 'JF007', 'JOSE ELIEZER', 'FLORES CACERES', 'MASCULINO', '1994-05-21', '00928080-3', '', '7297-2179', '0092-1902', '', 1),
(9, 'DC008', 'DANIEL JOSUE', 'CACERES PORTILLOS', 'MASCULINO', '1997-05-21', '09880182-0', 'danieporti@yahoo.es', '9821-8921', '7217-1279', '', 1),
(10, 'AF009', 'ANDREA', 'FLORES CORDOVA', 'FEMENINO', '1930-06-21', '09812802-1', 'andrea@gmail.com', '7727-2798', '7997-3973', '', 1),
(11, 'CC010', 'RENE ANTONIO', 'FRANCO DIAZ', 'MASCULINO', '1995-04-21', '09808108-2', 'carlanto@gmail.com', '7261-8268', '7912-8182', 'colonia santa lucia casa#3', 1),
(12, 'JF011', 'JOSE RODOLFO', 'FLORES', 'MASCULINO', '1974-05-21', '09812810-2', 'joserodo@gmail.com', '', '', '', 1),
(13, 'RF12', 'RAFAEL ANTONIO', 'FLORES RAMIREZ', 'MASCULINO', '1984-05-21', '', '', '', '', '', 1),
(14, 'CA013', 'CONCEPCION DE MARIA', 'AYALAG', 'FEMENINO', '1925-05-21', '', '', '', '', '', 1),
(15, 'DP014', 'DANIEL ALEXANDER', 'PEREZ MARTINEZ', 'MASCULINO', '1999-05-21', '09879797-9', 'danieperez@gmail.com', '', '', '', 1),
(16, 'JM015', 'JOSE ALEXANDER', 'MUÑOZ', 'MASCULINO', '1990-11-04', '', '', '', '', '', 1),
(17, 'EV016', 'EMILIA FRANCO', 'VARGAS DIAZ', 'FEMENINO', '1969-05-21', '09808038-0', 'emilivarga@gmail.com', '7291-9712', '7977-9971', 'colonia santa elena casa#3', 1),
(18, 'RM017', 'ROBERTO ANTONIO', 'MONTOYA ALVARADO', 'MASCULINO', '1980-05-21', '09808088-3', 'roberantronix@gmail.com', '7397-2379', '7397-2379', 'colonia agua caliente pasaje #3 casa#3', 0),
(19, 'SR018', 'SONIA ABIGAIL', 'RODRIGUÉZ CORDOVA', 'MASCULINO', '1955-05-21', '09830280-3', 'soniaabi@hotmail.com', '9797-2972', '9779-9729', '', 0),
(20, 'JQ019', 'JOSE CARLOS', 'QUINTANILLA AREVALOS', 'MASCULINO', '2013-11-12', '', '', '7792-7279', '7297-7919', '', 1),
(21, 'DF020', 'DAVID', 'FLORES GUZMÁN', 'MASCULINO', '1996-11-12', '09808080-8', 'davidflores.guz', '', '', '', 1),
(22, 'DF021', 'JOSE CARLOS', 'CORDOVA GONZALÉZ', 'MASCULINO', '1994-11-19', '09880884-3', 'davidflores.guzman.dfg@gmail.com', '7797-9397', '7379-7397', '', 1),
(23, 'EG022', 'EVA DE LOS ANGELES', 'GUZMAN AYALA', 'FEMENINO', '1975-05-12', '08120801-8', 'davidflores.guzman.dfg@hotmail.net', '8737-9379', '7971-9727', 'colonia espiga de oro', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproveedor`
--

CREATE TABLE `tproveedor` (
  `idproveedor` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tproveedor`
--

INSERT INTO `tproveedor` (`idproveedor`, `nombre`, `telefono`) VALUES
(1, 'LABORATORIO LOPEZ', '7666-4897'),
(2, 'LABORATORIO GAMNA', '4645-4645');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `treceta`
--

CREATE TABLE `treceta` (
  `idreceta` int(11) NOT NULL,
  `idmedicamento` int(11) NOT NULL,
  `nombre_medicamento` varchar(50) NOT NULL,
  `cantidad_entregada` int(11) NOT NULL,
  `cantidad_indicada` int(11) NOT NULL,
  `indicaciones` varchar(200) NOT NULL,
  `idconsulta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tresponsable`
--

CREATE TABLE `tresponsable` (
  `idresponsable` int(11) NOT NULL,
  `nombre_responsable` varchar(40) NOT NULL,
  `apellido_responsable` varchar(40) NOT NULL,
  `relacion_responsable` varchar(20) NOT NULL,
  `dui_responsable` varchar(10) NOT NULL,
  `telefonoP_responsable` varchar(9) NOT NULL,
  `telefonoS_responsable` varchar(9) NOT NULL,
  `idpaciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tresponsable`
--

INSERT INTO `tresponsable` (`idresponsable`, `nombre_responsable`, `apellido_responsable`, `relacion_responsable`, `dui_responsable`, `telefonoP_responsable`, `telefonoS_responsable`, `idpaciente`) VALUES
(1, 'ANDREA', 'FLORES CARCAMO', 'HIJO', '89898989-8', '2222-2222', '1111-1111', 1),
(2, 'HERMINIA', 'FLORES AYALA', 'MADRE', '', '7862-8628', '7927-9217', 2),
(3, 'EVA', 'GUZMAN AYALA', 'MADRE', '092929', '2732-2345', '8782-222', 4),
(4, 'asd', 'oo', 'ABUELO', '', '', '', 5),
(5, '', '', '', '', '', '', 6),
(6, 'DANIEL', 'QUINTANILLA', 'ABUELO', '', '7297-2972', '', 7),
(7, 'CRISANTOS', 'FLORES', 'PADRE', '', '9721-9721', '8797-2927', 8),
(8, 'FRANCISCA CARMELA', 'CACERES PORTILLO', 'MADRE', '', '7297-9129', '8918-8121', 9),
(9, 'JOSÉ RODOLFO', 'FLORES CASTILLO', 'ABUELA', '', '', '', 10),
(10, '', '', '', '', '', '', 11),
(11, 'ANDREA', 'FLORES CORDOVA', 'MADRE', '', '', '', 12),
(12, '', '', '', '', '', '', 13),
(13, 'HERMINIA', 'FLORES GUZMAN', 'ABUELA', '09802801-8', '8719-7297', '8218-2917', 14),
(14, 'SANDRA EMILIE', 'CARCAMO FERNADÉZ', 'MADRE', '09808098-0', '7262-7626', '8727-8282', 15),
(15, '', '', '', '', '', '', 16),
(16, 'MIRNA ELIZABETH', 'FRANCO CORDOVA', 'HIJO', '09801208-2', '7979-9737', '7937-2372', 17),
(17, '', '', '', '', '', '', 18),
(18, 'EVA DE LOS ANGELES', 'GUZMAN', 'MADRE', '09880238-2', '7397-3973', '7939-3973', 19),
(19, 'DANIEL', 'QUINTANILLA AREVALO', 'PADRE', '01298081-2', '7972-9712', '7917-9217', 20),
(20, '', '', '', '', '', '', 21),
(21, '', '', '', '', '', '', 22),
(22, 'DANIEL ALEXANDER', 'CHAVEZ', 'MADRE', '09828018-2', '7379-3973', '7939-7397', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsignosvitales`
--

CREATE TABLE `tsignosvitales` (
  `idsignovital` int(11) NOT NULL,
  `presion` varchar(6) NOT NULL,
  `frecuencia` varchar(5) NOT NULL,
  `temperatura` varchar(4) NOT NULL,
  `peso` int(11) NOT NULL,
  `estatura` int(11) NOT NULL,
  `idconsulta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tsignosvitales`
--

INSERT INTO `tsignosvitales` (`idsignovital`, `presion`, `frecuencia`, `temperatura`, `peso`, `estatura`, `idconsulta`) VALUES
(1, '200/12', '120 p', '27.5', 185, 185, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

CREATE TABLE `tusuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `contrasena` text NOT NULL,
  `correo` varchar(50) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `codigo_recuperacion` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fechacreacion` date NOT NULL,
  `nombrep` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`idusuario`, `nombre`, `contrasena`, `correo`, `tipo`, `codigo_recuperacion`, `estado`, `fechacreacion`, `nombrep`) VALUES
(1, 'ANALUISAVELA', 'TGRmT2E1Y0xWblV5TUgwOXpnZ2VDQT09', 'davidflores.guzman.dfg@gmail.es', 'admin', 0, 1, '2019-11-29', 'DR ANA LUISA VELAZQUEZ'),
(2, 'SECRE', 'TGRmT2E1Y0xWblV5TUgwOXpnZ2VDQT09', 'analuisavela@gmail.com', 'secret', 0, 1, '0000-00-00', 'MARIA HERMINIA CHAVEZ CORNEJO'),
(3, 'HERMINFLORES', 'aDZTbEIvdlBJOUY0NWIrUmR3RXhIdz09', 'herminiaguzman@gmail.es', 'admin', 0, 1, '2019-11-29', 'HERMINIA FLORES GUZMAN'),
(4, 'ANALUISA', 'TGRmT2E1Y0xWblV5TUgwOXpnZ2VDQT09', 'davidflores.guzman.dfg@gmail.com', 'admin', 0, 0, '2019-11-29', 'ANA LUISA VELAZQUEZ'),
(5, 'DADMIN', 'TGRmT2E1Y0xWblV5TUgwOXpnZ2VDQT09', 'davidflores.guzman,dfg@gmail.com', 'admin', 0, 0, '2019-11-29', 'DAVID FLORES'),
(10, 'MIGUELITO', 'TGRmT2E1Y0xWblV5TUgwOXpnZ2VDQT09', 'david@gmail.com', 'admin', 0, 0, '2019-12-02', 'MIGUEL'),
(11, 'emersonpalacios', 'TGRmT2E1Y0xWblV5TUgwOXpnZ2VDQT09', 'emerson@gmail.com', 'secret', 0, 0, '2019-12-02', 'emerson');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbitacora`
--
ALTER TABLE `tbitacora`
  ADD PRIMARY KEY (`idbitacora`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `tcita`
--
ALTER TABLE `tcita`
  ADD PRIMARY KEY (`idcita`),
  ADD KEY `idpaciente` (`idpaciente`);

--
-- Indices de la tabla `tconsulta`
--
ALTER TABLE `tconsulta`
  ADD PRIMARY KEY (`idconsulta`),
  ADD KEY `idpaciente` (`idpaciente`);

--
-- Indices de la tabla `texamen`
--
ALTER TABLE `texamen`
  ADD PRIMARY KEY (`idexamen`),
  ADD KEY `idconsulta` (`idconsulta`);

--
-- Indices de la tabla `tinventario_medicamento`
--
ALTER TABLE `tinventario_medicamento`
  ADD PRIMARY KEY (`idreferencia_medicamento`),
  ADD KEY `idproveedor` (`idproveedor`),
  ADD KEY `idmedicamento` (`idmedicamento`);

--
-- Indices de la tabla `tmedicamento`
--
ALTER TABLE `tmedicamento`
  ADD PRIMARY KEY (`idmedicamento`);

--
-- Indices de la tabla `tpaciente`
--
ALTER TABLE `tpaciente`
  ADD PRIMARY KEY (`idpaciente`);

--
-- Indices de la tabla `tproveedor`
--
ALTER TABLE `tproveedor`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indices de la tabla `treceta`
--
ALTER TABLE `treceta`
  ADD PRIMARY KEY (`idreceta`),
  ADD KEY `idconsulta` (`idconsulta`),
  ADD KEY `idmedicamento` (`idmedicamento`);

--
-- Indices de la tabla `tresponsable`
--
ALTER TABLE `tresponsable`
  ADD PRIMARY KEY (`idresponsable`),
  ADD KEY `idpaciente` (`idpaciente`);

--
-- Indices de la tabla `tsignosvitales`
--
ALTER TABLE `tsignosvitales`
  ADD PRIMARY KEY (`idsignovital`),
  ADD KEY `idconsulta` (`idconsulta`);

--
-- Indices de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbitacora`
--
ALTER TABLE `tbitacora`
  MODIFY `idbitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT de la tabla `tcita`
--
ALTER TABLE `tcita`
  MODIFY `idcita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `tconsulta`
--
ALTER TABLE `tconsulta`
  MODIFY `idconsulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `texamen`
--
ALTER TABLE `texamen`
  MODIFY `idexamen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `tinventario_medicamento`
--
ALTER TABLE `tinventario_medicamento`
  MODIFY `idreferencia_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tmedicamento`
--
ALTER TABLE `tmedicamento`
  MODIFY `idmedicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tpaciente`
--
ALTER TABLE `tpaciente`
  MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tproveedor`
--
ALTER TABLE `tproveedor`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `treceta`
--
ALTER TABLE `treceta`
  MODIFY `idreceta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tresponsable`
--
ALTER TABLE `tresponsable`
  MODIFY `idresponsable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tsignosvitales`
--
ALTER TABLE `tsignosvitales`
  MODIFY `idsignovital` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbitacora`
--
ALTER TABLE `tbitacora`
  ADD CONSTRAINT `tbitacora_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `tusuario` (`idusuario`);

--
-- Filtros para la tabla `tcita`
--
ALTER TABLE `tcita`
  ADD CONSTRAINT `tcita_ibfk_1` FOREIGN KEY (`idpaciente`) REFERENCES `tpaciente` (`idpaciente`);

--
-- Filtros para la tabla `tconsulta`
--
ALTER TABLE `tconsulta`
  ADD CONSTRAINT `tconsulta_ibfk_1` FOREIGN KEY (`idpaciente`) REFERENCES `tpaciente` (`idpaciente`);

--
-- Filtros para la tabla `texamen`
--
ALTER TABLE `texamen`
  ADD CONSTRAINT `texamen_ibfk_1` FOREIGN KEY (`idconsulta`) REFERENCES `tconsulta` (`idconsulta`);

--
-- Filtros para la tabla `tinventario_medicamento`
--
ALTER TABLE `tinventario_medicamento`
  ADD CONSTRAINT `tinventario_medicamento_ibfk_1` FOREIGN KEY (`idmedicamento`) REFERENCES `tmedicamento` (`idmedicamento`);

--
-- Filtros para la tabla `tresponsable`
--
ALTER TABLE `tresponsable`
  ADD CONSTRAINT `tresponsable_ibfk_1` FOREIGN KEY (`idpaciente`) REFERENCES `tpaciente` (`idpaciente`);

--
-- Filtros para la tabla `tsignosvitales`
--
ALTER TABLE `tsignosvitales`
  ADD CONSTRAINT `tsignosvitales_ibfk_1` FOREIGN KEY (`idconsulta`) REFERENCES `tconsulta` (`idconsulta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
