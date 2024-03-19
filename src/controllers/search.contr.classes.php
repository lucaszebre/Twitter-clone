<?php 


class searchController extends Search{

    public function __construct(){
    }

    // function to the search of profile and hashtag in the header
    public function search($searchTerm,$hash){
        $searchPattern = "%$searchTerm%";

        if($hash=="true"){
             $stmt = $this->connect()->prepare("SELECT * FROM hashtag_list WHERE hashtag LIKE ?");
             $stmt->execute(array($searchPattern));
        }else{
            $stmt = $this->connect()->prepare('SELECT * FROM user WHERE username LIKE ? OR at_user_name LIKE ? ');
             $stmt->execute(array($searchPattern,$searchPattern));
        }   
    
         $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
         return $data;
    }

    // function to autocomplete in modal tweet
    public function searchAutocomplete($searchTerm){
        $searchPattern = "%$searchTerm%";

      
            $stmt = $this->connect()->prepare('SELECT * FROM user WHERE username LIKE ? OR at_user_name LIKE ? ');
             $stmt->execute(array($searchPattern,$searchPattern));
        
    
         $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
         return $data;
    }
    
}