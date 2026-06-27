<?php 
    $symbols = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";

    if (isset($_GET['length']) && !empty($_GET['length']) &&
        filter_var($_GET['length'], FILTER_VALIDATE_INT)) {

        $length = $_GET['length'];

        if ($length >= 4 && $length <= 20) {
            $password = "";

            for ($i = 0; $i < $length; $i++) {
                $password .= $symbols[rand(0, strlen($symbols) - 1)];
            }

            echo "Сгенерированный пароль: $password";
        } else {
            echo "Длина пароля должна быть от 4 до 20 символов";
        }
    } else {
        echo "Укажите длину пароля (?length=8)";
    }
?>