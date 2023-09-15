-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-09-2023 a las 18:38:53
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `3d`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales`
--

CREATE TABLE `locales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `calle` varchar(255) NOT NULL,
  `metros_cuadrados` int(11) NOT NULL,
  `antiguedad` varchar(255) NOT NULL,
  `disponibilidad` enum('Disponible','No disponible') NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `imagenes` varchar(255) NOT NULL,
  `descripcion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `locales`
--

INSERT INTO `locales` (`id`, `nombre`, `calle`, `metros_cuadrados`, `antiguedad`, `disponibilidad`, `imagen`, `imagenes`, `descripcion`) VALUES
(29, 'Local 1 ', '66 554', 300, '5 aÃ±os', 'Disponible', NULL, 'uploads/DiseÃ±o sin tÃ­tulo (9).png,uploads/DiseÃ±o sin tÃ­tulo (10).png,uploads/DiseÃ±o sin tÃ­tulo (11).png,uploads/DiseÃ±o sin tÃ­tulo (12).png,uploads/DiseÃ±o sin tÃ­tulo (13).png,uploads/DiseÃ±o sin tÃ­tulo (14).png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque ligula at laoreet lobortis. Quisque euismod enim non enim pharetra pharetra ut vel leo. Suspendisse mollis, elit in vestibulum interdum, nunc nisl placerat dui, nec convallis ex sem sed nulla. Donec at dui sit amet ante fermentum aliquet non at massa. Praesent luctus quam tempus, commodo urna vitae, luctus lectus. Morbi feugiat, lorem a viverra vehicula, felis sem fermentum massa, at luctus sem justo ac ex. Vivamus euismod nunc non enim posuere rutrum. Nulla at eros a urna posuere venenatis non et urna. Donec a ornare tortor. Etiam non porta velit, quis pellentesque est. Morbi elementum porttitor neque sed pretium. Pellentesque bibendum placerat lacus, sit amet tincidunt neque sagittis at. Vivamus convallis sollicitudin pellentesque.\r\n\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus aliquet odio ut nibh bibendum pretium. Phasellus porta ex sed nulla eges'),
(30, 'Local 2', '44 887', 900, '4 meses', 'Disponible', NULL, 'uploads/DiseÃ±o sin tÃ­tulo (37).png,uploads/DiseÃ±o sin tÃ­tulo (38).png,uploads/DiseÃ±o sin tÃ­tulo (39).png,uploads/DiseÃ±o sin tÃ­tulo (40).png,uploads/DiseÃ±o sin tÃ­tulo (41).png,uploads/DiseÃ±o sin tÃ­tulo (42).png', 'In vel metus quis nulla venenatis tristique non at nibh. Ut id diam pulvinar, convallis ipsum at, posuere nisi. Vestibulum cursus dolor sit amet nibh luctus ultricies. Etiam augue purus, tristique in tristique quis, dictum ac justo. Pellentesque ultrices eros sed neque lacinia blandit. Phasellus gravida nisi a lorem gravida, id facilisis justo posuere. Sed pretium augue magna, eu porttitor neque volutpat ac. Curabitur quis egestas odio.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent pellentesque non libero non aliquet. Sed eget eros nec nunc cursus rutrum. Sed gravida ex sed massa accumsan tincidunt. Phasellus mollis suscipit ante, porta lobortis nisi dapibus ac. Nullam aliquet venenatis fermentum.'),
(31, 'LOCAL 3', '55 999', 800, '1 mes', 'Disponible', NULL, 'uploads/WhatsApp Image 2023-07-01 at 14.44.07.jpeg,uploads/WhatsApp Image 2023-07-04 at 08.14.16.jpeg,uploads/WhatsApp Image 2023-07-06 at 08.40.12.jpeg,uploads/WhatsApp Image 2023-07-06 at 08.52.40 (1).jpeg,uploads/WhatsApp Image 2023-07-06 at 08.52.40.j', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent pellentesque non libero non aliquet. Sed eget eros nec nunc cursus rutrum. Sed gravida ex sed massa accumsan tincidunt. Phasellus mollis suscipit ante, porta lobortis nisi dapibus ac. Nullam aliquet venenatis fermentum.\r\n\r\nMorbi ac orci et augue consectetur dignissim nec eget orci. Praesent sapien erat, eleifend eget dolor at, tristique sagittis nisl. Ut orci erat, vehicula in sagittis vel, condimentum ut leo. Nam vitae pellentesque lacus. Donec eget quam aliquet, aliquet nunc sed, suscipit orci. Maecenas vitae felis ac orci tincidunt feugiat. Sed non varius sem.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `usuario` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`usuario`, `pass`) VALUES
('celina', ''),
('hola', '1234'),
('chau', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `locales`
--
ALTER TABLE `locales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
