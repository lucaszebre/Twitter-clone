<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "GET"){



include '../../config/dbh.classes.php';
include '../models/account.classes.php';
include '../controllers/account.contr.classes.php';

$account= new AccountController($_SESSION["id"],$_SESSION["email"]);

$id_convo=$_GET['idconv'];
$content=$_GET['content'];
$account->sendMessages($id_convo, $_SESSION["id"], $content);



}