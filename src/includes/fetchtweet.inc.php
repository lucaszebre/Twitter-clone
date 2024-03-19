<?php


include '../../config/dbh.classes.php';
include '../models/tweet.classes.php';
include '../controllers/tweet.contr.classes.php';
include '../views/tweet.view.classes.php';


$twitterView = new TweetView();

$twitterView->showTwitterResult();
?>
