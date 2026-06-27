<?php 
    session_start();

    $secret = 42;

    if (isset($_POST['guess']) && !empty($_POST['guess']) &&
        filter_var($_POST['guess'], FILTER_VALIDATE_INT)) {

        $guess = $_POST['guess'];

        $_SESSION['attempts'] = isset($_SESSION['attempts']) ? 
            $_SESSION['attempts'] + 1 : 1;

        if ($guess == $secret) {
            echo "<p>Поздравляю! Вы угадали число $secret!</p>";
            echo "Количество попыток: {$_SESSION['attempts']}";
            $_SESSION['attempts'] = 0;
            exit;
        } else if ($secret > $guess) {
            echo "Загаданное число больше";
        } else {
            echo "Загаданное число меньше";
        }
    } else {
        echo "Введите целое число";
    }
?>

<form action="" method="post">
    <input type="number" name="guess"
        placeholder="Введите число">
    <button type="submit">Отправить</button>
</form>