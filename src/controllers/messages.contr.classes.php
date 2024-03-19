<?php

class MessagesController extends Messages{

    protected function searchAccount($searchTerm){

            $searchPattern = "%$searchTerm%";

      
        $stmt = $this->connect()->prepare('SELECT * FROM user WHERE username LIKE ? OR at_user_name LIKE ? ');
        $stmt->execute(array($searchPattern,$searchPattern));
        
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $data;
    }

    
    protected function fetchConv(){
      
        $stmt = $this->connect()->prepare('SELECT * FROM convo ');
        $stmt->execute();
        
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $data;
    }

    protected function fetchUser($array) {
        if(!empty($array)){
            $placeholders = rtrim(str_repeat('?,', count($array)), ',');
            $sql = "SELECT * FROM user WHERE at_user_name IN ($placeholders)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute($array);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }else{
            return [];
        }
       
    }

    public function createConv($array){
        $uiid = uniqid();
        $stmt = $this->connect()->prepare("INSERT INTO convo ( name) VALUES ( ?)");
        $stmt->execute([ substr($uiid, 0, 5)]);
        $stmt = $this->connect()->prepare("SELECT id FROM convo WHERE name = ?");
        $stmt->execute([ substr($uiid, 0, 5)]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $id=$data[0]["id"];
        foreach($array as $at_user_name) {
            $user_id = $this->getUserId($at_user_name);
            $stmt = $this->connect()->prepare("INSERT INTO convo_users (id_convo, id_user) VALUES (?, ?)");
            $stmt->execute([$id, $user_id]);
        }
    }

    protected function getConv($id){
        $stmt = $this->connect()->prepare("SELECT * FROM convo WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    protected function getMessage($id_conv){
        $stmt = $this->connect()->prepare("SELECT * FROM messages WHERE id_convo = ? ORDER BY time");
        $stmt->execute([$id_conv]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    

    private function getUserId($at_user_name) {
        $stmt = $this->connect()->prepare("SELECT id FROM user WHERE at_user_name = ?");
        $stmt->execute([$at_user_name]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data["id"];
    }
    
    protected function getUserName($id) {
        $stmt = $this->connect()->prepare("SELECT at_user_name FROM user WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data["at_user_name"];
    }


    


    
    
   
}