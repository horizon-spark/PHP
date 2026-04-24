<?php 
    $hour = date('H');
?>

<?php if ($hour < 12): ?>
    <p>Доброе утро!</p>
<?php else: ?>
    <p>Добрый день!</p>
<?php endif ?>