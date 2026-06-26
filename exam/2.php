<form method="post" action="">
    <input type="number" name="start"
        placeholder="Введите начало диапазона">
    <input type="number" name="end"
        placeholder="Введите конец диапазона">
    <button type="submit">Отправить</button>
</form>

<?php 
    if (isset($_POST['start']) && !empty($_POST['start']) &&
        isset($_POST['end']) && !empty($_POST['end'])) {
        $start = $_POST['start'];
        $end = $_POST['end'];

        if ($start < $end) {
            $sum = 0;

            for ($i = $start; $i <= $end; $i++) {
                $sum += $i;
                $output = $i == $end ? "$i" : "$i, ";
                echo "$output";
            }

            echo "<p>Sum = $sum</p>";
        } else {
            echo "Ошибка: start >= end";
        }
    } else {
        echo "Ошибка: необходимо заполнить все поля формы";
    }
?>