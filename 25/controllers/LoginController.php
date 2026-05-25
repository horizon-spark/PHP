<?php 
    if (isset($_SESSION['user_id'])) {
        $_SESSION['message'] = "Вы уже авторизованы";
        header("Location: index.php");
        exit;
    }

    require_once "views/login.php";
    require_once "models/UsersModel.php";

    $users = new UsersModel($conn);

    if (isset($_POST['username']) &&
        isset($_POST['email']) && 
        isset($_POST['password'])) {

        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $is_valid = $users->validateLogin($username, $email, $password);

        if ($is_valid) {
            $users->login($username, $email, $password);
        }
    }
?>