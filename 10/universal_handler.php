<?php 
    if (isset($_REQUEST['user_message'])) {
        echo "Пользователь говорит: {$_REQUEST['user_message']}";
    }
?>

<form action="" method="GET">
    <input type="text" name="user_message">
    <select name="method">
        <option value="post">POST</option>
        <option value="get">GET</option>
    </select>
    <button type="submit">Отправить</button>
</form>