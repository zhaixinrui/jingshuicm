SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `jutianxia` ;
CREATE SCHEMA IF NOT EXISTS `jutianxia` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `jutianxia` ;

-- -----------------------------------------------------
-- Table `jutianxia`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `jutianxia`.`User` ;

CREATE TABLE IF NOT EXISTS `jutianxia`.`User` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL COMMENT '用户名',
  `nickname` VARCHAR(255) NULL COMMENT '昵称',
  `password` VARCHAR(255) NOT NULL COMMENT '密码',
  `email` VARCHAR(255) NULL COMMENT '邮箱',
  `phone` VARCHAR(255) NULL COMMENT '电话',
  `role` INT NOT NULL DEFAULT 2 COMMENT '角色：0管理员，1商家，2普通用户',
  `status` INT NOT NULL DEFAULT 0 COMMENT '状态：开通，封禁，暂时没用',
  `createTime` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  `updateTime` TIMESTAMP NULL COMMENT '更新时间，暂时没用',
  `lastLoginTime` TIMESTAMP NULL COMMENT '上次登录时间，暂时没用',
  `token` VARCHAR(255) NULL COMMENT '手机端登陆token',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jutianxia`.`Merchant`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `jutianxia`.`Merchant` ;

CREATE TABLE IF NOT EXISTS `jutianxia`.`Merchant` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userId` INT NOT NULL COMMENT '商户所有者的用户ID',
  `name` VARCHAR(255) NOT NULL COMMENT '商户名称',
  `phone` VARCHAR(45) NULL COMMENT '商户电话',
  `address` VARCHAR(255) NULL COMMENT '商户地址',
  `coordinate` VARCHAR(128) NULL COMMENT '商户坐标，内容为\"经度,维度\"',
  `introduction` VARCHAR(255) NULL COMMENT '商户介绍',
  `logo` VARCHAR(255) NULL COMMENT DEFAULT 'defaultlogo.png' '商户logo的名称',
  `category` VARCHAR(255) NULL DEFAULT 0 COMMENT '经营种类',
  `level` INT NULL DEFAULT 3 COMMENT '商户级别，1,2,3三个级别，一级是最高级会员',
  `promotionExpenses` INT NULL DEFAULT 0 COMMENT '推广费用，用来做排序依据，可能没用',
  PRIMARY KEY (`id`),
  INDEX `merchantUserId_idx` (`userId` ASC),
  CONSTRAINT `merchantUserId`
    FOREIGN KEY (`userId`)
    REFERENCES `jutianxia`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jutianxia`.`Activity`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `jutianxia`.`Activity` ;

CREATE TABLE IF NOT EXISTS `jutianxia`.`Activity` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `merchantId` INT NOT NULL COMMENT '发起活动的商家Id',
  `name` VARCHAR(225) NOT NULL COMMENT '活动名称',
  `introduction` VARCHAR(1024) NULL COMMENT '活动详情',
  `address` VARCHAR(225) NULL COMMENT '活动地址',
  `period` VARCHAR(225) NULL COMMENT '活动的有效时间',
  `phone` VARCHAR(45) NULL COMMENT '联系电话',
  `createTime` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `promotionExpenses` INT NULL DEFAULT 0 COMMENT '活动推广费，用来作为排序依据，可能没用',
  `category` VARCHAR(255) NULL DEFAULT 0 COMMENT '经营种类，与商家的种类相同，这张表里也放一个是为了做单表查询',
  PRIMARY KEY (`id`),
  INDEX `me_idx` (`merchantId` ASC),
  CONSTRAINT `activityMerchantId`
    FOREIGN KEY (`merchantId`)
    REFERENCES `jutianxia`.`Merchant` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jutianxia`.`Picture`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `jutianxia`.`Picture` ;

