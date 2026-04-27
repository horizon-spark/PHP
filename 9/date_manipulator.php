<?php 
    $months = [
        "Jan" => "Января",
        "Feb" => "Февраля",
        "Mar" => "Марта",
        "Apr" => "Апреля",
        "May" => "Мая",
        "Jun" => "Июня",
        "Jul" => "Июля",
        "Aug" => "Августа",
        "Sep" => "Сентября",
        "Oct" => "Октября",
        "Nov" => "Ноября",
        "Dec" => "Декабря",
    ];

    $weekDays = [
        "Monday" => "Понедельник",
        "Tuesday" => "Вторник",
        "Wednesday" => "Среда",
        "Thursday" => "Четверг",
        "Friday" => "Пятница",
        "Saturday" => "Суббота",
        "Sunday" => "Воскресенье",
    ];

    echo date('d.m.Y') . "<br>";
    echo date('Y-m-d') . "<br>";
    echo date('d') . ' ' . $months[date('M')] . ' ' . date('Y') . "<br>";
    echo $weekDays[date('l')] . "<br>";
?>