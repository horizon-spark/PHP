<?php 
    session_start();

    $_SESSION = [];
    
    if (ini_get("session.use_cookies")) { 
        setcookie(session_name(), '', time() - 3600, '/'); 
    }

    session_destroy();

    echo "Вы успешно вышли из системы";
    header("Location: login.php");
    exit;
?>