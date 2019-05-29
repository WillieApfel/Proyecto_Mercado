-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2019 a las 17:49:28
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_mensaje` int(20) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `asunto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_mensaje`, `nombre_usuario`, `nombres`, `correo`, `telefono`, `asunto`) VALUES
(6, '', 'Willie Antonio Manzano Rodríguez', 'williemr17@gmail.com', '04124095885', 'nada funciona'),
(7, '', 'Willie Antonio Manzano Rodríguez', 'williemr17@gmail.com', '04124095885', 'Soy un Sadico'),
(8, '', 'Carolina Rodriguez', 'mcarolr29@gmail.com', '04244406924', 'Muy buen servicio.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permisos` int(5) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permisos`, `rol`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(8) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `id_permisos` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombres`, `apellidos`, `correo`, `nombre_usuario`, `clave`, `id_permisos`) VALUES
(27171641, 'Daniela ', 'Gomez', 'danielagomez007@hotmail.com', 'danielavgj', 'gomez998', 2),
(27488851, 'Carlos Alberto', 'Zapata Cardozo', 'kabetsinespacios@gmail.com', 'kabet', 'salitre23', 1),
(27877535, 'Willie Antonio', 'Manzano Rodriguez', 'williemr17@gmail.com', 'WillieApfel', '12345678', 1),
(27877536, 'Ameriquita', 'Figuerita', 'amerikcfm75@gmail.com', 'Americafiguera', 'america1234', 2),
(27877537, 'oswaldo manuel', 'cabrera licon', 'cualquiervaina@gmail.com', 'oswalpipi', '123456', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `tipo`, `imagen`, `precio`, `cantidad`) VALUES
(1, 'Aceite', 'Alimentos', 'multimedia/img_productos/Alimentos/aceite.jpg', 10000, 100),
(2, 'Adobo', 'Alimentos', 'multimedia/img_productos/Alimentos/adobo.jpg', 5000, 100),
(3, 'Arroz', 'Alimentos', 'multimedia/img_productos/Alimentos/arroz.jpg', 10000, 100),
(4, 'Avena', 'Alimentos', 'multimedia/img_productos/Alimentos/avena.jpg', 10000, 100),
(5, 'Cafe', 'Alimentos', 'multimedia/img_productos/Alimentos/cafe.jpg', 5000, 100),
(6, 'Chicha', 'Alimentos', 'multimedia/img_productos/Alimentos/chicha.jpg', 5000, 100),
(7, 'Nucita', 'Alimentos', 'multimedia/img_productos/Alimentos/nucita.jpg', 10000, 100),
(8, 'Pepitona', 'Alimentos', 'multimedia/img_productos/Alimentos/pepitona.jpg', 5000, 100),
(9, 'Jamon', 'Charcuteria', 'multimedia/img_productos/Charcuteria/jamon.jpg', 10000, 100),
(10, 'Jamon Serrano', 'Charcuteria', 'multimedia/img_productos/Charcuteria/jamon_serrano.jpg', 10000, 100),
(11, 'Mortadela', 'Charcuteria', 'multimedia/img_productos/Charcuteria/mortadela.jpg', 5000, 100),
(12, 'Queso Amarillo', 'Charcuteria', 'multimedia/img_productos/Charcuteria/queso_amarillo.jpg', 20000, 100),
(13, 'Queso Blanco', 'Charcuteria', 'multimedia/img_productos/Charcuteria/queso_blanco.jpg', 10000, 100),
(14, 'Salchichas', 'Charcuteria', 'multimedia/img_productos/Charcuteria/salchichas.jpg', 10000, 100),
(15, 'Crema Dental', 'Cosmeticos', 'multimedia/img_productos/Cosmeticos/crema_dental.jpg', 5000, 100),
(16, 'Desodorante', 'Cosmeticos', 'multimedia/img_productos/Cosmeticos/desodorante.jpg', 5000, 100),
(17, 'Gel Antibacterial', 'Cosmeticos', 'multimedia/img_productos/Cosmeticos/gel_antibacterial.jpg', 10000, 100),
(18, 'Jabon Liquido', 'Cosmeticos', 'multimedia/img_productos/Cosmeticos/jabon_liquido.jpg', 5000, 100),
(19, 'Shampoo', 'Cosmeticos', 'multimedia/img_productos/Cosmeticos/shampoo.jpg', 10000, 100),
(20, 'Cambur', 'Frutas y Verduras', 'multimedia/img_productos/Frutas_Verduras/cambur.jpg', 2000, 100),
(21, 'Lechuga', 'Frutas y Verduras', 'multimedia/img_productos/Frutas_Verduras/lechuga.jpg', 5000, 100),
(22, 'Limon', 'Frutas y Verduras', 'multimedia/img_productos/Frutas_Verduras/limon.jpg', 4000, 100),
(23, 'Manzana', 'Frutas y Verduras', 'multimedia/img_productos/Frutas_Verduras/manzana.jpg', 8000, 100),
(24, 'Naranja', 'Frutas y Verduras', 'multimedia/img_productos/Frutas_Verduras/naranja.jpg', 5000, 100),
(25, 'Pera', 'Frutas y Verduras', 'multimedia/img_productos/Frutas_Verduras/pera.jpg', 6000, 100),
(26, 'Platano', 'Frutas y Verduras', 'multimedia/img_productos/Frutas_Verduras/platano_maduro.jpg', 2000, 100),
(27, 'Tomate', 'Frutas y Verduras', 'multimedia/img_productos/Frutas_Verduras/tomate.jpg', 5000, 100),
(28, 'Whiskey Jack Daniel\'s 0.75 lt.', 'Licores', 'multimedia/img_productos/Licores/jack_daniels.jpg', 10000, 100),
(29, 'Ron Macondo 0.70 lt.', 'Licores', 'multimedia/img_productos/Licores/macondo.jpg', 2000, 100),
(30, 'Ron Moruco 0.70 lt.', 'Licores', 'multimedia/img_productos/Licores/moruco.jpg', 2000, 100),
(31, 'Ron Santa Teresa 1.75 lt.', 'Licores', 'multimedia/img_productos/Licores/santa_teresa.jpg', 8000, 100),
(32, 'Ron Ventarron', 'Licores', 'multimedia/img_productos/Licores/ventarron.jpg', 2000, 100),
(33, 'Ambientador', 'Limpieza', 'multimedia/img_productos/Limpieza/ambientador.jpg', 5000, 100),
(34, 'Desinfectante', 'Limpieza', 'multimedia/img_productos/Limpieza/desinfectante.jpg', 5000, 100),
(35, 'Detergente', 'Limpieza', 'multimedia/img_productos/Limpieza/detergente.jpg', 5000, 100),
(36, 'Esponja', 'Limpieza', 'multimedia/img_productos/Limpieza/esponja.jpg', 5000, 100),
(37, 'Jabon Lavaplatos', 'Limpieza', 'multimedia/img_productos/Limpieza/lavaplatos.jpg', 4000, 100),
(38, 'Alpiste Vicone', 'Mascotas', 'multimedia/img_productos/Mascotas/alpiste.jpg', 2000, 100),
(39, 'Purina Catchow', 'Mascotas', 'multimedia/img_productos/Mascotas/catchow.jpg', 10000, 100),
(40, 'Purina Dogchow', 'Mascotas', 'multimedia/img_productos/Mascotas/dogchow.jpg', 10000, 100),
(41, 'Dogourmet', 'Mascotas', 'multimedia/img_productos/Mascotas/dogourmet.jpg', 10000, 100);

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
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permisos`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `id_permisos` (`id_permisos`),
  ADD KEY `nombre_usuario` (`nombre_usuario`);

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
  MODIFY `id_mensaje` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permisos` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27877538;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`id_permisos`) REFERENCES `permisos` (`id_permisos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
