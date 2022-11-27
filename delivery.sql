-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 30, 2022 at 11:40 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias_empresas`
--

CREATE TABLE `categorias_empresas` (
  `idcateemp` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorias_empresas`
--

INSERT INTO `categorias_empresas` (`idcateemp`, `idempresa`, `idcategoria`, `activo`) VALUES
(1, 5, 4, 1),
(2, 5, 7, 1),
(8, 5, 6, 1),
(9, 6, 3, 1),
(10, 6, 5, 1),
(11, 6, 7, 1),
(12, 7, 1, 1),
(13, 8, 4, 1),
(14, 9, 1, 1),
(15, 10, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categoria_negocio`
--

CREATE TABLE `categoria_negocio` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `activo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categoria_negocio`
--

INSERT INTO `categoria_negocio` (`idcategoria`, `nombre`, `activo`) VALUES
(1, 'CARNES', 1),
(2, 'ALCOHOL Y TABACO', 1),
(3, 'ENSALADAS', 1),
(4, 'DONAS', 1),
(5, 'PIZZAS', 1),
(6, 'HAMBURGUESAS', 1),
(7, 'BEBIDAS', 1),
(8, 'PESCADO Y MARISCOS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
--

CREATE TABLE `departamentos` (
  `iddepartamento` int(11) NOT NULL,
  `idpais` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `activo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departamentos`
--

INSERT INTO `departamentos` (`iddepartamento`, `idpais`, `nombre`, `activo`) VALUES
(7, 1, 'LA UNION', 1),
(8, 1, 'MORAZAN', 1),
(9, 1, 'SAN MIGUEL', 1),
(12, 1, 'USULUTAN', 1);

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE `empresas` (
  `idempresa` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `representante` varchar(200) NOT NULL,
  `razonsocial` text NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `nrc` varchar(10) NOT NULL,
  `giro` text NOT NULL,
  `logo` text NOT NULL,
  `activo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`idempresa`, `nombre`, `representante`, `razonsocial`, `telefono`, `nrc`, `giro`, `logo`, `activo`) VALUES
