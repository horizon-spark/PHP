<!doctype html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Интернет-магазин электроники</title>

    <!-- Bootstrap 5 CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Bootstrap Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css"
    />

    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <!-- Навигация -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          <i class="bi bi-shop"></i> TechStore
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" href="#">Главная</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Каталог</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="bi bi-cart"></i> Корзина
                <span class="badge bg-primary cart-count">0</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Герой-секция -->
    <div class="bg-gradient-primary text-white py-5 mb-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h1 class="display-4 fw-bold">Лучшая электроника</h1>
            <p class="lead">Только проверенные бренды и лучшее качество</p>
            <button class="btn btn-light btn-lg">Смотреть каталог</button>
          </div>
          <div class="col-md-4 text-center">
            <i class="bi bi-laptop display-1"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Контейнер с карточками товаров -->
    <div class="container mb-5">
      <h2 class="text-center mb-4">🔥 Популярные товары</h2>
      <div class="row" id="products-container">
        <!-- PHP генерирует карточки здесь -->
        <?php include 'products.php'; ?> <?php foreach ($products as $product):
        ?> <?php echo renderProductCard($product); ?> <?php endforeach; ?>
      </div>
    </div>

    <!-- Modal для QuickView -->
    <div
      class="modal fade"
      id="quickViewModal"
      tabindex="-1"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">
              <i class="bi bi-eye"></i> Быстрый просмотр товара
            </h5>
            <button
              type="button"
              class="btn-close btn-close-white"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6 text-center">
                <img
                  id="quickViewImage"
                  src=""
                  alt="Product"
                  class="img-fluid rounded mb-3"
                  style="max-height: 300px"
                />
              </div>
              <div class="col-md-6">
                <h3 id="quickViewName" class="mb-3"></h3>
                <div class="mb-3">
                  <span class="h2 text-primary" id="quickViewPrice"></span>
                </div>
                <p id="quickViewDescription" class="text-muted"></p>
                <hr />
                <h5>Характеристики:</h5>
                <ul id="quickViewCharacteristics" class="list-unstyled"></ul>
                <div class="mt-4">
                  <button class="btn btn-primary w-100" id="addToCartFromModal">
                    <i class="bi bi-cart-plus"></i> Добавить в корзину
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Уведомления -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
      <div
        id="notificationToast"
        class="toast"
        role="alert"
        aria-live="assertive"
        aria-atomic="true"
      >
        <div class="toast-header bg-success text-white">
          <strong class="me-auto"
            ><i class="bi bi-check-circle"></i> Успешно</strong
          >
          <button
            type="button"
            class="btn-close btn-close-white"
            data-bs-dismiss="toast"
          ></button>
        </div>
        <div class="toast-body">Товар добавлен в корзину!</div>
      </div>
    </div>

    <!-- Bootstrap JS и зависимости -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery (опционально, для демонстрации) -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- Плагин QuickView -->
    <script src="quickview.js"></script>

    <script>
      // Инициализация поповеров
      document
        .querySelectorAll('[data-bs-toggle="popover"]')
        .forEach((popover) => {
          new bootstrap.Popover(popover);
        });

      // Инициализация QuickView плагина
      $(document).ready(function () {
        $(".quick-view-btn").quickView({
          modalId: "#quickViewModal",
          imageElement: "#quickViewImage",
          nameElement: "#quickViewName",
          priceElement: "#quickViewPrice",
          descriptionElement: "#quickViewDescription",
          characteristicsElement: "#quickViewCharacteristics",
          onAddToCart: function (productData) {
            // Кастомная логика при добавлении в корзину
            showNotification(`${productData.name} добавлен в корзину!`);
            updateCartCount();
          },
        });
      });

      // Функция показа уведомления
      function showNotification(message) {
        const toastElement = document.getElementById("notificationToast");
        const toastBody = toastElement.querySelector(".toast-body");
        toastBody.textContent = message;
        const toast = new bootstrap.Toast(toastElement, {
          delay: 2000,
          autohide: true,
        });
        toast.show();
      }

      // Функция обновления счетчика корзины
      let cartItemsCount = 0;
      function updateCartCount() {
        cartItemsCount++;
        document.querySelector(".cart-count").textContent = cartItemsCount;
      }

      // Обработчики для обычных кнопок "В корзину"
      document.querySelectorAll(".add-to-cart").forEach((btn) => {
        btn.addEventListener("click", function () {
          const card = this.closest(".product-card");
          const productName = card.querySelector(".card-title").textContent;
          showNotification(`${productName} добавлен в корзину!`);
          updateCartCount();
        });
      });
    </script>
  </body>
</html>
