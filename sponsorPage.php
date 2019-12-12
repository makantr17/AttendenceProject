<?php   
session_start();
include 'connect.php'; 

$userName = $_SESSION['sponName'] ;
$emailStudent= $_SESSION['studentEmail'] ;
$email= $_SESSION['sponEmail'];
$password = $_SESSION['sponPassword'];

$sql = $_SESSION['spon'];
$result= mysqli_query($connect, $sql); 
$tes2 = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sqlUser = "SELECT `Users`.`firstName`, `Users`.`lastName`, `Users`.`email`, `Users`.`level`,
`Users`.`cohort`, `Users`.`profession`, `Department`.`departmentId`, `Users`.`departmentId`, `Department`.`departmentName`
from `Users`, `Department`
where `Users`.`email` = '$emailStudent' and `Users`.`departmentId` = `Department`.`departmentId` ";
$resultUser= mysqli_query($connect, $sqlUser); 
$testUser = mysqli_fetch_all($resultUser, MYSQLI_ASSOC);

$courseUser = "SELECT Distinct `Users`.`email`, `Users`.`level`,  `Department`.`departmentId`, `Users`.`departmentId`, `Department`.`departmentName`,
`Course`.`departmentId`, `Course`.`courseName`, `Department`.`level`
from `Users`, `Department`, `Course`
where `Users`.`email` = '$emailStudent' and `Users`.`departmentId` = `Department`.`departmentId` and 
`Course`.`departmentId` = `Department`.`departmentId` and `Department`.`level` = `Users`.`level`";
$resultCourse= mysqli_query($connect, $courseUser); 
$testCourse = mysqli_fetch_all($resultCourse, MYSQLI_ASSOC);



// From the first date to the lastDate
$attendenceUser = "SELECT `RecordAtt`.`week`, `RecordAtt`.`dayOfWeek`, `RecordAtt`.`date`,
`RecordAtt`.`courseName`, `RecordAtt`.`departName`,
`Week2`.`email`, `Week1`.`email`, `Week3`.`email`, 
`Week1`.`Monday`, `Week1`.`Tuesday`,`Week1`.`Wednesday`, `Week1`.`Thursday`,`Week1`.`Friday`, `Week1`.`Saturday`, `Week1`.`Sunday`,
`Week2`.`Monday`, `Week2`.`Tuesday`,`Week2`.`Wednesday`, `Week2`.`Thursday`,`Week2`.`Friday`, `Week2`.`Saturday`,`Week2`.`Sunday`,
`Week3`.`Monday`, `Week3`.`Tuesday`,`Week3`.`Wednesday`, `Week3`.`Thursday`,`Week3`.`Friday`, `Week3`.`Saturday`, `Week3`.`Sunday`

from `RecordAtt`, `Week2`, `Week1`, `Week3`
where (`RecordAtt`.`week` = 'Week2' or `RecordAtt`.`week` = 'Week1' or `RecordAtt`.`week` = 'Week3') 
 and `Week2`.`email` = '$emailStudent' and `Week1`.`email` = `Week3`.`email` and
`Week1`.`email` = `Week2`.`email` and `Week2`.`email` = `Week3`.`email` ";
$attendUser= mysqli_query($connect, $attendenceUser); 
$attended = mysqli_fetch_all($attendUser, MYSQLI_ASSOC);




// Select weekly presence
$attendWeekly = "SELECT * from `Week2` where `email` = 'makante17@alustudent.com' ";
$weekly= mysqli_query($connect, $attendWeekly); 
$checkWeekly = mysqli_fetch_all($weekly, MYSQLI_ASSOC);



$checkThe = "SELECT * FROM `dashboard`.`January` where `email`= '$emailStudent' LIMIT 1";
$fetchCheck= mysqli_query($connect, $checkThe); 
$resultCheck = mysqli_fetch_all($fetchCheck, MYSQLI_ASSOC);






?>


