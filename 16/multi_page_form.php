<?php 
    session_start();

    if (isset($_POST['go_back'])) {
        if (!isset($_SESSION['stage'])) {
            $_SESSION['stage'] = 1;
        } else {
            $_SESSION['stage']--;
        }
    }

    if (isset($_POST['name']) && isset($_POST['age'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];

        if (!empty($name) && !empty($age)) {
            $_SESSION['name'] = $name;
            $_SESSION['age'] = $age;
            $_SESSION['stage'] = 2;
        }
    }

    if (isset($_POST['city']) && isset($_POST['occupation'])) {
        $city = $_POST['city'];
        $occupation = $_POST['occupation'];

        if (!empty($city) && !empty($occupation)) {
            $_SESSION['city'] = $city;
            $_SESSION['occupation'] = $occupation;
            $_SESSION['stage'] = 3;
        }
    }

    if (!isset($_SESSION['stage']) || $_SESSION['stage'] === 1) {
        $saved_name = $_SESSION['name'] ?? '';
        $saved_age = $_SESSION['age'] ?? '';

        echo "<form action='' method='POST'>
                <input type='text' name='name' 
                    placeholder='name' value=$saved_name>
                <input type='number' name='age' 
                    placeholder='age' value=$saved_age>
                <button type='submit'>Отправить</button>
            </form>";

    } else if ($_SESSION['stage'] === 2) {
        $saved_city = $_SESSION['city'] ?? '';
        $saved_occupation = $_SESSION['occupation'] ?? '';

        echo "<form action='' method='POST'>
                <input type='text' name='city' 
                    placeholder='city' value=$saved_city>
                <input type='text' name='occupation' 
                    placeholder='occupation' value=$saved_occupation>
                <button type='submit'>Отправить</button>
            </form>";

        echo "<form action='' method='POST'>
                <input name='go_back' value='1' hidden>
                <button type='submit'>Назад</button>
            </form>";
    } else {
        foreach ($_SESSION as $field => $value) {
            if ($field !== 'stage') {
                echo "<p>$field - $value</p>";
            }
        }
        echo "<p>Подтвердить отправку?</p><button>Подтвердить</button>";

        echo "<form action='' method='POST'>
                <input name='go_back' value='1' hidden>
                <button type='submit'>Назад</button>
            </form>";
    }
?>