<?php 
    const CORRECT_PASSWORD = "qwerty123";

    $userPassword = "qwerty123";
    $minLength = 8;

    if (!empty($userPassword) && 
        strlen($userPassword) >= $minLength &&
        $userPassword == CORRECT_PASSWORD) {
            echo "Вход выполнен успешно!";
        } else {
            if (empty($userPassword)) {
                echo "Ошибка: пароль не может быть пустым";
            } else if (strlen($userPassword) < $minLength) {
                echo "Ошибка: пароль слишком короткий";
            } else {
                echo "Ошибка: неверный пароль";
            }
        }
?>