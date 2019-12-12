<?php
// Initialize the session
session_start();
 
$_SESSION['script'] = "";
 
// Define variables and initialize with empty values
$searchFirstName = $searchLastName =  "";
$errorFirstName = $errorLastName  = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if($_POST["firstName"] == "" ){
        $errorFirstName = "Incorrect firstName";     
    } else{
        $searchFirstName = trim($_POST["firstName"]);
            

        if($_POST["lastName"] == "" ){
            $errorLastName = "lastName not found in our database";     
        } else{
            $searchLastName = trim($_POST["lastName"]);

             $_SESSION['searchFirstName'] =   $searchFirstName;
             $_SESSION['searchLastName'] =   $searchLastName;
             $firstNameSearch =  $_SESSION['searchFirstName'];
             $lastNameSearch = $_SESSION['searchLastName'];
             echo $_SESSION['searchFirstName'];
             echo $_SESSION['searchLastName'];
             
             
             $_SESSION['script'] = "SELECT `Users`.`userId`, `Users`.`firstName`, `Users`.`lastName`, `Users`.`email`, `Department`.`departmentId`,
             `Users`.`departmentId`, `Department`.`departmentName`, `Users`.`profession`, `Users`.`email`,
             `Users`.`level`,`Users`.`lastName`
             FROM `Users`, `Department`
             Where `Users`.`departmentId` = `Department`.`departmentId` and `Users`.`firstName` = '$firstNameSearch' and `Users`.`lastName` = '$lastNameSearch' ";
             
             echo $_SESSION['script'];
            
             
             header('location: project.php');


            }
        }

        header('location: project.php');
       }
    
?>

  




    
   