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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;

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
(47,"2020-01-09 19:14:00","Inicio de sesión","LOGIN",1);


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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tcita` VALUES (2,4,"","","2020-01-05 12:45:00",0),
(3,2,"","","2020-01-31 14:00:00",1),
(4,NULL,"EVA DE LOS ANGELES GUZMAN AYALA","7179-1291","2020-01-07 13:45:00",0),
(5,NULL,"DAVID FLORES GUZMAN","8197-2198","2020-01-07 12:00:00",0),
(6,1,"","","2014-01-07 12:00:00",1),
(9,1,"","","2020-01-07 15:30:00",0),
(10,1,"","","2020-01-08 12:00:00",0),
(11,NULL,"CRISANTO FLORES CORDOVA","7297-2978","2020-01-08 13:00:00",1),
(12,2,"","","2020-01-23 12:00:00",0),
(13,1,"","","2020-01-08 12:00:00",1),
(14,1,"","","2020-01-09 16:00:00",1),
(15,NULL,"DAVID","3732-7937","2020-01-09 12:00:00",1);


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `texamen`;

CREATE TABLE `texamen` (
  `idexamen` int(11) NOT NULL AUTO_INCREMENT,
  `ruta_imagen` varchar(100) NOT NULL,
  `idconsulta` int(11) NOT NULL,
  PRIMARY KEY (`idexamen`),
  KEY `idconsulta` (`idconsulta`),
  CONSTRAINT `texamen_ibfk_1` FOREIGN KEY (`idconsulta`) REFERENCES `tconsulta` (`idconsulta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tinventario_medicamento` VALUES (1,1,"2020-01-06","2020-03-31",50,3,"ESTANTE 1 ANALGESICOS",1),
(2,1,"2020-01-06","2020-01-06",50,3,"ESTANTE 1 ANALGESICOS",1);


DROP TABLE IF EXISTS `tmedicamento`;

CREATE TABLE `tmedicamento` (
  `idmedicamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_medicamento` varchar(50) NOT NULL,
  `presentacion_medicamento` varchar(50) NOT NULL,
  `via_admin_medicamento` varchar(50) NOT NULL,
  `concentracion_medicamento` varchar(50) NOT NULL,
  `stock_minimo_medicamento` int(11) NOT NULL,
  `unidad` varchar(3) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`idmedicamento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tmedicamento` VALUES (1,"ASPIRINA","pastilla","orales",150,5,"mg",1);


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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tpaciente` VALUES (1,"DF001","WILLIAN MARIAS","FLORES GUZMÁN","MASCULINO","1960-01-08","09089778-9","davidflores.guzman.dfg@gmail.net","7291-3748","6666-6666","colonia santa lucia providencia pasaje#3 casa#4",1),
(2,"FF002","FLOR DE MARIA","FLORES AYALA","FEMENINO","2008-08-05","","florflores.fg@gamil.com","7817-9297","","colonia santa lucia pasaje #2 casa#3",1),
(4,"DF003","JOSÉ DANIEL","CARCAMOS CORDOVAS","MASCULINO","1985-04-21","09182089-1","","7828-7287","8727-8287","",1),
(5,"HF004","HERMINA","FLORES GUZMAN","MASCULINO","1972-11-04","09808020-8","herminia.guzman@gmail.com","8727-8287","","colonia santa lucia casa#3",1),
(6,"CC005","CARLA SARAI","CARCAMO RODRIGUEZ","FEMENINO","1997-05-21","","","7929-2179","7929-2972","",1),
(7,"VC006","VICTOR ERNESTO","CACERES QUINTANILLA","MASCULINO","2000-04-21","","","","","",1),
(8,"JF007","JOSE ELIEZER","FLORES CACERES","MASCULINO","1994-05-21","00928080-3","","7297-2179","0092-1902","",1),
(9,"DC008","DANIEL JOSUE","CACERES PORTILLOS","MASCULINO","1997-05-21","09880182-0","danieporti@yahoo.es","9821-8921","7217-1279","",1),
(10,"AF009","ANDREA","FLORES CORDOVA","FEMENINO","1930-06-21","09812802-1","andrea@gmail.com","7727-2798","7997-3973","",1),
(11,"CC010","RENE ANTONIO","FRANCO DIAZ","MASCULINO","1995-04-21","09808108-2","carlanto@gmail.com","7261-8268","7912-8182","colonia santa lucia casa#3",1),
(12,"JF011","JOSE RODOLFO","FLORES","MASCULINO","1974-05-21","09812810-2","joserodo@gmail.com","","","",1),
(13,"RF12","RAFAEL ANTONIO","FLORES RAMIREZ","MASCULINO","1984-05-21","","","","","",1),
(14,"CA013","CONCEPCION DE MARIA","AYALAG","FEMENINO","1925-05-21","","","","","",1),
(15,"DP014","DANIEL ALEXANDER","PEREZ MARTINEZ","MASCULINO","1999-05-21","09879797-9","danieperez@gmail.com","","","",1),
(16,"JM015","JOSE ALEXANDER","MUÑOZ","MASCULINO","1990-11-04","","","","","",1),
(17,"EV016","EMILIA FRANCO","VARGAS DIAZ","FEMENINO","1969-05-21","09808038-0","emilivarga@gmail.com","7291-9712","7977-9971","colonia santa elena casa#3",1),
(18,"RM017","ROBERTO ANTONIO","MONTOYA ALVARADO","MASCULINO","1980-05-21","09808088-3","roberantronix@gmail.com","7397-2379","7397-2379","colonia agua caliente pasaje #3 casa#3",1),
(19,"SR018","SONIA ABIGAIL","RODRIGUÉZ CORDOVA","MASCULINO","1955-05-21","09830280-3","soniaabi@hotmail.com","9797-2972","9779-9729","",1),
(20,"JQ019","JOSE CARLOS","QUINTANILLA AREVALOS","MASCULINO","2013-11-12","","","7792-7279","7297-7919","",1),
(21,"DF020","DAVID","FLORES GUZMÁN","MASCULINO","1996-11-12","09808080-8","davidflores.guz","","","",1),
(22,"DF021","JOSE CARLOS","CORDOVA GONZALÉZ","MASCULINO","1994-11-19","09880884-3","davidflores.guzman.dfg@gmail.com","7797-9397","7379-7397","",1),
(23,"EG022","EVA DE LOS ANGELES","GUZMAN AYALA","FEMENINO","1975-05-12","08120801-8","davidflores.guzman.dfg@hotmail.net","8737-9379","7971-9727","colonia espiga de oro",1),
(24,"CF023","DAVID JOVEL","FLORES GUZMAN","MASCULINO","2009-05-21","","davidflores.guzman.dfg@hotmail.com","7179-1792","7972-1972","",1),
(25,"JC024","JOSE DANIEL","CHAVEZ","MASCULINO","1995-01-01","","","7921-9721","9021-9802","",1),
(26,"JC025","JOSE ALEXANDER","CORLETO CHAVEZ","MASCULINO","1995-01-07","","","9179-1279","9721-7921","",1);


