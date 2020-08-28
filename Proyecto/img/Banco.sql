-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 16, 2020 at 04:00 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banco`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cuenta`
--

CREATE TABLE `Cuenta` (
  `NumeroCuenta` int(11) NOT NULL,
  `IDUsuario` int(11) NOT NULL,
  `CLABE` varchar(8) COLLATE utf8_bin NOT NULL,
  `Saldo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Cuenta`
--

INSERT INTO `Cuenta` (`NumeroCuenta`, `IDUsuario`, `CLABE`, `Saldo`) VALUES
(1, 1, '76900009', 0),
(2, 1, '77100016', 1067840),
(3, 1, '79500012', 9337),
(4, 1, '98300012', 0),
(5, 1, '57800018', 271828),
(6, 1, '26600014', 101066),
(7, 1, '76700010', 100),
(8, 5, '32100051', 1000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `CuentasLigadasUsuario`
-- (See below for the actual view)
--
CREATE TABLE `CuentasLigadasUsuario` (
`NumeroCuenta` int(11)
,`IDUsuario` int(11)
,`Saldo` float
,`CLABE` varchar(8)
,`Nombre` varchar(20)
,`Apellido` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `Movimiento`
--

CREATE TABLE `Movimiento` (
  `IDMovimiento` int(11) NOT NULL,
  `NumeroCuenta` int(11) NOT NULL,
  `Tipo` varchar(40) COLLATE utf8_bin NOT NULL,
  `Monto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Movimiento`
--

INSERT INTO `Movimiento` (`IDMovimiento`, `NumeroCuenta`, `Tipo`, `Monto`) VALUES
(1, 3, 'Deposito', 10000),
(2, 5, 'Deposito', 1341230),
(3, 5, 'Deposito', 20),
(4, 7, 'Deposito', 100),
(5, 6, 'Deposito', 102020),
(6, 6, 'Retiro', 54),
(7, 5, 'Transferencia Enviada', 200),
(8, 6, 'Transferencia Enviada', 400),
(9, 8, 'Deposito', 1000),
(10, 6, 'Transferencia Enviada', 500),
(11, 5, 'Transferencia Enviada', 500),
(12, 5, 'Transferencia Enviada', 500),
(13, 5, 'Transferencia Enviada', 500),
(14, 5, 'Transferencia Enviada', 500),
(15, 2, 'Transferencia Recibida', 500),
(16, 5, 'Transferencia Enviada', 1030500),
(17, 2, 'Transferencia Recibida', 1030500),
(18, 5, 'Retiro', 2399),
(19, 5, 'Transferencia Enviada', 33323),
(20, 2, 'Transferencia Recibida', 33323),
(21, 3, 'Transferencia Enviada', 322),
(22, 2, 'Transferencia Recibida', 322),
(23, 3, 'Retiro', 333),
(24, 3, 'Retiro', 3333),
(25, 3, 'Deposito', 3425);

-- --------------------------------------------------------

--
-- Stand-in structure for view `MovimientosLigadosUsuario`
-- (See below for the actual view)
--
CREATE TABLE `MovimientosLigadosUsuario` (
`NumeroCuenta` int(11)
,`Tipo` varchar(40)
,`Monto` float
);

-- --------------------------------------------------------

--
-- Table structure for table `TarjetaCredito`
--

CREATE TABLE `TarjetaCredito` (
  `IDTarjetaCredito` int(11) NOT NULL,
  `NumeroCuenta` int(11) NOT NULL,
  `DomicilioFacturacion` varchar(50) COLLATE utf8_bin NOT NULL,
  `NumeroTarjeta` int(16) NOT NULL,
  `NIP` int(4) NOT NULL,
  `FechaVencimiento` date NOT NULL,
  `CodigoSeguridad` int(3) NOT NULL,
  `Comision` float NOT NULL,
  `FechaCorte` int(4) NOT NULL,
  `TasaInteres` float NOT NULL,
  `MontoLineaCredito` float NOT NULL,
  `Bloqueado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `TarjetaDebito`
--

CREATE TABLE `TarjetaDebito` (
  `IDTarjetaDebito` int(11) NOT NULL,
  `NumeroCuenta` int(11) NOT NULL,
  `DomicilioFacturacion` varchar(50) COLLATE utf8_bin NOT NULL,
  `NumeroTarjeta` int(16) NOT NULL,
  `NIP` int(4) NOT NULL,
  `FechaVencimiento` date NOT NULL,
  `CodigoSeguridad` int(3) NOT NULL,
  `Comision` float NOT NULL,
  `Bloqueado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Usuario`
--

CREATE TABLE `Usuario` (
  `IDUsuario` int(11) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_bin NOT NULL,
  `Apellido` varchar(20) COLLATE utf8_bin NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Sexo` varchar(20) COLLATE utf8_bin NOT NULL,
  `Telefono` varchar(20) COLLATE utf8_bin NOT NULL,
  `Email` varchar(30) COLLATE utf8_bin NOT NULL,
  `Contrasena` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Usuario`
--

INSERT INTO `Usuario` (`IDUsuario`, `Nombre`, `Apellido`, `FechaNacimiento`, `Sexo`, `Telefono`, `Email`, `Contrasena`) VALUES
(1, 'Jose Manuel', 'Gil Ortega', '2018-02-14', 'Hombre', '9812830421', 'josgiort@hotmail.com', 'pepe10'),
(2, 'pepe', 'gil', '1998-09-09', 'hombre', '9812839431', 'pepe10@hotmail.com', 'coco'),
(3, 'dani', 'ortega', '1528-03-24', 'hombre', '9890053941', 'pepe156@hotmail.com', 'coco445'),
(4, 'Luis Alberto', 'Gil Ortega', '2004-08-14', 'Hombre', '9811314567', 'wicho@hotmail.com', 'ego123'),
(5, 'luisa', 'cruz', '2020-06-17', 'Mujer', '9816473291', 'luisa@g.com', 'pepe10');

-- --------------------------------------------------------

--
-- Structure for view `CuentasLigadasUsuario`
--
DROP TABLE IF EXISTS `CuentasLigadasUsuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `CuentasLigadasUsuario`  AS  select `Cuenta`.`NumeroCuenta` AS `NumeroCuenta`,`Cuenta`.`IDUsuario` AS `IDUsuario`,`Cuenta`.`Saldo` AS `Saldo`,`Cuenta`.`CLABE` AS `CLABE`,`Usuario`.`Nombre` AS `Nombre`,`Usuario`.`Apellido` AS `Apellido` from (`Cuenta` join `Usuario` on(`Cuenta`.`IDUsuario` = `Usuario`.`IDUsuario`)) ;

-- --------------------------------------------------------

--
-- Structure for view `MovimientosLigadosUsuario`
--
DROP TABLE IF EXISTS `MovimientosLigadosUsuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `MovimientosLigadosUsuario`  AS  select `Movimiento`.`NumeroCuenta` AS `NumeroCuenta`,`Movimiento`.`Tipo` AS `Tipo`,`Movimiento`.`Monto` AS `Monto` from `Movimiento` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Cuenta`
--
ALTER TABLE `Cuenta`
  ADD PRIMARY KEY (`NumeroCuenta`),
  ADD KEY `IDUsuario` (`IDUsuario`);

--
-- Indexes for table `Movimiento`
--
ALTER TABLE `Movimiento`
  ADD PRIMARY KEY (`IDMovimiento`),
  ADD KEY `NumeroCuenta` (`NumeroCuenta`);

--
-- Indexes for table `TarjetaCredito`
--
ALTER TABLE `TarjetaCredito`
  ADD PRIMARY KEY (`IDTarjetaCredito`),
  ADD KEY `NumeroCuenta` (`NumeroCuenta`);

--
-- Indexes for table `TarjetaDebito`
--
ALTER TABLE `TarjetaDebito`
  ADD PRIMARY KEY (`IDTarjetaDebito`),
  ADD KEY `NumeroCuenta` (`NumeroCuenta`);

--
-- Indexes for table `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`IDUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Cuenta`
--
ALTER TABLE `Cuenta`
  MODIFY `NumeroCuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Movimiento`
--
ALTER TABLE `Movimiento`
  MODIFY `IDMovimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `TarjetaCredito`
--
ALTER TABLE `TarjetaCredito`
  MODIFY `IDTarjetaCredito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `TarjetaDebito`
--
ALTER TABLE `TarjetaDebito`
  MODIFY `IDTarjetaDebito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `IDUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Cuenta`
--
ALTER TABLE `Cuenta`
  ADD CONSTRAINT `IDUsuarioFK` FOREIGN KEY (`IDUsuario`) REFERENCES `Usuario` (`IDUsuario`);

--
-- Constraints for table `Movimiento`
--
ALTER TABLE `Movimiento`
  ADD CONSTRAINT `NumeroCuentaFK` FOREIGN KEY (`NumeroCuenta`) REFERENCES `Cuenta` (`NumeroCuenta`);

--
-- Constraints for table `TarjetaCredito`
--
ALTER TABLE `TarjetaCredito`
  ADD CONSTRAINT `NumeroCuentaFKTC` FOREIGN KEY (`NumeroCuenta`) REFERENCES `Cuenta` (`NumeroCuenta`);

--
-- Constraints for table `TarjetaDebito`
--
ALTER TABLE `TarjetaDebito`
  ADD CONSTRAINT `NumeroCuentaFKTD` FOREIGN KEY (`NumeroCuenta`) REFERENCES `Cuenta` (`NumeroCuenta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
