<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
session_start();
    // Grab the data -_-
    $folder = '/images/';
    $data = [
        "username"     => $_POST["username"] ??"",
        "bio"     => $_POST["bio"] ??"",
        "city"     => $_POST["city"] ??"",
        "campus"     => $_POST["campus"] ??"",
        "photoProfile" => $_FILES["photoProfile"]["name"]??"",
        "banner" => $_FILES["banner"]["name"]??"",
      ];

// Instantiate the Login class controler 
    include '../../config/dbh.classes.php';

    include "../models/account.classes.php";
    include "../controllers/account.contr.classes.php";
  $account = new AccountController($_SESSION["id"],$_SESSION["mail"]);

  foreach ($data as $key => $value){
   if($key=="username"){
    $account->updateUserName($value);
   }else if($key=="bio"){
    $account->updateBio($value);
   }else if($key=="city"){
    $account->updateCity($value);
   }else if($key=="campus"){
    $account->updateCampus($value);
   }else if($key=="photoProfile"){
    $filename = $_FILES["photoProfile"]["name"];

    $tempname = $_FILES["photoProfile"]["tmp_name"]; 

    $fileType = pathinfo($filename ,PATHINFO_EXTENSION); 

    $target_file= $_SERVER['DOCUMENT_ROOT'] . $folder.basename($filename);


    $allowTypes = array('jpg','png','jpeg','gif'); 
    if(in_array($fileType, $allowTypes)){ 
        if(move_uploaded_file($tempname,$target_file)){
            $account->UpdatePhotoProfile($filename);

        }
    }

   }else if($key=="banner"){
    $filename = $_FILES["banner"]["name"];

    $tempname = $_FILES["banner"]["tmp_name"];  

    $fileType = pathinfo($filename ,PATHINFO_EXTENSION); 
    $target_file= $_SERVER['DOCUMENT_ROOT'] . $folder.basename($filename);


$allowTypes = array('jpg','png','jpeg','gif'); 
if(in_array($fileType, $allowTypes)){ 

    if(move_uploaded_file($tempname,$target_file)){
        $account->updateBanner($filename);

    }


}

   }
}



 
}