DROP TABLE IF EXISTS `tproveedor`;

CREATE TABLE `tproveedor` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `contacto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estadop` int(11) NOT NULL,
  PRIMARY KEY (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tproveedor` VALUES (1,"LABORATORIO LOPEZ","7666-4897","",0),
(2,"LABORATORIO GAMNA","4645-4645","",0),
(3,"BAYER","7979-1279","GERSON MIGUEL ANTONIO PALACIOS",0);


DROP TABLE IF EXISTS `treceta`;

CREATE TABLE `treceta` (
  `idreceta` int(11) NOT NULL AUTO_INCREMENT,
  `idmedicamento` int(11) NOT NULL,
  `nombre_medicamento` varchar(50) NOT NULL,
  `cantidad_entregada` int(11) NOT NULL,
  `cantidad_indicada` int(11) NOT NULL,
  `indicaciones` varchar(200) NOT NULL,
  `idconsulta` int(11) NOT NULL,
  PRIMARY KEY (`idreceta`),
  KEY `idconsulta` (`idconsulta`),
  KEY `idmedicamento` (`idmedicamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tresponsable` VALUES (1,"ANDREA","FLORES CARCAMO","HIJO","89898989-8","2222-2222","1111-1111",1),
(2,"HERMINIA","FLORES AYALA","MADRE","","7862-8628","7927-9217",2),
(3,"EVA","GUZMAN AYALA","MADRE",92929,"2732-2345","8782-222",4),
(4,"asd","oo","ABUELO","","","",5),
(5,"","","","","","",6),
(6,"DANIEL","QUINTANILLA","ABUELO","","7297-2972","",7),
(7,"CRISANTOS","FLORES","PADRE","","9721-9721","8797-2927",8),
(8,"FRANCISCA CARMELA","CACERES PORTILLO","MADRE","","7297-9129","8918-8121",9),
(9,"JOSÉ RODOLFO","FLORES CASTILLO","ABUELA","","","",10),
(10,"","","","","","",11),
(11,"ANDREA","FLORES CORDOVA","MADRE","","","",12),
(12,"","","","","","",13),
(13,"HERMINIA","FLORES GUZMAN","ABUELA","09802801-8","8719-7297","8218-2917",14),
(14,"SANDRA EMILIE","CARCAMO FERNADÉZ","MADRE","09808098-0","7262-7626","8727-8282",15),
(15,"","","","","","",16),
(16,"MIRNA ELIZABETH","FRANCO CORDOVA","HIJO","09801208-2","7979-9737","7937-2372",17),
(17,"","","","","","",18),
(18,"EVA DE LOS ANGELES","GUZMAN","MADRE","09880238-2","7397-3973","7939-3973",19),
(19,"DANIEL","QUINTANILLA AREVALO","PADRE","01298081-2","7972-9712","7917-9217",20),
(20,"","","","","","",21),
(21,"","","","","","",22),
(22,"DANIEL ALEXANDER","CHAVEZ","MADRE","09828018-2","7379-3973","7939-7397",23),
(23,"Eva de Los angeles","Guzman Ayala","MADRE","08181208-1","7971-9898","7197-9712",24),
(24,"","","","","","",25),
(25,"","","","","","",26);


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tusuario` VALUES (1,"ANALUISAVELAS","TGRmT2E1Y0xWblV5TUgwOXpnZ2VDQT09","davidflores.guzman.dfg@gmail.es","admin","",1,"2019-11-29","DR.ANA LUISA VELAZQUEZ"),
(2,"SECRETARIA1","TGRmT2E1Y0xWblV5TUgwOXpnZ2VDQT09","carlabeatriz@gmail.com","secret","",1,"0000-00-00","MARIA HERMINIA CHAVEZ CORNEJO"),
(12,"DRDAVID","TGZYa08zQzBxNmw2YjJRN0FTeVUyZz09","davidflores.guzman.dfg@gmail.com","admin","",1,"2020-01-08","DR DAVID FLORES GUZMAN");


SET foreign_key_checks = 1;
