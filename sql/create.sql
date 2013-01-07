CREATE  TABLE `kohana`.`notes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `isActive` BIT NULL DEFAULT 0,
  `parent_id` INT NULL,
  `left_id` INT NULL,
  `right_id` INT NULL,
  `depth` INT NULL,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) );
  
  CREATE  TABLE `kohana`.`noteStatus` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `description` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) );
  
  CREATE  TABLE `kohana`.`noteContent` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `content` VARCHAR(2000) NULL ,
  `date_created` DATE NULL ,
  `date_planned_ended` DATE NULL ,
  `date_ended` DATE NULL ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  PRIMARY KEY (`id`) );
  
  CREATE  TABLE `kohana`.`user_note` (
  `user_id` INT NOT NULL ,
  `note_id` INT NOT NULL );
  
  CREATE  TABLE `kohana`.`note_noteStatus` (
  `note_id` INT NOT NULL ,
  `noteStatus_id` INT NOT NULL );
  
  CREATE  TABLE `kohana`.`note_noteContent` (
  `note_id` INT NOT NULL ,
  `noteContent_id` INT NOT NULL );
  
  ALTER TABLE `kohana`.`users` ADD COLUMN `isActive` BIT NULL DEFAULT 0  AFTER `last_login` ;