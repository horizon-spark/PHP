<?php
// Массив с данными товаров
$products = [
    [
        'id' => 1,
        'name' => 'Смартфон XYZ Pro Max',
        'price' => 49990,
        'rating' => 4.7,
        'image' => 'https://via.placeholder.com/300x300?text=Phone+Pro+Max',
        'characteristics' => [
            'Экран' => '6.7" AMOLED, 120Hz',
            'Процессор' => 'Snapdragon 8 Gen 2',
            'Память' => '12/256GB',
            'Камера' => '108MP + 12MP + 8MP',
            'Батарея' => '5000mAh'
        ],
        'description' => 'Флагманский смартфон с лучшей камерой и производительностью'
    ],
    [
        'id' => 2,
        'name' => 'Ноутбук UltraBook Air',
        'price' => 89990,
        'rating' => 4.8,
        'image' => 'https://via.placeholder.com/300x300?text=UltraBook+Air',
        'characteristics' => [
            'Процессор' => 'Intel Core i7-1360P',
            'ОЗУ' => '16GB DDR5',
            'SSD' => '1TB NVMe',
            'Экран' => '14" 2.8K OLED',
            'Вес' => '1.2 кг'
        ],
        'description' => 'Мощный и легкий ноутбук для работы и творчества'
    ],
    [
        'id' => 3,
        'name' => 'Беспроводные наушники SoundPro X',
        'price' => 12990,
        'rating' => 4.6,
        'image' => 'https://via.placeholder.com/300x300?text=Headphones+X',
        'characteristics' => [
            'Тип' => 'Полноразмерные',
            'Шумоподавление' => 'Активное (ANC)',
            'Время работы' => '40 часов',
            'Bluetooth' => '5.3',
            'Кодеки' => 'aptX, AAC'
        ],
        'description' => 'Отличный звук и мощное шумоподавление'
    ],
    [
        'id' => 4,
        'name' => 'Умные часы Watch Elite 5',
        'price' => 19990,
        'rating' => 4.5,
        'image' => 'https://via.placeholder.com/300x300?text=Watch+Elite+5',
        'characteristics' => [
            'Экран' => '1.5" AMOLED',
            'Датчики' => 'Пульс, SpO2, ECG',
            'GPS' => 'Встроенный',
            'Водозащита' => '5 ATM',
            'Батарея' => '7 дней'
        ],
        'description' => 'Стильные умные часы с полным набором датчиков'
    ],
    [
        'id' => 5,
        'name' => 'Игровая мышь AeroGamer',
        'price' => 5490,
        'rating' => 4.9,
        'image' => 'https://via.placeholder.com/300x300?text=Gaming+Mouse',
        'characteristics' => [
            'Датчик' => 'Optical 26000 DPI',
            'Кнопки' => '8 программируемых',
            'Подсветка' => 'RGB',
            'Вес' => '69g',
            'Интерфейс' => 'USB-C/беспроводной'
        ],
        'description' => 'Ультралегкая игровая мышь для киберспорта'
    ],
    [
        'id' => 6,
        'name' => 'Клавиатура MechPro RGB',
        'price' => 8990,
        'rating' => 4.7,
        'image' => 'https://via.placeholder.com/300x300?text=Mech+Keyboard',
        'characteristics' => [
            'Тип' => 'Механическая',
            'Переключатели' => 'Cherry MX Red',
            'Подсветка' => 'RGB, 16.8M цветов',
            'Раскладка' => 'ANSI, 104 клавиши',
            'Анти-гостинг' => 'Полный NKRO'
        ],
        'description' => 'Механическая клавиатура с тактильными переключателями'
    ]
];

// Функция для генерации рейтинга звездочками
function renderRating($rating) {
    $fullStars = floor($rating);
    $halfStar = ($rating - $fullStars) >= 0.5;
    $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
    
    $stars = '';
    for ($i = 0; $i < $fullStars; $i++) {
        $stars .= '★';
    }
    if ($halfStar) {
        $stars .= '½';
    }
    for ($i = 0; $i < $emptyStars; $i++) {
        $stars .= '☆';
    }
    return $stars;
}

// Функция для генерации карточки товара
function renderProductCard($product) {
    $characteristicsJson = json_encode($product['characteristics']);
    $ratingStars = renderRating($product['rating']);
    
    return '
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card h-100 product-card" data-product-id="' . $product['id'] . '">
            <img src="' . $product['image'] . '" class="card-img-top" alt="' . $product['name'] . '">
            <div class="card-body d-flex flex-column">
                <div class="mb-2">
                    <span class="text-warning">' . $ratingStars . '</span>
                    <span class="text-muted ms-2">(' . $product['rating'] . ')</span>
                </div>
                <h5 class="card-title">' . $product['name'] . '</h5>
                <p class="card-text text-muted small">' . $product['description'] . '</p>
                
                <!-- Характеристики в data-атрибутах для popover -->
                <div class="product-characteristics d-none" 
                     data-bs-toggle="popover" 
                     data-bs-placement="top" 
                     data-bs-html="true" 
                     data-bs-trigger="hover"
                     data-bs-content="' . htmlspecialchars(renderCharacteristicsPopover($product['characteristics'])) . '">
                </div>
                
                <div class="mt-auto">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="h4 text-primary mb-0">' . number_format($product['price'], 0, '', ' ') . ' ₽</span>
                        <button class="btn btn-outline-secondary quick-view-btn" 
                                data-product-name="' . htmlspecialchars($product['name']) . '"
                                data-product-price="' . $product['price'] . '"
                                data-product-image="' . $product['image'] . '"
                                data-product-description="' . htmlspecialchars($product['description']) . '"
                                data-product-characteristics=\'' . $characteristicsJson . '\'>
                            <i class="bi bi-eye"></i> Быстрый просмотр
                        </button>
                    </div>
                    <button class="btn btn-primary w-100 add-to-cart">
                        <i class="bi bi-cart-plus"></i> В корзину
                    </button>
                </div>
            </div>
        </div>
    </div>';
}

// Функция для генерации содержимого поповера
function renderCharacteristicsPopover($characteristics) {
    $html = '<div class="popover-characteristics"><strong>Характеристики:</strong><br>';
    foreach ($characteristics as $key => $value) {
        $html .= '<small>• ' . $key . ': ' . $value . '</small><br>';
    }
    $html .= '</div>';
    return $html;
}
?>