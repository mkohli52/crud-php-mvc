<?php
class UserController{
    private $userModel;

    public function __construct($userModel){
        $this->userModel = $userModel;
        
    }

    public function index(){
        $users = $this->userModel->showAll();
        require 'view/index.php';
    }

    public function addUser(){
        require 'view/addUser.php';
    }

    public function saveUser($data){
        $this->userModel->create($data);
    }

    public function editUser($id){
        $user =  $this->userModel->showOne($id);
        require 'view/editUser.php';
    }

    public function updateUser($data){
        $user = $this->userModel->update($data);
    }


}


?>