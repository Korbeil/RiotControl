
-- `gameStats` database

--CREATE DATABASE `gameStats`;
USE `gameStats`;

CREATE TABLE `i18n` (
	`id` INTEGER NOT NULL,
	`langage` CHAR(4) NOT NULL,
	`text` TEXT NOT NULL,
	
	PRIMARY KEY( `id`, `langage`)
	
) ENGINE=InnoDB;

CREATE TABLE `items` (
	`id` INTEGER NOT NULL,
	`name` INTEGER NULL DEFAULT NULL, 			-- TEXT
	`description` INTEGER NULL DEFAULT NULL, 	-- TEXT
	`iconPath` CHAR(255) NOT NULL,
	`price` INTEGER NOT NULL,
	
	`flatHPPoolMod` REAL NOT NULL DEFAULT 0,
	`flatMPPoolMod` REAL NOT NULL DEFAULT 0,
	`percentHPPoolMod` REAL NOT NULL DEFAULT 0,
	`percentMPPoolMod` REAL NOT NULL DEFAULT 0,
	`flatHPRegenMod` REAL NOT NULL DEFAULT 0,
	`percentHPRegenMod` REAL NOT NULL DEFAULT 0,
	`flatMPRegenMod` REAL NOT NULL DEFAULT 0,
	`percentMPRegenMod` REAL NOT NULL DEFAULT 0,
	`flatArmorMod` REAL NOT NULL DEFAULT 0,
	`percentArmorMod` REAL NOT NULL DEFAULT 0,
	`flatAttackDamageMod` REAL NOT NULL DEFAULT 0,
	`percentAttackDamageMod` REAL NOT NULL DEFAULT 0,
	`flatAbilityPowerMod` REAL NOT NULL DEFAULT 0,
	`percentAbilityPowerMod` REAL NOT NULL DEFAULT 0,
	`flatMovementSpeedMod` REAL NOT NULL DEFAULT 0,
	`percentMovementSpeedMod` REAL NOT NULL DEFAULT 0,
	`flatAttackSpeedMod` REAL NOT NULL DEFAULT 0,
	`percentAttackSpeedMod` REAL NOT NULL DEFAULT 0,
	`flatDodgeMod` REAL NOT NULL DEFAULT 0,
	`percentDodgeMod` REAL NOT NULL DEFAULT 0,
	`flatCritChanceMod` REAL NOT NULL DEFAULT 0,
	`percentCritChangeMod` REAL NOT NULL DEFAULT 0,
	`flatCritDamageMod` REAL NOT NULL DEFAULT 0,
	`percentCritDamageMod` REAL NOT NULL DEFAULT 0,
	`flatMagicResistMod` REAL NOT NULL DEFAULT 0,
	`percentMagicResistMod` REAL NOT NULL DEFAULT 0,
	`flatEXPBonus` REAL NOT NULL DEFAULT 0,
	`percentEXPBonus` REAL NOT NULL DEFAULT 0,
	
	`epicness` INTEGER NOT NULL DEFAULT 0,
	
	PRIMARY KEY ( `id`),
	
	FOREIGN KEY ( `name`) REFERENCES `i18n`( `id`),
	FOREIGN KEY ( `description`) REFERENCES `i18n`( `id`),
	
	INDEX( `name`)
	
) ENGINE=InnoDB;


CREATE TABLE `itemRecipes` (
	`id` INTEGER NOT NULL,
	`recipeItemId` INTEGER NOT NULL,
	`buildsToItemId` INTEGER NOT NULL,
	
	PRIMARY KEY ( `id`),
	
	FOREIGN KEY( `recipeItemId`) REFERENCES `items`( `id`),
	FOREIGN KEY( `buildsToItemId`) REFERENCES `items`( `id`)
			
) ENGINE=InnoDB;


CREATE TABLE `itemCategories` (
	`id` INTEGER NOT NULL,
	`name` CHAR(23) NOT NULL,
	
	PRIMARY KEY( `id`)
		
) ENGINE=InnoDB;


CREATE TABLE `itemItemCategories` (
	`id` INTEGER NOT NULL,
	`itemId` INTEGER NOT NULL,
	`itemCategoryId` INTEGER NOT NULL,
	
	PRIMARY KEY ( `id`),
	
	FOREIGN KEY ( `itemId`) REFERENCES `items`( `id`),
	FOREIGN KEY ( `itemCategoryId`) REFERENCES `itemCategories`( `id`)
	
) ENGINE=InnoDB;

