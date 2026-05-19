<?php 
    echo "<style>
            .container {
                display: grid;
                grid-template-columns: repeat(5, 1fr);
                gap: 10px;
            }
            .card {
                border: 1px solid black;
                border-radius: 5px;
                padding: 0px 0px 10px 10px;
            }
            a {
                text-decoration: none;
                color: black;
                font-size: 1.5rem;
            }
            a.active {
                pointer-events: none;
                cursor: default;
                color: grey;
            }
        </style>";

    require_once '../19/db.php';

    $currentPage = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);

    if ($currentPage === false || 
        $currentPage === null || 
        $currentPage <= 0) {

        $currentPage = 1;
    }

    $itemsPerPage = 3;
    $offset = ($currentPage - 1) * $itemsPerPage;

    $total_sql = "SELECT COUNT(*) AS total FROM products";
    $total_stmt = $conn->prepare($total_sql);
    $total_stmt->execute();
    $total = $total_stmt->fetch()['total'];

    $total_pages = ceil($total / $itemsPerPage);

    if ($currentPage > $total_pages) {
        $currentPage = $total_pages;
        $offset = ($currentPage - 1) * $itemsPerPage;
    }

    $main_sql = "SELECT p.id, p.name, p.price, 
                    p.description, c.title AS category_name 
                FROM products p 
                    LEFT JOIN categories c ON p.category_id = c.id 
                ORDER BY p.id DESC 
                LIMIT :limit OFFSET :offset";
 
    $stmt = $conn->prepare($main_sql);
    $stmt->bindValue(":limit", $itemsPerPage, PDO::PARAM_INT);
    $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($products) == 0) {
        echo "Товары временно отсутствуют";
    } else {
        echo "<div class='container'>";
        foreach($products as $product) {
            $category = $product['category_name'] ?? "Без категории";
            echo "<div class='card'>
                <h3>{$product['name']}</h3>
                Price: <b>{$product['price']}</b><br>
                Description: <i>{$product['description']}</i>
                <h4>$category</h4>  
            </div>";
        }
        echo "</div>";
    }

    if ($currentPage > 1) {
        $prev = $currentPage - 1;
        echo "<a href='catalog.php?page=$prev'>Назад</a>";
    } else {
        echo "<a href='#' class='active'>Назад</a>";
    }
    echo "&nbsp;&nbsp;&nbsp;&nbsp;";
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($currentPage === $i) {
            echo "<a href='catalog.php?page=$i' class='active'>$i</a> ";    
        } else {
            echo "<a href='catalog.php?page=$i'>$i</a> ";
        }
    }
    echo "&nbsp;&nbsp;&nbsp;&nbsp;";
    if ($currentPage < $total_pages) {
        $next = $currentPage + 1;
        echo "<a href='catalog.php?page=$next'>Вперед</a>";
    } else {
        echo "<a href='#' class='active'>Вперед</a>";
    }
?>