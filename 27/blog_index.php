<?php 
    session_start();

    require_once "db.php";

    if (isset($_SESSION['message'])) {
        echo "<h3>{$_SESSION['message']}</h3>";
        unset($_SESSION['message']);
    }

    $sql = "SELECT 
                a.title, 
                u.username,
                a.published_at,
                (SELECT COUNT(*) 
                    FROM comments
                    WHERE article_id = a.id) AS count,
                a.id
            FROM articles a
                LEFT JOIN users u ON a.user_id = u.id
            ORDER BY a.published_at DESC";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $entries = $stmt->fetchAll();

    if (empty($entries)) {
        echo "<p>Статьи пока не добавлены</p>";
    } else {
        foreach ($entries as $entry) {
            echo "<p>{$entry['title']} | {$entry['username']} | 
            {$entry['published_at']} | {$entry['count']} | 
            <a href='blog_index.php?id={$entry['id']}'>Просмотр</a></p>";
        }
    }

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id === false || $id === null || 
            $id < 1 || $id > 10000) {

            $_SESSION['message'] = "Некорретное значение id статьи";
            header("Location: blog_index.php");
        }

        $sql_article = "SELECT title, content
                      FROM articles
                      WHERE id = :id";

        $stmt = $conn->prepare($sql_article);
        $stmt->execute(["id" => $id]);
        $article = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($article) {
            echo "<h3>{$article['title']}</h3>
                  <p>{$article['content']}</p>";
            
            $sql_comments = "SELECT text
                             FROM comments
                             WHERE article_id = :id
                             ORDER BY created_at DESC";
            
            $stmt = $conn->prepare($sql_comments);
            $stmt->execute(["id" => $id]);
            $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($comments) {
                foreach ($comments as $comment) {
                    echo "<p>{$comment['text']}</p>";
                }
            } else {
                echo "<p>Комментариев пока нет</p>";
            }
        } else {
            echo "Статья с id = $id не найдена";
        }
    }
?>