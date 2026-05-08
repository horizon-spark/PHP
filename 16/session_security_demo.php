<?php 
    session_start();

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if (!empty($username) && !empty($password)) {
            if ($username === 'admin' && $password === '12345') {
                echo "<p>Успешный вход в аккаунт</p>";
                echo "<p>id старой сессии: " . session_id() . "</p>";

                session_regenerate_id();

                echo "<p>id новой сессии: " . session_id() . "</p>";
                
                exit;
            } else {
                echo "<p>Неверный логин или пароль</p>";
            }
        }
    }
    
?>

<form action="" method="POST">
    <input type="text" name="username" placeholder="username">
    <input type="password" name="password" placeholder="password">
    <button type="submit">Отправить</button>
</form>