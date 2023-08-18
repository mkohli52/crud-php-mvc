<?php
    class UserModel{
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function create($data){
            try{
                $sql = "INSERT INTO users (name, email, age, status) VALUES ('".$data["name"]."', '".$data["email"]."', ".$data["age"].", '".$data["status"]."')";
                $this->db->exec($sql);
                start_session();
                header("Location: ?action=adduser");
            }catch(PDOExeption $e){
                echo "An error occurred: " . $e->getMessage();
            }
        }
        
        public function showAll(){
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
                return $result->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo "An error occurred: " . $e->getMessage();
            
        }
    }
        public function update($data){
            try{
                $sql = "UPDATE users SET name='".$data["name"]."', email='".$data["email"]."',age=".$data["age"].",status='".$data["status"]."' WHERE id=".$data["id"].";";
                $this->db->exec($sql);
                header("Location: ?action=index");
            }catch(PDOException $e){
                echo "An error occurred: " . $e->getMessage();
            }

        }

        public function delete($id){
            try{
                $sql = "DELETE FROM users WHERE id=".$id.";";
                print_r($this->db->exec($sql));
            }catch(PDOException $e){
                echo "An error occurred: " . $e->getMessage();
            }
        }

    }

?>