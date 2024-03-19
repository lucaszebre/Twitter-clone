<?php 

if($_SERVER["REQUEST_METHOD"] == "GET"){
session_start();
    // Grab the data -_-

$id_follow=$_GET["id_follow"];
$user=$_GET["user"];
// Instantiate the Login class controler 
include '../../config/dbh.classes.php';

include "../models/account.classes.php";
include "../controllers/account.contr.classes.php";
  $account = new AccountController($_SESSION["id"],$_SESSION["mail"]);
  // check if already follow 
  
  // Create an instance of SearchView
  // if so we unlike

  if($account->checkFollow($id_follow,$_SESSION["at_user_name"])){
    $account-> removeFollow($id_follow,$_SESSION["at_user_name"]);
  }else{
    $account->addFollow($id_follow,$_SESSION["at_user_name"]);

  }

  // and not we like
  header("location:../../profile.php?user=$user");
  exit();
}


