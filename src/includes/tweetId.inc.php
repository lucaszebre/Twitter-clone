<?php

if($_SERVER["REQUEST_METHOD"] == "GET" ){
session_start();
include '../../config/dbh.classes.php';
include '../models/tweet.classes.php';
include '../controllers/tweet.contr.classes.php';
include '../views/tweet.view.classes.php';


$twitterView = new TweetView();

$id_post=$_GET["id_post"];

$twitterView->showTweetIdReply($id_post);


}
?>