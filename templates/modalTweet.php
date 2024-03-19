<?php 
            $pathprofile = file_exists("./images/$img") ? $img : "user.png";

?>
<div id="modal" class="relative hidden z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      
    <div id="insidemodal" class="w-11/12 md:w-6/12 sm:w-9/12 bg-white dark:bg-gray-900 rounded-2xl transform -translate-y-5">
  <section class="p-3 border-b border-gray-600">
    <svg id="close" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 hover:text-blue-400 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
    </svg>
  </section>
  <form id="modalTweet" method="post" enctype="multipart/form-data" class="w-full flex px-3 py-2">
    <div class="mr-1">
    <img class="rounded-full w-10 h-10" src=" <?php echo "./images/$pathprofile" ?>" alt=""> 
    </div>
    <div class="flex-1">
      <textarea  id="content" 
     
       name="content" maxlength="140" class="w-full p-2 bg-transparent text-gray-900 outline-none placeholder-gray-400  resize-none" rows="4" placeholder="What's happening?"></textarea>
       <div id="suggestion" class="flex flex-col hidden w-[300px] h-full bg-white gap-2">

       </div>
      <div class="relative">
        <img class="w-full h-full hidden" id="preview"  />
        <div id="preview_close" class="top-2 h-10 w-10 hidden cursor-pointer right-2 absolute">
          <svg viewBox="0 0 24 24" aria-hidden="true" class="r-4qtqp9 r-yyyyoo r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-1hjwoze r-12ym1je" style="color: rgb(255, 255, 255);"><g><path d="M10.59 12L4.54 5.96l1.42-1.42L12 10.59l6.04-6.05 1.42 1.42L13.41 12l6.05 6.04-1.42 1.42L12 13.41l-6.04 6.05-1.42-1.42L10.59 12z"></path></g></svg>
        </div>
      </div>
      <div class="flex items-center justify-between pt-2 border-t border-gray-700">
        <div id="image" class="flex">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-600 hover:text-blue-400 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          
        </div>
        <div>
          <button type="submit" id="submit" class="transition duration-500 ease-in-out bg-blue-500 bg-opacity-50 hover:bg-opacity-100 text-white text-opacity-50 hover:text-opacity-100 py-2 px-3 rounded-full text-base font-bold focus:outline-none">Tweet</button>
        </div>
      </div>
    </div>
</form>
</div>
    
    
    </div>
  </div>
</div>
