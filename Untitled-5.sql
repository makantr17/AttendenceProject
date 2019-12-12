SELECT `Users`.`userId`, `Department`.`departmentId`,
`Attendence`.`numberAttended`, `Attendence`.`dateCreated`,
`Attendence`.`courseId`, `Attendence`.`departmentId`, `Users`.`departmentId`, `Department`.`departmentName`, `Users`.`departmentId`,
 `Users`.`level`, `Course`.`courseId`, `Course`.`courseName`, `Course`.`departmentId`
FROM `Users`, `Department`, `Course`, `Attendence`
Where `Attendence`.`userId` = `Users`.`userId` and `Attendence`.`departmentId` = `Department`.`departmentId`
and `Users`.`level` = 'YEAR3' and `Course`.`courseName` = 'System Programming' and `Attendence`.`departmentId` = `Department`.`departmentId`;