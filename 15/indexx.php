<?php require_once 'error_handler.php'; ?>
<?php $page_title = "Require once example"; ?>
<?php require_once 'header.php'; ?>
<main>
    <h1>Главная страница</h1>
    <p>Содержимое главной страницы</p>
    <?php 
        $modules = array_diff(scandir("./modules"), array('.', '..'));
        foreach ($modules as $module) {
            include "./modules/$module";
        }
    ?>
</main>
<?php require_once 'footer.php'; ?>