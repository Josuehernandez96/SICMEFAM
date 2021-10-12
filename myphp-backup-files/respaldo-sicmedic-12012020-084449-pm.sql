CREATE DATABASE IF NOT EXISTS `sicmedic`;

USE `sicmedic`;

SET foreign_key_checks = 0;

DROP TABLE IF EXISTS `tbitacora`;

CREATE TABLE `tbitacora` (
  `idbitacora` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_hora_accion` datetime NOT NULL,
  `accion_bitacora` varchar(200) NOT NULL,
  `modulo_bitacora` varchar(20) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idbitacora`),
  KEY `idusuario` (`idusuario`),
  CONSTRAINT `tbitacora_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `tusuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbitacora` VALUES (1,"2020-01-05 10:47:00","Cierre de sesión","LOGIN",1),
(2,"2020-01-05 10:50:00","Inicio de sesión","LOGIN",2),
(3,"2020-01-05 11:02:00","Cierre de sesión","LOGIN",2),
(4,"2020-01-05 11:02:00","Inicio de sesión","LOGIN",2),
(5,"2020-01-05 11:12:00","Cierre de sesión","LOGIN",2),
(6,"2020-01-05 11:14:00","Inicio de sesión","LOGIN",1),
(7,"2020-01-05 18:11:00","Inicio de sesión","LOGIN",1),
(8,"2020-01-05 18:28:00","Cierre de sesión","LOGIN",1),
(9,"2020-01-05 18:29:00","Inicio de sesión","LOGIN",1),
(10,"2020-01-05 19:24:00","Cierre de sesión","LOGIN",1),
(11,"2020-01-05 19:25:00","Inicio de sesión","LOGIN",2),
(12,"2020-01-05 19:25:00","Cierre de sesión","LOGIN",2),
(13,"2020-01-05 19:26:00","Inicio de sesión","LOGIN",2),
(14,"2020-01-06 08:36:00","Inicio de sesión","LOGIN",1),
(15,"2020-01-07 08:52:00","Inicio de sesión","LOGIN",1),
(16,"2020-01-07 08:54:00","Cierre de sesión","LOGIN",1),
(17,"2020-01-07 08:54:00","Inicio de sesión","LOGIN",2),
(18,"2020-01-07 09:05:00","Cierre de sesión","LOGIN",2),
(19,"2020-01-07 09:05:00","Inicio de sesión","LOGIN",1),
(20,"2020-01-07 11:41:00","Cierre de sesión","LOGIN",1),
(21,"2020-01-07 11:41:00","Inicio de sesión","LOGIN",2),
(22,"2020-01-07 11:43:00","Inicio de sesión","LOGIN",2),
(23,"2020-01-07 11:46:00","Inicio de sesión","LOGIN",2),
(24,"2020-01-07 11:47:00","Cierre de sesión","LOGIN",2),
(25,"2020-01-07 11:47:00","Inicio de sesión","LOGIN",1),
(26,"2020-01-07 11:48:00","Cierre de sesión","LOGIN",1),
(27,"2020-01-07 11:48:00","Inicio de sesión","LOGIN",2),
(28,"2020-01-07 11:48:00","Cierre de sesión","LOGIN",2),
(29,"2020-01-07 14:53:00","Inicio de sesión","LOGIN",1),
(30,"2020-01-08 09:04:00","Inicio de sesión","LOGIN",1),
(31,"2020-01-08 09:10:00","Cierre de sesión","LOGIN",1),
(32,"2020-01-08 09:10:00","Inicio de sesión","LOGIN",2),
(33,"2020-01-08 09:10:00","Cierre de sesión","LOGIN",2),
(34,"2020-01-08 09:10:00","Inicio de sesión","LOGIN",1),
(35,"2020-01-08 09:12:00","Cierre de sesión","LOGIN",1),
(36,"2020-01-08 09:12:00","Inicio de sesión","LOGIN",1),
(37,"2020-01-08 09:13:00","Cierre de sesión","LOGIN",1),
(38,"2020-01-08 09:37:00","Inicio de sesión","LOGIN",1),
(39,"2020-01-08 09:45:00","Cierre de sesión","LOGIN",1),
(40,"2020-01-08 09:46:00","Inicio de sesión","LOGIN",1),
(41,"2020-01-08 10:05:00","Cierre de sesión","LOGIN",1),
(42,"2020-01-08 10:05:00","Inicio de sesión","LOGIN",1),
(43,"2020-01-08 17:42:00","Inicio de sesión","LOGIN",1),
(44,"2020-01-08 18:58:00","Registro nuevo paciente con ExpedienteJC024","PACIENTE",1),
(45,"2020-01-08 18:59:00","Registro nuevo paciente con ExpedienteJC025","PACIENTE",1),
(46,"2020-01-09 08:43:00","Inicio de sesión","LOGIN",1),
(47,"2020-01-09 19:14:00","Inicio de sesión","LOGIN",1),
(48,"2020-01-09 19:36:00","Registro nuevo paciente con ExpedienteJS026","PACIENTE",1),
(49,"2020-01-09 19:40:00","Registro nuevo paciente con ExpedienteAF027","PACIENTE",1),
(50,"2020-01-09 19:42:00","Registro nuevo paciente con ExpedienteJC028","PACIENTE",1),
(51,"2020-01-09 20:01:00","Registro nuevo paciente con ExpedienteDF029","PACIENTE",1),
(52,"2020-01-09 20:03:00","Registro nuevo paciente con ExpedienteDF030","PACIENTE",1),
(53,"2020-01-09 20:14:00","Registro nuevo paciente con ExpedienteDF031","PACIENTE",1),
(54,"2020-01-10 09:17:00","Inicio de sesión","LOGIN",1),
(55,"2020-01-10 09:18:00","Cierre de sesión","LOGIN",1),
(56,"2020-01-10 09:18:00","Inicio de sesión","LOGIN",2),
(57,"2020-01-10 09:20:00","Cierre de sesión","LOGIN",2),
(58,"2020-01-10 09:20:00","Inicio de sesión","LOGIN",1),
(59,"2020-01-10 10:45:00","Registro nuevo paciente con ExpedienteDJ032","PACIENTE",1),
(60,"2020-01-10 10:47:00","Registro nuevo paciente con ExpedienteDJ033","PACIENTE",1),
(61,"2020-01-11 16:21:00","Inicio de sesión","LOGIN",1),
(62,"2020-01-12 10:02:00","Inicio de sesión","LOGIN",1),
(63,"2020-01-12 10:34:00","Registro nuevo paciente con ExpedienteAF01","PACIENTE",1),
(64,"2020-01-12 10:37:00","Registro nuevo paciente con ExpedienteFG02","PACIENTE",1),
(65,"2020-01-12 10:50:00","Registro nuevo paciente con ExpedienteDF03","PACIENTE",1),
(66,"2020-01-12 10:53:00","Registro nuevo paciente con ExpedienteJF04","PACIENTE",1),
(67,"2020-01-12 13:28:00","Inicio de sesión","LOGIN",1),
(68,"2020-01-12 13:28:00","Cierre de sesión","LOGIN",1),
(69,"2020-01-12 13:29:00","Inicio de sesión","LOGIN",2),
(70,"2020-01-12 13:29:00","Cierre de sesión","LOGIN",2),
(71,"2020-01-12 13:29:00","Inicio de sesión","LOGIN",1),
(72,"2020-01-12 16:52:00","Inicio de sesión","LOGIN",2),
(73,"2020-01-12 16:52:00","Cierre de sesión","LOGIN",2),
(74,"2020-01-12 16:52:00","Inicio de sesión","LOGIN",1);


DROP TABLE IF EXISTS `tcita`;

CREATE TABLE `tcita` (
  `idcita` int(11) NOT NULL AUTO_INCREMENT,
  `idpaciente` int(11) DEFAULT NULL,
  `nombre_citado` varchar(50) NOT NULL,
  `telefono_citado` varchar(10) NOT NULL,
  `fecha_hora_cita` datetime NOT NULL,
  `estado_cita` int(11) NOT NULL,
  PRIMARY KEY (`idcita`),
  KEY `idpaciente` (`idpaciente`),
  CONSTRAINT `tcita_ibfk_1` FOREIGN KEY (`idpaciente`) REFERENCES `tpaciente` (`idpaciente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tcita` VALUES (1,1,"","","2020-01-20 13:00:00",1),
(2,2,"","","2020-01-20 14:00:00",1),
(3,3,"","","2020-01-21 14:30:00",1);


DROP TABLE IF EXISTS `tconsulta`;

CREATE TABLE `tconsulta` (
  `idconsulta` int(11) NOT NULL AUTO_INCREMENT,
  `idpaciente` int(11) NOT NULL,
  `fecha_hora_consulta` datetime NOT NULL,
  `razon_consulta` text NOT NULL,
  `antecedentes_consulta` text NOT NULL,
  `diagnostico_consutla` text NOT NULL,
  `observaciones_consulta` text NOT NULL,
  `ordenexamen_consulta` text NOT NULL,
  PRIMARY KEY (`idconsulta`),
  KEY `idpaciente` (`idpaciente`),
  CONSTRAINT `tconsulta_ibfk_1` FOREIGN KEY (`idpaciente`) REFERENCES `tpaciente` (`idpaciente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tconsulta` VALUES (1,1,"2020-01-12 19:41:05","MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM","AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA","DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD","OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO","OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO"),
(2,1,"2020-01-12 19:42:10","MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM","AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA","DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD","OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO","OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO"),
(3,1,"2020-01-12 19:44:09","MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM","AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA","DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD","OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO","OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO"),
(4,1,"2020-01-12 19:45:49","MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM","AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA","DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD","OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO","OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO"),
(5,1,"2020-01-12 19:46:46","MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM","AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA","DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD","OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO","OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO"),
(6,1,"2020-01-12 19:47:18","MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM","AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA","DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD","OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO","OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO");


DROP TABLE IF EXISTS `texamen`;

CREATE TABLE `texamen` (
  `idexamen` int(11) NOT NULL AUTO_INCREMENT,
  `ruta_imagen` varchar(100) NOT NULL,
  `idconsulta` int(11) NOT NULL,
  PRIMARY KEY (`idexamen`),
  KEY `idconsulta` (`idconsulta`),
  CONSTRAINT `texamen_ibfk_1` FOREIGN KEY (`idconsulta`) REFERENCES `tconsulta` (`idconsulta`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO `texamen` VALUES (1,"expediente/AF01/examen-medico-1-638.jpg",1),
(2,"expediente/AF01/examen-medico-1-638.jpg",2),
(3,"expediente/AF01/examen-medico-1-638.jpg",3),
(4,"expediente/AF01/examen-medico-1-638.jpg",4),
(5,"expediente/AF01/examen-medico-1-638.jpg",5),
(6,"expediente/AF01/examen-medico-1-638.jpg",6);


DROP TABLE IF EXISTS `tinventario_medicamento`;

CREATE TABLE `tinventario_medicamento` (
  `idreferencia_medicamento` int(11) NOT NULL AUTO_INCREMENT,
  `idmedicamento` int(11) NOT NULL,
  `fecha_ingreso_medicamento` date NOT NULL,
  `fecha_vencim_medicamento` date NOT NULL,
  `cantidad_medicamento` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`idreferencia_medicamento`),
  KEY `idproveedor` (`idproveedor`),
  KEY `idmedicamento` (`idmedicamento`),
  CONSTRAINT `tinventario_medicamento_ibfk_1` FOREIGN KEY (`idmedicamento`) REFERENCES `tmedicamento` (`idmedicamento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tinventario_medicamento` VALUES (1,1,"2020-01-06","2020-03-31",50,3,"ESTANTE 1 ANALGESICOS",1),
(2,1,"2020-01-06","2020-01-06",50,3,"ESTANTE 1 ANALGESICOS",1),
(3,2,"2020-01-11","2021-02-03",50,4,"ESTANTE 3 ANTIDEPRESIVOS",1);


DROP TABLE IF EXISTS `tmedicamento`;

CREATE TABLE `tmedicamento` (
  `idmedicamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_medicamento` varchar(50) NOT NULL,
  `presentacion_medicamento` varchar(50) NOT NULL,
  `via_admin_medicamento` varchar(50) NOT NULL,
  `concentracion_medicamento` varchar(50) NOT NULL,
  `stock_minimo_medicamento` int(11) NOT NULL,
  `unidad` varchar(3) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`idmedicamento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tmedicamento` VALUES (1,"ASPIRINA","pastilla","orales",150,5,"mg","Analgésicos",1),
(2,"PARACETAMO","capsula","orales",500,5,"mg","Antidepresivo",1);


DROP TABLE IF EXISTS `tpaciente`;

CREATE TABLE `tpaciente` (
  `idpaciente` int(11) NOT NULL AUTO_INCREMENT,
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
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`idpaciente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tpaciente` VALUES (1,"AF01","Andrea","Flores Cordova","FEMENINO","1930-05-05","","","7997-9727","2393-4108","colonia santa lucia casa#3 colonia espiga de oro pasaje#3",1),
(2,"FG02","Francisco antonio","Guzmán Ayala","MASCULINO","1970-08-21","09292092-0","franciscoguzayala@gmail.com","7297-2972","2394-8292","colonia santa lucia casa#3 pasaje#2",1),
(3,"DF03","David","Flores Guzmán","MASCULINO","1995-01-08","09282820-8","davidflores.guzman.dfg@gmail.com","7291-3748","7614-3568","colonia santa lucia casa#3 pasaje#2",1),
(4,"JF04","Jasmin Beatriz","Flores Guzmán","MASCULINO","1996-01-02","09880988-1","jasminbeatriz@gmail.com","7291-3748","7392-0202","colonias¿ santa lucia casa#3 pasaje#2",1);


DROP TABLE IF EXISTS `tproveedor`;

CREATE TABLE `tproveedor` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `contacto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estadop` int(11) NOT NULL,
  PRIMARY KEY (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tproveedor` VALUES (1,"LABORATORIO LOPEZ","7666-4897","",0),
