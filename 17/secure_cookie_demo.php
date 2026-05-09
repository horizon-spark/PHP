<?php 
    setcookie('auth_token', $token, [
        'secure' => true,
        'httponly' => true
    ]);

    /* 
        'secure' 
        - Куки передаются только по HTTPS (а не по HTTP)
        - Защита от перехвата куки при Man-in-the-Middle атаках

        'httponly'
        - Запрещает доступ к куки через JavaScript 
        - Защита от XSS атак (межсайтовый скриптинг)

    */
?>