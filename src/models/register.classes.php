<?php

class Register extends Dbh{
    protected function setUser($mail,$password,$username,$passwordRepeat,$at_user_name,$city,$birthdate){
    

       
        $hashedpassword =  hash('ripemd160',$password);  // need insert the ripme hashage there 
       
       
        $stmt=$this->connect()->prepare('INSERT INTO user (username,at_user_name,birthdate, city , mail , password,profile_picture,banner) VALUES (?,?,?, ?, ?, ?, ?, ?);');
        if(!$stmt->execute(array($username,$at_user_name,$birthdate,$city,$mail,$hashedpassword,"",""))){
            $stmt=null;
            header('location:../../register.php?error=stmtfailed');
            exit();
        }
    }


        protected function CheckUser($email){
            $stmt = $this->connect()->prepare("SELECT * FROM  user WHERE mail = ?;");
            $stmt->execute(array($email));

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(count($data ) > 0) {
                return true;
               
            }

            return false;

        } 
        
        protected function CheckUserName($username){
            $stmt = $this->connect()->prepare("SELECT * FROM  user WHERE username = ?;");
            $stmt->execute(array($username));

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(count($data ) > 0) {
                return true;
              
            }

            return false;

        } 
        
        protected function CheckAtUserName($at_user_name){
            $stmt = $this->connect()->prepare("SELECT * FROM  user WHERE at_user_name = ?;");
            $stmt->execute(array($at_user_name));

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(count($data ) > 0) {
                return true;
               
            }

            return false;

        }
}