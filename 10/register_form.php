<?php 
    if (isset($_POST['username'])) {
        echo "<p>Форма отправлена</p>";
    }
    if (!empty($_POST['username']) && 
        !empty($_POST['email']) &&
        !empty($_POST['password'])) {
            echo "<p>Вы зарегистрированы!</p>
                <p>Имя пользователя: {$_POST['username']}</p>
                <p>email: {$_POST['email']}</p>";
        } else {
            echo "<p>Ошибка: необходимо заполнить все поля формы!</p>";
        }
?>

<form action="" method="POST">
    <input type="text" name="username">
    <input type="email" name="email">
    <input type="password" name="password">
    <button type="submit">Отправить</button>
</form>