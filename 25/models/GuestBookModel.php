<?php 
    class GuestBookModel
    {
        public $conn;

        function __construct($conn) {
            $this->conn = $conn;
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