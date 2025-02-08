-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2017 a las 02:01:25
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `basecelulares`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `correo` varchar(50) NOT NULL,
  `nive_usua` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `usuario`, `pass`, `nombre`, `apellido`, `correo`, `nive_usua`) VALUES
(1, 'yond', '123456', 'yonathan', 'suarez', 'yonathan@gmail.com', 1),
(2, 'yond1994', '123456', 'YONATHAN DOS', 'SUAREZ', 'daniel@hotmail.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id_movimientos` int(11) NOT NULL,
  `cantidadm` int(30) NOT NULL,
  `fecha_movimiento` datetime NOT NULL,
  `tipo_movimiento` varchar(50) NOT NULL,
  `admin` varchar(30) NOT NULL,
  `id_producto_m` int(50) NOT NULL,
  `motivo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id_movimientos`, `cantidadm`, `fecha_movimiento`, `tipo_movimiento`, `admin`, `id_producto_m`, `motivo`) VALUES
(42, 2, '2016-09-13 04:34:42', 'ENTRADA', 'yonathan', 7, 'compra'),
(43, 1, '2016-09-13 04:37:56', 'ENTRADA', 'yonathan', 25, 'reparacion'),
(44, 1, '2016-09-13 15:57:08', 'ENTRADA', 'yonathan', 8, 'compra'),
(45, 1, '2016-09-13 15:59:28', 'ENTRADA', 'yonathan', 25, 'reparacion'),
(46, 0, '2016-09-13 16:00:16', 'SALIDA', 'yonathan', 9, 'entrega');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_productos` int(11) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `marca` varchar(40) NOT NULL,
  `cantidad` int(20) DEFAULT NULL,
  `costo` bigint(30) NOT NULL,
  `p_publico` int(30) NOT NULL,
  `provedor` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_productos`, `modelo`, `descripcion`, `marca`, `cantidad`, `costo`, `p_publico`, `provedor`, `estado`) VALUES
(7, 'TELEFONO', 'EVOLUXION 1', 'HUEAWAI', 2, 50000, 80000, 'colcenter', 'NUEVO'),
(8, 'TELEFONO', 'GALAXI S3', 'SAMSUNG', 1, 100000, 130000, '', 'USADO'),
(9, 'TELEFONO', 'EVOLUXION 2', 'HUEAWAI', 0, 50000, 80000, 'celventa', 'NUEVO'),
(10, 'TELEFONO', 'EVOLUXION 3', 'HUEAWAI', 0, 100000, 130000, 'sdaasa', 'NUEVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller`
--

CREATE TABLE `taller` (
  `modelo` varchar(50) NOT NULL,
  `descripcion_p` varchar(300) NOT NULL,
  `fecha_entrada` datetime NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `n_serie` varchar(50) NOT NULL,
  `falla` varchar(300) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `id_taller` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `taller`
--

INSERT INTO `taller` (`modelo`, `descripcion_p`, `fecha_entrada`, `cliente`, `marca`, `n_serie`, `falla`, `cantidad`, `id_taller`) VALUES
('s3', 'celular', '2016-09-13 04:37:56', '25', 'samsung', 'c1454s', 'no enciende', 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `cedula` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `fechai` varchar(40) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `telefono` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `cedula`, `nombre`, `apellido`, `correo`, `fechai`, `direccion`, `telefono`) VALUES
(25, 789456, 'FREDDY', 'BELSAZAR', 'YON@GMAIL.COM', '2016-09-05', 'CALLE 12 CARRERA 9-10', 48442145);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD UNIQUE KEY `id_movimientos` (`id_movimientos`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_productos`);

--
-- Indices de la tabla `taller`
--
ALTER TABLE `taller`
  ADD PRIMARY KEY (`id_taller`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id_movimientos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `taller`
--
ALTER TABLE `taller`
  MODIFY `id_taller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
