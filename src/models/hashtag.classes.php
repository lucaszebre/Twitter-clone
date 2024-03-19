<?php

class Hashtag extends Dbh{

    
    protected function getListHastags(){
       $stmt=$this->connect()->prepare(" SELECT * FROM  hashtag_list ;");
        if(!$stmt->execute()){
            $stmt=null;
            header('../../account.php?error=stmtfailed');
            exit();
        };

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!count($result)){
            header('../../account.php?error=accountnotfound');
            exit();
        }

        return $result;
    }


    protected function createHashtag($hashtag){
        $stmt=$this->connect()->prepare(" INSERT INTO hashtag_list (hashtag) VALUES (?)");
        if(!$stmt->execute(array($hashtag))){
            $stmt=null;
            header('../../account.php?error=stmtfailed');
            exit();
        };
    } 
    
    protected function getPostWithHashtag($hashtag){
        $stmt=$this->connect()->prepare(" SELECT * FROM tweet   WHERE content LIKE  '%$$hashtag%';");
        if(!$stmt->execute(array($at_user_name))){
            $stmt=null;
            header('../../account.php?error=stmtfailed');
            exit();
        };

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!count($result)){
            header('../../account.php?error=accountnotfound');
            exit();
        }

        return $result;
    }


  

   
}