CREATE TABLE `champions` (
	`id` INTEGER NOT NULL,
	
	`name` INTEGER NULL DEFAULT NULL,
	`displayName` INTEGER NULL DEFAULT NULL,
	`title` INTEGER NULL DEFAULT NULL,
	`iconPath` CHAR(255) NOT NULL,
	`portraitPath` CHAR(255) NOT NULL,
	`splashPath` CHAR(255) NOT NULL,
	`danceVideoPath` CHAR(255) NOT NULL,
	`tags` TEXT NOT NULL,
	`description` INTEGER NULL DEFAULT NULL,
	`quote` INTEGER NULL DEFAULT NULL,
	`quoteAuthor` INTEGER NULL DEFAULT NULL,
	
	`range` REAL NOT NULL DEFAULT 0,
	`moveSpeed` REAL NOT NULL DEFAULT 0,
	`armorBase` REAL NOT NULL DEFAULT 0,
	`armorLevel` REAL NOT NULL DEFAULT 0,
	`manaBase` REAL NOT NULL DEFAULT 0,
	`manaLevel` REAL NOT NULL DEFAULT 0,
	`criticalChanceBase` REAL NOT NULL DEFAULT 0,
	`criticalChanceLevel` REAL NOT NULL DEFAULT 0,
	`manaRegenBase` REAL NOT NULL DEFAULT 0,
	`manaRegenLevel` REAL NOT NULL DEFAULT 0,
	`healthRegenBase` REAL NOT NULL DEFAULT 0,
	`healthRegenLevel` REAL NOT NULL DEFAULT 0,
	`magicResistBase` REAL NOT NULL DEFAULT 0,
	`magicResistLevel` REAL NOT NULL DEFAULT 0,
	`healthBase` REAL NOT NULL DEFAULT 0,
	`healthLevel` REAL NOT NULL DEFAULT 0,
	`attackBase` REAL NOT NULL DEFAULT 0,
	`attackLevel` REAL NOT NULL DEFAULT 0,
	
	`ratingDefense` INTEGER NOT NULL,
	`ratingMagic` INTEGER NOT NULL,
	`ratingDifficulty` INTEGER NOT NULL,
	`ratingAttack` INTEGER NOT NULL,
	
	`tips` INTEGER NOT NULL,
	`opponentTips` INTEGER NOT NULL,
	`selectSoundPath` CHAR(255) NOT NULL,
	
	PRIMARY KEY ( `id`),
	
	FOREIGN KEY ( `name`) REFERENCES `i18n`( `id`),
	FOREIGN KEY ( `displayName`) REFERENCES `i18n`( `id`),
	FOREIGN KEY ( `title`) REFERENCES `i18n`( `id`),
	FOREIGN KEY ( `description`) REFERENCES `i18n`( `id`),
	FOREIGN KEY ( `quote`) REFERENCES `i18n`( `id`),
	FOREIGN KEY ( `quoteAuthor`) REFERENCES `i18n`( `id`)
	
) ENGINE=InnoDB;

CREATE TABLE `searchTags` (
	`id` INT NOT NULL,
	`name` CHAR(255) NOT NULL,
	`displayName` INT NOT NULL,
	
	PRIMARY KEY( `id`)
	
) ENGINE=InnoDB;

CREATE TABLE `championSkins` (
	`id` INTEGER NOT NULL,
	`isBase` BOOLEAN NOT NULL,
	`rank` INTEGER NOT NULL,
	`championId` INTEGER NOT NULL,
	`name` INTEGER NULL DEFAULT NULL,
	`displayName` INTEGER NULL DEFAULT NULL,
	`portraitPath` CHAR(255) NOT NULL,
	`splashPath` CHAR(255) NOT NULL,
	
	PRIMARY KEY ( `id`),
	FOREIGN KEY ( `championId`) REFERENCES `champions`( `id`),
	
	FOREIGN KEY ( `name`) REFERENCES `i18n`( `id`),
	FOREIGN KEY ( `displayName`) REFERENCES `i18n`( `id`)
	
) ENGINE=InnoDB;

CREATE TABLE `championSearchTags` (
	`id` INTEGER NOT NULL,
	`championId` INTEGER NOT NULL,
	`searchTagId` INTEGER NOT NULL,

	PRIMARY KEY( `id`),
	FOREIGN KEY ( `championId`) REFERENCES `champions`( `id`),
	FOREIGN KEY ( `searchTagId`) REFERENCES `searchTags`( `id`)
	
) ENGINE=InnoDB;

CREATE TABLE `championItems` (
	`id` INTEGER NOT NULL,
	`championId` INTEGER NOT NULL,
	`itemId` INTEGER NOT NULL,
	`gameMode` CHAR(8) NOT NULL,
	
	PRIMARY KEY ( `id`),
	FOREIGN KEY ( `championId`) REFERENCES `champions`( `id`),
	FOREIGN KEY ( `itemId`) REFERENCES `items`( `id`)
		
) ENGINE=InnoDB;

CREATE TABLE `championAbilities` (
	`id` INTEGER NOT NULL,
	`rank` INTEGER NOT NULL,
	`championId` INTEGER NOT NULL,
	`name` INTEGER NULL DEFAULT NULL,
	`cost` CHAR(32) NOT NULL,
	`cooldown` CHAR(32) NOT NULL,
	`iconPath` CHAR(255) NOT NULL,
	`videoPath` CHAR(255) NOT NULL,
	`range` INTEGER NOT NULL,
	`effect` INTEGER NULL DEFAULT NULL,
	`description` INTEGER NULL DEFAULT NULL,
	`hotkey` CHAR(1) NOT NULL,
	
	PRIMARY KEY ( `id`),
	FOREIGN KEY ( `championId`) REFERENCES `champions`( `id`),
	
	FOREIGN KEY ( `name`) REFERENCES `i18n`( `id`),
	FOREIGN KEY ( `effect`) REFERENCES `i18n`( `id`),
	FOREIGN KEY ( `description`) REFERENCES `i18n`( `id`)
	
) ENGINE=InnoDB;



