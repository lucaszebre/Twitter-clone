<?php

class Dbh{


    // function to connect to the db
    protected function connect(){
      
        try {
            // Read from the environment (see .env.example); fall back to the original local defaults.
            $servername = getenv('DB_HOST') ?: "localhost";
            $port = getenv('DB_PORT') ?: "3306";
            $username = getenv('DB_USER') !== false ? getenv('DB_USER') : "lucas";
            // An explicitly empty DB_PASSWORD is valid (common on local MySQL), so only fall back when unset.
            $password = getenv('DB_PASSWORD') !== false ? getenv('DB_PASSWORD') : "root";
            $db = getenv('DB_NAME') ?: "twitter";
            $dbh = new PDO("mysql:host=$servername;port=$port;dbname=$db;charset=utf8mb4", $username, $password);
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