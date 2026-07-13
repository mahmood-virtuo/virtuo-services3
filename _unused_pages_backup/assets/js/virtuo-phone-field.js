(function () {
  "use strict";

  document
    .querySelectorAll("[data-virtuo-phone]")
    .forEach(function (phoneField) {
      const toggle = phoneField.querySelector(".virtuo-phone-field__selected");
      const flag = phoneField.querySelector(".virtuo-phone-field__flag");
      const code = phoneField.querySelector(".virtuo-phone-field__code");
      const phoneInput = phoneField.querySelector('input[type="tel"]');
      const search = phoneField.querySelector(
        ".virtuo-phone-field__search input",
      );
      const options = Array.from(
        phoneField.querySelectorAll(".virtuo-phone-field__list button"),
      );
      const form = phoneField.closest("form");

      if (
        !toggle ||
        !flag ||
        !code ||
        !phoneInput ||
        !search ||
        !options.length ||
        !form
      ) {
        return;
      }

      const fullPhone = form.querySelector('input[name="phone"]');
      const countryInput = form.querySelector('input[name="phone_country"]');

      function syncPhone() {
        const number = phoneInput.value.trim();
        const dialCode = code.textContent.trim();
        const value = number
          ? `${dialCode}${number.replace(/^0+/, "")}`
          : dialCode;

        phoneInput.dataset.fullPhone = value;

        if (fullPhone) {
          fullPhone.value = value;
        }
      }

      function closePanel() {
        phoneField.classList.remove("is-open");
        toggle.setAttribute("aria-expanded", "false");
      }

      toggle.addEventListener("click", function () {
        const isOpen = phoneField.classList.toggle("is-open");
        toggle.setAttribute("aria-expanded", String(isOpen));

        if (isOpen) {
          search.focus();
        }
      });

      options.forEach(function (option) {
        option.addEventListener("click", function () {
          options.forEach(function (item) {
            item.removeAttribute("aria-current");
          });

          option.setAttribute("aria-current", "true");
          flag.textContent = option.dataset.flag || "";
          code.textContent = option.dataset.code || "";

          if (countryInput) {
            countryInput.value = option.dataset.country || "";
          }

          toggle.setAttribute(
            "aria-label",
            `Change country for phone number, currently selected ${option.textContent.trim()}`,
          );

          syncPhone();
          closePanel();
        });
      });

      search.addEventListener("input", function () {
        const term = search.value.trim().toLowerCase();

        options.forEach(function (option) {
          const item = option.closest("li");

          if (item) {
            item.style.display = option.textContent.toLowerCase().includes(term)
              ? ""
              : "none";
          }
        });
      });

      phoneInput.addEventListener("input", syncPhone);

      document.addEventListener("click", function (event) {
        if (!phoneField.contains(event.target)) {
          closePanel();
        }
      });

      syncPhone();
    });
})();
