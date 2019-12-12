<?php
// Initialize the session
session_start();

$_SESSION['script'] = "";
 
// Define variables and initialize with empty values
$departmentName = $courseName = $level = $cohort= $dateFrom =  $dateTo = "";
$depart_err = $course_err = $level_err = $cohort_err =$from_err = $to_errr ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if ($_POST["cohort"] == "" ) {
        $cohort_err = "Please select your cohort";
    }
    else{
        $cohort = trim($_POST["cohort"]);
    
    if($_POST["department"] == "Choose the Department" ){
        $depart_err = "Pleas select your Department";     
    } else{
        $departmentName = trim($_POST["department"]);
            

        if($_POST["level"] == "Choose the Level" ){
            $level_err = "Pleas select your Level";     
        } else{
            $level = trim($_POST["level"]);
                
                if($_POST["course"] == "Choose the Course" ){
                    $course_err = "Pleas select your Course";     
                } else{
                    $courseName = trim($_POST["course"]);

                    if ($_POST["From"] == "") {
                        $from_err = "Choose the right date";
                    }
                    else {
                        $dateFrom = trim($_POST["From"]);


                        if ($_POST["To"] == "") {
                            $to_errr = "Choose the right date";
                        }
                        else {
                            $dateTo = trim($_POST["To"]);



                            $_SESSION['script'] = "SELECT `Users`.`userId`, `Users`.`firstName`, `Users`.`lastName`, `Users`.`email`, `Department`.`departmentId`,
                            `Users`.`departmentId`, `Department`.`departmentName`, `Users`.`profession`, `Users`.`email`,
                            `Users`.`level`,`Users`.`lastName`, `Course`.`courseName`, `Attendence`.`Month`, `Attendence`.`userId`, `Users`.`cohort`, `Attendence`.`departmentId`
                            FROM `Users`, `Department`,`Attendence`, `Course`
                            Where `Users`.`departmentId` = `Department`.`departmentId` and `Attendence`.`userId` = `Users`.`userId` 
                            and `Department`.`departmentId` = `Attendence`.`departmentId` and `Course`.`courseName` = '$courseName' and
                            `Users`.`level` = '$level' and `Department`.`departmentName` = '$departmentName' and `Users`.`cohort`= '$cohort' and
                            `Attendence`.`Month` >= '$dateFrom' and `Attendence`.`Month` <= '$dateTo' ";

                            //  echo $_SESSION['script'];
                             header('location: project.php');
                        }
                    }

               


               


            }
        }


       }
    
  }
}
?>

  




    
   