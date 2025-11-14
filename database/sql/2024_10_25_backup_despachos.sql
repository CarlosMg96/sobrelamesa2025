-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2024 a las 19:16:47
-- Versión del servidor: 10.11.9-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u621336810_despachos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assistants`
--

CREATE TABLE `assistants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `assistants`
--

INSERT INTO `assistants` (`id`, `name`, `email`, `area`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bernardo Martínez Negrete', 'bmartineznegrete@galicia.com.mx', 'Life Sciences', '2024-10-23 17:04:00', '2024-10-23 17:04:00', NULL),
(2, 'Rosemarie Mc Laren', 'rmclaren@galicia.com.mx', 'Bancario y Financiero', '2024-10-23 17:05:15', '2024-10-23 17:05:15', NULL),
(3, 'Florent Patoret', 'fpatoret@galicia.com.mx', 'M&A, Mining', '2024-10-23 17:05:45', '2024-10-23 17:05:45', NULL),
(4, 'Ximena Armengol', 'xarmengol@galicia.com.mx', 'M&A, Mining', '2024-10-23 17:06:23', '2024-10-23 17:06:23', NULL),
(5, 'Alan Omar Rogel Ortega', 'arogel@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(6, 'Alejandra Paniagua Robles', 'apaniagua@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(7, 'Andrés Caro De La Fuente', 'acaro@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(8, 'Cecilia Díaz De Rivera Laris', 'cdiaz@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(9, 'Daniela Pérez Ríos Cámara', 'dperezrios@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(10, 'Diego Manzano Barragán', 'dmanzano@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(11, 'Emiliano Fernández Mitre', 'efernandez@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(12, 'Erwin Adam Fink Espinosa', 'efink@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(13, 'Fabiola Jiménez Juárez', 'fjimenez@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(14, 'Fernando Luján Cepeda', 'flujan@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(15, 'Fernando Rodríguez Chávez', 'frodriguez@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(16, 'Florencio Madariaga Guillén', 'fmadariaga@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(17, 'Germán Fernández García', 'gfernandez@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(18, 'Gilda Velázquez Mason', 'gvelazquez@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(19, 'Griselda Ana Sofía Mosqueda Gutiérrez', 'asmosqueda@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(20, 'Guillermo Parra Palacios', 'gparra@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(21, 'Héctor Iván Valdespino Carrasco', 'ivaldespino@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(22, 'Inés Wiechers Prieto', 'iwiechers@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(23, 'Irma Esthela Ross Navarro', 'iross@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(24, 'José Andrés Muñiz Córdova', 'jamuniz@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(25, 'José Antonio Casas Chavana', 'jacasas@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(26, 'José Pablo Quintana Balcázar', 'jpquintana@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(27, 'Lucía Manzo Flores', 'lmanzo@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(28, 'Luis Manuel Rosendo Reneda', 'lmrosendo@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(29, 'Maite Celorio Muro', 'mcelorio@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(30, 'María De Lourdes Lozano Rodríguez', 'llozano@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(31, 'María Del Pilar García Talavera', 'pgarcia@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(32, 'María Fernanda Luna Tavares', 'mfluna@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(33, 'María José Aragón Padilla', 'mjaragon@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(34, 'Mariana Islas Hernández', 'mislas@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(35, 'Marianela Romero Aceves', 'mromero@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(36, 'Misael Román Fuentes', 'mroman@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(37, 'Nayely George Márquez', 'ngeorge@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(38, 'Nicolás Marván Pizzuto', 'nmarvan@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(39, 'Paola Cravioto Guerrero', 'pcravioto@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(40, 'Paulina Itzel González Larios', 'paulina.gonzalez@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(41, 'Rodolfo Rovelo', 'rrovelo@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(42, 'Roxana Karin Schäfer Vega', 'rschafer@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(43, 'Samantha Silberstein Lerner', 'ssilberstein@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(44, 'Sebastián Ayza Concha', 'sayza@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(45, 'Sheidel Chareni Francioli Díaz', 'sfrancioli@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(46, 'Sofía Montes De Oca Márquez', 'smontesdeoca@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(47, 'Sofía Valeria Jurado Piñeiro', 'sjurado@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(48, 'Verónica Aideé Palacios De La Torre', 'vpalacios@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(49, 'Ximena Armengol Silenzi', 'xarmengol@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(50, 'Daniel Amézquita Díaz', 'damezquita@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(51, 'Cecilia Guadalupe Azar Manzur', 'cazar@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(52, 'Maurice Berkman Baksht', 'mberkman@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(53, 'Antonio Borja Charles', 'aborja@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(54, 'Juan Carlos Burgos Carbajal', 'jcburgos@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(55, 'Octavio Cantón Jaramillo', 'ocanton@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(56, 'Carlos Alberto Chávez Alanís', 'cchavez@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(57, 'Alejandro De la Borbolla Ordoñana', 'aborbolla@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(58, 'Carlos De Maria y Campos Segura', 'cdemaria@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(59, 'Carlos Andrés Escoto Carranza', 'cescoto@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(60, 'Francisco Fernández Cueto González de Cosío', 'ffcueto@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(61, 'José Manuel Galicia Romero', 'mgalicia@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(62, 'Ricardo García Giorgana', 'rgarcia@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(63, 'Eduardo García Travesi López de Lara', 'egarciatravesi@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(64, 'Mariana Herrero Saldívar', 'mherrero@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(65, 'Héctor Ramón Kuri Quijano', 'hkuri@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(66, 'Denise Lester Nosnik', 'dlester@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(67, 'Christian Lippert Helguera', 'clippert@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(68, 'Bernardo Martínez Negrete Espinosa', 'bmartineznegrete@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(69, 'Rosemarie Elizabeth Mc Laren Magnus', 'rmclaren@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(70, 'Eduardo Michán Escobar', 'emichan@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(71, 'Carlos Francisco Obregón Rojo', 'cobregon@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(72, 'María De Los Ángeles Padilla Zubiría', 'apadilla@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(73, 'Ernesto Partida Fernández De Jáuregui', 'epartida@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(74, 'Florent Patoret ', 'fpatoret@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(75, 'Gabriela Pellón Martínez', 'gpellon@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(76, 'Arturo Perdomo Jiménez', 'aperdomo@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(77, 'Guillermo Pérez Santiago', 'gperez@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(78, 'Humberto Pérez Rocha Ituarte', 'hperezrocha@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(79, 'Ignacio Pesqueira Taunton', 'ipesqueira@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(80, 'Rodrigo Rivera Santamarina', 'rrivera@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(81, 'José Ramiro Sandoval García', 'rsandoval@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(82, 'Federico Scheffler Kuhlmann', 'fscheffler@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(83, 'Eugenio Sepúlveda González Cosío', 'esepulveda@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(84, 'César Edson Uribe Guerrero', 'euribe@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(85, 'Mario Eduardo Valencia Concha', 'mvalencia@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(86, 'José Visoso Lomelín', 'jvisoso@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(87, 'Paola Yaber Coronado', 'pyaber@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(88, 'Rodrigo Zamora Etcharren', 'rzamora@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(89, 'Francisco Javier Careaga Franco', 'xcareaga@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(90, 'Juan Pablo Cervantes Sánchez Navarro', 'jpcervantes@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(91, 'Lisandro Javier Herrera Aguilar', 'lherrera@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL),
(92, 'Gerardo Enrique Rodríguez Aguilar', 'grodriguez@galicia.com.mx', NULL, '2024-10-25 15:41:13', '2024-10-25 15:40:58', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assistant_event`
--

CREATE TABLE `assistant_event` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assistant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `assistant_event`
--

INSERT INTO `assistant_event` (`id`, `assistant_id`, `event_id`, `created_at`, `updated_at`) VALUES
(1, 1, 108, NULL, NULL),
(2, 2, 108, NULL, NULL),
(3, 3, 108, NULL, NULL),
(4, 4, 108, NULL, NULL),
(5, 38, 160, '2024-10-25 15:46:33', '2024-10-25 15:46:33'),
(6, 2, 82, '2024-10-25 18:37:17', '2024-10-25 18:37:17'),
(7, 52, 82, '2024-10-25 18:37:34', '2024-10-25 18:37:34'),
(8, 73, 82, '2024-10-25 18:37:44', '2024-10-25 18:37:44'),
(9, 54, 145, '2024-10-25 18:41:08', '2024-10-25 18:41:08'),
(10, 90, 145, '2024-10-25 18:41:17', '2024-10-25 18:41:17'),
(11, 2, 134, '2024-10-25 18:45:33', '2024-10-25 18:45:33'),
(12, 83, 134, '2024-10-25 18:45:40', '2024-10-25 18:45:40'),
(13, 59, 134, '2024-10-25 18:45:50', '2024-10-25 18:45:50'),
(14, 85, 134, '2024-10-25 18:46:05', '2024-10-25 18:46:05'),
(15, 61, 134, '2024-10-25 18:46:21', '2024-10-25 18:46:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Argentina', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(2, 'Australia', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(3, 'Austria', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(4, 'Belgium', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(5, 'Brazil', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(6, 'Canada', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(7, 'Chile', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(8, 'China', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(9, 'Colombia', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(10, 'Costa Rica', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(11, 'Deutschland', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(12, 'Ecuador', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(13, 'England', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(14, 'España', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(15, 'Estonia and Lithuania', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(16, 'Finland', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(17, 'France', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(18, 'Germany', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(19, 'Holland/ Netherlands', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(20, 'Ireland', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(21, 'Italy', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(22, 'Japan', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(23, 'Netherlands', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(24, 'Netherlands/Bel/Lux', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(25, 'Panama', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(26, 'Peru', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(27, 'Spain', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(28, 'Switzerland', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(29, 'United Kingdom', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL),
(30, 'United States', '2024-10-25 18:19:40', '2024-10-25 18:19:40', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delegates`
--

CREATE TABLE `delegates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `original` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `delegates`
--

INSERT INTO `delegates` (`id`, `original`, `name`, `email`, `area`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'de-pardieu.com', 'Emmanuel Fatome', 'fatome@de-pardieu.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(2, 'de-pardieu.com', 'Patrick Jais', 'jais@de-pardieu.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(3, 'de-pardieu.com', 'Eric Muller', 'muller@de-pardieu.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(4, 'swlegal.ch', 'Oliver Triebold', 'oliver.triebold@swlegal.ch', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(5, 'swlegal.ch', 'George Ayoub', 'george.ayoub@swlegal.ch', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(6, 'machadomeyer.com.br', 'Ivandro Maciel Sanchez Junior', 'ij@machadomeyer.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(7, 'tozzinifreire.com.br', 'Karla Lini Maeji', 'kmaeji@tozzinifreire.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(8, 'tozzinifreire.com.br', 'María Elisa Gualandi Verri', 'mverri@tozzinifreire.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(9, 'tozzinifreire.com.br', 'Marcelo Calliari', 'mc@tozzinifreire.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(10, 'tozzinifreire.com.br', 'Clara Serva', 'cpserva@tozzinifreire.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(11, 'tozzinifreire.com.br', 'Silvia Martins de Castro Cunha Zono', 'sccunha@tozzinifreire.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(12, 'tozzinifreire.com.br', 'Oswaldo Dalla Torre', 'odtorre@tozzinifreire.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(13, 'ferrere.com', 'Isabel Laventure', 'ilaventure@ferrere.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(14, 'demarest.com.br', 'Paulo Coelho da Rocha', 'procha@demarest.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(15, 'estudiorodrigo.com', 'Luis Carlos Rodrigo', 'lcrodrigo@estudiorodrigo.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(16, 'estudiorodrigo.com', 'Alex Cordova', 'acordova@estudiorodrigo.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(17, 'estudiorodrigo.com', 'Ursula Zavala', 'uzavala@estudiorodrigo.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(18, 'ariaslaw.com', 'Diego Gallegos', 'diego.gallegos@ariaslaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(19, 'corrs.com.au', 'Adam Stapledon', 'adam.stapledon@corrs.com.au', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(20, 'corrs.com.au', 'Nastasja Suhadolnik', 'nastasja.suhadolnik@corrs.com.au', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(21, 'cariola.cl', 'Francisco Illanes', 'fjillanes@cariola.cl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(22, 'cariola.cl', 'Raimundo Moreno', 'rmoreno@cariola.cl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(23, 'rebaza-alcazar.com', 'Maite Colmenter', 'maite.colmenter@rebaza-alcazar.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(24, 'bdgs-associes.com', 'David Andreani', 'andreani@bdgs-associes.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(25, 'bdgs-associes.com', 'Kyum Lee', 'lee@bdgs-associes.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(26, 'bdgs-associes.com', 'Guillaume Jolly', 'jolly@bdgs-associes.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(27, 'maisto.it', 'Brazzalotto Alberto', 'a.brazzalotto@maisto.it', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(28, 'maisto.it', 'Ricci Francesco', 'f.ricci@maisto.it', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(29, 'ehernandez.com.pe', 'José Manuel Abastos Gil Vargas', 'jabastos@ehernandez.com.pe', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(30, 'ehernandez.com.pe', 'Miyanou Dufour', 'mdufour@ehernandez.com.pe', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(31, 'arnoldporter.com', 'Gregory Harrington', 'gregory.harrington@arnoldporter.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(32, 'osborneclarke.com', 'Ray Berg', 'ray.berg@osborneclarke.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(33, 'osborneclarke.com', 'Bjorn Hurten', 'bjoern.huerten@osborneclarke.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(34, 'rimonlaw.com', 'Ricardo Ampudia', 'ricardo.ampudia@rimonlaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(35, 'twobirds.com', 'Joaquín Muñoz', 'joaquin.munoz@twobirds.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(36, 'twobirds.com', 'Luis Alfonso Fernández Manzano', 'luisalfonso.fernandez@twobirds.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(37, 'burges-salmon.com', 'Jeremy Dickerson', 'jeremy.dickerson@burges-salmon.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(38, 'burges-salmon.com', 'Katie Russell', 'katie.russell@burges-salmon.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(39, 'burges-salmon.com', 'Rupert Weston', 'rupert.weston@burges-salmon.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(40, 'velo-legal.com', 'Carolina De La Guardia', 'cdelaguardia@velo-legal.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(41, 'noandt.com', 'Tomohiro Okawa', 'tomohiro_okawa@noandt.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(42, 'ppulegal.com', 'Rafael Boisset', 'rafael.boisset@ppulegal.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(43, 'bomchil.com', 'María Victoria Funes', 'victoria.funes@bomchil.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(44, 'bomchil.com', 'María Corrá', 'mariaines.corra@bomchil.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(45, 'phrlegal.com', 'Jaime Herrera', 'jaime.herrera@phrlegal.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(46, 'phrlegal.com', 'Jesús Albarrán', 'jesus.albarran@phrlegal.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(47, 'lexvalor.com', 'Carlos Coronel', 'ccoronel@lexvalor.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(48, 'mcolex.com', 'Juan Manuel Iglesias', 'juan.manuel.iglesias@mcolex.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(49, 'allende.com', 'Carlos Melhem', 'cmelhem@allende.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(50, 'allende.com', 'Ricardo Aldave', 'raldave@allende.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(51, 'bakerbotts.com', 'Jennifer Haworth', 'j.haworth.mccandless@bakerbotts.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(52, 'mqmgld.com', 'Darío Laguado Giraldo', 'dlaguado@mqmgld.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(53, 'mqmgld.com', 'Juan Manuel De La Rosa', 'jdelarosa@mqmgld.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(54, 'mqmgld.com', 'Andres Gonzalez', 'agonzalez@mqmgld.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(55, 'mqmgld.com', 'Jose Miguel Mendonza', 'jmendoza@mqmgld.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(56, 'mwe.com', 'Lisa Richman', 'lrichman@mwe.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(57, 'mwe.com', 'David Kiefer', 'dkiefer@mwe.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(58, 'mwe.com', 'Elena Otero', 'eotero@mwe.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(59, 'afra.com', 'Luis López Alfaro', 'lopezalfaro@afra.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(60, 'afra.com', 'Alejandro Enrique Alemán Ferrari', 'aaleman@afra.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(61, 'guerrero.cl', 'Pedro Lyon', 'plyon@guerrero.cl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(62, 'guerrero.cl', 'César Gálvez', 'cgalvez@guerrero.cl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(63, 'lloredacamacho.com', 'Andrés Hidalgo', 'ahidalgo@lloredacamacho.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(64, 'lloredacamacho.com', 'Christian Perez-Rueda', 'cperez@lloredacamacho.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(65, 'eof.com.ar', 'Agustin Siboldi', 'siboldia@eof.com.ar', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(66, 'vieirarezende.com.br', 'Camila Borba Lefevre', 'clefevre@vieirarezende.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(67, 'oppenhoff.eu', 'Alf Baars', 'alf.baars@oppenhoff.eu', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(68, 'bpvabogados.com', 'Bosco de Gispert', 'bgispert@bpvabogados.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(69, 'akerman.com', 'Pedro A. Freyre', 'pedro.freyre@akerman.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(70, 'akerman.com', 'Luis A. Perez', 'luis.perez@akerman.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(71, 'akerman.com', 'Felicia Leborgne Nowels', 'felicia.nowels@akerman.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(72, 'akerman.com', 'Arturo H. Banegas M', 'arturo.banegasmasia@akerman.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(73, 'akerman.com', 'Ildefonso ‘Dito’ P. Mas', 'ildefonso.mas@akerman.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(74, 'akerman.com', 'Karyn Koiffman', 'karyn.koiffman@akerman.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(75, 'slaughterandmay.com', 'James Stacey', 'james.stacey@slaughterandmay.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(76, 'slaughterandmay.com', 'Rebecca Cousin', 'rebecca.cousin@slaughterandmay.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(77, 'rebaza-alcazar.com', 'Felipe Boisset', 'felipe.boisset@rebaza-alcazar.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(78, 'rebaza-alcazar.com', 'Alberto Rebaza', 'alberto.rebaza@rebaza-alcazar.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(79, 'nyc.com.ar', 'María Fraguas', 'mfraguas@nyc.com.ar', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(80, 'nyc.com.ar', 'Mariana Guzian', 'mguzian@nyc.com.ar', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(81, 'pinsentmasons.com', 'Amaia Rivas Kortazar', 'amaia.rivas@pinsentmasons.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(82, 'pinsentmasons.com', 'Antonio Sánchez Montero', 'antonio.sanchezmontero@pinsentmasons.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(83, 'pinsentmasons.com', 'Gonzalo Gil Suarez', 'gonzalo.gil@pinsentmasons.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(84, 'legance.it', 'Filippo Ruffato', 'fruffato@legance.it', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(85, 'wilmerhale.com', 'Danielle Morris', 'danielle.morris@wilmerhale.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(86, 'bruchoufunes.com', 'Javier Rodríguez Galli', 'javier.rodriguez.galli@bruchoufunes.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(87, 'bruchoufunes.com', 'Sergio Arbeleche, Minería', 'sergio.arbeleche@bruchoufunes.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(88, 'bruchoufunes.com', 'Daniela Rey', 'daniela.rey@bruchoufunes.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(89, 'bruchoufunes.com', 'Ignacio Funes de Rioja', 'ignacio.funes@bruchoufunes.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(90, 'bruchoufunes.com', 'Alejandro Perelsztein', 'alejandro.perelsztein@bruchoufunes.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(91, 'bruchoufunes.com', 'José Bazán', 'jose.bazan@bruchoufunes.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(92, 'bruchoufunes.com', 'Estanislao Olmos', 'estanislao.olmos@bruchoufunes.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(93, 'darroisvilley.com', 'Carine Dupeyron', 'cdupeyron@darroisvilley.com', NULL, '2024-10-16 21:52:40', '2024-10-24 17:41:34', '2024-10-24 17:41:34'),
(94, 'pillsburylaw.com', 'Sthepan Becker', 'stephan.becker@pillsburylaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(95, 'pillsburylaw.com', 'Charles C. Conrad', 'charles.conrad@pillsburylaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(96, 'pillsburylaw.com', 'Russell DaSilva', 'russell.dasilva@pillsburylaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(97, 'pillsburylaw.com', 'Deborah S. Thoren-Peden', 'deborah.thorenpeden@pillsburylaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(98, 'pillsburylaw.com', 'Nancy A. Fischer', 'nancy.fischer@pillsburylaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(99, 'pillsburylaw.com', 'Carolina A. Fornos', 'carolina.fornos@pillsburylaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(100, 'pillsburylaw.com', 'William Wood', 'william.wood@pillsburylaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(101, 'blplegal.com', 'Luis Castro', 'lcastro@blplegal.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(102, 'blplegal.com', 'Vittoria Di Gioacchino', 'vdigioacchino@blplegal.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(103, 'blplegal.com', 'Vivian Liberman', 'vliberman@blplegal.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(104, 'blplegal.com', 'Jose Alvarez', 'jalvarez@blplegal.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(105, 'blplegal.com', 'Jorge Arenales', 'jarenales@blplegal.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(106, 'wadiaghandy.com', 'Denzil Arambhan', 'denzil.arambhan@wadiaghandy.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(107, 'wadiaghandy.com', 'Pinaz Mehta', 'pinaz.mehta@wadiaghandy.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(108, 'darroisvilley.com', 'Forrest Alogna', 'falogna@darroisvilley.com', NULL, '2024-10-16 21:52:40', '2024-10-24 17:38:17', '2024-10-24 17:38:17'),
(109, 'darroisvilley.com', 'Hugo Diener', 'hdiener@darroisvilley.com', NULL, '2024-10-16 21:52:40', '2024-10-24 17:41:42', '2024-10-24 17:41:42'),
(110, 'pn.com.br', 'Francisco Maranhão', 'fmaranhao@pn.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(111, 'pn.com.br', 'Marcelo Viveiros de Moura', 'mvmoura@pn.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(112, 'pn.com.br', 'Miguel Tornovsky', 'mtornovsky@pn.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(113, 'pn.com.br', 'Roberta Demange', 'rdemange@pn.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(114, 'houthoff.com', 'David Heems', 'd.heems@houthoff.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(115, 'houthoff.com', 'Thomas Stouten', 't.stouten@houthoff.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(116, 'stikeman.com', 'Maxime Turcotte', 'mturcotte@stikeman.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(117, 'stikeman.com', 'Sophie Lamonde', 'slamonde@stikeman.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(118, 'apoyoconsultoria.com', 'Eduardo Campos', 'ecampos@apoyoconsultoria.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(119, 'hsf.com', 'Amal Bouchenaki', 'amal.bouchenaki@hsf.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(120, 'allende.com', 'Valeriano Guevara Lynch', 'vguevara@allende.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(121, 'bomchil.com', 'Tomás Araya', 'tomas.araya@bomchil.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(122, 'marval.com', 'Cecilia Mairal', 'cmm@marval.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(123, 'marval.com', 'Gustavo Patricio Giay', 'gpg@marval.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(124, 'marval.com', 'Miguel Del Pino', 'mp@marval.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(125, 'marval.com', 'Bárbara Ramperti', 'bvr@marval.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(126, 'marval.com', 'Pablo Artagaveytia', 'paa@marval.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(127, 'mcolex.com', 'Diego Parise', 'diego.parise@mcolex.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(128, 'syls.com.ar', 'Rafael Salaberren Dupont', 'rsd@syls.com.ar', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(129, 'marval.com', 'Ricardo Ostrower', 'rao@marval.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(130, 'maddocks.com.au', 'David Newman', 'david.newman@maddocks.com.au', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(131, 'corrs.com.au', 'Jane Barrett', 'jane.barrett@corrs.com.au', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(132, 'bmalaw.com.br', 'Camila Goldberg', 'cgc@bmalaw.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(133, 'bmalaw.com.br', 'Felipe Galea', 'fes@bmalaw.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(134, 'bmalaw.com.br', 'Francisco Antunes Maciel Müssnich', 'mussnich@bmalaw.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(135, 'cesconbarrieu.com.br', 'Rafael Baleroni', 'rafael.baleroni@cesconbarrieu.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(136, 'demarest.com.br', 'Luciana Tornovsky', 'ltornovsky@demarest.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(137, 'lefosse.com', 'Rodrigo Junqueira', 'rodrigo.junqueira@lefosse.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(138, 'machadomeyer.com.br', 'Ana Karina E. de Souza', 'anakarinasouza@machadomeyer.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(139, 'veirano.com.br', 'Alberto de Orleans e Bragança', 'alberto.braganca@veirano.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(140, 'veirano.com.br', 'Alex Backsmann', 'alex.backsmann@veirano.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(141, 'veirano.com.br', 'Ana Carolina Barretto', 'ana.barretto@veirano.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(142, 'veirano.com.br', 'Paula Surerus', 'paula.surerus@veirano.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(143, 'veirano.com.br', 'Renata Fialho', 'renata.oliveira@veirano.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(144, 'veirano.com.br', 'Ronaldo Veirano', 'veirano@veirano.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(145, 'cesconbarrieu.com.br', 'Alexandre Barreto', 'alexandre.barreto@cesconbarrieu.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(146, 'cesconbarrieu.com.br', 'Manoela Miranda', 'manoela.miranda@cesconbarrieu.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(147, 'cesconbarrieu.com.br', 'Maurício Barros', 'mauricio.barros@cesconbarrieu.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(148, 'cesconbarrieu.com.br', 'Paulo Macedo', 'paulo.macedo@cesconbarrieu.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(149, 'blg.com', 'Ira Nishisato', 'inishisato@blg.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(150, 'blg.com', 'Hugh Arthur Meighen', 'hmeighen@blg.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(151, 'dwpv.com', 'Franziska Ruf', 'fruf@dwpv.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(152, 'dwpv.com', 'Peter Mendell', 'pmendell@dwpv.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(153, 'dwpv.com', 'Vincent A. Mercier', 'vmercier@dwpv.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(154, 'osler.com', 'Matthew Kronby', 'mkronby@osler.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(155, 'osler.com', 'Lauren Tomasich', 'ltomasich@osler.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(156, 'osler.com', 'Kelsey Armstrong', 'kearmstrong@osler.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(157, 'agycia.cl', 'Arnaldo Gorziglia', 'agorziglia@agycia.cl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(158, 'bofillmir.cl', 'Octavio Bofill G', 'obofill@bofillmir.cl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(159, 'bofillmir.cl', 'Pablo Mir', 'pmir@bofillmir.cl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(160, 'carey.cl', 'Juan Francisco Mackenna', 'jfmackenna@carey.cl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(161, 'carey.cl', 'Óscar Aitken', 'oaitken@carey.cl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(162, 'carey.cl', 'Pablo lacobelli', 'piacobelli@carey.cl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(163, 'carey.cl', 'Patricia Silberman', 'psilberman@carey.cl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(164, 'cariola.cl', 'Andrea Saffie', 'asaffie@cariola.cl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(165, 'moralesybesa.cl', 'Carlos Silva', 'csilva@moralesybesa.cl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(166, 'moralesybesa.cl', 'Macarena Laso', 'mlaso@moralesybesa.cl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(167, 'carey.cl', 'Francisca Corti', 'fcorti@carey.cl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(168, 'zhonglun.com', 'Yun Zhou', 'zhouyun@zhonglun.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(169, 'ppulegal.com', 'Federico Grebe', 'federico.grebe@ppulegal.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(170, 'ppulegal.com', 'Claudia Barrero', 'claudia.barrero@ppulegal.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(171, 'ariaslaw.com', 'Andrey Dorado', 'andrey.dorado@ariaslaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(172, 'bustamantefabara.com', 'Jose Rafael Bustamante Crespo', 'jrbc@bustamantefabara.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(173, 'bustamantefabara.com', 'Juan Felipe Bustamante', 'juanfelipe@bustamantefabara.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(174, 'bustamantefabara.com', 'Maria Rosa Fabara-Vera', 'mrfabara@bustamantefabara.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(175, 'pbplaw.com', 'Estefania Lopez Verdu', 'elopez@pbplaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(176, 'pbplaw.com', 'Juan Manuel Marchan', 'jmarchan@pbplaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(177, 'pbplaw.com', 'Sandra Reed Serrano', 'sreed@pbplaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(178, 'bdgs-associes.com', 'Lucile Gaillard', 'gaillard@bdgs-associes.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(179, 'bredinprat.com', 'José María Pérez', 'josemariaperez@bredinprat.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(180, 'bredinprat.com', 'Didier Martin', 'didiermartin@bredinprat.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(181, 'bredinprat.com', 'Marina Weiss', 'marinaweiss@bredinprat.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(182, 'hengeler.com', 'Hans-Jörg Ziegenhain', 'joerg.ziegenhain@hengeler.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(183, 'noerr.com', 'Christian C.W. Pleister', 'christian.pleister@noerr.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(184, 'noerr.com', 'Laurenz Tholen', 'laurenz.tholen@noerr.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(185, 'advant-beiten.com', 'Oliver Korte', 'oliver.korte@advant-beiten.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(186, 'advant-beiten.com', 'Christian von Wistinghausen', 'christian.wistinghausen@advant-beiten.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(187, 'debrauw.com', 'Reinier Kleipool', 'reinier.kleipool@debrauw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(188, 'stibbe.com', 'Hans Witteveen', 'hans.witteveen@stibbe.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(189, 'arnoldporter.com', 'Carlos A. Lobo', 'carlos.lobo@arnoldporter.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(190, 'foxmandal.in', 'Sushant Shetty', 'sushant.shetty@foxmandal.in', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(191, 'khaitanco.com', 'Rabindra Jhunjhunwala', 'rabindra.jhunjhunwala@khaitanco.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(192, 'belex.com', 'Sir Marco Passalacqua', 'marco.passalacqua@belex.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(193, 'maisto.it', 'Bavila Alessandro', 'a.bavila@maisto.it', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(194, 'chiomenti.net', 'Annalisa Reale', 'annalisa.reale@chiomenti.net', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(195, 'mhm-global.com', 'Katsumasa Suzuki', 'katsumasa.suzuki@mhm-global.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(196, 'mhm-global.com', 'Seiichi Okazaki', 'seiichi.okazaki@mhm-global.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(197, 'mhm-global.com', 'Kenichi Sekiguchi', 'kenichi.sekiguchi@mhm-global.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(198, 'nishimura.com', 'Masaru Umeda', 'm.umeda@nishimura.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(199, 'mhm-global.com', 'Allejah Franco', 'allejah.franco@mhm-global.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(200, 'noandt.com', 'Tokura Akihiro', 'akihiro_tokura@noandt.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(201, 'mhm-global.com', 'Tomohiro Tsuchiya', 'tomohiro.tsuchiya@mhm-global.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(202, 'mhm-global.com', 'Aritsune Miyoda', 'aritsune.miyoda@mhm-global.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(203, 'mhm-global.com', 'Yohsuke Higashi', 'yohsuke.higashi@mhm-global.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(204, 'mhm-global.com', 'Aruto Kagami', 'aruto.kagami@mhm-global.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(205, 'mhm-global.com', 'Nobuhiko Suzuki', 'nobuhiko.suzuki@mhm-global.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(206, 'lennox.nl', 'Gerard Endedijk', 'gerard.endedijk@lennox.nl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(207, 'akd.nl', 'Erwin Redemakers', 'erademakers@akd.nl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(208, 'akd.nl', 'Sandy Van Leeuwen', 'svanleeuwen@akd.nl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(209, 'icazalaw.com', 'Adolfo Andrés Gonzalez-Ruiz Arias', 'adolfog@icazalaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(210, 'estudiorodrigo.com', 'Luis Enrique Palacios', 'lpalacios@estudiorodrigo.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(211, 'caseslacambra.com', 'Bojan Radovanovic', 'bojan.radovanovic@caseslacambra.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(212, 'uria.com', 'Guillermo Canalejo', 'guillermo.canalejo@uria.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(213, 'wilmerhale.com', 'Maria Camila Hoyos', 'maria.hoyos@wilmerhale.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(214, 'chiomenti.net', 'Edoardo Canetta Rossi Palermo', 'edoardo.canetta@chiomenti.net', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(215, 'cgsh.com', 'Jonathan Kolodner', 'jkolodner@cgsh.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(216, 'cgsh.com', 'Jorge U. Juantorena', 'jjuantorena@cgsh.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(217, 'cgsh.com', 'José Manuel Silva', 'msilva@cgsh.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(218, 'cravath.com', 'Daniel J. Cerqueira', 'dcerqueira@cravath.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(219, 'debevoise.com', 'Andrew M. Levine', 'amlevine@debevoise.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(220, 'debevoise.com', 'David Grosgold', 'dgrosgold@debevoise.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(221, 'dechert.com', 'Alvaro Galindo', 'alvaro.galindo@dechert.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(222, 'skadden.com', 'Alejandro Gonzalez Lazzeri', 'alejandro.gonzalez.lazzeri@skadden.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(223, 'skadden.com', 'Brett Fleisher', 'brett.fleisher@skadden.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(224, 'blankrome.com', 'Cecilia Ibarra-Van Oostenrijk', 'cecilia.ibarra-vanoostenrijk@blankrome.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(225, 'ropesgray.com', 'Rob Rivollier', 'bob.rivollier@ropesgray.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(226, 'squairlaw.com', 'Julie Walrafen', 'jwalrafen@squairlaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(227, 'sidley.com', 'Simon Navarro', 'snavarro@sidley.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(228, 'skadden.com', 'Julie Bédard', 'julie.bedard@skadden.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(229, 'akerman.com', 'Gabriela Alexander', 'gabriela.alexander@akerman.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(230, 'cravath.com', 'Timothy G. Cameron', 'tcameron@cravath.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(231, 'rimonlaw.com', 'Nicolas Lafont', 'nicolas.lafont@rimonlaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(232, 'maddocks.com.au', 'Andrew McNee', 'andrew.mcnee@maddocks.com.au', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(233, 'rimonlaw.com', 'Juan Zuñiga', 'juan.zuniga@rimonlaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(234, 'rimonlaw.com', 'Héctor Arangua', 'hector.arangua@rimonlaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(235, 'rimonlaw.com', 'Sean Byrne', 'sean.byrne@rimonlaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(236, 'nelsonmullins.com', 'Lori Anne Czepiel', 'lorianne.czepiel@nelsonmullins.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(237, 'nelsonmullins.com', 'John F. Haley', 'john.haley@nelsonmullins.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(238, 'hka.com', 'Michael Laming', 'michaellaming@hka.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(239, 'ferrere.com', 'Néstor Loizaga', 'nloizaga@ferrere.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(240, 'ferrere.com', 'Agustin Mayer', 'amayer@ferrere.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(241, 'velo-legal.com', 'Juan Antonio Boyd Alemán', 'jboyd@velo-legal.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(242, 'squairlaw.com', 'Maria Lancri', 'mlancri@squairlaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(243, 'shoosmiths.com', 'Alastair Peet', 'alastair.peet@shoosmiths.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(244, 'hka.com', 'Juan Francisco Nasser', 'juanfrancisconasser@hka.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(245, 'sorainen.com', 'Rudolfs Engelis', 'rudolfs.engelis@sorainen.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(246, 'sorainen.com', 'Toomas Prangli', 'toomas.prangli@sorainen.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(247, 'lexvalor.com', 'Juan Francisco Almeida', 'jalmeida@lexvalor.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(248, 'caseslacambra.com', 'José Manuel Llanos', 'josemanuel.llanos@caseslacambra.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(249, 'oppenhoff.eu', 'Edder Cifuentes', 'edder.cifuentes@oppenhoff.eu', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(250, 'stellexlaw.com', 'Anthony Yang', 'anthony.yang@stellexlaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(251, 'dechert.com', 'Bernardo L. Piereck', 'bernardo.piereck@dechert.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(252, 'az.cl', 'Macarena Waidele', 'mwaidele@az.cl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(253, 'gleisslutz.com', 'Christian Cascante', 'christian.cascante@gleisslutz.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(254, 'gleisslutz.com', 'Andrea Leufgen', 'andrea.leufgen@gleisslutz.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(255, 'bakerbotts.com', 'María Carolina Durán', 'mariacarolina.duran@bakerbotts.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(256, 'hugheshubbard.com', 'Diego Durán de la Vega', 'diego.duran@hugheshubbard.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(257, 'draperllc.com', 'Matthew E. Draper', 'matthew.draper@draperllc.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(258, 'gentile.law', 'Marta Batalla Eguidazu', 'martabatalla@gentile.law', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(259, 'lloredacamacho.com', 'Gustavo Tamayo', 'gtamayo@lloredacamacho.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(260, 'mwe.com', 'Ignacio Zabala', 'izabala@mwe.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(261, 'eof.com.ar', 'Cecilia Cook', 'cookc@eof.com.ar', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(262, 'mqmgld.com', 'Camilo Martinez', 'cmartinez@mqmgld.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(263, 'torys.com', 'Gillian Dingl', 'gdingle@torys.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(264, 'bustamantefabara.com', 'Juan José Holguín', 'jholguin@bustamantefabara.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(265, 'bustamantefabara.com', 'José Antonio Fabara', 'jafabara@bustamantefabara.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(266, 'guerrero.cl', 'Camila Costagliola', 'ccostagliola@guerrero.cl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(267, 'vieirarezende.com.br', 'Rafael de Moraes Amorim', 'ramorim@vieirarezende.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(268, 'withersworldwide.com', 'Christina Baltz', 'christina.baltz@withersworldwide.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(269, 'sorainen.com', 'Laimonas Skibarka', 'laimonas.skibarka@sorainen.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(270, 'raedas.com', 'Joana Rego', 'jrego@raedas.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(271, 'swlaw.com', 'Manuel Rajunov​​​​', 'mrajunov@swlaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(272, 'mwe.com', 'Maria Cristina Rosales del Prado', 'mcrosalesdelprado@mwe.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(273, 'blg.com', 'Martin Abadi', 'mabadi@blg.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(274, 'debrauw.com', 'Marnix Leijten', 'marnix.leijten@debrauw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(275, 'roschier.com', 'Ami Paanajärvi', 'ami.paanajarvi@roschier.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(276, 'roschier.com', 'Jens Bengtsson', 'jens.bengtsson@roschier.com', NULL, '2024-10-16 21:52:40', '2024-10-23 15:42:26', '2024-10-23 15:42:26'),
(277, 'apoyoconsultoria.com', 'Vincent Poirier-Garneau', 'vpoirier@apoyoconsultoria.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(278, 'mololamken.com', 'Jennifer Schubert', 'jschubert@mololamken.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(279, 'ropesgray.com', 'David H. Saltzman', 'david.saltzman@ropesgray.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(280, 'phrlegal.com', 'Juan Camilo de Bedout', 'juan.debedout@phrlegal.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(281, 'phrlegal.com', 'Silvia Velasquez', 'silvia.velasquez@phrlegal.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(282, 'berettagodoy.com', 'Joaquin Carrillo', 'carrillo@berettagodoy.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(283, 'marval.com', 'Soledad Riera', 'solr@marval.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(284, 'berettagodoy.com', 'Juan Sonoda', 'sonoda@berettagodoy.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(285, 'dscasahierro.pe', 'Charles Castle', 'ccastle@dscasahierro.pe', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(286, 'mccannfitzgerald.com', 'Stephen Holst', 'stephen.holst@mccannfitzgerald.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(287, 'belex.com', 'Barbara Concolino', 'barbara.concolino@belex.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(288, 'lefosse.com', 'Felipe Gibson', 'felipe.gibson@lefosse.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(289, 'hugheshubbard.com', 'Emilio Saiz Gaela Flores', 'emilio.saiz@hugheshubbard.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(290, 'skadden.com', 'Lorenzo Corte', 'lorenzo.corte@skadden.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(291, 'skadden.com', 'Paola Lozano', 'paola.lozano@skadden.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(292, 'blplegal.com', 'Anneliss Wohlers', 'awohlers@blplegal.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(293, 'chaffetzlindsey.com', 'James Hosking', 'james.hosking@chaffetzlindsey.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(294, 'chaffetzlindsey.com', 'Matilde Flores', 'matilde.flores@chaffetzlindsey.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(295, 'ropesgray.com', 'Matt Posthuma', 'matthew.posthuma@ropesgray.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(296, 'ropesgray.com', 'Matthew J. Byron', 'matthew.byron@ropesgray.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(297, 'ioepik.legal', 'Antonio Montes', 'amontes@ioepik.legal', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(298, 'ioepik.legal', 'Walter Bodden', 'jwalter@ioepik.legal', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(299, 'advant-nctm.com', 'Luca Cavagnaro', 'luca.cavagnaro@advant-nctm.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(300, 'jpadvisors.do', 'Jennifer Beauchamps Haché', 'jbeauchamps@jpadvisors.do', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(301, 'squairlaw.com', 'Sophie Gabillot', 'sgabillot@squairlaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(302, 'squairlaw.com', 'Julia Kalfon', 'jkalfon@squairlaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(303, 'cgsh.com', 'Jonathan Mendes de Oliveira', 'jmendesdeoliveira@cgsh.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(304, 'darroisvilley.com', 'Charles Martin', 'cmartin@darroisvilley.com', NULL, '2024-10-16 21:52:40', '2024-10-24 22:29:54', '2024-10-24 22:29:54'),
(305, 'darroisvilley.com', 'Didier Theophile', 'dtheophile@darroisvilley.com', NULL, '2024-10-16 21:52:40', '2024-10-24 17:37:59', '2024-10-24 17:37:59'),
(306, 'darroisvilley.com', 'Matthieu Brochier', 'mbrochier@darroisvilley.com', NULL, '2024-10-16 21:52:40', '2024-10-24 17:38:26', '2024-10-24 17:38:26'),
(307, 'hugheshubbard.com', 'Daniel H. Weiner', 'daniel.weiner@hugheshubbard.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(308, 'hugheshubbard.com', 'Gaela Gehring Flores', 'gaela.gehringflores@hugheshubbard.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(309, 'skadden.com', 'Jose Vivanco', 'jose.vivanco@skadden.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(310, 'dietz@bindergroesswang.at', 'Christine Dietz', 'dietz@bindergroesswang.at', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(311, 'bpvabogados.com', 'Jordi Biosca', 'jbiosca@bpvabogados.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(312, 'dietz@bindergroesswang.at', 'Isabelle Innerhofer', 'innerhofer@bindergroesswang.at', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(313, 'squairlaw.com', 'Charles - Louis Pierron', 'clpierron@squairlaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(314, 'wienerboerse.at', 'Matthias Szabo', 'matthias.szabo@wienerboerse.at', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(315, 'wienerboerse.at', 'Hector Mohedano', 'hector.mohedano@wienerboerse.at', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(316, 'foxmandal.in', 'Shourya Mandal', 'shourya.mandal@foxmandal.in', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(317, 'lw.com', 'Marcela Ruenes', 'marcela.ruenes@lw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(318, 'lw.com', 'Pedro Rufino Carvalho', 'pedro.rufinocarvalho@lw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(319, 'gide.com', 'Alexandra Munoz', 'alexandra.munoz@gide.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(320, 'blankrome.com', 'Timothy Hruby', 'tim.hruby@blankrome.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(321, 'blankrome.com', 'Eric Parnes', 'eric.parnes@blankrome.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(322, 'drewnapier.com', 'Benjamin Gaw ', 'benjamin.gaw@drewnapier.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(323, 'bennettjones.com', 'Linda Misetich Dann', 'misetichdannl@benettjones.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(324, 'bennettjones.com', 'Ian C. Michel', 'michaeli@bennettjones.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(325, 'agycia.cl', 'Ignacio Arteaga', 'iarteaga@agycia.cl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(326, 'agycia.cl', 'Luciano Cruz', 'lcruz@agycia.cl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(327, 'stibbe.com', 'Claire-Marie Darnand', 'clairemarie.darnand@stibbe.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(328, 'stibbe.com', 'Erik Valgaeren', 'erik.valgaeren@stibbe.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(329, 'stibbe.com', 'Michael Molenaars', 'michael.molenaars@stibbe.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(330, 'fundacionpombo.org', 'Carmen Pombo Morales', 'cpombo@fundacionpombo.org', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(331, 'fundacionpombo.org', 'Francisco Gil Durán', 'fgil@ga-p.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(332, 'fundacionpombo.org', 'Iñigo Erlaiz Cotelo', 'ierlaiz@ga-p.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(333, 'svz.fr', 'Emmanuelle Vicidomini', 'evicidomini@svz.fr', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(334, 'svz.fr', 'Oscar Da Silva', 'odasilva@svz.fr', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(335, 'bsfllp.com', 'John Lyons', 'jlyons@bsfllp.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(336, 'wbd-us.com', ' Jose Luis Vittor', 'joseluis.vittor@wbd-us.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(337, 'wbd-us.com', 'Francisco Balduzzi', 'francisco.balduzzi@wbd-us.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(338, 'dechert.com', 'Laura Brank', 'laura.brank@dechert.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(339, 'debevoise.com', 'Sergio Torres', 'storres@debevoise.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(340, 'prcp.com.pe', 'Juan José Cauvi', 'jjc@prcp.com.pe', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(341, 'blakes.com', 'Bob Wooder', 'bob.wooder@blakes.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(342, 'blakes.com', 'Kate McGilvray', 'kate.mcgilvray@blakes.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(343, 'blakes.com', 'Paul Stepak', 'paul.stepak@blakes.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(344, 'lennox.nl', 'Gerard Endedijk', 'gerard.endedijk@lennox.nl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(345, 'lennox.nl', 'Maarten Vink', 'maarten.vink@lennox.nl', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(346, 'hengeler.com', 'Andreas Hoger', 'andreas.hoger@hengeler.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(347, 'lacourte.com', 'Serge Tatar', 'tatar@lacourte.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(348, 'lacourte.com', 'Jean-Yves Charriau', 'charriau@lacourte.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(349, 'fangdalaw.com', 'Peng Tan', 'peng.tan@fangdalaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(350, 'mololamken.com', 'Anden Chow', 'achow@mololamken.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(351, 'syls.com.ar', 'Eduardo Ferrari', 'ef@syls.law', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(352, 'bu.com.co', 'José Francisco Mafla', 'jmafla@bu.com.co', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(353, 'tpa.com.ve', 'Valentina Cabrera', 'vcabrera@tpa.com.ve', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(354, 'uria.com', 'Carolina Rozo', 'carolina.rozo@ppulegal.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(355, 'khaitanco.com', 'Sanjeev Kapoor', 'sanjeev.kapoor@khaitanco.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(356, 'khaitanco.com', 'Manavendra Mishra', 'manavendra.mishra@khaitanco.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(357, 'siac.org.sg', 'Adriana Uson', 'adrianauson@siac.org.sg', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(358, 'advant-beiten.com', 'Luca Cavagnaro', 'luca.cavagnaro@advant-nctm.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(359, 'www.pillsburylaw.com', 'Robert L. Sills', 'robert.sills@pillsburylaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(360, 'www.pillsburylaw.com', 'Ben Clark', 'ben.clark@pillsburylaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(361, 'blankrome.com', 'Joanne E. Osendarp', 'joanne.osendarp@blankrome.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(362, 'raedas.com', 'William Teddy', 'wteddy@raedas.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(363, 'raedas.com', 'Eric Wheeler ', 'ewheeler@raedas.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(364, 'hengeler.com', 'Annika Clauss', 'annika.clauss@hengeler.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(365, 'hsf.com', 'Eduard Dougherty', 'edward.dougherty@hsf.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(366, 'marval.com', 'Soledad Riera', 'solr@marval.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(367, 'hsf.com', 'Nigel Farr', 'nigel.farr@hsf.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(368, 'nishimura.com', 'Tatsuya Tanigawa', 't.tanigawa@nishimura.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(369, 'nishimura.com', 'Makoto Shimizu', 'm.shimizu@nishimura.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(370, 'prcp.com.pe', 'José Antonio Payet', 'jap@prcp.com.pe', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(371, 'fangdalaw.com', 'Flora Qian', 'flora.qian@fangdalaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(372, 'fangdalaw.com', 'Yingjie Wang', 'yingjie.wang@fangdalaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(373, 'prcp.com.pe', 'Cecilia Gonzáles', 'cgg@prcp.com.pe', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(374, 'www.dwpv.com', 'Richard Fridman', 'rfridman@dwpv.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(375, 'nelsonmullins.com', 'Leandro Vivarelli Molina', 'leandro.molina@nelsonmullins.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(376, 'fangdalaw.com', 'Gil Zhang', 'gil.zhang@fangdalaw.com', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(377, 'cesconbarrieu.com.br', 'Gabriel Seijo Leal de Figueiredo', 'gabriel.seijo@cesconbarrieu.com.br', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(378, 'galicia.com', 'Cecilia Azar', 'cazar@galicia.com.mx', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(379, 'ioepik.legal', 'Donald Dubon', 'ddubon@ioepik.legal', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(380, NULL, 'Matthiew Brochier', NULL, 'Litigation & Arbitration', '2024-10-24 22:30:29', '2024-10-24 22:30:29', NULL),
(381, NULL, 'Forrest Gillet', NULL, 'Corporate, M&A', '2024-10-24 22:30:57', '2024-10-24 22:30:57', NULL),
(382, NULL, 'Carine Dupeyron', NULL, 'Arbitration and Litigation', '2024-10-24 22:31:25', '2024-10-24 22:31:25', NULL),
(383, NULL, 'Hugo Diener', NULL, 'Corpora', '2024-10-24 22:31:49', '2024-10-24 22:31:54', '2024-10-24 22:31:54'),
(384, NULL, 'Hugo Diener', NULL, 'Corporate, M&A', '2024-10-24 22:32:06', '2024-10-24 22:32:06', NULL),
(385, NULL, 'Charles Martin', NULL, 'Banking, M&A', '2024-10-24 22:32:32', '2024-10-24 22:32:32', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delegate_event`
--

CREATE TABLE `delegate_event` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delegate_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `delegate_event`
--

INSERT INTO `delegate_event` (`id`, `delegate_id`, `event_id`, `created_at`, `updated_at`) VALUES
(1, 79, 8, NULL, NULL),
(2, 80, 8, NULL, NULL),
(3, 79, 8, NULL, NULL),
(4, 80, 8, NULL, NULL),
(5, 79, 8, NULL, NULL),
(6, 80, 8, NULL, NULL),
(7, 79, 8, NULL, NULL),
(8, 80, 8, NULL, NULL),
(9, 79, 8, NULL, NULL),
(10, 80, 8, NULL, NULL),
(11, 130, 139, NULL, NULL),
(12, 232, 139, NULL, NULL),
(13, 6, 39, NULL, NULL),
(14, 138, 39, NULL, NULL),
(15, 7, 47, NULL, NULL),
(16, 8, 47, NULL, NULL),
(17, 9, 47, NULL, NULL),
(18, 10, 47, NULL, NULL),
(19, 11, 47, NULL, NULL),
(20, 12, 47, NULL, NULL),
(21, 151, 75, NULL, NULL),
(22, 152, 75, NULL, NULL),
(23, 153, 75, NULL, NULL),
(24, 21, 61, NULL, NULL),
(25, 22, 61, NULL, NULL),
(26, 164, 61, NULL, NULL),
(27, 349, 140, NULL, NULL),
(28, 371, 140, NULL, NULL),
(29, 372, 140, NULL, NULL),
(30, 376, 140, NULL, NULL),
(31, 45, 51, NULL, NULL),
(32, 46, 51, NULL, NULL),
(33, 280, 51, NULL, NULL),
(34, 281, 51, NULL, NULL),
(35, 45, 51, NULL, NULL),
(36, 46, 51, NULL, NULL),
(37, 280, 51, NULL, NULL),
(38, 281, 51, NULL, NULL),
(39, 45, 51, NULL, NULL),
(40, 46, 51, NULL, NULL),
(41, 280, 51, NULL, NULL),
(42, 281, 51, NULL, NULL),
(43, 45, 51, NULL, NULL),
(44, 46, 51, NULL, NULL),
(45, 280, 51, NULL, NULL),
(46, 281, 51, NULL, NULL),
(47, 45, 51, NULL, NULL),
(48, 46, 51, NULL, NULL),
(49, 280, 51, NULL, NULL),
(50, 281, 51, NULL, NULL),
(51, 45, 51, NULL, NULL),
(52, 46, 51, NULL, NULL),
(53, 280, 51, NULL, NULL),
(54, 281, 51, NULL, NULL),
(55, 45, 51, NULL, NULL),
(56, 46, 51, NULL, NULL),
(57, 280, 51, NULL, NULL),
(58, 281, 51, NULL, NULL),
(59, 45, 51, NULL, NULL),
(60, 46, 51, NULL, NULL),
(61, 280, 51, NULL, NULL),
(62, 281, 51, NULL, NULL),
(63, 101, 11, NULL, NULL),
(64, 102, 11, NULL, NULL),
(65, 103, 11, NULL, NULL),
(66, 104, 11, NULL, NULL),
(67, 105, 11, NULL, NULL),
(68, 292, 11, NULL, NULL),
(69, 275, 17, NULL, NULL),
(70, 276, 17, NULL, NULL),
(71, 275, 17, NULL, NULL),
(72, 276, 17, NULL, NULL),
(73, 275, 17, NULL, NULL),
(74, 276, 17, NULL, NULL),
(75, 24, 41, NULL, NULL),
(76, 25, 41, NULL, NULL),
(77, 26, 41, NULL, NULL),
(78, 178, 41, NULL, NULL),
(79, 179, 3, NULL, NULL),
(80, 180, 3, NULL, NULL),
(81, 181, 3, NULL, NULL),
(82, 179, 3, NULL, NULL),
(83, 180, 3, NULL, NULL),
(84, 181, 3, NULL, NULL),
(85, 179, 3, NULL, NULL),
(86, 180, 3, NULL, NULL),
(87, 181, 3, NULL, NULL),
(88, 179, 3, NULL, NULL),
(89, 180, 3, NULL, NULL),
(90, 181, 3, NULL, NULL),
(91, 93, 20, NULL, NULL),
(92, 108, 20, NULL, NULL),
(93, 109, 20, NULL, NULL),
(94, 304, 20, NULL, NULL),
(95, 305, 20, NULL, NULL),
(96, 306, 20, NULL, NULL),
(97, 93, 20, NULL, NULL),
(98, 108, 20, NULL, NULL),
(99, 109, 20, NULL, NULL),
(100, 304, 20, NULL, NULL),
(101, 305, 20, NULL, NULL),
(102, 306, 20, NULL, NULL),
(103, 93, 20, NULL, NULL),
(104, 108, 20, NULL, NULL),
(105, 109, 20, NULL, NULL),
(106, 304, 20, NULL, NULL),
(107, 305, 20, NULL, NULL),
(108, 306, 20, NULL, NULL),
(109, 93, 20, NULL, NULL),
(110, 108, 20, NULL, NULL),
(111, 109, 20, NULL, NULL),
(112, 304, 20, NULL, NULL),
(113, 305, 20, NULL, NULL),
(114, 306, 20, NULL, NULL),
(115, 93, 20, NULL, NULL),
(116, 108, 20, NULL, NULL),
(117, 109, 20, NULL, NULL),
(118, 304, 20, NULL, NULL),
(119, 305, 20, NULL, NULL),
(120, 306, 20, NULL, NULL),
(121, 93, 20, NULL, NULL),
(122, 108, 20, NULL, NULL),
(123, 109, 20, NULL, NULL),
(124, 304, 20, NULL, NULL),
(125, 305, 20, NULL, NULL),
(126, 306, 20, NULL, NULL),
(127, 1, 1, NULL, NULL),
(128, 2, 1, NULL, NULL),
(129, 3, 1, NULL, NULL),
(130, 182, 133, NULL, NULL),
(131, 346, 133, NULL, NULL),
(132, 364, 133, NULL, NULL),
(133, 253, 107, NULL, NULL),
(134, 254, 107, NULL, NULL),
(135, 187, 86, NULL, NULL),
(136, 274, 86, NULL, NULL),
(137, 187, 86, NULL, NULL),
(138, 274, 86, NULL, NULL),
(139, 187, 86, NULL, NULL),
(140, 274, 86, NULL, NULL),
(141, 187, 86, NULL, NULL),
(142, 274, 86, NULL, NULL),
(143, 187, 86, NULL, NULL),
(144, 274, 86, NULL, NULL),
(145, 187, 86, NULL, NULL),
(146, 274, 86, NULL, NULL),
(147, 187, 86, NULL, NULL),
(148, 274, 86, NULL, NULL),
(149, 187, 86, NULL, NULL),
(150, 274, 86, NULL, NULL),
(151, 187, 86, NULL, NULL),
(152, 274, 86, NULL, NULL),
(153, 188, 49, NULL, NULL),
(154, 327, 49, NULL, NULL),
(155, 328, 49, NULL, NULL),
(156, 329, 49, NULL, NULL),
(157, 188, 49, NULL, NULL),
(158, 327, 49, NULL, NULL),
(159, 328, 49, NULL, NULL),
(160, 329, 49, NULL, NULL),
(161, 188, 49, NULL, NULL),
(162, 327, 49, NULL, NULL),
(163, 328, 49, NULL, NULL),
(164, 329, 49, NULL, NULL),
(165, 188, 49, NULL, NULL),
(166, 327, 49, NULL, NULL),
(167, 328, 49, NULL, NULL),
(168, 329, 49, NULL, NULL),
(169, 188, 49, NULL, NULL),
(170, 327, 49, NULL, NULL),
(171, 328, 49, NULL, NULL),
(172, 329, 49, NULL, NULL),
(173, 286, 91, NULL, NULL),
(174, 194, 85, NULL, NULL),
(175, 214, 85, NULL, NULL),
(176, 192, 68, NULL, NULL),
(177, 287, 68, NULL, NULL),
(178, 84, 31, NULL, NULL),
(179, 195, 111, NULL, NULL),
(180, 196, 111, NULL, NULL),
(181, 197, 111, NULL, NULL),
(182, 199, 111, NULL, NULL),
(183, 201, 111, NULL, NULL),
(184, 202, 111, NULL, NULL),
(185, 203, 111, NULL, NULL),
(186, 204, 111, NULL, NULL),
(187, 205, 111, NULL, NULL),
(188, 198, 155, NULL, NULL),
(189, 368, 155, NULL, NULL),
(190, 369, 155, NULL, NULL),
(191, 198, 155, NULL, NULL),
(192, 368, 155, NULL, NULL),
(193, 369, 155, NULL, NULL),
(194, 198, 155, NULL, NULL),
(195, 368, 155, NULL, NULL),
(196, 369, 155, NULL, NULL),
(197, 207, 44, NULL, NULL),
(198, 208, 44, NULL, NULL),
(199, 340, 117, NULL, NULL),
(200, 370, 117, NULL, NULL),
(201, 373, 117, NULL, NULL),
(202, 340, 117, NULL, NULL),
(203, 370, 117, NULL, NULL),
(204, 373, 117, NULL, NULL),
(205, 340, 117, NULL, NULL),
(206, 370, 117, NULL, NULL),
(207, 373, 117, NULL, NULL),
(208, 340, 117, NULL, NULL),
(209, 370, 117, NULL, NULL),
(210, 373, 117, NULL, NULL),
(211, 340, 117, NULL, NULL),
(212, 370, 117, NULL, NULL),
(213, 373, 117, NULL, NULL),
(214, 42, 154, NULL, NULL),
(215, 169, 154, NULL, NULL),
(216, 170, 154, NULL, NULL),
(217, 42, 154, NULL, NULL),
(218, 169, 154, NULL, NULL),
(219, 170, 154, NULL, NULL),
(220, 4, 56, NULL, NULL),
(221, 5, 56, NULL, NULL),
(222, 75, 27, NULL, NULL),
(223, 76, 27, NULL, NULL),
(224, 75, 27, NULL, NULL),
(225, 76, 27, NULL, NULL),
(226, 69, 23, NULL, NULL),
(227, 70, 23, NULL, NULL),
(228, 71, 23, NULL, NULL),
(229, 72, 23, NULL, NULL),
(230, 73, 23, NULL, NULL),
(231, 74, 23, NULL, NULL),
(232, 229, 23, NULL, NULL),
(233, 69, 23, NULL, NULL),
(234, 70, 23, NULL, NULL),
(235, 71, 23, NULL, NULL),
(236, 72, 23, NULL, NULL),
(237, 73, 23, NULL, NULL),
(238, 74, 23, NULL, NULL),
(239, 229, 23, NULL, NULL),
(240, 69, 23, NULL, NULL),
(241, 70, 23, NULL, NULL),
(242, 71, 23, NULL, NULL),
(243, 72, 23, NULL, NULL),
(244, 73, 23, NULL, NULL),
(245, 74, 23, NULL, NULL),
(246, 229, 23, NULL, NULL),
(247, 69, 23, NULL, NULL),
(248, 70, 23, NULL, NULL),
(249, 71, 23, NULL, NULL),
(250, 72, 23, NULL, NULL),
(251, 73, 23, NULL, NULL),
(252, 74, 23, NULL, NULL),
(253, 229, 23, NULL, NULL),
(254, 69, 23, NULL, NULL),
(255, 70, 23, NULL, NULL),
(256, 71, 23, NULL, NULL),
(257, 72, 23, NULL, NULL),
(258, 73, 23, NULL, NULL),
(259, 74, 23, NULL, NULL),
(260, 229, 23, NULL, NULL),
(261, 69, 23, NULL, NULL),
(262, 70, 23, NULL, NULL),
(263, 71, 23, NULL, NULL),
(264, 72, 23, NULL, NULL),
(265, 73, 23, NULL, NULL),
(266, 74, 23, NULL, NULL),
(267, 229, 23, NULL, NULL),
(268, 69, 23, NULL, NULL),
(269, 70, 23, NULL, NULL),
(270, 71, 23, NULL, NULL),
(271, 72, 23, NULL, NULL),
(272, 73, 23, NULL, NULL),
(273, 74, 23, NULL, NULL),
(274, 229, 23, NULL, NULL),
(275, 215, 14, NULL, NULL),
(276, 216, 14, NULL, NULL),
(277, 217, 14, NULL, NULL),
(278, 303, 14, NULL, NULL),
(279, 218, 136, NULL, NULL),
(280, 230, 136, NULL, NULL),
(281, 218, 136, NULL, NULL),
(282, 230, 136, NULL, NULL),
(283, 218, 136, NULL, NULL),
(284, 230, 136, NULL, NULL),
(285, 218, 136, NULL, NULL),
(286, 230, 136, NULL, NULL),
(287, 218, 136, NULL, NULL),
(288, 230, 136, NULL, NULL),
(289, 218, 136, NULL, NULL),
(290, 230, 136, NULL, NULL),
(291, 218, 136, NULL, NULL),
(292, 230, 136, NULL, NULL),
(293, 218, 136, NULL, NULL),
(294, 230, 136, NULL, NULL),
(295, 218, 136, NULL, NULL),
(296, 230, 136, NULL, NULL),
(297, 218, 136, NULL, NULL),
(298, 230, 136, NULL, NULL),
(299, 221, 110, NULL, NULL),
(300, 251, 110, NULL, NULL),
(301, 338, 110, NULL, NULL),
(302, 221, 110, NULL, NULL),
(303, 251, 110, NULL, NULL),
(304, 338, 110, NULL, NULL),
(305, 221, 110, NULL, NULL),
(306, 251, 110, NULL, NULL),
(307, 338, 110, NULL, NULL),
(308, 221, 110, NULL, NULL),
(309, 251, 110, NULL, NULL),
(310, 338, 110, NULL, NULL),
(311, 221, 110, NULL, NULL),
(312, 251, 110, NULL, NULL),
(313, 338, 110, NULL, NULL),
(314, 221, 110, NULL, NULL),
(315, 251, 110, NULL, NULL),
(316, 338, 110, NULL, NULL),
(317, 221, 110, NULL, NULL),
(318, 251, 110, NULL, NULL),
(319, 338, 110, NULL, NULL),
(320, 221, 110, NULL, NULL),
(321, 251, 110, NULL, NULL),
(322, 338, 110, NULL, NULL),
(323, 221, 110, NULL, NULL),
(324, 251, 110, NULL, NULL),
(325, 338, 110, NULL, NULL),
(326, 221, 110, NULL, NULL),
(327, 251, 110, NULL, NULL),
(328, 338, 110, NULL, NULL),
(329, 221, 110, NULL, NULL),
(330, 251, 110, NULL, NULL),
(331, 338, 110, NULL, NULL),
(332, 222, 5, NULL, NULL),
(333, 223, 5, NULL, NULL),
(334, 228, 5, NULL, NULL),
(335, 290, 5, NULL, NULL),
(336, 291, 5, NULL, NULL),
(337, 309, 5, NULL, NULL),
(338, 222, 5, NULL, NULL),
(339, 223, 5, NULL, NULL),
(340, 228, 5, NULL, NULL),
(341, 290, 5, NULL, NULL),
(342, 291, 5, NULL, NULL),
(343, 309, 5, NULL, NULL),
(344, 222, 5, NULL, NULL),
(345, 223, 5, NULL, NULL),
(346, 228, 5, NULL, NULL),
(347, 290, 5, NULL, NULL),
(348, 291, 5, NULL, NULL),
(349, 309, 5, NULL, NULL),
(350, 222, 5, NULL, NULL),
(351, 223, 5, NULL, NULL),
(352, 228, 5, NULL, NULL),
(353, 290, 5, NULL, NULL),
(354, 291, 5, NULL, NULL),
(355, 309, 5, NULL, NULL),
(356, 222, 5, NULL, NULL),
(357, 223, 5, NULL, NULL),
(358, 228, 5, NULL, NULL),
(359, 290, 5, NULL, NULL),
(360, 291, 5, NULL, NULL),
(361, 309, 5, NULL, NULL),
(362, 222, 5, NULL, NULL),
(363, 223, 5, NULL, NULL),
(364, 228, 5, NULL, NULL),
(365, 290, 5, NULL, NULL),
(366, 291, 5, NULL, NULL),
(367, 309, 5, NULL, NULL),
(368, 222, 5, NULL, NULL),
(369, 223, 5, NULL, NULL),
(370, 228, 5, NULL, NULL),
(371, 290, 5, NULL, NULL),
(372, 291, 5, NULL, NULL),
(373, 309, 5, NULL, NULL),
(374, 222, 5, NULL, NULL),
(375, 223, 5, NULL, NULL),
(376, 228, 5, NULL, NULL),
(377, 290, 5, NULL, NULL),
(378, 291, 5, NULL, NULL),
(379, 309, 5, NULL, NULL),
(380, 218, 136, NULL, NULL),
(381, 230, 136, NULL, NULL),
(382, 149, 81, NULL, NULL),
(383, 150, 81, NULL, NULL),
(384, 273, 81, NULL, NULL),
(385, 31, 58, NULL, NULL),
(386, 189, 58, NULL, NULL),
(387, 32, 2, NULL, NULL),
(388, 33, 2, NULL, NULL),
(389, 79, 8, NULL, NULL),
(390, 80, 8, NULL, NULL),
(391, 37, 137, NULL, NULL),
(392, 38, 137, NULL, NULL),
(393, 39, 137, NULL, NULL),
(394, 238, 129, NULL, NULL),
(395, 244, 129, NULL, NULL),
(396, 40, 88, NULL, NULL),
(397, 241, 88, NULL, NULL),
(398, 40, 88, NULL, NULL),
(399, 241, 88, NULL, NULL),
(400, 236, 132, NULL, NULL),
(401, 237, 132, NULL, NULL),
(402, 375, 132, NULL, NULL),
(403, 85, 10, NULL, NULL),
(404, 213, 10, NULL, NULL),
(405, 43, 62, NULL, NULL),
(406, 44, 62, NULL, NULL),
(407, 121, 62, NULL, NULL),
(408, 183, 4, NULL, NULL),
(409, 184, 4, NULL, NULL),
(410, 188, 49, NULL, NULL),
(411, 327, 49, NULL, NULL),
(412, 328, 49, NULL, NULL),
(413, 329, 49, NULL, NULL),
(414, 68, 7, NULL, NULL),
(415, 311, 7, NULL, NULL),
(416, 67, 6, NULL, NULL),
(417, 249, 6, NULL, NULL),
(418, 221, 110, NULL, NULL),
(419, 251, 110, NULL, NULL),
(420, 338, 110, NULL, NULL),
(421, 172, 108, NULL, NULL),
(422, 173, 108, NULL, NULL),
(423, 174, 108, NULL, NULL),
(424, 264, 108, NULL, NULL),
(425, 265, 108, NULL, NULL),
(426, 61, 127, NULL, NULL),
(427, 62, 127, NULL, NULL),
(428, 266, 127, NULL, NULL),
(429, 257, 50, NULL, NULL),
(430, 206, 123, NULL, NULL),
(431, 344, 123, NULL, NULL),
(432, 345, 123, NULL, NULL),
(433, 263, 100, NULL, NULL),
(434, 323, 74, NULL, NULL),
(435, 324, 74, NULL, NULL),
(436, 65, 24, NULL, NULL),
(437, 261, 24, NULL, NULL),
(438, 157, 45, NULL, NULL),
(439, 325, 45, NULL, NULL),
(440, 326, 45, NULL, NULL),
(441, 245, 106, NULL, NULL),
(442, 246, 106, NULL, NULL),
(443, 269, 106, NULL, NULL),
(444, 293, 32, NULL, NULL),
(445, 294, 32, NULL, NULL),
(446, 66, 103, NULL, NULL),
(447, 267, 103, NULL, NULL),
(448, 139, 40, NULL, NULL),
(449, 140, 40, NULL, NULL),
(450, 141, 40, NULL, NULL),
(451, 142, 40, NULL, NULL),
(452, 143, 40, NULL, NULL),
(453, 144, 40, NULL, NULL),
(454, 135, 141, NULL, NULL),
(455, 145, 141, NULL, NULL),
(456, 146, 141, NULL, NULL),
(457, 147, 141, NULL, NULL),
(458, 148, 141, NULL, NULL),
(459, 377, 141, NULL, NULL),
(460, 114, 13, NULL, NULL),
(461, 115, 13, NULL, NULL),
(462, 75, 27, NULL, NULL),
(463, 76, 27, NULL, NULL),
(464, 18, 43, NULL, NULL),
(465, 171, 43, NULL, NULL),
(466, 27, 98, NULL, NULL),
(467, 28, 98, NULL, NULL),
(468, 193, 98, NULL, NULL),
(469, 158, 72, NULL, NULL),
(470, 159, 72, NULL, NULL),
(471, 35, 109, NULL, NULL),
(472, 36, 109, NULL, NULL),
(473, 188, 49, NULL, NULL),
(474, 327, 49, NULL, NULL),
(475, 328, 49, NULL, NULL),
(476, 329, 49, NULL, NULL),
(477, 188, 49, NULL, NULL),
(478, 327, 49, NULL, NULL),
(479, 328, 49, NULL, NULL),
(480, 329, 49, NULL, NULL),
(481, 275, 17, NULL, NULL),
(482, 276, 17, NULL, NULL),
(483, 236, 132, NULL, NULL),
(484, 237, 132, NULL, NULL),
(485, 375, 132, NULL, NULL),
(486, 236, 132, NULL, NULL),
(487, 237, 132, NULL, NULL),
(488, 375, 132, NULL, NULL),
(489, 236, 132, NULL, NULL),
(490, 237, 132, NULL, NULL),
(491, 375, 132, NULL, NULL),
(492, 179, 3, NULL, NULL),
(493, 180, 3, NULL, NULL),
(494, 181, 3, NULL, NULL),
(495, 179, 3, NULL, NULL),
(496, 180, 3, NULL, NULL),
(497, 181, 3, NULL, NULL),
(498, 179, 3, NULL, NULL),
(499, 180, 3, NULL, NULL),
(500, 181, 3, NULL, NULL),
(501, 179, 3, NULL, NULL),
(502, 180, 3, NULL, NULL),
(503, 181, 3, NULL, NULL),
(504, 179, 3, NULL, NULL),
(505, 180, 3, NULL, NULL),
(506, 181, 3, NULL, NULL),
(507, 32, 2, NULL, NULL),
(508, 33, 2, NULL, NULL),
(509, 185, 38, NULL, NULL),
(510, 186, 38, NULL, NULL),
(511, 358, 38, NULL, NULL),
(518, 32, 2, NULL, NULL),
(519, 33, 2, NULL, NULL),
(520, 40, 88, NULL, NULL),
(521, 241, 88, NULL, NULL),
(522, 81, 9, NULL, NULL),
(523, 82, 9, NULL, NULL),
(524, 83, 9, NULL, NULL),
(525, 48, 99, NULL, NULL),
(526, 127, 99, NULL, NULL),
(527, 94, 22, NULL, NULL),
(528, 95, 22, NULL, NULL),
(529, 96, 22, NULL, NULL),
(530, 97, 22, NULL, NULL),
(531, 98, 22, NULL, NULL),
(532, 99, 22, NULL, NULL),
(533, 100, 22, NULL, NULL),
(534, 63, 97, NULL, NULL),
(535, 64, 97, NULL, NULL),
(536, 259, 97, NULL, NULL),
(537, 63, 97, NULL, NULL),
(538, 64, 97, NULL, NULL),
(539, 259, 97, NULL, NULL),
(540, 63, 97, NULL, NULL),
(541, 64, 97, NULL, NULL),
(542, 259, 97, NULL, NULL),
(543, 106, 12, NULL, NULL),
(544, 107, 12, NULL, NULL),
(545, 270, 125, NULL, NULL),
(546, 362, 125, NULL, NULL),
(547, 363, 125, NULL, NULL),
(548, 118, 28, NULL, NULL),
(549, 277, 28, NULL, NULL),
(550, 119, 115, NULL, NULL),
(551, 365, 115, NULL, NULL),
(552, 367, 115, NULL, NULL),
(553, 86, 15, NULL, NULL),
(554, 87, 15, NULL, NULL),
(555, 88, 15, NULL, NULL),
(556, 89, 15, NULL, NULL),
(557, 90, 15, NULL, NULL),
(558, 91, 15, NULL, NULL),
(559, 92, 15, NULL, NULL),
(560, 23, 16, NULL, NULL),
(561, 77, 16, NULL, NULL),
(562, 78, 16, NULL, NULL),
(563, 19, 19, NULL, NULL),
(564, 20, 19, NULL, NULL),
(565, 131, 19, NULL, NULL),
(566, 211, 21, NULL, NULL),
(567, 248, 21, NULL, NULL),
(568, 256, 25, NULL, NULL),
(569, 289, 25, NULL, NULL),
(570, 307, 25, NULL, NULL),
(571, 308, 25, NULL, NULL),
(572, 209, 26, NULL, NULL),
(573, 225, 30, NULL, NULL),
(574, 279, 30, NULL, NULL),
(575, 295, 30, NULL, NULL),
(576, 296, 30, NULL, NULL),
(577, 116, 33, NULL, NULL),
(578, 117, 33, NULL, NULL),
(579, 110, 34, NULL, NULL),
(580, 111, 34, NULL, NULL),
(581, 112, 34, NULL, NULL),
(582, 113, 34, NULL, NULL),
(583, 160, 46, NULL, NULL),
(584, 161, 46, NULL, NULL),
(585, 162, 46, NULL, NULL),
(586, 163, 46, NULL, NULL),
(587, 167, 46, NULL, NULL),
(588, 49, 48, NULL, NULL),
(589, 50, 48, NULL, NULL),
(590, 120, 48, NULL, NULL),
(591, 300, 52, NULL, NULL),
(592, 282, 53, NULL, NULL),
(593, 284, 53, NULL, NULL),
(594, 56, 54, NULL, NULL),
(595, 57, 54, NULL, NULL),
(596, 58, 54, NULL, NULL),
(597, 260, 54, NULL, NULL),
(598, 272, 54, NULL, NULL),
(599, 226, 55, NULL, NULL),
(600, 242, 55, NULL, NULL),
(601, 301, 55, NULL, NULL),
(602, 302, 55, NULL, NULL),
(603, 313, 55, NULL, NULL),
(604, 268, 57, NULL, NULL),
(605, 14, 63, NULL, NULL),
(606, 136, 63, NULL, NULL),
(607, 319, 65, NULL, NULL),
(608, 314, 66, NULL, NULL),
(609, 315, 66, NULL, NULL),
(610, 322, 67, NULL, NULL),
(611, 190, 69, NULL, NULL),
(612, 316, 69, NULL, NULL),
(613, 224, 70, NULL, NULL),
(614, 320, 70, NULL, NULL),
(615, 321, 70, NULL, NULL),
(616, 361, 70, NULL, NULL),
(617, 317, 71, NULL, NULL),
(618, 318, 71, NULL, NULL),
(619, 227, 73, NULL, NULL),
(620, 168, 76, NULL, NULL),
(621, 34, 82, NULL, NULL),
(622, 231, 82, NULL, NULL),
(623, 233, 82, NULL, NULL),
(624, 234, 82, NULL, NULL),
(625, 235, 82, NULL, NULL),
(626, 258, 83, NULL, NULL),
(627, 15, 84, NULL, NULL),
(628, 16, 84, NULL, NULL),
(629, 17, 84, NULL, NULL),
(630, 210, 84, NULL, NULL),
(631, 335, 87, NULL, NULL),
(632, 330, 89, NULL, NULL),
(633, 331, 89, NULL, NULL),
(634, 332, 89, NULL, NULL),
(635, 333, 90, NULL, NULL),
(636, 334, 90, NULL, NULL),
(637, 175, 92, NULL, NULL),
(638, 176, 92, NULL, NULL),
(639, 177, 92, NULL, NULL),
(640, 52, 93, NULL, NULL),
(641, 53, 93, NULL, NULL),
(642, 54, 93, NULL, NULL),
(643, 55, 93, NULL, NULL),
(644, 262, 93, NULL, NULL),
(645, 137, 94, NULL, NULL),
(646, 288, 94, NULL, NULL),
(647, 336, 95, NULL, NULL),
(648, 337, 95, NULL, NULL),
(649, 47, 96, NULL, NULL),
(650, 247, 96, NULL, NULL),
(651, 285, 101, NULL, NULL),
(652, 41, 104, NULL, NULL),
(653, 200, 104, NULL, NULL),
(654, 13, 105, NULL, NULL),
(655, 239, 105, NULL, NULL),
(656, 240, 105, NULL, NULL),
(657, 219, 112, NULL, NULL),
(658, 220, 112, NULL, NULL),
(659, 339, 112, NULL, NULL),
(660, 51, 114, NULL, NULL),
(661, 255, 114, NULL, NULL),
(662, 243, 118, NULL, NULL),
(663, 271, 119, NULL, NULL),
(664, 341, 120, NULL, NULL),
(665, 342, 120, NULL, NULL),
(666, 343, 120, NULL, NULL),
(667, 132, 122, NULL, NULL),
(668, 133, 122, NULL, NULL),
(669, 134, 122, NULL, NULL),
(670, 29, 126, NULL, NULL),
(671, 30, 126, NULL, NULL),
(672, 165, 130, NULL, NULL),
(673, 166, 130, NULL, NULL),
(674, 122, 131, NULL, NULL),
(675, 123, 131, NULL, NULL),
(676, 124, 131, NULL, NULL),
(677, 125, 131, NULL, NULL),
(678, 126, 131, NULL, NULL),
(679, 129, 131, NULL, NULL),
(680, 283, 131, NULL, NULL),
(681, 366, 131, NULL, NULL),
(682, 154, 134, NULL, NULL),
(683, 155, 134, NULL, NULL),
(684, 156, 134, NULL, NULL),
(685, 347, 135, NULL, NULL),
(686, 348, 135, NULL, NULL),
(687, 278, 142, NULL, NULL),
(688, 350, 142, NULL, NULL),
(689, 128, 143, NULL, NULL),
(690, 351, 143, NULL, NULL),
(691, 297, 145, NULL, NULL),
(692, 298, 145, NULL, NULL),
(693, 379, 145, NULL, NULL),
(694, 250, 146, NULL, NULL),
(695, 352, 147, NULL, NULL),
(696, 353, 148, NULL, NULL),
(697, 191, 150, NULL, NULL),
(698, 355, 150, NULL, NULL),
(699, 356, 150, NULL, NULL),
(700, 252, 151, NULL, NULL),
(701, 357, 152, NULL, NULL),
(702, 352, 147, NULL, NULL),
(703, 374, 75, NULL, NULL),
(704, 378, 77, NULL, NULL),
(705, 380, 20, NULL, NULL),
(706, 381, 20, NULL, NULL),
(707, 382, 20, NULL, NULL),
(708, 383, 20, NULL, NULL),
(709, 384, 20, NULL, NULL),
(710, 385, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lawfirm` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `original` varchar(255) DEFAULT NULL,
  `room` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `format` varchar(191) DEFAULT NULL,
  `practice_area` varchar(255) DEFAULT NULL,
  `notes` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `practice_area_id` bigint(20) UNSIGNED DEFAULT NULL,
  `law_firm_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `lawfirm`, `country`, `original`, `room`, `date`, `format`, `practice_area`, `notes`, `created_at`, `updated_at`, `deleted_at`, `practice_area_id`, `law_firm_id`) VALUES
(1, 'De Pardieu Brocas Maffei', 'France', NULL, 'CI - Lorenzo Servitje', '2024-09-17', 'X', 'X', '<div class=\"ql-editor ql-blank\" data-gramm=\"false\" contenteditable=\"true\"><p><br></p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', '2024-10-16 21:52:40', '2024-10-17 17:50:09', NULL, NULL, NULL),
(2, 'Osborne Clarke', 'United States', NULL, 'CI - Cuernavaca', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(3, 'Bredin Prat', 'France', NULL, 'GAL - Sala 1', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(4, 'NOERR', 'Germany', NULL, 'GAL - Sala 1', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(5, 'Skadden', 'United States', NULL, 'GAL - Sala 1', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(6, 'Oppenhoff', 'Germany', NULL, 'GAL - Sala 1', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(7, 'BPV ABOGADOS', 'España', NULL, 'GAL - Sala 2', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(8, 'Nicholson y Cano Abogados', 'Argentina', NULL, 'GAL - Sala 3', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(9, 'Pinsent Masons', 'England', NULL, 'GAL - Sala 3', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(10, 'WilmerHale', 'United Kingdom', NULL, 'GAL - Sala 3', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(11, 'BLP Legal', 'Costa Rica', NULL, 'GAL - Sala 7A', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(12, 'Wandia Ghandy Co.', NULL, NULL, 'GAL - Sala 7A', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(13, 'Houthoff', 'Netherlands', NULL, 'GAL - Sala 8', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(14, 'Cleary Gottlieb', 'United States', NULL, 'GAL - Sala 1', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(15, 'Brochure Funes de Rioja', NULL, NULL, 'GAL - Sala 1', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(16, 'Rebaza Alcázar De Las Casas Abogados', NULL, NULL, 'GAL - Sala 3', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(17, 'Roschier', 'Finland', NULL, 'GAL - Sala 8', '2024-09-16', 'One 2 one meeting', 'Private Equity, M&A, Competencia, Arbitraje', '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\"><p>Sobre la región:</p><p>•</p><p>Suecia es un hub financiero en la región Nórdica con un número muy interesante de compañías listadas;</p><p>•</p><p>Aunque Suecia es una jurisdicción pequeña, el mercado de capitales es profundo y compite con Alemania, por ejemplo;</p><p>•</p><p>Estocolmo es un importante hub de arbitraje (segundo en Europa después de Londres, similar a París). Se lo ve como “independiente”;</p><p>Sobre Roschier:</p><p>•</p><p>Fuerte apalancamiento con firmas de PE;</p><p>•</p><p>Sus operaciones son “sin costuras” entre Suecia/Finlandia. Mismo pool de abogados entre las dos oficinas para práctica corporativa;</p><p>•</p><p>@130 fee earners en cada oficina (Estocolmo y Helsinki). Tratan de mantenerse en un tamaño razonable (not too big);</p><p>•</p><p>Su estrategia es buscar obtener el lead mandate con PE y otros clientes. El reto es “esquivar” a las firmas internacionales. Buscan contactos con GC de los fondos,</p><p>lead Partners en Londres y/o EE.UU. y, sobe todo,</p><p>Nordic Team que acaba haciendo la contratación de abogados;</p><p>•</p><p>Las firmas de PE típicamente tienen un Nordic Team en Londres u otros lugares;</p><p>•</p><p>Trabajo regulatorio en sanciones (Rusia) y state aid;</p><p>Industrias principales:</p><p>•</p><p>Suecia y Finlandia son ricos en recursos naturales. Principales industrias son minería y silvicultura;</p><p>•</p><p>Boom de industria de tecnología (música, como Spotify, gaming, como Angry Birds), etc. Hub para unicornios;</p><p>•</p><p>National champions en automotriz, aviación e industria militar también (Volvo, Skandia, Saab).</p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', '2024-10-16 21:52:40', '2024-10-22 18:08:41', NULL, NULL, NULL),
(18, 'Camhi Campos', NULL, NULL, 'GAL - Sala 6', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(19, 'Corrs Chambers Westgarth', NULL, NULL, 'GAL - Sala 8', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(20, 'Darrois Villey Maillot Brochier', 'France', NULL, 'GAL - Sala 7B', '2024-09-16', 'One to One Meeting', NULL, '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\"><p>Firma 100% local con especialidades concretas para trabajo transaccional de alto nivel (tienen competencia y fiscal, pero no laboral).</p><p><br></p><p>Han incorporado abogados penales en su equipo de compliance, en virtud del aumento de la demanda de sus servicios y visto bueno para investigaciones. ESG y litigio de ESG à la mode, principalmente iniciado por ONGs.</p><p><br></p><p>Actualmente ya nos mandan trabajo para empresas de gran tamaño (Saint Gobain).</p><p><br></p><p>Preguntas para México estuvieron alrededor de la reforma judicial y expectativa de impacto incluso para arbitrajes con sede en México.</p><p><br></p><p>Cuentan con ex socio de Macfarlanes (Charles Martin) que en su retiro es ahora liason de Darrois con Inglaterra, principalmente para trabajo bancario.</p><p><br></p><p>Hay acciones posibles de seguimiento para poner en contacto a socios de áreas especializadas (comercio exterior, competencia, fiscal). El socio de competencia no pudo asistir por temas laborales.</p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\" style=\"margin-top: -38.6667px;\"><a class=\"ql-preview\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', '2024-10-16 21:52:40', '2024-10-24 22:36:21', NULL, NULL, NULL),
(21, 'Cases & Lacambra', 'España / Andorra', NULL, 'GAL - Sala 1', '2024-09-16', 'One to One Meeting', NULL, '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\"><p>Sobre Cases &amp; Lacambra:</p><p><br></p><p>Oficina en Madrid, Barcelona y Andorra.</p><p><br></p><p>Un rep office de 1 persona (socio) en Miami.</p><p><br></p><p>Tienen oficina en Andorra principalmente para Wealth Management y Rep. Office en Miami</p><p><br></p><p>100% despacho independiente</p><p><br></p><p>70 abogados. Tratan de mantenerse en un tamaño razonable</p><p><br></p><p>Con fortaleza en áreas: Financiero, Infraestructura, Wealth Management (de extranjeros invirtiendo / residiendo en España), Inmobiliario, M&amp;A crossborder.</p><p><br></p><p>Net worth individuals invirtiendo en España</p><p><br></p><p>Reciente incorporación de un socio (Oscar Morales) en área de Whitecollar / Compliance / Investigaciones Corporativas.</p><p><br></p><p>Contrataron a una abogada muy senior del Estado que era la abogada del gobierno de Mariano Rajoy</p><p><br></p><p>Ellos se ubican compitiendo con Uría, Cuatrecasas, Garrigues, Perez Llorca – sin tener el tamaño y costos de</p><p>GA, esos despachos bastante más grandes, y por encima de Ontier y Andersen.</p><p><br></p><p>Acciones de Seguimiento:</p><p>Poner en contacto áreas de Wealth Management</p><p>Conocen bien al director jurídico de Aleatica con quien ya</p><p>trabajamos.</p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\" style=\"margin-top: -223px;\"><a class=\"ql-preview\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', '2024-10-16 21:52:40', '2024-10-24 16:49:22', NULL, NULL, NULL),
(22, 'Pillsbury', 'United States', NULL, 'GAL - Sala 7A', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(23, 'Akerman', 'United States', NULL, 'GAL - Sala 2', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(24, 'O Farrell ', 'Argentina', NULL, 'GAL - Sala 3', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(25, 'Hughes Hubbard', NULL, NULL, 'GAL - Sala 2', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(26, 'Icaza Gonzáles Ruíz & Alemán', NULL, NULL, 'GAL - Sala 7A', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(27, 'Slaughter and May', 'United Kingdom', NULL, 'GAL - Sala 2', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(28, 'APOYO Consultoría ', 'Peru', NULL, 'GAL - Sala 3', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(29, 'BLP Legal', 'Costa Rica', NULL, 'GAL - Sala 7B', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(30, 'Ropes Gray', NULL, NULL, 'GAL - Sala 1', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(31, 'Legance Avvocati Associati', 'Italy', NULL, 'GAL - Sala 3', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(32, 'Chaffetz Lindsey', 'United States', NULL, 'GAL - Sala 2', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(33, 'Stikeman', NULL, NULL, 'GAL - Sala 8', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(34, 'Pinheiro Neto', NULL, NULL, 'GAL - Sala 7B', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(35, 'Fordham University', 'United States', NULL, 'GAL - Sala 7A', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(36, 'Fordham University', 'United States', NULL, 'GAL - Sala 7B', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(37, 'BINDER GRÖSSWANG', 'Austria', NULL, 'GAL - Sala 8', '2024-09-16', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(38, 'Advant Beiten', 'Germany', NULL, 'CI - Cuernavaca', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(39, 'Machado Meyer Advogados', 'Brazil', NULL, 'GAL - Sala 7B', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(40, 'Veirano Advogados', 'Brazil', NULL, 'CI - Querétaro', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(41, 'BDGS ASSOCIÉS AARPI', 'France', NULL, 'CI - Guadalajara', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(42, 'AO Shearman', NULL, NULL, 'GAL - Sala 1', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(43, 'Arias', 'Costa Rica', NULL, 'GAL - Sala 2', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(44, 'AKD', 'Netherlands/Bel//Lux', NULL, 'GAL - Sala 8', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(45, 'Arteaga Gorziglia', 'Chile', NULL, 'GAL - Sala 7A', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(46, 'Carey', NULL, NULL, 'GAL - Sala 1', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(47, 'Tozzini Freire Advogados', 'Brazil', NULL, 'CI - Cuernavaca', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(48, 'Allende y Brea', NULL, NULL, 'CI - San Cristobal', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(49, 'Stibbe', 'Holland/ Netherlands', NULL, 'GAL - Sala 2', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(50, 'Draper & Draper', 'United States', NULL, 'GAL - Sala 8', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(51, 'Posse Herrera Ruiz', 'Colombia', NULL, 'GAL - Sala 3', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(52, 'Jiménez Peña', NULL, NULL, 'CI - Guadalajara', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(53, 'Beretta Godoy', NULL, NULL, 'CI - Lorenzo Servitje', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(54, 'Mc Dermott Will Emery', NULL, NULL, 'GAL - Sala 7B', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(55, 'Squair A.A.R.P.I.', NULL, NULL, 'CI - San Cristobal', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(56, 'Schellenberg Wittmer', 'Switzerland', NULL, 'GAL - Sala 2', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(57, 'Whiters Bergman LLP', NULL, NULL, 'GAL - Sala 8', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(58, 'Arnold & Porter', 'Holland/ Netherlands', NULL, 'CI - Querétaro', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(59, 'SK Signhi', NULL, NULL, 'CI - Cuernavaca', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(60, 'Consortium Legal', 'Costa Rica', NULL, 'CI - Guadalajara', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(61, 'Cariola Diez Perez-Cotapos', 'Chile', NULL, 'GAL - Sala 2', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(62, 'Bomchil', 'Argentina', NULL, 'CI - Lorenzo Servitje', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(63, 'Demarest', NULL, NULL, 'CI - Cuernavaca', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(64, 'US InternationalDevelopment Finance Corporation', NULL, NULL, 'CI - Juan Sánchez Navarro', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(65, 'Gide', NULL, NULL, 'CI - San Cristobal', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(66, 'Wiener Boerse', NULL, NULL, 'GAL - Sala 3', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(67, 'Drew & Napier', NULL, NULL, 'CI - Querétaro', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(68, 'BonelliErede Law Firm', 'Italy', NULL, 'CI - Lorenzo Servitje', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(69, 'Fox Mandal', NULL, NULL, 'GAL - Sala 1', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(70, 'Blank Rome', NULL, NULL, 'GAL - Sala 2', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(71, 'Latham Watkins', NULL, NULL, 'CI - Querétaro', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(72, 'Bofill Mir Abogados', 'Chile', NULL, 'GAL - Sala 3', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(73, 'Sidley', NULL, NULL, 'GAL - Sala 1', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(74, 'Bennett Jones LLP', 'Canada', NULL, 'GAL - Sala 2', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(75, 'Davies Ward Phillips & Vineberg LLP', 'Canada', NULL, 'GAL - Sala 3', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(76, 'Zhong Lun', NULL, NULL, 'CI - Guadalajara', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(77, 'Galicia', NULL, NULL, 'GAL - Sala 3', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(78, 'Galicia', NULL, NULL, 'CI - Querétaro', '2024-09-17', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(79, 'Galicia', NULL, NULL, 'GAL - Sala 7B', '2024-09-20', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(80, 'Freshfields', NULL, NULL, 'GAL - Sala 8', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(81, 'Borden Ladner Gervais LLP', 'Canada', NULL, 'GAL - Sala 2', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(82, 'Rimon Law antes McDermott', 'US', NULL, 'GAL - Sala 3', '2024-09-18', 'One to One Meeting', NULL, '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\"><p>Sobre el despacho:</p><p><br></p><p>250 socios. Son ex-socios de despachos reconocidos que se han ido saliendo por distintos motivos.</p><p><br></p><p>Pool de 30+ asociados.</p><p><br></p><p>Ofrecen que el socio trabaje directamente en el asunto.</p><p><br></p><p>Tarifas menores que las tarifas de los despachos tradicionales, y flexibilidad en la negociación de honorarios.</p><p>Notas de seguimiento:</p><p><br></p><p>Juan Zúñiga le pidió a Maurice tener llamada de follow up para explorar sinergias.</p><p><br></p><p>Rose Mc Laren ya puso en contacto a Ricardo Ampudia con Cecilia Azar y Rodrigo Zamora.</p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', '2024-10-16 21:52:40', '2024-10-25 18:43:25', NULL, NULL, NULL),
(83, 'Gentile Law', NULL, NULL, 'GAL - Sala 7A', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(84, 'Estudio Rodrigo - Rodrigo Elías Medrano Abogados', NULL, NULL, 'GAL - Sala 1', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(85, 'Chiomenti', 'Italy', NULL, 'GAL - Sala 2', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(86, 'De Brauw Blackstone Westbroek', 'Holland/ Netherlands', NULL, 'GAL - Sala 3', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(87, 'BOIES SCHILLER FLEXNER', NULL, NULL, 'CI - Guadalajara', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(88, 'Veló Legal', 'Panama', NULL, 'GAL - Sala 8', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(89, 'Fundación Fernando Pombo', NULL, NULL, 'CI - Querétaro', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(90, 'Sekri Valentin Zerrouk', NULL, NULL, 'CI - Morelia', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(91, 'McCann Fitzgerald', 'Ireland', NULL, 'CI - Lorenzo Servitje', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(92, 'Pérez Bustamante Ponce', NULL, NULL, 'GAL - Sala 2', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(93, 'Martínez Quintero', NULL, NULL, 'GAL - Sala 7A', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(94, 'Lefosse', NULL, NULL, 'GAL - Sala 1', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(95, 'Womble Bond', NULL, NULL, 'CI - San Cristobal', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(96, 'Lexvalor', NULL, NULL, 'GAL - Sala 8', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(97, 'Lloreda Camacho', 'Colombia', NULL, 'GAL - Sala 7B', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(98, 'Maisto e Associati', 'Italy', NULL, 'GAL - Sala 3', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(99, 'Mitrani Caballero', 'Argentina', NULL, 'GAL - Sala 2', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(100, 'Torys LLP', 'Canada', NULL, 'GAL - Sala 8', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(101, 'DS Casahierro Abogados', NULL, NULL, 'GAL - Sala 1', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(102, 'Milbank', NULL, NULL, 'GAL - Sala 7B', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(103, 'Vieira Rezende Advogados', 'Brazil', NULL, 'GAL - Sala 3', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(104, 'Nagashima NO&T', NULL, NULL, 'GAL - Sala 7B', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(105, 'Ferrere', NULL, NULL, 'GAL - Sala 2', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(106, 'SORAINEN', 'Estonia and Lithuania', NULL, 'GAL - Sala 7A', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(107, 'Gleiss Lutz', 'Germany', NULL, 'GAL - Sala 3', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(108, 'BUSTAMANTE FABARA', 'Ecuador', NULL, 'GAL - Sala 8', '2024-09-18', 'One to One Meeting', NULL, '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\"><p>Sobre Bustamante Fabara:</p><p><br></p><p>Fabara y Bustamante se fusionaron hace aproximadamente 3 años; 24 áreas de práctica</p><p><br></p><p>Es una firma full service con oficinas en Quito y Guayaquil</p><p><br></p><p>Acabamos de ver Project Kepler con ellos</p><p><br></p><p>Estructura de sociedad interesante pues nadie tiene equity y es una sociedad perpetua</p><p><br></p><p>Esquema de retención de talento interesante; horas de abogadas en maternidad cuentan como horas facturables</p><p><br></p><p>Jesús Beltrán colidera práctica de Fintech y Diego Ramírez lidera la práctica de Capital Markets</p><p><br></p><p>Notas de Seguimiento:</p><p>María Rosa y Bernardo por ponerse en contacto para hablar de temas de Life Sciences</p><p>Quedamos también de poner en contacto a Juan Felipe con Arturo Perdomo para hablar de temas Fintech. Kushki, primer Fintech en Ecuador, es uno de sus clientes importantes y lo mencionaron como potencial cliente para Galicia.</p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\" style=\"margin-top: -57px;\"><a class=\"ql-preview\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', '2024-10-16 21:52:40', '2024-10-24 16:33:56', NULL, NULL, NULL),
(109, 'Bird & Bird', 'Belgium', NULL, 'GAL - Sala 1', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(110, 'Dechert', 'United States', NULL, 'CI - Morelia', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(111, 'Mori Hamada & Matsumoto', 'Japan', NULL, 'GAL - Sala 1', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(112, 'Debevoise', NULL, NULL, 'CI - Morelia', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(113, 'Jerome Merchant', NULL, NULL, 'GAL - Sala 3', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(114, 'Baker Botts', NULL, NULL, 'GAL - Sala 8', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(115, 'Herbert Smith Freehills', 'United States', NULL, 'CI - San Cristobal', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(116, 'Pillsbury [Energía)', NULL, NULL, 'CI - Lorenzo Servitje', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(117, 'Payet Rey Cauvi Pérez', 'Peru', NULL, 'GAL - Sala 3', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(118, 'Shoo Smiths', NULL, NULL, 'CI - San Cristobal', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(119, 'Snell Willmer', NULL, NULL, 'CI - Guadalajara', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(120, 'Blakes', NULL, NULL, 'GAL - Sala 7B', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(121, 'NOERR', 'Germany', NULL, 'GAL - Sala 1', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(122, 'BMA Advogados', NULL, NULL, 'GAL - Sala 7B', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(123, 'Lennox Litigation', 'Netherlands', NULL, 'GAL - Sala 3', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(124, 'Alfaro Ferrer Ramírez [AFRA)', NULL, NULL, 'CI - Morelia', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(125, 'Raedas', 'United Kingdom', NULL, 'CI - Cuernavaca', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(126, 'Hernández & Cía', NULL, NULL, 'GAL - Sala 8', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(127, 'Guerrero Olivos ', 'Chile', NULL, 'GAL - Sala 1', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(128, 'Macfarlanes LLP', NULL, NULL, 'GAL - Sala 8', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(129, 'HKA', 'Spain', NULL, 'GAL - Sala 3', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(130, 'Morales Besa', NULL, NULL, 'GAL - Sala 8', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(131, 'Marval OFarrell Mairal', NULL, NULL, 'GAL - Sala 1', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(132, 'Nelson Mullins', 'United States', NULL, 'GAL - Sala 2', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(133, 'Hengeler Mueller', 'Germany', NULL, 'CI - Querétaro', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(134, 'Osler Hoskin Harcourt', 'Canadá', NULL, 'CI - Lorenzo Servitje', '2024-09-19', 'One to One Meeting', NULL, '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\"><p>Pointers:</p><p>• Varias oficinas en Canadá</p><p>• 600 abogados, de los cuales 200 socios</p><p>• Leverage muy bajo</p><p>• DD lo tienen en Ottawa con puro asociado no en partnership track</p><p>• Nos van a presentar a Nataly Monroe, cabeza de innovación</p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', '2024-10-16 21:52:40', '2024-10-25 18:45:15', NULL, NULL, NULL),
(135, 'Lacourte Raquin Tatar', NULL, NULL, 'CI - Guadalajara', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(136, 'Cravath', 'United States', NULL, 'GAL - Sala 1', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(137, 'Burges Salmon LLP', 'United Kingdom', NULL, 'GAL - Sala 2', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(138, 'FILS', NULL, NULL, 'CI - Morelia', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(139, 'Maddocks', 'Australia', NULL, 'GAL - Sala 3', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(140, 'Fangda Partners', 'China', NULL, 'GAL - Sala 7B', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(141, 'Cescon Barrieu', 'Brazil', NULL, 'GAL - Sala 2', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(142, 'Mololamken', NULL, NULL, 'CI - Cuernavaca', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(143, 'Salaberren y López Sansón', NULL, NULL, 'CI - San Cristobal', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(144, 'BLOMSTEIN', 'Deutschland', NULL, 'GAL - Sala 2', '2024-09-20', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(145, 'IO Epik', 'Centro América', NULL, 'GAL - Sala 8', '2024-09-20', 'One to One Meeting', NULL, '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\"><p>Firma de firmas en Centro América y el Caribe especializada en introducir innovación tecnológica y en coordinar asuntos con diversos abogados y firmas locales para atender las necesidades de sus clientes.</p><p><br></p><p>La firma está tomando mandatos importantes para start-ups en Honduras y en El Salvador. La firma destacó el trabajo que se ha hecho en El Salvador para atraer inversión y tener exenciones y reducciones de impuestos, así como ser un hub para criptoactivos.</p><p><br></p><p>Sus esfuerzos en tecnología no están simplemente acotados a generar chatbots o digitalización, sino en hacer un análisis y evaluación de qué procesos pueden hacer más eficientes para algunos clientes. Han hecho cosas interesantes tratándose de automatización de procesos para otorgamiento de poderes y constitución de sociedades.</p><p><br></p><p>Mencionaron qué, si bien físicamente se encuentran en Honduras y El Salvador, tienen corresponsales en los demás países de Centroamérica lo que les permite ofrecer servicios en toda la región.</p><p><br></p><p>No hay acciones concretas de seguimiento. Solo visitaron para conocernos y ver si hay oportunidades de colaboración en el futuro.</p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', '2024-10-16 21:52:40', '2024-10-25 18:42:52', NULL, NULL, NULL),
(146, 'Stellex', NULL, NULL, 'GAL - Sala 3', '2024-09-20', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(147, 'Brigard Urrutia', NULL, NULL, 'GAL - Sala 8', '2024-09-20', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(148, 'Torres, Plaz, Araujo', NULL, NULL, 'GAL - Sala 7B', '2024-09-20', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(149, 'Uría Menéndez [Fiscal)', NULL, NULL, 'GAL - Sala 1', '2024-09-20', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(150, 'Khaitan & Co Advocates', NULL, NULL, 'GAL - Sala 2', '2024-09-20', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(151, 'Albagli Zaliasnik AZ', NULL, NULL, 'GAL - Sala 3', '2024-09-20', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(152, 'Singapore International Abitration Centre', NULL, NULL, 'GAL - Sala 3', '2024-09-20', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(153, 'Brigard Urrutia', NULL, NULL, 'GAL - Sala 8', '2024-09-20', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(154, 'Philippi Prietocarrizosa Ferrero DU & Uria', 'Peru', NULL, 'GAL - Sala 7B', '2024-09-18', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(155, 'Nishimura & Asahi', 'Japan', NULL, 'GAL - Sala 2', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(156, 'Davies Ward Phillips & Vineberg LLP', 'Canada', NULL, 'GAL - Sala 3', '2024-09-19', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(157, 'Galicia', NULL, NULL, 'GAL - Sala 7A', '2024-09-20', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(158, 'Galicia', NULL, NULL, 'GAL - Sala 7A', '2024-09-20', NULL, NULL, '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\"><p>Nota</p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', '2024-10-16 21:52:40', '2024-10-16 17:23:57', NULL, NULL, NULL),
(159, 'Ximena Bustamante', NULL, NULL, 'GAL - Sala 2', '2024-09-20', NULL, NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL, NULL, NULL),
(160, 'Prueba', 'Mexico', NULL, 'Galicia', '2024-10-23', 'one', 'energia', '<div class=\"ql-editor ql-blank\" data-gramm=\"false\" contenteditable=\"true\"><p><br></p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', '2024-10-23 16:58:39', '2024-10-23 17:07:43', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_practice_area`
--

CREATE TABLE `event_practice_area` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `practice_area_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `event_practice_area`
--

INSERT INTO `event_practice_area` (`id`, `event_id`, `practice_area_id`, `created_at`, `updated_at`) VALUES
(1, 160, 80, NULL, NULL),
(2, 160, 81, NULL, NULL),
(3, 108, 4, NULL, NULL),
(4, 108, 82, NULL, NULL),
(5, 108, 83, NULL, NULL),
(6, 21, 84, NULL, NULL),
(7, 21, 85, NULL, NULL),
(8, 21, 86, NULL, NULL),
(9, 21, 87, NULL, NULL),
(10, 160, 49, NULL, NULL),
(11, 20, 4, NULL, NULL),
(12, 20, 7, NULL, NULL),
(13, 20, 84, NULL, NULL),
(14, 82, 4, NULL, NULL),
(15, 82, 43, NULL, NULL),
(16, 145, 20, NULL, NULL),
(17, 145, 88, NULL, NULL),
(18, 145, 89, NULL, NULL),
(19, 134, 24, NULL, NULL),
(20, 134, 89, NULL, NULL),
(21, 134, 90, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `law_firms`
--

CREATE TABLE `law_firms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `practice_area` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `law_firms`
--

INSERT INTO `law_firms` (`id`, `name`, `country`, `city`, `region`, `domain`, `tel`, `practice_area`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nicholson y Cano Abogados', 'Argentina', 'Buenos Aires', 'South America', 'nyc.com.ar', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(2, 'Nicholson y Cano Abogados', 'Argentina', 'Buenos Aires', 'South America', 'nyc.com.ar', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(3, 'Nicholson y Cano Abogados', 'Argentina', 'Buenos Aires', 'South America', 'nyc.com.ar', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(4, 'Nicholson y Cano Abogados', 'Argentina', 'Buenos Aires', 'South America', 'nyc.com.ar', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(5, 'Nicholson y Cano Abogados', 'Argentina', 'Buenos Aires', 'South America', 'nyc.com.ar', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(6, 'Maddocks', 'Australia', 'Sydney', 'Asia', 'maddocks.com.au', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(7, 'Machado Meyer Advogados', 'Brazil', 'Sao Paulo', 'South AMerica', 'machadomeyer.com.br', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(8, 'Tozzini Freire Advogados', 'Brazil', 'São Paulo', 'South America', 'tozzinifreire.com.br', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(9, 'Davies Ward Phillips & Vineberg LLP', 'Canada', 'Montreal', 'North America', 'dwpv.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(10, 'Cariola Diez Perez-Cotapos', 'Chile', 'Santiago', 'South America', 'cariola.cl', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(11, 'Fangda Partners', 'China', NULL, 'Asia', 'fangdalaw.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(12, 'Posse Herrera Ruiz', 'Colombia', 'Bogota', 'South America', 'phrlegal.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(13, 'Posse Herrera Ruiz', 'Colombia', 'Bogota', 'South America', 'phrlegal.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(14, 'Posse Herrera Ruiz', 'Colombia', 'Bogota', 'South America', 'phrlegal.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(15, 'Posse Herrera Ruiz', 'Colombia', 'Bogota', 'South America', 'phrlegal.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(16, 'Posse Herrera Ruiz', 'Colombia', 'Bogota', 'South America', 'phrlegal.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(17, 'Posse Herrera Ruiz', 'Colombia', 'Bogota', 'South America', 'phrlegal.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(18, 'Posse Herrera Ruiz', 'Colombia', 'Bogota', 'South America', 'phrlegal.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(19, 'Posse Herrera Ruiz', 'Colombia', 'Bogota', 'South America', 'phrlegal.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(20, 'BLP Legal', 'Costa Rica', '', 'Central America', 'blplegal.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(21, 'Roschier', 'Finland', 'Helsinki', 'Europe', 'roschier.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(22, 'Roschier', 'Finland', 'Helsinki', 'Europe', 'roschier.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(23, 'Roschier', 'Finland', 'Helsinki', 'Europe', 'roschier.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(24, 'BDGS ASSOCIÉS AARPI', 'France', 'Paris', 'Europe', 'bdgs-associes.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(25, 'Bredin Prat', 'France', NULL, 'Europe', 'bredinprat.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(26, 'Bredin Prat', 'France', NULL, 'Europe', 'bredinprat.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(27, 'Bredin Prat', 'France', NULL, 'Europe', 'bredinprat.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(28, 'Bredin Prat', 'France', NULL, 'Europe', 'bredinprat.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(29, 'Darrois Villey Maillot Brochier', 'France', NULL, 'Europe', 'darroisvilley.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(30, 'Darrois Villey Maillot Brochier', 'France', NULL, 'Europe', 'darroisvilley.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(31, 'Darrois Villey Maillot Brochier', 'France', NULL, 'Europe', 'darroisvilley.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(32, 'Darrois Villey Maillot Brochier', 'France', NULL, 'Europe', 'darroisvilley.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(33, 'Darrois Villey Maillot Brochier', 'France', NULL, 'Europe', 'darroisvilley.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(34, 'Darrois Villey Maillot Brochier', 'France', NULL, 'Europe', 'darroisvilley.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(35, 'De Pardieu Brocas Maffei', 'France', NULL, 'Europe', 'de-pardieu.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(36, 'Hengeler Mueller', 'Germany', 'Berlin', 'Europe', 'hengeler.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(37, 'Gleiss Lutz', 'Germany', NULL, 'Europe', 'gleisslutz.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(38, 'De Brauw Blackstone Westbroek', 'Holland/ Netherlands', 'Amsterdam', 'Europe', 'debrauw.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(39, 'De Brauw Blackstone Westbroek', 'Holland/ Netherlands', 'Amsterdam', 'Europe', 'debrauw.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(40, 'De Brauw Blackstone Westbroek', 'Holland/ Netherlands', 'Amsterdam', 'Europe', 'debrauw.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(41, 'De Brauw Blackstone Westbroek', 'Holland/ Netherlands', 'Amsterdam', 'Europe', 'debrauw.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(42, 'De Brauw Blackstone Westbroek', 'Holland/ Netherlands', 'Amsterdam', 'Europe', 'debrauw.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(43, 'De Brauw Blackstone Westbroek', 'Holland/ Netherlands', 'Amsterdam', 'Europe', 'debrauw.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(44, 'De Brauw Blackstone Westbroek', 'Holland/ Netherlands', 'Amsterdam', 'Europe', 'debrauw.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(45, 'De Brauw Blackstone Westbroek', 'Holland/ Netherlands', 'Amsterdam', 'Europe', 'debrauw.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(46, 'De Brauw Blackstone Westbroek', 'Holland/ Netherlands', 'Amsterdam', 'Europe', 'debrauw.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(47, 'Stibbe', 'Holland/ Netherlands', 'Brussels', 'Europe', 'stibbe.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(48, 'Stibbe', 'Holland/ Netherlands', 'Brussels', 'Europe', 'stibbe.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(49, 'Stibbe', 'Holland/ Netherlands', 'Brussels', 'Europe', 'stibbe.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(50, 'Stibbe', 'Holland/ Netherlands', 'Brussels', 'Europe', 'stibbe.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(51, 'Stibbe', 'Holland/ Netherlands', 'Brussels', 'Europe', 'stibbe.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(52, 'McCann Fitzgerald', 'Ireland', 'Dublin', 'Europe', 'mccannfitzgerald.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(53, 'Chiomenti', 'Italy', 'Milano', 'Europe', 'chiomenti.net', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(54, 'BonelliErede Law Firm', 'Italy', NULL, 'Europe', 'belex.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(55, 'Legance Avvocati Associati', 'Italy', NULL, 'Europe', 'legance.it', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(56, 'Mori Hamada & Matsumoto', 'Japan', 'Tokyo', 'Asia', 'mhm-global.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(57, 'Nishimura & Asahi', 'Japan', 'Tokyo', 'Asia', 'nishimura.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(58, 'Nishimura & Asahi', 'Japan', 'Tokyo', 'Asia', 'nishimura.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(59, 'Nishimura & Asahi', 'Japan', 'Tokyo', 'Asia', 'nishimura.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(60, 'AKD', 'Netherlands/Bel//Lux', NULL, 'Europe', 'akd.nl', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(61, 'Payet Rey Cauvi Pérez', 'Peru', 'Lima', 'South America', 'prcp.com.pe', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(62, 'Payet Rey Cauvi Pérez', 'Peru', 'Lima', 'South America', 'prcp.com.pe', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(63, 'Payet Rey Cauvi Pérez', 'Peru', 'Lima', 'South America', 'prcp.com.pe', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(64, 'Payet Rey Cauvi Pérez', 'Peru', 'Lima', 'South America', 'prcp.com.pe', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(65, 'Payet Rey Cauvi Pérez', 'Peru', 'Lima', 'South America', 'prcp.com.pe', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(66, 'Philippi Prietocarrizosa Ferrero DU & Uria', 'Peru', 'Lima', 'South America', 'ppulegal.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(67, 'Philippi Prietocarrizosa Ferrero DU & Uria', 'Peru', 'Lima', 'South America', 'ppulegal.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(68, 'Schellenberg Wittmer', 'Switzerland', 'Geneva', 'Europe', 'swlegal.ch', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(69, 'Slaughter and May', 'United Kingdom', 'London', 'England', 'slaughterandmay.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(70, 'Slaughter and May', 'United Kingdom', 'London', 'England', 'slaughterandmay.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(71, 'Akerman', 'United States', 'Miami', 'North America', 'akerman.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(72, 'Akerman', 'United States', 'Miami', 'North America', 'akerman.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(73, 'Akerman', 'United States', 'Miami', 'North America', 'akerman.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(74, 'Akerman', 'United States', 'Miami', 'North America', 'akerman.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(75, 'Akerman', 'United States', 'Miami', 'North America', 'akerman.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(76, 'Akerman', 'United States', 'Miami', 'North America', 'akerman.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(77, 'Akerman', 'United States', 'Miami', 'North America', 'akerman.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(78, 'Cleary Gottlieb', 'United States', 'New York', 'North America', 'cgsh.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(79, 'Cravath', 'United States', 'New York', 'North America', 'cravath.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(80, 'Cravath', 'United States', 'New York', 'North America', 'cravath.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(81, 'Cravath', 'United States', 'New York', 'North America', 'cravath.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(82, 'Cravath', 'United States', 'New York', 'North America', 'cravath.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(83, 'Cravath', 'United States', 'New York', 'North America', 'cravath.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(84, 'Cravath', 'United States', 'New York', 'North America', 'cravath.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(85, 'Cravath', 'United States', 'New York', 'North America', 'cravath.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(86, 'Cravath', 'United States', 'New York', 'North America', 'cravath.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(87, 'Cravath', 'United States', 'New York', 'North America', 'cravath.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(88, 'Cravath', 'United States', 'New York', 'North America', 'cravath.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(89, 'Dechert', 'United States', NULL, 'North America', 'dechert.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(90, 'Dechert', 'United States', NULL, 'North America', 'dechert.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(91, 'Dechert', 'United States', NULL, 'North America', 'dechert.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(92, 'Dechert', 'United States', NULL, 'North America', 'dechert.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(93, 'Dechert', 'United States', NULL, 'North America', 'dechert.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(94, 'Dechert', 'United States', NULL, 'North America', 'dechert.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(95, 'Dechert', 'United States', NULL, 'North America', 'dechert.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(96, 'Dechert', 'United States', NULL, 'North America', 'dechert.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(97, 'Dechert', 'United States', NULL, 'North America', 'dechert.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(98, 'Dechert', 'United States', NULL, 'North America', 'dechert.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(99, 'Dechert', 'United States', NULL, 'North America', 'dechert.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(100, 'Skadden', 'United States', NULL, 'North America', 'skadden.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(101, 'Skadden', 'United States', NULL, 'North America', 'skadden.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(102, 'Skadden', 'United States', NULL, 'North America', 'skadden.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(103, 'Skadden', 'United States', NULL, 'North America', 'skadden.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(104, 'Skadden', 'United States', NULL, 'North America', 'skadden.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(105, 'Skadden', 'United States', NULL, 'North America', 'skadden.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(106, 'Skadden', 'United States', NULL, 'North America', 'skadden.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(107, 'Skadden', 'United States', NULL, 'North America', 'skadden.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(108, 'Cravath', 'United States', 'New York', 'North America', 'cravath.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(109, 'Borden Ladner Gervais LLP', 'Canada', 'Toronto', NULL, 'blg.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(110, 'Arnold & Porter', 'Holland/ Netherlands', 'Amsterdam', 'Europe', 'arnoldporter.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(111, 'Osborne Clarke', 'United States', 'New York', 'North America', 'osborneclarke.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(112, 'Nicholson y Cano Abogados', 'Argentina', 'Buenos Aires', 'South America', 'nyc.com.ar', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(113, 'Burges Salmon LLP', 'United Kingdom', 'BristolEdinburghLondon', NULL, 'burges-salmon.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(114, 'HKA', 'Spain', 'Madrid', NULL, 'hka.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(115, 'Veló Legal', 'Panama', NULL, 'Central America', 'velo-legal.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(116, 'Veló Legal', 'Panama', NULL, 'Central America', 'velo-legal.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(117, 'Nelson Mullins', 'United States', 'New York', 'North America', 'nelsonmullins.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(118, 'WilmerHale', 'United Kingdom', 'London', 'Europe', 'wilmerhale.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(119, 'Bomchil', 'Argentina', 'Buenos Aires', 'South America', 'bomchil.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(120, 'NOERR', 'Germany', NULL, 'Europe', 'noerr.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(121, 'BLOMSTEIN', 'Deutschland', 'Berlin', NULL, 'blomstein.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(122, 'Stibbe', 'Holland/ Netherlands', 'Brussels', 'Europe', 'stibbe.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(123, 'BPV ABOGADOS', 'España', 'Barcelona', NULL, 'bpvabogados.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(124, 'Oppenhoff', 'Germany', 'Cologne', NULL, 'oppenhoff.eu', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(125, 'Dechert', 'United States', NULL, 'North America', 'dechert.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(126, 'BUSTAMANTE FABARA', 'Ecuador', 'Quito', NULL, 'bustamantefabara.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(127, 'BINDER GRÖSSWANG', 'Austria', 'Vienna', 'Europe', 'bindergroesswang.at', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(128, 'Guerrero Olivos ', 'Chile', 'Santiago', NULL, 'guerrero.cl', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(129, 'Draper & Draper', 'United States', NULL, 'North America', 'draperllc.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(130, 'Lennox Litigation', 'Netherlands', 'Amsterdam', NULL, 'lennox.nl', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(131, 'Torys LLP', 'Canada', 'Toronto', NULL, 'torys.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(132, 'Bennett Jones LLP', 'Canada', 'Toronto', NULL, 'bennettjones.com', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(133, 'O Farrell ', 'Argentina', 'Buenos Aires', NULL, 'eof.com.ar', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(134, 'Arteaga Gorziglia', 'Chile', 'Santiago', NULL, 'agycia.cl', NULL, NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40', NULL),
(135, 'SORAINEN', 'Estonia and Lithuania', 'Tallinn', NULL, 'sorainen.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(136, 'Chaffetz Lindsey', 'United States', 'New York', NULL, 'chaffetzlindsey.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(137, 'Vieira Rezende Advogados', 'Brazil', 'Sao PauloSP', NULL, 'vieirarezende.com.br', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(138, 'Veirano Advogados', 'Brazil', 'São Paulo', 'South America', 'veirano.com.br', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(139, 'Cescon Barrieu', 'Brazil', 'São Paulo', 'South America', 'cesconbarrieu.com.br', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(140, 'Consortium Legal', 'Costa Rica', 'San José', 'Central America', 'consortiumlegal.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(141, 'Houthoff', 'Netherlands', NULL, 'Europe', 'houthoff.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(142, 'Slaughter and May', 'United Kingdom', 'London', 'England', 'slaughterandmay.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(143, 'Arias', 'Costa Rica', NULL, 'Central America', 'ariaslaw.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(144, 'Maisto e Associati', 'Italy', 'Milan', 'Europe', 'maisto.it', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(145, 'Bofill Mir Abogados', 'Chile', 'Santiago', 'South America', 'bofillmir.cl', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(146, 'Bird & Bird', 'Belgium', 'Brussels', 'Europe', 'twobirds.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(147, 'Stibbe', 'Holland/ Netherlands', 'Brussels', 'Europe', 'stibbe.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(148, 'Stibbe', 'Holland/ Netherlands', 'Brussels', 'Europe', 'stibbe.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(149, 'Roschier', 'Finland', 'Helsinki', 'Europe', 'roschier.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(150, 'Nelson Mullins', 'United States', 'New York', 'North America', 'NELSONMULLINS.COM', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(151, 'Nelson Mullins', 'United States', 'New York', 'North America', 'NELSONMULLINS.COM', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(152, 'Nelson Mullins', 'United States', 'New York', 'North America', 'NELSONMULLINS.COM', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(153, 'Bredin Prat', 'France', NULL, 'Europe', 'bredinprat.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(154, 'Bredin Prat', 'France', NULL, 'Europe', 'bredinprat.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(155, 'Bredin Prat', 'France', NULL, 'Europe', 'bredinprat.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(156, 'Bredin Prat', 'France', NULL, 'Europe', 'bredinprat.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(157, 'Bredin Prat', 'France', NULL, 'Europe', 'bredinprat.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(158, 'Osborne Clarke', 'United States', 'New York', 'North America', 'osborneclarke.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(159, 'Advant Beiten', 'Germany', NULL, 'Europe', 'advant-beiten.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(160, 'Advant Beiten', 'Germany', NULL, 'Europe', 'advant-beiten.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(161, 'Advant Beiten', 'Germany', NULL, 'Europe', 'advant-beiten.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(162, 'Osborne Clarke', 'United States', 'New York', 'North America', 'osborneclarke.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(163, 'Veló Legal', 'Panama', NULL, 'Central America', 'velo-legal.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(164, 'Pinsent Masons', 'England', NULL, 'Europe', 'pinsentmasons.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(165, 'Mitrani Caballero', 'Argentina', 'Buenos Aires', 'South America', 'mcolex.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(166, 'Pillsbury', 'United States', NULL, 'North America', 'pillsburylaw.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(167, 'Lloreda Camacho', 'Colombia', 'Bogotá', 'South America', 'lloredacamacho.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(168, 'Lloreda Camacho', 'Colombia', 'Bogotá', 'South America', 'lloredacamacho.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(169, 'Lloreda Camacho', 'Colombia', 'Bogotá', 'South America', 'lloredacamacho.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(170, 'Wandia Ghandy Co.', '', '', NULL, 'wadiaghandy.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(171, 'Raedas', 'United Kingdom', 'London', NULL, 'raedas.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(172, 'APOYO Consultoría ', 'Peru', 'Lima', NULL, 'apoyoconsultoria.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(173, 'Herbert Smith Freehills', 'United States', 'New York', NULL, 'hsf.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(174, 'Brochure Funes de Rioja', NULL, NULL, NULL, 'bruchoufunes.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(175, 'Rebaza Alcázar De Las Casas Abogados', NULL, NULL, NULL, 'rebaza-alcazar.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(176, 'Camhi Campos', NULL, NULL, NULL, 'cam-law.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(177, 'Corrs Chambers Westgarth', NULL, NULL, NULL, 'corrs.com.au', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(178, 'Cases & Lacambra', NULL, NULL, NULL, 'caseslacambra.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(179, 'Hughes Hubbard', NULL, NULL, NULL, 'hugheshubbard.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(180, 'Icaza Gonzáles Ruíz & Alemán', NULL, NULL, NULL, 'icazalaw.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(181, 'Ropes Gray', NULL, NULL, NULL, 'ropesgray.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(182, 'Stikeman', NULL, NULL, NULL, 'stikeman.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(183, 'Pinheiro Neto', NULL, NULL, NULL, 'pn.com.br', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(184, 'Fordham University', 'United States', 'New York', NULL, 'fordham.edu', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(185, 'Fordham University', 'United States', 'New York', NULL, 'fordham.edu', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(186, 'AO Shearman', NULL, NULL, NULL, 'aoshearman.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(187, 'Carey', NULL, NULL, NULL, 'carey.cl', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(188, 'Allende y Brea', NULL, NULL, NULL, 'allende.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(189, 'Jiménez Peña', NULL, NULL, NULL, 'jpadvisors.do', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(190, 'Beretta Godoy', NULL, NULL, NULL, 'berettagodoy.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(191, 'Mc Dermott Will Emery', NULL, NULL, NULL, 'mwe.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(192, 'Squair A.A.R.P.I.', NULL, NULL, NULL, 'squairlaw.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(193, 'Whiters Bergman LLP', NULL, NULL, NULL, 'withersworldwide.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(194, 'SK Signhi', NULL, NULL, NULL, 'skspartners.law', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(195, 'Demarest', NULL, NULL, NULL, 'demarest.com.br', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(196, 'US InternationalDevelopment Finance Corporation', NULL, NULL, NULL, 'dfc.gov', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(197, 'Gide', NULL, NULL, NULL, 'gide.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(198, 'Wiener Boerse', NULL, NULL, NULL, 'wienerboerse.at', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(199, 'Drew & Napier', NULL, NULL, NULL, 'drewnapier.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(200, 'Fox Mandal', NULL, NULL, NULL, 'foxmandal.in', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(201, 'Blank Rome', NULL, NULL, NULL, 'blankrome.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(202, 'Latham Watkins', NULL, NULL, NULL, 'lw.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(203, 'Sidley', NULL, NULL, NULL, 'sidley.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(204, 'Zhong Lun', NULL, NULL, NULL, 'zhonglun.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(205, 'Galicia', NULL, NULL, NULL, 'galicia.com.mx', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(206, 'Galicia', NULL, NULL, NULL, 'www.galicia.com.mx', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(207, 'Freshfields', NULL, NULL, NULL, 'freshfields.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(208, 'Rimon Law antes McDermott', NULL, NULL, NULL, 'rimonlaw.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(209, 'Gentile Law', NULL, NULL, NULL, 'gentile.law', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(210, 'Estudio Rodrigo - Rodrigo Elías Medrano Abogados', NULL, NULL, NULL, 'estudiorodrigo.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(211, 'BOIES SCHILLER FLEXNER', NULL, NULL, NULL, 'bsfllp.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(212, 'Fundación Fernando Pombo', NULL, NULL, NULL, 'fundacionpombo.org', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(213, 'Sekri Valentin Zerrouk', NULL, NULL, NULL, 'svz.fr', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(214, 'Pérez Bustamante Ponce', NULL, NULL, NULL, 'pbplaw.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(215, 'Martínez Quintero', NULL, NULL, NULL, 'mqmgld.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(216, 'Lefosse', NULL, NULL, NULL, 'lefosse.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(217, 'Womble Bond', NULL, NULL, NULL, 'wbd-us.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(218, 'Lexvalor', NULL, NULL, NULL, 'lexvalor.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(219, 'DS Casahierro Abogados', NULL, NULL, NULL, 'dscasahierro.pe', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(220, 'Milbank', NULL, NULL, NULL, 'milbank.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(221, 'Nagashima NO&T', NULL, NULL, NULL, 'noandt.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(222, 'Ferrere', NULL, NULL, NULL, 'ferrere.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(223, 'Debevoise', NULL, NULL, NULL, 'debevoise.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(224, 'Jerome Merchant', NULL, NULL, NULL, 'jmp.law', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(225, 'Baker Botts', NULL, NULL, NULL, 'bakerbotts.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(226, 'Pillsbury (Energía)', NULL, NULL, NULL, 'www.pillsburylaw.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(227, 'Shoo Smiths', NULL, NULL, NULL, 'shoosmiths.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(228, 'Snell Willmer', NULL, NULL, NULL, 'swlaw.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(229, 'Blakes', NULL, NULL, NULL, 'blakes.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(230, 'BMA Advogados', NULL, NULL, NULL, 'bmalaw.com.br', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(231, 'Alfaro Ferrer Ramírez (AFRA)', NULL, NULL, NULL, 'afra.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(232, 'Hernández & Cía', NULL, NULL, NULL, 'ehernandez.com.pe', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(233, 'Macfarlanes LLP', NULL, NULL, NULL, 'macfarlanes.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(234, 'Morales Besa', NULL, NULL, NULL, 'moralesybesa.cl', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(235, 'Marval OFarrell Mairal', NULL, NULL, NULL, 'marval.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(236, 'Osler Hoskin Harcourt', NULL, NULL, NULL, 'osler.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(237, 'Lacourte Raquin Tatar', NULL, NULL, NULL, 'lacourte.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(238, 'FILS', NULL, NULL, NULL, 'filslegal.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(239, 'Mololamken', NULL, NULL, NULL, 'mololamken.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(240, 'Salaberren y López Sansón', NULL, NULL, NULL, 'syls.com.ar', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(241, 'IO Epik', NULL, NULL, NULL, 'ioepik.legal', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(242, 'Stellex', NULL, NULL, NULL, 'stellexlaw.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(243, 'Brigard Urrutia', NULL, NULL, NULL, 'bu.com.co', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(244, 'Torres, Plaz, Araujo', NULL, NULL, NULL, 'tpa.com.ve', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(245, 'Uría Menéndez (Fiscal)', NULL, NULL, NULL, 'uria.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(246, 'Khaitan & Co Advocates', NULL, NULL, NULL, 'khaitanco.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(247, 'Albagli Zaliasnik AZ', NULL, NULL, NULL, 'az.cl', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(248, 'Singapore International Abitration Centre', NULL, NULL, NULL, 'siac.org.sg', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(249, 'Brigard Urrutia', NULL, NULL, NULL, 'bu.com.co', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(250, 'Davies Ward Phillips & Vineberg LLP', 'Canada', 'Montreal', 'North America', 'www.dwpv.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(251, 'Galicia', NULL, NULL, NULL, 'galicia.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(252, 'Galicia', NULL, NULL, NULL, 'galicia.mx', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(253, 'Galicia', NULL, NULL, NULL, 'rzamora@galicia.com', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL),
(254, 'Ximena Bustamante', NULL, NULL, NULL, 'xbustamante@pactum.com.ec', NULL, NULL, '2024-10-16 21:52:41', '2024-10-16 21:52:41', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_10_11_205254_create_law_firms_table', 1),
(7, '2024_10_14_163328_create_contacts_table', 1),
(8, '2024_10_15_003540_create_events_table', 1),
(9, '2024_10_15_143221_create_delegates_table', 1),
(10, '2024_10_15_144232_create_assistants_table', 1),
(11, '2024_10_15_163610_create_delegate_event_table', 1),
(12, '2024_10_15_164901_create_assistant_event_table', 1),
(13, '2024_10_18_163621_create_practice_areas_table', 2),
(14, '2024_10_18_165252_alter_events_table', 3),
(15, '2024_10_18_171738_create_event_practice_area_table', 4),
(16, '2024_10_25_164539_alter_events_tables_add_lawfirm_column', 5),
(17, '2024_10_25_173032_create_countries_table', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practice_areas`
--

CREATE TABLE `practice_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `practice_areas`
--

INSERT INTO `practice_areas` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'All', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(2, 'Arbitrajes antitrust corporativo', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(3, 'Austrian and EU merger control Austrian and EU antitrust law compliance and investigations and eDiscovery audits', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(4, 'Banking  Finance  Corporate Mergers  Acquisitions  Capital Markets', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(5, 'BD', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(6, 'BD coordinators', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(7, 'Business and Corporate Litigation and Arbitration Insurance Migration and Naturalization Asset Protection Structures.', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(8, 'Business Development', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(9, 'Co-head of the Corporate Practice group banking and capital markets agribusiness sustainable investment ESG', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(10, 'Compliance', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(11, 'Compliance, Investigaciones y Derecho Penal Empresario', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(12, 'Consulting', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(13, 'Corp', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(14, 'Corporate', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(15, 'Corporate  Finance', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(16, 'Corporate  MA', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(17, 'Corporate  MA  Oil  Gas  Mining  Insurance', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(18, 'Corporate  MA Real Estate', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(19, 'Corporate Advisory', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(20, 'Corporate Advisory MA and Private Equity Private Client Startups Technology Media  Telecommunications', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(21, 'Corporate and International Arbitration', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(22, 'Corporate Commercial', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(23, 'Corporate Law', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(24, 'Corporate Litigation', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(25, 'Corporate MA', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(26, 'Corporate MA Banking  Finance Projects', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(27, 'Corporate MA cross border transactions investment dispute resolution', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(28, 'Corporate MA Venture Capital Private Equity and Disputes', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(29, 'Corporate real Estate', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(30, 'CorporateMA - Hospitality', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(31, 'CorporateMA Banking', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(32, 'CorporateMA Venture Capital and Startups', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(33, 'CorporateTaxPrivate Client', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(34, 'Corporativo MA', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(35, 'Corporativo MA Financiamientos Desarrollo de Proyectos Infraestructura', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(36, 'CorrporateFinanceTax', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(37, 'Crosborder MA Transactions', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(38, 'Dispute Resolution', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(39, 'Energy  Infrastructure', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(40, 'Energy Transactions', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(41, 'Events', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(42, 'Finance and capital marketsMA', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(43, 'Foreign Investment  Exchange Control General Corporate Litigation  Dispute Resolution Real Estate', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(44, 'Forensic Accounting and Commercial Damages', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(45, 'Full Service', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(46, 'Full-service International Firm', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(47, 'Fusiones y Adquisiciones Derecho Bancario y Financiero Empresas Familiares y Clientes Privados Cumplimiento Normativo y Gestión de Crisis', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(48, 'Global Experts  Markets', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(49, 'Impuestos', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(50, 'Intellectual Property Rights', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(51, 'International Arbitration', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(52, 'International Arbitration transboundary water disputes', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(53, 'International litigation and arbitration Banking Litigaion Corporate Transactional and Reinsurance', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(54, 'International Relations', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(55, 'Investigations', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(56, 'Investment funds', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(57, 'IP CorporateMA Litigation', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(58, 'Litigation', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(59, 'Litigation  Dispute Resolution', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(60, 'MA', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(61, 'MA  CORPORATE', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(62, 'MA  Corporate Dispute Resolution', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(63, 'MA - Corporate Finance', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(64, 'MA and private equity', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(65, 'MA Taxation Real Estate and Infrastructure', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(66, 'Marketing and BD', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(67, 'MATMT', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(68, 'Merger  Antirust  Competition', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(69, 'Mergers  Adquisitions', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(70, 'Minería', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(71, 'NA', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(72, 'None', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(73, 'Private EquityCorporate  Securities', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(74, 'Projects  Infrastructure  Corporate MA', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(75, 'public procurement law and foreign trade law', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(76, 'SOSTENIBILIDAD Y PRO BONO', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(77, 'Structuring Finance  Project Development', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(78, 'Tax', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(79, 'Trial', '2024-10-23 04:53:29', '2024-10-23 04:53:29', NULL),
(80, 'Private M&A', '2024-10-23 17:03:15', '2024-10-23 17:03:15', NULL),
(81, 'Public M&A', '2024-10-23 17:03:15', '2024-10-23 17:03:15', NULL),
(82, 'Life Sciences', '2024-10-23 17:07:35', '2024-10-23 17:07:35', NULL),
(83, 'Fintech', '2024-10-23 17:07:35', '2024-10-23 17:07:35', NULL),
(84, 'M&A', '2024-10-24 16:49:22', '2024-10-24 16:49:22', NULL),
(85, 'Private Equity', '2024-10-24 16:49:22', '2024-10-24 16:49:22', NULL),
(86, 'Fiscal', '2024-10-24 16:49:22', '2024-10-24 16:49:22', NULL),
(87, 'Wealth Management', '2024-10-24 16:49:22', '2024-10-24 16:49:22', NULL),
(88, 'Antitrust', '2024-10-25 18:42:23', '2024-10-25 18:42:23', NULL),
(89, 'Corporate', '2024-10-25 18:42:23', '2024-10-25 18:42:23', NULL),
(90, 'Competition', '2024-10-25 18:45:15', '2024-10-25 18:45:15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Galicia', 'galicia', NULL, '$2y$10$XCVjCM0EY7sgygmTM3Fho.Ft0Pt8PHgVhtdrKyGNNnaoP60Agipxy', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40'),
(2, 'Marco Antonio Arcos Mtz', 'marco@sodio.net', NULL, '$2y$10$XCVjCM0EY7sgygmTM3Fho.Ft0Pt8PHgVhtdrKyGNNnaoP60Agipxy', NULL, '2024-10-16 21:52:40', '2024-10-16 21:52:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `assistants`
--
ALTER TABLE `assistants`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `assistant_event`
--
ALTER TABLE `assistant_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assistant_event_assistant_id_foreign` (`assistant_id`),
  ADD KEY `assistant_event_event_id_foreign` (`event_id`);

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `delegates`
--
ALTER TABLE `delegates`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `delegate_event`
--
ALTER TABLE `delegate_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delegate_event_delegate_id_foreign` (`delegate_id`),
  ADD KEY `delegate_event_event_id_foreign` (`event_id`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_practice_area_id_foreign` (`practice_area_id`),
  ADD KEY `events_law_firm_id_foreign` (`law_firm_id`);

--
-- Indices de la tabla `event_practice_area`
--
ALTER TABLE `event_practice_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_practice_area_event_id_foreign` (`event_id`),
  ADD KEY `event_practice_area_practice_area_id_foreign` (`practice_area_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `law_firms`
--
ALTER TABLE `law_firms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `practice_areas`
--
ALTER TABLE `practice_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `assistants`
--
ALTER TABLE `assistants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `assistant_event`
--
ALTER TABLE `assistant_event`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `delegates`
--
ALTER TABLE `delegates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=386;

--
-- AUTO_INCREMENT de la tabla `delegate_event`
--
ALTER TABLE `delegate_event`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=711;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT de la tabla `event_practice_area`
--
ALTER TABLE `event_practice_area`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `law_firms`
--
ALTER TABLE `law_firms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `practice_areas`
--
ALTER TABLE `practice_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `assistant_event`
--
ALTER TABLE `assistant_event`
  ADD CONSTRAINT `assistant_event_assistant_id_foreign` FOREIGN KEY (`assistant_id`) REFERENCES `assistants` (`id`),
  ADD CONSTRAINT `assistant_event_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Filtros para la tabla `delegate_event`
--
ALTER TABLE `delegate_event`
  ADD CONSTRAINT `delegate_event_delegate_id_foreign` FOREIGN KEY (`delegate_id`) REFERENCES `delegates` (`id`),
  ADD CONSTRAINT `delegate_event_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Filtros para la tabla `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_law_firm_id_foreign` FOREIGN KEY (`law_firm_id`) REFERENCES `law_firms` (`id`),
  ADD CONSTRAINT `events_practice_area_id_foreign` FOREIGN KEY (`practice_area_id`) REFERENCES `practice_areas` (`id`);

--
-- Filtros para la tabla `event_practice_area`
--
ALTER TABLE `event_practice_area`
  ADD CONSTRAINT `event_practice_area_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `event_practice_area_practice_area_id_foreign` FOREIGN KEY (`practice_area_id`) REFERENCES `practice_areas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
