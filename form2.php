      <!--  Find the list of presence during a specific period  for the specific department-->
        <form id="preNumber" style="display:none;"  action="specificSearch.php" method="post">


                 <!-- Your level  -->
                <div id="searchMenu">
                    <img id="imageIcon" src="image/filtre2.png"> 
                    <select style="height:25px" name="level">
                        <option>Choose the Level</option>
                         <?php  foreach ($level as $levelName) { ?>
                        <option><?php echo $levelName['level']; ?></option>    
                         <?php } ?>
                    </select>
                </div>        
                

                <!-- sear=  dpartment-->
                <div id="searchMenu">
                    <img id="imageIcon" src="image/filtre2.png"> 
                    <select style="height:25px" name="department" >
                         <option>Choose the Department</option>
                         <?php  foreach ($depart as $dapartName) { ?>
                         <option><?php echo $dapartName['departmentName']; ?></option>    
                         <?php } ?>
                    </select> 
                </div>


                 
                <div id="searchMenu">
                    <!-- Specify the course-->
                    <img id="imageIcon" src="image/filtre2.png"> 
                    <select style="height:25px" name="course">
                        <option>Choose the Course</option>
                        <?php  foreach ($course as $courseN) { ?>
                        <option><?php echo $courseN['courseName']; ?></option>    
                        <?php } ?>
                    </select> 
                </div>  


                <div id="searchMenu">
                    <!-- Specify the course-->
                    <img id="imageIcon" src="image/filtre2.png"> 
                    <select style="height:25px" name="cohort">
                        <option>Choose the Cohort</option>
                        <?php  foreach ($cohort as $cohortN) { ?>
                        <option><?php echo $cohortN['cohort']; ?></option>    
                        <?php } ?>
                    </select> 
                </div>  


                    <!-- Date range -->
                <div id="searchMenu">   
                    <label style="color:black; font-size:14px; float:left">From</label>
                    <input type="date" name="From" placeholder="From">
                </div>


                <div id="searchMenu">
                    <label style="color:black; font-size:14px; margin:5px; float:left">To</label>
                    <input type="date" name="To" placeholder="To">
                </div>

                
                <input  type="submit" name="submit">
    </form>