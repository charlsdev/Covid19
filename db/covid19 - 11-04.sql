/*
 Navicat Premium Data Transfer

 Source Server         : Servidor DHCP
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : covid19

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 10/04/2020 22:45:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cantones
-- ----------------------------
DROP TABLE IF EXISTS `cantones`;
CREATE TABLE `cantones`  (
  `ID_Canton` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Canton` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_Canton`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cantones
-- ----------------------------
INSERT INTO `cantones` VALUES ('CAN01', 'Jipijapa');
INSERT INTO `cantones` VALUES ('CAN02', 'Portoviejo');
INSERT INTO `cantones` VALUES ('CAN03', '24 de Mayo');
INSERT INTO `cantones` VALUES ('CAN04', 'Bolivar');
INSERT INTO `cantones` VALUES ('CAN05', 'Chone');
INSERT INTO `cantones` VALUES ('CAN06', 'El Carmen');
INSERT INTO `cantones` VALUES ('CAN07', 'Flavio Alfaro');
INSERT INTO `cantones` VALUES ('CAN08', 'Jama');
INSERT INTO `cantones` VALUES ('CAN09', 'Jaramijo');
INSERT INTO `cantones` VALUES ('CAN10', 'Junin');
INSERT INTO `cantones` VALUES ('CAN11', 'Manta');
INSERT INTO `cantones` VALUES ('CAN12', 'Montecristi');
INSERT INTO `cantones` VALUES ('CAN13', 'Olmedo');
INSERT INTO `cantones` VALUES ('CAN14', 'Pajan');
INSERT INTO `cantones` VALUES ('CAN15', 'Pedernales');
INSERT INTO `cantones` VALUES ('CAN16', 'Pichincha');
INSERT INTO `cantones` VALUES ('CAN17', 'Puerto Lopez');
INSERT INTO `cantones` VALUES ('CAN18', 'Rocafuerte');
INSERT INTO `cantones` VALUES ('CAN19', 'San Vicente');
INSERT INTO `cantones` VALUES ('CAN20', 'Santa Ana');
INSERT INTO `cantones` VALUES ('CAN21', 'Sucre');
INSERT INTO `cantones` VALUES ('CAN22', 'Tosagua');

-- ----------------------------
-- Table structure for encuesta
-- ----------------------------
DROP TABLE IF EXISTS `encuesta`;
CREATE TABLE `encuesta`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Cedula` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Fecha` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for enfermedades
-- ----------------------------
DROP TABLE IF EXISTS `enfermedades`;
CREATE TABLE `enfermedades`  (
  `ID_Enfermedades` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Enfermedad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_Enfermedades`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of enfermedades
-- ----------------------------
INSERT INTO `enfermedades` VALUES ('ENF01', 'Embarazo');
INSERT INTO `enfermedades` VALUES ('ENF02', 'Diabetes');
INSERT INTO `enfermedades` VALUES ('ENF03', 'Hipertesion Arterial');
INSERT INTO `enfermedades` VALUES ('ENF04', 'Enfermedades Respiratoria (Del Pulmon)');
INSERT INTO `enfermedades` VALUES ('ENF05', 'Enfermedades Cardiovascular (Del Corazon, Venas o Arterias)');
INSERT INTO `enfermedades` VALUES ('ENF06', 'Cancer');
INSERT INTO `enfermedades` VALUES ('ENF07', 'Ninguna (Si no padece)');

-- ----------------------------
-- Table structure for parroquias
-- ----------------------------
DROP TABLE IF EXISTS `parroquias`;
CREATE TABLE `parroquias`  (
  `ID_Parroquia` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Parroquia` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ID_Canton` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_Parroquia`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parroquias
-- ----------------------------
INSERT INTO `parroquias` VALUES ('PAR01', 'Dr. Miguel Moran Lucio', 'CAN01');
INSERT INTO `parroquias` VALUES ('PAR02', 'Manuel Inocencio Parrales y Guale', 'CAN01');
INSERT INTO `parroquias` VALUES ('PAR03', 'San Lorenzo de Jipijapa', 'CAN01');
INSERT INTO `parroquias` VALUES ('PAR04', 'America', 'CAN01');
INSERT INTO `parroquias` VALUES ('PAR05', 'El Anegado', 'CAN01');
INSERT INTO `parroquias` VALUES ('PAR06', 'La Union', 'CAN01');
INSERT INTO `parroquias` VALUES ('PAR07', 'Julcuy', 'CAN01');
INSERT INTO `parroquias` VALUES ('PAR08', 'Pedro Pablo Gomez', 'CAN01');
INSERT INTO `parroquias` VALUES ('PAR09', 'Puerto Cayo', 'CAN01');
INSERT INTO `parroquias` VALUES ('PAR10', 'Membrillal', 'CAN01');
INSERT INTO `parroquias` VALUES ('PAR11', 'Alhajuela', 'CAN02');
INSERT INTO `parroquias` VALUES ('PAR12', 'Calderon', 'CAN02');
INSERT INTO `parroquias` VALUES ('PAR13', 'Chirijos', 'CAN02');
INSERT INTO `parroquias` VALUES ('PAR14', 'Crucita', 'CAN02');
INSERT INTO `parroquias` VALUES ('PAR15', 'Pueblo Nuevo', 'CAN02');
INSERT INTO `parroquias` VALUES ('PAR16', 'Riochico', 'CAN02');
INSERT INTO `parroquias` VALUES ('PAR17', 'San Placido', 'CAN02');
INSERT INTO `parroquias` VALUES ('PAR18', '12 de Marzo', 'CAN02');
INSERT INTO `parroquias` VALUES ('PAR19', 'Colon', 'CAN02');
INSERT INTO `parroquias` VALUES ('PAR20', 'Picoaza', 'CAN02');
INSERT INTO `parroquias` VALUES ('PAR21', 'San Pablo', 'CAN02');
INSERT INTO `parroquias` VALUES ('PAR22', 'Andres de Vera', 'CAN02');
INSERT INTO `parroquias` VALUES ('PAR23', 'Francisco Pacheco', 'CAN02');
INSERT INTO `parroquias` VALUES ('PAR24', '18 de Octubre', 'CAN02');
INSERT INTO `parroquias` VALUES ('PAR25', 'Simon Bolivar', 'CAN02');
INSERT INTO `parroquias` VALUES ('PAR26', 'Bellavista', 'CAN03');
INSERT INTO `parroquias` VALUES ('PAR27', 'Noboa', 'CAN03');
INSERT INTO `parroquias` VALUES ('PAR28', 'Chirijos', 'CAN03');
INSERT INTO `parroquias` VALUES ('PAR29', 'Arquitecto Sixto Duran Ballen', 'CAN03');
INSERT INTO `parroquias` VALUES ('PAR30', 'Sucre', 'CAN03');
INSERT INTO `parroquias` VALUES ('PAR31', 'Membrillo', 'CAN04');
INSERT INTO `parroquias` VALUES ('PAR32', 'Quiroga', 'CAN04');
INSERT INTO `parroquias` VALUES ('PAR33', 'Calceta', 'CAN04');
INSERT INTO `parroquias` VALUES ('PAR34', 'Boyaca', 'CAN05');
INSERT INTO `parroquias` VALUES ('PAR35', 'Canuto', 'CAN05');
INSERT INTO `parroquias` VALUES ('PAR36', 'Chibunga', 'CAN05');
INSERT INTO `parroquias` VALUES ('PAR37', 'Convento', 'CAN05');
INSERT INTO `parroquias` VALUES ('PAR38', 'Eloy Alfaro', 'CAN05');
INSERT INTO `parroquias` VALUES ('PAR39', 'San Antonio', 'CAN05');
INSERT INTO `parroquias` VALUES ('PAR40', 'Ricaurte', 'CAN05');
INSERT INTO `parroquias` VALUES ('PAR41', 'Chone', 'CAN05');
INSERT INTO `parroquias` VALUES ('PAR42', 'Santa Rita', 'CAN05');
INSERT INTO `parroquias` VALUES ('PAR43', 'Wilfrido Loor Moreira', 'CAN06');
INSERT INTO `parroquias` VALUES ('PAR44', 'San Pedro de Suma', 'CAN06');
INSERT INTO `parroquias` VALUES ('PAR45', 'El Carmen', 'CAN06');
INSERT INTO `parroquias` VALUES ('PAR46', '4 de Diciembre', 'CAN06');
INSERT INTO `parroquias` VALUES ('PAR47', 'San Francisco de Novillo', 'CAN07');
INSERT INTO `parroquias` VALUES ('PAR48', 'Zapallo', 'CAN07');
INSERT INTO `parroquias` VALUES ('PAR49', 'Jama', 'CAN08');
INSERT INTO `parroquias` VALUES ('PAR50', 'Jaramijo', 'CAN09');
INSERT INTO `parroquias` VALUES ('PAR51', 'Junin', 'CAN10');
INSERT INTO `parroquias` VALUES ('PAR52', 'San Lorenzo', 'CAN11');
INSERT INTO `parroquias` VALUES ('PAR53', 'Santa Marianita', 'CAN11');
INSERT INTO `parroquias` VALUES ('PAR54', 'Los Estero', 'CAN11');
INSERT INTO `parroquias` VALUES ('PAR55', 'Manta', 'CAN11');
INSERT INTO `parroquias` VALUES ('PAR56', 'San Mateo', 'CAN11');
INSERT INTO `parroquias` VALUES ('PAR57', 'Tarqui', 'CAN11');
INSERT INTO `parroquias` VALUES ('PAR58', 'Eloy Alfaro', 'CAN11');
INSERT INTO `parroquias` VALUES ('PAR59', 'La Pila ', 'CAN12');
INSERT INTO `parroquias` VALUES ('PAR60', 'Anibal San Andres', 'CAN12');
INSERT INTO `parroquias` VALUES ('PAR61', 'Montecristi', 'CAN12');
INSERT INTO `parroquias` VALUES ('PAR62', 'El Colorado', 'CAN12');
INSERT INTO `parroquias` VALUES ('PAR63', 'General Eloy Alfaro', 'CAN12');
INSERT INTO `parroquias` VALUES ('PAR64', 'Olmedo', 'CAN13');
INSERT INTO `parroquias` VALUES ('PAR65', 'Campozano', 'CAN14');
INSERT INTO `parroquias` VALUES ('PAR66', 'Cascol', 'CAN14');
INSERT INTO `parroquias` VALUES ('PAR67', 'Guale', 'CAN14');
INSERT INTO `parroquias` VALUES ('PAR68', 'Lascano', 'CAN14');
INSERT INTO `parroquias` VALUES ('PAR69', 'Cojimies', 'CAN15');
INSERT INTO `parroquias` VALUES ('PAR70', '10 de Agosto', 'CAN15');
INSERT INTO `parroquias` VALUES ('PAR71', 'Atahualpa', 'CAN15');
INSERT INTO `parroquias` VALUES ('PAR72', 'Barraganete', 'CAN16');
INSERT INTO `parroquias` VALUES ('PAR73', 'San Sebastian', 'CAN16');
INSERT INTO `parroquias` VALUES ('PAR74', 'Pichincha', 'CAN16');
INSERT INTO `parroquias` VALUES ('PAR75', 'Machalilla', 'CAN17');
INSERT INTO `parroquias` VALUES ('PAR76', 'Salango', 'CAN17');
INSERT INTO `parroquias` VALUES ('PAR77', 'Rocafuerte', 'CAN18');
INSERT INTO `parroquias` VALUES ('PAR78', 'Canoa', 'CAN19');
INSERT INTO `parroquias` VALUES ('PAR79', 'Ayacucho', 'CAN20');
INSERT INTO `parroquias` VALUES ('PAR80', 'Honorato Vasquez', 'CAN20');
INSERT INTO `parroquias` VALUES ('PAR81', 'La Union', 'CAN20');
INSERT INTO `parroquias` VALUES ('PAR82', 'San Pablo', 'CAN20');
INSERT INTO `parroquias` VALUES ('PAR83', 'Santa Ana', 'CAN20');
INSERT INTO `parroquias` VALUES ('PAR84', 'Lodana', 'CAN20');
INSERT INTO `parroquias` VALUES ('PAR85', 'Charapoto', 'CAN21');
INSERT INTO `parroquias` VALUES ('PAR86', 'San Isidro', 'CAN21');
INSERT INTO `parroquias` VALUES ('PAR87', 'Bahia de Caraquez', 'CAN21');
INSERT INTO `parroquias` VALUES ('PAR88', 'Leonidas Plaza Gutierrez', 'CAN21');
INSERT INTO `parroquias` VALUES ('PAR89', 'Bachillerato', 'CAN22');
INSERT INTO `parroquias` VALUES ('PAR90', 'Angel Pedro Giler', 'CAN22');

-- ----------------------------
-- Table structure for preguntas
-- ----------------------------
DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE `preguntas`  (
  `ID_Pregunta` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Pregunta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_Pregunta`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of preguntas
-- ----------------------------
INSERT INTO `preguntas` VALUES ('LAT', 'Latitud');
INSERT INTO `preguntas` VALUES ('LON', 'Longitud');
INSERT INTO `preguntas` VALUES ('Q01', '¿Usted vive con alguien más en su domicilio actualmente?');
INSERT INTO `preguntas` VALUES ('Q02', '¿Actualmente ud o algún familiar con el que vive, por trabajo ha sido forzado a salir de casa?');
INSERT INTO `preguntas` VALUES ('Q03', '¿Ha estado en contacto con personas que hayan venido de estas provincias?');
INSERT INTO `preguntas` VALUES ('Q04', '¿Ha viajado al extranjero en los últimos 20 días?');
INSERT INTO `preguntas` VALUES ('Q05', '¿Ha estado en contacto con personas que han viajado al extranjero en los últimos 20 días?');
INSERT INTO `preguntas` VALUES ('Q06', '¿Ha viajado usted a alguna otra provincia en los últimos 20 días?');
INSERT INTO `preguntas` VALUES ('Q07', '¿Ha tenido contacto con personas que hayan sido diagnosticados como casos positivos de COVID 19?');
INSERT INTO `preguntas` VALUES ('Q08', '¿Ha visitado un supermercado, mercado, terminal terrestre o utilizado transporte público en los últimos 15 días?');
INSERT INTO `preguntas` VALUES ('Q09', '¿Participó de un evento masivo durante los últimos 20 días?');
INSERT INTO `preguntas` VALUES ('Q10', '¿Ha visitado un centro de salud/hospital en los últimos 20 días?');
INSERT INTO `preguntas` VALUES ('Q11', '¿Ha tenido contacto con profesionales de la salud durante los últimos 20 días?');
INSERT INTO `preguntas` VALUES ('Q12', '¿Ha tenido fiebre en los últimos 7 días?');
INSERT INTO `preguntas` VALUES ('Q13', '¿Ha tenido tos seca en los últimos 7 días?');
INSERT INTO `preguntas` VALUES ('Q14', '¿Ha tenido dolor de garganta en los últimos 7 días?');
INSERT INTO `preguntas` VALUES ('Q15', '¿Ha tenido malestar general en los últimos 7 días?');
INSERT INTO `preguntas` VALUES ('Q16', '¿Ha tenido dificultad para respirar en los últimos 7 días?');
INSERT INTO `preguntas` VALUES ('Q17', '¿Ha tenido dolor de cabeza en los últimos 7 días?');
INSERT INTO `preguntas` VALUES ('Q18', '¿Ha tenido diarrea en los últimos 7 días?');
INSERT INTO `preguntas` VALUES ('Q19', '¿Presenta alguna de las siguientes condiciones de salud?');

-- ----------------------------
-- Table structure for provinciascontagios
-- ----------------------------
DROP TABLE IF EXISTS `provinciascontagios`;
CREATE TABLE `provinciascontagios`  (
  `ID_Provincia` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ProvinciaContagios` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_Provincia`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of provinciascontagios
-- ----------------------------
INSERT INTO `provinciascontagios` VALUES ('PRO01', 'Guayas');
INSERT INTO `provinciascontagios` VALUES ('PRO02', 'Pichincha');
INSERT INTO `provinciascontagios` VALUES ('PRO03', 'Los Rios');
INSERT INTO `provinciascontagios` VALUES ('PRO04', 'Azuay');
INSERT INTO `provinciascontagios` VALUES ('PRO05', 'Manabi');
INSERT INTO `provinciascontagios` VALUES ('PRO06', 'Loja');
INSERT INTO `provinciascontagios` VALUES ('PRO10', 'Ninguna');

-- ----------------------------
-- Table structure for resultado
-- ----------------------------
DROP TABLE IF EXISTS `resultado`;
CREATE TABLE `resultado`  (
  `Codigo` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ID_Pregunta` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Resultado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `cedula` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellidos_nombres` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `edad` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sexo` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nacionalidad` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado_civil` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `canton` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parroquia` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`cedula`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
