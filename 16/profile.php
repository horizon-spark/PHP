<?php 
    session_start();

    if ($_SESSION['auth'] != true) {
        echo "Доступ запрещён. Пожалуйста, авторизуйтесь";
        header('Location: login.php');
        exit;
    }

    echo "<p>Добро пожаловать, admin!</p>
        Ваш последний визит был: {$_SESSION['last_visit']}";
    
    $_SESSION['last_visit'] = date('Y-m-d H:i:s');
?>
<a href="logout.php">Выйти</a>