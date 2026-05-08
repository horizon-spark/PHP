<?php 
    session_start();

    header("Cache-Control: no-store"); // чтобы браузер не кешировал страницу

    if (isset($_POST['username']) && isset($_POST['review'])) {
        $username = $_POST['username'];
        $review = $_POST['review'];

        if (!empty($username) && !empty($review) &&
            !isset($_SESSION['flash_message'])) {

            $_SESSION['flash_message'] = "Форма успешно отправлена";
        } else {
            unset($_SESSION['flash_message']);
        }
    }

    if (isset($_SESSION['flash_message'])) {
        echo "<p>{$_SESSION['flash_message']}</p>";
    }
?>

<form action="" method="POST">
    <input type="text" name="username" placeholder="username">
    <input type="text" name="review" placeholder="review">
    <button type="submit">Отправить</button>
</form>