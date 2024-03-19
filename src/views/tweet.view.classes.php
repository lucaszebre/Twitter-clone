<?php
session_start();
class TweetView extends tweetController
{
    public function showTweetIdReply($id_post)
{
    $row = $this->getTweetbyId($id_post);
    if (!empty($row)) {
         

            $pathprofile = file_exists('../../images/' . $row["profile_picture"]) ? $row["profile_picture"] : "user.png";
            if(empty($row["id_quoted_tweet"])){

            echo '<div class="border border-gray-200 dark:border-dim-200 cursor-pointer pd-4">';
            echo '<div class="flex flex-row justiy-between w-full">';
            echo '<div class="flex p-4 pb-0">';
            echo '<img src="./images/' . $pathprofile . '" class="h-9 w-9 rounded-full" alt="pic">';
            echo '<p class="ml-2 flex flex-shrink-0 items-center font-medium text-gray-800 dark:text-white">' . $row['username'] . '
                    <a class="ml-1 text-sm leading-5  text-gray-400" href="./profile.php?user=' . $row["at_user_name"] . '"> @' . $row['at_user_name'] . ' . ' . $this->formatTimeOrDate($row['time']) . '</a>
                </p>';
            echo '</div>';
            echo '<input type="hidden" name="id_post" id="id_post_reply" value="'.$row['id_post'] .'">';

            echo '</div>';
            echo '<div class="pl-8 xl:pl-16 pr-4">';
            echo '<p class="w-auto text-start font-medium text-gray-800 dark:text-white pt-1">' . $this->transformContentHashtag($row["content"]) . '</p>';
            echo '<img src="https://th.bing.com/th/id/R.020f273f0fbf908b24c6b7d1f6ac8b99?rik=LEtmyHQHAt7SxQ&riu=http%3a%2f%2fwww.sl-designs.com%2fimages%2ffree-backgrounds%2fquotes-life15.jpg&ehk=h6WO5U24u7NWLOKUCxdU8PgD%2f3Zf%2bA6v7nA%2bzi%2f34eM%3d&risl=&pid=ImgRaw&r=0" class="rounded-2xl border w-full border-gray-600 my-3 mr-2" alt="img">';
       
            echo '</div>';
            echo '</div>';}else {
                $row = $this->getTweetbyId($row["id_quoted_tweet"]);
                $pathprofile = file_exists('./images/' . $row["profile_picture"]) ? $row["profile_picture"] : "user.png";
                echo './images/' . $row["profile_picture"];
                echo '<div class="border border-gray-200 dark:border-dim-200 cursor-pointer pd-4">';
                echo '<div class="flex flex-row justiy-between w-full">';
                echo '<div class="flex p-4 pb-0">';
                echo  '<div>
                <svg viewBox="0 0 24 24" aria-hidden="true" class="r-4qtqp9 r-yyyyoo r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-14j79pv r-10ptun7 r-1janqcz"><g><path d="M4.75 3.79l4.603 4.3-1.706 1.82L6 8.38v7.37c0 .97.784 1.75 1.75 1.75H13V20H7.75c-2.347 0-4.25-1.9-4.25-4.25V8.38L1.853 9.91.147 8.09l4.603-4.3zm11.5 2.71H11V4h5.25c2.347 0 4.25 1.9 4.25 4.25v7.37l1.647-1.53 1.706 1.82-4.603 4.3-4.603-4.3 1.706-1.82L18 15.62V8.25c0-.97-.784-1.75-1.75-1.75z"></path></g></svg>
                <p>Retweet</p>
                </div>';
                echo '<img src="./images/' . $pathprofile . '" class="h-9 w-9 rounded-full" alt="pic">';
                echo '<p class="ml-2 flex flex-shrink-0 items-center font-medium text-gray-800 dark:text-white">' . $row['username'] . '
                        <a class="ml-1 text-sm leading-5  text-gray-400" href="./profile.php?user=' . $row["at_user_name"] . '"> @' . $row['at_user_name'] . ' ' . $row["time"] . '</a>
                    </p>';
                echo '</div>';
                echo '</div>';
                echo '<div class="pl-8 xl:pl-16 pr-4">';
                echo '<p class="w-auto font-medium text-gray-800 dark:text-white pt-1">' . $this->transformContentHashtag($row["content"]) . '</p>';
                echo '<img src="https://th.bing.com/th/id/R.020f273f0fbf908b24c6b7d1f6ac8b99?rik=LEtmyHQHAt7SxQ&riu=http%3a%2f%2fwww.sl-designs.com%2fimages%2ffree-backgrounds%2fquotes-life15.jpg&ehk=h6WO5U24u7NWLOKUCxdU8PgD%2f3Zf%2bA6v7nA%2bzi%2f34eM%3d&risl=&pid=ImgRaw&r=0" class="rounded-2xl border w-full border-gray-600 my-3 mr-2" alt="img">';
              
                echo '</div>';
                echo '</div>';
            }
        
    } else {
        echo '<div class="flex mt-10 items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">';
        echo '<svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">';
        echo '<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>';
        echo '</svg>';
        echo '<span class="sr-only">Info</span>';
        echo '<div>';
        echo '<span class="font-medium">No tweet found</span>';
        echo '</div>';
        echo '</div>';
    }
}public function showTweetId($id_post)
{
    $row = $this->getTweetbyId($id_post);
    if (!empty($row)) {
         

            $pathprofile = file_exists('../../images/' . $row["profile_picture"]) ? $row["profile_picture"] : "user.png";
            if(empty($row["id_quoted_tweet"])){

            echo '<div class="border border-gray-200 dark:border-dim-200 cursor-pointer pd-4">';
            echo '<div class="flex flex-row justiy-between w-full">';
            echo '<div class="flex p-4 pb-0">';
            echo '<img src="./images/' . $pathprofile . '" class="h-9 w-9 rounded-full" alt="pic">';
            echo '<p class="ml-2 flex flex-shrink-0 items-center font-medium text-gray-800 dark:text-white">' . $row['username'] . '
                    <a class="ml-1 text-sm leading-5  text-gray-400" href="./profile.php?user=' . $row["at_user_name"] . '"> @' . $row['at_user_name'] . ' . ' . $this->formatTimeOrDate($row['time']) . '</a>
                </p>';
            echo '</div>';
            echo '<input type="hidden" name="id_post" id="id_post_reply" value="'.$row['id_post'] .'">';

            echo '</div>';
            echo '<div class="pl-8 xl:pl-16 pr-4">';
            echo '<p class="w-auto font-medium text-gray-800 dark:text-white pt-1">' . $this->transformContentHashtag($row["content"]) . '</p>';
            echo '<img src="https://th.bing.com/th/id/R.020f273f0fbf908b24c6b7d1f6ac8b99?rik=LEtmyHQHAt7SxQ&riu=http%3a%2f%2fwww.sl-designs.com%2fimages%2ffree-backgrounds%2fquotes-life15.jpg&ehk=h6WO5U24u7NWLOKUCxdU8PgD%2f3Zf%2bA6v7nA%2bzi%2f34eM%3d&risl=&pid=ImgRaw&r=0" class="rounded-2xl border w-full border-gray-600 my-3 mr-2" alt="img">';
            echo '<div class="flex items-center w-full justify-between pb-3">';
            echo '<div onclick="replyModal('.$row['id_post'].')"  class="flex items-center dark:text-white text-xs text-gray-400">';
            echo '<span ' . ($this->checkIfReply($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
            echo '<i class="fa-solid fa-comment mr-2 text-lg"></i></span>';
            echo $this->getReply($row["id_post"]);
            echo '</div>';
            echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
            echo '<a  onclick="retweetPost('.$row['id_post'].')"  class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
            echo '<span  ' . ($this->checkIfRetweet($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
            echo '<i class="fa-solid fa-retweet mr-2 text-lg"></i></span>';
            echo $this->getRetweet($row["id_post"]);
            echo '</a>';
            echo '</div>';
            echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
            echo '<a  onclick="likePost('.$row['id_post'].')"  class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
            echo '<span ' . ($this->checkIfLike($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
            echo '<i class="fa-solid fa-heart mr-2 text-lg"></i></span>';
            echo $this->getLikes($row["id_post"]);
            echo '</a>';
            echo '</div>';
      
            echo '</div>';
            echo '</div>';
            echo '</div>';}else {
                $row = $this->getTweetbyId($row["id_quoted_tweet"]);
                $pathprofile = file_exists('./images/' . $row["profile_picture"]) ? $row["profile_picture"] : "user.png";
                echo './images/' . $row["profile_picture"];
                echo '<div class="border border-gray-200 dark:border-dim-200 cursor-pointer pd-4">';
                echo '<div class="flex flex-row justiy-between w-full">';
                echo '<div class="flex p-4 pb-0">';
                echo  '<div>
                <svg viewBox="0 0 24 24" aria-hidden="true" class="r-4qtqp9 r-yyyyoo r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-14j79pv r-10ptun7 r-1janqcz"><g><path d="M4.75 3.79l4.603 4.3-1.706 1.82L6 8.38v7.37c0 .97.784 1.75 1.75 1.75H13V20H7.75c-2.347 0-4.25-1.9-4.25-4.25V8.38L1.853 9.91.147 8.09l4.603-4.3zm11.5 2.71H11V4h5.25c2.347 0 4.25 1.9 4.25 4.25v7.37l1.647-1.53 1.706 1.82-4.603 4.3-4.603-4.3 1.706-1.82L18 15.62V8.25c0-.97-.784-1.75-1.75-1.75z"></path></g></svg>
                <p>Retweet</p>
                </div>';
                echo '<img src="./images/' . $pathprofile . '" class="h-9 w-9 rounded-full" alt="pic">';
                echo '<p class="ml-2 flex flex-shrink-0 items-center font-medium text-gray-800 dark:text-white">' . $row['username'] . '
                        <a class="ml-1 text-sm leading-5  text-gray-400" href="./profile.php?user=' . $row["at_user_name"] . '"> @' . $row['at_user_name'] . ' ' . $row["time"] . '</a>
                    </p>';
                echo '</div>';
                echo '</div>';
                echo '<div class="pl-8 xl:pl-16 pr-4">';
                echo '<p class="w-auto font-medium text-gray-800 dark:text-white pt-1">' . $this->transformContentHashtag($row["content"]) . '</p>';
                echo '<img src="https://th.bing.com/th/id/R.020f273f0fbf908b24c6b7d1f6ac8b99?rik=LEtmyHQHAt7SxQ&riu=http%3a%2f%2fwww.sl-designs.com%2fimages%2ffree-backgrounds%2fquotes-life15.jpg&ehk=h6WO5U24u7NWLOKUCxdU8PgD%2f3Zf%2bA6v7nA%2bzi%2f34eM%3d&risl=&pid=ImgRaw&r=0" class="rounded-2xl border w-full border-gray-600 my-3 mr-2" alt="img">';
                echo '<div class="flex items-center w-full justify-between pb-3">';
                echo '<div onclick="replyModal('.$row['id_post'].')" class="flex items-center dark:text-white text-xs text-gray-400">';
                echo '<span ' . ($this->checkIfReply($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
                echo '<i class="fa-solid fa-comment mr-2 text-lg"></i></span>';
                echo $this->getReply($row["id_post"]);
                echo '</div>';
                echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
                echo '<a  onclick="retweetPost('.$row['id_post'].')"    class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
                echo '<span ' . ($this->checkIfRetweet($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
                echo '<i class="fa-solid fa-retweet mr-2 text-lg"></i></span>';
                echo $this->getRetweet($row["id_post"]);
                echo '</a>';
                echo '</div>';
                echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
                echo '<a  onclick="likePost('.$row['id_post'].')"  class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
                echo '<span ' . ($this->checkIfLike($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
                echo '<i class="fa-solid fa-heart mr-2 text-lg"></i></span>';
                echo $this->getLikes($row["id_post"]);
                echo '</a>';
                echo '</div>';
              
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        
    } else {
        echo '<div class="flex mt-10 items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">';
        echo '<svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">';
        echo '<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>';
        echo '</svg>';
        echo '<span class="sr-only">Info</span>';
        echo '<div>';
        echo '<span class="font-medium">No tweet found</span>';
        echo '</div>';
        echo '</div>';
    }
}


public function showTwitterResult()
{
    $data = array_reverse($this->getTweets());
    if (count($data) > 0) {

        foreach ($data as $row) {
            

            $pathprofile = file_exists('../../images/' . $row["profile_picture"]) ? $row["profile_picture"] : "user.png";
            
             if (!empty($row['id_response'])){
                $resp = $this->getTweetbyId($row["id_response"]);
                $pathprofile_resp = file_exists('../../images/' . $resp["profile_picture"]) ? $resp["profile_picture"] : "user.png";
               
                echo '<div class="border hover:bg-gray-200 border-gray-200 dark:border-dim-200 cursor-pointer pd-4">';
                echo '<div class="flex flex-row justiy-between w-full">';
                echo '<a class="flex p-4 pb-0 cursor-pointer" href="./profile.php?user=' . $row["at_user_name"] . '">';
                
                echo '<img src="./images/' . $pathprofile . '" class="h-9 w-9 rounded-full" alt="pic">';
                echo '<p class="ml-2 flex flex-shrink-0 items-center font-medium text-gray-800 dark:text-white">' . $row['username'] . '
                        <div class="ml-1 text-sm leading-5  text-gray-400" > @' . $row['at_user_name'] . ' . '  . $this->formatTimeOrDate($row['time']) . '</div>
                    </p>';
                echo '</a>';
                echo '</div>';
                echo '<div class="pl-8 xl:pl-16 pr-4">';
                echo '<p class="w-auto font-medium text-gray-800 dark:text-white pt-1">' . $this->transformContentHashtag($row["content"]) . '</p>';
                echo '<img src="https://th.bing.com/th/id/R.020f273f0fbf908b24c6b7d1f6ac8b99?rik=LEtmyHQHAt7SxQ&riu=http%3a%2f%2fwww.sl-designs.com%2fimages%2ffree-backgrounds%2fquotes-life15.jpg&ehk=h6WO5U24u7NWLOKUCxdU8PgD%2f3Zf%2bA6v7nA%2bzi%2f34eM%3d&risl=&pid=ImgRaw&r=0" class="rounded-2xl border w-full border-gray-600 my-3 mr-2" alt="img">';
                echo '<div class="border border-gray-200 dark:border-dim-200 cursor-pointer pd-4">';
                echo '<div class="flex flex-row justiy-between w-full">';
                echo '<a class="flex p-4 pb-0 cursor-pointer" href="./profile.php?user=' . $row["at_user_name"] . '">';
                echo '<img src="./images/' . $pathprofile_resp . '" class="h-9 w-9 rounded-full" alt="pic">';
                echo '<div class="ml-2 flex flex-shrink-0 items-center font-medium text-gray-800 dark:text-white">' . $resp['username'] . '
                        <p class="ml-1 text-sm leading-5  text-gray-400" > @' . $resp['at_user_name'] . ' ' . $this->formatTimeOrDate($resp["time"] ) . '</p>
                    </div>';
                echo '</a>';
                echo '</div>';
                echo '<div class="pl-8 xl:pl-16 pr-4">';
                echo '<p class="w-auto font-medium text-gray-800 dark:text-white pt-1">' . $this->transformContentHashtag($resp["content"]) . '</p>';
                echo '<img src="https://th.bing.com/th/id/R.020f273f0fbf908b24c6b7d1f6ac8b99?rik=LEtmyHQHAt7SxQ&riu=http%3a%2f%2fwww.sl-designs.com%2fimages%2ffree-backgrounds%2fquotes-life15.jpg&ehk=h6WO5U24u7NWLOKUCxdU8PgD%2f3Zf%2bA6v7nA%2bzi%2f34eM%3d&risl=&pid=ImgRaw&r=0" class="rounded-2xl border w-full border-gray-600 my-3 mr-2" alt="img">';
              
                echo '</div>';
                echo '</div>';
                echo '<div class="flex items-center w-full justify-between pb-3">';
                echo '<div onclick="replyModal('.$row['id_post'].')" class="flex items-center dark:text-white text-xs text-gray-400">';
                echo '<span ' . ($this->checkIfReply($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
                echo '<i class="fa-solid fa-comment mr-2 text-lg"></i></span>';
                echo $this->getReply($row["id_post"]);
                echo '</div>';
                echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
                echo '<a  onclick="retweetPost('.$row['id_post'].')"    class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
                echo '<span ' . ($this->checkIfRetweet($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
                echo '<i class="fa-solid fa-retweet mr-2 text-lg"></i></span>';
                echo $this->getRetweet($row["id_post"]);
                echo '</a>';
                echo '</div>';
                echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
                echo '<a  onclick="likePost('.$row['id_post'].')"  class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
                echo '<span ' . ($this->checkIfLike($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
                echo '<i class="fa-solid fa-heart mr-2 text-lg"></i></span>';
                echo $this->getLikes($row["id_post"]);
                echo '</a>';
                echo '</div>';
            
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            else if(!empty($row["id_quoted_tweet"])){
                $row = $this->getTweetbyId($row["id_quoted_tweet"]);
                $pathprofile = file_exists('../../images/' . $row["profile_picture"]) ? $row["profile_picture"] : "user.png";
                echo '<div class="border hover:bg-gray-200 border-gray-200 dark:border-dim-200 cursor-pointer pd-4">';
                echo  '<div class="flex items-center gap-2 ml-3 flex-row ">
                <svg viewBox="0 0 24 24" aria-hidden="true" class="w-2 h-2 r-4qtqp9 r-yyyyoo r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-14j79pv r-10ptun7 r-1janqcz"><g><path d="M4.75 3.79l4.603 4.3-1.706 1.82L6 8.38v7.37c0 .97.784 1.75 1.75 1.75H13V20H7.75c-2.347 0-4.25-1.9-4.25-4.25V8.38L1.853 9.91.147 8.09l4.603-4.3zm11.5 2.71H11V4h5.25c2.347 0 4.25 1.9 4.25 4.25v7.37l1.647-1.53 1.706 1.82-4.603 4.3-4.603-4.3 1.706-1.82L18 15.62V8.25c0-.97-.784-1.75-1.75-1.75z"></path></g></svg>
                <p>Retweet</p>
                </div>';
                echo '<div class="flex flex-row justiy-between w-full">';
                echo '<a class="flex p-4 pb-0 cursor-pointer" href="./profile.php?user=' . $row["at_user_name"] . '">';
                echo '<img src="./images/' . $pathprofile . '" class="h-9 w-9 rounded-full" alt="pic">';
                echo '<div class="ml-2 flex flex-shrink-0 items-center font-medium text-gray-800 dark:text-white">' . $row['username'] . '
                        <p class="ml-1 text-sm leading-5  text-gray-400" > @' . $row['at_user_name'] . ' . ' . $this->formatTimeOrDate($row['time']) . '</p>
                    </div>';
                echo '</a>';
                echo '</div>';
                echo '<div class="pl-8 xl:pl-16 pr-4">';
                echo '<p class="w-auto font-medium text-gray-800 dark:text-white pt-1">' . $this->transformContentHashtag($row["content"]) . '</p>';
                echo '<img src="https://th.bing.com/th/id/R.020f273f0fbf908b24c6b7d1f6ac8b99?rik=LEtmyHQHAt7SxQ&riu=http%3a%2f%2fwww.sl-designs.com%2fimages%2ffree-backgrounds%2fquotes-life15.jpg&ehk=h6WO5U24u7NWLOKUCxdU8PgD%2f3Zf%2bA6v7nA%2bzi%2f34eM%3d&risl=&pid=ImgRaw&r=0" class="rounded-2xl border w-full border-gray-600 my-3 mr-2" alt="img">';
                echo '<div class="flex items-center w-full justify-between pb-3">';
                echo '<div onclick="replyModal('.$row['id_post'].')" class="flex items-center dark:text-white text-xs text-gray-400">';
                echo '<span ' . ($this->checkIfReply($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
                echo '<i class="fa-solid fa-comment mr-2 text-lg"></i></span>';
                echo $this->getReply($row["id_post"]);
                echo '</div>';
                echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
                echo '<a  onclick="retweetPost('.$row['id_post'].')"    class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
                echo '<span ' . ($this->checkIfRetweet($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
                echo '<i class="fa-solid fa-retweet mr-2 text-lg"></i></span>';
                echo $this->getRetweet($row["id_post"]);
                echo '</a>';
                echo '</div>';
                echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
                echo '<a  onclick="likePost('.$row['id_post'].')"  class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
                echo '<span ' . ($this->checkIfLike($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
                echo '<i class="fa-solid fa-heart mr-2 text-lg"></i></span>';
                echo $this->getLikes($row["id_post"]);
                echo '</a>';
                echo '</div>';
          
                echo '</div>';
                echo '</div>';
                echo '</div>';
           } else {
            echo '<div class="border hover:bg-gray-200 border-gray-200 dark:border-dim-200 cursor-pointer pd-4">';
            echo '<div class="flex flex-row justiy-between w-full">';
            echo '<a class="flex p-4 pb-0 cursor-pointer" href="./profile.php?user=' . $row["at_user_name"] . '">';
            echo '<img src="./images/' . $pathprofile . '" class="h-9 w-9 rounded-full" alt="pic">';
            echo '<div class="ml-2 flex flex-shrink-0 items-center font-medium text-gray-800 dark:text-white">' . $row['username'] . '
                    <p class="ml-1 text-sm leading-5  text-gray-400" > @' . $row['at_user_name'] . ' . ' . $this->formatTimeOrDate($row['time']) . '</p>
                </div>';
            echo '</a>';
            echo '</div>';
            echo '<div class="pl-8 xl:pl-16 pr-4">';
            echo '<p class="w-auto font-medium text-gray-800 dark:text-white pt-1">' . $this->transformContentHashtag($row["content"]) . '</p>';
            echo '<img src="https://th.bing.com/th/id/R.020f273f0fbf908b24c6b7d1f6ac8b99?rik=LEtmyHQHAt7SxQ&riu=http%3a%2f%2fwww.sl-designs.com%2fimages%2ffree-backgrounds%2fquotes-life15.jpg&ehk=h6WO5U24u7NWLOKUCxdU8PgD%2f3Zf%2bA6v7nA%2bzi%2f34eM%3d&risl=&pid=ImgRaw&r=0" class="rounded-2xl border w-full border-gray-600 my-3 mr-2" alt="img">';
            echo '<div class="flex items-center w-full justify-between pb-3">';
            echo '<div onclick="replyModal('.$row['id_post'].')" class="flex items-center dark:text-white text-xs text-gray-400">';
            echo '<span ' . ($this->checkIfReply($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
            echo '<i class="fa-solid fa-comment mr-2 text-lg"></i></span>';
            echo $this->getReply($row["id_post"]);
            echo '</div>';
            echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
            echo '<a  onclick="retweetPost('.$row['id_post'].')"  class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
            echo '<span  ' . ($this->checkIfRetweet($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
            echo '<i class="fa-solid fa-retweet mr-2 text-lg"></i></span>';
            echo $this->getRetweet($row["id_post"]);
            echo '</a>';
            echo '</div>';
            echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
            echo '<a  onclick="likePost('.$row['id_post'].')"  class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
            echo '<span ' . ($this->checkIfLike($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
            echo '<i class="fa-solid fa-heart mr-2 text-lg"></i></span>';
            echo $this->getLikes($row["id_post"]);
            echo '</a>';
            echo '</div>';
      
            echo '</div>';
            echo '</div>';
            echo '</div>';
            }
        }
        
    } else {
        echo '<div class="flex mt-10 items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">';
        echo '<svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">';
        echo '<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>';
        echo '</svg>';
        echo '<span class="sr-only">Info</span>';
        echo '<div>';
        echo '<span class="font-medium">No tweet found</span>';
        echo '</div>';
        echo '</div>';
    }
}
    
    public function showTwitterUser($at_user_name)
    {
        $data = array_reverse($this->getTweetsUser($at_user_name));
        if (count($data) > 0) {
        
            foreach ($data as $row) {
                
                $pathprofile = file_exists('./images/' . $row["profile_picture"]) ? $row["profile_picture"] : "user.png";
            
                if (!empty($row['id_response'])){
                   $resp = $this->getTweetbyId($row["id_response"]);
                   $pathprofile_resp = file_exists('./images/' . $resp["profile_picture"]) ? $resp["profile_picture"] : "user.png";
                  
                   echo '<div class="border hover:bg-gray-200 border-gray-200 dark:border-dim-200 cursor-pointer pd-4">';
                   echo '<div class="flex flex-row justiy-between w-full">';
                   echo '<a class="flex p-4 pb-0 cursor-pointer" href="./profile.php?user=' . $row["at_user_name"] . '">';
                   
                   echo '<img src="./images/' . $pathprofile . '" class="h-9 w-9 rounded-full" alt="pic">';
                   echo '<p class="ml-2 flex flex-shrink-0 items-center font-medium text-gray-800 dark:text-white">' . $row['username'] . '
                           <div class="ml-1 text-sm leading-5  text-gray-400" > @' . $row['at_user_name'] . ' . '  . $this->formatTimeOrDate($row['time']) . '</div>
                       </p>';
                   echo '</a>';
                   echo '</div>';
                   echo '<div class="pl-8 xl:pl-16 pr-4">';
                   echo '<p class="w-auto font-medium text-gray-800 dark:text-white pt-1">' . $this->transformContentHashtag($row["content"]) . '</p>';
                   echo '<img src="https://th.bing.com/th/id/R.020f273f0fbf908b24c6b7d1f6ac8b99?rik=LEtmyHQHAt7SxQ&riu=http%3a%2f%2fwww.sl-designs.com%2fimages%2ffree-backgrounds%2fquotes-life15.jpg&ehk=h6WO5U24u7NWLOKUCxdU8PgD%2f3Zf%2bA6v7nA%2bzi%2f34eM%3d&risl=&pid=ImgRaw&r=0" class="rounded-2xl border w-full border-gray-600 my-3 mr-2" alt="img">';
                   echo '<div class="border border-gray-200 dark:border-dim-200 cursor-pointer pd-4">';
                   echo '<div class="flex flex-row justiy-between w-full">';
                   echo '<a class="flex p-4 pb-0 cursor-pointer" href="./profile.php?user=' . $row["at_user_name"] . '">';
                   echo '<img src="./images/' . $pathprofile_resp . '" class="h-9 w-9 rounded-full" alt="pic">';
                   echo '<div class="ml-2 flex flex-shrink-0 items-center font-medium text-gray-800 dark:text-white">' . $resp['username'] . '
                           <p class="ml-1 text-sm leading-5  text-gray-400" > @' . $resp['at_user_name'] . ' ' . $this->formatTimeOrDate($resp["time"] ) . '</p>
                       </div>';
                   echo '</a>';
                   echo '</div>';
                   echo '<div class="pl-8 xl:pl-16 pr-4">';
                   echo '<p class="w-auto font-medium text-gray-800 dark:text-white pt-1">' . $this->transformContentHashtag($resp["content"]) . '</p>';
                   echo '<img src="https://th.bing.com/th/id/R.020f273f0fbf908b24c6b7d1f6ac8b99?rik=LEtmyHQHAt7SxQ&riu=http%3a%2f%2fwww.sl-designs.com%2fimages%2ffree-backgrounds%2fquotes-life15.jpg&ehk=h6WO5U24u7NWLOKUCxdU8PgD%2f3Zf%2bA6v7nA%2bzi%2f34eM%3d&risl=&pid=ImgRaw&r=0" class="rounded-2xl border w-full border-gray-600 my-3 mr-2" alt="img">';
                 
                   echo '</div>';
                   echo '</div>';
                   echo '<div class="flex items-center w-full justify-between pb-3">';
                   echo '<div onclick="replyModal('.$row['id_post'].')" class="flex items-center dark:text-white text-xs text-gray-400">';
                   echo '<span ' . ($this->checkIfReply($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
                   echo '<i class="fa-solid fa-comment mr-2 text-lg"></i></span>';
                   echo $this->getReply($row["id_post"]);
                   echo '</div>';
                   echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
                   echo '<a  onclick="retweetPost('.$row['id_post'].')"    class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
                   echo '<span ' . ($this->checkIfRetweet($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
                   echo '<i class="fa-solid fa-retweet mr-2 text-lg"></i></span>';
                   echo $this->getRetweet($row["id_post"]);
                   echo '</a>';
                   echo '</div>';
                   echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
                   echo '<a  onclick="likePost('.$row['id_post'].')"  class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
                   echo '<span ' . ($this->checkIfLike($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
                   echo '<i class="fa-solid fa-heart mr-2 text-lg"></i></span>';
                   echo $this->getLikes($row["id_post"]);
                   echo '</a>';
                   echo '</div>';
                 
                   echo '</div>';
                   echo '</div>';
                   echo '</div>';
               }
               else if(!empty($row["id_quoted_tweet"])){
                   $row = $this->getTweetbyId($row["id_quoted_tweet"]);
                   $pathprofile = file_exists('./images/' . $row["profile_picture"]) ? $row["profile_picture"] : "user.png";
                   echo '<div class="border hover:bg-gray-200 border-gray-200 dark:border-dim-200 cursor-pointer pd-4">';
                   echo  '<div class="flex items-center gap-2 ml-3 flex-row ">
                   <svg viewBox="0 0 24 24" aria-hidden="true" class="w-2 h-2 r-4qtqp9 r-yyyyoo r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-14j79pv r-10ptun7 r-1janqcz"><g><path d="M4.75 3.79l4.603 4.3-1.706 1.82L6 8.38v7.37c0 .97.784 1.75 1.75 1.75H13V20H7.75c-2.347 0-4.25-1.9-4.25-4.25V8.38L1.853 9.91.147 8.09l4.603-4.3zm11.5 2.71H11V4h5.25c2.347 0 4.25 1.9 4.25 4.25v7.37l1.647-1.53 1.706 1.82-4.603 4.3-4.603-4.3 1.706-1.82L18 15.62V8.25c0-.97-.784-1.75-1.75-1.75z"></path></g></svg>
                   <p>Retweet</p>
                   </div>';
                   echo '<div class="flex flex-row justiy-between w-full">';
                   echo '<a class="flex p-4 pb-0 cursor-pointer" href="./profile.php?user=' . $row["at_user_name"] . '">';
                   echo '<img src="./images/' . $pathprofile . '" class="h-9 w-9 rounded-full" alt="pic">';
                   echo '<div class="ml-2 flex flex-shrink-0 items-center font-medium text-gray-800 dark:text-white">' . $row['username'] . '
                           <p class="ml-1 text-sm leading-5  text-gray-400" > @' . $row['at_user_name'] . ' . ' . $this->formatTimeOrDate($row['time']) . '</p>
                       </div>';
                   echo '</a>';
                   echo '</div>';
                   echo '<div class="pl-8 xl:pl-16 pr-4">';
                   echo '<p class="w-auto font-medium text-gray-800 dark:text-white pt-1">' . $this->transformContentHashtag($row["content"]) . '</p>';
                   echo '<img src="https://th.bing.com/th/id/R.020f273f0fbf908b24c6b7d1f6ac8b99?rik=LEtmyHQHAt7SxQ&riu=http%3a%2f%2fwww.sl-designs.com%2fimages%2ffree-backgrounds%2fquotes-life15.jpg&ehk=h6WO5U24u7NWLOKUCxdU8PgD%2f3Zf%2bA6v7nA%2bzi%2f34eM%3d&risl=&pid=ImgRaw&r=0" class="rounded-2xl border w-full border-gray-600 my-3 mr-2" alt="img">';
                   echo '<div class="flex items-center w-full justify-between pb-3">';
                   echo '<div onclick="replyModal('.$row['id_post'].')" class="flex items-center dark:text-white text-xs text-gray-400">';
                   echo '<span ' . ($this->checkIfReply($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
                   echo '<i class="fa-solid fa-comment mr-2 text-lg"></i></span>';
                   echo $this->getReply($row["id_post"]);
                   echo '</div>';
                   echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
                   echo '<a  onclick="retweetPost('.$row['id_post'].')"    class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
                   echo '<span ' . ($this->checkIfRetweet($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
                   echo '<i class="fa-solid fa-retweet mr-2 text-lg"></i></span>';
                   echo $this->getRetweet($row["id_post"]);
                   echo '</a>';
                   echo '</div>';
                   echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
                   echo '<a  onclick="likePost('.$row['id_post'].')"  class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
                   echo '<span ' . ($this->checkIfLike($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
                   echo '<i class="fa-solid fa-heart mr-2 text-lg"></i></span>';
                   echo $this->getLikes($row["id_post"]);
                   echo '</a>';
                   echo '</div>';
  
                   echo '</div>';
                   echo '</div>';
                   echo '</div>';
              } else {
               echo '<div class="border hover:bg-gray-200 border-gray-200 dark:border-dim-200 cursor-pointer pd-4">';
               echo '<div class="flex flex-row justiy-between w-full">';
               echo '<a class="flex p-4 pb-0 cursor-pointer" href="./profile.php?user=' . $row["at_user_name"] . '">';
               echo '<img src="./images/' . $pathprofile . '" class="h-9 w-9 rounded-full" alt="pic">';
               echo '<div class="ml-2 flex flex-shrink-0 items-center font-medium text-gray-800 dark:text-white">' . $row['username'] . '
                       <p class="ml-1 text-sm leading-5  text-gray-400" > @' . $row['at_user_name'] . ' . ' . $this->formatTimeOrDate($row['time']) . '</p>
                   </div>';
               echo '</a>';
               echo '</div>';
               echo '<div class="pl-8 xl:pl-16 pr-4">';
               echo '<p class="w-auto font-medium text-gray-800 dark:text-white pt-1">' . $this->transformContentHashtag($row["content"]) . '</p>';
               echo '<img src="https://th.bing.com/th/id/R.020f273f0fbf908b24c6b7d1f6ac8b99?rik=LEtmyHQHAt7SxQ&riu=http%3a%2f%2fwww.sl-designs.com%2fimages%2ffree-backgrounds%2fquotes-life15.jpg&ehk=h6WO5U24u7NWLOKUCxdU8PgD%2f3Zf%2bA6v7nA%2bzi%2f34eM%3d&risl=&pid=ImgRaw&r=0" class="rounded-2xl border w-full border-gray-600 my-3 mr-2" alt="img">';
               echo '<div class="flex items-center w-full justify-between pb-3">';
               echo '<div onclick="replyModal('.$row['id_post'].')" class="flex items-center dark:text-white text-xs text-gray-400">';
               echo '<span ' . ($this->checkIfReply($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
               echo '<i class="fa-solid fa-comment mr-2 text-lg"></i></span>';
               echo $this->getReply($row["id_post"]);
               echo '</div>';
               echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
               echo '<a  onclick="retweetPost('.$row['id_post'].')"  class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
               echo '<span  ' . ($this->checkIfRetweet($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
               echo '<i class="fa-solid fa-retweet mr-2 text-lg"></i></span>';
               echo $this->getRetweet($row["id_post"]);
               echo '</a>';
               echo '</div>';
               echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
               echo '<a  onclick="likePost('.$row['id_post'].')"  class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
               echo '<span ' . ($this->checkIfLike($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
               echo '<i class="fa-solid fa-heart mr-2 text-lg"></i></span>';
               echo $this->getLikes($row["id_post"]);
               echo '</a>';
               echo '</div>';
           
               echo '</div>';
               echo '</div>';
               echo '</div>';
               }
            }
        } else {
            echo '<div class="flex mt-10 items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">';
            echo '<svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">';
            echo '<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>';
            echo '</svg>';
            echo '<span class="sr-only">Info</span>';
            echo '<div>';
            echo '<span class="font-medium">No tweet found</span>';
            echo '</div>';
            echo '</div>';
        }
}


public function showHashtagTweet($hashtag)
{
    $data = array_reverse($this->getHashTweet($hashtag));
    if (count($data) > 0) {
        foreach ($data as $row) {
                
            $pathprofile = file_exists('./images/' . $row["profile_picture"]) ? $row["profile_picture"] : "user.png";
        
            if (!empty($row['id_response'])){
               $resp = $this->getTweetbyId($row["id_response"]);
               $pathprofile_resp = file_exists('./images/' . $resp["profile_picture"]) ? $resp["profile_picture"] : "user.png";
              
               echo '<div class="border hover:bg-gray-200 border-gray-200 dark:border-dim-200 cursor-pointer pd-4">';
               echo '<div class="flex flex-row justiy-between w-full">';
               echo '<a class="flex p-4 pb-0 cursor-pointer" href="./profile.php?user=' . $row["at_user_name"] . '">';
               
               echo '<img src="./images/' . $pathprofile . '" class="h-9 w-9 rounded-full" alt="pic">';
               echo '<p class="ml-2 flex flex-shrink-0 items-center font-medium text-gray-800 dark:text-white">' . $row['username'] . '
                       <div class="ml-1 text-sm leading-5  text-gray-400" > @' . $row['at_user_name'] . ' . '  . $this->formatTimeOrDate($row['time']) . '</div>
                   </p>';
               echo '</a>';
               echo '</div>';
               echo '<div class="pl-8 xl:pl-16 pr-4">';
               echo '<p class="w-auto font-medium text-gray-800 dark:text-white pt-1">' . $this->transformContentHashtag($row["content"]) . '</p>';
               echo '<img src="https://th.bing.com/th/id/R.020f273f0fbf908b24c6b7d1f6ac8b99?rik=LEtmyHQHAt7SxQ&riu=http%3a%2f%2fwww.sl-designs.com%2fimages%2ffree-backgrounds%2fquotes-life15.jpg&ehk=h6WO5U24u7NWLOKUCxdU8PgD%2f3Zf%2bA6v7nA%2bzi%2f34eM%3d&risl=&pid=ImgRaw&r=0" class="rounded-2xl border w-full border-gray-600 my-3 mr-2" alt="img">';
               echo '<div class="border border-gray-200 dark:border-dim-200 cursor-pointer pd-4">';
               echo '<div class="flex flex-row justiy-between w-full">';
               echo '<a class="flex p-4 pb-0 cursor-pointer" href="./profile.php?user=' . $row["at_user_name"] . '">';
               echo '<img src="./images/' . $pathprofile_resp . '" class="h-9 w-9 rounded-full" alt="pic">';
               echo '<div class="ml-2 flex flex-shrink-0 items-center font-medium text-gray-800 dark:text-white">' . $resp['username'] . '
                       <p class="ml-1 text-sm leading-5  text-gray-400" > @' . $resp['at_user_name'] . ' ' . $this->formatTimeOrDate($resp["time"] ) . '</p>
                   </div>';
               echo '</a>';
               echo '</div>';
               echo '<div class="pl-8 xl:pl-16 pr-4">';
               echo '<p class="w-auto font-medium text-gray-800 dark:text-white pt-1">' . $this->transformContentHashtag($resp["content"]) . '</p>';
               echo '<img src="https://th.bing.com/th/id/R.020f273f0fbf908b24c6b7d1f6ac8b99?rik=LEtmyHQHAt7SxQ&riu=http%3a%2f%2fwww.sl-designs.com%2fimages%2ffree-backgrounds%2fquotes-life15.jpg&ehk=h6WO5U24u7NWLOKUCxdU8PgD%2f3Zf%2bA6v7nA%2bzi%2f34eM%3d&risl=&pid=ImgRaw&r=0" class="rounded-2xl border w-full border-gray-600 my-3 mr-2" alt="img">';
             
               echo '</div>';
               echo '</div>';
               echo '<div class="flex items-center w-full justify-between pb-3">';
               echo '<div onclick="replyModal('.$row['id_post'].')" class="flex items-center dark:text-white text-xs text-gray-400">';
               echo '<span ' . ($this->checkIfReply($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
               echo '<i class="fa-solid fa-comment mr-2 text-lg"></i></span>';
               echo $this->getReply($row["id_post"]);
               echo '</div>';
               echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
               echo '<a  onclick="retweetPost('.$row['id_post'].')"    class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
               echo '<span ' . ($this->checkIfRetweet($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
               echo '<i class="fa-solid fa-retweet mr-2 text-lg"></i></span>';
               echo $this->getRetweet($row["id_post"]);
               echo '</a>';
               echo '</div>';
               echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
               echo '<a  onclick="likePost('.$row['id_post'].')"  class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
               echo '<span ' . ($this->checkIfLike($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
               echo '<i class="fa-solid fa-heart mr-2 text-lg"></i></span>';
               echo $this->getLikes($row["id_post"]);
               echo '</a>';
               echo '</div>';
     
               echo '</div>';
               echo '</div>';
               echo '</div>';
           }
           else if(!empty($row["id_quoted_tweet"])){
               $row = $this->getTweetbyId($row["id_quoted_tweet"]);
               $pathprofile = file_exists('./images/' . $row["profile_picture"]) ? $row["profile_picture"] : "user.png";
               echo '<div class="border hover:bg-gray-200 border-gray-200 dark:border-dim-200 cursor-pointer pd-4">';
               echo  '<div class="flex items-center gap-2 ml-3 flex-row ">
               <svg viewBox="0 0 24 24" aria-hidden="true" class="w-2 h-2 r-4qtqp9 r-yyyyoo r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-14j79pv r-10ptun7 r-1janqcz"><g><path d="M4.75 3.79l4.603 4.3-1.706 1.82L6 8.38v7.37c0 .97.784 1.75 1.75 1.75H13V20H7.75c-2.347 0-4.25-1.9-4.25-4.25V8.38L1.853 9.91.147 8.09l4.603-4.3zm11.5 2.71H11V4h5.25c2.347 0 4.25 1.9 4.25 4.25v7.37l1.647-1.53 1.706 1.82-4.603 4.3-4.603-4.3 1.706-1.82L18 15.62V8.25c0-.97-.784-1.75-1.75-1.75z"></path></g></svg>
               <p>Retweet</p>
               </div>';
               echo '<div class="flex flex-row justiy-between w-full">';
               echo '<a class="flex p-4 pb-0 cursor-pointer" href="./profile.php?user=' . $row["at_user_name"] . '">';
               echo '<img src="./images/' . $pathprofile . '" class="h-9 w-9 rounded-full" alt="pic">';
               echo '<div class="ml-2 flex flex-shrink-0 items-center font-medium text-gray-800 dark:text-white">' . $row['username'] . '
                       <p class="ml-1 text-sm leading-5  text-gray-400" > @' . $row['at_user_name'] . ' . ' . $this->formatTimeOrDate($row['time']) . '</p>
                   </div>';
               echo '</a>';
               echo '</div>';
               echo '<div class="pl-8 xl:pl-16 pr-4">';
               echo '<p class="w-auto font-medium text-gray-800 dark:text-white pt-1">' . $this->transformContentHashtag($row["content"]) . '</p>';
               echo '<img src="https://th.bing.com/th/id/R.020f273f0fbf908b24c6b7d1f6ac8b99?rik=LEtmyHQHAt7SxQ&riu=http%3a%2f%2fwww.sl-designs.com%2fimages%2ffree-backgrounds%2fquotes-life15.jpg&ehk=h6WO5U24u7NWLOKUCxdU8PgD%2f3Zf%2bA6v7nA%2bzi%2f34eM%3d&risl=&pid=ImgRaw&r=0" class="rounded-2xl border w-full border-gray-600 my-3 mr-2" alt="img">';
               echo '<div class="flex items-center w-full justify-between pb-3">';
               echo '<div onclick="replyModal('.$row['id_post'].')" class="flex items-center dark:text-white text-xs text-gray-400">';
               echo '<span ' . ($this->checkIfReply($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
               echo '<i class="fa-solid fa-comment mr-2 text-lg"></i></span>';
               echo $this->getReply($row["id_post"]);
               echo '</div>';
               echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
               echo '<a  onclick="retweetPost('.$row['id_post'].')"    class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
               echo '<span ' . ($this->checkIfRetweet($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
               echo '<i class="fa-solid fa-retweet mr-2 text-lg"></i></span>';
               echo $this->getRetweet($row["id_post"]);
               echo '</a>';
               echo '</div>';
               echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
               echo '<a  onclick="likePost('.$row['id_post'].')"  class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
               echo '<span ' . ($this->checkIfLike($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
               echo '<i class="fa-solid fa-heart mr-2 text-lg"></i></span>';
               echo $this->getLikes($row["id_post"]);
               echo '</a>';
               echo '</div>';
          
               echo '</div>';
               echo '</div>';
               echo '</div>';
          } else {
           echo '<div class="border hover:bg-gray-200 border-gray-200 dark:border-dim-200 cursor-pointer pd-4">';
           echo '<div class="flex flex-row justiy-between w-full">';
           echo '<a class="flex p-4 pb-0 cursor-pointer" href="./profile.php?user=' . $row["at_user_name"] . '">';
           echo '<img src="./images/' . $pathprofile . '" class="h-9 w-9 rounded-full" alt="pic">';
           echo '<div class="ml-2 flex flex-shrink-0 items-center font-medium text-gray-800 dark:text-white">' . $row['username'] . '
                   <p class="ml-1 text-sm leading-5  text-gray-400" > @' . $row['at_user_name'] . ' . ' . $this->formatTimeOrDate($row['time']) . '</p>
               </div>';
           echo '</a>';
           echo '</div>';
           echo '<div class="pl-8 xl:pl-16 pr-4">';
           echo '<p class="w-auto font-medium text-gray-800 dark:text-white pt-1">' . $this->transformContentHashtag($row["content"]) . '</p>';
           echo '<img src="https://th.bing.com/th/id/R.020f273f0fbf908b24c6b7d1f6ac8b99?rik=LEtmyHQHAt7SxQ&riu=http%3a%2f%2fwww.sl-designs.com%2fimages%2ffree-backgrounds%2fquotes-life15.jpg&ehk=h6WO5U24u7NWLOKUCxdU8PgD%2f3Zf%2bA6v7nA%2bzi%2f34eM%3d&risl=&pid=ImgRaw&r=0" class="rounded-2xl border w-full border-gray-600 my-3 mr-2" alt="img">';
           echo '<div class="flex items-center w-full justify-between pb-3">';
           echo '<div onclick="replyModal('.$row['id_post'].')" class="flex items-center dark:text-white text-xs text-gray-400">';
           echo '<span ' . ($this->checkIfReply($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
           echo '<i class="fa-solid fa-comment mr-2 text-lg"></i></span>';
           echo $this->getReply($row["id_post"]);
           echo '</div>';
           echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
           echo '<a  onclick="retweetPost('.$row['id_post'].')"  class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
           echo '<span  ' . ($this->checkIfRetweet($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
           echo '<i class="fa-solid fa-retweet mr-2 text-lg"></i></span>';
           echo $this->getRetweet($row["id_post"]);
           echo '</a>';
           echo '</div>';
           echo '<div class="flex items-center dark:text-white text-xs text-gray-400">';
           echo '<a  onclick="likePost('.$row['id_post'].')"  class="flex items-center dark:text-white text-xs text-gray-400 hover:text-blue-400 dark:hover:text-blue-400">';
           echo '<span ' . ($this->checkIfLike($_SESSION["id"], $row["id_post"]) ? 'style="color: Tomato;"' : '') . '>';
           echo '<i class="fa-solid fa-heart mr-2 text-lg"></i></span>';
           echo $this->getLikes($row["id_post"]);
           echo '</a>';
           echo '</div>';
    
           echo '</div>';
           echo '</div>';
           echo '</div>';
           }
        }
    } else {
        echo '<div class="flex mt-10 items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">';
        echo '<svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">';
        echo '<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>';
        echo '</svg>';
        echo '<span class="sr-only">Info</span>';
        echo '<div>';
        echo '<span class="font-medium">No tweet found</span>';
        echo '</div>';
        echo '</div>';
    }
}

private function checkUser($username){
    $stmt=$this->connect()->prepare("SELECT * FROM user WHERE at_user_name = ? ");

    if(!$stmt->execute(array($username))){
       return 0;
    };

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    


    return count($data) > 0 ;
}

private function transformContentHashtag($content){
    $content = preg_replace_callback('/\/images\/(\w+\.(?:jpg|jpeg|png|gif))/', function($matches) {
        return "<img class='rounded' src='/images/" . $matches[1] . "' alt='Image'>";
    }, $content);
    // function to find the hashtag in content and transform then into hyperlink 
    $content = preg_replace('/#(\w+)/', ' <a class="text-blue-600" href="search.php?hashtag=$1">#$1</a>', $content);
  // replace the user who match in the db with hyperlink and not the one not present in the db
    $content = preg_replace_callback('/@(\w+)/', function($matches){
        if($this->checkUser(str_replace("@","",$matches[0]))){
            return "<a class='text-green-600' href='profile.php?user=".str_replace("@","",$matches[0])."'>".$matches[0]."</a>";
        }else{
            return $matches[0];
        
    }} , $content);
    return $content;
}



}



                   
       

                       
               