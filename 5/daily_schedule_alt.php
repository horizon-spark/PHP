<?php 
    date_default_timezone_set("Europe/Moscow");
    $hour = date('H');
?>
    <?php if ($hour <= 5): ?>
        <h2>Ночь (00:00-05:00)</h2>
        <p>Пора спать!</p>
    <?php elseif ($hour <= 11): ?>
        <h2>Утро (6:00-11:00)</h2>
        <p>Сделайте зарядку!</p>
    <?php elseif ($hour <= 17): ?>
        <h2>День (12:00-17:00)</h2>
        <p>Время продуктивной работы!</p>
    <?php else: ?>
        <h2>Вечер (18:00-23:00)</h2>
        <p>Отдых и хобби!</p>
    <?php endif; ?>

    <?php echo "<p>Текущее время: " . date("H:i") . "</p>"; ?>