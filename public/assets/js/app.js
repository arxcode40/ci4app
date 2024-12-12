"use strict";

function numberFormat() {
  $(event.target).val(function(index, number) {
    number = number.replace(/\D+/g, "");
    if (number === "") return 0;

    number = BigInt(number.replace(/\.+/g, ""));
    number = new Intl.NumberFormat("id-ID").format(BigInt(number));
    return number;
  })
}

$(document).on("scroll", function() {
  if ($(document).scrollTop() > 20) {
    $("#scrollToTop").show();
  } else {
    $("#scrollToTop").hide();
  }
});
