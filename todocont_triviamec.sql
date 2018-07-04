-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-07-2018 a las 15:03:19
-- Versión del servidor: 5.7.19-0ubuntu0.17.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `todocont_triviamec`
--
CREATE DATABASE IF NOT EXISTS `todocont_triviamec` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `todocont_triviamec`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mec_answers`
--

CREATE TABLE `mec_answers` (
  `id` int(11) NOT NULL,
  `id_questions` int(11) NOT NULL,
  `description` text COLLATE utf8_spanish_ci,
  `correct` int(11) DEFAULT '0',
  `datatime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mec_answers`
--

INSERT INTO `mec_answers` (`id`, `id_questions`, `description`, `correct`, `datatime`) VALUES
(1, 4, '4', 1, '2018-05-28 19:47:50'),
(2, 4, '3', 0, '2018-05-28 19:48:04'),
(5, 6, '72', 1, '2018-05-29 21:12:01'),
(6, 6, '62', 0, '2018-05-29 21:12:06'),
(7, 6, '42', 0, '2018-05-29 21:12:09'),
(8, 6, '32', 0, '2018-05-29 21:12:11'),
(10, 4, '2', 0, '2018-05-30 01:29:08'),
(11, 4, '5', 0, '2018-05-30 01:29:15'),
(13, 5, '16', 1, '2018-05-30 01:30:05'),
(14, 5, '12', 0, '2018-05-30 01:30:08'),
(15, 5, '24', 0, '2018-05-30 01:30:12'),
(16, 5, '8', 0, '2018-05-30 01:30:30'),
(17, 7, '5', 1, '2018-05-30 01:32:58'),
(18, 7, '6', 0, '2018-05-30 01:33:01'),
(19, 7, '7', 0, '2018-05-30 01:33:04'),
(20, 7, '4', 0, '2018-05-30 01:33:06'),
(22, 13, 'Es un lenguaje de programación de código del lado del servidor originalmente diseñado para el desarrollo web de contenido dinámico.', 1, '2018-05-30 02:09:05'),
(23, 13, 'Es un lenguaje de programación de código del lado del cliente originalmente diseñado para el desarrollo web de contenido dinámico.', 0, '2018-05-30 02:09:26'),
(24, 14, 'Hypertext Pre-Processor', 1, '2018-05-30 02:27:40'),
(25, 14, 'Page Hypertext Processor', 0, '2018-05-30 02:28:34'),
(26, 14, 'Processor web page', 0, '2018-05-30 02:30:47'),
(27, 14, 'Server Processor', 0, '2018-05-30 02:31:06'),
(28, 15, 'Interpretado', 1, '2018-05-30 02:33:14'),
(29, 15, 'Compilado', 0, '2018-05-30 02:33:20'),
(30, 15, 'Ensamblador ', 0, '2018-05-30 02:37:02'),
(31, 15, 'Maquina', 0, '2018-05-30 02:37:18'),
(32, 16, 'Programación orientada a objetos', 1, '2018-05-30 02:39:14'),
(33, 16, 'Programación por procesos', 0, '2018-05-30 02:43:56'),
(34, 17, 'JAVA', 1, '2018-05-30 02:46:47'),
(35, 17, 'PHP', 0, '2018-05-30 02:46:50'),
(36, 17, 'PYTHON', 0, '2018-05-30 02:47:00'),
(37, 17, 'C#', 0, '2018-05-30 02:47:18'),
(38, 21, 'HTML5', 0, '2018-05-30 02:58:14'),
(39, 21, 'AJAX', 0, '2018-05-30 02:58:21'),
(40, 21, 'PYTHON', 1, '2018-05-30 02:58:28'),
(41, 21, 'MONGO', 0, '2018-05-30 02:58:37'),
(42, 24, 'Sistema de base de datos NoSQL orientado a documentos.', 1, '2018-05-30 03:02:20'),
(43, 24, 'Sistema de base de datos con  lenguaje de consulta estructurada', 0, '2018-05-30 03:05:56'),
(44, 28, 'Tux', 1, '2018-05-30 03:08:16'),
(45, 28, 'Rux', 0, '2018-05-30 03:08:21'),
(46, 28, 'GNU', 0, '2018-05-30 03:08:25'),
(47, 28, 'Pacman', 0, '2018-05-30 03:08:43'),
(49, 29, 'Adobe Reader', 0, '2018-05-30 03:23:54'),
(51, 29, 'Okular', 1, '2018-05-30 03:28:08'),
(52, 29, 'Photoshop', 0, '2018-05-30 03:30:58'),
(53, 29, 'Winrar', 0, '2018-05-30 03:31:03'),
(55, 34, 'MS-DOS, C, C++, Java, Visual Basic, SQL, SQL Server', 0, '2018-05-30 03:35:54'),
(56, 34, 'El lenguaje máquina, Lenguajes ensambladores y de lenguajes de alto nivel', 0, '2018-05-30 03:36:21'),
(57, 34, 'Estructural, Máquina', 0, '2018-05-30 03:36:37'),
(59, 34, 'De bajo nivel y de alto nivel', 1, '2018-05-30 03:37:24'),
(60, 35, 'Es el que entiende la computadora, es su lenguaje natural. En él sólo se pueden utilizar dos símbolos, el cero (0) y el uno (1).', 1, '2018-05-30 03:57:41'),
(61, 35, 'Es el que entiende la computadora y es legible para el ser humano, es su lenguaje natural.', 0, '2018-05-30 03:58:25'),
(62, 36, 'String, Boleano, Numeros.', 1, '2018-05-30 04:02:08'),
(63, 36, 'Simbólicos, de estructura, de cadena.', 0, '2018-05-30 04:02:24'),
(64, 36, 'Tipo Java, C++, Smalltalk.', 0, '2018-05-30 04:03:35'),
(65, 36, ' Visual Basic, Delphi, Perl.', 0, '2018-05-30 04:03:52'),
(66, 37, 'Es un programa contable que traduce un programa escrito en un lenguaje de programación a otro lenguaje de programación.', 0, '2018-05-30 04:06:01'),
(67, 37, 'Es un programa que transforma código fuente escrito en java a un código neutral a la plataforma conocido como java.', 1, '2018-05-30 04:06:11'),
(68, 37, 'Es un entorno de desarrollo integrado libre, hecho principalmente para el lenguaje de programación Java.', 0, '2018-05-30 04:06:26'),
(69, 37, 'Es un atributo de una parte de los datos que indica al ordenador (y/o al programador) algo sobre la clase de datos sobre los que se va a procesar.', 0, '2018-05-30 04:06:41'),
(70, 38, 'Es una colección o conjunto de objetos que comparten características comunes entre si.', 1, '2018-05-30 04:08:02'),
(71, 38, 'Es un atributo de una parte de los datos que indica al ordenador (y/o al programador) algo sobre la clase de datos sobre los que se va a procesar', 0, '2018-05-30 04:08:13'),
(72, 38, 'Es un programa contable que traduce un programa escrito en un lenguaje de programación a otro lenguaje de programación.', 0, '2018-05-30 04:08:28'),
(73, 39, 'Es un entorno de desarrollo integrado libre, hecho principalmente para un lenguaje de programación.', 0, '2018-05-30 04:09:51'),
(74, 39, 'Son las cosas individuales que diferencian una clase de objetos de otros y determinan la apariencia, estado y otras cualidades de la clase.', 1, '2018-05-30 04:10:02'),
(75, 39, 'Es un atributo de una parte de los datos que indica al ordenador (y/o al programador) algo sobre la clase de datos sobre los que se va a procesar.', 0, '2018-05-30 04:10:16'),
(76, 40, 'Modelo Vista Controlador', 1, '2018-05-30 04:12:36'),
(77, 40, 'Moda Visten Cuantos', 0, '2018-05-30 04:12:58'),
(78, 40, 'Macro Vista Controlador', 0, '2018-05-30 04:13:27'),
(79, 41, '-1', 0, '2018-05-30 13:37:25'),
(80, 41, '1', 1, '2018-05-30 13:37:37'),
(81, 41, '1/2', 0, '2018-05-30 13:37:44'),
(82, 41, '2', 0, '2018-05-30 13:38:27'),
(83, 42, '2000', 1, '2018-05-30 13:50:57'),
(84, 42, '1500', 0, '2018-05-30 13:51:01'),
(85, 42, '1500,1', 0, '2018-05-30 13:51:17'),
(86, 42, '1800', 0, '2018-05-30 13:54:11'),
(87, 43, '2,718282', 1, '2018-05-30 13:55:04'),
(89, 43, '1,142565', 0, '2018-05-30 13:55:29'),
(90, 43, '5,445361', 0, '2018-05-30 13:55:39'),
(91, 43, '3,141598', 0, '2018-05-30 13:55:49'),
(92, 44, '1400', 1, '2018-05-30 13:57:08'),
(93, 44, '1250', 0, '2018-05-30 13:57:15'),
(94, 44, '1300', 0, '2018-05-30 13:57:21'),
(95, 44, '1150', 0, '2018-05-30 13:57:27'),
(96, 46, '45', 1, '2018-05-30 13:59:30'),
(97, 46, '43', 0, '2018-05-30 13:59:33'),
(98, 46, '46', 0, '2018-05-30 13:59:40'),
(99, 46, '49', 0, '2018-05-30 13:59:41'),
(100, 47, '120', 1, '2018-05-30 14:01:56'),
(101, 47, '100', 0, '2018-05-30 14:02:01'),
(102, 47, '150', 0, '2018-05-30 14:02:04'),
(103, 47, '180', 0, '2018-05-30 14:02:09'),
(104, 48, '0,1,1,2,3,5,8,13', 1, '2018-05-30 14:03:12'),
(105, 48, '1,3,5,7,9,11,13,15', 0, '2018-05-30 14:03:24'),
(106, 48, '0,2,1,4,3,6,5,8', 0, '2018-05-30 14:03:32'),
(107, 48, '0,-1,1,-2,2,-3,3,-4', 0, '2018-05-30 14:03:40'),
(108, 49, 'es 0', 1, '2018-05-30 14:04:47'),
(109, 49, 'es 1', 0, '2018-05-30 14:04:56'),
(110, 49, 'es -1', 0, '2018-05-30 14:05:01'),
(111, 49, 'es 0.5', 0, '2018-05-30 14:05:10'),
(112, 50, 'Jack y Jill', 0, '2018-05-30 14:09:33'),
(113, 50, 'Hansel y Gretel', 1, '2018-05-30 14:09:41'),
(114, 50, 'Alicia y el conejo', 0, '2018-05-30 14:09:47'),
(115, 51, 'Manada', 1, '2018-05-30 14:10:47'),
(116, 51, 'Camada', 0, '2018-05-30 14:10:52'),
(117, 51, 'Rebaño', 0, '2018-05-30 14:10:55'),
(118, 51, 'Enjambre', 0, '2018-05-30 14:11:02'),
(119, 52, 'Verdadero', 1, '2018-05-30 14:12:21'),
(120, 52, 'Falso', 0, '2018-05-30 14:12:34'),
(121, 52, 'No lo se', 0, '2018-05-30 14:12:38'),
(122, 53, 'Amazona', 1, '2018-05-30 14:14:47'),
(123, 53, 'Mississippi', 0, '2018-05-30 14:14:57'),
(124, 53, 'Nilo', 0, '2018-05-30 14:15:00'),
(125, 53, 'Lempa', 0, '2018-05-30 14:15:02'),
(126, 54, 'Neil Armstrong', 1, '2018-05-30 14:15:57'),
(127, 54, 'Buzz Lightyear', 0, '2018-05-30 14:16:04'),
(128, 54, 'John Glenn', 0, '2018-05-30 14:16:11'),
(129, 54, 'Mágico González', 0, '2018-05-30 14:16:38'),
(130, 55, 'Verdadero', 1, '2018-05-30 14:18:40'),
(131, 55, 'Falso', 0, '2018-05-30 14:18:43'),
(132, 56, 'Vitamina C', 1, '2018-05-30 14:22:56'),
(133, 56, 'Vitamina D', 0, '2018-05-30 14:23:03'),
(134, 56, 'Vitamina A', 0, '2018-05-30 14:23:07'),
(135, 56, 'Vitamina B', 0, '2018-05-30 14:23:09'),
(136, 57, 'Aerosmith', 1, '2018-05-30 14:29:38'),
(137, 57, 'Bon jovi', 0, '2018-05-30 14:29:45'),
(138, 57, 'The Rolling Stones', 0, '2018-05-30 14:29:54'),
(139, 57, 'The Beatles', 0, '2018-05-30 14:30:08'),
(140, 58, 'Francia', 1, '2018-05-30 14:30:57'),
(141, 58, 'España', 0, '2018-05-30 14:31:01'),
(142, 58, 'Italia', 0, '2018-05-30 14:31:08'),
(143, 58, 'Reino Unido', 0, '2018-05-30 14:31:16'),
(144, 59, '1 tarjeta roja', 1, '2018-05-30 14:32:27'),
(145, 59, '1 tarjeta amarilla', 0, '2018-05-30 14:32:35'),
(146, 59, '1 tarjeta roja y 1 amarilla', 0, '2018-05-30 14:32:55'),
(147, 60, 'Pluto', 1, '2018-05-30 14:36:46'),
(148, 60, 'Donald', 0, '2018-05-30 14:36:53'),
(149, 60, 'Goofy', 0, '2018-05-30 14:36:59'),
(150, 60, 'Mini', 0, '2018-05-30 14:37:02'),
(151, 61, 'Arnold Schwarzenegger en Terminator', 1, '2018-05-30 14:38:27'),
(152, 61, 'Bruce Willis en Duro de Matar', 0, '2018-05-30 14:38:36'),
(153, 61, 'Mel Gibson en Arma Letal', 0, '2018-05-30 14:38:45'),
(154, 62, 'Arrendajo azul', 0, '2018-05-30 14:39:50'),
(155, 62, 'Halcón', 0, '2018-05-30 14:40:00'),
(156, 62, 'Paloma', 1, '2018-05-30 14:40:03'),
(157, 62, 'Gorrion', 0, '2018-05-30 14:40:23'),
(158, 11, '3', 0, '2018-05-31 03:12:22'),
(159, 11, '8', 0, '2018-05-31 03:14:14'),
(161, 11, '6', 1, '2018-05-31 03:15:45'),
(162, 11, '2', 0, '2018-05-31 03:16:01'),
(163, 26, 'Lunes', 0, '2018-05-31 03:17:10'),
(164, 26, 'Miércoles', 0, '2018-05-31 03:17:27'),
(165, 26, 'Sábado', 1, '2018-05-31 03:18:40'),
(166, 27, '6 unidades de millar,9 centenas,7 decenas y 5 unidades', 1, '2018-05-31 03:24:19'),
(167, 27, '6 unidades, 9 decenas, 7 unidades de millar y 5 centenas', 0, '2018-05-31 03:27:25'),
(168, 30, 'Decena', 1, '2018-05-31 03:31:15'),
(169, 30, 'Diez', 0, '2018-05-31 03:31:36'),
(170, 30, 'Décimo primero', 0, '2018-05-31 03:32:03'),
(171, 31, '209', 0, '2018-05-31 03:33:31'),
(172, 31, '10', 1, '2018-05-31 03:33:40'),
(173, 31, '150', 0, '2018-05-31 03:33:49'),
(175, 32, '80 centavos', 0, '2018-05-31 03:35:17'),
(176, 32, '15 centavos', 0, '2018-05-31 03:35:30'),
(177, 32, '35 centavos', 1, '2018-05-31 03:36:13'),
(178, 67, 'La fosas nasales', 1, '2018-05-31 03:41:42'),
(179, 68, 'Entre los 2 pulmones e inclinado hacia la izquierdas', 1, '2018-05-31 03:43:35'),
(180, 69, 'Comer buenos alimentos ,cepillar los dientes, dormir las horas necesarias.', 1, '2018-05-31 03:45:02'),
(181, 70, 'Para leer,trabajar, para apreciar la belleza de los paisajes,etc.', 1, '2018-05-31 03:46:36'),
(182, 70, 'Para bailar, para comer,saltar bien.', 0, '2018-05-31 03:47:23'),
(184, 71, 'Para masticar los alimentos impregnarlos de saliva y formar el bolo alimenticio.', 1, '2018-05-31 03:49:24'),
(185, 73, 'Son todos los elementos que la naturaleza produce y nosotros usamos para nuestro beneficio.', 1, '2018-05-31 03:52:35'),
(186, 72, 'Los ojos,la nariz ,el corazón etc.', 1, '2018-05-31 03:54:04'),
(187, 74, 'Renovables y no renovables', 1, '2018-05-31 03:56:39'),
(188, 75, 'Materia', 1, '2018-05-31 03:57:47'),
(189, 77, 'Sólido ,líquido y gaseoso', 1, '2018-05-31 03:58:49'),
(190, 76, 'Forma,color,olor y sabor.', 1, '2018-05-31 04:00:22'),
(191, 19, '14', 1, '2018-05-31 04:01:23'),
(192, 19, '28', 0, '2018-05-31 04:01:31'),
(194, 20, 'Azul y blanco.', 1, '2018-05-31 04:02:33'),
(195, 20, 'Amarillo y rosado', 0, '2018-05-31 04:02:53'),
(196, 20, 'Rojo y blanco.', 0, '2018-05-31 04:03:10'),
(197, 22, 'Maíz,café,frijol', 1, '2018-05-31 04:04:43'),
(198, 22, 'manzana ,pera, fresa.', 0, '2018-05-31 04:05:14'),
(199, 23, 'Teléfono, televisión y periódico.', 1, '2018-05-31 04:07:00'),
(200, 25, 'Rojo,amarillo y verde.', 1, '2018-05-31 04:07:54'),
(201, 63, 'Un emisor,mensaje y un receptor.', 1, '2018-05-31 04:09:48'),
(202, 66, 'Palabras mágicas.', 1, '2018-05-31 04:10:32'),
(203, 64, 'Mediodía', 1, '2018-05-31 04:11:44'),
(204, 64, 'Zapatero', 0, '2018-05-31 04:11:56'),
(205, 64, 'Rosalina', 0, '2018-05-31 04:12:13'),
(206, 65, 'Ala vida,educación y ala salud.', 1, '2018-05-31 04:13:17'),
(207, 77, 'Hielo,agua,gas', 0, '2018-05-31 23:19:59'),
(208, 77, 'Tierra,aire,fuego', 0, '2018-05-31 23:20:14'),
(209, 19, '12', 0, '2018-06-01 15:09:28'),
(210, 20, 'Azul y Rojo', 0, '2018-06-01 15:10:47'),
(211, 23, 'Autobus,microbus,taxi', 0, '2018-06-01 15:12:18'),
(212, 23, 'Tren, fax,buque', 0, '2018-06-01 15:12:33'),
(213, 25, 'Verde, azul, magenta', 0, '2018-06-01 15:13:24'),
(214, 25, 'Amarillo,anaranjado,verde', 0, '2018-06-01 15:13:34'),
(215, 26, 'Viernes', 0, '2018-06-01 15:14:13'),
(216, 33, '262', 1, '2018-06-01 15:16:33'),
(217, 33, '263', 0, '2018-06-01 15:16:45'),
(218, 33, '260', 0, '2018-06-01 15:16:48'),
(219, 79, 'Software de oficina', 1, '2018-06-01 20:40:20'),
(220, 79, 'Editor de texto', 0, '2018-06-01 20:40:27'),
(221, 79, 'Editor de fotos', 0, '2018-06-01 20:40:35'),
(222, 79, 'software de desarrollo', 0, '2018-06-01 20:40:50'),
(223, 80, 'El dióxido de carbono de la atmósfera es absorbido por las plantas y convertido en azúcar, por el proceso de fotosíntesis', 1, '2018-06-01 20:48:25'),
(224, 80, 'Las bacterias y hongos descomponen las plantas muertas y la materia animal', 0, '2018-06-01 20:50:41'),
(225, 80, 'El carbono se intercambia entre los océanos y la atmósfera', 0, '2018-06-01 20:51:03'),
(226, 80, 'Los animales comen plantas y al descomponer los azúcares dejan salir carbono a la atmósfera, los océanos o el suelo', 0, '2018-06-01 20:51:26'),
(227, 81, 'Artículo 10', 1, '2018-06-01 20:52:50'),
(228, 81, 'Artículo 11', 0, '2018-06-01 20:52:57'),
(229, 81, 'Artículo 12', 0, '2018-06-01 20:53:02'),
(230, 81, 'Artículo 9', 0, '2018-06-01 20:53:04'),
(231, 82, 'Nitrificación', 1, '2018-06-01 20:54:35'),
(232, 82, 'Percolación', 0, '2018-06-01 20:54:49'),
(233, 82, 'Evaporación', 0, '2018-06-01 20:55:04'),
(234, 82, 'Filtración', 0, '2018-06-01 20:55:16'),
(235, 83, 'Cuenca alta, media y baja', 1, '2018-06-01 20:56:07'),
(236, 83, 'El norte, sur, este y oeste', 0, '2018-06-01 20:56:20'),
(237, 83, 'El área, perímetro y zona de amortiguamiento', 0, '2018-06-01 20:56:35'),
(238, 84, 'Condensación', 1, '2018-06-01 20:58:08'),
(239, 84, 'Pérdida de NH4', 0, '2018-06-01 20:58:25'),
(240, 84, 'lixiviación', 0, '2018-06-01 20:58:44'),
(241, 84, 'Volatilización', 0, '2018-06-01 21:02:35'),
(242, 85, 'Al espacio de territorio delimitado por la línea divisoria de las aguas y conformado por un sistema hídrico que conducen sus aguas a un río principal', 1, '2018-06-01 21:04:21'),
(243, 85, 'Es el espacio natural donde se ejecutan proyectos de desarrollo', 0, '2018-06-01 21:04:32'),
(244, 85, 'Al espacio de territorio nacional donde los enclaves realizan actividades de conservación', 0, '2018-06-01 21:04:43'),
(245, 86, 'La atmósfera', 1, '2018-06-01 21:06:25'),
(246, 86, 'El océano', 0, '2018-06-01 21:06:35'),
(247, 86, 'Los estiércoles', 0, '2018-06-01 21:06:45'),
(248, 86, 'Los fertilizantes nitrogenados', 0, '2018-06-01 21:06:54'),
(249, 87, 'Los seres vivos hacia el ambiente abiótico y viceversa', 1, '2018-06-01 21:08:15'),
(250, 87, 'Los seres vivos hacia el ambiente abiótico', 0, '2018-06-01 21:08:31'),
(251, 87, 'El ambiente biótico a los mamíferos', 0, '2018-06-01 21:08:41'),
(252, 87, 'El ambiente biótico a los seres vivos', 0, '2018-06-01 21:08:51'),
(253, 88, 'Trichoderma harzianum', 1, '2018-06-01 21:10:54'),
(254, 88, 'Botrytis cinéreae', 0, '2018-06-01 21:11:09'),
(255, 88, 'Collodiscula jorulensis', 0, '2018-06-01 21:11:20'),
(256, 88, 'Glicadium spp.', 0, '2018-06-01 21:11:32'),
(257, 89, 'El combustible fósil', 1, '2018-06-01 21:12:32'),
(258, 89, 'La madera, ramas y hojas', 0, '2018-06-01 21:12:48'),
(259, 89, 'La biomasa animal de mamíferos, aves, reptiles', 0, '2018-06-01 21:13:00'),
(260, 12, 'Es encarga de cuantificar, medir y analizar la realidad económica, las operaciones de las organizaciones, con el fin de facilitar la dirección y la toma de desiciones.', 1, '2018-06-04 19:27:18'),
(261, 12, 'Es la encarga de llevar las cuentas de los bancos en registros para el fácil acceso y la toma de desiciones', 0, '2018-06-04 19:28:22'),
(262, 90, 'Linux Mint', 0, '2018-06-04 19:30:47'),
(263, 90, 'Gentoo', 0, '2018-06-04 19:31:05'),
(264, 90, 'Debian', 0, '2018-06-04 19:31:31'),
(265, 90, 'Novell', 1, '2018-06-04 19:31:46'),
(266, 91, '/home/administrador', 0, '2018-06-04 19:32:48'),
(267, 91, '/root', 1, '2018-06-04 19:32:58'),
(268, 91, '/proc', 0, '2018-06-04 19:33:04'),
(269, 91, '/dev', 0, '2018-06-04 19:33:11'),
(270, 92, 'Debian', 0, '2018-06-04 19:34:33'),
(271, 92, 'Linux Mint', 0, '2018-06-04 19:34:37'),
(272, 92, 'Windows 7', 0, '2018-06-04 19:34:42'),
(273, 92, 'Fedora', 1, '2018-06-04 19:34:54'),
(274, 93, 'EXT2', 0, '2018-06-04 19:35:51'),
(275, 93, 'EXT4', 0, '2018-06-04 19:35:53'),
(276, 93, 'NTFS', 1, '2018-06-04 19:35:55'),
(278, 94, 'mv contabilidad hipoteca', 1, '2018-06-04 19:38:01'),
(279, 94, 'rm contabilidad hipoteca', 0, '2018-06-04 19:38:11'),
(280, 94, 'cp contabilidad hipoteca', 0, '2018-06-04 19:38:17'),
(281, 94, ' hipoteca contabilidad', 0, '2018-06-04 19:38:24'),
(282, 95, 'Obtener el listado detallado del contenido de un directorio por páginas', 1, '2018-06-04 19:39:31'),
(283, 95, 'Listar los archivos con la extensión “al”', 0, '2018-06-04 19:39:50'),
(284, 95, 'Listar el contenido de un directorio.', 0, '2018-06-04 19:40:04'),
(285, 111, 'Características cualitativas de los estados financieros', 1, '2018-06-07 00:22:12'),
(286, 110, 'Balance general,estado de resultados,estado de cambios en el patrimonio,estado de flujo de efectivo', 1, '2018-06-07 00:23:57'),
(287, 109, 'Propietarios ,accionistas o empleados', 1, '2018-06-07 00:28:47'),
(288, 108, 'Estado de pérdidas y ganancias obtenida por una empresa durante un período de tiempo.', 1, '2018-06-07 00:30:13'),
(289, 107, 'Activos corriente', 1, '2018-06-07 00:31:10'),
(290, 107, 'Activo no corriente', 0, '2018-06-07 00:31:35'),
(291, 114, 'Cargó ', 1, '2018-06-07 00:36:02'),
(292, 113, 'Contabilidad financiera de Costos y Gubernamentales', 1, '2018-06-07 00:37:24'),
(293, 112, 'Pasivos', 1, '2018-06-07 00:38:21'),
(294, 112, 'Patrimonio', 0, '2018-06-07 00:38:43'),
(295, 112, 'Activo', 0, '2018-06-07 00:38:57'),
(296, 106, 'Activos', 1, '2018-06-07 00:39:58'),
(297, 105, 'A = P +C', 1, '2018-06-07 00:40:41'),
(298, 105, 'C= A + P', 0, '2018-06-07 00:41:05'),
(299, 105, 'P = C+ A', 0, '2018-06-07 00:41:29'),
(301, 103, 'La sociedad Roma', 1, '2018-06-07 00:43:15'),
(302, 103, 'La sociedad China', 0, '2018-06-07 00:43:27'),
(303, 103, 'La sociedad egipcia', 0, '2018-06-07 00:43:43'),
(304, 102, 'Epistemología', 0, '2018-06-07 00:44:33'),
(305, 102, 'Semiología', 1, '2018-06-07 00:44:47'),
(306, 102, 'Pedagogía', 0, '2018-06-07 00:45:00'),
(307, 101, '1995', 0, '2018-06-07 00:45:43'),
(308, 101, '1945', 0, '2018-06-07 00:45:56'),
(309, 101, '1889', 1, '2018-06-07 00:46:09'),
(310, 100, 'El poder', 0, '2018-06-07 00:46:54'),
(311, 100, 'El trabajo', 1, '2018-06-07 00:47:12'),
(312, 100, 'El gobierno', 0, '2018-06-07 00:47:24'),
(313, 99, 'Edad moderna, civilización Romana', 0, '2018-06-07 00:48:23'),
(314, 96, 'Edad moderna', 0, '2018-06-07 00:49:55'),
(315, 96, 'Edad media', 0, '2018-06-07 00:50:05'),
(316, 96, 'Edad antigua', 1, '2018-06-07 00:50:14'),
(317, 99, 'Edad media,civilización tartara', 0, '2018-06-07 00:51:27'),
(318, 99, 'Edad antigua,civilización griega', 1, '2018-06-07 00:51:55'),
(319, 97, '1999', 0, '2018-06-07 00:52:44'),
(320, 97, '1980', 1, '2018-06-07 00:53:03'),
(321, 97, '1970', 0, '2018-06-07 00:53:10'),
(322, 98, 'M 16', 0, '2018-06-07 00:54:01'),
(323, 98, 'R 57', 0, '2018-06-07 00:54:17'),
(324, 98, 'El Arcabuz', 1, '2018-06-07 00:54:43'),
(325, 114, 'Disminución', 0, '2018-06-07 02:36:54'),
(326, 138, 'Escritor', 0, '2018-06-07 04:38:30'),
(327, 138, 'Historiador', 0, '2018-06-07 04:38:49'),
(328, 138, 'Narrador', 1, '2018-06-07 04:39:02'),
(329, 136, 'La misma forma y el mismo significado', 0, '2018-06-07 04:40:16'),
(330, 136, 'Una forma  diferente pero el mismo significado', 1, '2018-06-07 04:41:03'),
(331, 135, 'Castellano', 1, '2018-06-07 04:41:48'),
(332, 135, 'Vulgar', 0, '2018-06-07 04:42:02'),
(333, 135, 'Latín', 0, '2018-06-07 04:42:14'),
(334, 134, 'Segunda persona', 0, '2018-06-07 04:43:09'),
(335, 134, 'Primera persona', 0, '2018-06-07 04:43:26'),
(336, 134, 'Tercera persona', 1, '2018-06-07 04:43:52'),
(337, 139, 'Cabañas,la libertad, la paz', 1, '2018-06-07 05:27:31'),
(338, 139, 'Usulutan ,sonsonate,la unión', 0, '2018-06-07 05:28:07'),
(339, 139, 'Morazán,cabañas,san Vicente', 0, '2018-06-07 05:30:29'),
(340, 113, 'Contabilidad simple y complicada', 0, '2018-06-07 05:33:46'),
(341, 129, 'Estados unidos', 0, '2018-06-07 05:36:12'),
(342, 129, 'Inglaterra', 0, '2018-06-07 05:36:33'),
(343, 129, 'Crecía', 1, '2018-06-07 05:36:45'),
(344, 111, 'Métodos de los estados financiero', 0, '2018-06-07 05:38:50'),
(345, 110, 'Activos,pasivos,capital', 0, '2018-06-07 05:40:14'),
(346, 69, 'Comer comida chatarra ,no lavar las manos,dormir 5 horas ', 0, '2018-06-07 05:43:28'),
(347, 73, 'Son el dinero que posee la persona ', 0, '2018-06-07 05:46:24'),
(349, 72, 'La circulación ,los tendones, los píes', 0, '2018-06-07 05:47:56'),
(350, 74, 'Comprados y gratis', 0, '2018-06-07 05:49:21'),
(351, 75, 'Masa', 0, '2018-06-07 05:50:08'),
(352, 75, 'Libras', 0, '2018-06-07 05:50:21'),
(353, 78, '206 huesos', 0, '2018-06-07 05:51:27'),
(354, 78, '499 huesos', 0, '2018-06-07 05:51:37'),
(355, 78, '109 huesos', 0, '2018-06-07 05:51:46'),
(356, 140, 'Axial y apendicular', 1, '2018-06-07 05:54:02'),
(357, 140, 'Huezos largos y redondos', 0, '2018-06-07 05:54:26'),
(358, 76, 'Tamaño,temperatura', 0, '2018-06-07 05:55:43'),
(359, 63, 'Una mujer y un hombre ', 0, '2018-06-07 05:57:27'),
(360, 65, 'Bailar, llorar ,a bañarse', 0, '2018-06-07 05:59:08'),
(361, 66, 'Palabras simples', 0, '2018-06-07 05:59:46'),
(362, 66, 'Palabras compuestas', 0, '2018-06-07 06:00:02'),
(363, 67, 'La faringe', 0, '2018-06-07 06:01:21'),
(364, 67, 'El abdomen', 0, '2018-06-07 06:01:46'),
(365, 68, 'En la cabeza', 0, '2018-06-07 06:03:19'),
(366, 68, 'Por el ombligo', 0, '2018-06-07 06:03:58'),
(367, 115, 'Estudia la descripcion de la tierra', 1, '2018-06-08 17:33:36'),
(368, 115, 'Estudia la poblacion de la tierra', 0, '2018-06-08 17:34:42'),
(369, 115, 'Nace con la creacion de la galaxia', 0, '2018-06-08 17:35:02'),
(370, 116, 'Eratostenes', 1, '2018-06-08 17:41:50'),
(371, 116, 'Estrabon', 0, '2018-06-08 17:42:02'),
(372, 116, 'Heròdoto', 0, '2018-06-08 17:42:40'),
(373, 117, 'Georgrafia Regional y Geografia General', 1, '2018-06-08 17:43:55'),
(374, 117, 'Georgrafia fiscica y Geografia humana', 0, '2018-06-08 17:44:14'),
(375, 118, 'La geografia espacial y cuantica', 0, '2018-06-08 17:46:01'),
(376, 118, 'La geografia humana y fisica', 1, '2018-06-08 17:47:01'),
(377, 128, 'Velar por que se cumpla la ley del medio ambiente', 0, '2018-06-08 18:07:09'),
(378, 128, 'Velar por la conservacion del medio ambiente', 1, '2018-06-08 18:07:44'),
(379, 128, 'Estudiar los mantos acuiferos', 0, '2018-06-08 18:08:08'),
(380, 127, 'Es la responsable dde analizar la relacion de espacios naturales con el hombre', 1, '2018-06-08 18:10:38'),
(381, 127, 'Estudia la relacion de los animales de todas las especies', 0, '2018-06-08 18:11:48'),
(382, 126, 'Es la encargada de analizar los diferentes paisajes del medio ambiente', 1, '2018-06-08 18:13:10'),
(383, 126, 'Estudia los diferentes enfoque de la naturaleza desde el punto de vista del hombre', 0, '2018-06-08 18:13:59'),
(384, 125, 'Es la que estudia las aglomeraciones de personas', 0, '2018-06-08 18:15:33'),
(385, 125, 'Estudia la vida de las animales maritimos', 0, '2018-06-08 18:16:05'),
(386, 125, 'Estudia los fenomenos naturales', 1, '2018-06-08 18:16:23'),
(387, 124, 'Descripcion del espacio', 0, '2018-06-08 18:16:59'),
(388, 124, 'Descripcion de los ecosistemas', 0, '2018-06-08 18:17:27'),
(389, 124, 'Descripcion de la Tierra', 1, '2018-06-08 18:17:45'),
(390, 123, 'Rio Aseluate', 0, '2018-06-08 18:18:37'),
(392, 123, 'Rio Lempa', 1, '2018-06-08 18:18:47'),
(393, 123, 'Rio Jiboa', 0, '2018-06-08 18:18:57'),
(394, 122, 'ser un cartografo innovador', 0, '2018-06-08 18:19:43'),
(395, 122, 'Inicio La geografia moderna', 0, '2018-06-08 18:20:03'),
(396, 122, 'Calculo el tamaño de la tierra', 1, '2018-06-08 18:20:22'),
(397, 119, 'Es la ciencia social centrada en el estudio de las sociedades y territorios', 1, '2018-06-08 18:21:51'),
(399, 119, 'Ciencia que estudia patrones y procesos naturales', 0, '2018-06-08 18:22:16'),
(400, 120, 'Se ocupa del estudio del clima', 1, '2018-06-08 18:23:17'),
(401, 120, 'Estudia los desastres naturales', 0, '2018-06-08 18:23:38'),
(402, 121, 'Estudia las cuencas hidrograficas', 0, '2018-06-08 18:25:58'),
(403, 121, 'Es la que estudia todas las masas de agua de la tierra', 1, '2018-06-08 18:26:36'),
(404, 131, 'La oración ', 0, '2018-06-09 01:24:24'),
(405, 131, 'El lexema', 0, '2018-06-09 01:25:05'),
(406, 131, 'El texto', 1, '2018-06-09 01:25:40'),
(407, 132, 'El lenguaje informático', 0, '2018-06-09 01:30:58'),
(408, 132, 'El lenguaje verbal', 1, '2018-06-09 01:31:10'),
(409, 132, 'La prensa', 0, '2018-06-09 01:31:23'),
(410, 109, 'Países aliados', 0, '2018-06-09 05:25:45'),
(411, 106, 'Pasivos', 0, '2018-06-09 05:26:36'),
(412, 106, 'Capital', 0, '2018-06-09 05:26:40'),
(413, 108, 'Es la fotografía de la empresa', 0, '2018-06-09 05:28:30'),
(414, 142, '23', 0, '2018-06-12 02:34:44'),
(415, 142, '14', 1, '2018-06-12 02:34:55'),
(416, 142, '13', 0, '2018-06-12 02:35:00'),
(418, 107, 'Patrimonio', 0, '2018-06-12 22:00:57'),
(419, 108, 'El cambió del patrimonio', 0, '2018-06-12 22:03:44'),
(420, 114, 'Aumento', 0, '2018-06-12 22:06:28'),
(421, 143, 'Es un programador y fundador del software libre en el mundo.', 1, '2018-06-15 13:44:36'),
(422, 143, 'Es un programador y desarrollador del kernel de linux', 0, '2018-06-15 13:45:06'),
(423, 144, 'Una fundación sin ánimo de lucro que tiene como objetivo proteger y defender el software libre y sus usuarios/programadores.', 1, '2018-06-15 13:49:44'),
(424, 144, 'Una empresa privada que tiene como objetivo proteger y defender el desarrollo de software y sus usuarios/programadores.', 0, '2018-06-15 13:50:41'),
(425, 145, 'General Public Lincese.', 1, '2018-06-15 13:51:25'),
(426, 145, 'General Public Line.', 0, '2018-06-15 13:51:47'),
(427, 145, 'Lesser General Public License', 0, '2018-06-15 13:52:37'),
(428, 146, 'Desarrollo el Kernel de Linux pero apoyó en las herramientas implementadas por el proyecto GNU como compilador GCC, el depurador GNU Debugger, etc', 1, '2018-06-15 13:53:55'),
(430, 146, 'Es el fundador del software libre en el mundo.', 0, '2018-06-15 13:54:29'),
(431, 146, 'Desarrollor de Debian y las herramientas implementadas necesarias para dar vida a otra distribuciones.', 0, '2018-06-15 13:55:16'),
(432, 147, 'Núcleo, es un software que constituye la parte más importante del sistema operativo.', 0, '2018-06-15 13:56:20'),
(433, 147, 'Es el principal responsable de facilitar a los distintos programas acceso seguro al hardware de la computadora en forma básica.', 0, '2018-06-15 13:56:33'),
(434, 147, 'Es el encargado de gestionar recursos a travez del servicio de llamadas al sistema.', 0, '2018-06-15 13:56:55'),
(435, 147, 'Todas son correctas.', 1, '2018-06-15 13:57:04'),
(437, 148, 'Ejecutarlo, estudiarlo, redistribuir copias exactas o modificadas.', 1, '2018-06-15 14:00:30'),
(438, 148, 'Descargalo, Modificarlo y venderlo', 0, '2018-06-15 14:00:51'),
(439, 148, 'Estudiarlo, Modificarlo y venderlo.', 0, '2018-06-15 14:01:14'),
(440, 149, 'Una recopliación de apicaciones y herramientas junto al núcleo de Linux. Se encuentran empaquetadas de una determinada manera con utilidades extras para facilitar la configuración del sistema.', 1, '2018-06-15 14:02:47'),
(441, 149, 'Un pack de apicaciones y herramientas junto al núcleo de Linux o windows. que sirven para facilitar la configuración del sistema y sus perifericos', 0, '2018-06-15 14:03:43'),
(443, 150, 'Todos ganan', 0, '2018-06-15 14:06:37'),
(445, 150, 'Una persona se hace humana a través de las otras personas.', 0, '2018-06-15 14:06:50'),
(447, 150, 'Humanidad hacia otras personas.', 1, '2018-06-15 14:07:17'),
(448, 151, 'Debian', 1, '2018-06-15 14:08:22'),
(449, 151, 'Arch linux', 0, '2018-06-15 14:08:38'),
(450, 151, 'Red Hat', 0, '2018-06-15 14:10:18'),
(451, 152, 'Ext4 y Ext2.', 1, '2018-06-15 14:11:01'),
(452, 152, 'Ext4 y Fat.', 0, '2018-06-15 14:11:08'),
(453, 152, 'NTFS', 0, '2018-06-15 14:11:18'),
(454, 153, 'El espacio de intercambio es una zona del disco.', 1, '2018-06-15 14:12:52'),
(455, 153, 'Particion primaria para guardar todos los documentos', 0, '2018-06-15 14:13:09'),
(456, 154, 'GRUB', 1, '2018-06-15 14:24:05'),
(457, 154, 'CRUB', 0, '2018-06-15 14:24:15'),
(458, 154, 'TRUB', 0, '2018-06-15 14:24:24'),
(459, 155, '#mount/dev/sda1/media/[unidad]', 1, '2018-06-15 14:27:43'),
(460, 155, '#umount/media/[unidad]', 0, '2018-06-15 14:28:09'),
(462, 156, '/ directorio principal.', 1, '2018-06-15 14:29:17'),
(463, 156, '/home directorio principal.', 0, '2018-06-15 14:29:30'),
(464, 156, '/usr directorio principal.', 0, '2018-06-15 14:29:43'),
(465, 157, 'Samba', 1, '2018-06-15 14:39:23'),
(466, 157, 'Vino', 0, '2018-06-15 14:39:54'),
(467, 158, 'Es una interfaz grafica para apt, el sistema de gestión de paquetes de Ubuntu.', 1, '2018-06-15 14:42:19'),
(468, 158, 'Es una interfaz grafica para apt, el sistema de gestión de paquetes de Ubuntu.', 0, '2018-06-15 14:42:31'),
(469, 158, 'Es una interfaz grafica para apt, el sistema de gestión de paquetes de Fedora.', 0, '2018-06-15 14:42:51'),
(470, 159, 'Se refiere a los servicios del sistema.', 1, '2018-06-15 14:43:37'),
(472, 159, 'Se refiere a los servicios de actualizaciones.', 0, '2018-06-15 14:44:17'),
(473, 160, 'apt-get install', 0, '2018-06-15 14:45:44'),
(474, 160, 'apt-get update', 1, '2018-06-15 14:45:45'),
(475, 160, 'apt-get upgrade', 0, '2018-06-15 14:45:52'),
(476, 160, 'apt-get remove', 0, '2018-06-15 14:45:59'),
(477, 161, 'apt-get upgrade', 1, '2018-06-15 14:47:37'),
(478, 161, 'apt-get install', 0, '2018-06-15 14:47:42'),
(479, 161, 'apt-get update', 0, '2018-06-15 14:47:46'),
(480, 161, 'apt-get remove', 0, '2018-06-15 14:47:50'),
(481, 162, 'apt-get install [aplicación]', 1, '2018-06-15 14:48:30'),
(482, 162, 'apt-get remove [aplicación]', 0, '2018-06-15 14:48:36'),
(483, 162, 'apt-get update [aplicación]', 0, '2018-06-15 14:48:41'),
(484, 163, 'apt-get remove [aplicación]', 1, '2018-06-15 14:49:46'),
(485, 163, 'apt-get delete [aplicación]', 0, '2018-06-15 14:49:51'),
(486, 164, 'apt-get remove --purge [aplicación]', 1, '2018-06-15 14:50:37'),
(487, 164, 'apt-get remove  [aplicación]', 0, '2018-06-15 14:50:41'),
(488, 164, 'apt-get remove all [aplicación]', 0, '2018-06-15 14:50:46'),
(489, 165, 'shutdown', 0, '2018-06-15 14:55:41'),
(490, 165, 'rm', 1, '2018-06-15 14:55:44'),
(491, 165, 'su', 0, '2018-06-15 14:55:46'),
(493, 166, 'passwd', 0, '2018-06-15 14:56:53'),
(494, 166, 'mount', 1, '2018-06-15 14:57:00'),
(495, 166, 'netstat', 0, '2018-06-15 14:57:59'),
(496, 167, 'UBUNTU', 0, '2018-06-15 14:59:04'),
(497, 167, 'FEDORA', 1, '2018-06-15 14:59:07'),
(498, 167, 'MANJARO', 0, '2018-06-15 14:59:11'),
(499, 168, 'Repositorio', 1, '2018-06-15 15:00:18'),
(500, 168, 'Intaladores', 0, '2018-06-15 15:00:24'),
(501, 168, 'Tienda Online', 0, '2018-06-15 15:00:40'),
(502, 169, 'cd', 1, '2018-06-15 15:01:51'),
(503, 169, 'ls', 0, '2018-06-15 15:01:56'),
(504, 169, 'ac', 0, '2018-06-15 15:02:02'),
(505, 170, 'Cinnamon', 1, '2018-06-15 15:03:03'),
(506, 170, 'Leopard', 0, '2018-06-15 15:03:09'),
(507, 170, 'Tiger', 0, '2018-06-15 15:03:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mec_categories`
--

