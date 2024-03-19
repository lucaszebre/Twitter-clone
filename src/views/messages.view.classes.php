<?php

class MessagesView extends MessagesController{

    public function ShowSearchAccount($searchTerm){

        $data = $this->searchAccount($searchTerm, $hash);
        if (count($data) > 0) {
            foreach ($data as $row) {
                $img=$row['profile_picture'];
                    $pathprofile = is_file("../../images/$img") ? $img : "user.png";
                    echo '<a onclick="manageUser(\'' . $row["at_user_name"]. '\')" class=" hover:bg-gray-200 cursor-pointer flex shrink-0 flex-row  relative h-full w-full  h-[5rem] p-2  items-center  gap-2  dark:bg-gray-800 dark:border-gray-700">';
                    echo '<img class="rounded-full h-10 w-10" src="../../images/' . $pathprofile . '" alt="Profile Picture" />';
                    echo '<p>' . $row['username'] . '</p>';
                    echo '</a>';
                
            }
        } else {
        
            echo '<span class="font-medium">No result</span>';
           
        }
    } 
    
    public function ShowUserModal($array){

        $data = $this->fetchUser($array);
        if (count($data) > 0) {
            foreach ($data as $row) {
                $img=$row['profile_picture'];
                    $pathprofile = is_file("../../images/$img") ? $img : "user.png";
                    echo '<a onclick="manageUser(\'' . $row["at_user_name"]. '\')" class=" hover:bg-gray-200 cursor-pointer flex shrink-0 flex-row  relative border border-gray-200 rounded-xl  h-[2rem] p-2  items-center  gap-2  dark:bg-gray-800 dark:border-gray-700">';
                    echo '<img class="rounded-full h-4 w-4" src="../../images/' . $pathprofile . '" alt="Profile Picture" />';
                    echo '<p>' . $row['username'] . '</p>';
                    echo '<svg viewBox="0 0 24 24" aria-hidden="true" class="r-4qtqp9 h-4 w-4 r-yyyyoo r-1xvli5t r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-1cvl2hr r-1q142lx r-19u6a5r"><g><path d="M10.59 12L4.54 5.96l1.42-1.42L12 10.59l6.04-6.05 1.42 1.42L13.41 12l6.05 6.04-1.42 1.42L12 13.41l-6.04 6.05-1.42-1.42L10.59 12z"></path></g></svg>';
                    echo '</a>';
                
            }
        } 
    } 
    
    public function ShowListConvo(){
        $data = $this->fetchConv();
            foreach ($data as $row) {
                $img=$row['picture'];
                    $pathprofile = is_file("../../images/$img") ? $img : "user.png";
                    echo '<a href=./messages.php?q='.$row["id"].'  class=" hover:bg-gray-200 flex cursor-pointer shrink-0 flex-row  relative h-full w-full  h-[5rem] p-2  items-center  gap-2  dark:bg-gray-800 dark:border-gray-700">';
                    echo '<img class="rounded-full h-10 w-10" src="../../images/' . $pathprofile . '" alt="Profile Picture" />';
                    echo '<p>' . $row['name'] . '</p>';
                    echo '</a>';
                
            }
    }

    public function showConvo($id){
        $conversation = $this->getConv($id);
        if ($conversation) {
            $output = ' <div class="flex flex-row gap-3 h-16 items-center fixed z-10 bg-white border-b border-gray-200 top-0 justify-start pl-4 w-full">
            <a href="/messages.php"><svg viewBox="0 0 24 24" aria-hidden="true" class="w-4 h-4 r-4qtqp9 r-yyyyoo r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-z80fyv r-19wmn03" style="color: rgb(15, 20, 25);"><g><path d="M7.414 13l5.043 5.04-1.414 1.42L3.586 12l7.457-7.46 1.414 1.42L7.414 11H21v2H7.414z"></path></g></svg></a>
            <h1>
              '.$conversation['name'] .'
            </h1>
        </div>
        <div class="flex flex-col ml-4 mb-16 mt-16 gap-2" id="containerConv">
           
        </div>';
            $output .= ' <div class="flex flex-row gap-3 h-16 items-center fixed z-10 bg-white border-t border-gray-200 bottom-0 justify-start pl-4 w-full">
            <input type="tweet" id="send" name="hashtag" class="block w-[45%] p-4 ps-10 h-[40px] text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="What is happening buddy ?" required />
              <input id="idConv" type="hidden" value='.$id.' />
            <button onclick="sendMessage(\'' . $id. '\')" class="flex justify-center items-center bg-gray-900 text-white font-bold px-4 h-[2rem] rounded-xl w-[5rem]" >Send</button>
              </div>
              ';
        

          
    
    
            echo $output;
        } 
    }


    public function showMessages($id_conv){
        $messages = $this->getMessage($id_conv);
        if ($messages) {
           
    
            foreach ($messages as $message) {
                echo '<div class="flex items-start gap-2.5">
                <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                   <div class="flex items-center space-x-2 rtl:space-x-reverse">
                      <span class="text-sm font-semibold text-gray-900 dark:text-white">'.$this->getUserName($message['id_user']).'</span>
                      <span class="text-sm font-normal text-gray-500 dark:text-gray-400">'.$message['time'].'</span>
                   </div>
                   <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">'.$message['content'].'</p>
                </div>
                
               
             </div>';
                
            }
    
            echo $output;
        }
    }
    
    
    


    
    
   
}