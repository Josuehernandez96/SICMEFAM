-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2021 a las 16:27:24
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
-- Base de datos: `sicmedic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbitacora`
--

CREATE TABLE `tbitacora` (
  `idbitacora` int(11) NOT NULL,
  `fecha_hora_accion` datetime NOT NULL,
  `accion_bitacora` varchar(200) NOT NULL,
  `modulo_bitacora` varchar(20) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcita`
--

CREATE TABLE `tcita` (
  `idcita` int(11) NOT NULL,
  `idpaciente` int(11) DEFAULT NULL,
  `nombre_citado` varchar(50) NOT NULL,
  `telefono_citado` varchar(10) NOT NULL,
  `fecha_hora_cita` datetime NOT NULL,
  `estado_cita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tconsulta`
--

CREATE TABLE `tconsulta` (
  `idconsulta` int(11) NOT NULL,
  `idpaciente` int(11) NOT NULL,
  `fecha_hora_consulta` datetime NOT NULL,
  `razon_consulta` text NOT NULL,
  `antecedentes_consulta` text NOT NULL,
  `diagnostico_consutla` text NOT NULL,
  `observaciones_consulta` text NOT NULL,
  `ordenexamen_consulta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `texamen`
--

CREATE TABLE `texamen` (
  `idexamen` int(11) NOT NULL,
  `ruta_imagen` varchar(100) NOT NULL,
  `idconsulta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tinventario_medicamento`
--

CREATE TABLE `tinventario_medicamento` (
  `idreferencia_medicamento` int(11) NOT NULL,
  `idmedicamento` int(11) NOT NULL,
  `fecha_ingreso_medicamento` date NOT NULL,
  `fecha_vencim_medicamento` date NOT NULL,
  `cantidad_medicamento` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tinventario_medicamento`
--

INSERT INTO `tinventario_medicamento` (`idreferencia_medicamento`, `idmedicamento`, `fecha_ingreso_medicamento`, `fecha_vencim_medicamento`, `cantidad_medicamento`, `idproveedor`, `ubicacion`, `estado`) VALUES
(11, 1, '2019-11-29', '2020-01-15', 50, 1, 'Estante A', 1),
(12, 1, '2019-11-29', '2020-03-12', 50, 1, 'Estante A', 1),
(13, 2, '2019-11-29', '2020-02-07', 50, 1, 'Estante A', 1),
(14, 2, '2019-11-29', '2020-02-20', 50, 1, 'Estante A', 1),
(15, 3, '2019-11-29', '2020-04-16', 100, 1, 'ESTANTE A', 1),
(16, 3, '2019-11-29', '2020-07-17', 100, 1, 'ESTANTE A', 1),
(17, 1, '2019-12-01', '2019-12-01', 123, 1, 'ESTANTE 3', 1),
(18, 3, '2019-12-02', '2019-12-27', 300, 1, 'ESTANTE A', 1),
(19, 4, '2019-12-02', '2019-12-27', 30, 1, 'ESTATNTE 3', 1),
(20, 5, '2019-12-13', '2019-12-25', 25, 1, 'ESTANTE 2', 1),
(21, 3, '2019-12-13', '2019-12-13', 200, 1, 'ESTANTE A', 1),
(22, 6, '2019-12-28', '2021-05-12', 50, 2, 'ESTANTE 1 ASPIRINAS', 1),
(23, 6, '2019-12-28', '2019-12-13', 200, 1, 'ESTANTE 2', 1),
(24, 6, '2019-12-28', '2019-12-03', 28, 1, 'ESTANTE 2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmedicamento`
--

CREATE TABLE `tmedicamento` (
  `idmedicamento` int(11) NOT NULL,
  `nombre_medicamento` varchar(50) NOT NULL,
  `presentacion_medicamento` varchar(50) NOT NULL,
  `via_admin_medicamento` varchar(50) NOT NULL,
  `concentracion_medicamento` varchar(50) NOT NULL,
  `stock_minimo_medicamento` int(11) NOT NULL,
  `unidad` varchar(3) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tmedicamento`
--

INSERT INTO `tmedicamento` (`idmedicamento`, `nombre_medicamento`, `presentacion_medicamento`, `via_admin_medicamento`, `concentracion_medicamento`, `stock_minimo_medicamento`, `unidad`, `estado`) VALUES
(1, 'Paracetamol 1', 'capsula', 'intravenosos', '150', 5, 'mg', 0),
(2, 'Paracetamol', 'pastilla', 'Oral', '300', 5, 'mg', 0),
(3, 'PARACETAMOL MK', 'pastilla', 'orales', '500', 5, 'mg', 1),
(4, 'ASPIRINA', 'pastilla', 'orales', '500', 5, 'mg', 1),
(5, 'ASPIRINA FORTE', 'pastilla', 'orales', '500', 10, 'mg', 1),
(6, 'CARDIASPIRINA', 'pastilla', 'orales', '500', 10, 'mg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpaciente`
--

CREATE TABLE `tpaciente` (
  `idpaciente` int(11) NOT NULL,
  `n_expediente` varchar(8) NOT NULL,
  `nombre_paciente` varchar(40) NOT NULL,
  `apellido_paciente` varchar(40) NOT NULL,
  `sexo_paciente` varchar(9) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `dui_paciente` varchar(10) NOT NULL,
  `correo_paciente` varchar(50) NOT NULL,
  `telefonop_paciente` varchar(10) NOT NULL,
  `telefonos_paciente` varchar(10) NOT NULL,
  `direccion_paciente` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpersonal`
--

CREATE TABLE `tpersonal` (
  `idpersonal` int(11) NOT NULL,
  `dui_personal` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre_personal` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido_personal` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono_personal` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `salario` decimal(10,0) NOT NULL,
  `cargo` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tpersonal`
--

INSERT INTO `tpersonal` (`idpersonal`, `dui_personal`, `nombre_personal`, `apellido_personal`, `telefono_personal`, `sexo`, `direccion`, `correo`, `fecha_ingreso`, `salario`, `cargo`) VALUES
(1, '04756325-3', 'Ernesto Vladimir', 'Rivas Perez ', '7274-2548', 'MASCULINO', 'Barrio El Calvario, San Sebastian', 'ernestorivas@gmail.com', '2021-11-01', '150', 'Secretario'),
(2, '03089563-5', 'Lucia Esmeralda', 'Gonzales Perez', '7475-9685', 'FEMENINO', '3av Sur, Barrio el Centro, San Vicente', 'lucia20213@gmail.com', '2021-11-03', '150', 'Asistente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproveedor`
--

CREATE TABLE `tproveedor` (
  `idproveedor` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tproveedor`
--

INSERT INTO `tproveedor` (`idproveedor`, `nombre`, `telefono`) VALUES
(1, 'LABORATORIO LOPEZ', '7666-4897'),
(2, 'LABORATORIO GAMNA', '4645-4645');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `treceta`
--

CREATE TABLE `treceta` (
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
-- Estructura de tabla para la tabla `tresponsable`
--

CREATE TABLE `tresponsable` (
  `idresponsable` int(11) NOT NULL,
  `nombre_responsable` varchar(40) NOT NULL,
  `apellido_responsable` varchar(40) NOT NULL,
  `relacion_responsable` varchar(20) NOT NULL,
  `dui_responsable` varchar(10) NOT NULL,
  `telefonoP_responsable` varchar(9) NOT NULL,
  `telefonoS_responsable` varchar(9) NOT NULL,
  `idpaciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsignosvitales`
--

CREATE TABLE `tsignosvitales` (
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
-- Estructura de tabla para la tabla `tusuario`
--

CREATE TABLE `tusuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `contrasena` text NOT NULL,
  `correo` varchar(50) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `codigo_recuperacion` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fechacreacion` date NOT NULL,
  `nombrep` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`idusuario`, `nombre`, `contrasena`, `correo`, `tipo`, `codigo_recuperacion`, `estado`, `fechacreacion`, `nombrep`) VALUES
(16, 'ENRIQUE', 'Y3UrTFJCNFVzckVud3laU1ZiVStqZz09', 'josuehernandez0096@gmail.com', 'admin', 0, 1, '2021-11-01', 'Enrique Josué Cortez Hernández');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbitacora`
--
ALTER TABLE `tbitacora`
  ADD PRIMARY KEY (`idbitacora`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `tcita`
--
ALTER TABLE `tcita`
  ADD PRIMARY KEY (`idcita`),
  ADD KEY `idpaciente` (`idpaciente`);

--
-- Indices de la tabla `tconsulta`
--
ALTER TABLE `tconsulta`
  ADD PRIMARY KEY (`idconsulta`),
  ADD KEY `idpaciente` (`idpaciente`);

--
-- Indices de la tabla `texamen`
--
ALTER TABLE `texamen`
  ADD PRIMARY KEY (`idexamen`),
  ADD KEY `idconsulta` (`idconsulta`);

--
-- Indices de la tabla `tinventario_medicamento`
--
ALTER TABLE `tinventario_medicamento`
  ADD PRIMARY KEY (`idreferencia_medicamento`),
  ADD KEY `idproveedor` (`idproveedor`),
  ADD KEY `idmedicamento` (`idmedicamento`);

--
-- Indices de la tabla `tmedicamento`
--
ALTER TABLE `tmedicamento`
  ADD PRIMARY KEY (`idmedicamento`);

--
-- Indices de la tabla `tpaciente`
--
ALTER TABLE `tpaciente`
  ADD PRIMARY KEY (`idpaciente`);

--
-- Indices de la tabla `tpersonal`
--
ALTER TABLE `tpersonal`
  ADD PRIMARY KEY (`idpersonal`);

--
-- Indices de la tabla `tproveedor`
--
ALTER TABLE `tproveedor`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indices de la tabla `treceta`
--
ALTER TABLE `treceta`
  ADD PRIMARY KEY (`idreceta`),
  ADD KEY `idconsulta` (`idconsulta`),
  ADD KEY `idmedicamento` (`idmedicamento`);

--
-- Indices de la tabla `tresponsable`
--
ALTER TABLE `tresponsable`
  ADD PRIMARY KEY (`idresponsable`),
  ADD KEY `idpaciente` (`idpaciente`);

--
-- Indices de la tabla `tsignosvitales`
--
ALTER TABLE `tsignosvitales`
  ADD PRIMARY KEY (`idsignovital`),
  ADD KEY `idconsulta` (`idconsulta`);

--
-- Indices de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbitacora`
--
ALTER TABLE `tbitacora`
  MODIFY `idbitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT de la tabla `tcita`
--
ALTER TABLE `tcita`
  MODIFY `idcita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `tconsulta`
--
ALTER TABLE `tconsulta`
  MODIFY `idconsulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `texamen`
--
ALTER TABLE `texamen`
  MODIFY `idexamen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `tinventario_medicamento`
--
ALTER TABLE `tinventario_medicamento`
  MODIFY `idreferencia_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tmedicamento`
--
ALTER TABLE `tmedicamento`
  MODIFY `idmedicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tpaciente`
--
ALTER TABLE `tpaciente`
  MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tpersonal`
--
ALTER TABLE `tpersonal`
  MODIFY `idpersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tproveedor`
--
ALTER TABLE `tproveedor`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `treceta`
--
ALTER TABLE `treceta`
  MODIFY `idreceta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tresponsable`
--
ALTER TABLE `tresponsable`
  MODIFY `idresponsable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tsignosvitales`
--
ALTER TABLE `tsignosvitales`
  MODIFY `idsignovital` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbitacora`
--
ALTER TABLE `tbitacora`
  ADD CONSTRAINT `tbitacora_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `tusuario` (`idusuario`);

--
-- Filtros para la tabla `tcita`
--
ALTER TABLE `tcita`
  ADD CONSTRAINT `tcita_ibfk_1` FOREIGN KEY (`idpaciente`) REFERENCES `tpaciente` (`idpaciente`);

--
-- Filtros para la tabla `tconsulta`
--
ALTER TABLE `tconsulta`
  ADD CONSTRAINT `tconsulta_ibfk_1` FOREIGN KEY (`idpaciente`) REFERENCES `tpaciente` (`idpaciente`);

--
-- Filtros para la tabla `texamen`
--
ALTER TABLE `texamen`
  ADD CONSTRAINT `texamen_ibfk_1` FOREIGN KEY (`idconsulta`) REFERENCES `tconsulta` (`idconsulta`);

--
-- Filtros para la tabla `tinventario_medicamento`
--
ALTER TABLE `tinventario_medicamento`
  ADD CONSTRAINT `tinventario_medicamento_ibfk_1` FOREIGN KEY (`idmedicamento`) REFERENCES `tmedicamento` (`idmedicamento`);

--
-- Filtros para la tabla `tresponsable`
--
ALTER TABLE `tresponsable`
  ADD CONSTRAINT `tresponsable_ibfk_1` FOREIGN KEY (`idpaciente`) REFERENCES `tpaciente` (`idpaciente`);

--
-- Filtros para la tabla `tsignosvitales`
--
ALTER TABLE `tsignosvitales`
  ADD CONSTRAINT `tsignosvitales_ibfk_1` FOREIGN KEY (`idconsulta`) REFERENCES `tconsulta` (`idconsulta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
