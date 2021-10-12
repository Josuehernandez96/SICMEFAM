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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbitacora` VALUES (1,"2020-01-14 16:48:36","Inicio de sesión","LOGIN",1),
(2,"2020-01-14 16:48:00","Cierre de sesión","LOGIN",1),
(3,"2020-01-14 16:49:48","Inicio de sesión","LOGIN",1),
(4,"2020-01-14 16:51:22","Registro nuevo paciente con Expediente DF06","PACIENTE",1),
(5,"2020-01-14 16:57:37","Modifico datos al paciente David Flores Castillos","PACIENTE",1),
(6,"2020-01-14 17:01:28","Dio de alta al paciente con nombre David Flores Castillos","PACIENTE",1),
(7,"2020-01-14 17:03:03","Da de baja  al paciente  David Flores Castillos","PACIENTE",1),
(8,"2020-01-14 17:06:20","Registro nueva cita para paciente Francisco antonio Guzmán Ayala","MEDICAMENTO",1),
(9,"2020-01-14 17:08:02","Registro nueva cita para paciente Francisco antonio Guzmán Ayala","CITA",1),
(10,"2020-01-14 18:41:45","Inicio de sesión","LOGIN",1),
(11,"2020-01-15 08:45:09","Inicio de sesión","LOGIN",1);


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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tcita` VALUES (1,1,"","","2020-01-20 13:00:00",1),
(2,2,"","","2020-01-20 14:00:00",1),
(3,3,"","","2020-01-21 14:30:00",1),
(4,1,"","","2020-01-13 12:00:00",0),
(5,5,"","","2020-01-13 13:00:00",3),
(6,1,"","","2020-01-14 12:00:00",0),
(7,2,"","","2020-01-14 13:00:00",1),
(8,2,"","","2020-01-14 14:00:00",1);


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
  `recomendacion` text NOT NULL,
  PRIMARY KEY (`idconsulta`),
  KEY `idpaciente` (`idpaciente`),
  CONSTRAINT `tconsulta_ibfk_1` FOREIGN KEY (`idpaciente`) REFERENCES `tpaciente` (`idpaciente`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tconsulta` VALUES (9,5,"2020-01-13 19:21:29","\r\n\r\nLos criterios de consulta le ayudarán a centrar la búsqueda en los elementos específicos de la base de datos de Access. Si algún elemento coincide con todos los criterios introducidos, aparecerá en los resultados de la consulta.\r\n\r\nPara agregar un criterio a una consulta de Access, ábrala en la vista Diseño e identifique los campos (columnas) para los que desea especificar criterios. Si este campo no está en la cuadrícula de diseño, haga doble clic en el campo para agregarlo y entonces escriba el criterio en la fila Criterios de ese campo. Si no tiene claro cómo hacerlo, consulte Introducción a las consultas.\r\n\r\nUn criterio de búsqueda es una expresión que Access compara con valores de campo de consulta para determinar si incluir el registro que contiene cada valor. Por ejemplo, = \"Chicago\" es una expresión que Access puede comparar con valores de un campo de texto en una consulta. Si el valor de ese campo en un registro determinado es \"Chicago\", Access incluye el registro en los resultados de la consulta.\r\n\r\nA continuación encontrará algunos ejemplos de criterios utilizados con frecuencia que puede usar como punto de partida para crear sus criterios. Los ejemplos se agrupan por tipos de datos.\r\n","\r\n\r\nLos criterios de consulta le ayudarán a centrar la búsqueda en los elementos específicos de la base de datos de Access. Si algún elemento coincide con todos los criterios introducidos, aparecerá en los resultados de la consulta.\r\n\r\nPara agregar un criterio a una consulta de Access, ábrala en la vista Diseño e identifique los campos (columnas) para los que desea especificar criterios. Si este campo no está en la cuadrícula de diseño, haga doble clic en el campo para agregarlo y entonces escriba el criterio en la fila Criterios de ese campo. Si no tiene claro cómo hacerlo, consulte Introducción a las consultas.\r\n\r\nUn criterio de búsqueda es una expresión que Access compara con valores de campo de consulta para determinar si incluir el registro que contiene cada valor. Por ejemplo, = \"Chicago\" es una expresión que Access puede comparar con valores de un campo de texto en una consulta. Si el valor de ese campo en un registro determinado es \"Chicago\", Access incluye el registro en los resultados de la consulta.\r\n\r\nA continuación encontrará algunos ejemplos de criterios utilizados con frecuencia que puede usar como punto de partida para crear sus criterios. Los ejemplos se agrupan por tipos de datos.\r\n","\r\n\r\nLos criterios de consulta le ayudarán a centrar la búsqueda en los elementos específicos de la base de datos de Access. Si algún elemento coincide con todos los criterios introducidos, aparecerá en los resultados de la consulta.\r\n\r\nPara agregar un criterio a una consulta de Access, ábrala en la vista Diseño e identifique los campos (columnas) para los que desea especificar criterios. Si este campo no está en la cuadrícula de diseño, haga doble clic en el campo para agregarlo y entonces escriba el criterio en la fila Criterios de ese campo. Si no tiene claro cómo hacerlo, consulte Introducción a las consultas.\r\n\r\nUn criterio de búsqueda es una expresión que Access compara con valores de campo de consulta para determinar si incluir el registro que contiene cada valor. Por ejemplo, = \"Chicago\" es una expresión que Access puede comparar con valores de un campo de texto en una consulta. Si el valor de ese campo en un registro determinado es \"Chicago\", Access incluye el registro en los resultados de la consulta.\r\n\r\nA continuación encontrará algunos ejemplos de criterios utilizados con frecuencia que puede usar como punto de partida para crear sus criterios. Los ejemplos se agrupan por tipos de datos.\r\n","\r\n\r\nLos criterios de consulta le ayudarán a centrar la búsqueda en los elementos específicos de la base de datos de Access. Si algún elemento coincide con todos los criterios introducidos, aparecerá en los resultados de la consulta.\r\n\r\nPara agregar un criterio a una consulta de Access, ábrala en la vista Diseño e identifique los campos (columnas) para los que desea especificar criterios. Si este campo no está en la cuadrícula de diseño, haga doble clic en el campo para agregarlo y entonces escriba el criterio en la fila Criterios de ese campo. Si no tiene claro cómo hacerlo, consulte Introducción a las consultas.\r\n\r\nUn criterio de búsqueda es una expresión que Access compara con valores de campo de consulta para determinar si incluir el registro que contiene cada valor. Por ejemplo, = \"Chicago\" es una expresión que Access puede comparar con valores de un campo de texto en una consulta. Si el valor de ese campo en un registro determinado es \"Chicago\", Access incluye el registro en los resultados de la consulta.\r\n\r\nA continuación encontrará algunos ejemplos de criterios utilizados con frecuencia que puede usar como punto de partida para crear sus criterios. Los ejemplos se agrupan por tipos de datos.\r\n","\r\n\r\nLos criterios de consulta le ayudarán a centrar la búsqueda en los elementos específicos de la base de datos de Access. Si algún elemento coincide con todos los criterios introducidos, aparecerá en los resultados de la consulta.\r\n\r\nPara agregar un criterio a una consulta de Access, ábrala en la vista Diseño e identifique los campos (columnas) para los que desea especificar criterios. Si este campo no está en la cuadrícula de diseño, haga doble clic en el campo para agregarlo y entonces escriba el criterio en la fila Criterios de ese campo. Si no tiene claro cómo hacerlo, consulte Introducción a las consultas.\r\n\r\nUn criterio de búsqueda es una expresión que Access compara con valores de campo de consulta para determinar si incluir el registro que contiene cada valor. Por ejemplo, = \"Chicago\" es una expresión que Access puede comparar con valores de un campo de texto en una consulta. Si el valor de ese campo en un registro determinado es \"Chicago\", Access incluye el registro en los resultados de la consulta.\r\n\r\nA continuación encontrará algunos ejemplos de criterios utilizados con frecuencia que puede usar como punto de partida para crear sus criterios. Los ejemplos se agrupan por tipos de datos.\r\n",""),
(10,5,"2020-01-14 10:04:37","\r\n\r\nLos criterios de consulta le ayudarán a centrar la búsqueda en los elementos específicos de la base de datos de Access. Si algún elemento coincide con todos los criterios introducidos, aparecerá en los resultados de la consulta.\r\n\r\nPara agregar un criterio a una consulta de Access, ábrala en la vista Diseño e identifique los campos (columnas) para los que desea especificar criterios. Si este campo no está en la cuadrícula de diseño, haga doble clic en el campo para agregarlo y entonces escriba el criterio en la fila Criterios de ese campo. Si no tiene claro cómo hacerlo, consulte Introducción a las consultas.\r\n\r\nUn criterio de búsqueda es una expresión que Access compara con valores de campo de consulta para determinar si incluir el registro que contiene cada valor. Por ejemplo, = \"Chicago\" es una expresión que Access puede comparar con valores de un campo de texto en una consulta. Si el valor de ese campo en un registro determinado es \"Chicago\", Access incluye el registro en los resultados de la consulta.\r\n\r\nA continuación encontrará algunos ejemplos de criterios utilizados con frecuencia que puede usar como punto de partida para crear sus criterios. Los ejemplos se agrupan por tipos de datos.\r\n","\r\n\r\nLos criterios de consulta le ayudarán a centrar la búsqueda en los elementos específicos de la base de datos de Access. Si algún elemento coincide con todos los criterios introducidos, aparecerá en los resultados de la consulta.\r\n\r\nPara agregar un criterio a una consulta de Access, ábrala en la vista Diseño e identifique los campos (columnas) para los que desea especificar criterios. Si este campo no está en la cuadrícula de diseño, haga doble clic en el campo para agregarlo y entonces escriba el criterio en la fila Criterios de ese campo. Si no tiene claro cómo hacerlo, consulte Introducción a las consultas.\r\n\r\nUn criterio de búsqueda es una expresión que Access compara con valores de campo de consulta para determinar si incluir el registro que contiene cada valor. Por ejemplo, = \"Chicago\" es una expresión que Access puede comparar con valores de un campo de texto en una consulta. Si el valor de ese campo en un registro determinado es \"Chicago\", Access incluye el registro en los resultados de la consulta.\r\n\r\nA continuación encontrará algunos ejemplos de criterios utilizados con frecuencia que puede usar como punto de partida para crear sus criterios. Los ejemplos se agrupan por tipos de datos.\r\n","\r\n\r\nLos criterios de consulta le ayudarán a centrar la búsqueda en los elementos específicos de la base de datos de Access. Si algún elemento coincide con todos los criterios introducidos, aparecerá en los resultados de la consulta.\r\n\r\nPara agregar un criterio a una consulta de Access, ábrala en la vista Diseño e identifique los campos (columnas) para los que desea especificar criterios. Si este campo no está en la cuadrícula de diseño, haga doble clic en el campo para agregarlo y entonces escriba el criterio en la fila Criterios de ese campo. Si no tiene claro cómo hacerlo, consulte Introducción a las consultas.\r\n\r\nUn criterio de búsqueda es una expresión que Access compara con valores de campo de consulta para determinar si incluir el registro que contiene cada valor. Por ejemplo, = \"Chicago\" es una expresión que Access puede comparar con valores de un campo de texto en una consulta. Si el valor de ese campo en un registro determinado es \"Chicago\", Access incluye el registro en los resultados de la consulta.\r\n\r\nA continuación encontrará algunos ejemplos de criterios utilizados con frecuencia que puede usar como punto de partida para crear sus criterios. Los ejemplos se agrupan por tipos de datos.\r\n","\r\n\r\nLos criterios de consulta le ayudarán a centrar la búsqueda en los elementos específicos de la base de datos de Access. Si algún elemento coincide con todos los criterios introducidos, aparecerá en los resultados de la consulta.\r\n\r\nPara agregar un criterio a una consulta de Access, ábrala en la vista Diseño e identifique los campos (columnas) para los que desea especificar criterios. Si este campo no está en la cuadrícula de diseño, haga doble clic en el campo para agregarlo y entonces escriba el criterio en la fila Criterios de ese campo. Si no tiene claro cómo hacerlo, consulte Introducción a las consultas.\r\n\r\nUn criterio de búsqueda es una expresión que Access compara con valores de campo de consulta para determinar si incluir el registro que contiene cada valor. Por ejemplo, = \"Chicago\" es una expresión que Access puede comparar con valores de un campo de texto en una consulta. Si el valor de ese campo en un registro determinado es \"Chicago\", Access incluye el registro en los resultados de la consulta.\r\n\r\nA continuación encontrará algunos ejemplos de criterios utilizados con frecuencia que puede usar como punto de partida para crear sus criterios. Los ejemplos se agrupan por tipos de datos.\r\n","\r\n\r\nLos criterios de consulta le ayudarán a centrar la búsqueda en los elementos específicos de la base de datos de Access. Si algún elemento coincide con todos los criterios introducidos, aparecerá en los resultados de la consulta.\r\n\r\nPara agregar un criterio a una consulta de Access, ábrala en la vista Diseño e identifique los campos (columnas) para los que desea especificar criterios. Si este campo no está en la cuadrícula de diseño, haga doble clic en el campo para agregarlo y entonces escriba el criterio en la fila Criterios de ese campo. Si no tiene claro cómo hacerlo, consulte Introducción a las consultas.\r\n\r\nUn criterio de búsqueda es una expresión que Access compara con valores de campo de consulta para determinar si incluir el registro que contiene cada valor. Por ejemplo, = \"Chicago\" es una expresión que Access puede comparar con valores de un campo de texto en una consulta. Si el valor de ese campo en un registro determinado es \"Chicago\", Access incluye el registro en los resultados de la consulta.\r\n\r\nA continuación encontrará algunos ejemplos de criterios utilizados con frecuencia que puede usar como punto de partida para crear sus criterios. Los ejemplos se agrupan por tipos de datos.\r\n",""),
(11,5,"2020-01-14 10:36:57","\r\n\r\nLos criterios de consulta le ayudarán a centrar la búsqueda en los elementos específicos de la base de datos de Access. Si algún elemento coincide con todos los criterios introducidos, aparecerá en los resultados de la consulta.\r\n\r\nPara agregar un criterio a una consulta de Access, ábrala en la vista Diseño e identifique los campos (columnas) para los que desea especificar criterios. Si este campo no está en la cuadrícula de diseño, haga doble clic en el campo para agregarlo y entonces escriba el criterio en la fila Criterios de ese campo. Si no tiene claro cómo hacerlo, consulte Introducción a las consultas.\r\n\r\nUn criterio de búsqueda es una expresión que Access compara con valores de campo de consulta para determinar si incluir el registro que contiene cada valor. Por ejemplo, = \"Chicago\" es una expresión que Access puede comparar con valores de un campo de texto en una consulta. Si el valor de ese campo en un registro determinado es \"Chicago\", Access incluye el registro en los resultados de la consulta.\r\n\r\nA continuación encontrará algunos ejemplos de criterios utilizados con frecuencia que puede usar como punto de partida para crear sus criterios. Los ejemplos se agrupan por tipos de datos.\r\n\r\n","\r\n\r\nLos criterios de consulta le ayudarán a centrar la búsqueda en los elementos específicos de la base de datos de Access. Si algún elemento coincide con todos los criterios introducidos, aparecerá en los resultados de la consulta.\r\n\r\nPara agregar un criterio a una consulta de Access, ábrala en la vista Diseño e identifique los campos (columnas) para los que desea especificar criterios. Si este campo no está en la cuadrícula de diseño, haga doble clic en el campo para agregarlo y entonces escriba el criterio en la fila Criterios de ese campo. Si no tiene claro cómo hacerlo, consulte Introducción a las consultas.\r\n\r\nUn criterio de búsqueda es una expresión que Access compara con valores de campo de consulta para determinar si incluir el registro que contiene cada valor. Por ejemplo, = \"Chicago\" es una expresión que Access puede comparar con valores de un campo de texto en una consulta. Si el valor de ese campo en un registro determinado es \"Chicago\", Access incluye el registro en los resultados de la consulta.\r\n\r\nA continuación encontrará algunos ejemplos de criterios utilizados con frecuencia que puede usar como punto de partida para crear sus criterios. Los ejemplos se agrupan por tipos de datos.\r\n","aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa","aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa","aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",""),
(12,5,"2020-01-15 09:41:41","La frecuencia respiratoria normal de un adulto que esté en reposo oscila entre 15 y 20 respiraciones por minuto. Cuando la frecuencia es mayor de 25 respiraciones por minuto o menor de 12 (en reposo) se podría considerar anormal.","La frecuencia respiratoria normal de un adulto que esté en reposo oscila entre 15 y 20 respiraciones por minuto. Cuando la frecuencia es mayor de 25 respiraciones por minuto o menor de 12 (en reposo) se podría considerar anormal.","La frecuencia respiratoria normal de un adulto que esté en reposo oscila entre 15 y 20 respiraciones por minuto. Cuando la frecuencia es mayor de 25 respiraciones por minuto o menor de 12 (en reposo) se podría considerar anormal.","La frecuencia respiratoria normal de un adulto que esté en reposo oscila entre 15 y 20 respiraciones por minuto. Cuando la frecuencia es mayor de 25 respiraciones por minuto o menor de 12 (en reposo) se podría considerar anormal.","La frecuencia respiratoria normal de un adulto que esté en reposo oscila entre 15 y 20 respiraciones por minuto. Cuando la frecuencia es mayor de 25 respiraciones por minuto o menor de 12 (en reposo) se podría considerar anormal.","La frecuencia respiratoria normal de un adulto que esté en reposo oscila entre 15 y 20 respiraciones por minuto. Cuando la frecuencia es mayor de 25 respiraciones por minuto o menor de 12 (en reposo) se podría considerar anormal."),
(13,5,"2020-01-15 11:15:02","","","","","",""),
(14,5,"2020-01-15 11:15:14","","","","","","");


DROP TABLE IF EXISTS `texamen`;

CREATE TABLE `texamen` (
  `idexamen` int(11) NOT NULL AUTO_INCREMENT,
  `ruta_imagen` varchar(100) NOT NULL,
  `idconsulta` int(11) NOT NULL,
  PRIMARY KEY (`idexamen`),
  KEY `idconsulta` (`idconsulta`),
  CONSTRAINT `texamen_ibfk_1` FOREIGN KEY (`idconsulta`) REFERENCES `tconsulta` (`idconsulta`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

INSERT INTO `texamen` VALUES (1,"expediente/OP05/email1.png",9),
(2,"expediente/OP05/email2.png",9),
(3,"expediente/OP05/email3.png",9),
(4,"expediente/OP05/",10),
(5,"expediente/OP05/email1.png",11),
(6,"expediente/OP05/email2.png",11),
(7,"expediente/OP05/email3.png",11),
(8,"expediente/OP05/email4.png",11),
(9,"expediente/OP05/image-4.jpg",12),
(10,"expediente/OP05/image-5.jpg",12),
(11,"expediente/OP05/image-6.jpg",12),
(12,"expediente/OP05/thumb-1.jpg",12),
(13,"expediente/OP05/image-1.jpg",13),
(14,"expediente/OP05/image-2.jpg",13),
(15,"expediente/OP05/image-3.jpg",13),
(16,"expediente/OP05/image-1.jpg",14),
(17,"expediente/OP05/image-2.jpg",14),
(18,"expediente/OP05/image-3.jpg",14);


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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tpaciente` VALUES (1,"AF01","Andrea","Flores Cordova","FEMENINO","1930-05-05","","","7997-9727","2393-4108","colonia santa lucia casa#3 colonia espiga de oro pasaje#3",1),
(2,"FG02","Francisco antonio","Guzmán Ayala","MASCULINO","1970-08-21","09292092-0","franciscoguzayala@gmail.com","7297-2972","2394-8292","colonia santa lucia casa#3 pasaje#2",1),
(3,"DF03","David","Flores Guzmán","MASCULINO","1995-01-08","09282820-8","davidflores.guzman.dfg@gmail.com","7291-3748","7614-3568","colonia santa lucia casa#3 pasaje#2",1),
(4,"JF04","Jasmin Beatriz","Flores Guzmán","MASCULINO","1997-01-02","09880988-1","jasminbeatriz@gmail.com","7291-3748","7392-0202","colonias¿ santa lucia casa#3 pasaje#2",1),
(5,"OP05","Oscar Miguel","Palacios Rivas","MASCULINO","1996-01-05","","","7937-9932","7927-9279","",1),
(6,"DF06","David","Flores Castillos","MASCULINO","1970-05-21","","","7297-2972","","colonia santa lucia casa#3 pasaje#3",0);


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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

INSERT INTO `treceta` VALUES (1,1,"",4,0,"2 PASTILLAS cada 2 HORAS durante 30 DIAS",9),
(2,2,"",3,0,"2 PASTILLAS cada 3 HORAS durante 30 DIAS",9),
(3,NULL,"ASPIRINA FORTE",0,2,"2 PASTILLAS cada 8 HORAS durante 30 DIAS",9),
(4,1,"",1,0,"2 cada 2 durante 2",10),
(5,NULL,"AMOXIXILINA",0,1,"2 cada 2 durante 2",10),
(6,NULL,"",0,1,"2 cada 2 durante 2",10),
(7,1,"",1,0,"3 cada 3 durante 3",11),
(8,2,"",3,0,"2 cada 3 durante 3",11),
(9,3,"",3,0,"3 cada 3 durante 3",11),
(10,1,"",5,0,"2 cada 8 horas durante 30 ",12),
(11,2,"",6,0,"2 cada 8 horas durante 15 ",12),
(12,3,"",7,0,"2 cada 24 horas durante 30",12),
(13,1,"",1,0,"2 cada 3 durante 4",13),
(14,1,"",1,0,"2 cada 3 durante 4",14);


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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tresponsable` VALUES (1,"David","Flores Castillos","HIJO","09808080-9","7272-7297","7979-2792",1),
(2,"Herminia","Flores Ayala","HERMANA","08988989-9","7927-9279","7279-7297",2),
(3,"Eva de los Angeles","Guzmán Ayala","MADRE","","7205-3822","7927-9279",3),
(4,"David","Flores Guzman","HERMANO","","7279-2792","7297-2988",4),
(5,"","","","","","",5),
(6,"Andrea","Flores Cordova","MADRE","","7927-9279","2393-4108",6);


DROP TABLE IF EXISTS `tsignosvitales`;

CREATE TABLE `tsignosvitales` (
  `idsignovital` int(11) NOT NULL AUTO_INCREMENT,
  `presion` varchar(6) NOT NULL,
  `frecuencia` varchar(5) NOT NULL,
  `temperatura` varchar(4) NOT NULL,
  `peso` int(11) NOT NULL,
  `estatura` int(11) NOT NULL,
  `frecuenciares` int(11) NOT NULL,
  `idconsulta` int(11) NOT NULL,
  PRIMARY KEY (`idsignovital`),
  KEY `idconsulta` (`idconsulta`),
  CONSTRAINT `tsignosvitales_ibfk_1` FOREIGN KEY (`idconsulta`) REFERENCES `tconsulta` (`idconsulta`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tsignosvitales` VALUES (1,"120/10",25,"37.5",185,200,0,9),
(2,"120/20",25,37,185,198,0,10),
(3,120,112,37,185,284,0,12),
(4,"","","",0,0,0,13),
(5,"","","",0,0,0,14);


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

INSERT INTO `tusuario` VALUES (1,"ANALUISAVELAS","TGRmT2E1Y0xWblV5TUgwOXpnZ2VDQT09","davidflores.guzman.dfg@gmail.es","admin","",1,"2019-11-29","DR.ANA LUISA VELAZQUEZ"),
(2,"SECRETARIA1","TGRmT2E1Y0xWblV5TUgwOXpnZ2VDQT09","carlabeatriz@gmail.com","secret","",1,"0000-00-00","MARIA HERMINIA CHAVEZ CORNEJO");


SET foreign_key_checks = 1;
