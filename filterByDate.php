<?php
// Initialize the session
session_start();
 
$_SESSION['script'] = "";
 
// Define variables and initialize with empty values
$dateFrom = $dateTo=  $email =  "";
$errdateF = $errdateT  = $email_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    // Validate new password
    if($_POST["email"] == "" ){
        $email_err = "Incorrect email";     
    } else{
        $email = trim($_POST["email"]);
            

    if($_POST["dateFrom"] == "" ){
        $errorFirstName = "Incorrect firstName";     
    } else{
        $dateFrom = trim($_POST["dateFrom"]);
            

        if($_POST["dateTo"] == "" ){
            $errorLastName = "lastName not found in our database";     
        } else{
            $dateTo = trim($_POST["dateTo"]);

             $_SESSION['script'] = "SELECT `Users`.`userId`, `Users`.`firstName`, `Users`.`lastName`, `Users`.`email`, `Department`.`departmentId`,
             `Users`.`departmentId`, `Department`.`departmentName`, `Users`.`profession`, `Users`.`email`,
             `Users`.`level`,`Users`.`lastName`, `Attendence`.`Month`, `Attendence`.`userId`
             FROM `Users`, `Department`, `Attendence`
             Where `Users`.`departmentId` = `Department`.`departmentId` and `Users`.`userId` = `Attendence`.`userId` 
             and  `Users`.`email` = '$email'
             and `Attendence`.`Month` >= '$dateFrom' and `Attendence`.`Month` <= '$dateTo'";
             
            //  echo $_SESSION['script'];

             
             header('location: project.php');


            }
        }

        header('location: project.php');
   }   
}
    
?>

  




    
   