<!DOCTYPE html>
<html>
    <head>
            <link rel="stylesheet" href="styleHome.css">
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    </head>

    <body id="sponsor1">
        
    <!-- Section profile -->
        <section id="profile">
           
            <div>
                <img src="image/fred.jpg">
                <?php  
                     foreach ($tes2 as $sponsorData) {       
                ?>
                <p> <?php echo $sponsorData['userName']; ?> </p>
                <p> <?php echo $sponsorData['emailSponsor']; ?> </p>
                <p> <?php echo $sponsorData['role']; ?> </p>
                     <?php } ?>
            </div>

            <div>
                <img src="image/makant.jpg">
                <?php  
                     foreach ($testUser as $studentData) {       
                ?>
                <p> <?php echo $studentData['firstName']." ".$studentData['lastName']; ?> </p>
                <p> <?php echo $studentData['email']; ?> </p>
                <p> <?php echo $studentData['level']; ?> </p>
                <p> <?php echo $studentData['departmentName']; ?> </p>
               
                     <?php } ?>
            </div>




        </section>
        <section id="sponsor">
            <!-- Possible operation that can be executed by users -->
            <div id="opera">
                <h1>Make single research by Date</h1>

                <div id="search">
                    <button>Seearch</button>
                    <button>Check</button>
                    <button>Seearch</button>
                    <!-- <form name="search" action="#" method="post">
                        <input type="text" placeholder="Select Course">
                        <input type="date" name="From">
                        <input type="date" name="To">
                        <input type="submit" name="load">
                    </form> -->
                </div>

                <div id="result">
                     <div id="resultData"></div>
                     <div id="resultChart"></div>
                
                </div>

            </div>


            <!-- General data loaded on the platform -->
            <div id="report">
                <h1>Student Report</h1>
                <div id="attendence">
                    <ul>
                        <?php  foreach ($testCourse as $respCourse) {
                        ?>
                        <li><img src="image/cou.png"> <?php echo $respCourse['courseName']; ?></li>
                        <?php } ?>
                        </ul>
                </div>
                <div id="attendence">
                    <table>
                    <tr>
                           <th>dayOfWeek</th>     
                           <th>Date</th>  
                           <th>Email</th>
                           <th>Presence</th>  
                           <!-- <th>Absence</th>  -->
                           <th>courseName</th>  
                         
                    </tr>
                    <?php
                       $day = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
                    foreach ($attended as $dataAttend) { ?>
                            <tr>
                                <td><?php echo $dataAttend['dayOfWeek']; ?></td>
                                <td><?php echo $dataAttend['date']; ?></td>
                                <td><?php echo $dataAttend['email']; ?></td>
                                <?php 
                               for ($i=0; $i < 7; $i++) { 
                                   $myday = $day[$i];
                                   if ($dataAttend["$myday"] == "Present") { ?>
                                       <td><?php echo $dataAttend["$myday"]; ?></td> 
                                  <?php }
                       

                                    elseif ($dataAttend["$myday"] == "Absent") { ?>
                                        <td><?php echo $dataAttend["$myday"]; ?></td> 
                                    <?php }
                                    
                               }
                                
                                ?>
                                
                                <td><?php echo $dataAttend['courseName']; ?></td>
                            </tr>
                    <?php } ?>
                    </table>
                </div>

                <!-- Presence by week -->
                <div id="attendence">
                     <table>
                     <!-- Headers -->
                     <tr>
                          <th>Email</th>
                          <th>Days</th>
                          <th>Date</th>
                          <th>Week</th>
                          <th>CourseName</th>
                          <th>Status</th>
                          <th>Converted</th>
                     </tr>
                     <!-- Data in it -->
                     <script>
                              var newArr = [];
                              var secondArr = [];     
                     </script>

                     <?php
                       $counterPresent = 0;
                       $counterAbsent = 0;
                       $grow = 0;

                       $myarr = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
                     foreach ($resultCheck as $resultValue) { 
                        
                         foreach ($myarr as $nameDay) {  
                             
                         $explodeValue = explode(',', $resultValue["$nameDay"]);
                         for ($d=0; $d < sizeof($explodeValue) ; $d++) { 

                            $simpleSliced = explode('/', $explodeValue[$d]);
              
                         ?>      
                     <tr>      
                         <td><?php echo $resultValue['email']; ?></td>
                         <td><?php echo $nameDay; ?></td>
                         <?php
                             for ($i=0; $i < sizeof($simpleSliced) ; $i++) {                
                              ?>
                             <td><?php echo  $simpleSliced[$i]; ?></td>
                             <script>
                                        secondArr[<?php echo $grow; ?>] = <?php echo date("d",strtotime($simpleSliced[0])) ; ?>
                                        // secondArr[$d] = $simpleSliced[0] ;     
                             </script>
                             <?php }
                             $index = 0;
                             if ($simpleSliced[sizeof($simpleSliced) -1] == "Present") {
                                $index = 1;
                                $counterPresent = $counterPresent + 1;  ?>

                                <script> newArr[<?php echo $grow; ?>] = <?php echo $index; ?>   </script>
                                
                            <?php
                            $grow = $grow + 1;
                             }if ($simpleSliced[sizeof($simpleSliced) -1] == "Absent") {
                                 $index = 0;
                                 $counterAbsent = $counterAbsent + 1;
                             ?>
                             <script> newArr[<?php echo $grow; ?>] = <?php echo $index; ?>   </script>

                             <?php 
                            $grow = $grow + 1;
                            } ?>

                             <td><?php echo $index; ?></td>
                             
                     </tr>
                    
                                

                     <?php
                            
                    } } } ?>

                    
                           
                     </table>
                </div>
               
               
                <div id="attendence">
                    <h1>Helllp 
                        <script>
                           document.write(newArr.length) ;
                           document.write(secondArr.length);     
                       </script>
                   </h1>
                     <div style="width:250px; height:250px; float:left" id="chartI"></div>
                     <div id="apexchart"></div>
                </div>



            </div>
        
        </section>




    </body>


<!-- Donut Chart -->
    <script>
                var options = {
                    chart: {
                        type: 'donut',
                    },
                    series: [ <?php echo $counterPresent; ?>, <?php echo $counterAbsent; ?>],
                    labels: ['Presented','Absented'],
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            
                
                            legend: {
                                position: 'bottom'
                            }
                        }
                     }]
                   }
                var chartJ = new ApexCharts(
                    document.querySelector("#chartI"),
                    options
                );
                
                chartJ.render();

</script>

  <!-- Morris CHart settling to display data -->
 <script>
            var options = {
            chart: {
                type: 'line'
            },
            series: [{
                name: 'sales',
                data: newArr
            }],
            xaxis: {
                categories: secondArr
            }
            }

            var chart = new ApexCharts(document.querySelector("#apexchart"), options);

            chart.render();
        
    </script>



</html>