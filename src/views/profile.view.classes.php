<?php

class ProfileView extends ProfileController{

    private $profileInfo;

    public function __construct($at_user_name){
        parent::__construct($at_user_name); 
        $this->profileInfo = $this->getProfile($at_user_name);
    }


    // function to display the profile 
    public function displayProfile($user){
        $button="";
        $account = new AccountView($_SESSION['id'],$_SESSION['mail']);
        $id_follow= $this->getIdUser($user);
                if($account->checkFollow( $id_follow,$_SESSION["at_user_name"])){
                  $button= ' <a  href="./src/includes/follow.inc.php?id_follow='. $id_follow.'&user='.$_GET["user"].'"  class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">
                  <button class="flex justify-center  max-h-max whitespace-nowrap focus:outline-none  focus:ring  rounded max-w-max border bg-transparent border-blue-500 text-blue-500 hover:border-blue-800 hover:border-blue-800 flex items-center hover:shadow-lg font-bold py-2 px-4 rounded-full mr-0 ml-auto">
                  UnFollow
              </button>
                      </a>';
                }else{
                 $button = ' <a  href="./src/includes/follow.inc.php?id_follow='. $id_follow.'&user='.$_GET["user"].'"  class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">
                  <button class="flex justify-center  max-h-max whitespace-nowrap focus:outline-none  focus:ring  rounded max-w-max border bg-transparent border-blue-500 text-blue-500 hover:border-blue-800 hover:border-blue-800 flex items-center hover:shadow-lg font-bold py-2 px-4 rounded-full mr-0 ml-auto">
                  Follow
              </button>
                      </a>';
                }
        $pathbanner="banner.jpg";
        if($this->profileAccount["banner"]){
            $pathbanner=$this->profileAccount["banner"];
        }
        $pathprofile="user.png";
        if($this->profileAccount["profile_picture"]){
            $pathprofile=$this->profileAccount["profile_picture"];
        }

      
     $follower = count($this->getListFollowers($user));
     $following = count($this->getListFollowing($user));
       echo '<div class="">
       <div class="w-full bg-cover bg-no-repeat bg-center" style="height: 200px; background-image: url(./images/'.  $pathbanner .');">
           <img class="opacity-0 w-full h-full" src="./images/'.  $pathprofile .'" alt="">
       </div>
       <div class="p-4 border border-gray-200">
           <div class="relative flex w-full">
               <div class="flex flex-1">
                   <div style="margin-top: -6rem;">
                       <div style="height:9rem; width:9rem;" class="md rounded-full relative avatar">
                           <img style="height:9rem; width:9rem;" class="md rounded-full relative border-4 border-gray-900" src="./images/'.  $pathprofile .'" alt="">
                           <div class="absolute"></div>
                       </div>
                   </div>
               </div>
               <div class="flex flex-col text-right">
                 ' 
                 . $button .'
               </div>
           </div>
   
           <div class="space-y-1 justify-center w-full mt-3 ml-3">
               <div>
                   <h2 class="text-xl leading-6 font-bold text-gray-600">'. $this->profileInfo['username'].'</h2>
                   <p class="text-sm leading-5 font-medium text-gray-600">@' .$this->profileInfo["at_user_name"] .'</p>
               </div>
               <div class="mt-3">
                   <p class="text-gray-600 leading-tight mb-2">'. $this->profileInfo['bio'] . ' </p>
                   <div class="text-gray-600 flex">
                       <span class="flex mr-2"><svg viewBox="0 0 24 24" class="h-5 w-5 paint-icon"><g><path d="M19.708 2H4.292C3.028 2 2 3.028 2 4.292v15.416C2 20.972 3.028 22 4.292 22h15.416C20.972 22 22 20.972 22 19.708V4.292C22 3.028 20.972 2 19.708 2zm.792 17.708c0 .437-.355.792-.792.792H4.292c-.437 0-.792-.355-.792-.792V6.418c0-.437.354-.79.79-.792h15.42c.436 0 .79.355.79.79V19.71z"></path><circle cx="7.032" cy="8.75" r="1.285"></circle><circle cx="7.032" cy="13.156" r="1.285"></circle><circle cx="16.968" cy="8.75" r="1.285"></circle><circle cx="16.968" cy="13.156" r="1.285"></circle><circle cx="12" cy="8.75" r="1.285"></circle><circle cx="12" cy="13.156" r="1.285"></circle><circle cx="7.032" cy="17.486" r="1.285"></circle><circle cx="12" cy="17.486" r="1.285"></circle></g></svg> <span class="leading-5 ml-1">'.$this->formatDate($profileInfo['creation_time']).'</span></span>
                   </div>
               </div>
               <div class="pt-3 flex justify-start items-start w-full divide-x divide-gray-800 divide-solid">
                   <div onclick="listFollowing(\'' . $user. '\')" class="text-center cursor-pointer pr-3"><span class="font-bold text-black">'. $follower .'</span><span class="text-gray-600"> Following</span></div>
                   <div onclick="listFollower(\'' . $user. '\')" class="text-center cursor-pointer  px-3"><span class="font-bold text-black">' . $following .'</span><span class="text-gray-600"> Followers</span></div>
               </div>
           </div>
       </div>
   </div>';

    }

    
    public function displayListFollowing($at_user_name){

        include '../models/account.classes.php';
        include '../controllers/account.contr.classes.php';
        $account = new AccountController($_SESSION['id'],$_SESSION['mail']);
        $data= $account->getListFollowing($at_user_name);

                
        if(!empty($data)){
            foreach ($data as $row) {
                $img=$row['profile_picture'];
                    $pathprofile = is_file("../../images/$img") ? $img : "user.png";
    
           
    
       echo '
          
           <a href="../../profile.php?user='.$row['at_user_name'].'" class="relative p-4 cursor-pointer  border-gray-200 flex-row  flex w-full justify-center gap-4">
                       <div style="height:3rem; width:3rem;" class="ml-3 rounded-full relative avatar">
                           <img style="height:3rem; width:3rem;" class="md rounded-full relative border-4 border-gray-900" src="./images/'.  $pathprofile .'" alt="">
                        </div>
                        <div class=" justify-start ">
                        <h2 class="text-xl leading-6 font-bold text-white">'. $row['username'].'</h2>
                        <p class="text-sm leading-5 font-medium text-gray-600">@' .$row["at_user_name"] .'</p>
                           
                        </div>
    
           
       </a>
    ';
            }
        }else{
            echo "<p class='text-white p-5'>Nobody is in the following -_-</p>";
        }
       

      
    }
    
