-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2022 a las 22:00:23
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cobiene`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `rol` varchar(1) NOT NULL,
  `cip_user` text NOT NULL,
  `encrypt_cip` text NOT NULL,
  `password_user` text NOT NULL,
  `dni_user` text NOT NULL,
  `name_user` varchar(150) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `phone_user` varchar(20) NOT NULL,
  `cip_image_user` varchar(60) NOT NULL,
  `dni_image_user` varchar(60) NOT NULL,
  `create_user` varchar(50) NOT NULL,
  `condition_user` varchar(2) NOT NULL,
  `cod_validation_user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `rol`, `cip_user`, `encrypt_cip`, `password_user`, `dni_user`, `name_user`, `email_user`, `phone_user`, `cip_image_user`, `dni_image_user`, `create_user`, `condition_user`, `cod_validation_user`) VALUES
(11, '2', '1f6af25724fd7ed765d75d53f3aecf8ba3e748ad53a90133ef1ea853c72c69a7ac434a1c3cd42bfbb618b49dde74f1c190279b32d264debb0552a42430346dfb0OqvQmoWNdYE8m0YH2UNQvB6nsO35IF9G2H1yEqGmjE=', '0d72b3f707ba1c849c99cecba0bfcdbc', '52f330f3389bbc44b57a145ea4d31860', '123456789', 'Emerson Valenzuela', 'valenestradam1@gmail.com', '914052173', '23032022032250_42822.jpg', '23032022032250_43636.jpg', '2022-03-23T15:22:50-06:00', '1', '2GVMyrIjiL4gL6uHsvHkam3RNZTCKZ7W2FHpuxK49hTwwqLnIq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
