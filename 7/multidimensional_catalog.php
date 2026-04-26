<?php 
    $book1 = [
        "title" => "War and peace",
        "author" => "Leo Tolstoy",
        "year" => 2010,
        "price" => 400
    ];
    $book2 = [
        "title" => "1984",
        "author" => "George Orwell",
        "year" => 2014,
        "price" => 500
    ];
    $book3 = [
        "title" => "Crime and Punishment",
        "author" => "Fyodor Dostoevsky",
        "year" => 2009,
        "price" => 400
    ];
    $book4 = [
        "title" => "Lord of the flies",
        "author" => "William Golding",
        "year" => 2008,
        "price" => 500
    ];

    $books = [$book1, $book2, $book3, $book4, $book5];

    echo "<table>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Price</th>
            </tr>";

    foreach ($books as $book) {
        echo "<tr>
                <td>{$book['title']}</td>
                <td>{$book['author']}</td>
                <td>{$book['year']}</td>
                <td>{$book['price']}</td>
            </tr>";
    }

    echo "</table>";
?>