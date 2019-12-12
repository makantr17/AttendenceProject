
        <form id="form1" style="display:none;"  action="getForm.php" method="post">
          
            <div id="searchMenu">
                <img id="imageIcon" src="image/filtre2.png"> 
                <input type="email" name="userEmails" placeholder="User Email">
            </div>
            <!-- Choose time -->
            <div id="searchMenu">
                <img id="imageIcon" src="image/filtre2.png"> 
                <select style="height:25px" name = 'level'>
                      <option>Chose Level</option>
                      <?php   foreach ($level as $option1) { ?>
                      <option><?php echo $option1['level']; ?></option>
                      <?php } ?>
                </select>     
            </div>


            <!-- Department -->
            <div id="searchMenu">
                <img id="imageIcon" src="image/filtre2.png"> 
                <select style="height:25px" name = 'department'>
                    <option>Chose Department</option>
                    <?php  foreach ($depart as $option2) { ?>
                    <option><?php echo $option2['departmentName']; ?></option>
                    <?php } ?>
                </select> 
            </div>


            <!-- Cohort -->
            <div id="searchMenu">
                <img id="imageIcon" src="image/filtre2.png"> 
                <select style="height:25px" name= 'course'>
                    <option>Chose Course Name</option>
                    <?php  foreach ($course as $option3) { ?>
                    <option><?php echo $option3['courseName']; ?></option>
                    <?php } ?>
                </select>  
            </div>
                

            <!-- Period -->
            <div id="searchMenu">
                <img id="imageIcon" src="image/filtre2.png"> 
                <select style="height:25px" name = 'timeFrom'>
                    <!-- <option>From</option> -->
                    <?php foreach ($date as $option4) { ?>
                    <option><?php echo $option4['Month']; ?></option>    
                    <?php } ?>
                </select> 
            </div>


            <!-- To -->
            <div id="searchMenu">
                <img id="imageIcon" src="image/filtre2.png"> 
                <select style="height:25px" name = 'timeTo'>
                    <!-- <option>To</option> -->
                    <?php foreach ($date as $option4) { ?>
                    <option><?php echo $option4['Month']; ?></option>    
                    <?php } ?>
                </select> 
            </div>


            <!-- Submit the form -->
            <input type="submit">
            
        </form>
