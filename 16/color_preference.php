<?php 
    session_start();

    if (isset($_POST['background'])) {
        $_SESSION['background'] = $_POST['background'];
    }

    if (isset($_POST['reset'])) {
        $_SESSION['background'] = 'white';
    }

    if (isset($_SESSION['background'])) {
        echo "<style>
                body {
                    height: 100vh;
                    background-color: {$_SESSION['background']};
                }
            </style>";
    }

?>

<form action="" method="POST">
    <select name="background">
        <option value="white">Белый</option>
        <option value="grey">Серый</option>
        <option value="lightblue">Голубой</option>
        <option value="green">Зеленый</option>
    </select>
    <button type="submit">Изменить цвет</button>
</form>
<form action="" method="POST">
    <input name="reset" value="1" hidden>
    <button type="submit">Сбросить цвет</button>
</form>