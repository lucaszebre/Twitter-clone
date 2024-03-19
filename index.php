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
  <script src="./assets/index.js"></script>
  <script src="./assets/modal.js"></script>
  <script src="./ajax/modalTweet.js"></script>
  <script src="./ajax/tweet.js"></script>
  <script src="./assets/leftbar.js"></script>
  <script src="./assets/header.js"></script>

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/x-icon" href="/assets/favicon.png">
</head>
    <body class="flex justify-center w-full h-full items-center relative" >
    <main class="flex  w-screen h-full  max-w-[1440px] m-0 p-0 box-border">
    <?php 
    session_start();
    if($_SESSION['login']){

    
    include('./templates/leftbar.php')
 ?> 
 
 <div class="flex flex-col ml-[170px]   sm:mb-4 w-full h-full">
 <?php 
    include('./templates/header.php');
    include './config/dbh.classes.php';

    include "./src/models/account.classes.php";
    include "./src/controllers/account.contr.classes.php";
    $account = new AccountController($_SESSION["id"],$_SESSION["mail"]);
   

    $img = $account->getProfilePicture();
    include('./templates/modalTweet.php');
    include('./templates/modalReply.php');
    $pathprofile = file_exists("./images/$img") ? $img : "user.png";

    echo $pathprofile
 ?>
    
    
   <div  class="lg:w-[60%] w-[90%] md:max-w-[450px]   lg:max-w-none max-w-[350px]   h-full flex flex-col ">
   <form id="addtweet2" class="w-[100%] pb-3 pt-3 flex gap-2 flex-row mt-3 pl-2">  
        <img class="rounded-full w-10 h-10" src=" <?php echo "./images/$pathprofile" ?>" alt=""> 
       
        <input type="tweet" id="tweet" class="block w-full p-4 ps-10 h-[40px] text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="What is happening buddy ?" required />
    </form>
    <div id="tweet-container" class="w-full h-full flex flex-col">

    </div>
  
 </div>
 <div class="w-[30%] fixed right-0 top-16 h-full w-full" id="containerSearch">

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

