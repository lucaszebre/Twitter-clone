<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Twitter</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="./assets/checkpath.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="icon" type="image/x-icon" href="/assets/favicon.png">

  <script src="./assets/index.js"></script>
  <script src="./assets/leftbar.js"></script>
  <script src="./assets/header.js"></script>

  <script src="https://cdn.tailwindcss.com"></script>
  
</head>
<body class="flex justify-center w-full h-full items-center relative" >
    <main class="flex  w-full h-full  max-w-[1440px] m-0 p-0 box-border">
    
    <?php 
    session_start();
    if($_SESSION['login']){

    
    include('./templates/leftbar.php')
 ?> 
 
 <div class="flex flex-col ml-16 sm:ml-[170px]   sm:mb-4 w-full h-full">
 <?php 
    include './config/dbh.classes.php';

    include('./templates/header.php');
    include('./templates/modalTweet.php');
    include "./src/models/account.classes.php";
    include "./src/controllers/account.contr.classes.php";
    $account = new AccountController($_SESSION["id"],$_SESSION["mail"]);
   

    $img = $account->getProfilePicture();
    
 ?>
   
    
   <div class="lg:w-[60%] w-[90%] md:max-w-[450px]   lg:max-w-none max-w-[350px] h-full flex flex-col ">

   <?php
      include './src/models/tweet.classes.php';
      include './src/controllers/tweet.contr.classes.php';
      include './src/views/tweet.view.classes.php';
      
      // Create an instance of SearchView
      $twitterView = new TweetView();
        
      //  display the search results
      if($_GET['hashtag']){
        $twitterView->showHashtagTweet($_GET["hashtag"]);

      }
      ?>
 </div>

   </div>
    <?php 



    
    exit();
    }else{
      include('./templates/login.php');
      exit();
    }
    ?>
    </main>
    </body>
</html>