<?php

$error = NULL;
echo "this is a test";

if (isset($_POST['submit'])) {
   //get form data
   echo "This is a message";

   $name = $_POST['name'];
   $email = $_POST['email'];
   $p1 = $_POST['password1'];
   $p2 = $_POST['password2'];

   // debug_to_console($name);


   if ($p1 != $p2) {
      $error = "<p>Your passwords do not match</p>";
   } else {
      //form is valid
      //connect to the database

      $mysqli = new MySQLi('localhost', 'root', '', 'test');
      if ($mysqli->connect_error) {
         die("Connection failed: " . $mysqli->$connect_error);
      } else {
         echo "Connected Successfully";
      }
      // echo "<p>Your passwords do not match</p>";
      //Sanitize
      $name = $mysqli->real_escape_string($name);
      $email = $mysqli->real_escape_string($email);
      $p1 = $mysqli->real_escape_string($p1);
      $p2 = $mysqli->real_escape_string($p2);

      //generate Vkey
      $vkey = md5(time() . $name);
      debug_to_console($vkey);



      $vkey = md5(time() . "abc");
      printf($vkey);
      $insert = $mysqli->query("INSERT into accounts(name, email, password, vkey) VALUES('$name', '$email','$p1', '$vkey')");
      if ($insert) {
         echo "Success";
      } else {
         echo "failure";
      }
   }
} else {
   echo "not isset";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Now!</title>
</head>

<body>
   <div class="background">
      <div class="flex-container">
         <div class="form-container">
            <form method="post" action="">
               <label>Name</label><br>
               <input type="text" id="name" required><br>

               <label>Email</label><br>
               <input type="email" id="email" required><br>

               <label>Password</label><br>
               <input type="text" id="password1" required><br>
               <label> Confirm Password</label><br>
               <input type="text" id="password2" required><br>

               <!-- <label for="submit">Go</label><br> -->
               <input type="submit" id="submit" value="Register">

            </form>
         </div>
         <div class="image-container"></div>
      </div>

   </div>
   <?php
   echo $error;
   echo "some statement";
   ?>
</body>

</html>