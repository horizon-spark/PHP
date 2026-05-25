<?php 
    session_start();

    require_once "config/db.php";
    require_once "views/header.php";

    if (isset($_SESSION['message'])) {
        echo "<h3>{$_SESSION['message']}</h3>";
        unset($_SESSION['message']);
    }

    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $page = $_GET['page'];

        switch ($page)
        {
            case "register":
                require_once("controllers/RegistrationController.php");
                break;
            case "login":
                require_once("controllers/LoginController.php");
                break;
            case "logout":
                require_once("controllers/LogoutController.php");
                break;
            case "index":
                require_once("controllers/GuestBookController.php");
                break;
            default:
                header("Location: index.php?page=index");        
        }
    } else {
        header("Location: index.php?page=index");
    }
?>