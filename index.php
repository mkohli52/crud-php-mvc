<?php
    require "/config/database.php";
    require "/controller/userController.php";
    require "/model/userModel.php";

    $userModel =  new UserModel($db);
    $userController = new UserController($userModel);

    $action = isset($_GET['action']) ? $_GET['action'] : 'index';

    switch ($action) {
        case 'index':
            $userController->index();
            break;
        case 'adduser':
            
            $userController->addUser();
            break;
        case 'saveuser':
            $errors = array();
            $email = $_POST['email'];
            $name = $_POST['name'];
            $age = $_POST['age'];
            $status = $_POST['status'];
            if ( empty( $email ) || !filter_var( $email,FILTER_VALIDATE_EMAIL )) {
                $errors[ "email" ] = "Email is required and must be a valid email address.";
            }
        
            if ( empty( $name ) || strlen( $name ) <= 2) {
                $errors[ "name" ] = "Name is should not be empty and should be greater then 2 letters ";    
            }
        
            if ( empty( $age ) || $age < 0 ){
                $errors[ "age" ] = "Invalid age or age cannot be empty";
            }
        
            if ( empty( $status ) ){
                $errors[ "status" ]="Please select the status";
            }

            if(count($errors)==0){
                $data = [
                    'name' => $_POST["name"],
                    'age' => $_POST["age"],
                    'email' => $_POST["email"],
                    'status' => $_POST["status"]
                ];
                $userController->saveUser($data);
                break;
            }else{
                session_start();
                $_SESSION[ 'errors' ] = $errors;
                $_SESSION[ 'email' ] = $email;
                $_SESSION[ 'name' ] = $name;
                $_SESSION[ 'age' ] = $age;
                $_SESSION[ 'status' ] = $status;

                header("Location: ?action=adduser");
                break;
            }
            
        case 'edituser':
            $id = $_GET["id"];
            $userController->editUser($id);
            break;
        case 'updateuser':
            $errors = array();
            $id = $_POST['id'];
            $email = $_POST['email'];
            $name = $_POST['name'];
            $age = $_POST['age'];
            $status = $_POST['status'];
            if ( empty( $email ) || !filter_var( $email,FILTER_VALIDATE_EMAIL )) {
                $errors[ "email" ] = "Email is required and must be a valid email address.";
            }
        
            if ( empty( $name ) || strlen( $name ) <= 2) {
                $errors[ "name" ] = "Name is should not be empty and should be greater then 2 letters ";    
            }
        
            if ( empty( $age ) || $age < 0 ){
                $errors[ "age" ] = "Invalid age or age cannot be empty";
            }
        
            if ( empty( $status ) ){
                $errors[ "status" ]="Please select the status";
            }
            if(count($errors)==0){
                $data = [
                    'id' => $_POST["id"],
                    'name' => $_POST["name"],
                    'age' => $_POST["age"],
                    'email' => $_POST["email"],
                    'status' => $_POST["status"]
                ];
                session_start();
                $userController->updateUser($data);
                break;             

            }else{
                session_start();
                $_SESSION[ 'errors' ] = $errors;
                $_SESSION[ 'email' ] = $email;
                $_SESSION[ 'name' ] = $name;
                $_SESSION[ 'age' ] = $age;
                $_SESSION[ 'status' ] = $status;

                header("Location: ?action=edituser&id=".$id);
            }
            break;
        case 'deleteuser':
            $id = $_GET["id"];
            $userController->deleteUser($id);
        break;    
        default:
            echo "Invalid action";
    }

?>