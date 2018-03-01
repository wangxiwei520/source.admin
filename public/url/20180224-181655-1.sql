
-- -----------------------------
-- Table structure for `menu`
-- -----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=gbk;

-- -----------------------------
-- Records of `menu`
-- -----------------------------
INSERT INTO `menu` VALUES ('1', '系统首页', 'fa fa-home', '/admin/system/index', '0');
INSERT INTO `menu` VALUES ('2', '会员管理', 'fa fa-users', '', '0');
INSERT INTO `menu` VALUES ('3', '会员列表', 'fa fa-list', '/admin/admin/index', '2');
INSERT INTO `menu` VALUES ('4', '权限管理', 'fa fa-key', '', '0');
INSERT INTO `menu` VALUES ('5', '权限列表', 'fa fa-list', '/admin/auth/index', '4');
INSERT INTO `menu` VALUES ('6', '菜单管理', 'fa fa-list', '', '0');
INSERT INTO `menu` VALUES ('7', '菜单列表', 'fa fa-list', '/admin/menu/index', '6');
INSERT INTO `menu` VALUES ('40', '商品分类', 'fa fa-th-large', '', '0');
INSERT INTO `menu` VALUES ('41', '分类列表', 'fa fa-list', '/admin/category/index', '40');
INSERT INTO `menu` VALUES ('42', '分销管理', 'fa fa-modx', '', '0');
INSERT INTO `menu` VALUES ('43', '商品管理', 'fa fa-codepen', '', '0');
INSERT INTO `menu` VALUES ('44', '订单管理', 'fa fa-file-text', '', '0');
INSERT INTO `menu` VALUES ('45', '商家管理', 'fa fa-hand-rock-o', '', '0');
INSERT INTO `menu` VALUES ('46', '实时点餐详情', 'fa fa-spinner', '', '0');
INSERT INTO `menu` VALUES ('49', '微信管理', 'fa fa-wechat', '', '0');
INSERT INTO `menu` VALUES ('50', '关注回复设置', 'fa fa-weixin', '/admin/wechat/index', '49');
INSERT INTO `menu` VALUES ('51', '商品列表', 'fa fa-list', '/admin/goods/index', '43');
INSERT INTO `menu` VALUES ('52', '商家信息', 'fa fa-list', '/admin/shoop/index', '45');
INSERT INTO `menu` VALUES ('53', '聊天室', 'fa fa-list', '/admin/lts/index', '46');
