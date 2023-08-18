<?php
class UserModel{
    private $db;
    public function __construct($db){
        $this->db = $db;
    }

    public function create($data){
        try{
            $sql = "INSERT INTO users (name, email, age, status) VALUES ('".$data["name"]."', '".$data["email"]."', ".$data["age"].", '".$data["status"]."')";
            return $this->db->exec($sql);
        }catch(PDOExeption $e){
            echo "An error occurred: " . $e->getMessage();
        }
    }

    public function show(){
        try{
            $sql = "SELECT * FROM users";;
            $result = $this->db->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "An error occurred: " . $e->getMessage();
        }
    }

    public function showOne($id){
        try{
            $sql = "SELECT * FROM users WHERE id=".$id.";";
            $result = $this->db->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "An error occurred: " . $e->getMessage();
        
    }
}
    public function delete($id){
        try{
            $sql = "DELETE FROM users WHERE id=".$id.";";
            return $this->db->exec($sql);
        }catch(PDOException $e){
            echo "An error occurred: " . $e->getMessage();
        }
    }

}



$db = require_once "/config/database.php";
$user = new UserModel($db); 
$faked = ['name' => "Mohit",
'age' => 22,
'email' => "mkohli52@gmail.com",
'status' => "active"

];

print_r($user->create($faked));



?>