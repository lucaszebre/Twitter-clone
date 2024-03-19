<?php 

if($_SERVER["REQUEST_METHOD"] == "POST" ){

session_start();
    // Grab the data -_-


// Instantiate the Login class controler 
include '../../config/dbh.classes.php';


// Going back to the page 

include "../models/account.classes.php";
include "../controllers/account.contr.classes.php";

$account = new AccountController($_SESSION["id"],$_SESSION["email"]);

$account->deleteAccount();


session_unset();
session_destroy();

header("location:../../index.php");
exit;

}