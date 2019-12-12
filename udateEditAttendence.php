<?php
session_start();
$val = $_SESSION['varteNum'];
// all needed information to update the Attendence




$week = $_SESSION["updWeek"];
$DayWeek =$_SESSION["dayWeek"] ;
$dateFrom = $_SESSION["updDate"] ;   
$level =$_SESSION["apdLevel"];
$departmentName =$_SESSION["updLevel"] ;
$courseName =$_SESSION["updCourse"] ;   
$cohort =$_SESSION["updCohort"] ;
// echo $facilitator."</br>".$attWeek."</br>".$attDepart."</br>".$attCourse."</br>";

// Transform the date into the week day
include 'connect.php';



// Let update when user click on submit button
include 'connect.php';
   if($_SERVER["REQUEST_METHOD"] == "POST"){
       for ($i=0; $i < $val ; $i++) { 
           $name = "record".$i;
           $email = "email".$i;
        // echo  $_POST["$email"]." ".$_POST["$name"];
           $_status = $_POST["$name"];
           $_email = $_POST["$email"];
       

            $insert = "UPDATE `dashboard`.`$week` 
                       SET `$DayWeek`= '$_status'
                       where `email` = '$_email' ";
            $insertIt= mysqli_query($connect, $insert); 
            // $insertData = mysqli_fetch_all($insertIt, MYSQLI_ASSOC);
        
        }

    

    }
    header('location: project.php');


?>