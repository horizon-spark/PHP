<?php 
    require_once "views/registration.php";
    require_once "models/UsersModel.php";

    $users = new UsersModel($conn);
    
    if (isset($_POST['username']) &&
        isset($_POST['email']) && 
        isset($_POST['password']) &&
        isset($_POST['password_confirm'])) {

        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_confirm = htmlspecialchars($_POST['password_confirm']);

        $is_valid = $users->validateRegistration($username, $email,
            $password, $password_confirm);
        
        if ($is_valid) {
            $users->register($username, $email, $password);
        }
    }
?>