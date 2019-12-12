<?php   
      require('inside/take.php');

      $db = mysqli_connect("localhost", "root", "", "test");
    //   $sql = "INSERT INTO `imag_test`(`first_name`,`lastname`, `email`, `phone_number`, `address`) VALUES ('$firstName','$lastName','$email',$Phone,'$addres')";
    //   mysqli_query($db, $sql);
    //   echo "True we can submit";

      $sql = "SELECT * FROM users Limit 1";
      $result= mysqli_query($db, $sql); // Stores the submitted data into the database test
      $tes2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
      foreach ($tes2 as $valoris2) {
        $firstname = $valoris2['firstName'];
        $lastname = $valoris2['lastName'];
        $email = $valoris2['email']; 
        $password2 = $valoris2['password'];
        $phoneNumber = $valoris2['phoneNumber'];
        $address = $valoris2['address'];
        $image = $valoris2['image'];
        $role = $valoris2['role'];
        }
      echo "Name :".$firstname;
      echo "<br>";
      echo "LastName :".$lastname;
      echo "<br>";
      echo "email".$email;
   ?>