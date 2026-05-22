<?php 
    class GuestBookModel
    {
        public $conn;

        function __construct($conn) {
            $this->conn = $conn;
        }

        function validateInput($name, $message, $user_id) {
            if (!empty($name) &&
                !empty($message) && 
                !empty($user_id)) {

                if (strlen($name) > 100 || strlen($name) < 3) {
                    echo "Имя должно содержать от 3 до 100 символов";
                    return 0;
                }

                if (strlen($message) > 300 ||
                    strlen($message) < 5) {

                    echo "Отзыв должен содержать от 5 до 300 символов";
                    return 0;
                }

                if ($user_id < 1 || $user_id > PHP_INT_MAX) {
                    echo "Некорректное значение user_id";
                    return 0;
                }

            } else {
                echo "Поля формы не должны быть пустыми";
                return 0;
            }

            return 1;
        }

        function getAll() {
            $sql = "SELECT * FROM guestbook
                ORDER BY id DESC";

            $records = $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            return $records;
        }

        function add($name, $text, $user_id) {
            $sql = "INSERT INTO guestbook (name, text, user_id)
                    VALUES (:name, :text, :user_id)";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindValue(":name", $name);
            $stmt->bindValue(":text", $text);
            $stmt->bindValue(":user_id", $user_id);

            $affectedRowsNumber = $stmt->execute();

            if ($affectedRowsNumber > 0) {
                echo "Запись успешно добавлена";
            }
        }

        function delete($id) {
            $sql = "DELETE FROM guestbook
                    WHERE id=:id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":id", $id);

            $affectedRowsNumber = $stmt->execute();

            if ($affectedRowsNumber > 0) {
                echo "Запись успешно удалена";
            }
        }
    }
?>