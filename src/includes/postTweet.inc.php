<?php 

if($_SERVER["REQUEST_METHOD"] == "POST" ){

session_start();
    // Grab the data -_-
    $folder = '/images/';

$content = $_POST["content"];

// Instantiate the Login class controler 
include '../../config/dbh.classes.php';


// Going back to the page 

include "../models/account.classes.php";
include "../controllers/account.contr.classes.php";

$account = new AccountController($_SESSION["id"],$_SESSION["mail"]);

$filename = $_FILES["file"]["name"];

$tempname = $_FILES["file"]["tmp_name"]; 

$fileType = pathinfo($filename ,PATHINFO_EXTENSION); 

$path = $folder. $account->generateRandomName() .".". $fileType ;
$target_file= $_SERVER['DOCUMENT_ROOT'] . $path;



$allowTypes = array('jpg','png','jpeg','gif'); 
if(in_array($fileType, $allowTypes)){ 
    if(move_uploaded_file($tempname,$target_file)){
        $content = $content . $path . " ";
        $account->addTweet($content);
        echo "1";
    }
}else{
    $account->addTweet($content );
    echo "0";
}





}