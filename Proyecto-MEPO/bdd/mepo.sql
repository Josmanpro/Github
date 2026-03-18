-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2026 a las 16:43:36
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mepo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ahorro`
--

CREATE TABLE `ahorro` (
  `id_ahorro` int(50) NOT NULL,
  `objetivo` varchar(30) NOT NULL DEFAULT 'Mi meta',
  `monto_disp` int(11) NOT NULL,
  `meta` int(11) NOT NULL,
  `ndocumento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ahorro`
--

INSERT INTO `ahorro` (`id_ahorro`, `objetivo`, `monto_disp`, `meta`, `ndocumento`) VALUES
(15, 'Viaje', 0, 500000, 1016950224),
(16, 'Casa', 0, 700000, 1034990193),
(17, 'Viaje', 0, 250000, 123),
(18, 'Casa', 0, 20000000, 12345);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(3, 'Bebidas'),
(4, 'Lácteos'),
(5, 'Panadería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `categoria_id` int(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria_id`, `precio`, `imagen`) VALUES
(10, 'molipollo', 4, 5000, 'molipollo.jpeg'),
(11, 'Cerveza Corona', 3, 4000, 'cerveza corona.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produ_super`
--

CREATE TABLE `produ_super` (
  `NIT` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'admin'),
(2, 'cliente'),
(3, 'superadmin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supermercados`
--

CREATE TABLE `supermercados` (
  `NIT` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` int(10) NOT NULL,
  `direccion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ndocumento` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `correo_tel` varchar(50) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `estado` enum('pendiente','activo','bloqueado') DEFAULT 'pendiente',
  `rol_id` int(11) DEFAULT 1,
  `supermercado_nit` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `token_expira` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ndocumento`, `nombre`, `apellido`, `correo_tel`, `contrasena`, `estado`, `rol_id`, `supermercado_nit`, `token`, `token_expira`) VALUES
(123, 'Prueba', 'S', 'prueba123@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'activo', 1, NULL, NULL, NULL),
(12345, 'jhon ', 'alvarez', 'jhonalvarez123@gmail.com', '074fe681c9742d991dc00dc287aba5094ff8c678', 'bloqueado', 1, NULL, NULL, NULL),
(1016950224, 'Joseph', 'Alfonso Forero', 'josephalfonsoforero@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'pendiente', 1, NULL, NULL, NULL),
(1034990193, 'Sebas', 'velasquez', 'osoriosebastian314@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'pendiente', 3, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ahorro`
--
ALTER TABLE `ahorro`
  ADD PRIMARY KEY (`id_ahorro`),
  ADD UNIQUE KEY `ndocumento` (`ndocumento`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria` (`categoria_id`);

--
-- Indices de la tabla `produ_super`
--
ALTER TABLE `produ_super`
  ADD PRIMARY KEY (`id`,`NIT`),
  ADD KEY `fk_ps_supermercado` (`NIT`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `supermercados`
--
ALTER TABLE `supermercados`
  ADD PRIMARY KEY (`NIT`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ndocumento`),
  ADD UNIQUE KEY `correo_tel` (`correo_tel`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `fk_usuario_rol` (`rol_id`),
  ADD KEY `fk_usuario_supermercado` (`supermercado_nit`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ahorro`
--
ALTER TABLE `ahorro`
  MODIFY `id_ahorro` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ahorro`
--
ALTER TABLE `ahorro`
  ADD CONSTRAINT `fk_ahorro_usuario` FOREIGN KEY (`ndocumento`) REFERENCES `usuario` (`ndocumento`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `produ_super`
--
ALTER TABLE `produ_super`
  ADD CONSTRAINT `fk_ps_producto` FOREIGN KEY (`id`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `fk_ps_supermercado` FOREIGN KEY (`NIT`) REFERENCES `supermercados` (`NIT`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `fk_usuario_supermercado` FOREIGN KEY (`supermercado_nit`) REFERENCES `supermercados` (`NIT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
