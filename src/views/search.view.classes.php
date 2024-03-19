<?php

class SearchView extends searchController
{
    public function showSearchResult($searchTerm,$hash)
    {
        $data = $this->search($searchTerm,$hash);
        if (count($data) > 0) {
            foreach ($data as $row) {
                $img=$row['profile_picture'];
                if ($hash!=="true") {
                    $pathprofile = is_file("../../images/$img") ? $img : "user.png";
                    echo '<a href="../../profile.php?user=' . $row["at_user_name"] . '" class=" flex shrink-0 flex-row  relative h-full w-full  h-[5rem] p-2  items-center  gap-2 rounded-lg  dark:bg-gray-800 dark:border-gray-700">';
                    echo '<img class="rounded-full h-10 w-10" src="../../images/' . $pathprofile . '" alt="Profile Picture" />';
                    echo '<p>' . $row['username'] . '</p>';
                    echo '</a>';
                } else {
                    echo '<a href="search.php?hashtag="' . $row["hashtag"] . '"><h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">#' . $row["hashtag"] . '</h5></a>';
                }
            }
        } else {
        
            echo '<span class="font-medium">No result</span>';
           
        }

    }

    public function autocomplete($val){
        $data = $this->searchAutocomplete($val);
            foreach ($data as $row) {
                echo '<a onclick="replace(\'' . $val . '\', \'' . $row['at_user_name'] . '\')" class="flex shrink-0 flex-row h-full w-full h-[5rem] p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">' . $row['at_user_name'] . '</a>';
                
            }
      


    }
}


   
