<?php 
        include "../config/dbh.classes.php";
        include "../src/models/tweet.classes.php";
        include "../src/controllers/tweet.contr.classes.php";


        // check if we see the profile of the current login user 
        $profile = new Profile();
        $row= $profile->getProfilePicture($_GET['user']);

        $pathprofile = file_exists('../../images/' . $row["profile_picture"]) ? $row["profile_picture"] : "user.png";
        $pathbanner = file_exists('../../images/' . $row["banner"]) ? $row["banner"] : "banner.jpg";

?>
<div id="modalEdit" class="relative hidden z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      
    <div id="insidemodal" class="w-11/12 md:w-6/12 sm:w-9/12 bg-white rounded-2xl transform -translate-y-5">

  <form id="formEdit" method="post" action="./src/includes/edit.inc.php"  enctype="multipart/form-data">
        <section id="closeEdit" class="p-3 border-b border-gray-600 flex flex-row justify-between">

        <div class="flex flex-row gap-2 items-center">
            <svg  xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-900  cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <p class="text-gray-900" >
                Edit Profile
            </p>
        </div>
        <button  type='submit' class="flex justify-center items-center bg-gray-900 text-white font-bold px-4 h-[2rem] rounded-xl w-[5rem]">Save</button>

        </section>
        <div id="background" class="w-full bg-cover justify-center items-center flex h-full bg-no-repeat bg-center" style="height: 200px; background-image: url('./images/<?php  echo $pathbanner  ?>');">
            <div id="buttonBanner" class="flex cursor-pointer items-center justify-center bg-gray-100 rounded-full hover:bg-gray-500 p-3">
                <svg viewBox="0 0 24 24" aria-hidden="true" class="w-8 h-8 text-white r-4qtqp9 r-yyyyoo r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-18yzcnr r-yc9v9c" style="color: rgb(0, 0, 0);"><g><path d="M9.697 3H11v2h-.697l-3 2H5c-.276 0-.5.224-.5.5v11c0 .276.224.5.5.5h14c.276 0 .5-.224.5-.5V10h2v8.5c0 1.381-1.119 2.5-2.5 2.5H5c-1.381 0-2.5-1.119-2.5-2.5v-11C2.5 6.119 3.619 5 5 5h1.697l3-2zM12 10.5c-1.105 0-2 .895-2 2s.895 2 2 2 2-.895 2-2-.895-2-2-2zm-4 2c0-2.209 1.791-4 4-4s4 1.791 4 4-1.791 4-4 4-4-1.791-4-4zM17 2c0 1.657-1.343 3-3 3v1c1.657 0 3 1.343 3 3h1c0-1.657 1.343-3 3-3V5c-1.657 0-3-1.343-3-3h-1z"></path></g></svg>
            </div>
       </div>
       <div class="p-4 border border-gray-200">
           <div class="relative flex w-full">
               <div class="flex flex-1">
                   <div style="margin-top: -6rem;">
                       <div style="height:9rem; width:9rem;" class="md rounded-full relative avatar">
                            <div id="buttonPP" class="flex cursor-pointer absolute z-10 top-[50%] left-[50%] items-center justify-center bg-gray-100 rounded-full hover:bg-gray-500 p-3">
                                <svg viewBox="0 0 24 24" aria-hidden="true" class="w-8 h-8 text-white r-4qtqp9 r-yyyyoo r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-18yzcnr r-yc9v9c" style="color: rgb(0, 0, 0);"><g><path d="M9.697 3H11v2h-.697l-3 2H5c-.276 0-.5.224-.5.5v11c0 .276.224.5.5.5h14c.276 0 .5-.224.5-.5V10h2v8.5c0 1.381-1.119 2.5-2.5 2.5H5c-1.381 0-2.5-1.119-2.5-2.5v-11C2.5 6.119 3.619 5 5 5h1.697l3-2zM12 10.5c-1.105 0-2 .895-2 2s.895 2 2 2 2-.895 2-2-.895-2-2-2zm-4 2c0-2.209 1.791-4 4-4s4 1.791 4 4-1.791 4-4 4-4-1.791-4-4zM17 2c0 1.657-1.343 3-3 3v1c1.657 0 3 1.343 3 3h1c0-1.657 1.343-3 3-3V5c-1.657 0-3-1.343-3-3h-1z"></path></g></svg>
                            </div>
                           <img id="profile" style="height:9rem; width:9rem;" class="md rounded-full relative border-4 border-gray-900" src="./images/<?php echo $pathprofile  ?>" alt="">
                           <div class="absolute"></div>
                       </div>
                   </div>
               </div>
               
           </div>
        </div>
        <div class="mb-5 flex flex-col justify-start items-start p-2">
           <label for="username" class="block mb-2 font-bold text-gray-600">UserName</label>
           <input type="text" value="<?php echo $row['username'] ?>" id="username" name="username" placeholder="Put in your fullname." class="border border-gray-300 shadow p-3 w-full rounded mb-">
         </div>
         <div class="mb-5 flex flex-col justify-start items-start p-2">
           <label for="bio" class="block mb-2 font-bold text-gray-600">Bio</label>
           <input type="text" id="bio" value="<?php echo $row['bio'] ?>" name="bio" placeholder="My name is marty and i like man an girl his fish!" class="border border-gray-300 shadow p-3 w-full rounded mb-">
         </div> 
       
         <div class="mb-5 flex flex-col justify-start items-start p-2">
           <label for="city" class="block mb-2 font-bold text-gray-600">City</label>
           <input type="text" value="<?php echo $row['city'] ?>" id="city" name="city" placeholder="Paris" class="border border-gray-300 shadow p-3 w-full rounded mb-">
         </div>
          <div class="mb-5 flex flex-col justify-start items-start p-2">
           <label for="campus" class="block mb-2 font-bold text-gray-600">Campus</label>
           <input type="text" id="campus" value="<?php echo $row['campus'] ?>" name="campus" placeholder="Epitech" class="border border-gray-300 shadow p-3 w-full rounded mb-">
         </div>

         

       </form>
</div>
    
    
    </div>
  </div>
</div>