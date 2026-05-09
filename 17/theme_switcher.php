<?php 
    if ($_GET['theme']) {
        $theme = $_GET['theme'];

        setcookie('theme', $theme, time() + 3600 * 24 * 30);

        header('Location: theme_switcher.php');
    }

    $theme = 'light';

    if ($_COOKIE['theme']) {
        $theme = $_COOKIE['theme'] === 'dark' ? 'dark' : 'light';
    }

    $background = $theme === 'light' ? 'beige' : 'grey';
    $font_color = $theme === 'light' ? 'black' : 'white';

    echo "<style>
            body {
                color: $font_color;
                background-color: $background;
            }
            a {
                text-decoration: none;
            }
        </style>";
    
    $theme_rus = $theme === 'light' ? 'Светлая' : 'Темная';
    echo "<p>Сейчас применена $theme_rus тема</p>
        <a href='theme_switcher.php?theme=light'>Светлая тема</a>
        <a href='theme_switcher.php?theme=dark'>Темная тема</a>";
?>