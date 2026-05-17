"use strict";

const deleteLinks = document.querySelectorAll(".deleteLink");

deleteLinks.forEach((link) =>
  link.addEventListener("click", (e) => {
    let isConfirmed = confirm(
      "Вы уверены, что хотите удалить этот товар? Действие нельзя отменить.",
    );

    if (!isConfirmed) {
      e.preventDefault();
    }
  }),
);
