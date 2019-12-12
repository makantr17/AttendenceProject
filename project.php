<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>


<!-- Use some command operation to fetch information -->
<?php
    // List of session created through forms
    $userId = $_SESSION["userId"];
    $email = $_SESSION["email"];
    $department = $_SESSION["department"] ;
    $course = $_SESSION["course"];
    $level = $_SESSION["level"] ;

    // Simple queries such as All department, level, course
    
    
    // Include databse information
    include 'connect.php';
    // Select information to prep the chart
    include 'queryInfo.php';
    // use query for queryInfo.php and assign to result
    $resultZ = mysqli_query($connect, $queryZ);


    // Let run our Chart using $chart_data  
    $chart_data = '';
    while($row = mysqli_fetch_array($resultZ))
    {
        $chart_data .= "{ numberAttended :'".$row["numberAttended"]."', Month :'".$row["Month"]."', userId :".$row["userId"]." }, ";
    }
    $chart_data = substr($chart_data, 0, -2);
?>


<?php 
    // Teacher Edit Possibility
     $editMethods = "SELECT `Users`.`userId`, `Users`.`firstName`, `Users`.`lastName`, `Users`.`email`, `Department`.`departmentId`,
     `Users`.`departmentId`, `Department`.`departmentName`, `Users`.`profession`, `Users`.`email`,
     `Users`.`level`,`Users`.`lastName`
     FROM `Users`, `Department`
     Where `Users`.`departmentId` = `Department`.`departmentId` "  ;
     $resultEdit= mysqli_query($connect, $editMethods); 
     $editFetch = mysqli_fetch_all($resultEdit, MYSQLI_ASSOC);
?>



<?php 
    // Fetch information about User profile
     $sql = "SELECT `Users`.`userId`, `Users`.`firstName`, `Users`.`lastName`, `Users`.`email`, `Department`.`departmentId`,
     `Users`.`departmentId`, `Department`.`departmentName`, `Users`.`profession`, `Users`.`email`,
     `Users`.`level`,`Users`.`lastName`
     FROM `Users`, `Department`
     Where `Users`.`departmentId` = `Department`.`departmentId` and `Users`.`userId` = '$userId' "  ;
     $result= mysqli_query($connect, $sql); 
     $tes2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<?php 

    // Fetch the list of student, Name, email, Department
    if ($_SESSION['script'] == "") {
        // load general Query
        $general  = "SELECT `Users`.`userId`, `Users`.`firstName`, `Users`.`lastName`, `Users`.`email`, `Department`.`departmentId`,
        `Users`.`departmentId`, `Department`.`departmentName`, `Users`.`profession`, `Users`.`email`,
        `Users`.`level`,`Users`.`lastName`
        FROM `Users`, `Department`
        Where `Users`.`departmentId` = `Department`.`departmentId`";
       
    }else {
        //  Set the query to the one Updated
        $general = $_SESSION['script'];
    }
    
    //  echo $general;
     $generalResult= mysqli_query($connect, $general); 
     $testResult = mysqli_fetch_all($generalResult, MYSQLI_ASSOC);
?>
   





<!DOCTYPE html>      
          
