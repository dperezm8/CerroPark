-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 07:53 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cerro_park`
--

-- --------------------------------------------------------

--
-- Table structure for table `coches`
--

CREATE TABLE `coches` (
  `idCoches` int(11) NOT NULL,
  `paisDeMatricula` varchar(4) DEFAULT 'E',
  `matricula` varchar(12) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `color` varchar(50) NOT NULL,
  `validoHasta` date NOT NULL,
  `cocheTemporal` tinyint(1) NOT NULL,
  `fechaAlta` date NOT NULL,
  `deBaja` tinyint(1) NOT NULL,
  `fechaBaja` date NOT NULL,
  `idUsuarioCoche` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `permiso` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `permiso`) VALUES
(2, 'diego.perez@gmail.com', '$2y$10$KDTBVHt.RA4/r7zfZlJq0OTU4u./1qWyDoJHxMQvNp6rXzi8EPLMy', 'Diego Alberto', 'Pérez Meza', 2),
(3, 'diego.perez01112@gmail.com', '$2y$10$Jtqr7zgAYWhpVNv4.PcD.eJ29JYxE4IAf/LadQpUZMh8gjRB/3WNi', 'Diego Alberto', 'Pérez Meza', 2),
(4, 'diegoperez01112@gmail.com', '$2y$10$ROfRLZaT4qMbqEeUMPVSTODb.OfOXaUkWNvW2pSyMMbLybVnMAzUO', 'Diego Alberto', 'Pérez Meza', 1),
(5, 'maria_mezam@hotmail.com', '$2y$10$2AhkauCh8n3BDORqQn7OVOU5zn8g/Gizuq5qXJUkx2Ig9TDEq297a', 'MARIA JOSEFINA', 'MORALES', 3),
(6, 'gabriel.perez07084@gmail.com', '$2y$10$cwcevZ8KkVQxCKmlKEQiKu6N93LvZt4A/miaPO9l.eU6uZEQAwEc6', 'Gabriel Alberto', 'Pérez Meza', 1),
(7, 'gabriel.perez07@gmail.com', '$2y$10$ry45PRpOFCMjkVYMeDHXau6jF7EVyIk.HcCNdraHZSujiFcvoD28O', 'Gabriel Alberto', 'Pérez Meza', 1),
(8, 'adrianamcb@gmail.com', '$2y$10$dDYcc.lXDdIS3L.CCdujmOyOmMJzURN0DT9W9LlrGjC9Xqfpvyl5O', 'Adriana (koala)', 'Martinez', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coches`
--
ALTER TABLE `coches`
  ADD PRIMARY KEY (`idCoches`),
  ADD KEY `idUsuarioCoche` (`idUsuarioCoche`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coches`
--
ALTER TABLE `coches`
  MODIFY `idCoches` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coches`
--
ALTER TABLE `coches`
  ADD CONSTRAINT `coches_ibfk_1` FOREIGN KEY (`idUsuarioCoche`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
