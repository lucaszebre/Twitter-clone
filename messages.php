<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Messages - Twitter</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="./ajax/messages.js"></script>
  <script src="./assets/messages.js"></script>
  <script src="./assets/leftbar.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="./assets/header.js"></script>

  
</head>
<body class="flex justify-center w-full h-full items-center border-box overflow-auto  relative" >
    <main class="flex w-screen h-full   max-w-[1440px] m-0 p-0 ">
    <?php 
    session_start();
    if($_SESSION['login']){

    
    include('./templates/leftbar.php');
    include('./templates/modalMessage.php');
 ?> 
 
 <div class="flex flex-row ml-[5rem] sm:ml-[170px]   sm:mb-4relative  w-full h-full">
 <?php 
    include './config/dbh.classes.php';

    include "./src/models/account.classes.php";
    include "./src/controllers/account.contr.classes.php";
    $account = new AccountController($_SESSION["id"],$_SESSION["mail"]);
   

    $img = $account->getProfilePicture();
    $pathprofile = file_exists("./images/$img") ? $img : "user.png";

    
 ?>
    <?php

if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['q'])){

    include('./src/models/messages.classes.php');
    include('./src/controllers/messages.contr.classes.php');
    include('./src/views/messages.view.classes.php');

     $msg = new MessagesView();
      if(isset($_GET['q'])){
        $msg->showConvo($_GET['q']);

      }
}else{
      ?>
    
  <div  class="lg:w-[30%]  w-full  justify-start  border border-right-gray-200  h-full flex flex-col ">
    <div class="flex flex-row py-2 pl-2 pr-3 justify-between items-center w-full">
      <h1 class="text-xl">Messages</h1>
      <svg viewBox="0 0 24 24" aria-hidden="true" id="openMessage" class="r-4qtqp9 cursor-pointer w-5 h-5 r-yyyyoo r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-z80fyv r-19wmn03" style="color: rgb(15, 20, 25);"><g><path d="M1.998 5.5c0-1.381 1.119-2.5 2.5-2.5h15c1.381 0 2.5 1.119 2.5 2.5V12h-2v-1.537l-8 3.635-8-3.635V18.5c0 .276.224.5.5.5H13v2H4.498c-1.381 0-2.5-1.119-2.5-2.5v-13zm2 2.766l8 3.635 8-3.635V5.5c0-.276-.224-.5-.5-.5h-15c-.276 0-.5.224-.5.5v2.766zM19 18v-3h2v3h3v2h-3v3h-2v-3h-3v-2h3z"></path></g></svg>
    </div>
    <form class="w-full relative  mb-3   pl-2 pr-3">   
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input name="term"  id="search" class="block w-full p-4 ps-10 h-[40px] text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required />
        <?php include './templates/modalSearch.php' ?>
    </div>
  </form>
    <div id="conversation" class="w-full h-full flex flex-col">

    </div>
  
 </div> 
 <?php 
}
?>
 <div class="w-[70%] lg:flex  hidden flex-col gap-4 justify-end relative  items-center">
    <?php

if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['q'])){

    include('./src/models/messages.classes.php');
    include('./src/controllers/messages.contr.classes.php');
    include('./src/views/messages.view.classes.php');

     $msg = new MessagesView();
      if(isset($_GET['q'])){
        $msg->showConvo($_GET['q']);

      }
}else{
      ?>
      <div class="w-full h-full flex flex-col justify-center items-center">
        <div class="flex flex-col items-start gap-2">
        <h1 class="font-mono text-xl font-bold" >
      Select a message
    </h1>
    <p class="w-[60%] text-gray-600 ">
    Choose from your existing conversations, start a new one, or just kep swimming.
    </p>
    <button id="message2" class="bg-blue-500 text-white px-8 h-[3rem] rounded-3xl">New message</button> 
        </div>

      </div>
 
   
  <?php
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
