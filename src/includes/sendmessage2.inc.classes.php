<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){


    // Grab the data -_-
 
    $message=$_POST["message"];
 
   $otherid= $_SESSION["otherid"];


// Instantiate the Register class controler 
include '../../config/dbh.classes.php';
include '../models/account.classes.php';
include '../controllers/account.contr.classes.php';
$account= new AccountController($_SESSION["id"],$_SESSION["email"]);
// Going back to the page 
$account->sendMessages($otherid,$message);


header('location:../../messages.php?otherid='.$otherid.'');
exit();
}