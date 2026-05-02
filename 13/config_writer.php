<?php 
    if (isset($_POST['site_name']) && 
        isset($_POST['theme']) && 
        isset($_POST['items_per_page'])) {

            $site_name = $_POST['site_name'];
            $theme = $_POST['theme'];
            $items_per_page = $_POST['items_per_page'];

            if (!empty($site_name) &&
                !empty($theme) &&
                !empty($items_per_page)) {

                    $fp = fopen("config.txt", 'w');

                    if ($fp) {
                        foreach ($_POST as $key => $value) {
                            fwrite($fp, "$key=$value\n");
                        }
                        fclose($fp);
                    }
                }
        }
?>

<form method="POST" action="">
    <input type="text" name="site_name" placeholder="site_name">
    <input type="text" name="theme" placeholder="theme">
    <input type="text" name="items_per_page" placeholder="items_per_page">
    <button type="submit">Отправить</button>
</form>