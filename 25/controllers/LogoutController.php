<?php     
    require_once "models/UsersModel.php";

    $users = new UsersModel($conn);

    if (isset($_SESSION['user_id'])) {
        $users->logout();
        header("Location: index.php");
    } else {
        $_SESSION['message'] = "Авторизуйтесь для выхода из профиля";
        header("Location: index.php");
    }
?>