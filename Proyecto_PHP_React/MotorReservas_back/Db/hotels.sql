-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-02-2022 a las 17:06:13
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotels`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `street` varchar(80) DEFAULT NULL,
  `townId` int(11) DEFAULT NULL,
  `score` float DEFAULT NULL,
  `basicPrice` float DEFAULT NULL,
  `deluxePrice` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `description`, `street`, `townId`, `score`, `basicPrice`, `deluxePrice`) VALUES
(1, 'Blau Porto Petro Beach', 'Relájate en el spa completo, que ofrece masajes, tratamientos corporales y tratamientos faciales. La diversión está asegurada en este establecimiento, que ofrece 3 piscinas al aire libre, pistas de tenis exteriores y centro de bienestar. Encontrarás también conexión a Internet wifi gratis, servicios de conserjería y servicio de canguro (de pago).', 'Carrer Dés Far,16', 1, 8.5, 100, 135),
(2, 'Catalonia Del Mar', 'Con servicios como masajes o tratamientos corporales, te sentirás como nuevo. Si quieres divertirte aquí tienes para elegir, con instalaciones recreativas como piscina al aire libre, piscina cubierta y sauna. Encontrarás también conexión a Internet wifi gratis, servicios de conserjería y tienda de recuerdos o quiosco.', 'Passeig Del Moll, 15', 2, 7, 65, 90),
(3, 'Agroturismo Alqueria Blanca', 'Ubicado en una antigua alquería musulmana, este pequeño hotel ha sido reformado siguiendo un estilo que respeta la herencia típica mallorquina del edificio, al mismo tiempo que ofrece el máximo confort para los huéspedes.', 'Carretera Palma-Soller, Km 13.6', 3, 7.5, 55, 95),
(4, 'Gran Hotel Soller', 'Para un relax sin igual, nada como una visita al spa, que ofrece masajes, tratamientos corporales y tratamientos faciales. La diversión está asegurada en este establecimiento, que ofrece piscina al aire libre, piscina cubierta y sauna. Otros servicios de este hotel incluyen conexión a Internet wifi gratis, servicios de conserjería y servicio de canguro (de pago).', 'Carrer de Romaguera, 18', 4, 9, 110, 150),
(5, 'Sa Bassa Plana', 'Esta antigua granja está a siete kilómetros de la playa, ubicada en la llanura sur de Mallorca, entre las localidades de Lluchmajor y Cala Pi. La localidad más cercana, S\'Estanyol, está a cinco kilómetros. La prehistórica población de Talayots está a dos kilómetros de distancia. ', 'Carretera Cabo Blanco, S/N', 5, 7, 45, 80),
(6, 'Hotel Panorama', 'Elige entre las numerosas instalaciones recreativas ofrecidas, que incluyen piscina al aire libre de temporada y bicicletas de alquiler. Se ofrece además conexión a Internet wifi gratis y asistencia turística (adquisición de entradas).', 'Corb Marí, Nº 4, Urb. Gotmar', 6, 6, 40, 65),
(7, 'The Sky Hotel', 'No te pierdas las instalaciones recreativas a tu disposición, que incluyen piscina al aire libre y bicicletas de alquiler. Otros servicios de este hotel de estilo modernista incluyen conexión a Internet wifi gratis y asistencia turística y para la compra de entradas.', 'Carrer Bustamante 40r', 7, 8, 95, 130),
(8, 'Robinson Club Cala Serena', 'Relájate en el spa completo, que ofrece masajes. La diversión está asegurada en este establecimiento, que ofrece 4 piscinas al aire libre, discoteca y pistas de tenis exteriores. Encontrarás también conexión a Internet wifi gratis y servicio de canguro (de pago).', 'Cala Serena/Cala D\'or', 8, 9.5, 140, 195),
(9, 'Playa De Muro Suites', 'Este encantador apartahotel está situado en medio de una elegante finca ajardinada, en la bahía de Alcudia, al lado del Parque Natural S\'Albufera. La apacible playa de Muro está a unos minutos andando. A 500 metros podrá encontrar tiendas, comercios y lugares de ocio y entretenimiento. Enfrente del hotel hay una parada de transporte público. ', ' C/ Falco S/N', 9, 7.5, 80, 125),
(10, 'Son Antem', 'Be Live Collection Son Antem es un hotel de golf en Llucmajor, Mallorca, de 5 estrellas, muy cerca de Palma y de las mejores playas de la isla. Le enamorará por su entorno natural, su arquitectura tradicional mediterránea, elegantes habitaciones y ambiente de lujo. Descubra este resort ideal para disfrutar del clima y del paisaje mediterráneo mientras juega al golf, o bien relájese en el magnífico Spa.', 'Carretera Ma-19, Salida 20', 5, 8.5, 115, 140);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotels_images`
--

