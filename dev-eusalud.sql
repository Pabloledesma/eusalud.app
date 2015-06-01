-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2015 a las 17:00:20
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dev-eusalud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_04_08_104031_add_num_id_tu_user', 2),
('2015_04_09_103308_add_user_type_to_user', 3),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_04_08_104031_add_num_id_tu_user', 2),
('2015_04_10_080139_create_session_table', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('pablo.ledesma@eusalud.com', 'ffb2a9658f3ab23bb314eb5233077acd96692ed97e8a2f9e02235e1ce9ad18cd', '2015-04-14 15:03:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `num_id` text COLLATE utf8_unicode_ci NOT NULL,
  `user_type` enum('Super Admin','Admin','User') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `num_id`, `user_type`) VALUES
(1, 'Pablo', 'updated@again.com', '$2y$07$BCryptRequires22ChrctekAt0dO21papoeWpRIilKiTV8GJfbTfy', '1F2FcNWH8CtK4ygnTWTMSE594fxOtswqy1sKC94ydLxRaJGM1qOHygv7o3XH', '2015-03-31 19:47:53', '2015-04-15 21:34:01', '80099491', 'Super Admin'),
(7, 'PASCUAS GONZALEZ GILBERTO', 'doc@doc.com', '$2y$07$BCryptRequires22Chrcte/0SoAJ3ggW7F/R4X.bSdc4qwtNK/Dvi', 'qUXdhoEnfTgACZVqwRow1BxWyCoXvOWptpw3FhXDV0HEZCg7UZvp5z1fVGPl', '2015-04-09 20:04:11', '2015-04-11 15:57:29', '7692591', 'User'),
(8, 'Yimmy Saenz', 'yimmy.saenz@eusalud.com', '$2y$07$BCryptRequires22ChrcteDvg30T/9.YbbJSnBoVefG/tRaNrqF0a', 'u9nrg8gBFXqSUb0QEYhbcBCQy54C2ubmvK2aj8AJzbth0woZxa2ep0ruI8A4', '2015-04-09 20:17:35', '2015-04-17 23:56:05', '79509972', 'Super Admin'),
(9, 'Pablo Ledesma', 'pablo.ledesma@eusalud.com', '$2y$10$PpSFXXg1uNwVSJOj1MlmCOJ9RYORhVVizhk2G.efN2UQClaXgO1HW', '4P3B58ggwdpW8RihXEXu5oZnD7B7cfdHqh7jePzPHqGnprHulxkyAMll9zI8', '2015-04-09 20:18:52', '2015-05-07 20:50:31', '80099493', 'Super Admin'),
(11, 'Cindy Johanna Guio Linares', 'Cindy.guio@eusalud.com', '$2y$07$BCryptRequires22ChrcteDrcdKev4252nyboONAWGBBi3w/7ATxq', 'XiPYX6ZqVX89BEkef5oeyKtYHbEYiQtuUOeJg92b6HWZ5abVEMeQgkQrfpLp', '2015-04-13 15:30:00', '2015-04-17 15:46:42', '1030582315', 'Admin'),
(12, 'Pepito puentes', 'pepo@puentes.com', '$2y$07$BCryptRequires22ChrctepqoL28DHdaM9pQwllIKhHLp0TzoRui2', NULL, '2015-04-15 20:05:36', '2015-04-15 20:05:36', '123456789', 'User'),
(13, 'alam brito', 'alam@brito.com', '$2y$07$BCryptRequires22ChrctepqoL28DHdaM9pQwllIKhHLp0TzoRui2', NULL, '2015-04-15 20:07:06', '2015-04-15 20:07:06', '12345678', 'User'),
(14, 'Jhon Doe', 'jhon@doe.com', '$2y$07$BCryptRequires22ChrctepqoL28DHdaM9pQwllIKhHLp0TzoRui2', NULL, '2015-04-15 20:10:47', '2015-04-15 20:10:47', '12345678', 'User'),
(15, 'Nelson Gonzalez', 'jefeadministrativo.cmi@eusalud.com', '$2y$07$BCryptRequires22ChrcteexfSYvcUHgtqctWU3NbLyKOVnkiEc3.', 'iJEI0RdxiDdvIr7IopczqcWD1hst5905UFbGFFLs3KN38nWsHUOvZiB3OB5i', '2015-04-22 14:16:08', '2015-05-07 17:24:20', '79789894', 'Admin'),
(16, 'Diana Suescun', 'diana.suescun@eusalud.com', '$2y$07$BCryptRequires22ChrctebZXGu2PLkniuc2MpLNu/JBGF4NPYiLS', 'oyC0xO5ZkCj4znhcxh6adpkhDx2OvpV851rY7U0eOgc6lYveWiBycOgSv2DM', '2015-05-06 15:00:23', '2015-05-06 15:29:22', '1033703811', 'Admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
 ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
