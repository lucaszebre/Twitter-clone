<?php

class Login extends Dbh{

    protected function getUser($email,$password){

        $stmt = $this->connect()->prepare("SELECT * FROM  user WHERE mail = ?;");
        
        if(!$stmt->execute(array($email))){
            $stmt=null;
            header('location:../../index.php?error=smtfailed');
            exit();
        }



        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // check if there is a least user
            if(count($result) == 0) {
                $stmt=null;
                header("location:../../index.php?error=usernotfound");
                exit();
            }
        
        
            $hashedpassword =  hash('ripemd160',$password);  // need insert the ripme hashage there 

      
      
        
            // check if password correspond
        if($result[0]['password']=== $hashedpassword){

            session_start();
            $_SESSION['login'] = true;
            $_SESSION['id'] = $result[0]["id"];
            $_SESSION['mail'] = $result[0]["mail"];
            $_SESSION['at_user_name'] = $result[0]["at_user_name"];
            $stmt=null;

            var_dump($_SESSION);

           
            
        }else{
            header('location:../../index.php?error=wrongpassword');
            exit();
           
  
    
        }
    }


  
}