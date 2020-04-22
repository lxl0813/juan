/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : juan

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2020-04-22 11:47:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for j_admin
-- ----------------------------
DROP TABLE IF EXISTS `j_admin`;
CREATE TABLE `j_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `admin` varchar(20) NOT NULL COMMENT '管理员账号',
  `pwd` varchar(100) NOT NULL COMMENT '密码',
  `pwd_sut` varchar(10) NOT NULL COMMENT '管理员密码加密拼接',
  `cookie_sut` varchar(10) NOT NULL COMMENT 'cookie加密拼接',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of j_admin
-- ----------------------------
INSERT INTO `j_admin` VALUES ('1', 'admin', '0192023a7bbd73250516f069df18b500', 'ranglei', 'ranglei');

-- ----------------------------
-- Table structure for j_shop
-- ----------------------------
DROP TABLE IF EXISTS `j_shop`;
CREATE TABLE `j_shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT '商品名称-中文',
  `sn` varchar(10) NOT NULL,
  `name_en` varchar(100) NOT NULL COMMENT '商品名称-英文',
  `name_sh` varchar(100) NOT NULL COMMENT '商品名称-西班牙语',
  `name_fh` varchar(100) NOT NULL COMMENT '商品名称-法语',
  `content` varchar(1000) NOT NULL COMMENT '介绍',
  `content_en` varchar(1000) NOT NULL COMMENT '介绍-英文',
  `content_sh` varchar(1000) NOT NULL COMMENT '介绍-西班牙语',
  `content_fh` varchar(1000) NOT NULL COMMENT '介绍-法语',
  `price` varchar(10) NOT NULL COMMENT '价格',
  `y_price` varchar(10) NOT NULL COMMENT '美元价格',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of j_shop
-- ----------------------------
INSERT INTO `j_shop` VALUES ('1', '一次性防护口罩', 'k-001', 'Disposable protective mask', 'Máscaras de protección desechables', 'Masques de protection jetables', '<br>产品名称：一次性防护口罩\r\n规格型号：17.5cm*9.5cm  50片/盒\r\n防护效果等级：D级\r\n执行标准：GB/T  32610-2016\r\n卫生标准：GB15979\r\n保质期：1年\r\n本产品非医疗器械，仅供应急使用\r\n透气、防尘、滤菌', '<br>Product Name: Disposable protective mask\r\nSpecifications Model: 17.5cm * 9.5cm 50 pieces / box\r\nProtection Effect Level: D level\r\nExecutive Standard: GB / T 32610-2016\r\nHealth Standard: GB15979\r\nShelf Life: 1 year\r\nThis product is not a medical device, only for emergency use\r\nBreathable, dustproof, bacteria filter', '<br>Nombre del producto: máscara protectora desechable\r\nEspecificaciones Modelo: 17.5cm * 9.5cm 50 piezas / caja\r\nNivel de efecto de protección: nivel D\r\nEstándar ejecutivo: GB / T 32610-2016\r\nNorma de salud: GB15979\r\nVida útil: 1 año\r\nEste producto no es un dispositivo médico, solo para uso de emergencia\r\nFiltro de bacterias transpirable, a prueba de polvo.', '<br>Nom du produit: masque de protection jetable\r\nSpécifications Modèle: 17,5 cm * 9,5 cm 50 pièces / boîte\r\nNiveau d\'effet de protection: niveau D\r\nNorme exécutive: GB / T 32610-2016\r\nNorme sanitaire: GB15979\r\nDurée de conservation: 1 an\r\nCe produit n\'est pas un appareil médical, uniquement pour une utilisation d\'urgence\r\nFiltre bactérien respirant et étanche à la poussière', '￥350', '$60');
INSERT INTO `j_shop` VALUES ('2', 'KF94', 'k-002', 'KF94', 'KF94', 'KF94', '<br>1.加强加厚过滤层：柔软、亲肤、透气\r\n<br>2.四层防护超强过滤效率≥95%\r\n<br>3.有效阻断空气中的颗粒物，多重过滤结构可以阻挡飞沫\r\n<br>4.无纺布:阻止飞沫，防止PM2.5\r\n<br>5.静电熔喷布：加强加厚滤材，发挥过滤病毒关键滤材\r\n<br>6.软性亲肤无纺布：可防PM2.5，防湿', '<br>1. This product is not suitable for isolation ward (area), isolation ward (area), operating room, isolation intensive care unit and other areas.\r\n<br>2. Check that the mask packaging is intact\r\n<br>3. Wear masks for timely replacement, not recommended for long-term use\r\n<br>4. If there is any uncomfortable or adverse reaction during wearing, it is recommended to stop using it\r\n<br>5. The product should be stored in a dry, ventilated, non-corrosive gas environment\r\n<br>6. Recommended use time 4 hours', '<br>1. Este producto no es adecuado para sala de aislamiento (área), sala de aislamiento (área), sala de operaciones, unidad de cuidados intensivos de aislamiento y otras áreas.\r\n<br>2. Compruebe que el envase de la máscara esté intacto.\r\n<br>3. Use máscaras para el reemplazo oportuno, no recomendado para uso a largo plazo\r\n<br>4. Si hay alguna reacción incómoda o adversa durante el uso, se recomienda dejar de usarlo\r\n<br>5. El producto debe almacenarse en un ambiente de gas seco, ventilado y no corrosivo.\r\n<br>6. Tiempo de uso recomendado 4 horas', '<br>1. Ce produit ne convient pas aux salles d\'isolement (zone), aux salles d\'isolement (zone), à la salle d\'opération, à l\'unité de soins intensifs et aux autres zones.\r\n<br>2. Vérifiez que l\'emballage du masque est intact\r\n<br>3. Porter des masques pour un remplacement rapide, non recommandé pour une utilisation à long terme\r\n<br>4. S\'il y a une réaction inconfortable ou indésirable pendant le port, il est recommandé d\'arrêter de l\'utiliser\r\n<br>5. Le produit doit être stocké dans un environnement de gaz sec, aéré et non corrosif\r\n<br>6. Durée d\'utilisation recommandée 4 heures', '￥700', '$100');

-- ----------------------------
-- Table structure for j_user
-- ----------------------------
DROP TABLE IF EXISTS `j_user`;
CREATE TABLE `j_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `juan_email` varchar(50) NOT NULL,
  `sn` varchar(20) NOT NULL,
  `shou_name` varchar(50) NOT NULL,
  `shou_phone` varchar(50) NOT NULL,
  `shou_address` varchar(255) NOT NULL,
  `shou_zip` varchar(50) NOT NULL,
  `pz` varchar(255) NOT NULL COMMENT '凭证',
  `time` int(11) NOT NULL,
  `time_all` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT ' 0是待审核；1是通过；2是驳回',
  `shop_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of j_user
-- ----------------------------
INSERT INTO `j_user` VALUES ('3', '2427396682@qq.com', 'k-001', '李小龙', '15857397544', '上海浦东新区', '212145', '/imgs/2020/04/21/5e9e88a0cf624.764fee0d1e9211f9934d2ebc1b5d7d8.png', '1587447968', '2020-04-21 13:46:08', '0', '一次性防护口罩');
