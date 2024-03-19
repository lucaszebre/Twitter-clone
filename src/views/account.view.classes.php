<?php

class AccountView extends AccountController{

    private $accountInfo;

    public function __construct($id,$email) {
        parent::__construct($id,$email); 
        $this->accountInfo = $this->getAccount($id);
    }
    

    
    public function showAccount(){


            $pathbanner="banner.jpg";
            if($this->accountInfo["banner"]){
                $pathbanner=$this->accountInfo["banner"];
            }
            $pathprofile="user.png";
            if($this->accountInfo["profile_picture"]){
                $pathprofile=$this->accountInfo["profile_picture"];
            }
            $follower = count($this->getListFollowers($_SESSION["at_user_name"]));
            $following = count($this->getListFollowing($_SESSION["at_user_name"]));
           echo '<div>
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
                       <button id="editButton" class="flex justify-center  max-h-max whitespace-nowrap focus:outline-none  focus:ring  rounded max-w-max border bg-transparent border-blue-500 text-blue-500 hover:border-blue-800 hover:border-blue-800 flex items-center hover:shadow-lg font-bold py-2 px-4 rounded-full mr-0 ml-auto">
                           Edit Profile
                       </button>
                   </div>
               </div>
       
               <div class="space-y-1 justify-center w-full mt-3 ml-3">
                   <div>
                       <h2 class="text-xl leading-6 font-bold text-gray-600">'. $this->accountInfo['username'].'</h2>
                       <p class="text-sm leading-5 font-medium text-gray-600">@' .$this->accountInfo["at_user_name"] .'</p>
                   </div>
                   <div class="mt-3">
                       <p class="text-gray-600 leading-tight mb-2">'. $this->accountInfo['bio'] . ' </p>
                       <div class="text-gray-600 flex">
                           <span class="flex mr-2"><svg viewBox="0 0 24 24" class="h-5 w-5 paint-icon"><g><path d="M19.708 2H4.292C3.028 2 2 3.028 2 4.292v15.416C2 20.972 3.028 22 4.292 22h15.416C20.972 22 22 20.972 22 19.708V4.292C22 3.028 20.972 2 19.708 2zm.792 17.708c0 .437-.355.792-.792.792H4.292c-.437 0-.792-.355-.792-.792V6.418c0-.437.354-.79.79-.792h15.42c.436 0 .79.355.79.79V19.71z"></path><circle cx="7.032" cy="8.75" r="1.285"></circle><circle cx="7.032" cy="13.156" r="1.285"></circle><circle cx="16.968" cy="8.75" r="1.285"></circle><circle cx="16.968" cy="13.156" r="1.285"></circle><circle cx="12" cy="8.75" r="1.285"></circle><circle cx="12" cy="13.156" r="1.285"></circle><circle cx="7.032" cy="17.486" r="1.285"></circle><circle cx="12" cy="17.486" r="1.285"></circle></g></svg> <span class="leading-5 ml-1">'.$this->formatDate($accountInfo['creation_time']).'</span></span>
                       </div>
                   </div>
                   <div class="pt-3 flex justify-start items-start w-full divide-x divide-gray-800 divide-solid">
                   <div  onclick="listFollowing(\'' . $this->accountInfo["at_user_name"]. '\')" class="text-center cursor-pointer pr-3"><span class="font-bold text-black">'. $following .'</span><span class="text-gray-600"> Following</span></div>
                   <div onclick="listFollower(\'' . $this->accountInfo["at_user_name"]. '\')" class="text-center cursor-pointer px-3"><span class="font-bold text-black">' . $follower.'</span><span class="text-gray-600"> Followers</span></div>
                   </div>
               </div>
           </div>
       </div>';
    
        
    }



  

    
    public function fetchInitial(){
        echo substr($this->accountInfo[0]["firstname"],0,1);echo " "; echo substr($this->accountInfo[0]["lastname"],0,1);
    }
    


    public function fetchConvList(){
        $data = $this->getConvList();
        echo '<div class="flex flex-col w-2/5 border-r-2 overflow-y-auto">';

        if(!empty($data)){
            foreach ($data as $row) {
                if (count($data) > 0) {
                    echo '<a href=./messages.php?otherid='.$row["id"].'>';
                echo '<div class="flex cursor-pointer flex-row py-4 px-2 justify-center items-center border-b-2">';
            echo '<div class="w-1/4">';
            echo '<div class="relative inline-flex items-center justify-center w-20 h-20 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">';
                echo '<span class="font-bold text-lg text-gray-600 dark:text-gray-300">' . substr($row["firstname"], 0, 1) . ' ' . substr($row["lastname"], 0, 1) . '</span>';
                echo '</div>';
            echo    "</div>";
            echo   '<div class="w-full">';
            echo   '<div class="text-lg font-semibold">' . $row["firstname"] . ' ' . $row["lastname"] .'</div>';
            echo   '</div>';
            echo "</div>";
            echo '<div class="w-[800px] overflow-hidden">';
            echo '<section id="carousel" class="flex relative whitespace-nowrap shrink-0 flex-row w-[800px] max-h-[400px] h-full w-full">'; 
            echo "</a>";
        }else{

                
            }
       
         
        }
        }else{
            echo '<p>No message yet</p>';
        }
        echo '</div>';
        echo '</div>';

            
    }


    public function fetchConv($otherID){
        $data = $this->getMessage($otherID);

        foreach ($data as $row) {
            echo '<div class="flex justify-' . ($row["sender_id"] == $_SESSION["id"] ? 'end' : 'start') . ' mb-4">
                    <img src="https://source.unsplash.com/vpOeXr5wmR4/600x600" class="object-cover h-8 w-8 rounded-full" alt="" />';
        
            echo '<div class="' . ($row["sender_id"] == $_SESSION["id"] ? 'mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white' : 'ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white') . '">
                    ' . $row["message_text"] . '
                </div>';
        
            echo '</div>';
        }
    }


}