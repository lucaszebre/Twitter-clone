<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){


    // Grab the data -_-
$email = $_POST["email"] ;
$password = $_POST["password"]; 

if(empty($email)||empty($password)){
    header('location:../../index.php?error=emptyInput');
    exit();
}


// echo $email;

// echo "\n";

// echo $password;


// Instantiate the Login class controler 
include '../../config/dbh.classes.php';
include '../models/login.classes.php';
include '../controllers/login.contr.classes.php';
$login = new LoginController($email,$password);

$login->LoginUser();
// Going back to the page 

include "../models/account.classes.php";
include "../controllers/account.contr.classes.php";

$account = new AccountController($_SESSION["id"],$_SESSION["mail"]);

header('location:../../index.php');
exit();
}