<?php 
    foreach ($_FILES['images']['error'] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {

                $name = basename($_FILES['images']['name'][$key]);
                $tmp_name = $_FILES['images']['tmp_name'][$key];
                $size = $_FILES['images']['size'][$key];
                $type = $_FILES['images']['type'][$key];

            if ($size > 2 * 1024 * 1024) {

                echo "Файл не должен быть больше 2 Мб";

            } else if (!(exif_imagetype($tmp_name) === IMAGETYPE_GIF ||
                        exif_imagetype($tmp_name) === IMAGETYPE_JPEG ||
                        exif_imagetype($tmp_name) === IMAGETYPE_PNG)) {

                echo "Разрешена загрузка только изображений JPEG, PNG, GIF";
                
            } else {

                $is_moved = move_uploaded_file($tmp_name, "uploads/$name");
                
                if ($is_moved) {
                    echo "<img src='uploads/$name'><br>";
                    echo "<p>Название файла: $name</p>
                    <p>Временный путь: $tmp_name</p>
                    <p>Размер: $size</p>
                    <p>Тип: $type</p>";
                    }
            }
        }
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="images[]" multiple>
    <button type="submit">Отправить</button>
</form>