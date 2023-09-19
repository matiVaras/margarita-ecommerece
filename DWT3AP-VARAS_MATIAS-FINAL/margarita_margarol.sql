-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2023 a las 23:35:16
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `margarita_margarol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre`) VALUES
(1, 'Margarita Margarol');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id`, `nombre`) VALUES
(1, 'Jersey'),
(2, 'Algodón'),
(3, 'Nylon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prenda`
--

CREATE TABLE `prenda` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `imagen` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prenda`
--

INSERT INTO `prenda` (`id`, `nombre`, `imagen`) VALUES
(1, 'Remeras', ''),
(2, 'Medias', ''),
(3, 'Camperas', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(256) NOT NULL,
  `prenda_id` int(10) UNSIGNED NOT NULL,
  `talle` varchar(256) NOT NULL,
  `temporada_id` int(10) UNSIGNED NOT NULL,
  `material_id` int(10) UNSIGNED NOT NULL,
  `marca_id` int(10) UNSIGNED NOT NULL,
  `descripcion` text NOT NULL,
  `portada` varchar(256) NOT NULL,
  `precio` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `titulo`, `prenda_id`, `talle`, `temporada_id`, `material_id`, `marca_id`, `descripcion`, `portada`, `precio`) VALUES
(1, 'Remera Negra', 1, 'XL - L - M - S', 1, 1, 1, 'REMERA LISA DE JERSEY', 'remeranegra.png', 3799.00),
(2, 'Remera Gris', 1, 'XL - L - M - S', 1, 1, 1, 'REMERA LISA DE JERSEY', 'remeragris.png', 3799.00),
(3, 'Marvel Especial', 1, 'XL - L - M - S', 1, 1, 1, 'REMERA ESPECIAL DE MARVEL COMICS', 'remera-marvel-2.png', 3799.00),
(4, 'Remera Azul', 1, 'XL - L - M - S', 1, 1, 1, 'REMERA LISA DE JERSEY', 'remeraazul.png', 3799.00),
(5, 'Campera Negra', 3, 'XL - L - M - S', 3, 3, 1, 'CAMPERA COLOR LISO', 'camperanegra.png', 6499.00),
(6, 'Buzo Flash Rojo', 3, 'XL - L - M - S', 3, 3, 1, 'CAMPERA COLOR LISO', 'buzo-flash-1.png', 6499.00),
(7, 'Campera Blanca', 3, 'XL - L - M - S', 3, 3, 1, 'CAMPERA COLOR LISO', 'camperablanca.png', 6499.00),
(8, 'Campera Azul', 3, 'XL - L - M - S', 3, 3, 1, 'CAMPERA COLOR LISO', 'camperaazul.png', 6499.00),
(9, 'Medias Negro', 2, '38-42 arg', 2, 2, 1, 'CALZETINES SUABES COLOR LISO', 'mediasnegras.png', 1280.00),
(10, 'Medias Gris', 2, '38-42 arg', 2, 2, 1, 'CALZETINES SUABES COLOR LISO', 'mediasgrises.png', 1280.00),
(11, 'Medias Blanco', 2, '38-42 arg', 2, 2, 1, 'CALZETINES SUABES COLOR LISO', 'mediasblancas.png', 1280.00),
(12, 'Medias Azul', 2, '38-42 arg', 2, 2, 1, 'CALZETINES SUABES COLOR LISO', 'mediasazules.png', 1280.00),
(13, 'Tortugas Ninja', 3, 'XL - L - M - S', 3, 3, 1, 'CAMPERA COLOR LISO', 'buzo-tortugas-1.png', 6499.00),
(16, 'Marvel Comics', 1, 'XL - L - M - S', 1, 1, 1, 'REMERA LISA DE JERSEY', 'remera-marvel-1.png', 3799.00),
(17, 'Remera Blanca', 1, 'XL - L - M - S', 1, 1, 1, 'REMERA LISA DE JERSEY', 'remerablanca.png', 3799.00),
(18, 'DC Comics', 1, 'XL - L - M - S', 1, 1, 1, 'REMERA LISA DE JERSEY', 'remera-dc-1.png', 3799.00),
(20, 'Campera Gris', 3, 'XL - L - M - S', 3, 3, 1, 'CAMPERA COLOR LISO', 'camperagris.png', 6499.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_x_prendas`
--

CREATE TABLE `productos_x_prendas` (
  `id` int(10) UNSIGNED NOT NULL,
  `producto_id` int(10) UNSIGNED NOT NULL,
  `prenda_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos_x_prendas`
--

-- INSERT INTO `prenda` (`id`, `producto_id`, `prenda_id`) VALUES
-- (1, 1, 1),
-- (2, 2, 2),
-- (3, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporada`
--

CREATE TABLE `temporada` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `temporada`
--

INSERT INTO `temporada` (`id`, `nombre`) VALUES
(1, 'Primavera/Verano'),
(2, 'Verano/Invierno'),
(3, 'Otoño/Invierno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `contraseña` varchar(256) NOT NULL,
  `roles` enum('usuario','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre_usuario`, `nombre_completo`, `contraseña`, `roles`) VALUES
(1, 'asd@asd.com', 'mati', 'mati', '$2y$10$HCqV6WnKfy/7oSReicYgmuW4ASVDtXDm08Ekl14LwfiY1/DYdjLZW', 'admin'),
(3, 'asd@asd.com', 'user', 'user', '$2y$10$HCqV6WnKfy/7oSReicYgmuW4ASVDtXDm08Ekl14LwfiY1/DYdjLZW', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prenda`
--
ALTER TABLE `prenda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prenda_id` (`prenda_id`),
  ADD KEY `temporada_id` (`temporada_id`),
  ADD KEY `material_id` (`material_id`),
  ADD KEY `marca_id` (`marca_id`);

--
-- Indices de la tabla `productos_x_prendas`
--
ALTER TABLE `productos_x_prendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `prenda_id` (`prenda_id`);

--
-- Indices de la tabla `temporada`
--
ALTER TABLE `temporada`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `prenda`
--
ALTER TABLE `prenda`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `productos_x_prendas`
--
ALTER TABLE `productos_x_prendas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temporada`
--
ALTER TABLE `temporada`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`prenda_id`) REFERENCES `prenda` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`temporada_id`) REFERENCES `temporada` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_4` FOREIGN KEY (`material_id`) REFERENCES `material` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_x_prendas`
--
ALTER TABLE `productos_x_prendas`
  ADD CONSTRAINT `fk_productos_x_prendas_prenda` FOREIGN KEY (`prenda_id`) REFERENCES `prenda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_productos_x_prendas_producto` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
