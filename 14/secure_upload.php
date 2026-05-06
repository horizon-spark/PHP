<?php 
    foreach ($_FILES['files']['error'] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {

            $name = basename($_FILES['files']['name'][$key]);
            $tmp_name = $_FILES['files']['tmp_name'][$key];
            $size = $_FILES['files']['size'][$key];
            $type = $_FILES['files']['type'][$key];

            $unique_name = uniqid($name);
            $is_moved = move_uploaded_file($tmp_name, "uploads/$unique_name");
            
            if ($is_moved) {
                echo "<p>Файл $name успешно отправлен</p>";

                $client_ip = $_SERVER['REMOTE_ADDR'];
                $log = "Исходное название файла: $name\n" .
                        "Название файла на сервере: $unique_name\n" .
                        "Дата: " . date('d-m-Y H:i:s') . "\n" .
                        "IP-адрес пользователя: $client_ip";
                
                file_put_contents("uploads.log", $log, FILE_APPEND);
            }
        }
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="files[]" multiple>
    <button type="submit">Отправить</button>
</form>