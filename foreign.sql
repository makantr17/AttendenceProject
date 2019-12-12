ALTER TABLE `Users`
ADD FOREIGN KEY (`departmentId`) REFERENCES `Department`(`departmentId`);
