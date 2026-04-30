<?php 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (!empty($_POST) && !empty($name) &&
        filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($message)) 
    {
        echo "<p>Спасибо, ваше сообщение отправлено!</p>"; 
    } else {
        if (empty($name)) {
            echo "<p>Поле name не может быть пустым</p>";    
        }
        if (empty($email)) {
            echo "<p>Поле email не может быть пустым</p>";    
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p>Введен некорректный email</p>";    
        }
        if (empty($message)) {
            echo "<p>Поле message не может быть пустым</p>";    
        }
        if (empty($_POST)) {
            echo "<p>Форма не отправлена</p>";
        }
    }
?>

<form action="" method="POST">
    <input type="text" name="name"
        value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
    <input type="email" name="email"
        value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
    <input type="textarea" name="message"
        value="<?= htmlspecialchars($_POST['message'] ?? '') ?>">
    <button type="submit">Отправить</button>
</form>