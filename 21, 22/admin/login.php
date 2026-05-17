<?php 
    session_start();

    if ($_SESSION['is_admin'] == true) {
        header('Location: add_product.php');
        exit;
    }

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if (!empty($username) && !empty($password)) {
            if ($username === 'admin' && $password === '12345') {
                $_SESSION['is_admin'] = true;
                $_SESSION['username'] = 'admin';
                $_SESSION['last_visit'] = date('Y-m-d H:i:s');

                header('Location: add_product.php');

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