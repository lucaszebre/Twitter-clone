<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "GET"){


include '../../config/dbh.classes.php';
include '../models/messages.classes.php';
include '../controllers/messages.contr.classes.php';

$msg= new MessagesController();


$msg->createConv($_GET['val']);




}