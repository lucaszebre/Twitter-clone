
<div id="modalMessage" class="relative hidden  z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      
    <div id="insidemodalMessage" class="w-11/12 md:w-6/12 sm:w-9/12 bg-white rounded-2xl  max-h-90 overflow-hidden transform -translate-y-5">

  <form  id="formMessage"    enctype="multipart/form-data">
        <section  class="p-3 flex flex-row justify-between">

        <div class="flex flex-row gap-2 items-center">
            <svg  id="closeMessage" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-900  cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <p class="text-gray-900" >
                New Message
            </p>
        </div>
        <button id="nextMessage"  type='submit' class="flex justify-center items-center bg-gray-900 text-white font-bold px-4 h-[2rem] rounded-xl w-[5rem]">Next</button>

        </section>
        <div class="relative p-2  ">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input  name="searcMessage"   id="searchMessage" class="block outline-none	border-none w-full p-4 ps-10 h-[40px] text-sm text-gray-900 rounded-lg bg-white  focus:border-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white  " placeholder="Search"  />
        <input name="userhidden" type="hidden"    id="userMessage"  />
    </div>
    <div class="overflow-y-scroll  relative h-fit" >
    <div class="w-full h-full min-h-10 flex items-center gap-2 p-2 flex-wrap" id="showuser">

    </div>
    <div class="flex border-t border-gray-200 flex-col w-full h-full" id="usersearch">

    </div>
    </div>
       

         

       </form>
</div>
    
    
    </div>
  </div>
</div>