-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2021 a las 01:43:01
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sicmefam`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabbitacora`
--

CREATE TABLE `tabbitacora` (
  `idbitacora` int(11) NOT NULL,
  `fecha_hora_accion` datetime NOT NULL,
  `accion_bitacora` varchar(150) NOT NULL,
  `modulo_bitacora` varchar(150) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabcita`
--

CREATE TABLE `tabcita` (
  `idcita` int(11) NOT NULL,
  `idpaciente` int(11) DEFAULT NULL,
  `nombrecitado` varchar(50) NOT NULL,
  `telefonocitado` varchar(10) NOT NULL,
  `fecha_hora_cita` datetime NOT NULL,
  `estadocita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabconsulta`
--

CREATE TABLE `tabconsulta` (
  `idconsulta` int(11) NOT NULL,
  `idpaciente` int(11) NOT NULL,
  `fecha_hora_consulta` datetime NOT NULL,
  `razon_consulta` text NOT NULL,
  `antecedentes_consulta` text NOT NULL,
  `diagnostico_consulta` text NOT NULL,
  `observaciones_consulta` text NOT NULL,
  `ordenexamenconsulta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabexamen`
--

CREATE TABLE `tabexamen` (
  `idexamen` int(11) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  `idconsulta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabinventario_medicamento`
--

CREATE TABLE `tabinventario_medicamento` (
  `idreferencia_medicamento` int(11) NOT NULL,
  `idmedicamento` int(11) NOT NULL,
  `fecha_ingreso_medicamento` date NOT NULL,
  `fecha_venc_medicamento` date NOT NULL,
  `cant_medicamento` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `ubicacion` varchar(60) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabmedicamento`
--

CREATE TABLE `tabmedicamento` (
  `idmedicamento` int(11) NOT NULL,
  `nombre_medicamento` varchar(50) NOT NULL,
  `presetacion_medicamento` varchar(50) NOT NULL,
  `administracion_medicamento` varchar(50) NOT NULL,
  `concentracion_medicamento` varchar(50) NOT NULL,
  `stock_minimo` int(11) NOT NULL,
  `unidad` varchar(3) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabpaciente`
--

CREATE TABLE `tabpaciente` (
  `idpaciente` int(11) NOT NULL,
  `num_expediente` varchar(8) NOT NULL,
  `nombre_paciente` varchar(40) CHARACTER SET utf8 NOT NULL,
  `apellido_paciente` varchar(40) NOT NULL,
  `sexo_paciente` varchar(9) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `dui_paciente` varchar(10) NOT NULL,
  `correo_paciente` varchar(50) NOT NULL,
  `tel_paciente` varchar(10) NOT NULL,
  `direccion_paciente` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabpersonal`
--

CREATE TABLE `tabpersonal` (
  `idpersonal` int(11) NOT NULL,
  `dui_personal` varchar(10) NOT NULL,
  `nombre_personal` varchar(50) NOT NULL,
  `apellido_personal` varchar(50) NOT NULL,
  `telefono_personal` varchar(10) NOT NULL,
  `sexo` varchar(9) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `salario` decimal(10,0) NOT NULL,
  `cargo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tabpersonal`
--

INSERT INTO `tabpersonal` (`idpersonal`, `dui_personal`, `nombre_personal`, `apellido_personal`, `telefono_personal`, `sexo`, `direccion`, `correo`, `fecha_ingreso`, `salario`, `cargo`) VALUES
(1, '09087654-0', 'Josue', 'Hernandez', '6312-2343', 'M', 'san lorenzo, san vicente', 'josuehernandez0096@gmail.com', '2021-10-20', '340', 'ADMINISTRADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabproveedor`
--

CREATE TABLE `tabproveedor` (
  `idproveedor` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabreceta`
--

CREATE TABLE `tabreceta` (
  `idreceta` int(11) NOT NULL,
  `idmedicamento` int(11) NOT NULL,
  `nombre_medicamento` varchar(50) NOT NULL,
  `cantidad_entregada` int(11) NOT NULL,
  `cantidad_indicada` int(11) NOT NULL,
  `indicaciones` varchar(200) NOT NULL,
  `idconsulta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabresponsable`
--

CREATE TABLE `tabresponsable` (
  `idresponsable` int(11) NOT NULL,
  `nombre_responsable` varchar(50) NOT NULL,
  `apellido_responsable` varchar(50) NOT NULL,
  `relacion_responsable` varchar(20) NOT NULL,
  `dui_responsable` varchar(9) NOT NULL,
  `telefono_responsable` varchar(9) NOT NULL,
  `idpaciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabsignosvitales`
--

CREATE TABLE `tabsignosvitales` (
  `idsignovital` int(11) NOT NULL,
  `presion` varchar(6) NOT NULL,
  `frecuencia` varchar(5) NOT NULL,
  `temperatura` varchar(4) NOT NULL,
  `peso` int(11) NOT NULL,
  `estatura` int(11) NOT NULL,
  `idconsulta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabusuario`
--

CREATE TABLE `tabusuario` (
  `idusuario` int(11) NOT NULL,
  `idpersonal` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contraseña` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tabusuario`
--

INSERT INTO `tabusuario` (`idusuario`, `idpersonal`, `usuario`, `contraseña`) VALUES
(1, 1, 'JOSUE', '????^?PU?}l???');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tabbitacora`
--
ALTER TABLE `tabbitacora`
  ADD PRIMARY KEY (`idbitacora`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `tabcita`
--
ALTER TABLE `tabcita`
  ADD PRIMARY KEY (`idcita`),
  ADD KEY `idpaciente` (`idpaciente`);

--
-- Indices de la tabla `tabconsulta`
--
ALTER TABLE `tabconsulta`
  ADD PRIMARY KEY (`idconsulta`),
  ADD KEY `idpaciente` (`idpaciente`);

--
-- Indices de la tabla `tabexamen`
--
ALTER TABLE `tabexamen`
  ADD PRIMARY KEY (`idexamen`),
  ADD KEY `idconsulta` (`idconsulta`);

--
-- Indices de la tabla `tabinventario_medicamento`
--
ALTER TABLE `tabinventario_medicamento`
  ADD PRIMARY KEY (`idreferencia_medicamento`),
  ADD KEY `idmedicamento` (`idmedicamento`),
  ADD KEY `idproveedor` (`idproveedor`);

--
-- Indices de la tabla `tabmedicamento`
--
ALTER TABLE `tabmedicamento`
  ADD PRIMARY KEY (`idmedicamento`);

--
-- Indices de la tabla `tabpaciente`
--
ALTER TABLE `tabpaciente`
  ADD PRIMARY KEY (`idpaciente`);

--
-- Indices de la tabla `tabpersonal`
--
ALTER TABLE `tabpersonal`
  ADD PRIMARY KEY (`idpersonal`);

--
-- Indices de la tabla `tabproveedor`
--
ALTER TABLE `tabproveedor`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indices de la tabla `tabreceta`
--
ALTER TABLE `tabreceta`
  ADD PRIMARY KEY (`idreceta`),
  ADD KEY `idmedicamento` (`idmedicamento`),
  ADD KEY `idconsulta` (`idconsulta`);

--
-- Indices de la tabla `tabresponsable`
--
ALTER TABLE `tabresponsable`
  ADD PRIMARY KEY (`idresponsable`),
  ADD KEY `idpaciente` (`idpaciente`);

--
-- Indices de la tabla `tabsignosvitales`
--
ALTER TABLE `tabsignosvitales`
  ADD PRIMARY KEY (`idsignovital`),
  ADD KEY `idconsulta` (`idconsulta`);

--
-- Indices de la tabla `tabusuario`
--
ALTER TABLE `tabusuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `idpersonal` (`idpersonal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tabbitacora`
--
ALTER TABLE `tabbitacora`
  MODIFY `idbitacora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabcita`
--
ALTER TABLE `tabcita`
  MODIFY `idcita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabconsulta`
--
ALTER TABLE `tabconsulta`
  MODIFY `idconsulta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabexamen`
--
ALTER TABLE `tabexamen`
  MODIFY `idexamen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabinventario_medicamento`
--
ALTER TABLE `tabinventario_medicamento`
  MODIFY `idreferencia_medicamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabmedicamento`
--
ALTER TABLE `tabmedicamento`
  MODIFY `idmedicamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabpaciente`
--
ALTER TABLE `tabpaciente`
  MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabpersonal`
--
ALTER TABLE `tabpersonal`
  MODIFY `idpersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tabproveedor`
--
ALTER TABLE `tabproveedor`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabreceta`
--
ALTER TABLE `tabreceta`
  MODIFY `idreceta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabresponsable`
--
ALTER TABLE `tabresponsable`
  MODIFY `idresponsable` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabsignosvitales`
--
ALTER TABLE `tabsignosvitales`
  MODIFY `idsignovital` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabusuario`
--
ALTER TABLE `tabusuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tabbitacora`
--
ALTER TABLE `tabbitacora`
  ADD CONSTRAINT `tabbitacora_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `tabusuario` (`idusuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tabcita`
--
ALTER TABLE `tabcita`
  ADD CONSTRAINT `tabcita_ibfk_1` FOREIGN KEY (`idpaciente`) REFERENCES `tabpaciente` (`idpaciente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tabexamen`
--
ALTER TABLE `tabexamen`
  ADD CONSTRAINT `tabexamen_ibfk_1` FOREIGN KEY (`idconsulta`) REFERENCES `tabconsulta` (`idconsulta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tabmedicamento`
--
ALTER TABLE `tabmedicamento`
  ADD CONSTRAINT `tabmedicamento_ibfk_1` FOREIGN KEY (`idmedicamento`) REFERENCES `tabinventario_medicamento` (`idmedicamento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tabpaciente`
--
ALTER TABLE `tabpaciente`
  ADD CONSTRAINT `tabpaciente_ibfk_1` FOREIGN KEY (`idpaciente`) REFERENCES `tabconsulta` (`idpaciente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tabproveedor`
--
ALTER TABLE `tabproveedor`
  ADD CONSTRAINT `tabproveedor_ibfk_1` FOREIGN KEY (`idproveedor`) REFERENCES `tabinventario_medicamento` (`idproveedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tabreceta`
--
ALTER TABLE `tabreceta`
  ADD CONSTRAINT `tabreceta_ibfk_1` FOREIGN KEY (`idmedicamento`) REFERENCES `tabmedicamento` (`idmedicamento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tabreceta_ibfk_2` FOREIGN KEY (`idconsulta`) REFERENCES `tabconsulta` (`idconsulta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tabresponsable`
--
ALTER TABLE `tabresponsable`
  ADD CONSTRAINT `tabresponsable_ibfk_1` FOREIGN KEY (`idpaciente`) REFERENCES `tabpaciente` (`idpaciente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tabsignosvitales`
--
ALTER TABLE `tabsignosvitales`
  ADD CONSTRAINT `tabsignosvitales_ibfk_1` FOREIGN KEY (`idconsulta`) REFERENCES `tabconsulta` (`idconsulta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tabusuario`
--
ALTER TABLE `tabusuario`
  ADD CONSTRAINT `tabusuario_ibfk_1` FOREIGN KEY (`idpersonal`) REFERENCES `tabpersonal` (`idpersonal`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
