<?php

class RegisterContr extends Register{

    private $birthdate;
    private $mail;
    private $city;
    private $password;
    private $passwordRepeat;
    private $username;
    private $at_user_name;


    public function __construct($username,$at_user_name,$birthdate,$city,$mail,$password,$passwordRepeat){
        $this->mail = $mail;
        $this->city = $city;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->birthdate = $birthdate;
        $this->username = $username;
        $this->at_user_name = $at_user_name;

    }

    public function RegisterUser(){
        // echo "just before the set User";

        // check for empty input you know just to be sure
        if($this->EmptyInput()){
            echo "inside empty input";
            header('location:../../templates/register.php?error=emptyInput');
            exit();
        } 
        
        if($this->CheckUserName($this->username)){
            header('location:../../templates/register.php?error=usernametake');
            exit();
        }
        
         if($this->CheckAtUserName($this->at_user_name)){
            header('location:../../templates/register.php?error=atusernametake');
            exit();
        }
        // password need to be the same -ç-
        if($this->SamePassword()){
            echo "inside same password";
            header('location:../../templates/register.php?error=passwordnotthesame');
            exit();
        }
        // check if user not already register in the db 
        if($this->CheckUser($this->email)){
            echo "inside checkuser";
            header('location:../../templates/register.php?error=useralreadyregister');
            exit();
        }
        // then we procede to the register
        echo "just before the set User";
        $this->setUser($this->mail,$this->password,$this->username,$this->passwordRepeat,$this->at_user_name,$this->city,$this->birthdate);}

    private function EmptyInput(){
        $result=false;
       if(empty($this->mail) || empty($this->password) || empty($this->username)||empty($this->at_user_name)||empty($this->passwordRepeat)||empty($this->birthdate)) {
            $result=true;
        }     
        return $result;
    }

    

    private function SamePassword(){
        $result=false;
        if($this->password!=$this->passwordRepeat){
            echo $this->password;
            echo $this->passwordRepeat;
            $result=true;
        }
        return $result;
    }



    
}