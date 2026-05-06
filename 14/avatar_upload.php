<?php 
    if (isset($_FILES['image']) &&
        $_FILES['image']['error'] == UPLOAD_ERR_OK) {

            $name = basename($_FILES['image']['name']);
            $tmp_name = $_FILES['image']['tmp_name'];
            $size = $_FILES['image']['size'];
            $type = $_FILES['image']['type'];

        if ($size > 1024 * 1024) {

            echo "Файл не должен быть больше 1 Мб";

        } else if (!(exif_imagetype($tmp_name) === IMAGETYPE_JPEG ||
                    exif_imagetype($tmp_name) === IMAGETYPE_PNG)) {

            echo "Разрешена загрузка только изображений JPEG, PNG";
            
        } else {

            $is_moved = move_uploaded_file($tmp_name, "uploads/$name");
            
            if ($is_moved) {
                echo "<img src='uploads/$name'><br>";
            }    
        }
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <button type="submit">Отправить</button>
</form>