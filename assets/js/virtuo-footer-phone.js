(function () {
  "use strict";

  var selector = ".virtuo-footer-phone-input";
  var nameSelector = ".virtuo-name-input, #contact-form input[name='name']";

  function cleanName(value) {
    return value
      .replace(/[^A-Za-z ]/g, "")
      .replace(/\s{2,}/g, " ")
      .replace(/^\s+/, "");
  }

  function cleanPhone(value) {
    return value.replace(/\D/g, "").slice(0, 15);
  }

  function initNameInputs() {
    document.querySelectorAll(nameSelector).forEach(function (input) {
      if (input.dataset.virtuoNameReady === "true") {
        return;
      }

      input.dataset.virtuoNameReady = "true";

      input.addEventListener("input", function () {
        var cleanedValue = cleanName(input.value);

        if (input.value !== cleanedValue) {
          input.value = cleanedValue;
        }

        input.setCustomValidity("");
      });

      var form = input.closest("form");

      if (form) {
        form.addEventListener(
          "submit",
          function (event) {
            input.value = cleanName(input.value).trim();

            if (!/^[A-Za-z][A-Za-z ]{1,79}$/.test(input.value)) {
              input.setCustomValidity("Please enter a valid name using letters only.");
              input.reportValidity();
              event.preventDefault();
              event.stopImmediatePropagation();
              return;
            }

            input.setCustomValidity("");
          },
          true,
        );
      }
    });
  }

  function getFullPhone(input, iti) {
    var rawValue = input.value.trim();
    var country = iti.getSelectedCountryData ? iti.getSelectedCountryData() : {};

    if (!rawValue) {
      return "";
    }

    if (rawValue.charAt(0) === "+") {
      return rawValue.replace(/\s+/g, " ");
    }

    var digits = cleanPhone(rawValue).replace(/^0+/, "");

    if (country && country.dialCode && digits) {
      return "+" + country.dialCode + " " + digits;
    }

    return rawValue;
  }

  function syncCountry(input, iti) {
    var form = input.closest("form");
    var countryInput = form ? form.querySelector('input[name="phone_country"]') : null;
    var country = iti.getSelectedCountryData ? iti.getSelectedCountryData() : {};

    if (countryInput && country && country.iso2) {
      countryInput.value = country.iso2.toUpperCase();
    }
  }

  function syncFullPhone(input, iti) {
    var form = input.closest("form");
    var phoneInput = form ? form.querySelector('input[type="hidden"][name="phone"]') : null;

    if (phoneInput) {
      phoneInput.value = getFullPhone(input, iti);
    }
  }

  function initFooterPhoneInputs() {
    if (typeof window.intlTelInput !== "function") {
      return;
    }

    document.querySelectorAll(selector).forEach(function (input) {
      if (input.dataset.itiReady === "true") {
        return;
      }

      var iti = window.intlTelInput(input, {
        initialCountry: "ae",
        separateDialCode: true,
        nationalMode: true,
        autoPlaceholder: "aggressive",
        preferredCountries: ["ae", "sa", "qa", "om", "kw", "bh", "in", "pk", "gb", "us"],
      });

      input.dataset.itiReady = "true";

      input.addEventListener("input", function () {
        var cleanedValue = cleanPhone(input.value);

        if (input.value !== cleanedValue) {
          input.value = cleanedValue;
        }

        syncFullPhone(input, iti);
        input.setCustomValidity("");
      });

      input.addEventListener("countrychange", function () {
        syncCountry(input, iti);
        syncFullPhone(input, iti);
      });

      var form = input.closest("form");

      if (form) {
        form.addEventListener(
          "submit",
          function (event) {
            input.value = cleanPhone(input.value);

            if (!/^[0-9]{5,15}$/.test(input.value)) {
              input.setCustomValidity("Please enter numbers only.");
              input.reportValidity();
              event.preventDefault();
              event.stopImmediatePropagation();
              return;
            }

            syncFullPhone(input, iti);

            input.setCustomValidity("");
            syncCountry(input, iti);
          },
          true,
        );
      }

      syncCountry(input, iti);
      syncFullPhone(input, iti);
    });
  }

  initNameInputs();

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", function () {
      initNameInputs();
      initFooterPhoneInputs();
    });
  } else {
    initFooterPhoneInputs();
  }
})();
