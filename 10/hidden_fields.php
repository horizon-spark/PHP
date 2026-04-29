<?php 
    if (isset($_POST['username'])) {
        echo "<p>Форма отправлена</p>";
    }
    if (!empty($_POST['username']) && 
        !empty($_POST['email']) &&
        !empty($_POST['password'])) {
            echo "Обновлен профиль пользователя с ID: {$_POST['user_id']}";
        } else {
            echo "<p>Ошибка: необходимо заполнить все поля формы!</p>";
        }
?>

<form action="" method="POST">
    <input type="hidden" name="user_id" value="123">
    <input type="text" name="username">
    <input type="email" name="email">
    <input type="password" name="password">
    <button type="submit">Отправить</button>
</form>