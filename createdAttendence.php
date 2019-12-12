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


$attendenceName  = $_SESSION["attName"] ;
$attDate = $_SESSION["attDate"]  ;   
$attLevel = $_SESSION["attLevel"] ;
$attDepart = $_SESSION["attDepart"] ;
$attCourse = $_SESSION["attCourse"] ;   
$attCohort = $_SESSION["attCohort"] ;
$attWeek = $_SESSION["attWeek"] ;



?>

<?php 
     include 'connect.php';
    // Fetch information about User profile
     $sql = "SELECT `Users`.`userId`, `Users`.`firstName`, `Users`.`lastName`, `Users`.`email`, `Department`.`departmentId`,
     `Users`.`departmentId`, `Department`.`departmentName`, `Users`.`profession`, `Users`.`email`,
     `Users`.`level`,`Users`.`lastName`, `Course`.`courseName`, `Course`.`departmentId`, `Users`.`cohort`
     FROM `Users`, `Department`, `Course`
     Where `Users`.`departmentId` = `Department`.`departmentId` and `Course`.`departmentId`= `Department`.`departmentId` 
      and `Users`.`level` = '$attLevel'  and `Course`.`courseName` = '$attCourse' and `Users`.`cohort` = '$attCohort'
      and `Department`.`departmentName` = '$attDepart' "  ;

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
               <img src="/image/sensor.jpg">
               <h2><?php echo $fetchResult['firstName']." ".$fetchResult['lastName']; ?></h2>
               <h2><?php echo $fetchResult['email']; ?></h2>
               <h2><?php echo $fetchResult['profession']." ".$fetchResult['level']; ?></h2>
            
               <?php } ?>
         </div>

         <div id="attInfo">
             <h2><?php echo $attendenceName; ?></h2>
             <h2><?php echo $attDate; ?></h2>
             <h2><?php echo $attWeek; ?></h2>

        </div>
        <!-- This is the form of updating the new Attendence -->
         <form name="update" method="post" action="updateAttendence.php"> 

         <div id="tableStyle">  
         <table>
                 <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Department Name</th>
                    <th>Course Name</th>
                    <th>Attendence Status</th>

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
                                    <option></option>
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