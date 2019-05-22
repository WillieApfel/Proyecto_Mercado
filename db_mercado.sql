-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2019 a las 07:41:49
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_mercado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(20) NOT NULL,
  `cedula1` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_mensaje` int(20) NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `asunto` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_mensaje`, `nombres`, `correo`, `telefono`, `asunto`) VALUES
(6, 'Willie Antonio Manzano Rodríguez', 'williemr17@gmail.com', '04124095885', 'nada funciona'),
(7, 'Willie Antonio Manzano Rodríguez', 'williemr17@gmail.com', '04124095885', 'Soy un Sadico'),
(8, 'Carolina Rodriguez', 'mcarolr29@gmail.com', '04244406924', 'Muy buen servicio.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(8) NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre_usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombres`, `apellidos`, `correo`, `nombre_usuario`, `clave`) VALUES
(27171641, 'Daniela ', 'Gomez', 'danielagomez007@hotmail.com', 'danielavgj', 'gomez998'),
(27488851, 'Carlos Alberto', 'Zapata Cardozo', 'kabetsinespacios@gmail.com', 'kabet', 'salitre23'),
(27877535, 'Willie Antonio', 'Manzano Rodriguez', 'williemr17@gmail.com', 'WillieApfel', '12345678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `tipo`, `imagen`, `precio`) VALUES
(1, 'Aceite', 'Alimento', 'multimedia/img_productos/Alimentos/aceite.jpg', 10000),
(2, 'Adobo', 'Alimento', 'multimedia/img_productos/Alimentos/adobo.jpg', 5000),
(3, 'Arroz', 'Alimento', 'multimedia/img_productos/Alimentos/arroz.jpg', 10000),
(4, 'Avena', 'Alimento', 'multimedia/img_productos/Alimentos/avena.jpg', 10000),
(5, 'Cafe', 'Alimento', 'multimedia/img_productos/Alimentos/cafe.jpg', 5000),
(6, 'Chicha', 'Alimento', 'multimedia/img_productos/Alimentos/chicha.jpg', 5000),
(7, 'Nucita', 'Alimento', 'multimedia/img_productos/Alimentos/nucita.jpg', 10000),
(8, 'Pepitona', 'Alimento', 'multimedia/img_productos/Alimentos/pepitona.jpg', 5000),
(9, 'Jamon', 'Charcuteria', 'multimedia/img_productos/Charcuteria/jamon.png', 10000),
(10, 'Jamon Serrano', 'Charcuteria', 'multimedia/img_productos/Charcuteria/jamon_serrano.png', 10000),
(11, 'Mortadela', 'Charcuteria', 'multimedia/img_productos/Charcuteria/mortadela.png', 5000),
(12, 'Queso Amarillo', 'Charcuteria', 'multimedia/img_productos/Charcuteria/queso_amarillo.png', 20000),
(13, 'Queso Blanco', 'Charcuteria', 'multimedia/img_productos/Charcuteria/queso_blanco.png', 10000),
(14, 'Salchichas', 'Charcuteria', 'multimedia/img_productos/Charcuteria/salchichas.png', 10000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_mensaje` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27877561;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
