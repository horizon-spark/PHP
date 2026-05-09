<?php 
    if (isset($_POST['confirm'])) {
        setcookie('cookie_accepted', true, time() + 3600 * 24 * 30);
    }

    if (isset($_COOKIE['cookie_accepted'])) {
        echo "Вы согласились использовать куки. Теперь мы следим за вами ¯\_(ツ)_/¯";
    } else {
        echo "<form action='' method='POST'>
                <input name='confirm' hidden>
                Мы используем куки для улучшения сайта
                <button type='submit'>Принять</button>
            </form>";
    }
?>
