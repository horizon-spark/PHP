<?php 
    require_once "config/db.php";

    require_once "models/GuestBookModel.php";
    $model = new GuestBookModel($conn);

    require_once("controllers/GuestBookController.php");
?>