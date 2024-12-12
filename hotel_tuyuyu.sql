-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-10-2023 a las 14:28:40
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotel_tuyuyu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas`
--

DROP TABLE IF EXISTS `caracteristicas`;
CREATE TABLE IF NOT EXISTS `caracteristicas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `caracteristicas`
--

INSERT INTO `caracteristicas` (`id`, `nombre`) VALUES
(7, 'Balcon'),
(8, 'Cocina'),
(9, 'Individual'),
(10, 'Matrimonial'),
(12, 'Departamento'),
(13, 'DOBLE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas_habitacion`
--

DROP TABLE IF EXISTS `caracteristicas_habitacion`;
CREATE TABLE IF NOT EXISTS `caracteristicas_habitacion` (
  `id_caracteristica_habitacion` int NOT NULL AUTO_INCREMENT,
  `id_habitacion` int DEFAULT NULL,
  `id_caracteristica` int DEFAULT NULL,
  PRIMARY KEY (`id_caracteristica_habitacion`),
  KEY `id_habitacion` (`id_habitacion`),
  KEY `id_caracteristica` (`id_caracteristica`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `caracteristicas_habitacion`
--

INSERT INTO `caracteristicas_habitacion` (`id_caracteristica_habitacion`, `id_habitacion`, `id_caracteristica`) VALUES
(8, 7, 8),
(9, 7, 10),
(10, 9, 7),
(11, 9, 8),
(12, 9, 10),
(13, 8, 7),
(14, 8, 8),
(15, 8, 10),
(55, 12, 7),
(56, 12, 8),
(57, 12, 9),
(74, 3, 9),
(75, 3, 10),
(76, 4, 10),
(79, 13, 7),
(80, 13, 8),
(81, 14, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carousel`
--

DROP TABLE IF EXISTS `carousel`;
CREATE TABLE IF NOT EXISTS `carousel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `carousel`
--

INSERT INTO `carousel` (`id`, `image`) VALUES
(3, 'IMG_57866.png'),
(4, 'IMG_92489.png'),
(5, 'IMG_26698.png'),
(6, 'IMG_49446.png'),
(7, 'IMG_62081.png'),
(8, 'IMG_16863.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`) VALUES
(1),
(2),
(5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactanos_hotel`
--

DROP TABLE IF EXISTS `contactanos_hotel`;
CREATE TABLE IF NOT EXISTS `contactanos_hotel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hotel_id` int DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `gmap` varchar(255) DEFAULT NULL,
  `telefono1` varchar(20) DEFAULT NULL,
  `telefono2` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `insta` varchar(100) DEFAULT NULL,
  `tw` varchar(100) DEFAULT NULL,
  `iframe` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hotel_id` (`hotel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `contactanos_hotel`
--

INSERT INTO `contactanos_hotel` (`id`, `hotel_id`, `direccion`, `gmap`, `telefono1`, `telefono2`, `email`, `fb`, `insta`, `tw`, `iframe`) VALUES
(1, 1, 'Dirección del Hotel 123', 'https://maps.app.goo.gl/tAPCUYJyzXH9ZpHZ7', '999999', '222222222', 'hotel1@example.com', 'facebook.com/hotel1', 'instagram.com/hotel1', '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60793.252126000065!2d-63.26240886874997!3d-17.764500199999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e81ca095f563:0x1b46cfe16901bf9f!2sLos Tajibos, a Tribute Portfolio Hotel!5e0!3m2!1ses-419!2sbo!4v1694'),
(2, 2, 'Dirección del Hotel 2', 'https://maps.app.goo.gl/B9x8msRDGJvGL3rB7', '333333333', '444444444', 'hotel2@example.com', 'facebook.com/hotel2', 'instagram.com/hotel2', 'twitter.com/hotel2', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3798.786344861286!2d-63.19077882416084!3d-17.80173568315783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e83c60e0fee1%3A0x33c723af79089409!2sHotel%20Torre!5e0!3m2!1ses-419!2sbo!4v1694900099877!5m2!1ses-419!2sbo\" width=\"600'),
(3, 3, 'Dirección del Hotel 3', 'https://maps.google.com/hotel3', '555555555', '666666666', 'hotel3@example.com', 'facebook.com/hotel3', 'instagram.com/hotel3', 'twitter.com/hotel3', '<iframe src=\"https://www.example.com/hotel3\"></iframe>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

DROP TABLE IF EXISTS `habitacion`;
CREATE TABLE IF NOT EXISTS `habitacion` (
  `id_habitacion` int NOT NULL AUTO_INCREMENT,
  `id_hotel` int DEFAULT NULL,
  `tipo_habitacion` varchar(20) DEFAULT NULL,
  `area` int NOT NULL,
  `cantidad` int NOT NULL,
  `adulto` int DEFAULT NULL,
  `ninos` int NOT NULL,
  `precio_noche` decimal(10,2) DEFAULT NULL,
  `descripcion` varchar(500) NOT NULL,
  `estado` tinyint NOT NULL DEFAULT '1',
  `eliminado` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_habitacion`),
  KEY `id_hotel` (`id_hotel`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id_habitacion`, `id_hotel`, `tipo_habitacion`, `area`, `cantidad`, `adulto`, `ninos`, `precio_noche`, `descripcion`, `estado`, `eliminado`) VALUES
(2, 1, 'Doble', 0, 0, 2, 0, '150.00', '', 1, 0),
(3, 2, 'Doble', 2, 5, 2, 3, '150.00', '453273783783678', 0, 0),
(4, 2, 'Doble', 0, 0, 2, 0, '120.00', '', 0, 0),
(5, 3, 'Individual', 0, 0, 1, 0, '120.00', '', 0, 0),
(6, 3, 'Doble', 0, 0, 2, 0, '180.00', '', 1, 1),
(13, NULL, 'Super VIP', 450, 10, 2, 3, '300.00', '¡Bienvenido a tu oasis de lujo! Nuestra exclusiva habitación de lujo te invita a sumergirte en un mundo de elegancia y confort sin precedentes. Desde el momento en que cruzas la puerta, serás recibido por un ambiente cautivador y sofisticado que te envolverá en un lujo inigualable.\r\n\r\nCon una meticulosa atención al detalle, cada elemento de esta habitación ha sido diseñado para brindarte una experiencia excepcional. Los espacios amplios y exquisitamente decorados te ofrecen un refugio privado do', 0, 0),
(14, NULL, 'SUPER VIP CLAS SOFT', 100, 3, 2, 1, '300.00', 'OSADKFALKSDJFLAKSDJOFASDFADSFDSA', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `id_hotel` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `ubicacion` varchar(50) DEFAULT NULL,
  `numero_habitaciones` int DEFAULT NULL,
  `servicios` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_hotel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `nombre`, `ubicacion`, `numero_habitaciones`, `servicios`) VALUES
(1, 'Hotel A', 'Ciudad X', 100, 'Piscina, Gimnasio, Restaurante'),
(2, 'Hotel B', 'Ciudad Y', 50, 'Wi-Fi, Estacionamiento'),
(3, 'Hotel C', 'Ciudad Z', 80, 'Spa, Bar, Servicio a la habitación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img`
--

DROP TABLE IF EXISTS `img`;
CREATE TABLE IF NOT EXISTS `img` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `imagen` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `img`
--

INSERT INTO `img` (`id`, `nombre`, `imagen`) VALUES
(4, '1', 'IMG_85757.jpg'),
(5, 'flores', 'IMG_70801.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

DROP TABLE IF EXISTS `pago`;
CREATE TABLE IF NOT EXISTS `pago` (
  `id_pago` int NOT NULL AUTO_INCREMENT,
  `id_reserva` int DEFAULT NULL,
  `id_cliente` int DEFAULT NULL,
  `costo_total` decimal(10,2) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  PRIMARY KEY (`id_pago`),
  KEY `id_reserva` (`id_reserva`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id_pago`, `id_reserva`, `id_cliente`, `costo_total`, `fecha_pago`) VALUES
(2, 2, 2, '300.00', '2023-09-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

DROP TABLE IF EXISTS `personal`;
CREATE TABLE IF NOT EXISTS `personal` (
  `id_personal` int NOT NULL,
  PRIMARY KEY (`id_personal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`) VALUES
(3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

DROP TABLE IF EXISTS `promocion`;
CREATE TABLE IF NOT EXISTS `promocion` (
  `id_promocion` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `descuento` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id_promocion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `promocion`
--

INSERT INTO `promocion` (`id_promocion`, `nombre`, `descripcion`, `descuento`) VALUES
(1, 'Promoción Verano', 'Descuento del 20% en todas las reservas durante el verano', '20.00'),
(2, 'Promoción Fin de Semana', 'Descuento del 15% en reservas para el fin de semana', '15.00'),
(3, 'Promoción Lanzamiento', 'Descuento del 10% en reservas para el nuevo hotel', '10.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

DROP TABLE IF EXISTS `reserva`;
CREATE TABLE IF NOT EXISTS `reserva` (
  `id_reserva` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int DEFAULT NULL,
  `id_hotel` int DEFAULT NULL,
  `id_habitacion` int DEFAULT NULL,
  `id_personal` int DEFAULT NULL,
  `fecha_entrada` date DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_hotel` (`id_hotel`),
  KEY `id_habitacion` (`id_habitacion`),
  KEY `id_personal` (`id_personal`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_cliente`, `id_hotel`, `id_habitacion`, `id_personal`, `fecha_entrada`, `fecha_salida`, `estado`) VALUES
(2, 2, 2, 3, NULL, '2023-10-01', '2023-10-05', 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_promocion`
--

DROP TABLE IF EXISTS `reserva_promocion`;
CREATE TABLE IF NOT EXISTS `reserva_promocion` (
  `id_reserva` int NOT NULL,
  `id_promocion` int NOT NULL,
  PRIMARY KEY (`id_reserva`,`id_promocion`),
  KEY `id_promocion` (`id_promocion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `reserva_promocion`
--

INSERT INTO `reserva_promocion` (`id_reserva`, `id_promocion`) VALUES
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_servicio`
--

DROP TABLE IF EXISTS `reserva_servicio`;
CREATE TABLE IF NOT EXISTS `reserva_servicio` (
  `id_reserva` int NOT NULL,
  `id_servicio` int NOT NULL,
  PRIMARY KEY (`id_reserva`,`id_servicio`),
  KEY `id_servicio` (`id_servicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `reserva_servicio`
--

INSERT INTO `reserva_servicio` (`id_reserva`, `id_servicio`) VALUES
(2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room_images`
--

DROP TABLE IF EXISTS `room_images`;
CREATE TABLE IF NOT EXISTS `room_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_habitacion` int NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_habitacion` (`id_habitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `room_images`
--

INSERT INTO `room_images` (`id`, `id_habitacion`, `image`, `thumb`) VALUES
(1, 3, 'IMG_16445.jpg', 0),
(7, 2, 'IMG_99181.png', 1),
(9, 3, 'IMG_28978.png', 1),
(10, 13, 'IMG_71859.png', 0),
(11, 13, 'IMG_17836.png', 0),
(12, 14, 'IMG_87284.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

DROP TABLE IF EXISTS `servicios`;
CREATE TABLE IF NOT EXISTS `servicios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `icon` varchar(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `icon`, `nombre`, `descripcion`) VALUES
(5, 'IMG_28355.svg', 'Transporte', 'desde y hasta tu casa'),
(6, 'IMG_22536.svg', 'AC', 'Aire acondicionado'),
(7, 'IMG_21420.svg', 'TV', 'La mejor tv cable del mundo'),
(8, 'IMG_46944.svg', 'Masajes', 'Los mejores masajes de todo el paise'),
(9, 'IMG_45752.svg', 'Transporte VIP', 'te llevamos hasta tu casa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_habitacion`
--

DROP TABLE IF EXISTS `servicios_habitacion`;
CREATE TABLE IF NOT EXISTS `servicios_habitacion` (
  `id_servicio_habitacion` int NOT NULL AUTO_INCREMENT,
  `id_habitacion` int DEFAULT NULL,
  `id_servicio` int DEFAULT NULL,
  PRIMARY KEY (`id_servicio_habitacion`),
  KEY `id_habitacion` (`id_habitacion`),
  KEY `id_servicio` (`id_servicio`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `servicios_habitacion`
--

INSERT INTO `servicios_habitacion` (`id_servicio_habitacion`, `id_habitacion`, `id_servicio`) VALUES
(61, 13, 6),
(62, 13, 7),
(63, 14, 8),
(64, 14, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_adicional`
--

DROP TABLE IF EXISTS `servicio_adicional`;
CREATE TABLE IF NOT EXISTS `servicio_adicional` (
  `id_servicio` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_servicio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `servicio_adicional`
--

INSERT INTO `servicio_adicional` (`id_servicio`, `nombre`, `descripcion`, `precio`) VALUES
(1, 'Desayuno', 'Desayuno buffet completo', '10.00'),
(2, 'Transporte', 'Transporte desde/hacia el aeropuerto', '20.00'),
(3, 'Spa', 'Acceso al spa y masajes', '30.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitio`
--

DROP TABLE IF EXISTS `sitio`;
CREATE TABLE IF NOT EXISTS `sitio` (
  `id_sitio` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `sobre_nosotros` text,
  `activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_sitio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `sitio`
--

INSERT INTO `sitio` (`id_sitio`, `titulo`, `sobre_nosotros`, `activo`) VALUES
(1, 'Hotel Tuyuyu', '¡Bienvenido al Hotel Tuyuyu! Somos un hotel de lujo ubicado en un hermoso entorno natural. Ofrecemos habitaciones cómodas, servicio de primera clase y una amplia gama de comodidades para que disfrutes de una estancia inolvidable..', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_contactanos`
--

DROP TABLE IF EXISTS `user_contactanos`;
CREATE TABLE IF NOT EXISTS `user_contactanos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visto` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `user_contactanos`
--

INSERT INTO `user_contactanos` (`id`, `nombre`, `email`, `titulo`, `mensaje`, `fecha`, `visto`) VALUES
(32, 'Javier Aleandro Salvatierra Dorado', 'latoxica@gmail.com', 'Lab sistemas', 'quiero mas informacion', '2023-09-27 09:53:01', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido_paterno` varchar(50) DEFAULT NULL,
  `apellido_materno` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `ci` varchar(20) DEFAULT NULL,
  `pasaporte` varchar(20) DEFAULT NULL,
  `correo_electronico` varchar(50) DEFAULT NULL,
  `rol` enum('cliente','personal','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nombre_usuario` varchar(50) DEFAULT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `img_usuario` longblob,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido_paterno`, `apellido_materno`, `telefono`, `ci`, `pasaporte`, `correo_electronico`, `rol`, `nombre_usuario`, `contrasena`, `img_usuario`) VALUES
(1, 'Juan', 'Pérez', 'Gómez', '123456789', '1234567', 'A123456', 'juan@example.com', 'cliente', 'juanperez', 'contraseña123', NULL),
(2, 'María', 'López', 'García', '987654321', '7654321', 'B654321', 'maria@example.com', 'cliente', 'marialopez', 'password123', NULL),
(3, 'Pedro', 'González', 'Rodríguez', '555555555', '9876543', 'C987654', 'pedro@example.com', 'admin', 'pedrogonzalez', 'secreto123', NULL),
(5, 'pablo', 'Fernandez', 'Flores', '12345678', '987654321', '00000000', 'fernando@morales.cpm', 'cliente', 'PFlores', '1234', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caracteristicas_habitacion`
--
ALTER TABLE `caracteristicas_habitacion`
  ADD CONSTRAINT `caracteristicas_habitacion_ibfk_2` FOREIGN KEY (`id_caracteristica`) REFERENCES `caracteristicas` (`id`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `contactanos_hotel`
--
ALTER TABLE `contactanos_hotel`
  ADD CONSTRAINT `contactanos_hotel_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id_hotel`);

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `habitacion_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`),
  ADD CONSTRAINT `pago_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`),
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`id_habitacion`) REFERENCES `habitacion` (`id_habitacion`),
  ADD CONSTRAINT `reserva_ibfk_4` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`);

--
-- Filtros para la tabla `reserva_promocion`
--
ALTER TABLE `reserva_promocion`
  ADD CONSTRAINT `reserva_promocion_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`),
  ADD CONSTRAINT `reserva_promocion_ibfk_2` FOREIGN KEY (`id_promocion`) REFERENCES `promocion` (`id_promocion`);

--
-- Filtros para la tabla `reserva_servicio`
--
ALTER TABLE `reserva_servicio`
  ADD CONSTRAINT `reserva_servicio_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`),
  ADD CONSTRAINT `reserva_servicio_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicio_adicional` (`id_servicio`);

--
-- Filtros para la tabla `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_ibfk_1` FOREIGN KEY (`id_habitacion`) REFERENCES `habitacion` (`id_habitacion`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `servicios_habitacion`
--
ALTER TABLE `servicios_habitacion`
  ADD CONSTRAINT `servicios_habitacion_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
