-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-06-2015 a las 21:27:54
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u663525905_bdweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` varchar(20) NOT NULL,
  `nom_categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE IF NOT EXISTS `detalle_pedidos` (
  `id_pedido` varchar(20) NOT NULL,
  `id_producto` varchar(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor_unitario` bigint(20) NOT NULL,
  KEY `fk_detalle_pedidos_pedidos1_idx` (`id_pedido`),
  KEY `fk_detalle_pedidos_productos1_idx` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id_estado` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE IF NOT EXISTS `facturas` (
  `id_factura` varchar(20) NOT NULL,
  `fecha_factura` date NOT NULL,
  `id_pedido` varchar(20) NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `fk_facturas_pedidos1_idx` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id_pedido` varchar(20) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `id_usuario` varchar(20) NOT NULL,
  `id_estado` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `fk_pedidos_usuarios1_idx` (`id_usuario`),
  KEY `fk_pedidos_estados1_idx` (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
  `id_persona` varchar(20) NOT NULL,
  `nom_persona` varchar(45) NOT NULL,
  `ape_persona` varchar(45) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `nom_persona`, `ape_persona`, `sexo`, `fecha_nacimiento`, `direccion`, `correo`, `telefono`) VALUES
('1064', 'Miguel Jose', 'Palomino Cerpa', 'm', '2015-05-14', ' manzana m casa 17', 'ing.migueljose@outlook.com', '3216968715'),
('1065', 'jeiner', 'mellado', 'm', '1993-11-30', 'calle 7 #29-90', 'je_in_er@hotmail.com', '3135028786');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` varchar(20) NOT NULL,
  `nom_producto` varchar(45) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor_producto` bigint(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `id_categoria` varchar(20) NOT NULL,
  `id_proveedor` varchar(20) NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `fk_productos_categorias_idx` (`id_categoria`),
  KEY `fk_productos_proveedores1_idx` (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` varchar(20) NOT NULL,
  `nom_proveedor` varchar(45) NOT NULL,
  `ape_proveedor` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` varchar(20) NOT NULL,
  `rol` varchar(45) NOT NULL,
  `user` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `acceso` varchar(45) NOT NULL,
  `id_persona` varchar(20) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `user_UNIQUE` (`user`),
  KEY `fk_usuarios_personas1_idx` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `rol`, `user`, `pass`, `acceso`, `id_persona`) VALUES
('1', 'Administrador', 'Amiguel', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1', '1064'),
('2', 'Vendedor', 'Vmiguel', 'ce8cbeb17e5aa098c19f611af9011f646765265d', '1', '1065'),
('3', 'Cliente', 'Cmiguel', 'd2a04d71301a8915217dd5faf81d12cffd6cd958', '1', '1065');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD CONSTRAINT `fk_detalle_pedidos_pedidos1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_pedidos_productos1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `fk_facturas_pedidos1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_estados1` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categorias` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_proveedores1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_personas1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
