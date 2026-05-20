<?php 
    require_once "views/guestbook.php";

    if (isset($_POST['name']) && 
        isset($_POST['message']) &&
        isset($_POST['user_id'])) {

        if (!empty($_POST['name']) && 
            !empty($_POST['message']) &&
            !empty($_POST['user_id'])) {

            $name = htmlspecialchars($_POST['name']);
            $message = htmlspecialchars($_POST['message']);
            $user_id = htmlspecialchars($_POST['user_id']);

            $model->add($name, $message, $user_id);
        }
    }

    if (isset($_GET['delete']) && !empty($_GET['delete'])) {
        $id_delete = $_GET['delete'];
        $model->delete($id_delete);
    }
    
    $records = $model->getAll();
    render_view($records);
?>