<html>
    <head>
    <!-- Start morris code -->
    <title>Dashboard</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
            <!-- Link to the css dash.css -->
            <link rel="stylesheet" href="dash.css">
            <!-- Apex chart -->
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    </head>
    



    <body>
         
        <!-- Section containing all possible operations +++++++++++++++++++++++++++++++++++++++++-->
        <section id='Menu'>

            <!-- Create profile  ################################################-->
            <div id="profile">
                <!-- user picture -->
                <img id=picture src="image/makant.jpg">

                <!-- User name, lastname, profession -->
                <div id="userInfo">

                <!-- let fetch all information about user from the data -->
                <?php  foreach ($tes2 as $info) { ?>
                        <!-- User Name -->   
                        <h2><?php echo $info['firstName'].''.$info['lastName'] ;?></h2>
                        <!-- Profession -->
                        <h2><?php echo $info['profession'];?></h2>
                        <!-- Level -->
                        <h2><?php echo $info['level'];?></h2>
                        <!-- email -->
                        <h2><?php echo $info['email'];?></h2>
                        <!-- Department -->
                        <h2><?php echo $info['departmentName'];?></h2>
          
                <?php } ?>
                </div>   
            </div>



            <!-- Search for statistics presence #########################################-->
            <div id="search">
                <!-- All simple qury from the tables -->
                <?php include 'simpleQuery.php'; ?>

                <!-- General Query -->
                <button id="buttonSearch" onclick="displayThing5()"><img id="imageIcon" src="image/product.jpg"> <h2>General Info</h2></button> 
                <!-- Buttom that display the form -->
                <button id="buttonSearch" onclick="displayThing3()"><img id="imageIcon" src="image/product.jpg"> <h2>Community</h2>
                   <i style="font-size:20px; float:right; color:white" class="fa fa-caret-down"></i>
                </button> 
             
                <!-- Documentation help to know more about the use of the Dashboard -->
                <button id="buttonSearch" onclick="displayThing4()"><img id="imageIcon" src="image/product.jpg"> <h2>Documentation</h2>
                <i style="font-size:20px; float:right; color:white" class="fa fa-caret-down"></i>
                </button> 
                
                <!-- You can revendicate if you really feel like the data load is not right by
                 sending to the facilitator the notices -->
                <button id="buttonSearch" onclick="displayThing6()"><img id="imageIcon" src="image/product.jpg"> <h2>MarkAttenden</h2>
                <i style="font-size:20px; float:right; color:white" class="fa fa-caret-down"></i>
                </button> 
                
            </div> 
        </section>


        <!-- Cover the whole page -->
        <div id="cover"></div>
       
       
        <!--  Section that fetch all informations  +++++++++++++++++++++++++++++++++++++++-->
        <section id='contentFetch'>
             
            <!-- Edit and modify graphs #####################################################-->
            <div id="graphMenu">

                <!-- Down load Informations -->
                <div id="graphIcons"> <img id="supIcons" src="image/download.png"><h2>Download</h2></div>
                <!-- Send report by email -->
                <div id="graphIcons"> <img id="supIcons" src="image/sentByEmail.png"><h2>Send Report</h2></div>
                <!-- Store new info -->
                <div id="graphIcons"> <img id="supIcons" src="image/storeDb.png"><h2>Upload</h2></div>
                <!-- Search info -->
                <div id="graphIcons"> <img id="supIcons" src="image/search.png"><h2>Change Chart</h2></div>
                <!-- logout buttom -->
                <div id="graphIcons" onclick="dropElement()"> 
                    <img id="supIcons" src="image/logout.png"><h2>Log-out</h2>
                    <div id="logoutPage">
                        <a href="reset-password.php" class="btn"><img id="log" src="image/logoutt.png"> Reset My Password</a>
                        <a href="logout.php" class="btn"><img id="log" src="image/logou.png"> Sign Out </a>
                    </div>
                </div>
                   
            </div>

            
           <!-- Page to create Attendence content here ##################################################-->
           <!-- This div will help to actually make the attendence -->
           <div  id="changeMark">

                <h2 style="color: black; margin:10px; font-size:18px">Mark Student Attendence</h2>
               
                <!-- Create/Edit Attendence -->
                <div id="popForms">
                     <h2 style="color:green; margin-left:10px">Create New Attendence</h2>
                     <!-- New attendence created and edited by the facilitator -->
                     <form id="stylePopUp" action="createAttendence.php" method="post">
                     <!-- Include the query -->
                     <?php include 'simpleQuery.php'; ?>
                          
                           <input type="text" name="attendenceName" placeholder="Attendence Name">
                           <input type="date" name="createDate">
                           <select name="choseWeek"> 
                               <option>Chose the Week</option>   
                               <option>Week1</option>
                               <option>Week2</option>
                               <option>Week3</option>
                           </select>

                           <select name="choseLevel"> 
                               <option>Chose level</option>
                               <?php foreach ($level as $levelEdit) {
                                ?>
                               <option> <?php echo $levelEdit['level']; ?></option>
                               <?php } ?>
                           </select>

                           <select name="choseDepart"> 
                               <option>Chose your Department</option>
                               <?php foreach ($depart as $departEdit) {
                                ?>
                               <option> <?php echo $departEdit['departmentName']; ?></option>
                               <?php } ?>
                           </select>

                           <select name="choseCourse"> 
                               <option>Chose Course Name</option>
                               <?php foreach ($course as $courseEdit) {
                                ?>
                               <option> <?php echo $courseEdit['courseName']; ?></option>
                               <?php } ?>
                           </select>

                           <select name="choseCohort"> 
                               <option>Cohort Name</option>
                               <option>Cohort1</option>
                               <option>Cohort2</option>
                           </select>
                           <!-- Subnit the form edited -->
                           <input type="submit" name="save">

                     </form>
                </div>

                <div id="updateAtt">   
                      <?php  include 'form4.php'; ?>
                </div>

                <!-- Create Edit button. How to open and close the popForm page
                Click on button to create new attendence and update by clicking on update buttom -->
                
                <div id="createEdit">
                    <!-- Create new attendence Div -->
                    <div id="buttonEdit">
                        <img src="image/filtre2.png">
                        <button onclick="newAttendence()">New Attendence</button>
                    </div>
                    <!-- Update existing Attendence -->
                    <div id="buttonEdit">
                        <img src="image/filtre2.png">
                        <button onclick="updateAttendence()">Update</button>
                    </div>

                </div>

                                <!-- Pop up javaScript code below: Don't Delete -->
                                <!-- *********************************** -->
                                                        <!-- Script Query to Open and Close the PopForms-->
                                                        <script>
                                                        //  Fucittion that of button popForm
                                                            function newAttendence(){
                                                                if(document.getElementById('popForms').style.display!="none"){
                                                                    document.getElementById('popForms').style.display="none";
                                                                    document.getElementById('cover').style.display="none"
                                                                }else{
                                                                    document.getElementById('popForms').style.display="inline-block";
                                                                    document.getElementById('cover').style.display="inline-block";
                                                                }
                                                            }
                                                           
                                                            // Function update attendence
                                                            function updateAttendence(){
                                                                if(document.getElementById('updateAtt').style.display!="none"){
                                                                    document.getElementById('updateAtt').style.display="none";
                                                                    document.getElementById('cover').style.display="none"
                                                                }else{
                                                                    document.getElementById('updateAtt').style.display="inline-block";
                                                                    document.getElementById('cover').style.display="inline-block";
                                                                }
                                                            }
                                                        </script>
                                <!-- ************************************* -->
                                updateAttendence

                <!-- Attendence Content in the this div below -->
                <div id="onlyStaff">
                    <!-- Table That contaion specific query of the Facilitator -->
                    <table>
                        <tr>
                            <th>First Name</th><th>Last Name</th><th>Email address</th>
                            <th>Department</th><th>Level</th>
                        </tr>
                        <?php  foreach ($editFetch as $infoResult) { ?>
                        <tr>      
                            <td> <?php echo $infoResult['firstName']; ?></td> 
                            <td> <?php echo $infoResult['lastName']; ?></td> 
                            <td> <?php echo $infoResult['email']; ?></td> 
                            <td> <?php echo $infoResult['departmentName']; ?></td> 
                            <td> <?php echo $infoResult['level']; ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                     
                </div>
            <!-- Close changeMark  -->
           </div>
           

           <!-- The documentation is guide that help user familiar easily with the platform
           and get the answer to all their questions -->

           <!-- And We have the Documentation too -->
            <?php  include "comentAndDocument.php"  ?>



            <!-- This is the USEIT div -->
            <!-- Graph + Table -->
            <div id="useIt">
              
              
                <!--Float Left Container  #######################################-->
                <div id="tableOfContent">
                    
                    <!-- All possible queries Container *******************************// -->
                    <div id="dataOperation">
                       
                        <!-- First form1 -->
                        <div id="Formbutt">
                            <button id="searchName" onclick="displayThing()"><img id="imageIcon" src="image/filtre2.png"> <h2>Search</h2></button>
                            <?php include 'form1.php';  ?>   
                        </div>

                        <!-- Second Form2 -->
                        <div id="Formbutt">
                            <button id="searchName" onclick="displayThing1()"><img id="imageIcon" src="image/filtre2.png"> <h2>Deep</h2> </button>
                            <?php include 'form2.php'; ?>   
                        </div>


                        <!-- Second Form2 -->
                        <div id="Formbutt">
                            <button id="searchName" onclick="displayForm3()"><img id="imageIcon" src="image/filtre2.png"> <h2>Attend</h2> </button>
                            <?php include 'form3.php'; ?>   
                        </div>

                        <!-- Filter by name -->
                        <div id="Formbutt">
                            <button id="searchName" onclick="nameFilter1()"><img id="imageIcon" src="image/filtre2.png"> <h2>By Name</h2></button> 
                            <form  id="nameFilter" name="nameFilter" action="searchByName.php" method="post">
                                <div id="searchMenu"> <img id="imageIcon" src="image/filtre2.png">  <input type="text" name="firstName" placeholder="First Name"> </div>
                                <div id="searchMenu">  <img id="imageIcon" src="image/filtre2.png"> <input type="text" name="lastName" placeholder="Last Name"> </div>
                                <input id="subit" type="submit" name="filter" value="filter">     
                            </form>
                        </div>
                        
                        <!-- Filter by email -->
                        <div id="Formbutt">
                            <button id="searchEmail" onclick="emailFilter1()"><img id="imageIcon" src="image/filtre2.png"> <h2>By Email</h2></button>   
                            <form id="emailFilter" name="emailFilter" action="searchByemail.php" method="post">
                                <div id="searchMenu"> <img id="imageIcon" src="image/filtre2.png"> <input type="email" name="email" placeholder="User email"> </div>
                                <input id="subit" type="submit" name="filter" value="filter">     
                            </form>
                        </div>

                        <!-- Filter Student by date -->
                        <div id="Formbutt">
                            <button id="searchDate" onclick="dateFilter1()"><img id="imageIcon" src="image/filtre2.png"> <h2>By Date</h2></button>                        
                            <form id="dateFilter" name="dateFilter" action="filterByDate.php" method="post">
                                <div id="searchMenu"> <img id="imageIcon" src="image/filtre2.png"> <input type="email" name="email" placeholder="User email"> </div>
                                <div id="searchMenu"> <img id="imageIcon" src="image/filtre2.png"> <input type="date" name="dateFrom" placeholder="From"> </div>
                                <div id="searchMenu"><img id="imageIcon" src="image/filtre2.png"> <input type="date" name="dateTo" placeholder="To"> </div>
                                <input id="subit" type="submit" name="filter" value="filter">     
                            </form>
                        </div>
                        

                        <!-- Filter By Attendence -->
                        





                    </div>
                    
                    <!-- Use it Data fetched on the page content **************************// -->
                    <div id="operationResult">

                        <table>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email address</th>
                                <th>Department</th>
                                <th>Level</th>
                            </tr>
                            <?php
                            // Calculate or count the number of elements belows
                                $counter = 0;
                                $CSNumber = 0;
                                $GCNumber =0;
                                $IBTNumber = 0;
                                $Y1Number = 0;
                                $Y2Number = 0;
                                $Y3Number = 0;
                            //  Condition to count them
                            foreach ($testResult as $data) {
                                $counter = $counter + 1;
                                if ($data['departmentName'] == "Computer Science") {
                                    $CSNumber = $CSNumber + 1;
                                }
                                if ($data['departmentName'] == "Global Challenge") {
                                    $GCNumber = $GCNumber + 1;
                                }
                                if ($data['departmentName'] == "IBT") {
                                    $IBTNumber = $IBTNumber + 1;
                                }
                                if ($data['level'] == "YEAR1") {
                                    $Y1Number =  $Y1Number + 1;
                                }
                                if ($data['level'] == "YEAR2") {
                                    $Y2Number =  $Y2Number + 1;
                                }
                                if ($data['level'] == "YEAR3") {
                                    $Y3Number =  $Y3Number + 1;
                                }
                            ?>

                            <tr>
                                <td> <?php echo $data['firstName'];  ?></td>
                                <td> <?php echo $data['lastName'];  ?></td>
                                <td> <?php echo $data['email'];  ?></td>
                                <td> <?php echo $data['departmentName'];  ?></td>
                                <td> <?php echo $data['level'];  ?></td>
                              
                            </tr>
                            <?php } ?>
                        
                        </table>
                    </div>


                    <!-- List the number of rows and columns for the **********************************//
                     research and fetch them as pie chart -->
                    <div id="ColRows">
                        <p>Rows: <?php echo $counter; ?>  Columns: 4</p> 
                        <!-- Chart that display Different student from ALU Department -->
                        <div style="width:250px; height:250px; float:left" id="chartI"></div>
                        <div style="width:270px; height:270px; float:left" id="chartJ"></div>
                    </div>

                </div>

            
                <!-- Float Right display the content of Graphs of every queries ####################################################-->
                <div id="graphDisplay">
                    <h2>The list of your presence</h2>

                    <!-- This graph display the query result -->
                    <div id='chart'></div>
                    <!-- End morris code -->
                    <div id="apexchart"></div>
                </div>
            </div>

        </section>

    </body>

    <!-- ============================================SCRIPYT============================================== -->




    <!-- Moris cript -->
    <script> 
         
        // Display the first form form1
        function displayThing(){
        
            if (document.getElementById('form1').style.display !="none") {
            document.getElementById('form1').style.display="none";
            }else{
            document.getElementById('form1').style.display="inline-block";
            } 
        }
        
        // Display the second form form2
        function displayThing1(){
        
        if (document.getElementById('preNumber').style.display !="none") {
            document.getElementById('preNumber').style.display="none";
        }else{
            document.getElementById('preNumber').style.display="inline-block";
        }
        }

        
         // Display the second form form3
         function displayForm3(){
        
        if (document.getElementById('form3').style.display !="none") {
            document.getElementById('form3').style.display="none";
        }else{
            document.getElementById('form3').style.display="inline-block";
        }
        }
       
         // Table contents
        // Community
        function displayThing3(){
        
        if (document.getElementById('community').style.display =="none") {
            document.getElementById('useIt').style.display="none";
            document.getElementById('community').style.display="inline-block";
            document.getElementById('documentation').style.display="none";
           
        }else{
            document.getElementById('useIt').style.display="inline-block";
            document.getElementById('community').style.display="none";
            document.getElementById('documentation').style.display="none";
           
        }
        }


        //    Documentation
        function displayThing4(){
        
        if (document.getElementById('documentation').style.display !="none") {
            document.getElementById('useIt').style.display="inline-block";
            document.getElementById('community').style.display="none";
            document.getElementById('documentation').style.display="none";
            
            
        }else{
            document.getElementById('useIt').style.display="none";
            document.getElementById('documentation').style.display="inline-block"; 
            document.getElementById('community').style.display="none";   
        }
        }

        function displayThing6(){
        
        if (document.getElementById('changeMark').style.display !="none") {
            document.getElementById('useIt').style.display="inline-block";
            document.getElementById('community').style.display="none";
            document.getElementById('documentation').style.display="none";
            document.getElementById('changeMark').style.display="none";
            
            
        }else{
            document.getElementById('useIt').style.display="none";
            document.getElementById('changeMark').style.display="inline-block"; 
            document.getElementById('community').style.display="none";   
            document.getElementById('documentation').style.display="none"; 
        }
        }

        
        // Drop down logout in the menu bar
        function dropElement() {
            if (document.getElementById('logoutPage').style.display !="none") {
            document.getElementById('logoutPage').style.display="none";
            }else{
            document.getElementById('logoutPage').style.display="inline-block";
            } 
        }
        // Drop down the nameFilter
        function nameFilter1(){
            if (document.getElementById('nameFilter').style.display !="none") {
            document.getElementById('nameFilter').style.display="none";
            }else{
            document.getElementById('nameFilter').style.display="inline-block";
            } 
        }

          // Drop down the nameFilter
          function emailFilter1() {
            if (document.getElementById('emailFilter').style.display =="none") {
            document.getElementById('emailFilter').style.display="inline-block";
            }else{
            document.getElementById('emailFilter').style.display="none";
            } 
        }


          // Drop down the dateFilter
          function dateFilter1() {
            if (document.getElementById('dateFilter').style.display !="none") {
            document.getElementById('dateFilter').style.display="none";
            }else{
            document.getElementById('dateFilter').style.display="inline-block";
            } 
        }

    </script>





 <script>

      var options = {
            chart: {
                type: 'donut',
            },
            series: [ <?php echo $Y2Number; ?>, <?php echo $Y1Number; ?>, <?php echo $Y3Number; ?>],
            labels: ['Year1 Students','Year2 Students','Year3 Students'],
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
            document.querySelector("#chartJ"),
            options
        );
        
        chartJ.render();

</script>





<script>

var options = {
            chart: {
                type: 'donut',
            },
            series: [<?php echo $CSNumber; ?>, <?php echo $IBTNumber; ?>, <?php echo $GCNumber; ?>],
            labels: ['CS Students','IBT Students','GC Students'],
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

       var chartI = new ApexCharts(
            document.querySelector("#chartI"),
            options
        );
        
        chartI.render();

</script>

    <!-- Create ApexChart.js -->
    <script>
            var options = {
            chart: {
                type: 'line'
            },
            series: [{
                name: 'sales',
                data: [30,40,35,50,49,60,70,91,125]
            }],
            xaxis: {
                categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
            }
            }

            var chart = new ApexCharts(document.querySelector("#apexchart"), options);

            chart.render();
        
    </script>


    <!-- Morris CHart settling to display data -->
    <script>
        Morris.Bar({
            element:'chart',
            data:[<?php echo $chart_data; ?>],
    
            xkey:'userId',
            ykeys:['numberAttended', 'Month'],
            labels:['numberAttended', 'Month'],
            hideHover:'auto'
            // stacked:true

        });

    </script>


</html>
