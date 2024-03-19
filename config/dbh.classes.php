<?php

class Dbh{


    // function to connect to the db
    protected function connect(){
      
        try {
            $servername = "localhost";
            $username = "lucas";
            $password = "root";
            $db = "twitter";
            $dbh = new PDO('mysql:host=localhost;dbname=twitter', $username, $password);
            return $dbh;
        } catch (PDOException $e) {
            print "Error " . $e->getMessage();
            die();      
          }
    }

    // utility function to generat a randome nom of 3 characater
    public function generateRandomName() {
        $randomName = substr(uniqid(), -3); 
        return $randomName;
    }


    // function to show the date for the profile in a good format 
    public function formatDate($dateString) {
        $date = new DateTime($dateString);
        $month = $date->format('F'); 
        $year = $date->format('Y');
    
        return "Joined $month, $year";
    }
    
    // function to display the tweet in a good format 
    public function formatTimeOrDate($dateString) {
        $date = new DateTime($dateString);
        $now = new DateTime();
    
        $interval = $now->diff($date);
        $hours = $interval->h + $interval->days * 24;
    
        if ($hours < 24) {
            return "$hours h";
        } else {
            return $date->format('M j');
        }
    }

    
}