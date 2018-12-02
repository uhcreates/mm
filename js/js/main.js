$(function() {
  var lastScrollTop = 0;
  var $navbar = $(".navbar");

  $(window).scroll(function(event) {
    var st = $(this).scrollTop();

    if (st > lastScrollTop) {
      $navbar.addClass("bg_color");
    } else {
      $navbar.removeClass("bg_color");
    }
  });
});

$(document).ready(function() {
  $('a[href="#search"]').on("click", function(event) {
    $("#search").addClass("open");
    $('#search > form > input[type="search"]').focus();
  });
  $("#search, #search button.close").on("click keyup", function(event) {
    if (
      event.target == this ||
      event.target.className == "close" ||
      event.keyCode == 27
    ) {
      $(this).removeClass("open");
    }
  });
});

$(document).ready(function() {
  $("#basket_link").click(function() {
    $(".panel-wrap").css("transform", "translateX(0%)");
    $(".panel").css("box-shadow", "-1px 5px 5px rgba(128, 128, 128, 0.5)");
  });
  $(".checkout_cancel_btn").click(function() {
    $(".panel-wrap").css("transform", "translateX(100%)");
    $(".panel").css("box-shadow", "none");
  });
});