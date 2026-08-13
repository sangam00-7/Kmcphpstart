<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
    {
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
echo"<br>";
echo "The username is :".$username;
echo"<br>";
echo"The email is :" .$email;
echo"<br>";
echo"The password is :" .$password;
    }
//print_r($_GET);
