<div class="flex z-10 flex-row sticky items-center	pr-4 top-0 bg-white h-[60px] w-full">
<div class="w-full flex flex-row items-center  pr-2 h-full justify-start">



<p id="indexheader" class="black p-7 hidden"> For you </p>


<div id="profileheader" class="flex flex-row hidden  ml-2 gap-3 items-center ">
    <a href="/index.php">
    <svg viewBox="0 0 24 24" aria-hidden="true" class="h-5 w-5 hover:bg-gray-200 rounded-full  r-4qtqp9 r-yyyyoo r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-z80fyv r-19wmn03" style="color: rgb(15, 20, 25);"><g><path d="M7.414 13l5.043 5.04-1.414 1.42L3.586 12l7.457-7.46 1.414 1.42L7.414 11H21v2H7.414z"></path></g></svg>

    </a>
    <p>Profile</p>
</div>

<form id="searchheader" class="relative hidden w-full pl-2">   
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input name="hashtag"  id="search" class="block w-full p-4 ps-10 h-[40px] text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required />
        </div>
</form>

</div>
<div class="lg:flex hidden justify-end  w-full">
    <form id="normal" class="relative  pl-2">   
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input name="term"  id="search_2" class="block w-full p-4 ps-10 h-[40px] text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required />
            <?php include './templates/modalSearch.php' ?>
        </div>
    </form>

</div>



</div>