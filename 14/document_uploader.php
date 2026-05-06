<?php 
    if (isset($_FILES['image']) &&
        $_FILES['image']['error'] == UPLOAD_ERR_OK) {

            $name = basename($_FILES['image']['name']);
            $tmp_name = $_FILES['image']['tmp_name'];
            $size = $_FILES['image']['size'];
            $type = $_FILES['image']['type'];

        if (!(pathinfo($name, PATHINFO_EXTENSION) === 'pdf' ||
                    pathinfo($name, PATHINFO_EXTENSION) === 'doc' ||
                    pathinfo($name, PATHINFO_EXTENSION) === 'docx')) {

            echo "Разрешена загрузка только документов PDF, DOC, DOCX";
            
        } else {

            $is_moved = move_uploaded_file($tmp_name, "documents/$name");
            
            if ($is_moved) {
                echo "Файл успешно загружен";
            }    
        }
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <button type="submit">Отправить</button>
</form>