<?php

class AccountController extends Account{

    private $id;
    private $email;

    public function __construct($id,$email){
        $this->email=$email;
        $this->id=$id;
    }

    public function sendMessages($id_convo, $id_user, $content, $id_response = null){
        $stmt = $this->connect()->prepare("INSERT INTO messages (id_convo, id_user, content, id_response) VALUES (?, ?, ?, ?)");
        $stmt->execute([$id_convo, $id_user, $content, $id_response]);
    }
    
    public function replyTweet($id_reply,$content){
        $stmt=$this->connect()->prepare("INSERT INTO tweet ( id_user,id_response,content) VALUES (?, ?, ?)");

        if(!$stmt->execute(array($this->id,$id_reply,$content))){
            $stmt=null;
            header('location:../../index.php?error=errortoaddtweet');
            exit();
        };
    }
    public function getProfilePicture(){
        $stmt = $this->connect()->prepare("SELECT profile_picture FROM  user WHERE id = ? AND mail = ?;");
        $stmt->execute(array($this->id,$this->email));
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data[0]["profile_picture"];

    }
    
    public function checkUserId(){
        $stmt = $this->connect()->prepare("SELECT * FROM  user WHERE id = ? AND mail = ?;");
        $stmt->execute(array($this->id,$this->email));

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($data ) > 0) {
            // echo "here";
            return true;
            // $stmt=null;
            
        }

