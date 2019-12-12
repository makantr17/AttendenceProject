SELECT `Users`.`userId`, `Users`.`firstName`, `Users`.`lastName`, `Users`.`email`, `Department`.`departmentId`,
        `Users`.`departmentId`, `Department`.`departmentName`, `Users`.`profession`, `Users`.`email`,
        `Users`.`level`,`Users`.`lastName`, `Course`.`courseName`, `Attendence`.`Month`
        FROM `Users`, `Department`,`Attendence`, `Course`
        Where `Users`.`departmentId` = `Department`.`departmentId` and `Attendence`.`userId` = `Users`.`userId` 
        and `Department`.`departmentId` = `Attendence`.`departmentId` and `Course`.`courseName` = 'System Programming' and
        `Users`.`level` = 'YEAR3' and `Department`.`departmentName` = 'Computer Science' and
        `Attendence`.`Month` > '2019-11-06' and `Attendence`.`Month` <= '2019-11-12' 