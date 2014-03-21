<?php

$host = "sql2.freemysqlhosting.net";
$database = "sql233894";
$user = "sql233894";
$password = "lY4%yP1!";
$table= "LOGIN";

// Connect to server and select databse.
mysql_connect($host,$user,$password) or die("xcantx"); 
mysql_select_db("$database")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['id']; 
$mypassword=$_POST['pass']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $table WHERE USER_ID='$myusername' and PASSWORD='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("myusername");
session_register("mypassword"); 
header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
}
?>