    public function displayListFollowers($at_user_name){
        include '../models/account.classes.php';
        include '../controllers/account.contr.classes.php';
        $account = new AccountController($_SESSION['id'],$_SESSION['mail']);
        $data= $account->getListFollowers($at_user_name);

        if(!empty($data)){
            foreach ($data as $row) {
                $img=$row['profile_picture'];
                    $pathprofile = is_file("../../images/$img") ? $img : "user.png";
    
           
    
       echo '
          
           <a href="../../profile.php?user='.$row['at_user_name'].'" class="relative p-4 cursor-pointer  border-gray-200 flex-row  flex w-full justify-center gap-4">
                       <div style="height:3rem; width:3rem;" class="ml-3 rounded-full relative avatar">
                           <img style="height:3rem; width:3rem;" class="md rounded-full relative border-4 border-gray-900" src="./images/'.  $pathprofile .'" alt="">
                        </div>
                        <div class=" justify-start ">
                        <h2 class="text-xl leading-6 font-bold text-white">'. $row['username'].'</h2>
                        <p class="text-sm leading-5 font-medium text-gray-600">@' .$row["at_user_name"] .'</p>
                           
                        </div>
    
           
       </a>
    ';
            }
        }else{
            echo "<p class='text-white p-5' >Nobody is in the follower -_-</p>";
        }
       
    }
   

  
    
}
    

    

   

  
    

   