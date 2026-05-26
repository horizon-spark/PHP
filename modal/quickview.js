/**
 * QuickView Plugin for Bootstrap 5
 * Плагин для быстрого просмотра товаров в модальном окне
 */
(function ($) {
  "use strict";

  // Конструктор плагина
  const QuickView = function (element, options) {
    this.$element = $(element);
    this.options = $.extend({}, QuickView.defaults, options);
    this.init();
  };

  // Настройки по умолчанию
  QuickView.defaults = {
    modalId: "#quickViewModal",
    imageElement: "#quickViewImage",
    nameElement: "#quickViewName",
    priceElement: "#quickViewPrice",
    descriptionElement: "#quickViewDescription",
    characteristicsElement: "#quickViewCharacteristics",
    onOpen: null,
    onClose: null,
    onAddToCart: null,
  };

  // Методы плагина
  QuickView.prototype = {
    init: function () {
      this.$modal = $(this.options.modalId);
      this.modalInstance = new bootstrap.Modal(this.$modal[0]);
      this.bindEvents();
    },

    bindEvents: function () {
      this.$element.on("click", (e) => {
        e.preventDefault();
        this.open();
      });

      // Обработчик для кнопки "Добавить в корзину" внутри модального окна
      this.$modal.on("click", "#addToCartFromModal", () => {
        if (
          this.currentProduct &&
          typeof this.options.onAddToCart === "function"
        ) {
          this.options.onAddToCart(this.currentProduct);
        }
        this.close();
      });

      // Обработчик закрытия модального окна
      this.$modal.on("hidden.bs.modal", () => {
        if (typeof this.options.onClose === "function") {
          this.options.onClose(this.currentProduct);
        }
      });
    },

    open: function () {
      // Получаем данные товара из data-атрибутов кнопки
      const productData = {
        name: this.$element.data("product-name"),
        price: this.$element.data("product-price"),
        image: this.$element.data("product-image"),
        description: this.$element.data("product-description"),
        characteristics: this.$element.data("product-characteristics"),
      };

      this.currentProduct = productData;
      this.updateModalContent(productData);
      this.modalInstance.show();

      if (typeof this.options.onOpen === "function") {
        this.options.onOpen(productData);
      }
    },

    close: function () {
      this.modalInstance.hide();
    },

    updateModalContent: function (productData) {
      // Обновляем изображение
      $(this.options.imageElement).attr("src", productData.image);
      $(this.options.imageElement).attr("alt", productData.name);

      // Обновляем название
      $(this.options.nameElement).text(productData.name);

      // Обновляем цену (форматируем)
      const formattedPrice = new Intl.NumberFormat("ru-RU", {
        style: "currency",
        currency: "RUB",
        minimumFractionDigits: 0,
      }).format(productData.price);
      $(this.options.priceElement).text(formattedPrice);

      // Обновляем описание
      if (productData.description) {
        $(this.options.descriptionElement).text(productData.description);
      } else {
        $(this.options.descriptionElement).text("Описание отсутствует");
      }

      // Обновляем характеристики
      const $characteristicsList = $(this.options.characteristicsElement);
      $characteristicsList.empty();

      if (
        productData.characteristics &&
        typeof productData.characteristics === "object"
      ) {
        for (const [key, value] of Object.entries(
          productData.characteristics,
        )) {
          $characteristicsList.append(`
                        <li class="mb-2">
                            <i class="bi bi-check-circle-fill text-primary me-2" style="font-size: 0.8rem;"></i>
                            <strong>${this.escapeHtml(key)}:</strong> ${this.escapeHtml(value)}
                        </li>
                    `);
        }
      } else {
        $characteristicsList.html(
          '<li class="text-muted">Характеристики не указаны</li>',
        );
      }
    },

    escapeHtml: function (text) {
      if (!text) return "";
      const div = document.createElement("div");
      div.textContent = text;
      return div.innerHTML;
    },
  };

  // jQuery плагин
  $.fn.quickView = function (options) {
    return this.each(function () {
      const $this = $(this);
      let instance = $this.data("quickView");

      if (!instance) {
        instance = new QuickView(this, options);
        $this.data("quickView", instance);
      }

      if (typeof options === "string" && instance[options]) {
        instance[options]();
      }
    });
  };
})(jQuery);
