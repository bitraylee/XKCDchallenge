<style>
   <?php include 'reset.css' ?>
</style>
<style>
   <?php include 'style.css' ?>
</style>

<?php
function debug_to_console($data)
{
   $output = $data;
   if (is_array($output))
      $output = implode(',', $output);

   echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
$error = NULL;


if (isset($_POST['submit'])) {
   //get form data
   $name = $_POST['name'];
   $email = $_POST['email'];
   $p1 = $_POST['password1'];
   $p2 = $_POST['password2'];

   if (strlen($name) < 5) {
      $error = "<p>Your name must contain atleast 5 character</p>";
   } elseif ($p1 != $p2) {
      $error = "<p>Your passwords do not match</p>";
   } else {
      //form is valid
      //connect to the database

      $mysqli = new mysqli('localhost', 'root', '', 'test');

      //Sanitize
      $name = $mysqli->real_escape_string($name);
      $email = $mysqli->real_escape_string($email);
      $p1 = $mysqli->real_escape_string($p1);
      $p2 = $mysqli->real_escape_string($p2);

      //generate Vkey
      $vkey = md5(time() . $name);
      debug_to_console($vkey);

      //insert into the database
      $insert = $mysqli->query("INSERT INTO accounts(name, email, password, vkey) VALUES($name,$email, $password,$vkey)");
   }
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
            <form method="POST" action="">
               <label for="name">Name</label><br>
               <input type="text" id="name" required><br>

               <label for="email">Email</label><br>
               <input type="email" id="email" required><br>

               <label for="password">Password</label><br>
               <input type="text" id="password1" required><br>
               <label for="password"> Confirm Password</label><br>
               <input type="text" id="password2" required><br>

               <!-- <label for="submit">Go</label><br> -->
               <input type="submit" id="submit" value="Register">


            </form>
         </div>
         <div class="image-container"></div>
      </div>

   </div>
   <?php
   debug_to_console($error);
   ?>
</body>

</html>