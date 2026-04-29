<?php 
    if (empty($_GET['name']) || empty($_GET['age'])) {
        echo "<form action='' method='GET'>
                <input type='text' name='name' placeholder='Введите имя'>
                <input type='number' name='age' placeholder='Введите возраст'>
                <button type='submit'>Отправить</button>
            </form>";
    } else {
        $name = $_GET['name'];
        $age = $_GET['age'];

        echo "<p>Профиль пользователя: $name, возраст: $age лет</p>";
    }
?>