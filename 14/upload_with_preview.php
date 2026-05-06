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
                echo "Файл успешно отправлен";
            }    
        }
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" id='fileInput' name="image">
    <button type="submit">Отправить</button>
</form>
<img id="preview" src="#" alt="Предпросмотр" 
    style="display:none; max-width: 300px;">

<script>
  const fileInput = document.getElementById('fileInput');
  const preview = document.getElementById('preview');

  fileInput.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader(); 
      
      reader.onload = function(event) {
        preview.src = event.target.result; 
        preview.style.display = 'block';
      }
      
      reader.readAsDataURL(file); 
    }
  });
</script>