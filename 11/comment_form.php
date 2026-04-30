<?php 
    $errors = [];

    if (isset($_POST['author'])) {
        $author = $_POST['author'];
        $comment = $_POST['comment'];
        $rating = $_POST['rating'];

        if (empty($author)) {
            $errors[] = 'Автор не может быть пустым';
        }

        if (empty($comment)) {
            $errors[] = 'Комментарий не может быть пустым';
        }

        if (strlen($comment) > 500) {
            $errors[] = 'Комментарий не может быть длиннее 500 символов';
        }

        if ($rating > 5 || $rating < 1) {
            $errors[] = 'Некорректное значение рейтинга';
        }

        if (empty($errors)) {
            echo "Комментарий успешно отправлен";
        } else {
            echo '<ul>';
            foreach($errors as $error) {
                echo "<li>$error</li>";
            }
            echo '</ul>';

            $errors = [];
        }
    }
?>

<form action="" method="POST">
    <input type="text" name="author"
        value="<?= htmlspecialchars($_POST['author'] ?? '') ?>">
    <input type="textarea" name="comment"
        value="<?= htmlspecialchars($_POST['comment'] ?? '') ?>">
    <select name="rating" 
        value="<?= htmlspecialchars($_POST['rating'] ?? '') ?>">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
    </select>
    <button type="submit">Отправить</button>
</form>