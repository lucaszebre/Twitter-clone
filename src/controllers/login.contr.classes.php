<?php 

Class LoginController extends Login{
    private $email;
    private $password;

    public function __construct($email,$password){
        $this->email=$email;
        $this->password=$password;
    
    }

   public function LoginUser(){
         // check for empty input you know just to be sure
         if($this->EmptyInput()){
            header('location:../../index.php?error=emptyInput');
            exit();
        }

       
      

        $this->getUser($this->email,$this->password);

        
    }

    protected function getEmail(){
        return $this->email;
    }



    private function EmptyInput(){
        $result=false;
        if(empty($this->email) || empty($this->password) ) {
            $result=true;
        }     
        return $result;
    }

    

    // private function 
}