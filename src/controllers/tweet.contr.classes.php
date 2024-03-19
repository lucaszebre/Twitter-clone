<?php 


class tweetController extends Tweet{

    

    public function getTweets(){
        
        $stmt = $this->connect()->prepare("SELECT * , tweet.id id_post FROM  tweet JOIN user ON tweet.id_user=user.id;");
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // echo "here";
            return $data;
            // $stmt=null;
            
    
        // echo "check not done";

    }
    public function getTweetbyId($id){
        $stmt = $this->connect()->prepare("SELECT * , tweet.id id_post  FROM  tweet JOIN user ON tweet.id_user=user.id WHERE tweet.id = ? ;");
        $stmt->execute(array($id));

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($data ) > 0) {
            // echo "here";
            return $data[0];
            // $stmt=null;
            
        }

        header('location:../../profile.php?error=notweetyet');
        exit();

    }
    public function getTweetsUser($at_user_name){
        
        $stmt = $this->connect()->prepare("SELECT * , tweet.id id_post FROM  tweet JOIN user ON tweet.id_user=user.id WHERE at_user_name = ? ;");
        $stmt->execute(array($at_user_name));

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($data ) > 0) {
            // echo "here";
            return $data;
            // $stmt=null;
            
        }

        header('location:../../profile.php?error=notweetyet');
        exit();
        // echo "check not done";

    }

    public function getLikes($id_post){
        $stmt = $this->connect()->prepare("SELECT * FROM likes WHERE id_tweet=? ;");
        $stmt->execute(array($id_post));

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return count($data ) ;
            

        // echo "check not done";
    }
     public function getRetweet($id_post){
        $stmt = $this->connect()->prepare("SELECT * FROM  retweet WHERE id_tweet=? ;");
        $stmt->execute(array($id_post));

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return count($data ) ;
            

        // echo "check not done";
    }

    public function getReply($id_post){
        $stmt = $this->connect()->prepare("SELECT * FROM  tweet WHERE id_response=? ;");
        $stmt->execute(array($id_post));

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return count($data ) ;
    }

    public function checkIfLike($id_user,$id_post){
        $stmt = $this->connect()->prepare("SELECT * FROM likes WHERE (id_tweet=? AND id_user = ?);");
        $stmt->execute(array($id_post,$id_user));

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return (count($data ) > 0 );
    }
    public function checkIfReply($id_user,$id_post){
        $stmt = $this->connect()->prepare("SELECT * FROM  tweet WHERE id_response=? AND id_user= ? ;");
        $stmt->execute(array($id_post,$id_user));

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // if(count($data ) > 0 ){
        //     echo 'style="color: Tomato;';
        // };
        
    }

    public function getHashTweet($hashtag){
        $stmt = $this->connect()->prepare("SELECT * , tweet.id id_post FROM  tweet JOIN user ON tweet.id_user=user.id WHERE content LIKE ?  ;");
        $hashPattern = "%#$hashtag%";

        $stmt->execute(array($hashPattern));

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data  ;
    }
    
    public function checkIfRetweet($id_user,$id_post){
        $stmt = $this->connect()->prepare("SELECT * FROM  retweet WHERE id_tweet=? AND id_user= ? ;");
        $stmt->execute(array($id_post,$id_user));

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return (count($data ) > 0 );
    }

    public function getPathLike($id_post){
        echo 'href="./src/includes/like.inc.php?id_post=$id_post"';
        
    }
}