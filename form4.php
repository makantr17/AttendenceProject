      <!--  Find the list of presence during a specific period  for the specific department-->
<form id="stylePopUp" action="updateLastAttendence.php" method="post">


<!-- Your level  -->
   <select name="level">
       <option>Choose the Level</option>
        <?php  foreach ($level as $levelName) { ?>
       <option><?php echo $levelName['level']; ?></option>    
        <?php } ?>
   </select>
       


<!-- sear=  dpartment-->
   <select name="department" >
        <option>Choose the Department</option>
        <?php  foreach ($depart as $dapartName) { ?>
        <option><?php echo $dapartName['departmentName']; ?></option>    
        <?php } ?>
   </select> 




  <select  name="course">
       <option>Choose the Course</option>
       <?php  foreach ($course as $courseN) { ?>
       <option><?php echo $courseN['courseName']; ?></option>    
       <?php } ?>
   </select> 

   <!-- Specify the course-->
 
   <select  name="cohort">
       <option>Choose the Cohort</option>
       <?php  foreach ($cohort as $cohortN) { ?>
       <option><?php echo $cohortN['cohort']; ?></option>    
       <?php } ?>
   </select> 


   <select name="week">
       <option>Week1</option>
       <option>Week2</option>
       <option>Week3</option>       
   </select> 

 
   <label style="color:black; font-size:14px; float:left">Date</label>
   <input type="date" name="date" placeholder="Specify Day">

   <input  type="submit" name="submit">

</form>