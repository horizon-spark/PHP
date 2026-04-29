<?php 
    $message = $_POST['message'];

    if (isset($message)) {
        header("Location: post_redirect_get.php?status=success");
    }

    if (isset($_GET['status'])) {
        echo "<p>Сообщение успешно отправлено</p>";
    }
?>

<form action="" method="POST">
    <input type="text" name="message">
    <button type="submit">Отправить</button>
</form>