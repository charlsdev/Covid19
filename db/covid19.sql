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

 Date: 09/04/2020 19:13:06
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
INSERT INTO `preguntas` VALUES ('Q19', '¿Ha estado en contacto con personas que hayan venido de estas provincias?');

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
