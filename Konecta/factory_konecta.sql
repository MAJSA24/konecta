-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-06-2023 a las 22:20:36
-- Versión del servidor: 5.7.41
-- Versión de PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `factory_konecta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `codigo` varchar(5) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `descripcion` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`codigo`, `descripcion`) VALUES
('2', 'CATEGORIA -B-'),
('1', 'CATEGORIA -A-'),
('3', 'CATEGORIA -C-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `categoria` varchar(5) NOT NULL,
  `id` varchar(5) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `referencia` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`categoria`, `id`, `nombre`, `referencia`, `precio`, `peso`, `stock`, `fecha`) VALUES
('1', '1', 'PRODUCTO A1', 'P_A1', 1000, 1, 20, '2023-06-06'),
('1', '2', 'PRODUCTO A2', 'P_A2', 2000, 2, 580, '2023-04-20'),
('2', '3', 'PRODUCTO B1', 'P_B1', 5000, 5, 200, '2023-05-20'),
('2', '4', 'PRODUCTO B2', 'P_B2', 6000, 20, 6900, '2023-06-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` varchar(15) NOT NULL,
  `usuario` varchar(50) NOT NULL DEFAULT '',
  `contrasena` varchar(32) NOT NULL DEFAULT '',
  `rol` varchar(5) NOT NULL DEFAULT '',
  `email` varchar(50) DEFAULT NULL,
  `fecha_reg` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`, `rol`, `email`, `fecha_reg`) VALUES
('1', 'konecta', 'konecta', '1', '.', '06/06/2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `fecha` date NOT NULL,
  `producto` varchar(5) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `orden` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`fecha`, `producto`, `cantidad`, `precio`, `total`, `orden`) VALUES
('2023-06-06', '1', 50, 1000, 50000, 1),
('2023-06-06', '1', 80, 1000, 80000, 2),
('2023-06-06', '2', 20, 2000, 40000, 3),
('2023-06-05', '3', 50, 5000, 250000, 4),
('2023-06-07', '4', 100, 6000, 600000, 5),
('2023-06-07', '1', 350, 1000, 350000, 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`rol`,`id`,`usuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`orden`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
