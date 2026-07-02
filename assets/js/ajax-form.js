$(function () {
  // Set up an event listener for website forms.
  $("#contact-form, #footer-quote-form, form[action='/assets/mail.php']").submit(function (e) {
    // Stop the browser from submitting the form.
    e.preventDefault();

    var form = $(this);
    var formMessages = form.find(".ajax-response");

    if (!formMessages.length) {
      formMessages = form.closest(".contact__form-wrap, .footer-reference-form-panel").find(".ajax-response").first();
    }

    // Serialize the form data.
    var formData = form.serialize();

    // Submit the form using AJAX.
    $.ajax({
      type: "POST",
      url: form.attr("action"),
      data: formData,
    })
      .done(function (response) {
        // Make sure that the formMessages div has the 'success' class.
        formMessages.removeClass("error");
        formMessages.addClass("success");

        // Set the message text.
        formMessages.text(response);

        // Clear the form.
        form.find("input:not([type='hidden']), textarea").val("");
        form.find("select").prop("selectedIndex", 0);
      })
      .fail(function (data) {
        // Make sure that the formMessages div has the 'error' class.
        formMessages.removeClass("success");
        formMessages.addClass("error");

        // Set the message text.
        if (data.responseText !== "") {
          formMessages.text(data.responseText);
        } else {
          formMessages.text(
            "Oops! An error occured and your message could not be sent.",
          );
        }
      });
  });
});
