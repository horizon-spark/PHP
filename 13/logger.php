<?php 
    function logAction($username, $action) {
        $log = "[" . date("Y-m-d H:i:s") . "] " . 
        "Пользователь '$username' выполнил действие: '$action'\n";

        $is_success = file_put_contents("actions.log", $log, FILE_APPEND | LOCK_EX);

        return $is_success;
    }

    if (isset($_POST['login'])) {
        logAction('Иван', "Вход в систему");
    }
    if (isset($_POST['logout'])) {
        logAction('Иван', "Выход из системы");
    }
    if (isset($_POST['profile'])) {
        logAction('Иван', "Просмотр профиля");
    }
?>

<form method="POST" action="">
    <button type="submit" name="login">Войти</button>
</form>
<form method="POST" action="">
    <button type="submit" name="logout">Выйти</button>
</form>
<form method="POST" action="">
    <button type="submit" name="profile">Просмотр профиля</button>
</form>