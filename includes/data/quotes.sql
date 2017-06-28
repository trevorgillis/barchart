/*
Navicat MySQL Data Transfer

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-06-27 18:31:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `quotes`
-- ----------------------------
DROP TABLE IF EXISTS `quotes`;
CREATE TABLE `quotes` (
  `symbol` varchar(18) NOT NULL,
  `name` varchar(128) NOT NULL,
  `last` double DEFAULT NULL,
  `change` double DEFAULT NULL,
  `pctchange` double DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `tradetime` datetime DEFAULT NULL,
  PRIMARY KEY (`symbol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of quotes
-- ----------------------------
INSERT INTO `quotes` VALUES ('AAPL', 'Apple Inc', '145.42', '-3.56', '-2.39', '72219195', '2017-06-12 18:03:00');
INSERT INTO `quotes` VALUES ('AMD', 'Adv Micro Devices', '12.09', '-0.19', '-1.55', '125643297', '2017-06-12 18:04:00');
INSERT INTO `quotes` VALUES ('AMZN', 'Amazon.Com Inc', '964.91', '-13.4', '-1.37', '9438600', '2017-06-12 18:03:00');
INSERT INTO `quotes` VALUES ('CSCO', 'Cisco Systems Inc', '31.25', '-0.12', '-0.38', '25783400', '2017-06-12 18:02:00');
INSERT INTO `quotes` VALUES ('EA', 'Electronic Arts Inc', '108.9', '-1.56', '-1.41', '5822000', '2017-06-12 18:00:00');
INSERT INTO `quotes` VALUES ('F', 'Ford Motor Company', '11.28', '0.15', '1.35', '38472102', '2017-06-12 17:53:00');
INSERT INTO `quotes` VALUES ('FB', 'Facebook Inc', '148.44', '-1.16', '-0.78', '33152699', '2017-06-12 18:00:00');
INSERT INTO `quotes` VALUES ('GE', 'General Electric Company', '28.94', '1', '3.58', '139003297', '2017-06-12 18:04:00');
INSERT INTO `quotes` VALUES ('GM', 'General Motors Company', '34.68', '0.34', '0.99', '14304899', '2017-06-12 17:06:00');
INSERT INTO `quotes` VALUES ('GOOGL', 'Alphabet Class A', '961.81', '-8.31', '-0.86', '4198000', '2017-06-12 18:04:00');
INSERT INTO `quotes` VALUES ('IBM', 'International Business Machines', '155.18', '1.08', '0.7', '6464800', '2017-06-12 17:47:00');
INSERT INTO `quotes` VALUES ('NVDA', 'Nvidia Corporation', '149.97', '0.37', '0.25', '42311801', '2017-06-12 18:04:00');
INSERT INTO `quotes` VALUES ('P', 'Pandora Media Inc', '7.87', '-0.65', '-7.63', '31016299', '2017-06-12 17:50:00');
INSERT INTO `quotes` VALUES ('SNAP', 'Snap Inc', '18.2', '0.12', '0.66', '16160100', '2017-06-12 18:02:00');
INSERT INTO `quotes` VALUES ('T', 'AT&T Inc', '39.07', '0.28', '0.72', '22779799', '2017-06-12 17:41:00');
INSERT INTO `quotes` VALUES ('TSLA', 'Tesla Inc', '359.01', '1.69', '0.47', '10508800', '2017-06-12 18:02:00');
INSERT INTO `quotes` VALUES ('TWTR', 'Twitter Inc', '17.04', '0.14', '0.83', '20490801', '2017-06-12 18:03:00');
INSERT INTO `quotes` VALUES ('V', 'Visa Inc', '93.5', '-1.06', '-1.12', '15604300', '2017-06-12 17:48:00');
INSERT INTO `quotes` VALUES ('VZ', 'Verizon Communications Inc', '47.19', '0.47', '1.01', '18929000', '2017-06-12 17:59:00');
INSERT INTO `quotes` VALUES ('YHOO', 'Yahoo! Inc', '53.12', '-0.9', '-1.67', '57719301', '2017-06-12 17:39:00');

-- ----------------------------
-- Table structure for `selected_quotes`
-- ----------------------------
DROP TABLE IF EXISTS `selected_quotes`;
CREATE TABLE `selected_quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `symbol` varchar(18) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of selected_quotes
-- ----------------------------
