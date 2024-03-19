<?php 

if($_SERVER["REQUEST_METHOD"] == "GET"){
session_start();


include '../../config/dbh.classes.php';

include "../models/account.classes.php";
include "../controllers/account.contr.classes.php";
$account = new AccountController($_SESSION["id"],$_SESSION["mail"]);


$id_tweet=$_GET["id_post"];
$content=$_GET["content"];
$account->replyTweet($id_tweet,$content);

 
}