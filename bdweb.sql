-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 18-04-2015 a las 19:01:52
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `bdweb`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `categorias`
-- 

CREATE TABLE `categorias` (
  `id_categoria` varchar(20) NOT NULL,
  `nom_categoria` varchar(45) NOT NULL,
  PRIMARY KEY  (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `categorias`
-- 

INSERT INTO `categorias` VALUES ('1', 'aseo');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `clientes`
-- 

CREATE TABLE `clientes` (
  `id_cliente` varchar(20) NOT NULL,
  `nom_cliente` varchar(45) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  PRIMARY KEY  (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `clientes`
-- 

INSERT INTO `clientes` VALUES ('1067', 'cecilia bolivar', 'f', '1992-08-13', 'calle4 # 13-24', '3131345565', 'cbolivar@hotmail.com');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `detalle_pedidos`
-- 

CREATE TABLE `detalle_pedidos` (
  `id_pedido` varchar(20) NOT NULL,
  `id_producto` varchar(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor_unitario` bigint(20) NOT NULL,
  KEY `fk_detalle_pedidos_pedidos1_idx` (`id_pedido`),
  KEY `fk_detalle_pedidos_productos1_idx` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `detalle_pedidos`
-- 

INSERT INTO `detalle_pedidos` VALUES ('11', '12', 2, 1500);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `empleados`
-- 

CREATE TABLE `empleados` (
  `id_empleado` varchar(20) NOT NULL,
  `nom_empleado` varchar(45) NOT NULL,
  `ape_empleado` varchar(45) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  PRIMARY KEY  (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `empleados`
-- 

INSERT INTO `empleados` VALUES ('1065', 'jeiner', 'mellado', 'm', '1993-11-30', 'calle7 # 29-90', 'je_in_er@hotmail.com', '3135028786');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `estados`
-- 

CREATE TABLE `estados` (
  `id_estado` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `estados`
-- 

INSERT INTO `estados` VALUES ('1', 'activo');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `facturas`
-- 

CREATE TABLE `facturas` (
  `id_factura` varchar(20) NOT NULL,
  `fecha_factura` date NOT NULL,
  `id_pedido` varchar(20) NOT NULL,
  PRIMARY KEY  (`id_factura`),
  KEY `fk_facturas_pedidos1_idx` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `facturas`
-- 

INSERT INTO `facturas` VALUES ('01', '2015-04-18', '11');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pedidos`
-- 

CREATE TABLE `pedidos` (
  `id_pedido` varchar(20) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `id_cliente` varchar(20) NOT NULL,
  `id_usuario` varchar(20) NOT NULL,
  `id_estado` varchar(20) NOT NULL,
  PRIMARY KEY  (`id_pedido`),
  KEY `fk_pedidos_clientes1_idx` (`id_cliente`),
  KEY `fk_pedidos_usuarios1_idx` (`id_usuario`),
  KEY `fk_pedidos_estados1_idx` (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `pedidos`
-- 

INSERT INTO `pedidos` VALUES ('11', '2015-04-18', '1067', '1', '1');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `productos`
-- 

CREATE TABLE `productos` (
  `id_producto` varchar(20) NOT NULL,
  `nom_producto` varchar(45) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor_producto` bigint(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `id_categoria` varchar(20) NOT NULL,
  `id_proveedor` varchar(20) NOT NULL,
  PRIMARY KEY  (`id_producto`),
  KEY `fk_productos_categorias_idx` (`id_categoria`),
  KEY `fk_productos_proveedores1_idx` (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `productos`
-- 

INSERT INTO `productos` VALUES ('12', 'fab', 2, 1500, 'limpia mejor', '1', '1065');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `proveedores`
-- 

CREATE TABLE `proveedores` (
  `id_proveedor` varchar(20) NOT NULL,
  `nom_proveedor` varchar(45) NOT NULL,
  `ape_proveedor` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  PRIMARY KEY  (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `proveedores`
-- 

INSERT INTO `proveedores` VALUES ('1065', 'pedro', 'gomez', '3135028786', 'pgomez@hotmail.com');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios`
-- 

CREATE TABLE `usuarios` (
  `id_usuario` varchar(20) NOT NULL,
  `rol` varchar(45) NOT NULL,
  `user` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `acceso` varchar(45) NOT NULL,
  `id_empleado` varchar(20) NOT NULL,
  PRIMARY KEY  (`id_usuario`),
  KEY `fk_usuarios_empleados1_idx` (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `usuarios`
-- 

INSERT INTO `usuarios` VALUES ('1', 'admin', 'jmellado', '1234', '1', '1065');

-- 
-- Filtros para las tablas descargadas (dump)
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
  ADD CONSTRAINT `fk_pedidos_clientes1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
  ADD CONSTRAINT `fk_usuarios_empleados1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;