(5, 'EMMA DONUTS', 'JOSE GARCIA PADILLA', 'ALIMENTOS BUENOS S.A DE C.V', '26600860', '45782385', 'ALIMENTOS BEBIDAS', '5emma20220810075225.jpeg', 1),
(6, 'PIZZA HUT', 'MARIA MAGDALENA', 'PRODUCTOS ALIMENTICIOS S.A DE C.V.', '2625252522', '1217832', 'ALIMENTOS Y BEBIDAS', '6pizza20220811073229.png', 1),
(7, 'Oye!', 'Oneyda Chavez', 'Comerciante', '73348625', '483157', 'Comercio', '7logo20220815071704.jpg', 1),
(8, 'prueba', 'oneyda', 'Comerciante', '75157812', '483158', 'Comercio', '8descarga20220821031549.jpg', 0),
(9, 'Pollo Campero', 'Oneyda Chavez', 'servicios', '78451578', '483157-7', 'alimentos', '9pollo20221009115819.png', 0),
(10, 'prueba', 'Oneyda Chavez', 'Comerciante', '78798526', '483157-7', 'Comercio', '10logo120221023060131.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `idmenu` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idmenu`, `idempresa`, `nombre`, `activo`, `idcategoria`) VALUES
(1, 6, 'PRUEBA', 1, 5),
(2, 5, 'PRUEBA1', 1, 4),
(7, 7, 'PRUEBA45', 1, 3),
(8, 7, 'PRUEBA45', 1, 3),
(14, 7, 'PRUEBA45', 1, 6),
(15, 5, '', 1, 1),
(16, 5, 'PRUEBA1', 1, 1),
(17, 7, 'POLLO', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `menu_detalle`
--

CREATE TABLE `menu_detalle` (
  `idmenudetalle` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` decimal(20,2) NOT NULL,
  `foto` text NOT NULL,
  `extras` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `activo` tinyint(1) DEFAULT '1',
  `descripcion` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_detalle`
--

INSERT INTO `menu_detalle` (`idmenudetalle`, `idmenu`, `nombre`, `precio`, `foto`, `extras`, `activo`, `descripcion`) VALUES
(1, 2, 'DONAS', '3.00', '1images (1)20221023055808.jfif', '[]', 1, 'DONAS'),
(11, 14, 'AMBURGUESA 3/4 LIBRA', '7.50', '11b220221030022214.png', '[]', 1, 'AMBURGUESA 3/4 LIBRA'),
(12, 17, 'POLLO', '5.50', '12s520221030025221.png', '[]', 1, 'POLLO');

-- --------------------------------------------------------

--
-- Table structure for table `municipios`
--

CREATE TABLE `municipios` (
  `idmunicipio` int(11) NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `activo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `municipios`
--

INSERT INTO `municipios` (`idmunicipio`, `iddepartamento`, `nombre`, `activo`) VALUES
(1, 9, 'SAN MIGUEL', 1),
(2, 9, 'QUELEPA', 1),
(3, 7, 'Anamorós', 1),
(4, 7, 'Bolívar', 1),
(5, 7, 'Concepción de Oriente', 1),
(6, 7, 'Conchagua', 1),
(7, 7, 'El Carmen', 1),
(8, 7, 'El Sauce', 1),
(9, 7, 'Intipucá', 1),
(10, 7, 'Lislique', 1),
(11, 7, 'Meanguera del Golfo', 1),
(12, 7, 'Nueva Esparta', 1),
(13, 7, 'Pasaquina', 1),
(14, 7, 'Polorós', 1),
(15, 7, 'San Alejo', 1),
(16, 7, 'San José La Fuente', 1),
(17, 7, 'Santa Rosa de Lima', 1),
(18, 7, 'Yayantique', 1),
(19, 7, 'Yucuaiquín', 1),
(20, 9, 'Carolina', 1),
(21, 9, 'Chapeltique', 1),
(22, 9, 'Chinameca', 1),
(23, 9, 'Chirilagua', 1),
(24, 9, 'Ciudad Barrios', 1),
(25, 9, 'Comacarán', 1),
(26, 9, 'El Tránsito', 1),
(27, 9, 'Lolotique', 1),
(28, 9, 'Moncagua', 1),
(29, 9, 'Nueva Guadalupe', 1),
(30, 9, 'Nuevo Edén de San Juan', 1),
(31, 9, 'San Antonio del Mosco', 1),
(32, 9, 'San Gerardo', 1),
(33, 9, ' San Jorge', 1),
(34, 9, 'San Luis de La Reina', 1),
(35, 9, 'San Rafael Oriente', 1),
(36, 9, 'Sesori', 1),
(37, 9, 'Uluazapa', 1),
(38, 8, 'San Francisco Gotera', 1),
(39, 8, 'Arambala', 1),
(40, 8, 'Cacaopera', 1),
(41, 8, 'Chilanga', 1),
(42, 8, 'Corinto', 1),
(43, 8, 'Delicias de Concepción', 1),
(44, 8, 'El Divisadero', 1),
(45, 8, 'El Rosario', 1),
(46, 8, 'Gualococti', 1),
(47, 8, 'Guatajiagua', 1),
(48, 8, 'Joateca', 1),
(49, 8, 'Jocoaitique', 1),
(50, 8, 'Jocoro', 1),
(51, 8, 'Lolotiquillo', 1),
(52, 8, 'Meanguera', 1),
(53, 8, 'Osicala', 1),
(54, 8, 'Perquín', 1),
(55, 8, 'San Carlos', 1),
(56, 8, 'San Fernando', 1),
(57, 8, 'San Isidro', 1),
(58, 8, 'San Simón', 1),
(59, 8, 'Sensembra', 1),
(60, 8, 'Sociedad', 1),
(61, 8, 'Torola', 1),
(62, 8, 'Yamabal', 1),
(63, 8, 'Yoloaiquín', 1),
(64, 12, 'Usulután', 1),
(65, 12, 'Alegría', 1),
(66, 12, 'Berlín', 1),
(67, 12, 'California', 1),
(68, 12, 'Concepción Batres', 1),
(69, 12, 'El Triunfo', 1),
(70, 12, 'Ereguayquín', 1),
(71, 12, 'Estanzuelas', 1),
(72, 12, 'Jiquilisco', 1),
(73, 12, 'Jucuapa', 1),
(74, 12, 'Jucuarán', 1),
(75, 12, 'Mercedes Umaña', 1),
(76, 12, 'Nueva Granada', 1),
(77, 12, 'Ozatlán', 1),
(78, 12, 'Puerto El Triunfo', 1),
(79, 12, 'San Agustín', 1),
(80, 12, 'San Buenaventura', 1),
(81, 12, 'San Dionisio', 1),
(82, 12, 'San Francisco Javier', 1),
(83, 12, 'Santa Elena', 1),
(84, 12, 'Santa María', 1),
(85, 12, 'Santiago de María', 1),
(86, 12, 'Tecapán', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pais`
--

CREATE TABLE `pais` (
  `idpais` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `activo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pais`
--

INSERT INTO `pais` (`idpais`, `nombre`, `activo`) VALUES
(1, 'EL SALVADOR', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedido` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idusuarioapp` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `direccion_entrega` text NOT NULL,
  `tipo_pago` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `subtotal` decimal(20,2) NOT NULL,
  `descuento` decimal(20,2) NOT NULL,
  `comentario` text,
  `total` decimal(20,2) NOT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pedidos_detalle`
--

CREATE TABLE `pedidos_detalle` (
  `idpedidodetalle` int(11) NOT NULL,
  `idpedido` int(11) NOT NULL,
  `idmenudetalle` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `extras` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `total` decimal(20,2) NOT NULL,
  `activo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pedidos_repartidor`
--

CREATE TABLE `pedidos_repartidor` (
  `idepedidrepar` int(11) NOT NULL,
  `idpedido` int(11) NOT NULL,
  `idrepartidor` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` int(11) NOT NULL,
  `permiso` varchar(100) NOT NULL DEFAULT '',
  `activo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `permiso`, `activo`) VALUES
(1, 'DASHBOARD', 1),
(2, 'CREAR USUARIOS', 1),
(3, 'MODIFICAR USUARIOS', 1),
(4, 'ELIMINAR USUARIOS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `repartidores`
--

CREATE TABLE `repartidores` (
  `idrepartidor` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `estado_civil` int(11) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `foto` text,
  `n_moto` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(100) NOT NULL DEFAULT '',
  `activo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idrol`, `rol`, `activo`) VALUES
(1, 'ADMINISTRADOR', 1),
(2, 'empleado', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles_permisos`
--

CREATE TABLE `roles_permisos` (
  `idrolpe` int(11) NOT NULL,
  `idrol` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles_permisos`
--

INSERT INTO `roles_permisos` (`idrolpe`, `idrol`, `idpermiso`, `activo`) VALUES
(1, 1, 2, 1),
(2, 1, 1, 1),
(3, 1, 4, 1),
(4, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sucursales`
--

CREATE TABLE `sucursales` (
  `idsucursal` int(10) UNSIGNED NOT NULL,
  `idempresa` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `iddepartamento` int(10) UNSIGNED NOT NULL,
  `idmunicipio` int(10) UNSIGNED NOT NULL,
  `direccion` text NOT NULL,
  `gps` text NOT NULL,
  `encargado` varchar(200) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `dui` varchar(10) NOT NULL,
  `nit` varchar(20) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` text NOT NULL,
  `idrol` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombres`, `apellidos`, `dui`, `nit`, `usuario`, `clave`, `idrol`, `activo`) VALUES
(7, 'ADMIN1', 'ADMIN', '123', '', 'admin', 'MAMQ/UF+Q4arpOrGnlGxRQTNt//we83fKJ9VRF+c/nYf9ck5I5+WBmidZn+GSebnxYjU0Xg=', 1, 1),
(8, 'ONEYDA MARICELA', 'CHAVEZ DEL CID', '05672589-1', '1217-065209-1', 'one', '+IVV9T5HhBjjIpyxe5Hn1rQmPCkfrJChUeTUbbUi3NBmnj5xtrCfQUSH/4C+g3uM6tj+', 1, 1),
(9, 'CARLOS', 'MURILLO', '05670652-1', '1217-065209-2', 'carlos', 'JjcWwReHAWRkcvUS5rvq+pJlJxbKs4Y/Ja/RvFQ9xqNQ3vrsbxOmWTh1J9lvt9rbvTlw', 1, 0),
(10, 'PRUEBA', 'PRUEBA1', '05268629-1', '1217-065209-8', 'prueba', 'SrQ1FrnFTkLgpuQfxgFOhHuOKhpPVTg9aaJks+Bcn8b9vqno9uxsHWvzJltM/h5JL60H', 1, 0),
(11, 'PRUEBA', 'PRUEBA', '1245821', '1217-065209-1', 'prueba1', 'J/A4TjYow4D1FO9h8VXYCtbUatWe0XnUSTut42PJulpCOZwAc+Cphq3J/BmaJ3T/kn+Q', 1, 1),
(12, 'PRUEBA1', 'PRUEB1', '4558525', '1217-065209-2', 'prueba2', 'ekEDCaK63EZUGmOK2AGZWFDA3tFFtUUXliCDlpBbW8KaAsZPWaSB2zzUzizTLSmoK+P9', 2, 0),
(13, 'PRUEBA 4', 'PRUEBA4', '45215', '1217-065209-7', 'prueba4', 'q2CFSZya/nh7TR/bovQ7FTt7iSUS6JrullG1OoTc6GX9yrkI4VeOik4Ce53WWSZqxe1P', 1, 1),
(14, 'PRUEBA5', 'PRUEBA5', '1256-15', '1217-065209-3', 'prueba5', 'CHkf6HRpO9U6VhUMbWdkHZPhVzS1SIPQIjf7F++cUj3TxMVvb2SUzuZ4Il1XCTdnBBdJ', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_app`
--

CREATE TABLE `usuarios_app` (
  `idusuarioapp` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` text NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `idrol` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias_empresas`
--
ALTER TABLE `categorias_empresas`
  ADD PRIMARY KEY (`idcateemp`),
  ADD KEY `idempresa` (`idempresa`),
  ADD KEY `idcategoria` (`idcategoria`);

--
-- Indexes for table `categoria_negocio`
--
ALTER TABLE `categoria_negocio`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indexes for table `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`iddepartamento`),
  ADD KEY `idpais` (`idpais`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`idempresa`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`),
  ADD KEY `idempresa` (`idempresa`),
  ADD KEY `FK_categoria` (`idcategoria`);

--
-- Indexes for table `menu_detalle`
--
ALTER TABLE `menu_detalle`
  ADD PRIMARY KEY (`idmenudetalle`),
  ADD KEY `idmenu` (`idmenu`);

--
-- Indexes for table `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`idmunicipio`),
  ADD KEY `iddepartamento` (`iddepartamento`);

--
-- Indexes for table `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idpais`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `idusuarioapp` (`idusuarioapp`);

--
-- Indexes for table `pedidos_detalle`
--
ALTER TABLE `pedidos_detalle`
  ADD PRIMARY KEY (`idpedidodetalle`),
  ADD KEY `idpedido` (`idpedido`),
  ADD KEY `idmenudetalle` (`idmenudetalle`);

--
-- Indexes for table `pedidos_repartidor`
--
ALTER TABLE `pedidos_repartidor`
  ADD PRIMARY KEY (`idepedidrepar`),
  ADD KEY `idpedido` (`idpedido`),
  ADD KEY `idrepartidor` (`idrepartidor`);

--
-- Indexes for table `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indexes for table `repartidores`
--
ALTER TABLE `repartidores`
  ADD PRIMARY KEY (`idrepartidor`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idrol`);

--
-- Indexes for table `roles_permisos`
--
ALTER TABLE `roles_permisos`
  ADD PRIMARY KEY (`idrolpe`),
  ADD KEY `idpermiso` (`idpermiso`),
  ADD KEY `idrol` (`idrol`);

--
-- Indexes for table `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`idsucursal`),
  ADD KEY `idempresa` (`idempresa`),
  ADD KEY `iddepartamento` (`iddepartamento`),
  ADD KEY `idmunicipio` (`idmunicipio`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `idrol` (`idrol`);

--
-- Indexes for table `usuarios_app`
--
ALTER TABLE `usuarios_app`
  ADD PRIMARY KEY (`idusuarioapp`),
  ADD KEY `idrol` (`idrol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias_empresas`
--
ALTER TABLE `categorias_empresas`
  MODIFY `idcateemp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categoria_negocio`
--
ALTER TABLE `categoria_negocio`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `iddepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `idempresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `menu_detalle`
--
ALTER TABLE `menu_detalle`
  MODIFY `idmenudetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `municipios`
--
ALTER TABLE `municipios`
  MODIFY `idmunicipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `pais`
--
ALTER TABLE `pais`
  MODIFY `idpais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pedidos_detalle`
--
ALTER TABLE `pedidos_detalle`
  MODIFY `idpedidodetalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pedidos_repartidor`
--
ALTER TABLE `pedidos_repartidor`
  MODIFY `idepedidrepar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `repartidores`
--
ALTER TABLE `repartidores`
  MODIFY `idrepartidor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles_permisos`
--
ALTER TABLE `roles_permisos`
  MODIFY `idrolpe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `idsucursal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `usuarios_app`
--
ALTER TABLE `usuarios_app`
  MODIFY `idusuarioapp` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categorias_empresas`
--
ALTER TABLE `categorias_empresas`
  ADD CONSTRAINT `categorias_empresas_ibfk_1` FOREIGN KEY (`idempresa`) REFERENCES `empresas` (`idempresa`),
  ADD CONSTRAINT `categorias_empresas_ibfk_2` FOREIGN KEY (`idcategoria`) REFERENCES `categoria_negocio` (`idcategoria`);

--
-- Constraints for table `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `departamentos_ibfk_1` FOREIGN KEY (`idpais`) REFERENCES `pais` (`idpais`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FK_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria_negocio` (`idcategoria`),
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`idempresa`) REFERENCES `empresas` (`idempresa`);

--
-- Constraints for table `menu_detalle`
--
ALTER TABLE `menu_detalle`
  ADD CONSTRAINT `menu_detalle_ibfk_1` FOREIGN KEY (`idmenu`) REFERENCES `menu` (`idmenu`);

--
-- Constraints for table `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_ibfk_1` FOREIGN KEY (`iddepartamento`) REFERENCES `departamentos` (`iddepartamento`);

--
-- Constraints for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idusuarioapp`) REFERENCES `usuarios_app` (`idusuarioapp`);

--
-- Constraints for table `pedidos_detalle`
--
ALTER TABLE `pedidos_detalle`
  ADD CONSTRAINT `pedidos_detalle_ibfk_1` FOREIGN KEY (`idpedido`) REFERENCES `pedidos` (`idpedido`),
  ADD CONSTRAINT `pedidos_detalle_ibfk_2` FOREIGN KEY (`idmenudetalle`) REFERENCES `menu_detalle` (`idmenudetalle`);

--
-- Constraints for table `pedidos_repartidor`
--
ALTER TABLE `pedidos_repartidor`
  ADD CONSTRAINT `pedidos_repartidor_ibfk_1` FOREIGN KEY (`idpedido`) REFERENCES `pedidos` (`idpedido`),
  ADD CONSTRAINT `pedidos_repartidor_ibfk_2` FOREIGN KEY (`idrepartidor`) REFERENCES `repartidores` (`idrepartidor`);

--
-- Constraints for table `roles_permisos`
--
ALTER TABLE `roles_permisos`
  ADD CONSTRAINT `roles_permisos_ibfk_1` FOREIGN KEY (`idpermiso`) REFERENCES `permisos` (`idpermiso`),
  ADD CONSTRAINT `roles_permisos_ibfk_2` FOREIGN KEY (`idrol`) REFERENCES `roles` (`idrol`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `roles` (`idrol`);

--
-- Constraints for table `usuarios_app`
--
ALTER TABLE `usuarios_app`
  ADD CONSTRAINT `usuarios_app_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `roles` (`idrol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
