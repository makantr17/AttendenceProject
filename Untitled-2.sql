CREATE TABLE IF NOT EXISTS `mamady`.`Users` (
  `userId` INT NOT NULL AUTO_INCREMENT,
  `firstName` VARCHAR(45) NOT NULL,
  `lastName` VARCHAR(45) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `phoneNumber` VARCHAR(45) NULL,
  `role` VARCHAR(45) NULL,
  `isVerified` TINYINT NULL,
  PRIMARY KEY (`userId`))
ENGINE = InnoDB;
