-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2020 at 05:17 AM
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
-- Database: `banco1`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cuenta`
--

CREATE TABLE `Cuenta` (
  `NumeroCuenta` int(11) NOT NULL,
  `IDUsuario` int(11) NOT NULL,
  `CLABE` varchar(8) COLLATE utf8_bin NOT NULL,
  `Saldo` float (100,2)NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Cuenta`
--

INSERT INTO `Cuenta` (`NumeroCuenta`, `IDUsuario`, `CLABE`, `Saldo`) VALUES
(1, 1, '76900009', 234145),
(2, 1, '77100016', 11067800),
(3, 1, '79500012', 9337),
(4, 1, '98300012', 0),
(5, 1, '57800018', 271828),
(6, 1, '26600014', 101066),
(7, 1, '76700010', 100),
(8, 5, '32100051', 1000),
(9, 1, '09900013', 0),
(10, 1, '19800015', 0),
(11, 1, '92900013', 0),
(12, 1, '88000013', 0),
(13, 1, '59700017', 0),
(14, 1, '06900014', 0),
(15, 1, '65700017', 0),
(16, 1, '14900013', 0),
(17, 1, '89100014', 0),
(18, 1, '78500017', 0),
(19, 1, '84100018', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `CuentasLigadasUsuario`
-- (See below for the actual view)
--
CREATE TABLE `CuentasLigadasUsuario` (
`NumeroCuenta` int(11)
,`IDUsuario` int(11)
,`Saldo` float (100,2)
,`CLABE` varchar(8)
,`Nombre` varchar(50)
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
  `Monto` float (100,2)NOT NULL
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
(25, 3, 'Deposito', 3425),
(26, 1, 'Deposito', 234234),
(27, 1, 'Retiro', 89),
(28, 2, 'Deposito', 10000000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `MovimientosLigadosUsuario`
-- (See below for the actual view)
--
CREATE TABLE `MovimientosLigadosUsuario` (
`NumeroCuenta` int(11)
,`Tipo` varchar(40)
,`Monto` float (100,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `TarjetaCredito`
--

CREATE TABLE `TarjetaCredito` (
  `IDTarjetaCredito` int(11) NOT NULL,
  `NumeroCuenta` int(11) NOT NULL,
  `DomicilioFacturacion` varchar(50) COLLATE utf8_bin NOT NULL,
  `NumeroTarjeta` varchar(16) COLLATE utf8_bin NOT NULL,
  `NIP` varchar(4) COLLATE utf8_bin NOT NULL,
  `FechaVencimiento` date NOT NULL,
  `CodigoSeguridad` varchar(3) COLLATE utf8_bin NOT NULL,
  `Comision` float NOT NULL,
  `FechaCorte` date NOT NULL,
  `TasaInteres` float NOT NULL,
  `MontoLineaCredito` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `TarjetaCredito`
--

INSERT INTO `TarjetaCredito` (`IDTarjetaCredito`, `NumeroCuenta`, `DomicilioFacturacion`, `NumeroTarjeta`, `NIP`, `FechaVencimiento`, `CodigoSeguridad`, `Comision`, `FechaCorte`, `TasaInteres`, `MontoLineaCredito`) VALUES
(1, 5, 'ruiz cortinez', '6432951418025853', '9000', '2028-05-10', '853', 79, '2020-10-08', 0, 3000),
(2, 2, 'Manuel Castle 203 Brooklyn', '2746154711663611', '3805', '2028-11-04', '975', 79, '2020-05-12', 5, 10000),
(3, 4, 'pedro antornio 34 perbejal', '2135050895756433', '5343', '2028-12-01', '218', 79, '2020-12-01', 3, 16000),
(4, 19, 'enrique segovian 34 angel', '3379357322140569', '435', '2028-07-01', '548', 79, '2020-03-02', 1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `TarjetaDebito`
--

CREATE TABLE `TarjetaDebito` (
  `IDTarjetaDebito` int(11) NOT NULL,
  `NumeroCuenta` int(11) NOT NULL,
  `DomicilioFacturacion` varchar(70) COLLATE utf8_bin NOT NULL,
  `NumeroTarjeta` varchar(16) COLLATE utf8_bin NOT NULL,
  `NIP` varchar(4) COLLATE utf8_bin NOT NULL,
  `FechaVencimiento` date NOT NULL,
  `CodigoSeguridad` varchar(3) COLLATE utf8_bin NOT NULL,
  `Comision` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `TarjetaDebito`
--

INSERT INTO `TarjetaDebito` (`IDTarjetaDebito`, `NumeroCuenta`, `DomicilioFacturacion`, `NumeroTarjeta`, `NIP`, `FechaVencimiento`, `CodigoSeguridad`, `Comision`) VALUES
(1, 5, 'Manuel Castilla Brito 50 Concordia', '7770934433614607', '69', '2028-01-11', '849', 54),
(2, 4, 'Pedro Alarcon 42 Centro', '5862767537989861', '9804', '2028-10-03', '174', 54),
(3, 3, 'Escuela Kala 23 Siglo', '9944554546781267', '8000', '2028-03-05', '2', 54),
(4, 3, 'Leardini 34 Colosseo', '3930090626999163', '3006', '2028-09-11', '267', 54),
(5, 1, 'Sabiha Blvd 34 Pakyt', '4571823859287418', '5971', '2028-07-05', '703', 54),
(6, 3, 'Fac de Ing 34 San Mula', '2056954584202327', '2912', '2028-10-07', '409', 54),
(7, 5, 'pedro sainz 35 Concor', '5593121783927651', '8866', '2028-11-06', '90', 79),
(8, 5, 'jjkkjhjkhjhk', '5645483841481006', '1010', '2028-09-01', '558', 79),
(9, 5, 'njkj', '8440745299622780', '3255', '2028-11-05', '345', 79),
(10, 2, 'Gomez Duran 42 Villamadero', '9884563562433087', '0014', '2028-03-04', '745', 54),
(11, 2, 'Andrew the best 234 Pearl', '2282871538223834', '1625', '2028-11-04', '412', 54),
(12, 6, 'ruiz cortinex 34 ferpa', '3930985242931915', '4505', '2028-08-02', '198', 54);

-- --------------------------------------------------------

--
-- Stand-in structure for view `TarjetasCreLigadasUsuario`
-- (See below for the actual view)
--
CREATE TABLE `TarjetasCreLigadasUsuario` (
`NumeroTarjeta` varchar(16)
,`NumeroCuenta` int(11)
,`NIP` varchar(4)
,`FechaVencimiento` date
,`CodigoSeguridad` varchar(3)
,`Comision` float
,`FechaCorte` date
,`TasaInteres` float
,`MontoLineaCredito` float
,`DomicilioFacturacion` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `TarjetasDebLigadasUsuario`
-- (See below for the actual view)
--
CREATE TABLE `TarjetasDebLigadasUsuario` (
`NumeroTarjeta` varchar(16)
,`NumeroCuenta` int(11)
,`NIP` varchar(4)
,`FechaVencimiento` date
,`CodigoSeguridad` varchar(3)
,`Comision` float
,`DomicilioFacturacion` varchar(70)
);

-- --------------------------------------------------------

--
-- Table structure for table `Usuario`
--

CREATE TABLE `Usuario` (
  `IDUsuario` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_bin NOT NULL,
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
(1, 'J Manuel Victor', 'Gil Ortegakjj', '2003-01-22', 'Hombre', '9812830421', 'josgiort@hotmail.com', 'pepe10'),
(2, 'pepe', 'gil', '1998-09-09', 'hombre', '9812839431', 'pepe10@hotmail.com', 'coco'),
(3, 'dani', 'ortega', '1528-03-24', 'hombre', '9890053941', 'pepe156@hotmail.com', 'coco445'),
(4, 'Luis Alberto', 'Gil Ortega', '2004-08-14', 'Hombre', '9811314567', 'wicho@hotmail.com', 'ego123'),
(5, 'luisa', 'cruz', '2020-06-17', 'Mujer', '9816473291', 'luisa@g.com', 'pepe10');

-- --------------------------------------------------------

--
-- Stand-in structure for view `VistaDatosUsuarios`
-- (See below for the actual view)
--
CREATE TABLE `VistaDatosUsuarios` (
`Nombre` varchar(50)
,`Apellido` varchar(20)
,`FechaNacimiento` date
,`Sexo` varchar(20)
,`Telefono` varchar(20)
,`Email` varchar(30)
,`Contrasena` varchar(20)
);

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

-- --------------------------------------------------------

--
-- Structure for view `TarjetasCreLigadasUsuario`
--
DROP TABLE IF EXISTS `TarjetasCreLigadasUsuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `TarjetasCreLigadasUsuario`  AS  select `TarjetaCredito`.`NumeroTarjeta` AS `NumeroTarjeta`,`TarjetaCredito`.`NumeroCuenta` AS `NumeroCuenta`,`TarjetaCredito`.`NIP` AS `NIP`,`TarjetaCredito`.`FechaVencimiento` AS `FechaVencimiento`,`TarjetaCredito`.`CodigoSeguridad` AS `CodigoSeguridad`,`TarjetaCredito`.`Comision` AS `Comision`,`TarjetaCredito`.`FechaCorte` AS `FechaCorte`,`TarjetaCredito`.`TasaInteres` AS `TasaInteres`,`TarjetaCredito`.`MontoLineaCredito` AS `MontoLineaCredito`,`TarjetaCredito`.`DomicilioFacturacion` AS `DomicilioFacturacion` from `TarjetaCredito` ;

-- --------------------------------------------------------

--
-- Structure for view `TarjetasDebLigadasUsuario`
--
DROP TABLE IF EXISTS `TarjetasDebLigadasUsuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `TarjetasDebLigadasUsuario`  AS  select `TarjetaDebito`.`NumeroTarjeta` AS `NumeroTarjeta`,`TarjetaDebito`.`NumeroCuenta` AS `NumeroCuenta`,`TarjetaDebito`.`NIP` AS `NIP`,`TarjetaDebito`.`FechaVencimiento` AS `FechaVencimiento`,`TarjetaDebito`.`CodigoSeguridad` AS `CodigoSeguridad`,`TarjetaDebito`.`Comision` AS `Comision`,`TarjetaDebito`.`DomicilioFacturacion` AS `DomicilioFacturacion` from `TarjetaDebito` ;

-- --------------------------------------------------------

--
-- Structure for view `VistaDatosUsuarios`
--
DROP TABLE IF EXISTS `VistaDatosUsuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `VistaDatosUsuarios`  AS  select `Usuario`.`Nombre` AS `Nombre`,`Usuario`.`Apellido` AS `Apellido`,`Usuario`.`FechaNacimiento` AS `FechaNacimiento`,`Usuario`.`Sexo` AS `Sexo`,`Usuario`.`Telefono` AS `Telefono`,`Usuario`.`Email` AS `Email`,`Usuario`.`Contrasena` AS `Contrasena` from `Usuario` ;

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
  MODIFY `NumeroCuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `Movimiento`
--
ALTER TABLE `Movimiento`
  MODIFY `IDMovimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `TarjetaCredito`
--
ALTER TABLE `TarjetaCredito`
  MODIFY `IDTarjetaCredito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `TarjetaDebito`
--
ALTER TABLE `TarjetaDebito`
  MODIFY `IDTarjetaDebito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
