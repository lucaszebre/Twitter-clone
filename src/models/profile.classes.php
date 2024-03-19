<?php

class Profile extends Dbh{

    protected function getProfile($at_user_name){
       $stmt=$this->connect()->prepare(" SELECT * FROM user  WHERE at_user_name = ?;");
        if(!$stmt->execute(array($at_user_name))){
            $stmt=null;
            header("../../profile.php?user=$att_user_name&error=stmtfailed");
            exit();
        };

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!count($result)){
            header("../../profile.php?user=$at_user_name&error=accountnotfound");
            exit();
        }
        return $result[0];
    }  
    
    public function getProfilePicture($at_user_name){
       $stmt=$this->connect()->prepare(" SELECT profile_picture , banner , bio , username,city , campus FROM user  WHERE at_user_name = ?;");
        if(!$stmt->execute(array($at_user_name))){
            $stmt=null;
            header("../../profile.php?user=$att_user_name&error=stmtfailed");
            exit();
        };

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!count($result)){
            header("../../profile.php?user=$at_user_name&error=accountnotfound");
            exit();
        }
        return $result[0];
    }

    public function getIdUser($at_user_name){
        $stmt=$this->connect()->prepare(" SELECT id FROM user  WHERE at_user_name = ?;");
        if(!$stmt->execute(array($at_user_name))){
            $stmt=null;
            header("../../profile.php?user=$att_user_name&error=stmtfailed");
            exit();
        };

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!count($result)){
            header("../../profile.php?user=$at_user_name&error=accountnotfound");
            exit();
        }
        return $result[0]["id"];
    }

    protected function getListFollowers($at_user_name){
        $stmt=$this->connect()->prepare(" SELECT id FROM user  WHERE at_user_name = ? ;");
        if(!$stmt->execute(array($at_user_name))){
            $stmt=null;
            
        };

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!count($result)){
            
        }


        $stmt2=$this->connect()->prepare("SELECT * FROM follow WHERE id_user = ?;");

        if(!$stmt2->execute(array($result[0]["id"]))){
            $stmt2=null;
            // header('../../profile.php?error=stmtfailed');
            // exit();
        };

        $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        if(!count($result2)){
            // header('../../profile.php?error=accountnotfound');
            // exit();
        }

        return $result2;

    } 
    
    protected function getListFollowing($at_user_name){
        $stmt=$this->connect()->prepare(" SELECT id FROM user  WHERE at_user_name = ?;");
        if(!$stmt->execute(array($at_user_name))){
            $stmt=null;
            // header('../../account.php?error=stmtfailed');
            // exit();
        };

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!count($result)){
            // header('../../account.php?error=accountnotfound');
            // exit();
        }

        $id = $result[0]["id"];


        $stmt2=$this->connect()->prepare("SELECT * FROM follow WHERE id_follow = ?;");

        if(!$stmt2->execute(array($id))){
            $stmt2=null;
            // header('../../account.php?error=stmtfailed');
            // exit();
        };

        $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        if(!count($result2)){
            // header('../../account.php?error=accountnotfound');
            // exit();
        }

        return $result2;
    }


  

   
}