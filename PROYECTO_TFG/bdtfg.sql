--
-- Database: bdtfg
--

-- ------------------------------------------------------

--
-- Table structure for table  usuarios
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(30)  NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `sexo` varchar(1)  NOT NULL DEFAULT 'H',
   `correoElectronico` varchar(50) NOT NULL,
   `TiempoDescanso` int (1) NOT NULL DEFAULT 1,
   `estilo` int (1) NOT NULL DEFAULT 1,
   `PeriodoEtudio` int(1) NOT NULL DEFAULT 1,
   `lapsoDescanso` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


INSERT INTO `usuarios` VALUES ('prueba1','12345','prueba','usuario','2000-12-31','H','prueba@gmail.com','esto es una foto de perfil',1,1,1,1);


--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `titulo` varchar(30)  DEFAULT NULL,
  `cuerpo` varchar(256) DEFAULT NULL,
  `usuario` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ;

INSERT INTO `posts` VALUES (1,'2012-12-05', 'primera prueba','Esto es un post de prueba ','prueba1');


--
-- Table structure for table `archivos`
--
CREATE TABLE presentaciones (
  idPresentacion int(11) unsigned NOT NULL auto_increment,
  url varchar(255) NOT NULL default '',
  nombreTema varchar(30) NOT NULL default '',
  PRIMARY KEY  (id)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ;


--
-- Table structure for table `ejercicios`
--

CREATE TABLE `ejercicios` (
  `idEjercicio` int(11) NOT NULL AUTO_INCREMENT,
  `encabezado` varchar(256)  DEFAULT NULL,
  `idResultado` int(11)  DEFAULT NULL,
  `idPresentacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEjercicio`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ;

INSERT INTO `ejercicios` VALUES (1,'este es un ecabezado de prueba para este ejercicio','este es el resultado de prueba',1);


--
-- Table structure for table `resultados`
--

CREATE TABLE `resultados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEjercicio` int(11) NOT NULL,
  `resultado` varchar(256) DEFAULT NULL,
  `usuario` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ;

INSERT INTO `resultados` VALUES (1,1,'este es el resultado de prueba','prueba1');



--
-- Table structure for table `ejercicios`
--

CREATE TABLE `ejerciciosResueltos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `encabezado` varchar(256) DEFAULT NULL,
  `resultado` varchar(256)  DEFAULT NULL,
   `idPresentacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ;

INSERT INTO `ejerciciosResueltos` VALUES (1,'este es un ecabezado de prueba para este ejercicio','este es el resultado de prueba',1);

