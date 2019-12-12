<?php
// Initialize the session
session_start();
 
$_SESSION['script'] == "";
// Define variables and initialize with empty values
$departmentName = $courseName = $level = $timeTo = $timeFrom =  $userEm =  "";
$depart_err = $course_err = $level_err = $timeF_err = $timeT_err = $email_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if($_POST["userEmails"] == "None" ){
        $email_err = "Pleas select email";     
    } else{
        $userEm = trim($_POST["userEmails"]);
       

    // Validate new password
    if($_POST["department"] == "None" ){
        $depart_err = "Pleas select your Department";     
    } else{
        $departmentName = trim($_POST["department"]);
            

        if($_POST["level"] == "None" ){
            $level_err = "Pleas select your Level";     
        } else{
            $level = trim($_POST["level"]);

            if($_POST["course"] == "None" ){
                $course_err = "Pleas select your Course";     
            } else{
                $courseName = trim($_POST["course"]);  
                
                if($_POST["course"] == "None" ){
                    $course_err = "Pleas select your Course";     
                } else{
                    $courseName = trim($_POST["course"]);

                    if($_POST["timeFrom"] == "None" ){
                        $timeF_err = "Pleas select your Course";     
                    } else{
                        $timeFrom = trim($_POST["timeFrom"]);

                        if($_POST["timeTo"] == "None" ){
                            $timeT_err = "Pleas select your Course";     
                        } else{
                            $timeTo = trim($_POST["timeTo"]);

                            // create the session
                            // $_SESSION["department"] = $departmentName;
                            // $_SESSION["course"] = $courseName;   
                            // $_SESSION["level"] = $level;

                            $_SESSION['script'] = "SELECT `Users`.`userId`, `Users`.`firstName`, `Users`.`lastName`, `Users`.`email`, `Department`.`departmentId`,
                            `Users`.`departmentId`, `Department`.`departmentName`, `Users`.`profession`, `Users`.`email`,
                            `Users`.`level`,`Users`.`lastName`, `Course`.`courseName`, `Attendence`.`Month`
                            FROM `Users`, `Department`,`Attendence`, `Course`
                            Where `Users`.`departmentId` = `Department`.`departmentId` and `Attendence`.`userId` = `Users`.`userId` and `Users`.`email`= '$userEm'
                            and `Department`.`departmentId` = `Attendence`.`departmentId` and `Course`.`courseName` = '$courseName' and
                            `Users`.`level` = '$level' and `Department`.`departmentName` = '$departmentName' and
                            `Attendence`.`Month` >= '$timeFrom' and `Attendence`.`Month` <= '$timeTo' ";
                            // echo   $_SESSION['script'];

                            header('location: project.php');


            }
        }
    

       }
    }
}
    }
}
}

?>