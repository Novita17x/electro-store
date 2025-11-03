-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2024 a las 14:10:14
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
-- Base de datos: `electrof`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `fecha_compra` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `id_cliente`, `nombre_producto`, `precio`, `imagen`, `categoria`, `fecha_compra`) VALUES
(1, 2, 'MacBook', 3000.00, 'img/laptop/MacBook_Pro.png', 'laptop', '2024-05-28'),
(2, 2, 'MacBook', 3000.00, 'img/laptop/MacBook_Pro.png', 'laptop', '2024-05-28'),
(3, 2, 'Lenovo ThinkPad X1 Carbon', 2200.00, 'img/laptop/Lenovo_ThinkPad_X1_Carbon.png', 'laptop', '2024-05-28'),
(4, 2, 'Dell XPS 13', 2300.00, 'img/laptop/Dell_XPS_13.png', 'laptop', '2024-05-28'),
(5, 2, 'Asus ROG Zephyrus G14', 2500.00, 'img/laptop/Asus_ROG_Zephyrus_G14.png', 'laptop', '2024-05-28'),
(6, 2, 'Microsoft Surface Laptop 4', 2600.00, 'img/laptop/Microsoft_Surface_Laptop_4.png', 'laptop', '2024-05-28'),
(7, 2, 'Sony Cyber-shot RX100-VII', 4995.00, 'img/camaras/Sony_Cyber_shot_RX100_VII.png', 'camara', '2024-05-28'),
(8, 2, 'Dell XPS 13', 2300.00, 'img/laptop/Dell_XPS_13.png', 'laptop', '2024-05-28'),
(9, 2, 'Microsoft Surface Laptop 4', 2600.00, 'img/laptop/Microsoft_Surface_Laptop_4.png', 'laptop', '2024-05-28'),
(10, 2, 'Asus ROG Zephyrus G14', 2500.00, 'img/laptop/Asus_ROG_Zephyrus_G14.png', 'laptop', '2024-05-28'),
(11, 2, 'HyperX Cloud II', 474.00, 'img/audifono/HyperX_Cloud_II.png', 'audifono', '2024-05-28'),
(12, 2, 'SteelSeries Arctis Pro', 298.00, 'img/audifono/SteelSeries_Arctis_Pro.png', 'audifono', '2024-05-28'),
(13, 2, 'Microsoft Surface Laptop 4', 2600.00, 'img/laptop/Microsoft_Surface_Laptop_4.png', 'laptop', '2024-05-28'),
(14, 2, 'MacBook', 3000.00, 'img/laptop/MacBook_Pro.png', 'laptop', '2024-05-28'),
(15, 2, 'Asus ROG Zephyrus G14', 2500.00, 'img/laptop/Asus_ROG_Zephyrus_G14.png', 'laptop', '2024-05-28'),
(16, 2, 'Nikon Z6 II', 5999.00, 'img/camaras/Nikon_Z6_II.png', 'camara', '2024-05-28'),
(17, 2, 'GoPro Hero 11 Black', 3498.00, 'img/camaras/GoPro_Hero_11_Black.png', 'camara', '2024-05-28'),
(18, 2, 'Razer Blade 15', 3500.00, 'img/laptop/Razer_Blade_15.png', 'laptop', '2024-05-28'),
(19, 21, 'Sony A7-IV', 1796.95, 'img/camaras/Sony_A7_IV.png', 'camara', '2024-05-28'),
(20, 21, 'Sony Cyber-shot RX100-VII', 4995.00, 'img/camaras/Sony_Cyber_shot_RX100_VII.png', 'camara', '2024-05-28'),
(21, 2, 'Dell XPS 13', 2300.00, 'img/laptop/Dell_XPS_13.png', 'laptop', '2024-05-28'),
(22, 21, 'Logitech-G Pro X', 658.00, 'img/audifono/Logitech-G-Pro_X.png', 'audifono', '2024-05-28'),
(23, 21, 'Microsoft Surface Laptop 4', 2600.00, 'img/laptop/Microsoft_Surface_Laptop_4.png', 'laptop', '2024-05-28'),
(24, 21, 'Razer Blade 15', 3500.00, 'img/laptop/Razer_Blade_15.png', 'laptop', '2024-05-28'),
(25, 21, 'Acer Swift 3', 2800.00, 'img/laptop/Acer_Swift_3.png', 'laptop', '2024-05-28'),
(26, 21, 'SteelSeries Arctis Pro', 298.00, 'img/audifono/SteelSeries_Arctis_Pro.png', 'audifono', '2024-05-28'),
(27, 21, 'Logitech-G Pro X', 658.00, 'img/audifono/Logitech-G-Pro_X.png', 'audifono', '2024-05-28'),
(28, 21, 'Sony Cyber-shot RX100-VII', 4995.00, 'img/camaras/Sony_Cyber_shot_RX100_VII.png', 'Cámara', '2024-05-28'),
(29, 21, 'Lenovo ThinkPad X1 Carbon', 2200.00, 'img/laptop/Lenovo_ThinkPad_X1_Carbon.png', 'Laptop', '2024-05-28'),
(30, 21, 'MacBook', 3000.00, 'img/laptop/MacBook_Pro.png', 'Laptop', '2024-05-28'),
(31, 21, 'Razer Blade 15', 3500.00, 'img/laptop/Razer_Blade_15.png', 'Laptop', '2024-05-28'),
(32, 22, 'Asus ROG Zephyrus G14', 2500.00, 'img/laptop/Asus_ROG_Zephyrus_G14.png', 'Laptop', '2024-05-28'),
(33, 22, 'Acer Swift 3', 2800.00, 'img/laptop/Acer_Swift_3.png', 'Laptop', '2024-05-28'),
(34, 22, 'MacBook', 3000.00, 'img/laptop/MacBook_Pro.png', 'Laptop', '2024-05-28'),
(35, 22, 'Lenovo ThinkPad X1 Carbon', 2200.00, 'img/laptop/Lenovo_ThinkPad_X1_Carbon.png', 'Laptop', '2024-05-28'),
(36, 22, 'HyperX Cloud II', 474.00, 'img/audifono/HyperX_Cloud_II.png', 'Audífono', '2024-05-28'),
(37, 22, 'Microsoft Surface Laptop 4', 2600.00, 'img/laptop/Microsoft_Surface_Laptop_4.png', 'Laptop', '2024-05-28'),
(38, 22, 'MacBook', 3000.00, 'img/laptop/MacBook_Pro.png', 'Laptop', '2024-05-28'),
(39, 23, 'SteelSeries Arctis Pro', 298.00, 'img/audifono/SteelSeries_Arctis_Pro.png', 'Audífono', '2024-05-28'),
(40, 23, 'Sennheiser HD-660 S', 2421.00, 'img/audifono/Sennheiser_HD_660_S.png', 'Audífono', '2024-05-28'),
(41, 23, 'Lenovo ThinkPad X1 Carbon', 2200.00, 'img/laptop/Lenovo_ThinkPad_X1_Carbon.png', 'Laptop', '2024-05-28'),
(42, 23, 'Logitech-G Pro X', 658.00, 'img/audifono/Logitech-G-Pro_X.png', 'Audífono', '2024-05-28'),
(43, 23, 'Dell XPS 13', 2300.00, 'img/laptop/Dell_XPS_13.png', 'Laptop', '2024-05-28'),
(44, 23, 'HP Spectre x360', 2000.00, 'img/laptop/HP_Spectre_x360.png', 'Laptop', '2024-05-28'),
(45, 23, 'Canon EOS-R5', 3899.00, 'img/camaras/Canon_EOS_R5.png', 'Cámara', '2024-05-28'),
(46, 23, 'Microsoft Surface Laptop 4', 2600.00, 'img/laptop/Microsoft_Surface_Laptop_4.png', 'Laptop', '2024-05-28'),
(47, 2, 'SteelSeries Arctis Pro', 298.00, 'img/audifono/SteelSeries_Arctis_Pro.png', 'Audífono', '2024-05-28'),
(48, 24, 'Acer Swift 3', 2800.00, 'img/laptop/Acer_Swift_3.png', 'laptop', '2024-05-28'),
(49, 24, 'Dell XPS 13', 2300.00, 'img/laptop/Dell_XPS_13.png', 'laptop', '2024-05-28'),
(50, 24, 'Canon EOS-R5', 3899.00, 'img/camaras/Canon_EOS_R5.png', 'camara', '2024-05-28'),
(51, 24, 'Canon EOS-R5', 3899.00, 'img/camaras/Canon_EOS_R5.png', 'camara', '2024-05-28'),
(52, 24, 'HyperX Cloud II', 474.00, 'img/audifono/HyperX_Cloud_II.png', 'audifono', '2024-05-28'),
(53, 24, 'Lenovo ThinkPad X1 Carbon', 2200.00, 'img/laptop/Lenovo_ThinkPad_X1_Carbon.png', 'laptop', '2024-05-28'),
(54, 24, 'Nikon Z6 II', 5999.00, 'img/camaras/Nikon_Z6_II.png', 'camara', '2024-05-28'),
(55, 24, 'Razer Blade 15', 3500.00, 'img/laptop/Razer_Blade_15.png', 'laptop', '2024-05-28'),
(56, 24, 'Razer Blade 15', 3500.00, 'img/laptop/Razer_Blade_15.png', 'laptop', '2024-05-28'),
(57, 24, 'Sony WH-1000XM4', 939.00, 'img/audifono/Sony_WH_1000XM4.png', 'audifono', '2024-05-28'),
(58, 24, 'Acer Swift 3', 2800.00, 'img/laptop/Acer_Swift_3.png', 'laptop', '2024-05-28'),
(59, 24, 'HyperX Cloud II', 474.00, 'img/audifono/HyperX_Cloud_II.png', 'audifono', '2024-05-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE `envio` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `distrito` varchar(50) NOT NULL,
  `codigo_postal` varchar(10) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `fecha_envio` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `envio`
--

INSERT INTO `envio` (`id`, `id_cliente`, `direccion`, `pais`, `ciudad`, `distrito`, `codigo_postal`, `celular`, `fecha_envio`) VALUES
(1, 22, 'Mz K9, Lt. 44 Jr. Los Apostoles', 'Perú', 'Lima', 'San Juan de Lurigancho', '15438', '928173645', '2024-05-28'),
(2, 22, 'Mz K9, Lt. 44 Jr. Los Apostoles', 'Perú', 'Lima', 'San Juan de Lurigancho', '15438', '928173645', '2024-05-28'),
(3, 23, 'Mz J3, Lt. 36 Jr. La Union', 'Perú', 'Lima', 'Callao', '15438', '93845721', '2024-05-28'),
(4, 23, 'Mz H6, Lt.12 Jr. Los Postes', 'Perú', 'Lima', 'Callao', '15438', '928136123', '2024-05-28'),
(5, 23, 'Mz M4, Lt. 22 Jr. Hakuna Matata', 'Narnia', 'Nunca jamas', 'El que sea', '15438', '987254637', '2024-05-28'),
(6, 2, 'MZ E9, Lt 44 Jr. Los jardines', 'Perú', 'Lima', 'SJL', '15438', '928371234', '2024-05-28'),
(7, 24, '33, Asentamiento Humano Jaime Zubieta, San Juan De Lurigancho - Lima - Lima', 'Perú', 'San Juan De Lurigancho', 'rq', '15438', '948271626', '2024-05-28'),
(8, 24, '33, Asentamiento Humano Jaime Zubieta, San Juan De Lurigancho - Lima - Lima', 'Perú', 'San Juan De Lurigancho', 'vvvvvvv', '15438', '928471627', '2024-05-28'),
(9, 24, '33, Asentamiento Humano Jaime Zubieta, San Juan De Lurigancho - Lima - Lima', 'Perú', 'San Juan De Lurigancho', 'vvvvvvv', '15438', '928471627', '2024-05-28'),
(10, 24, '33, Asentamiento Humano Jaime Zubieta, San Juan De Lurigancho - Lima - Lima', 'Perú', 'San Juan De Lurigancho', 'vvvvvvv', '15438', '928471627', '2024-05-28'),
(11, 24, '33, Asentamiento Humano Jaime Zubieta, San Juan De Lurigancho - Lima - Lima', 'Perú', 'San Juan De Lurigancho', 'fffffffffffffffffffffffffffffffff', '15438', '961348674', '2024-05-28'),
(12, 24, '33, Asentamiento Humano Jaime Zubieta, San Juan De Lurigancho - Lima - Lima', 'Perú', 'San Juan De Lurigancho', 'San Juan de Lurigancho', '15438', '94827162', '2024-05-28'),
(13, 24, '33, Asentamiento Humano Jaime Zubieta, San Juan De Lurigancho - Lima - Lima', 'Perú', 'San Juan De Lurigancho', 'El que sea', '15438', '928172345', '2024-05-28'),
(14, 24, '33, Asentamiento Humano Jaime Zubieta, San Juan De Lurigancho - Lima - Lima', 'Perú', 'San Juan De Lurigancho', 'tggdsgdgdsgds', '15438', '928471627', '2024-05-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id_cliente` int(11) NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id_cliente`, `nombres`, `apellidos`, `correo`, `pass`) VALUES
(1, 'Javier Elio', 'Guzman Huacho', 'guzmanH1@gmail.com', 'huachoElio'),
(2, 'Elsa Julia', 'Mendoza Zamora', 'elsaZamora_13@gmail.com', 'esaZamo13'),
(16, 'julio', 'Aguilar', 'julio@gmail.com', 'julio'),
(17, 'Mario', 'Bross', 'mario@gmail.com', 'mario123'),
(18, 'Fernando Alonso', 'Cabanillas Huacho', 'fernan12@gmail.com', 'fernan12'),
(19, 'Keymer Joel', 'Suxe Santacruz', 'keymer20@gmail.com', 'keymer20'),
(20, 'Luis Diego', 'Gutierrez Serpa', 'luis30@gmail.com', 'luis30'),
(21, 'Fabricio', 'Liz Cespedes', 'fabri01@gmail.com', 'fabri01'),
(22, 'Jimmy', 'Aguilar Condores', 'jimmy20@gmail.com', 'jimmy20'),
(23, 'Anna', 'Armas Perez', 'anna11@gmail.com', 'anna11'),
(24, 'Pepe', 'Gonzales ', 'pepe@gmail.com', 'pepe');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `envio`
--
ALTER TABLE `envio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `envio`
--
ALTER TABLE `envio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `registro` (`id_cliente`);

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `registro` (`id_cliente`);

--
-- Filtros para la tabla `envio`
--
ALTER TABLE `envio`
  ADD CONSTRAINT `envio_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `registro` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
