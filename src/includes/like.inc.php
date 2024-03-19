<?php 

if($_SERVER["REQUEST_METHOD"] == "GET"){
session_start();


include '../../config/dbh.classes.php';

include "../models/account.classes.php";
include "../controllers/account.contr.classes.php";
  $account = new AccountController($_SESSION["id"],$_SESSION["mail"]);
  include '../models/tweet.classes.php';
  include '../controllers/tweet.contr.classes.php';
  
  $twitterController = new tweetController();

  if($twitterController->checkIfLike($_SESSION["id"],$_GET["id_post"])){
    $account->removeLike($_GET["id_post"]);
  }else{
    $account->addLike($_GET["id_post"]);

  }

}