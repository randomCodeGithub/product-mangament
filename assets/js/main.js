"use strict";
$(function () {
  // type switcher
  $("#type").on("change", function () {
    $(".type-filter").css({ display: "none" });
    $("." + $(this).val()).css({ display: "flex" });
  });

  //   add produc page error close
  $("#close").click(function () {
    $(this).parent().hide();
  });
});
