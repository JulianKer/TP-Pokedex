-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2024 a las 02:43:56
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
-- Base de datos: `pokedex`
--
CREATE DATABASE IF NOT EXISTS `pokedex` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pokedex`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemon`
--

CREATE TABLE `pokemon` (
  `id_pokemon` int(11) NOT NULL,
  `numero_identificador` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pokemon`
--

INSERT INTO `pokemon` (`id_pokemon`, `numero_identificador`, `imagen`, `nombre`, `id_tipo`, `descripcion`) VALUES
(1, 500, '/TP-Pokedex/assets/pokemones/Blastoise.webp', 'Blastoise', 1, 'Blastoise dispara agua a gran presión por los cañones de su caparazón.'),
(2, 501, '/TP-Pokedex/assets/pokemones/Golduck.webp', 'Golduck', 1, 'Golduck nada a gran velocidad, superando incluso a los nadadores más rápidos.'),
(3, 502, '/TP-Pokedex/assets/pokemones/Poliwag.webp', 'Poliwag', 1, 'Poliwag tiene una piel muy fina que deja ver sus órganos internos.'),
(4, 503, '/TP-Pokedex/assets/pokemones/Poliwhirl.webp', 'Poliwhirl', 1, 'Poliwhirl usa su espiral hipnótica para marear a sus oponentes.'),
(5, 504, '/TP-Pokedex/assets/pokemones/Psyduck.webp', 'Psyduck', 1, 'Psyduck siempre parece confundido debido a sus constantes dolores de cabeza.'),
(6, 505, '/TP-Pokedex/assets/pokemones/Arcanine.webp', 'Arcanine', 2, 'Arcanine es conocido por su velocidad increíble y su naturaleza valiente.'),
(7, 506, '/TP-Pokedex/assets/pokemones/Charmander.webp', 'Charmander', 2, 'La llama en la cola de Charmander indica su salud. Si se apaga, el Pokémon muere.'),
(8, 507, '/TP-Pokedex/assets/pokemones/Charmeleon.webp', 'Charmeleon', 2, 'Charmeleon tiene un temperamento fiero y combate con gran intensidad.'),
(9, 508, '/TP-Pokedex/assets/pokemones/Growlithe.webp', 'Growlithe', 2, 'Growlithe es extremadamente leal y siempre defiende a su entrenador.'),
(10, 509, '/TP-Pokedex/assets/pokemones/Magmar.webp', 'Magmar', 2, 'Magmar emite calor tan intenso que hace que el aire alrededor de él se distorsione.'),
(11, 510, '/TP-Pokedex/assets/pokemones/Ponyta.webp', 'Ponyta', 2, 'Ponyta aprende a correr rápidamente y fortalece sus piernas persiguiendo a su madre.'),
(12, 511, '/TP-Pokedex/assets/pokemones/Vulpix.webp', 'Vulpix', 2, 'Vulpix nace con una sola cola que se divide en seis conforme crece.'),
(13, 512, '/TP-Pokedex/assets/pokemones/Bayleef.webp', 'Bayleef', 3, 'Bayleef tiene una fragancia refrescante que emana de su cuello, lo que mejora el ánimo.'),
(14, 513, '/TP-Pokedex/assets/pokemones/Bellossom.webp', 'Bellossom', 3, 'Bellossom baila alegremente para absorber la luz solar y producir energía.'),
(15, 514, '/TP-Pokedex/assets/pokemones/Chikorita.webp', 'Chikorita', 3, 'Chikorita emite un aroma dulce por la hoja en su cabeza que calma a los demás.'),
(16, 515, '/TP-Pokedex/assets/pokemones/Sceptile.webp', 'Sceptile', 3, 'Sceptile usa las hojas afiladas de sus brazos para atacar a sus enemigos.'),
(17, 516, '/TP-Pokedex/assets/pokemones/Sunkern.webp', 'Sunkern', 3, 'Sunkern no come mucho, y su principal objetivo es fortalecerse para evolucionar.'),
(18, 517, '/TP-Pokedex/assets/pokemones/Tangela.webp', 'Tangela', 3, 'Tangela está cubierto de lianas que se regeneran si se rompen.'),
(19, 518, '/TP-Pokedex/assets/pokemones/Meganium.webp', 'Meganium', 3, 'Meganium tiene el poder de revitalizar la vegetación con su aliento y curar heridas.'),
(20, 519, '/TP-Pokedex/assets/pokemones/Squirtle.webp', 'Squirtle', 1, 'Squirtle se protege en su caparazón y dispara agua con precisión.'),
(21, 520, '/TP-Pokedex/assets/pokemones/Wartortle.webp', 'Wartortle', 1, 'Wartortle usa su cola para nadar con gran velocidad y precisión.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL,
  `nombre_tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `nombre_tipo`) VALUES
(1, 'Agua'),
(2, 'Fuego'),
(3, 'Planta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(10) NOT NULL,
  `password_usuario` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre_usuario`, `password_usuario`) VALUES
(1, 'Julian', 'pokeJ'),
(2, 'German', 'pokeG'),
(3, 'Lucas', 'pokeL');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id_pokemon`),
  ADD UNIQUE KEY `numero_identificador` (`numero_identificador`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id_pokemon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pokemon`
--
ALTER TABLE `pokemon`
  ADD CONSTRAINT `pokemon_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
