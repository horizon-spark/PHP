<?php 
    require_once "views/guestbook.php";
    require_once "models/GuestBookModel.php";

    $model = new GuestBookModel($conn);

    $is_authorised = isset($_SESSION['user_id']) && isset($_SESSION['username']);

    if ($is_authorised) {
        if (isset($_POST['name']) && 
            isset($_POST['message']) &&
            isset($_POST['user_id'])) {
    
            $name = htmlspecialchars($_POST['name']);
            $message = htmlspecialchars($_POST['message']);
            $user_id = htmlspecialchars($_POST['user_id']);
    
            $is_valid = $model->validateInput($name, $message, $user_id);
    
            if ($is_valid) {
                $model->add($name, $message, $user_id);
            }
        }
    
        if (isset($_GET['delete']) && !empty($_GET['delete'])) {
            $id_delete = $_GET['delete'];
            $model->delete($id_delete);
            header("Location: index.php");
        }
    }
    
    $records = $model->getAll();
    render_view($records, $is_authorised);
?>