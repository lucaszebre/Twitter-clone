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
  <script src="./assets/edit.js"></script>
  <script src="./ajax/profile.js"></script>
  <script src="./assets/modal.js"></script>
  <script src="./ajax/modalTweet.js"></script>
  <script src="./ajax/tweet.js"></script>
  <script src="./ajax/modalEdit.js"></script>
  <script src="./assets/index.js"></script>
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
 
 <div class="flex flex-col ml-16 sm:ml-[170px]   sm:mb-4 w-full h-full">
 <?php 
    include('./templates/header.php');
    include('./templates/modalTweet.php');

    
 ?>
    
    
   <div class="lg:w-[60%] w-[90%] md:max-w-[450px]   lg:max-w-none max-w-[350px] h-full flex flex-col ">

   <?php 
        include "./config/dbh.classes.php";
        include "./src/models/profile.classes.php";
        include "./src/controllers/profile.contr.classes.php";
        include "./src/views/profile.view.classes.php";     
        include "./src/models/account.classes.php";
        include "./src/controllers/account.contr.classes.php";
        include "./src/views/account.view.classes.php";
        include "./src/models/tweet.classes.php";
        include "./src/controllers/tweet.contr.classes.php";
        include "./src/views/tweet.view.classes.php";
        include "./templates/listFollow.php";


        // check if we see the profile of the current login user 
        $account = new AccountView($_SESSION['id'],$_SESSION['mail']);
        $twitterView = new TweetView();
      
      //  display the search results
      
        // if so we use account and not the profile class 
        if($_SESSION['at_user_name']==$_GET['user']){

                $account->showAccount();
                $twitterView->showTwitterUser($_GET["user"]);


                include_once('./templates/modalEdit.php');


        }else{
                $profile = new ProfileView($_GET["user"]);
                
        
                $profile->displayProfile($_GET["user"]);

                $twitterView->showTwitterUser($_GET["user"]);
        }



        
  
        // $account->checkUserId();

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