CREATE TABLE IF NOT EXISTS `jutianxia`.`Picture` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL COMMENT '图片的名字，用于访问该图片的参数',
  `type` VARCHAR(32) NOT NULL COMMENT '图片的类型，如商家图片，活动，商品',
  `foreignKey` INT NOT NULL COMMENT '关联的id，如type为商家，则foreignKey为商家Id。',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jutianxia`.`JoinActivity`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `jutianxia`.`JoinActivity` ;

CREATE TABLE IF NOT EXISTS `jutianxia`.`JoinActivity` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `activityId` INT NOT NULL COMMENT '参加活动的活动ID',
  `userId` INT NOT NULL COMMENT '参加活动的用户ID',
  `name` VARCHAR(255) NOT NULL COMMENT '客户尊称',
  `phone` VARCHAR(45) NOT NULL COMMENT '客户电话',
  `address` VARCHAR(255) NULL COMMENT '客户住址',
  `houseArea` INT NULL COMMENT '客户房子面积',
  `status` VARCHAR(255) NULL COMMENT '状态，是否联系等，保留自动，暂时没用',
  `createTime` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP COMMENT '提交时间',
  PRIMARY KEY (`id`),
  INDEX `activitId_idx` (`activityId` ASC),
  INDEX `userId_idx` (`userId` ASC),
  CONSTRAINT `joinActivitId`
    FOREIGN KEY (`activityId`)
    REFERENCES `jutianxia`.`Activity` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `joinUserId`
    FOREIGN KEY (`userId`)
    REFERENCES `jutianxia`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jutianxia`.`Comment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `jutianxia`.`Comment` ;

CREATE TABLE IF NOT EXISTS `jutianxia`.`Comment` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userId` INT NOT NULL,
  `merchantId` INT NOT NULL COMMENT '商家Id，后台管理按此id查询到一个商家的所有分类评论。',
  `type` VARCHAR(32) NOT NULL COMMENT '评论的类型，如商家，活动，商品',
  `foreignKey` INT NOT NULL COMMENT '关联的id，如type为商家，则foreignKey为商家Id。',
  `comment` VARCHAR(1024) NOT NULL COMMENT '评论的内容',
  `status` INT NOT NULL DEFAULT 0 COMMENT '状态：0未审核，-1审核未通过，1审核通过',
  `createTime` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP COMMENT '提交时间',
  `updateTime` TIMESTAMP NULL COMMENT '审批时间',
  PRIMARY KEY (`id`),
  INDEX `userId_idx` (`userId` ASC),
  CONSTRAINT `commentUserId`
    FOREIGN KEY (`userId`)
    REFERENCES `jutianxia`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jutianxia`.`Goods`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `jutianxia`.`Goods` ;

CREATE TABLE IF NOT EXISTS `jutianxia`.`Goods` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `merchantId` INT NOT NULL COMMENT '本产品所属商家ID，',
  `name` VARCHAR(225) NOT NULL COMMENT '商品名称',
  `introduction` VARCHAR(1024) NULL COMMENT '商品介绍',
  `price` FLOAT NOT NULL COMMENT '商品原价',
  `promotionPrice` FLOAT NULL COMMENT '商品促销价',
  `category` VARCHAR(255) NULL DEFAULT 0 COMMENT '经营种类',
  `createTime` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP COMMENT '提交时间',
  PRIMARY KEY (`id`),
  INDEX `merchantId_idx` (`merchantId` ASC),
  CONSTRAINT `goodsMerchantId`
    FOREIGN KEY (`merchantId`)
    REFERENCES `jutianxia`.`Merchant` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jutianxia`.`Favorite`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `jutianxia`.`Favorite` ;

CREATE TABLE IF NOT EXISTS `jutianxia`.`Favorite` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userId` INT NOT NULL COMMENT '本搜藏所属用户ID',
  `type` VARCHAR(32) NOT NULL COMMENT '收藏的类型，如0商家图片，1活动，2商品',
  `foreignKey` INT NOT NULL COMMENT '关联的id，如type为商家，则foreignKey为商家Id。',
  `createTime` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP COMMENT '提交时间',
  PRIMARY KEY (`id`),
  INDEX `userId_idx` (`userId` ASC),
  CONSTRAINT `favoriteUserId`
    FOREIGN KEY (`userId`)
    REFERENCES `jutianxia`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jutianxia`.`Apply`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `jutianxia`.`Apply` ;

CREATE TABLE IF NOT EXISTS `jutianxia`.`Apply` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userId` INT NOT NULL,
  `content` VARCHAR(1024) NOT NULL COMMENT '申请的内容',
  `email` VARCHAR(255) NULL COMMENT '邮箱',
  `phone` VARCHAR(255) NOT NULL COMMENT '电话',
  `status` INT NOT NULL DEFAULT 0 COMMENT '状态：0未审核，-1审核未通过，1审核通过',
  `createTime` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP COMMENT '提交时间',
  `updateTime` TIMESTAMP NULL COMMENT '审批时间',
  PRIMARY KEY (`id`),
  INDEX `userId_idx` (`userId` ASC),
  CONSTRAINT `applyUserId`
    FOREIGN KEY (`userId`)
    REFERENCES `jutianxia`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jutianxia`.`OrderGoods`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `jutianxia`.`OrderGoods` ;

CREATE TABLE IF NOT EXISTS `jutianxia`.`OrderGoods` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `goodsId` INT NOT NULL COMMENT '订购商品的商品ID',
  `userId` INT NOT NULL COMMENT '订购商品的用户ID',
  `name` VARCHAR(255) NOT NULL COMMENT '客户尊称',
  `phone` VARCHAR(45) NOT NULL COMMENT '客户电话',
  `address` VARCHAR(255) NULL COMMENT '客户住址',
  `houseArea` INT NULL COMMENT '客户房子面积',
  `status` VARCHAR(255) NULL COMMENT '状态，是否联系等，保留自动，暂时没用',
  `createTime` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP COMMENT '提交时间',
  PRIMARY KEY (`id`),
  INDEX `userId_idx` (`userId` ASC),
  INDEX `orderGoodsId_idx` (`goodsId` ASC),
  CONSTRAINT `orderGoodsId`
    FOREIGN KEY (`goodsId`)
    REFERENCES `jutianxia`.`Goods` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `orderUserId`
    FOREIGN KEY (`userId`)
    REFERENCES `jutianxia`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jutianxia`.`RankList`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `jutianxia`.`RankList` ;

CREATE TABLE IF NOT EXISTS `jutianxia`.`RankList` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `merchantId` INT NULL COMMENT '商户的ID',
  `type` VARCHAR(32) NOT NULL COMMENT '排行依据：搜索排行，口碑排行',
  `category` VARCHAR(32) NOT NULL COMMENT '经营种类',
  `rank` INT NOT NULL COMMENT '排行榜的名次，1-10',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `jutianxia`.`HotActivity` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `category` VARCHAR(32) NOT NULL COMMENT '经营种类',
  `activityId` INT NULL COMMENT '活动的ID',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
