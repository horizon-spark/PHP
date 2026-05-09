<?php 
    if (isset($_POST['cookie_name']) &&
        isset($_POST['cookie_value']) && 
        isset($_POST['expire_days'])) {

            $name = $_POST['cookie_name'];
            $value = $_POST['cookie_value'];
            $days = $_POST['expire_days'];

            if (!empty($name) && 
                !empty($value) && 
                !empty($days)) {

                setcookie($name, $value, time() + 3600 * 24 * $days);
            }
        }

    if (isset($_POST['delete_cookies'])) {

        foreach($_COOKIE as $cookie_name => $cookie_value) {
            setcookie($cookie_name, $cookie_value, time() - 1);
        }
    }
    
    print_r($_COOKIE);
?>
<form action="" method="POST">
    <input type="text" name="cookie_name" 
        placeholder="Имя куки">
    <input type="text" name="cookie_value" 
        placeholder="Значение куки">
    <input type="number" name="expire_days" 
        placeholder="Истекает через ... дней" min=1>
    <button type=submit>Установить</button>
</form>
<form action="" method="POST">
    <input name="delete_cookies" hidden>
    <button type=submit>Удалить все</button>
</form>