CREATE TABLE `mec_categories` (
  `id` int(11) NOT NULL,
  `description` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_type_category` int(11) NOT NULL,
  `datatime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mec_categories`
--

INSERT INTO `mec_categories` (`id`, `description`, `id_type_category`, `datatime`) VALUES
(1, 'Matemática', 1, '2018-05-23 17:11:05'),
(2, 'Ciencias Naturales', 1, '2018-05-23 17:11:05'),
(3, 'Geografía', 1, '2018-05-23 17:11:05'),
(4, 'Estudio Sociales', 1, '2018-05-23 17:11:05'),
(5, 'Arte y cultura', 1, '2018-05-23 17:11:05'),
(9, 'Deporte', 2, '2018-05-24 21:12:57'),
(10, 'Lenguaje y literatura', 1, '2018-05-24 22:16:58'),
(12, 'Programación', 2, '2018-05-28 15:10:02'),
(14, 'Contabilidad', 2, '2018-05-28 15:10:37'),
(15, 'Agroecología', 2, '2018-05-28 15:10:56'),
(17, 'GNU/Linux', 2, '2018-05-30 03:07:12'),
(21, 'Quimica', 2, '2018-06-12 02:37:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mec_levels`
--

CREATE TABLE `mec_levels` (
  `id` int(11) NOT NULL,
  `description` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `datatime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mec_levels`
--

INSERT INTO `mec_levels` (`id`, `description`, `datatime`) VALUES
(1, 'Fácil', '2018-05-23 17:36:16'),
(2, 'Intermedio', '2018-05-23 17:36:16'),
(3, 'Difícil', '2018-05-23 17:36:16'),
(4, 'Genio', '2018-05-23 17:36:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mec_questions`
--

CREATE TABLE `mec_questions` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` text COLLATE utf8_spanish_ci,
  `picture` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_category` int(11) NOT NULL,
  `id_levels` int(11) NOT NULL,
  `id_status` int(11) NOT NULL DEFAULT '1',
  `datatime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mec_questions`
--

INSERT INTO `mec_questions` (`id`, `name`, `description`, `picture`, `id_category`, `id_levels`, `id_status`, `datatime`) VALUES
(4, NULL, '2x2?', NULL, 1, 1, 1, '2018-05-24 14:55:53'),
(5, NULL, '4x4?', NULL, 1, 1, 1, '2018-05-24 14:56:10'),
(6, NULL, '8x9?', NULL, 1, 1, 1, '2018-05-24 14:56:24'),
(7, NULL, '¿Cuántos continentes tenemos?', NULL, 3, 1, 1, '2018-05-24 14:57:23'),
(11, NULL, '¿Por cuanto tenemos que multiplicar el 6 para obtener 36?', NULL, 1, 2, 1, '2018-05-30 01:52:08'),
(12, NULL, '¿Qué es Contabilidad?', NULL, 14, 1, 1, '2018-05-30 01:54:03'),
(13, NULL, '¿Qué es PHP?', NULL, 12, 1, 1, '2018-05-30 02:07:36'),
(14, NULL, '¿Definición de las siglas PHP?', NULL, 12, 1, 1, '2018-05-30 02:26:40'),
(15, NULL, '¿PHP es un lenguaje?', NULL, 12, 1, 1, '2018-05-30 02:32:56'),
(16, NULL, '¿Qué es POO?', NULL, 12, 1, 1, '2018-05-30 02:38:59'),
(17, NULL, '¿Lenguaje de programación de propósito general, concurrente, orientado a objetos, que fue diseñado específicamente para tener tan pocas dependencias de implementación como fuera posible. Su intención es permitir que los desarrolladores de aplicaciones escriban el programa una vez y lo ejecuten en cualquier dispositivo?', NULL, 12, 2, 1, '2018-05-30 02:46:23'),
(19, NULL, '¿Cuantos departamentos tiene el Salvador?', NULL, 4, 1, 1, '2018-05-30 02:55:08'),
(20, NULL, '¿De qué color es la Bandera Nacional de El Salvador?', NULL, 4, 1, 1, '2018-05-30 02:56:32'),
(21, NULL, '¿Es un lenguaje de programación?', NULL, 12, 1, 1, '2018-05-30 02:57:50'),
(22, NULL, '¿Cuáles son los productos que se elaboran en nuestro país ?', NULL, 4, 2, 1, '2018-05-30 02:58:31'),
(23, NULL, '¿Cuáles son medios de comunicación?', NULL, 4, 1, 1, '2018-05-30 03:01:00'),
(24, NULL, '¿Qué es MongoDB?', NULL, 12, 2, 1, '2018-05-30 03:01:06'),
(25, NULL, '¿De qué color es el semáforo?', NULL, 4, 1, 1, '2018-05-30 03:03:39'),
(26, NULL, '¿Cúal es el vigésimodia de la semana? ', NULL, 1, 2, 2, '2018-05-30 03:05:37'),
(27, NULL, '¿Cuántas unidades,decenas,centenas y unidades de millar ,forman 6975?', NULL, 1, 3, 1, '2018-05-30 03:07:32'),
(28, NULL, '¿Mascota oficial de Linux?', NULL, 17, 1, 1, '2018-05-30 03:08:07'),
(29, NULL, '¿Ejemplos de software libre?', NULL, 17, 1, 1, '2018-05-30 03:10:22'),
(30, NULL, '¿Al grupo de diez unidades se llama ?', NULL, 1, 1, 1, '2018-05-30 03:11:20'),
(31, NULL, '¿Cuál es el número menor 10  o el 209?', NULL, 1, 1, 1, '2018-05-30 03:12:58'),
(32, NULL, '¿1 moneda de  25 centavos y 1 moneda de 10 centavos es ?', NULL, 1, 2, 1, '2018-05-30 03:15:04'),
(33, NULL, '¿Cuántos municipio tiene El Salvador?', NULL, 4, 2, 1, '2018-05-30 03:17:06'),
(34, NULL, '¿Cuáles son los tipos de lenguaje de programación?', NULL, 12, 2, 1, '2018-05-30 03:34:35'),
(35, NULL, '¿Que es un Lenguaje Maquina?', NULL, 12, 2, 1, '2018-05-30 03:38:39'),
(36, NULL, '¿Algunos tipos de datos que se manejan en Programación?', NULL, 12, 2, 1, '2018-05-30 04:01:01'),
(37, NULL, '¿Qué es el compilador Java?', NULL, 12, 3, 1, '2018-05-30 04:05:23'),
(38, NULL, '¿Que es una Clase en Programación?', NULL, 12, 3, 1, '2018-05-30 04:07:36'),
(39, NULL, '¿Que es un atributo en Programación ?', NULL, 12, 3, 1, '2018-05-30 04:09:19'),
(40, NULL, '¿Qué es MVC?', NULL, 12, 2, 1, '2018-05-30 04:11:51'),
(41, NULL, '¿COSENO (0)?', NULL, 1, 3, 1, '2018-05-30 13:37:10'),
(42, NULL, '7250000 / 3625', NULL, 1, 2, 1, '2018-05-30 13:38:59'),
(43, NULL, '¿Cuál es el valor aproximado del número “e”?', NULL, 1, 3, 1, '2018-05-30 13:54:45'),
(44, NULL, 'Promedio (1000;1200;2000)', NULL, 1, 3, 1, '2018-05-30 13:56:52'),
(46, NULL, '¿Cuánto es? 1+2+3+4+5+6+7+8+9', NULL, 1, 3, 1, '2018-05-30 13:59:18'),
(47, NULL, 'Factorial (5)', NULL, 1, 2, 1, '2018-05-30 14:01:45'),
(48, NULL, '¿Cuáles son los 8 primeros elementos de la sucesión de Fibonacci?', NULL, 1, 4, 1, '2018-05-30 14:02:55'),
(49, NULL, 'SENO (0)', NULL, 1, 2, 1, '2018-05-30 14:04:20'),
(50, NULL, '¿Qué personajes de un cuento de hadas terminaron en una casa de jengibre?', NULL, 10, 1, 1, '2018-05-30 14:09:01'),
(51, NULL, '¿Cómo se le llama a un grupo de lobos?', NULL, 2, 1, 1, '2018-05-30 14:10:34'),
(52, NULL, 'VERDADERO O FALSO. En la mitología Griega, Hades es el dios del Inframundo', NULL, 10, 2, 1, '2018-05-30 14:11:53'),
(53, NULL, '¿Cuál es el río más largo del mundo?', NULL, 4, 2, 1, '2018-05-30 14:13:59'),
(54, NULL, '¿Quién dijo: Un pequeño paso para el hombre, un gran salto para la humanidad?', NULL, 5, 1, 1, '2018-05-30 14:15:40'),
(55, NULL, 'VERDADERO O FALSO. ¿El planeta Tierra es el tercer planeta más cercano al Sol?', NULL, 2, 2, 1, '2018-05-30 14:18:29'),
(56, NULL, '¿El escorbuto es el resultado de una deficiencia de qué vitamina?', NULL, 2, 2, 1, '2018-05-30 14:22:43'),
(57, NULL, '¿Steven Tyler es el cantante de qué famosa banda?', NULL, 5, 2, 1, '2018-05-30 14:23:41'),
(58, NULL, '¿La Estatua de la Libertad fue regalada a los Estados Unidos por qué país?', NULL, 5, 3, 1, '2018-05-30 14:30:46'),
(59, NULL, '¿Cuántas tarjetas debe recibir un jugador de fútbol antes de ser expulsado?', NULL, 9, 1, 1, '2018-05-30 14:32:12'),
(60, NULL, '¿Cuál es el nombre de la mascota de Mickey Mouse?', NULL, 5, 2, 1, '2018-05-30 14:36:30'),
(61, NULL, '¿Qué famoso actor de Hollywood dijo las siguiente frase?: Volveré... (I´ll be back)', NULL, 5, 3, 1, '2018-05-30 14:37:46'),
(62, NULL, '¿Qué ave era usada como mensajera?', NULL, 10, 1, 1, '2018-05-30 14:39:33'),
(63, NULL, '¿Para que exista comunicación debe haber?', NULL, 10, 1, 1, '2018-05-30 21:28:54'),
(64, NULL, '¿Es ejemplo de palabras compuestas?', NULL, 10, 1, 1, '2018-05-30 21:32:00'),
(65, NULL, '¿Son derechos de los niños/as?', NULL, 10, 1, 1, '2018-05-30 21:34:21'),
(66, NULL, '¿Las palabras : buenos dias, por favor,disculpa son?', NULL, 10, 2, 1, '2018-05-30 21:36:00'),
(67, NULL, '¿Las vías respiratorias están formadas por?', NULL, 2, 2, 1, '2018-05-30 21:41:08'),
(68, NULL, '¿A donde esta situado el corazón?', NULL, 2, 2, 1, '2018-05-30 21:43:08'),
(69, NULL, '¿Las medidas higiénicas son?', NULL, 2, 2, 1, '2018-05-30 21:45:08'),
(70, NULL, '¿Para qué nos sirve los ojos?', NULL, 2, 1, 1, '2018-05-30 21:47:09'),
(71, NULL, '¿Cual es la función de la lengua y los dientes?', NULL, 2, 3, 2, '2018-05-30 21:49:09'),
(72, NULL, '¿Son algunos órganos principales de nuestro cuerpo?', NULL, 2, 1, 1, '2018-05-30 21:51:09'),
(73, NULL, '¿Qué son los recursos naturales?', NULL, 2, 2, 1, '2018-05-30 21:53:09'),
(74, NULL, '¿Los recursos naturales pueden ser ?', NULL, 2, 1, 1, '2018-05-30 21:55:09'),
(75, NULL, '¿Todo aquello que ocupa un lugar e el espacio se llama?', NULL, 2, 2, 1, '2018-05-30 21:57:09'),
(76, NULL, '¿Cuáles son las propiedades de la materia?', NULL, 2, 2, 1, '2018-05-30 21:59:09'),
(77, NULL, '¿La materia se presenta en 3 estados y son ?', NULL, 2, 2, 1, '2018-05-30 22:00:10'),
(78, NULL, '¿Cuántos huezos está formado el esqueleto humano?', NULL, 2, 2, 1, '2018-05-30 22:01:23'),
(79, NULL, '¿Qué es LibreOffice? ', NULL, 17, 1, 1, '2018-06-01 20:39:51'),
(80, NULL, '¿El primer paso del ciclo del carbono es el siguiente?', NULL, 15, 2, 1, '2018-06-01 20:47:36'),
(81, NULL, 'Según la normativa de la Unión Europea CE 834 2007, cuál de los siguientes artículos prohíbe el uso de radiaciones ionizantes', NULL, 15, 4, 1, '2018-06-01 20:52:26'),
(82, NULL, 'En el ciclo biogeoquímico se produce la:', NULL, 15, 2, 1, '2018-06-01 20:54:22'),
(83, NULL, 'Las partes geográficas de una cuenca hidrográfica son:', NULL, 15, 2, 1, '2018-06-01 20:55:50'),
(84, NULL, 'En el ciclo hidrológico se produce la:', NULL, 15, 2, 1, '2018-06-01 20:57:57'),
(85, NULL, 'Se conoce como cuenca hidrográfica.', NULL, 15, 2, 1, '2018-06-01 21:04:06'),
(86, NULL, 'El principal reservorio de nitrógeno es:', NULL, 15, 1, 1, '2018-06-01 21:06:08'),
(87, NULL, 'La materia orgánica circula desde:', NULL, 15, 2, 1, '2018-06-01 21:07:59'),
(88, NULL, 'El hongo antagonista más utilizado en el control de enfermedades de las plantas es:', NULL, 15, 4, 1, '2018-06-01 21:10:38'),
(89, NULL, 'Las principales fuentes de CO2 son:', NULL, 15, 2, 1, '2018-06-01 21:12:19'),
(90, NULL, '¿Cual de las siguientes no es una distribución de Linux (también llamadas distros)?', NULL, 17, 1, 1, '2018-06-04 19:29:55'),
(91, NULL, 'El directorio de trabajo del administrador del equipo es:', NULL, 17, 2, 1, '2018-06-04 19:32:31'),
(92, NULL, 'Los paquetes de aplicaciones que poseen la extensión .RPM son característicos de la distribución', NULL, 17, 2, 1, '2018-06-04 19:34:21'),
(93, NULL, ' ¿Cual de los siguientes sistemas de ficheros no es utilizado por ninguna de las distribuciones de Linux?', NULL, 17, 2, 1, '2018-06-04 19:35:39'),
(94, NULL, 'Queremos cambiar el nombre del directorio “contabilidad” por el nombre “hipoteca”, para ello ejecutaremos el comando', NULL, 17, 2, 1, '2018-06-04 19:37:40'),
(95, NULL, 'Mediante el comando “ls -al | more” conseguiremos', NULL, 17, 2, 1, '2018-06-04 19:39:16'),
(96, NULL, '¿Periodo de la historia  de la humanidad que comprende desde la aparición de la escritura (3000 años antes de cristo)hasta aproximadamente, la caída de Roma en poder de los bárbaros en el 476 d. C?', NULL, 5, 3, 1, '2018-06-06 01:56:02'),
(97, NULL, 'En que año fueron asesinadas las 4 religiosas Dorothy kazel,Ita ford ,Mauraclarke y Jean Donovan por el ejército salvadoreño?', NULL, 5, 3, 1, '2018-06-06 02:00:02'),
(98, NULL, '¿Arma portátil utilizada en los siglos xv y xvI,compuesta por un cañón y una culata recta?', NULL, 5, 3, 1, '2018-06-06 02:03:26'),
(99, NULL, '¿A cúal civilización se le atribuye el nacimiento del alfabeto hace 4 o 5 mil años ?', NULL, 5, 2, 1, '2018-06-06 02:05:20'),
(100, NULL, '¿Es la fuente de toda riqueza afirman los especialistas en economía política ,es en efecto, a la par que la naturaleza ,proveedora de los materiales que el convierte en riqueza.Es la condición básica y fundamental de toda la vida humana. Y lo es en tal grado que hasta cierto punto ,debemos decir que lo ha creado al propio hombre ?', NULL, 5, 3, 1, '2018-06-06 02:09:59'),
(101, NULL, '¿En qué año se gradúa la primera mujer de la universidad de El Salvador?', NULL, 5, 3, 1, '2018-06-06 02:11:34'),
(102, NULL, '¿Es la ciencia que estudia la vida de los signos en el seno de la sociedad?', NULL, 5, 3, 1, '2018-06-06 02:13:17'),
(103, NULL, '¿La inmensa mayoría de la población eran pobres campesinos y artesanos sometidos ala explotación por parte del estado para el sostenimiento de cultos y grandes templos ,existió la exclavitud ,reclutada entre los prisioneros de guerra que ocupaban el último escalón de la sociedad? ', NULL, 5, 3, 1, '2018-06-06 02:18:00'),
(105, NULL, '¿Cual es la ecuación contable?', NULL, 14, 2, 1, '2018-06-06 18:53:17'),
(106, NULL, '¿Representan todos los bienes y recursos que posee una empresa?', NULL, 14, 2, 1, '2018-06-06 18:55:09'),
(107, NULL, '¿Efectivo ,cuentas por cobrar ,inventario son activos ?', NULL, 14, 2, 1, '2018-06-06 21:42:02'),
(108, NULL, '¿Qué muestra el estado de resultados?', NULL, 14, 2, 1, '2018-06-07 00:14:41'),
(109, NULL, '¿Son usuarios de la información financiera?', NULL, 14, 2, 1, '2018-06-07 00:16:07'),
(110, NULL, '¿Cuáles son los estados financieros básicos ?', NULL, 12, 1, 1, '2018-06-07 00:17:42'),
(111, NULL, '¿Comprensibilidad, Relevancia, confiabilidad y oportunidad son ?', NULL, 14, 2, 1, '2018-06-07 00:20:10'),
(112, NULL, '¿ son derechos de terceros los cuales representa valores concreto que la empresa adeuda?', NULL, 14, 1, 1, '2018-06-07 00:33:45'),
(113, NULL, '¿Son tipos de contabilidad?', NULL, 14, 1, 1, '2018-06-07 00:34:48'),
(114, NULL, '¿Una notación al debe se llama?', NULL, 14, 2, 1, '2018-06-07 00:35:33'),
(115, NULL, 'La Geografia es:', NULL, 3, 1, 1, '2018-06-07 03:20:26'),
(116, NULL, 'Primer autor en usar la palabra geografia en una obra:', NULL, 3, 2, 1, '2018-06-07 03:27:15'),
(117, NULL, '¿Cuales son las dos grandes ramas de la geografia?', NULL, 3, 1, 1, '2018-06-07 03:44:18'),
(118, NULL, 'La geografia general se divide en dos ramas que son:', NULL, 3, 1, 1, '2018-06-07 03:44:57'),
(119, NULL, '¿Que es la geografia humana?', NULL, 3, 1, 1, '2018-06-07 03:45:59'),
(120, NULL, '¿Que es climatologia?', NULL, 3, 1, 1, '2018-06-07 03:46:21'),
(121, NULL, '¿Que es hidrografia?', NULL, 3, 1, 1, '2018-06-07 03:46:39'),
(122, NULL, 'Eratostenes fue caracterizado por:', NULL, 3, 2, 1, '2018-06-07 03:48:12'),
(123, NULL, '¿Cual es el rio mas principal de nuestro Pais El Salvador?', NULL, 3, 1, 1, '2018-06-07 03:53:52'),
(124, NULL, '¿Que significa la palabra Geografia?', NULL, 3, 1, 1, '2018-06-07 04:04:54'),
(125, NULL, '¿Que es Geografia Fisica?', NULL, 3, 2, 1, '2018-06-07 04:05:29'),
(126, NULL, '¿Que es Geografia Paisajistica?', NULL, 3, 2, 1, '2018-06-07 04:05:44'),
(127, NULL, '¿Que es Geografia Ecologia?', NULL, 3, 2, 1, '2018-06-07 04:06:00'),
(128, NULL, '¿Cual es el objetivo principal de la Geografia Ecologia?', NULL, 3, 2, 1, '2018-06-07 04:06:40'),
(129, NULL, '¿La literatura universal tiene su inicio en?', NULL, 10, 2, 1, '2018-06-07 04:15:43'),
(131, NULL, '¿ Cuál es la unidad máxima de comunicación ?', NULL, 10, 2, 1, '2018-06-07 04:19:56'),
(132, NULL, '¿ Cuál es el instrumento fundamental de la comunicación humana?', NULL, 10, 2, 1, '2018-06-07 04:21:12'),
(134, NULL, '¿Qué persona gramatical utiliza el narrador omnisciente ?', NULL, 10, 4, 1, '2018-06-07 04:26:14'),
(135, NULL, '¿La lengua oficial de todo el estado español es el ?', NULL, 10, 3, 1, '2018-06-07 04:27:45'),
(136, NULL, '¿Se le denominan palabras sinónimos aquellas que presentan?', NULL, 10, 3, 1, '2018-06-07 04:29:49'),
(138, NULL, '¿El que escribe su historia se le conoce como?', NULL, 10, 2, 1, '2018-06-07 04:36:20'),
(139, NULL, '¿Son departamentos de la zona central?', NULL, 4, 2, 1, '2018-06-07 05:14:46'),
(140, NULL, '¿  El esqueleto humano se divide en 2 partes ?', NULL, 2, 1, 1, '2018-06-07 05:53:27'),
(142, NULL, 'Cuantos departamentos tiene El Salvador', NULL, 4, 1, 1, '2018-06-12 02:33:08'),
(143, NULL, '¿Quien es Richard Stallman?', NULL, 17, 2, 1, '2018-06-15 13:44:09'),
(144, NULL, '¿Qué es la Free Software Foundation?', NULL, 17, 2, 1, '2018-06-15 13:46:29'),
(145, NULL, '¿Qué es GPL?', NULL, 17, 2, 1, '2018-06-15 13:51:12'),
(146, NULL, '¿Qué hizo Linus Torvals?', NULL, 17, 2, 1, '2018-06-15 13:53:09'),
(147, NULL, '¿Qué es kernel?', NULL, 17, 2, 1, '2018-06-15 13:55:46'),
(148, NULL, '¿Según la Free Software Foundation que libertades debe ofrecer un programa libre?', NULL, 17, 1, 1, '2018-06-15 13:57:41'),
(149, NULL, '¿Qué es una Distro?', NULL, 17, 1, 1, '2018-06-15 14:01:51'),
(150, NULL, '¿Qué significa Ubuntu?', NULL, 17, 3, 1, '2018-06-15 14:05:04'),
(151, NULL, '¿De que distribución es derivado Ubuntu?', NULL, 17, 1, 1, '2018-06-15 14:08:14'),
(152, NULL, '¿Mencione los tipos de formatos en Linux?', NULL, 17, 2, 1, '2018-06-15 14:10:42'),
(153, NULL, '¿Qué es una partición SWAP?', NULL, 17, 1, 1, '2018-06-15 14:11:44'),
(154, NULL, '¿Cual es el nombre del gestor de arranque que utiliza el computador cuando se tiene Linux y Window en el mismo disco duro?', NULL, 17, 1, 1, '2018-06-15 14:15:03'),
(155, NULL, '¿Digite linea para montar unidades?', NULL, 17, 3, 1, '2018-06-15 14:27:17'),
(156, NULL, '¿Cual es el directorio raíz en Linux?', NULL, 17, 1, 1, '2018-06-15 14:28:45'),
(157, NULL, '¿Cual servicio de red debemos instalar para compartir archivos Linux-Window?', NULL, 17, 2, 1, '2018-06-15 14:39:07'),
(158, NULL, '¿Qué es Synaptic?', NULL, 17, 2, 1, '2018-06-15 14:42:05'),
(159, NULL, '¿A que se refiere demonios Daemon?', NULL, 17, 3, 1, '2018-06-15 14:43:20'),
(160, NULL, '¿Cuál es el comando para actualizar el listado de aplicaciones?', NULL, 17, 2, 1, '2018-06-15 14:45:28'),
(161, NULL, '¿Cuál es el comando para actualizar el el sistema?', NULL, 17, 2, 1, '2018-06-15 14:47:01'),
(162, NULL, '¿Cuál es el comando para instalar un aplicación?', NULL, 17, 1, 1, '2018-06-15 14:48:17'),
(163, NULL, '¿Cuál es el comando para eliminar un aplicación?', NULL, 17, 1, 1, '2018-06-15 14:49:32'),
(164, NULL, '¿Cuál es el comando para eliminar un paquete y sus archivos de configuración?', NULL, 17, 2, 1, '2018-06-15 14:50:20'),
(165, NULL, 'El comando de linux rm se usa para eliminar archivos de un directorio', NULL, 17, 2, 1, '2018-06-15 14:55:27'),
(166, NULL, 'Monta dispositivos de almacenamiento en particiones indicadas.', NULL, 17, 2, 1, '2018-06-15 14:56:37'),
(167, NULL, 'Los paquetes de aplicaciones que poseen la extensión .RPM son característicos de la distribución', NULL, 17, 2, 1, '2018-06-15 14:58:54'),
(168, NULL, 'Almacén online de paquetes de software desde donde el sistema descarga las aplicaciones que le pedimos que instale.', NULL, 17, 2, 1, '2018-06-15 15:00:03'),
(169, NULL, 'Comando que se utiliza para cambiar de directorio', NULL, 17, 1, 1, '2018-06-15 15:01:35'),
(170, NULL, 'El escritorio de Mint se llama', NULL, 17, 1, 1, '2018-06-15 15:02:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mec_records`
--

CREATE TABLE `mec_records` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `final_date` datetime DEFAULT NULL,
  `all_questions` text COLLATE utf8_spanish_ci,
  `all_answers` text COLLATE utf8_spanish_ci,
  `all_correct` int(11) NOT NULL DEFAULT '0',
  `all_incorrect` int(11) NOT NULL DEFAULT '0',
  `datatime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mec_session`
--

CREATE TABLE `mec_session` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `lastname` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` char(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `maximum_level` int(11) DEFAULT '0',
  `n_answered_questions` int(11) DEFAULT '0',
  `total_points` int(11) DEFAULT '0',
  `id_type` int(11) NOT NULL DEFAULT '2',
  `id_status` int(11) NOT NULL DEFAULT '1',
  `datatime` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mec_session`
--

INSERT INTO `mec_session` (`id`, `name`, `lastname`, `username`, `password`, `maximum_level`, `n_answered_questions`, `total_points`, `id_type`, `id_status`, `datatime`) VALUES
(1, 'Misael', 'Bonilla', 'administrador@trivia-mec.com', '$2y$10$ICnDplfkypjPHO6dMcTOCeMKR87sJy6mEiGfo.w.2ToEGmkwbOo2m', 0, 0, 0, 1, 1, '2018-03-28 19:17:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mec_status`
--

CREATE TABLE `mec_status` (
  `id` int(11) NOT NULL,
  `description` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mec_status`
--

INSERT INTO `mec_status` (`id`, `description`, `datetime`) VALUES
(1, 'Activo', '2018-03-28 18:10:17'),
(2, 'Inactivo', '2018-03-28 18:10:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mec_type`
--

CREATE TABLE `mec_type` (
  `id` int(11) NOT NULL,
  `description` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mec_type`
--

INSERT INTO `mec_type` (`id`, `description`, `datetime`) VALUES
(1, 'Administrador', '2018-03-28 18:19:08'),
(2, 'Jugador', '2018-03-28 18:19:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mec_type_categories`
--

CREATE TABLE `mec_type_categories` (
  `id` int(11) NOT NULL,
  `description` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `datatime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mec_type_categories`
--

INSERT INTO `mec_type_categories` (`id`, `description`, `datatime`) VALUES
(1, 'General', '2018-06-04 14:50:17'),
(2, 'Especialidades', '2018-06-04 14:50:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mec_wildcards`
--

CREATE TABLE `mec_wildcards` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `datatime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mec_answers`
--
ALTER TABLE `mec_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_questions` (`id_questions`);

--
-- Indices de la tabla `mec_categories`
--
ALTER TABLE `mec_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_category` (`id_type_category`);

--
-- Indices de la tabla `mec_levels`
--
ALTER TABLE `mec_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mec_questions`
--
ALTER TABLE `mec_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_levels` (`id_levels`),
  ADD KEY `id_status` (`id_status`);

--
-- Indices de la tabla `mec_records`
--
ALTER TABLE `mec_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Indices de la tabla `mec_session`
--
ALTER TABLE `mec_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_status` (`id_status`);

--
-- Indices de la tabla `mec_status`
--
ALTER TABLE `mec_status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mec_type`
--
ALTER TABLE `mec_type`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mec_type_categories`
--
ALTER TABLE `mec_type_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mec_wildcards`
--
ALTER TABLE `mec_wildcards`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mec_answers`
--
ALTER TABLE `mec_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;
--
-- AUTO_INCREMENT de la tabla `mec_categories`
--
ALTER TABLE `mec_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `mec_levels`
--
ALTER TABLE `mec_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `mec_questions`
--
ALTER TABLE `mec_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT de la tabla `mec_records`
--
ALTER TABLE `mec_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `mec_session`
--
ALTER TABLE `mec_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `mec_status`
--
ALTER TABLE `mec_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `mec_type`
--
ALTER TABLE `mec_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `mec_type_categories`
--
ALTER TABLE `mec_type_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mec_answers`
--
ALTER TABLE `mec_answers`
  ADD CONSTRAINT `mec_answers_ibfk_1` FOREIGN KEY (`id_questions`) REFERENCES `mec_questions` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `mec_categories`
--
ALTER TABLE `mec_categories`
  ADD CONSTRAINT `mec_categories_ibfk_1` FOREIGN KEY (`id_type_category`) REFERENCES `mec_type_categories` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `mec_questions`
--
ALTER TABLE `mec_questions`
  ADD CONSTRAINT `mec_questions_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `mec_categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mec_questions_ibfk_2` FOREIGN KEY (`id_levels`) REFERENCES `mec_levels` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mec_questions_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `mec_status` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `mec_records`
--
ALTER TABLE `mec_records`
  ADD CONSTRAINT `mec_records_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `mec_session` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `mec_session`
--
ALTER TABLE `mec_session`
  ADD CONSTRAINT `mec_session_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `mec_type` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mec_session_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `mec_status` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
