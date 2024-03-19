<?php 

if($_SERVER["REQUEST_METHOD"] == "GET"){
session_start();


include '../../config/dbh.classes.php';

include "../models/profile.classes.php";
include "../controllers/profile.contr.classes.php";
include "../views/profile.view.classes.php";

$profile = new ProfileView($_GET["user"]);

$profile->displayListFollowing($_GET["user"]);

 
}