CREATE TABLE `hotels_images` (
  `id` int(11) NOT NULL,
  `imageId` int(11) DEFAULT NULL,
  `hotelId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hotels_images`
--

INSERT INTO `hotels_images` (`id`, `imageId`, `hotelId`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2),
(7, 7, 3),
(8, 8, 3),
(9, 9, 3),
(10, 10, 4),
(11, 11, 4),
(12, 12, 4),
(13, 13, 5),
(14, 14, 5),
(15, 15, 5),
(16, 16, 6),
(17, 17, 6),
(18, 18, 6),
(19, 19, 7),
(20, 20, 7),
(21, 21, 7),
(22, 22, 8),
(23, 23, 8),
(24, 24, 8),
(25, 25, 9),
(26, 26, 9),
(27, 27, 9),
(28, 28, 10),
(29, 29, 10),
(30, 30, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotels_reserves`
--

CREATE TABLE `hotels_reserves` (
  `hotelId` int(11) NOT NULL,
  `reserveId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `url` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `url`) VALUES
(1, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0001/27985/127985/67.jpg?f=15540584'),
(2, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0001/27985/127985/1.jpg?f=16002492'),
(3, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0001/27985/127985/72.jpg?f=15540584'),
(4, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0000/33829/33829/1.jpg?f=15322112'),
(5, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0000/33829/33829/8.jpg?f=15322112'),
(6, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0000/33829/33829/16.jpg?f=15322112'),
(7, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0000/33793/33793/31.jpg?f=15731954'),
(8, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0000/33793/33793/37.jpg?f=15731954'),
(9, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0000/33793/33793/46.jpg?f=15731954'),
(10, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0000/33997/33997/55.jpg?f=16310864'),
(11, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0000/33997/33997/73.jpg?f=16310864'),
(12, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0000/33997/33997/78.jpg?f=16310864'),
(13, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0000/33998/33998/35.jpg?f=15837808'),
(14, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0000/33998/33998/40.jpg?f=15837808'),
(15, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0000/33998/33998/51.jpg?f=15837808'),
(16, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0001/36811/136811/2.jpg?f=16258236'),
(17, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0001/36811/136811/18.jpg?f=16258236'),
(18, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0001/36811/136811/24.jpg?f=16258236'),
(19, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0036/78150/3678150/26.jpg?f=15506085'),
(20, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0036/78150/3678150/32.jpg?f=15506085'),
(21, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0036/78150/3678150/39.jpg?f=15506085'),
(22, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0007/67518/767518/24.jpg?f=15567135'),
(23, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0007/67518/767518/57.jpg?f=15567135'),
(24, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0007/67518/767518/63.jpg?f=15567135'),
(25, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0000/33639/33639/2.jpg?f=16348059'),
(26, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0000/33639/33639/19.jpg?f=16348059'),
(27, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0000/33639/33639/25.jpg?f=16348059'),
(28, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0005/50441/550441/1.jpg?f=15665488'),
(29, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0005/50441/550441/8.jpg?f=15665488'),
(30, 'https://cdn.logitravel.com/wsimgresize/resize/830/650/s3-eu-west-1.amazonaws.com/logs3euw1cdn/cloudcontent/fotos/agregadorHotelero/0005/50441/550441/18.jpg?f=15665488');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserves`
--

CREATE TABLE `reserves` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `hotelId` int(11) DEFAULT NULL,
  `dateStart` date DEFAULT NULL,
  `dateEnd` date DEFAULT NULL,
  `room` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `towns`
--

CREATE TABLE `towns` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `towns`
--

INSERT INTO `towns` (`id`, `name`) VALUES
(1, 'Porto Petro'),
(2, 'Son Servera'),
(3, 'Bunyola'),
(4, 'Soller'),
(5, 'Llucmajor'),
(6, 'Puerto Pollensa'),
(7, 'Cala Ratjada'),
(8, 'Felanitx'),
(9, 'Playa de Muro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `townId` (`townId`);

--
-- Indices de la tabla `hotels_images`
--
ALTER TABLE `hotels_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imageId` (`imageId`),
  ADD KEY `hotelId` (`hotelId`);

--
-- Indices de la tabla `hotels_reserves`
--
ALTER TABLE `hotels_reserves`
  ADD PRIMARY KEY (`hotelId`,`reserveId`),
  ADD KEY `reserveId` (`reserveId`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reserves`
--
ALTER TABLE `reserves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `hotelId` (`hotelId`);

--
-- Indices de la tabla `towns`
--
ALTER TABLE `towns`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `hotels_images`
--
ALTER TABLE `hotels_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `reserves`
--
ALTER TABLE `reserves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `towns`
--
ALTER TABLE `towns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`townId`) REFERENCES `towns` (`id`);

--
-- Filtros para la tabla `hotels_images`
--
ALTER TABLE `hotels_images`
  ADD CONSTRAINT `images_hotels_ibfk_1` FOREIGN KEY (`imageId`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `images_hotels_ibfk_2` FOREIGN KEY (`hotelId`) REFERENCES `hotels` (`id`);

--
-- Filtros para la tabla `hotels_reserves`
--
ALTER TABLE `hotels_reserves`
  ADD CONSTRAINT `hotels_reserves_ibfk_1` FOREIGN KEY (`hotelId`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `hotels_reserves_ibfk_2` FOREIGN KEY (`reserveId`) REFERENCES `reserves` (`id`);

--
-- Filtros para la tabla `reserves`
--
ALTER TABLE `reserves`
  ADD CONSTRAINT `reserves_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reserves_ibfk_2` FOREIGN KEY (`hotelId`) REFERENCES `hotels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
