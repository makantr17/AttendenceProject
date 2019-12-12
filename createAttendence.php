<?php
// Initialize the session
session_start();
 
 
// Define variables and initialize with empty values
$attendenceName = $creationDate = $choseDepart = $choseLevel = $choseCohort= $choseCourse= $choseWeek= "";
$nameA_err = $dateA_err = $departA_err = $levelA_err = $cohortA_err =$courseA_err= $week_err= "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    
    if($_POST["attendenceName"] == "None" ){
        $nameA_err = "Name the Attendence";     
    } else{
        $attendenceName = trim($_POST["attendenceName"]);
            

        if($_POST["createDate"] == "None" ){
            $dateA_err = "Please Select the creation Date";     
        } else{
            $creationDate = trim($_POST["createDate"]);

          if($_POST["choseWeek"] == "None" ){
                $week_err = "Please Select the right Week";     
            } else{
                $choseWeek = trim($_POST["choseWeek"]);
    

            if($_POST["choseLevel"] == "None" ){
                $levelA_err = "Pleas select your Course";     
            } else{
                $choseLevel = trim($_POST["choseLevel"]);  
                
                
                if($_POST["choseDepart"] == "None" ){
                    $departA_err = "Please Select the creation Date";     
                } else{
                    
                    $choseDepart = trim($_POST["choseDepart"]);

                    if($_POST["choseCourse"] == "None" ){
                        $courseA_err = "Pleas select your Course";     
                    } else{
                        $choseCourse = trim($_POST["choseCourse"]);  



                        if($_POST["choseCohort"] == "None" ){
                            $cohortA_err = "Pleas select your Cohort";     
                        } else{
                            $choseCohort = trim($_POST["choseCohort"]);

                        // create the session

                        $_SESSION["attWeek"] = $choseWeek;
                        $_SESSION["attName"] = $attendenceName;
                        $_SESSION["attDate"] = $creationDate;   
                        $_SESSION["attLevel"] = $choseLevel;
                        $_SESSION["attDepart"] = $choseDepart;
                        $_SESSION["attCourse"] = $choseCourse;   
                        $_SESSION["attCohort"] = $choseCohort;


                        header('location: createdAttendence.php');


            }
        }
    }

       }
    }
}
}
}
?>

  




    
   