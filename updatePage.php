<?php  
session_start(); 

include 'connect.php';

// Profile user
$userId = $_SESSION["userId"];
$email = $_SESSION["email"];

$fetch = "SELECT * from `Users` where `Users`.`email` = '$email'";
$resultFetch= mysqli_query($connect, $fetch); 
$fetchData = mysqli_fetch_all($resultFetch, MYSQLI_ASSOC);


// $take = "SELECT * From `Users` Limit 1000";
// $takeIt= mysqli_query($connect, $take); 
// $takeData = mysqli_fetch_all($takeIt, MYSQLI_ASSOC);

// $counter=1;
// foreach ($takeData as $top) {

//     $emailF = $top['email'];
// $insert = "INSERT into `Week3`(`email`, `Id`) values('$emailF', '$counter')";
// $insertIt= mysqli_query($connect, $insert); 
// $insertData = mysqli_fetch_all($insertIt, MYSQLI_ASSOC);
// $counter = $counter + 1;
// }


// $attendenceName  = $_SESSION["attName"] ;
// $attDate = $_SESSION["attDate"]  ;   
// $attLevel = $_SESSION["attLevel"] ;
// $attDepart = $_SESSION["attDepart"] ;
// $attCourse = $_SESSION["attCourse"] ;   
// $attCohort = $_SESSION["attCohort"] ;
// $attWeek = $_SESSION["attWeek"] ;

$week = $_SESSION["updWeek"];
$DayWeek =$_SESSION["dayWeek"] ;
$dateFrom = $_SESSION["updDate"] ;   
$level =$_SESSION["apdLevel"];
$departmentName =$_SESSION["updLevel"] ;
$courseName =$_SESSION["updCourse"] ;   
$cohort =$_SESSION["updCohort"] ;



?>

<?php 
     include 'connect.php';
    // Fetch information about User profile
     $sql  = "SELECT Distinct `Users`.`userId`, `Users`.`firstName`, `Users`.`lastName`, `Users`.`email`, 
     `Users`.`profession`, `Users`.`email`, `Users`.`departmentId`, `Users`.`cohort`, `Course`.`departmentId`,
     `Users`.`level`, `Users`.`cohort`, `Department`.`departmentId`, `Course`.`courseName`, `Department`.`departmentName`,
     `RecordAtt`.`date`, `RecordAtt`.`user`, `RecordAtt`.`courseName`, `RecordAtt`.`departName`, `RecordAtt`.`week`, `RecordAtt`.`dayOfWeek`,
     `$week`.`email`, `$week`.`$DayWeek`
      FROM `Users`, `RecordAtt`, `$week`, `Course`, `Department`
      Where `Users`.`email` = `$week`.`email`  and `RecordAtt`.`courseName` = '$courseName' and `RecordAtt`.`dayOfWeek` = '$DayWeek' and
     `Users`.`level` = '$level' and `RecordAtt`.`departName` = '$departmentName' and `Users`.`cohort`= '$cohort' and
     `RecordAtt`.`date` = '$dateFrom' and `Users`.`departmentId` = `Department`.`departmentId` and `Course`.`departmentId` = `Department`.`departmentId`
     and `Course`.`courseName` = '$courseName' and `Department`.`departmentName` = '$departmentName'";
    
    echo $sql;
     $result= mysqli_query($connect, $sql); 
     $tes2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>








<!DOCTYPE html>  
     
<html>
     <head>
         <link rel="stylesheet" href="styleCreatedAtt.css">
         <title>Dashboard/CreateAttendence</title>
     </head>
    
    <body>

    <section id="sectionStyle">
      
         <div id="profile">
               
               <?php  foreach ($fetchData as $fetchResult) {
                  ?>
               <img src="/image/">
               <h2><?php echo $fetchResult['firstName']." ".$fetchResult['lastName']; ?></h2>
               <h2><?php echo $fetchResult['email']; ?></h2>
               <h2><?php echo $fetchResult['profession']." ".$fetchResult['level']; ?></h2>
            
               <?php } ?>
         </div>

         <div id="attInfo">
             
             <h2><?php echo $dateFrom; ?></h2>
             <h2><?php echo $week; ?></h2>

        </div>
        <!-- This is the form of updating the new Attendence -->
         <form name="update" method="post" action="udateEditAttendence.php"> 

         <div id="tableStyle">  
         <table>
                 <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Department Name</th>
                    <th>Course Name</th>
                    <th>New Update</th>

                 </tr>

                 <?php
                 
                 if ($fetchResult['profession'] == 'Student') {
                ?>
                <h1>You don't have acess to Take Attendence</h1>

                <?php  
                 }
                 else if ($fetchResult['profession'] == "Facilitator") {
                    $_SESSION['takingAttendence'] = $fetchResult['email'];
                    $varte = 0;
                 foreach ($tes2 as $data) { ?>
                 <tr>                
                  
                      <td><?php echo $data['firstName']; ?></td>
                      <td><?php echo $data['lastName']; ?></td>
                      <td>
                      <select name= '<?php echo "email".$varte; ?>'>
                          <option><?php echo $data['email']; ?></td></option>
                      </select>
                      
                      <td><?php echo $data['level']; ?></td>
                      <td><?php echo $data['departmentName']; ?></td>
                      <td><?php echo $data['courseName']; ?></td>

                        <td>
                           
                                <select name= '<?php echo "record".$varte; ?>' >
                                    <option><?php echo $data["$DayWeek"]; ?></option>
                                    <option>Present</option>
                                    <option>Absent</option>
                                    <option>Sick</option>
                                    <option>Late</option>                             
                                </select>
                            
                        </td>
                     
                  
                    </tr>
               <?php 
                 $varte = $varte + 1;
            } 
            $_SESSION['varteNum'] =  $varte;
            }?>

        </table>

        </div>
        <input style="width:120px; margin-left: 17%; height:25px; background-color:green;
         border:1px solid green; border-radius:10px; margin-top:10px;" type="submit" value="update">
    
    </form>
    </section>

    <?php
    
       
      
        ?>
    </body>

</html>
