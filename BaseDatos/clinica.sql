-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2019 a las 04:01:58
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_bitacora`
--

CREATE TABLE `t_bitacora` (
  `idbitacora` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `accion` varchar(50) NOT NULL,
  `nombre_tabla` varchar(20) NOT NULL DEFAULT '',
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_bitacora`
--

INSERT INTO `t_bitacora` (`idbitacora`, `fecha_registro`, `accion`, `nombre_tabla`, `id_usuario`) VALUES
(1, '0000-00-00 00:00:00', '', '', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_catalogo_medicamentos`
--

CREATE TABLE `t_catalogo_medicamentos` (
  `idcatalogo_medicamentos` int(11) NOT NULL,
  `nombre_medicamento` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_catalogo_medicamentos`
--

INSERT INTO `t_catalogo_medicamentos` (`idcatalogo_medicamentos`, `nombre_medicamento`, `descripcion`) VALUES
(1, 'alerfin', 'para la elergia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cita`
--

CREATE TABLE `t_cita` (
  `idcitas` int(11) NOT NULL,
  `idpaciente` int(11) DEFAULT NULL,
  `asunto_cita` varchar(100) NOT NULL,
  `fecha_cita` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_cita`
--

INSERT INTO `t_cita` (`idcitas`, `idpaciente`, `asunto_cita`, `fecha_cita`) VALUES
(10, 1, '0', '2019-08-28 11:48:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_examenes_medicos`
--

CREATE TABLE `t_examenes_medicos` (
  `idexamenes_medicos` int(11) NOT NULL,
  `examen` text NOT NULL,
  `id_historial_clinico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_examenes_medicos`
--

INSERT INTO `t_examenes_medicos` (`idexamenes_medicos`, `examen`, `id_historial_clinico`) VALUES
(2, 'imagen en 64 bit', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_historial_clinico`
--

CREATE TABLE `t_historial_clinico` (
  `idhistorial_medico` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `observacion` varchar(1000) DEFAULT NULL,
  `antecedentes` varchar(1000) DEFAULT '',
  `diagnostico` varchar(1000) NOT NULL,
  `ordenesexamen` varchar(200) NOT NULL,
  `fecha_registro_expediente` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_historial_clinico`
--

INSERT INTO `t_historial_clinico` (`idhistorial_medico`, `id_paciente`, `codigo`, `observacion`, `antecedentes`, `diagnostico`, `ordenesexamen`, `fecha_registro_expediente`) VALUES
(1, 1, '', 'se encuentra  bien', NULL, '', '', '2019-08-07'),
(2, 2, '', 'mal', NULL, '', '', '2019-08-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_inventario_medicamentos`
--

CREATE TABLE `t_inventario_medicamentos` (
  `idmedicamentos_inventario` int(11) NOT NULL,
  `nombre_medicamento` varchar(45) NOT NULL,
  `presentacion` varchar(20) NOT NULL,
  `contenido` varchar(20) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `ubicacion` varchar(200) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `stock` int(10) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_inventario_medicamentos`
--

INSERT INTO `t_inventario_medicamentos` (`idmedicamentos_inventario`, `nombre_medicamento`, `presentacion`, `contenido`, `cantidad`, `ubicacion`, `fecha_ingreso`, `stock`, `fecha_vencimiento`, `estado`) VALUES
(1, 'acetaminofen', '', '', 10, 'estante 1', '2019-08-11', 0, '2019-12-01', 0),
(2, 'dofofin', '', '', 20, 'estante 3', '2019-08-16', 0, '2019-09-07', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_paciente`
--

CREATE TABLE `t_paciente` (
  `idpaciente` int(11) NOT NULL,
  `dui` varchar(10) DEFAULT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `sexo` char(1) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `id_responsable` int(11) DEFAULT NULL,
  `correo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_paciente`
--

INSERT INTO `t_paciente` (`idpaciente`, `dui`, `nombre`, `apellido`, `sexo`, `fecha_nacimiento`, `direccion`, `telefono`, `id_responsable`, `correo`) VALUES
(1, '05135943-0', 'emerson', 'palacios', '', '1995-02-27', 'apastepeque', '7588-1665', NULL, NULL),
(2, '12121212-1', 'josue', 'maravilla', '', '2019-08-15', 'san vicente', '1254-5423', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_receta_medica`
--

CREATE TABLE `t_receta_medica` (
  `idmedicamentos_paciente` int(11) NOT NULL,
  `nombre_medicamento` varchar(45) NOT NULL,
  `dosis` varchar(100) NOT NULL,
  `id_historial` int(11) NOT NULL,
  `id_inve_medicamentos` int(11) NOT NULL,
  `id_catal_medicamentos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_receta_medica`
--

INSERT INTO `t_receta_medica` (`idmedicamentos_paciente`, `nombre_medicamento`, `dosis`, `id_historial`, `id_inve_medicamentos`, `id_catal_medicamentos`) VALUES
(1, 'acetaminofen', '10 pastillas cada 8 hotas Durante 30 dias', 1, 1, 1),
(2, 'dolofin', '220 cada 8 horas', 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_recuperacion_cuenta`
--

CREATE TABLE `t_recuperacion_cuenta` (
  `idrecuperar_cuenta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_recuperacion` datetime NOT NULL,
  `fecha_envio_codigo` datetime NOT NULL,
  `codigo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_recuperacion_cuenta`
--

INSERT INTO `t_recuperacion_cuenta` (`idrecuperar_cuenta`, `id_usuario`, `fecha_recuperacion`, `fecha_envio_codigo`, `codigo`) VALUES
(12, 11, '2019-08-12 18:54:39', '2019-08-12 19:01:18', 'asasas1212');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_responsable`
--

CREATE TABLE `t_responsable` (
  `idresponsable` int(11) NOT NULL,
  `dui` varchar(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `Tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_responsable`
--

INSERT INTO `t_responsable` (`idresponsable`, `dui`, `nombre`, `apellido`, `telefono`, `Tipo`) VALUES
(1, '05135943-0', 'emerson', 'palacios', '7588-1665', 0),
(2, '12121212-1', 'josue', 'maravilla', '1254-5423', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_signos_vitales`
--

CREATE TABLE `t_signos_vitales` (
  `idsignos_vitales` int(11) NOT NULL,
  `estatura` varchar(30) NOT NULL,
  `peso` varchar(30) NOT NULL,
  `temperatura` varchar(30) DEFAULT NULL,
  `presion_arterial` varchar(45) DEFAULT NULL,
  `id_historial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_signos_vitales`
--

INSERT INTO `t_signos_vitales` (`idsignos_vitales`, `estatura`, `peso`, `temperatura`, `presion_arterial`, `id_historial`) VALUES
(1, '1.62 cm', '170 libtas', '38 grados', '100/120', 1),
(2, '170.cm', '190 libras', '38 grados', '90/100', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuario`
--

CREATE TABLE `t_usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre_usuario` varchar(45) NOT NULL,
  `contrasenia` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `privilegio` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_usuario`
--

INSERT INTO `t_usuario` (`idusuario`, `nombre_usuario`, `contrasenia`, `correo`, `tipo_usuario`, `privilegio`) VALUES
(11, 'pm13043', 'jajaja', 'palacios@gmail.com', 1, 0),
(22, 'po13044', 'jojojo', 'maravilla@gmail.com', 2, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_bitacora`
--
ALTER TABLE `t_bitacora`
  ADD PRIMARY KEY (`idbitacora`),
  ADD KEY `idUsuario` (`id_usuario`);

--
-- Indices de la tabla `t_catalogo_medicamentos`
--
ALTER TABLE `t_catalogo_medicamentos`
  ADD PRIMARY KEY (`idcatalogo_medicamentos`);

--
-- Indices de la tabla `t_cita`
--
ALTER TABLE `t_cita`
  ADD PRIMARY KEY (`idcitas`),
  ADD KEY `fk_cita_paciente` (`idpaciente`);

--
-- Indices de la tabla `t_examenes_medicos`
--
ALTER TABLE `t_examenes_medicos`
  ADD PRIMARY KEY (`idexamenes_medicos`),
  ADD KEY `fk_exam_histo_clin` (`id_historial_clinico`);

--
-- Indices de la tabla `t_historial_clinico`
--
ALTER TABLE `t_historial_clinico`
  ADD PRIMARY KEY (`idhistorial_medico`),
  ADD KEY `fk_historial_paciente` (`id_paciente`) USING BTREE;

--
-- Indices de la tabla `t_inventario_medicamentos`
--
ALTER TABLE `t_inventario_medicamentos`
  ADD PRIMARY KEY (`idmedicamentos_inventario`);

--
-- Indices de la tabla `t_paciente`
--
ALTER TABLE `t_paciente`
  ADD PRIMARY KEY (`idpaciente`),
  ADD KEY `fk_paciente_responsable` (`id_responsable`);

--
-- Indices de la tabla `t_receta_medica`
--
ALTER TABLE `t_receta_medica`
  ADD PRIMARY KEY (`idmedicamentos_paciente`),
  ADD KEY `fk_medica_historial` (`id_historial`),
  ADD KEY `fk_receta_inven_medicamentos` (`id_inve_medicamentos`),
  ADD KEY `fk_receta_catal_medicamentos` (`id_catal_medicamentos`);

--
-- Indices de la tabla `t_recuperacion_cuenta`
--
ALTER TABLE `t_recuperacion_cuenta`
  ADD PRIMARY KEY (`idrecuperar_cuenta`),
  ADD KEY `IdUsuario` (`id_usuario`);

--
-- Indices de la tabla `t_responsable`
--
ALTER TABLE `t_responsable`
  ADD PRIMARY KEY (`idresponsable`);

--
-- Indices de la tabla `t_signos_vitales`
--
ALTER TABLE `t_signos_vitales`
  ADD PRIMARY KEY (`idsignos_vitales`),
  ADD KEY `fk_sv_historial` (`id_historial`);

--
-- Indices de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_ususrio_tipousuario` (`tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_bitacora`
--
ALTER TABLE `t_bitacora`
  MODIFY `idbitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `t_recuperacion_cuenta`
--
ALTER TABLE `t_recuperacion_cuenta`
  MODIFY `idrecuperar_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_bitacora`
--
ALTER TABLE `t_bitacora`
  ADD CONSTRAINT `idUsuario` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuario` (`idusuario`);

--
-- Filtros para la tabla `t_cita`
--
ALTER TABLE `t_cita`
  ADD CONSTRAINT `fk_cita_paciente` FOREIGN KEY (`idpaciente`) REFERENCES `t_paciente` (`idpaciente`);

--
-- Filtros para la tabla `t_examenes_medicos`
--
ALTER TABLE `t_examenes_medicos`
  ADD CONSTRAINT `fk_exam_histo_clin` FOREIGN KEY (`id_historial_clinico`) REFERENCES `t_historial_clinico` (`idhistorial_medico`);

--
-- Filtros para la tabla `t_historial_clinico`
--
ALTER TABLE `t_historial_clinico`
  ADD CONSTRAINT `fk_histo_medico_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `t_paciente` (`idpaciente`);

--
-- Filtros para la tabla `t_paciente`
--
ALTER TABLE `t_paciente`
  ADD CONSTRAINT `fk_paciente_responsable` FOREIGN KEY (`id_responsable`) REFERENCES `t_responsable` (`idresponsable`);

--
-- Filtros para la tabla `t_receta_medica`
--
ALTER TABLE `t_receta_medica`
  ADD CONSTRAINT `fk_receta_catal_medicamentos` FOREIGN KEY (`id_catal_medicamentos`) REFERENCES `t_catalogo_medicamentos` (`idcatalogo_medicamentos`),
  ADD CONSTRAINT `fk_receta_inven_medicamentos` FOREIGN KEY (`id_inve_medicamentos`) REFERENCES `t_inventario_medicamentos` (`idmedicamentos_inventario`),
  ADD CONSTRAINT `t_receta_medica_ibfk_1` FOREIGN KEY (`id_historial`) REFERENCES `t_historial_clinico` (`idhistorial_medico`);

--
-- Filtros para la tabla `t_recuperacion_cuenta`
--
ALTER TABLE `t_recuperacion_cuenta`
  ADD CONSTRAINT `t_recuperacion_cuenta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuario` (`idusuario`);

--
-- Filtros para la tabla `t_signos_vitales`
--
ALTER TABLE `t_signos_vitales`
  ADD CONSTRAINT `fk_sv_historial` FOREIGN KEY (`id_historial`) REFERENCES `t_historial_clinico` (`idhistorial_medico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
