
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "-03:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejercicio_web`
--
DROP DATABASE IF EXISTS `ejercicio_web`;
CREATE DATABASE IF NOT EXISTS `ejercicio_web` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ejercicio_web`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `sp_listar_pedidos_por_vendedor`$$
CREATE PROCEDURE `sp_listar_pedidos_por_vendedor` 
(
  IN `id` INT
)  
BEGIN 
SELECT * FROM pedido WHERE id_vendedor = id;
END$$
DELIMITER ;

-- --------------------------------------------------------
-- Tablas
--
-- Estructura de tabla para la tabla `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `id_pedido` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `cliente` varchar(150) NOT NULL,
  `fecha` date NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `monto_total`  int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `pedido` (`cliente`, `fecha`, `id_vendedor`) VALUES
('Juan Perez', '20210420', 1),
('Maria Rodriguez', '20210421', 2),
('Andrea Lopez', '20210421', 2),
('Roberto Cazenawe', '20210422', 3),
('Carla Piriz', '20210430', 1);

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `detalle_pedido`
--
DROP TABLE IF EXISTS `detalle_pedido`;
CREATE TABLE `detalle_pedido` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL,
  `producto` varchar(150) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id_pedido`, `producto`, `cantidad`, `precio_unitario`) VALUES
(1, 'DTK F3YGT Batería para DELL Latitude 12', 10, 250),
(1, 'Stream Deck MK.2 - Interfaz táctil de Control, 15 Teclas LCD', 5, 150),
(1, 'HP Pavilion 14-dv0021ns - Ordenador portátil 14" FullHD', 8, 2550),
(2, 'LA-0N-3K-SH-V0.9 Sistema de Alimentación Ininterrumpida', 10, 1250),
(2, 'Lenovo Maletín de carga superior', 10, 550),
(2, 'Soporte Portatil Adjustable Laptop Stand', 10, 350),
(3, 'MSI AIO PRO 16T 10M-001XEU. 15.6"', 10, 2250),
(4, 'EasyULT Ratón Inalámbrico 2.4G Recargable', 10, 450),
(5, 'PONVIT Ratón Inalámbrico Mini,2400DPI', 10, 650);