        header('location:../../account.php?error=alreadyregister');
        exit();
        // echo "check not done";

    }  

    public function retweetPost($id_tweet){
        $stmt=$this->connect()->prepare("INSERT INTO retweet (id_user, id_tweet) VALUES (?, ?)");

        if(!$stmt->execute(array($this->id,$id_tweet))){
            $stmt=null;
            header('location:../../index.php?error=errortoaddtweet');
            exit();
        };
         $stmt=$this->connect()->prepare("INSERT INTO tweet ( id_user,id_quoted_tweet,content) VALUES (?, ?, ?)");

        if(!$stmt->execute(array($this->id,$id_tweet,"retweet"))){
            $stmt=null;
            header('location:../../index.php?error=errortoaddtweet');
            exit();
        };

    
    }  


     public function checkIfRetweet($id_tweet,$at_user_name){
        $stmt=$this->connect()->prepare("SELECT * FROM retweet WHERE id_tweet=? AND id_user = ? ");

        if(!$stmt->execute(array($id_tweet,$this->id))){
            $stmt=null;
            header("location:../../profile.php?user=$at_user_name&error=errortoaddtweet");
            exit();
        };

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);


        return count($data) > 0 ;
    }

    public function DelRetweetPost($id_tweet){
        $stmt=$this->connect()->prepare("DELETE FROM retweet WHERE id_user = ? AND id_tweet = ?");

        if(!$stmt->execute(array($this->id,$id_tweet))){
            $stmt=null;
            header('location:../../index.php?error=errortoaddtweet');
            exit();
        };  
        $stmt=$this->connect()->prepare("DELETE FROM tweet WHERE id_user = ? AND id_quoted_tweet = ?");

        if(!$stmt->execute(array($this->id,$id_tweet))){
            $stmt=null;
            header('location:../../index.php?error=errortoaddtweet');
            exit();
        };
    }
    
    public function deleteAccount() {

        $queryDelete = "DELETE FROM user WHERE id=? AND email= ?";
        $stmtDelete = $this->connect()->prepare($queryDelete);
        $stmtDelete->execute([$this->id,$this->email]);
    }

    private function parseHastag($content){
        preg_match_all('/#(\w+)/', $content, $matches);
        $hashtags = $matches[1];
        foreach ($hashtags as $hashtag) {
            if($this->checkHashtag($hashtag)){
                $stmt=$this->connect()->prepare("INSERT INTO hashtag_list (hashtag) VALUES (?)");
                    if(!$stmt->execute(array($hashtag))){
                        $stmt=null;
                        header('location:../../index.php?error=errortoaddtweet');
                        exit();
                    };
            }
            
        }
    }
    

    private function checkHashtag($hash){
        $stmt=$this->connect()->prepare("SELECT * FROM hashtag_list WHERE hashtag = ?");
            if(!$stmt->execute(array($hashtag))){
                $stmt=null;
                header('location:../../index.php?error=errortoaddtweet');
                exit();
            };
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return count($result) > 0;
    }
    
    public function addTweet($content){
        $stmt=$this->connect()->prepare("INSERT INTO tweet (content,id_user) VALUES (?, ?)");

        if(!$stmt->execute(array($content,$this->id))){
            $stmt=null;
            header('location:../../index.php?error=errortoaddtweet');
            exit();
        };

        $this->parseHastag($content);


    }  
     public function addTweetWithImage($content,$pathImg){
        $stmt=$this->connect()->prepare("INSERT INTO tweet (content,id_user) VALUES (?, ?)");

        if(!$stmt->execute(array($content,$this->id))){
            $stmt=null;
            header('location:../../index.php?error=errortoaddtweet');
            exit();
        };

        $this->parseHastag($content);


    } 
     private function removeTweet($id_tweet){
        $stmt=$this->connect()->prepare("DELETE tweet WHERE id=? AND id_user = ? ");

        if(!$stmt->execute(array($id_tweet,$this->id))){
            $stmt=null;
            header('location:../../index.php?error=errortoaddtweet');
            exit();
        };


    } 
    
    public function addLike($id_post){
        $stmt=$this->connect()->prepare("INSERT INTO likes (id_user,id_tweet) VALUES (?, ?)");

        if(!$stmt->execute(array($this->id,$id_post))){
            $stmt=null;
            header('location:../../index.php?error=errortoaddlike');
            exit();
        };


    } 
    
    public function removeLike($id_post){
        $stmt=$this->connect()->prepare("DELETE FROM `likes` WHERE `id_tweet` = ? AND `id_user` = ? ;");

        if(!$stmt->execute(array($id_post,$this->id))){
            $stmt=null;
            header('location:../../index.php?error=errortoaddlike');
            exit();
        };


    } 
    
    public function addFollow($id_follow,$at_user_name){
        $stmt=$this->connect()->prepare("INSERT INTO follow (id_follow,id_user) VALUES (?, ?)");

        if(!$stmt->execute(array($id_follow,$this->id))){
            $stmt=null;
            header("location:../../profile.php?user=$at_user_name&error=errortoaddtweet");
            exit();
        };


    }

    public function getListFollowers($at_user_name){
        $stmt=$this->connect()->prepare("SELECT user.* FROM follow JOIN user ON follow.id_user = user.id WHERE follow.id_follow = (SELECT id FROM user WHERE at_user_name = ?);");
        if(!$stmt->execute(array($at_user_name))){
            $stmt=null;
           
        };
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        if(!count($result)){
            
        }
    
        return $result;
    } 
    
    public function getListFollowing($at_user_name){
        $stmt=$this->connect()->prepare("SELECT user.* FROM follow JOIN user ON follow.id_follow = user.id WHERE follow.id_user = (SELECT id FROM user WHERE at_user_name = ?);");
        if(!$stmt->execute(array($at_user_name))){
            $stmt=null;
          
        };
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        if(!count($result)){
            
        }
    
        return $result;


    }
    
    public function  removeFollow($id_follow,$at_user_name){
 
        $stmt=$this->connect()->prepare("DELETE FROM `follow` WHERE id_user= ? AND id_follow= ?");

        if(!$stmt->execute(array($this->id,$id_follow))){
            $stmt=null;
            header("location:../../profile.php?user=$at_user_name&error=errortoaddtweet");
            exit();
        };


    }


    public function checkFollow($id_follow,$at_user_name){
        $stmt=$this->connect()->prepare("SELECT * FROM follow WHERE id_follow=? AND id_user = ? ");

        if(!$stmt->execute(array($id_follow,$this->id))){
            $stmt=null;
            header("location:../../profile.php?user=$at_user_name&error=errortoaddtweet");
            exit();
        };

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);


        return count($data) > 0 ;

    }


    public function updateUserName($username){
        $queryDelete = "UPDATE user SET username = ? WHERE  id = ? AND mail = ? ";
        $stmtDelete = $this->connect()->prepare($queryDelete);
        $stmtDelete->execute([$username,$this->id,$this->email]);

    }
     public function updateBio($bio){
        $queryDelete = "UPDATE user SET bio = ? WHERE  id = ? AND mail = ? ";
        $stmtDelete = $this->connect()->prepare($queryDelete);
        $stmtDelete->execute([$bio,$this->id,$this->email]);

    }
    
    public function UpdatePhotoProfile($path){
        $queryDelete = "UPDATE user SET profile_picture = ? WHERE  id = ? AND mail = ? ";
        $stmtDelete = $this->connect()->prepare($queryDelete);
        $stmtDelete->execute([$path,$this->id,$this->email]);

    } 
    
    public function updateBanner($path){
        $queryDelete = "UPDATE user SET banner= ? WHERE  id = ? AND mail = ? ";
        $stmtDelete = $this->connect()->prepare($queryDelete);
        $stmtDelete->execute([$path,$this->id,$this->email]);

    } 
      public function updateCity($city){
        $queryDelete = "UPDATE user SET city= ? WHERE  id = ? AND mail = ? ";
        $stmtDelete = $this->connect()->prepare($queryDelete);
        $stmtDelete->execute([$city,$this->id,$this->email]);

    }  
     public function updateCampus($campus){
        $queryDelete = "UPDATE user SET campus= ? WHERE  id = ? AND mail = ? ";
        $stmtDelete = $this->connect()->prepare($queryDelete);
        $stmtDelete->execute([$campus,$this->id,$this->email]);

    }
    
    private function retweet($id_tweet){

        $queryRetweet = "INSERT INTO retweet (id_user,id_tweet VALUES (?, ?) ";
        $stmtRetweet = $this->connect()->prepare($queryDelete);
        $stmtRetweet->execute([$this->id,$id_tweet]);

    } 
    private function UnRetweet($id_tweet){

        $queryRetweet = "DELETE retweet WHERE id_user= ? AND id_tweet =  ? ";
        $stmtRetweet = $this->connect()->prepare($queryDelete);
        $stmtRetweet->execute([$this->id,$id_tweet]);

    }

    private function emptyInput(){
        
        return (empty($this->email)||empty($this->id));

    } 


    

    
    
    
   

    private function getPassword(){
        $stmt=$this->connect()->prepare("SELECT * FROM user WHERE email = ? ");
        if(!$stmt->execute(array($this->email))){
            $stmt=null;
            header('location:../../modifyPassword.php?error=stmtfailed');
            exit();
        };

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data[0]["password"];
    }

    private function setEmail($email){

        $_SESSION["email"]=$email;
        $this->email=$email;
        echo "set made";
    }




    public function getMessage($otherUserID){
        
        $conn = $this->connect();
    
        $stmt = $conn->prepare("SELECT * FROM messages WHERE  (sender_id = ? AND receiver_id = ? ) OR (receiver_id = ? AND sender_id = ?)");
    
        if (!$stmt->execute([$this->id, $otherUserID,$otherUserID,$this->id])) {
            $stmt = null;
            header('location:../../messages.php?error=stmtfailed');
            exit();
        }
    
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function getConvList(){
        $conn = $this->connect();
    
        $stmt = $conn->prepare("SELECT receiver_id, sender_id FROM messages WHERE sender_id = ? OR receiver_id = ?");
    
        if (!$stmt->execute([$this->id, $this->id])) {
            $stmt = null;
            header('location:../../messages.php?error=stmtfailed');
            exit();
        }
    
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $convList = [];
    
        foreach ($data as $row) {
            $smt = $conn->prepare("SELECT id, firstname, lastname FROM user WHERE id = ?");
    
            if (!$smt->execute([$row['receiver_id']])) {
                header('location:../../messages.php?error=stmtfailed');
                exit();
            }
    
            $userData = $smt->fetch(PDO::FETCH_ASSOC);
    
            $convList[] = $userData;
        }
    
        return $convList;
    }
    
    
    
    
}