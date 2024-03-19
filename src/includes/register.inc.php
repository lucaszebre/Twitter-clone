<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){


    // Grab the data -_-
$birthdate = $_POST["date"] ;
$city = $_POST["city"] ;
$email = $_POST["email"] ;
$password = $_POST["password"]; 
$passwordRepeat = $_POST["conpassword"]; 
$username = $_POST["username"];
echo $username;
$at_user_name = $_POST["at_user_name"];



 



// Instantiate the Register class controler 
include '../../config/dbh.classes.php';
include '../models/register.classes.php';
include '../controllers/register.contr.classes.php';
$register = new RegisterContr($username,$at_user_name,$birthdate,$city,$email,$password,$passwordRepeat);
$register->RegisterUser();
// Going back to the page 
echo "just after Register User";

header('location:../../index.php');
exit();
}