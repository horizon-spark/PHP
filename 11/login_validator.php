<?php 
    $errors = [];
    if (!empty($_POST['login'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        if (!ctype_alnum($login) || empty($login)) {
            $errors[] = 'Логин должен быть не пустой и содержать только буквы и цифры';
        }

        if (strlen($password) < 4) {
            $errors[] = 'Пароль должен быть не короче 4 символов';
        }

        if (empty($errors)) {
            echo "Успешная авторизация";
        } else {
            echo '<ul>';
            foreach($errors as $error) {
                echo "<li>$error</li>";
            }
            echo '</ul>';

            $errors = [];
        }
    }
?>

<form action="" method="POST">
    <input type="text" name="login">
    <input type="password" name="password">
    <button type="submit">Отправить</button>
</form>