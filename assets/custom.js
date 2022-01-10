(function ($) {
  $("#product_type").change(function (e) {
    if ("downloadable" === e.target.value) {
      $("#is_downloadable").prop("checked", true);
      $("input#is_downloadable").hide();
      $("input#is_downloadable + p").hide();
    } else if ("consulting" === e.target.value) {
      $("#is_downloadable").prop("checked", false);
      $("input#is_downloadable").hide();
      $("input#is_downloadable + p").hide();
    } else if ("consulting" === e.target.value) {
      $("#is_downloadable").prop("checked", false);
      $("input#is_downloadable").hide();
      $("input#is_downloadable + p").hide();
    } else if ("mentoring" === e.target.value) {
      $("#is_downloadable").prop("checked", false);
      $("input#is_downloadable").hide();
      $("input#is_downloadable + p").hide();
    } else {
      $("#is_downloadable").prop("checked", false);
      $("input#is_downloadable").show();
      $("input#is_downloadable + p").show();
    }
  });
})(jQuery);
