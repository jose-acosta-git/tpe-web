-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-10-2020 a las 02:50:30
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_reseñas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`) VALUES
(1, 'adventure', 'Resaltan características cómo: el riesgo, la sorpresa y el misterio. La trama tiene mucha importancia, no tanto el aspecto psicológico de los personajes.'),
(2, 'isekai', 'Gira en torno a una persona normal de la Tierra que es transportada, renacida o atrapado en un universo paralelo o un mundo de fantasía.'),
(3, 'magic', 'La magia dota a los personajes con poderes que no ocurren naturalmente en el mundo real, se manifiesta frecuentemente en la transformación de un personaje, si no en la transformación del mundo ficticio.'),
(4, 'shounen', 'Series con grandes dosis de acción,​ a menudo situaciones humorísticas con protagonistas masculinos. El compañerismo entre adolescentes o adultos de un equipo de combate, también suele subrayarse en un shounen.'),
(5, 'sports', 'En estos animes la trama gira en torno a un equipo deportivo y al desarrollo de sus personajes, durante varias etapas competitivas.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseñas`
--

CREATE TABLE `reseñas` (
  `id_reseña` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `reseña` text NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reseñas`
--

INSERT INTO `reseñas` (`id_reseña`, `titulo`, `reseña`, `id_categoria`) VALUES
(1, 'Re: Zero kara Hajimeru Isekai Seikatsu', 'Cuando Subaru Natsuki sale de la tienda, lo último que espera es ser arrancado de su vida cotidiana y caer en un mundo de fantasía. Las cosas no pintan bien para el adolescente desconcertado; sin embargo, poco después de su llegada, es atacado por unos matones. Armado con solo una bolsa de víveres y un teléfono celular ahora inútil, rápidamente lo reducen a palos. Afortunadamente, una misteriosa belleza llamada Satella, que persigue a quien le robó su insignia, se encuentra con Subaru y lo salva. Para agradecer a la chica honesta y de buen corazón, Subaru se ofrece a ayudar en su búsqueda, y más tarde esa noche, incluso encuentra el paradero de lo que ella busca. Pero sin que ellos lo sepan, una fuerza mucho más oscura acecha a la pareja desde las sombras, y pocos minutos después de localizar la insignia, Subaru y Satella son brutalmente asesinados.\r\nSin embargo, Subaru se despierta de inmediato a una escena familiar, confrontado por el mismo grupo de matones, encontrándose con Satella de nuevo, el enigma se profundiza a medida que la historia se repite inexplicablemente.', 2),
(2, 'Haikyu!!', 'La historia sigue la carrera de Shoyo Hinata, un chico que ama el voleibol y decide conformar un equipo para competir en el interescolar. Pero en el último torneo de escuela media, su equipo recibe una auténtica paliza del equipo de Tobio Kageyama, un prodigio de este deporte. Al entrar a preparatoria Hinata decide unirse a Karasuno y al equipo de voleibol para así algún día vengarse de Kageyama pero, para su sorpresa, Kageyama también está en el equipo. Así, dos antiguos rivales forman un equipo imbatible con el que buscan conseguir el campeonato nacional', 5),
(3, 'One Piece', 'Gol D. Roger era conocido como el \"Rey Pirata\", el ser más fuerte e infame que navegó en Grand Line. La captura y ejecución de Roger por el Gobierno Mundial trajo un cambio en todo el mundo. Sus últimas palabras antes de su muerte revelaron la existencia del mayor tesoro del mundo, One Piece. Fue esta revelación la que provocó la Gran Era de los Piratas, hombres que soñaban con encontrar One Piece, que promete una cantidad ilimitada de riquezas y fama, y ​​muy posiblemente el pináculo de la gloria y el título de Rey Pirata.\r\nIngresa Monkey D. Luffy, un chico de 17 años que desafía tu definición estándar de pirata. En lugar de la personalidad popular de un pirata malvado, endurecido y desdentado que saquea pueblos por diversión, la razón de Luffy para ser pirata es pura maravilla: la idea de una aventura emocionante que lo lleva a personas intrigantes y, en última instancia, al tesoro prometido. Siguiendo los pasos de su héroe de la infancia, Luffy y su tripulación viajan a través de Grand Line, experimentando locas aventuras, desvelando oscuros misterios y luchando contra enemigos poderosos, todo para alcanzar la más codiciada de todas las fortunas: One Piece.', 1),
(4, 'Black Clover', 'En un mundo lleno de magia, Asta, un huérfano que es demasiado ruidoso y enérgico, no posee nada en absoluto. A pesar de esto, sueña con convertirse en el Rey Mago, un título otorgado al mago más fuerte del Reino Clover. Con la misma aspiración, el amigo y rival de la infancia de Asta, Yuno, ha sido bendecido con la capacidad de controlar la poderosa magia del viento. Incluso con esta abrumadora brecha entre ellos, con la esperanza de despertar de alguna manera sus habilidades mágicas y alcanzar a Yuno, Asta entrena su cuerpo sin descanso todos los días.\r\nEn el Reino del Trébol, una vez que una persona cumple 15 años, es hora de que reciba su Grimorio, un objeto que permite a su portador usar su magia al máximo de su capacidad. En la ceremonia, Yuno obtiene un grimorio con un legendario trébol de cuatro hojas, lo que indica la fuerza excepcional de su portador, mientras Asta espera inútilmente el suyo. Sintiéndose abatido, pero no dispuesto a darse por vencido, Asta ve a Yuno atrapado por un mago que está tratando de robar el grimorio especial de Yuno. A pesar de estar completamente dominado por el captor de Yuno, la voluntad de Asta de seguir luchando lo recompensa con su propio Grimorio, uno con un trébol negro de cinco hojas inaudito.', 3),
(5, 'Naruto', 'Momentos antes del nacimiento de Naruto Uzumaki, un enorme demonio conocido como Kyuubi, el Zorro de Nueve Colas, atacó Konohagakure, la Aldea Oculta de las Hojas, y causó estragos. Para poner fin al alboroto del Kyuubi, el líder de la aldea, el Cuarto Hokage, sacrificó su vida y selló la monstruosa bestia dentro del recién nacido Naruto.\r\nAhora, Naruto es un ninja hiperactivo y con cabeza de nudillo que todavía vive en Konohagakure. Rechazado por el Kyuubi dentro de él, Naruto lucha por encontrar su lugar en la aldea, mientras que su ardiente deseo de convertirse en el Hokage de Konohagakure lo lleva no solo a nuevos amigos, sino también a enemigos mortales.', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD PRIMARY KEY (`id_reseña`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  MODIFY `id_reseña` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD CONSTRAINT `reseñas_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
