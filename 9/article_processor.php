<?php 
    echo "<style>
            p {
                text-indent: 1.5em;
                margin-bottom: 10px;
            }
            .stats {
                border: 1px solid black;
                text-align: center;
                background-color: beige;
            }
        </style>";

    $articleText = "«Артемида-2» (англ Artemis II) — миссия по пилотируемому облёту Луны в 
    рамках программы НАСА «Артемида». Это первая пилотируемая экспедиция 
    космического корабля «Орион», запущенного при помощи сверхтяжёлой 
    ракеты-носителя Space Launch System (SLS), и первый с декабря 1972 года 
    («Аполлон-17») полёт людей за пределы низкой околоземной орбиты. Запуск 
    миссии состоялся 1 апреля 2026 года в 22:35 UTC. В состав экипажа 
    миссии вошли три американских астронавта Рид Уайсмен, Виктор Гловер, 
    Кристина Кук и канадский астронавт Джереми Хансен.
    Целью миссии являлось испытание систем корабля «Орион» перед 
    запланированной на 2028 год миссией «Артемида-4» с высадкой человека 
    на Луну.";

    $sentences = array_filter(explode('.', $articleText));

    foreach ($sentences as $sentence) {
        echo "<p>$sentence</p>";
    }

    $symbolsWithSpaces = strlen($articleText);
    $symbolsWithoutSpaces = strlen(str_replace(' ', '', $articleText));
    // $words = str_word_count($articleText);
    $words = count(explode(' ', $articleText));

    echo "<div class='stats'>
            <p>Количество символов (включая пробелы): <b>$symbolsWithSpaces</b></p>
            <p>Количество символов (исключая пробелы): <b>$symbolsWithoutSpaces</b></p>
            <p>Количество слов: <b>$words</b></p>
        </div>";

    $publishDate = date('d.m.Y H:i:s');
    $anotherDate = date('d F Y');

    echo "<p>Статья опубликована: <i>$publishDate ($anotherDate)</i></p>";

    $keyWords = ['Космос', 'Полет на луну', 'Артемида-2'];
    echo '<p>Ключевые слова: ' . implode(', ', $keyWords) . '<p>';
?>