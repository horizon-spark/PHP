<?php 
    setcookie("username", "Дмитрий");
    setcookie("last_visit", date("d-m-Y H:i:s"), time() + 3600);

    echo "Куки успешно установлены";
?>