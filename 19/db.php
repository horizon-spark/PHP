<?php
    try {
        $conn = new PDO("mysql:host=localhost;dbname=web_dev", "admin", "123456");

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
        echo "Database connection established";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>