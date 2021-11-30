<?php
function debug_to_console($data)
{
   $output = $data;
   if (is_array($output))
      $output = implode(',', $output);

   echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
?>
<?php
$con = mysqli_connect("localhost", "root", "", "test");
if ($con) {
   echo "Success";
} else {
   echo "Failure";
}
?>
<?php
$error = NULL;

$mysqli = new MySQLi('localhost', 'root', '', 'test');
if ($mysqli->connect_error) {
   die("Connection failed: " . $mysqli->$connect_error);
} else {
   echo "Connected Successfully";
}

$vkey = md5(time() . "abc");
printf($vkey);
$insert = $mysqli->query("INSERT into accounts(name, email, password, vkey) VALUES('Anshu', 'abc@abc','abd', '99001122jj')");
if ($insert) {
   echo "Success";
} else {
   echo "failure";
}


?>