(2,"LABORATORIO GAMNA","4645-4645","",0),
(3,"BAYER","7979-1279","GERSON MIGUEL ANTONIO PALACIOS",0),
(4,"LACOSTE","1234-1231","DAVID FLORES",1);


DROP TABLE IF EXISTS `treceta`;

CREATE TABLE `treceta` (
  `idreceta` int(11) NOT NULL AUTO_INCREMENT,
  `idmedicamento` int(11) DEFAULT NULL,
  `nombre_medicamento` varchar(50) NOT NULL,
  `cantidad_entregada` int(11) NOT NULL,
  `cantidad_indicada` int(11) NOT NULL,
  `indicaciones` varchar(200) NOT NULL,
  `idconsulta` int(11) NOT NULL,
  PRIMARY KEY (`idreceta`),
  KEY `idconsulta` (`idconsulta`),
  KEY `idmedicamento` (`idmedicamento`),
  CONSTRAINT `treceta_ibfk_1` FOREIGN KEY (`idconsulta`) REFERENCES `tconsulta` (`idconsulta`),
  CONSTRAINT `treceta_ibfk_2` FOREIGN KEY (`idmedicamento`) REFERENCES `tinventario_medicamento` (`idreferencia_medicamento`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO `treceta` VALUES (4,1,"",1,0,"2 PASTILLAS cada 8 HORA durante 30 DIAS",6),
(5,NULL,"AMOXIXILINA",0,1,"2 CAPSULAD cada 8 HORAS durante 30 DIAS",6);


DROP TABLE IF EXISTS `tresponsable`;

CREATE TABLE `tresponsable` (
  `idresponsable` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_responsable` varchar(40) NOT NULL,
  `apellido_responsable` varchar(40) NOT NULL,
  `relacion_responsable` varchar(20) NOT NULL,
  `dui_responsable` varchar(10) NOT NULL,
  `telefonoP_responsable` varchar(9) NOT NULL,
  `telefonoS_responsable` varchar(9) NOT NULL,
  `idpaciente` int(11) NOT NULL,
  PRIMARY KEY (`idresponsable`),
  KEY `idpaciente` (`idpaciente`),
  CONSTRAINT `tresponsable_ibfk_1` FOREIGN KEY (`idpaciente`) REFERENCES `tpaciente` (`idpaciente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tresponsable` VALUES (1,"David","Flores Castillos","HIJO","09808080-9","7272-7297","7979-2792",1),
(2,"Herminia","Flores Ayala","HERMANA","08988989-9","7927-9279","7279-7297",2),
(3,"Eva de los Angeles","Guzmán Ayala","MADRE","","7205-3822","7927-9279",3),
(4,"David","Flores Guzman","HERMANO","","7279-2792","7297-2988",4);


DROP TABLE IF EXISTS `tsignosvitales`;

CREATE TABLE `tsignosvitales` (
  `idsignovital` int(11) NOT NULL AUTO_INCREMENT,
  `presion` varchar(6) NOT NULL,
  `frecuencia` varchar(5) NOT NULL,
  `temperatura` varchar(4) NOT NULL,
  `peso` int(11) NOT NULL,
  `estatura` int(11) NOT NULL,
  `idconsulta` int(11) NOT NULL,
  PRIMARY KEY (`idsignovital`),
  KEY `idconsulta` (`idconsulta`),
  CONSTRAINT `tsignosvitales_ibfk_1` FOREIGN KEY (`idconsulta`) REFERENCES `tconsulta` (`idconsulta`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tsignosvitales` VALUES (1,"120/10",80,39,186,188,1),
(2,"120/10",80,39,186,188,2),
(3,"120/10",80,39,186,188,3),
(4,"120/10",80,39,186,188,4),
(5,"120/10",80,39,186,188,5),
(6,"120/10",80,39,186,188,6);


DROP TABLE IF EXISTS `tusuario`;

CREATE TABLE `tusuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) NOT NULL,
  `contrasena` text NOT NULL,
  `correo` varchar(50) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `codigo_recuperacion` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fechacreacion` date NOT NULL,
  `nombrep` varchar(50) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tusuario` VALUES (1,"ANALUISAVELASQ","TGRmT2E1Y0xWblV5TUgwOXpnZ2VDQT09","davidflores.guzman.dfg@gmail.es","admin","",1,"2019-11-29","DR.ANA LUISA VELAZQUEZ"),
(2,"SECRETARIA1","TGRmT2E1Y0xWblV5TUgwOXpnZ2VDQT09","carlabeatriz@gmail.com","secret","",1,"0000-00-00","MARIA HERMINIA CHAVEZ CORNEJO"),
(12,"DRDAVID","TGZYa08zQzBxNmw2YjJRN0FTeVUyZz09","davidflores.guzman.dfg@gmail.com","admin","",1,"2020-01-08","DR DAVID FLORES GUZMAN"),
(13,"MIGUEL123","TGZYa08zQzBxNmw2YjJRN0FTeVUyZz09","miguel@gmail.com","admin","",1,"2020-01-12","MIGUEL ANGEL ANTONIO BELTRAN");


SET foreign_key_checks = 1;
