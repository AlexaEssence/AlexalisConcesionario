-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 07:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beenati`
--

-- --------------------------------------------------------

--
-- Table structure for table `icar_gente`
--

CREATE TABLE `icar_gente` (
  `cedula` int(8) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `rol` enum('C','M') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `icar_gente`
--

INSERT INTO `icar_gente` (`cedula`, `nombre`, `correo`, `rol`) VALUES
(9330392, 'Marvella Duque', 'duquemv@hotmail.com', 'M'),
(30010114, 'José Martínez', 'jjmd@gmail.com', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `icar_registros`
--

CREATE TABLE `icar_registros` (
  `id` int(11) NOT NULL,
  `vehiculo` varchar(6) NOT NULL,
  `mecanico` varchar(60) NOT NULL,
  `repuestos` varchar(255) NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `icar_registros`
--

INSERT INTO `icar_registros` (`id`, `vehiculo`, `mecanico`, `repuestos`, `estado`) VALUES
(1, 'ASD123', '9330392', 'Tornillos y ruedas', 'Cambiado');

-- --------------------------------------------------------

--
-- Table structure for table `icar_vehiculos`
--

CREATE TABLE `icar_vehiculos` (
  `matricula` varchar(6) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `clasificacion` varchar(255) NOT NULL,
  `cedula_cliente` int(8) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `icar_vehiculos`
--

INSERT INTO `icar_vehiculos` (`matricula`, `descripcion`, `marca`, `modelo`, `tipo`, `year`, `clasificacion`, `cedula_cliente`, `imagen`) VALUES
('ASD123', 'Carro negro.', 'Toyota', 'ToyoAce', 'Dos volúmenes', 2003, 'Abierto', 30010114, 'assets/php/imagenes/800px-2018_Aixam_Crossline_Premium_GT_CVT_600cc_Front.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `icar_gente`
--
ALTER TABLE `icar_gente`
  ADD PRIMARY KEY (`cedula`);

--
-- Indexes for table `icar_registros`
--
ALTER TABLE `icar_registros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icar_vehiculos`
--
ALTER TABLE `icar_vehiculos`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `cedula_cliente` (`cedula_cliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `icar_registros`
--
ALTER TABLE `icar_registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `icar_vehiculos`
--
ALTER TABLE `icar_vehiculos`
  ADD CONSTRAINT `icar_vehiculos_ibfk_1` FOREIGN KEY (`cedula_cliente`) REFERENCES `icar_gente` (`cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
