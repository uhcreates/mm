$(function() {
  var lastScrollTop = 0;
  var $navbar = $(".navbar");

  $(window).scroll(function(event) {
    var st = $(this).scrollTop();

    if (st > lastScrollTop) {
      // $navbar.animate({"height": "50px","max-height":"50px"},20);

      $navbar.addClass("bg_color");

    } else {
      // $navbar.animate({"height": "80px","max-height":"80px"},50);

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

// brand Change
$(function(){
   $(window).scroll(function(){
     if($(this).scrollTop()>10){
      $("#collapsibleNavbar a img").attr("src","images/8.png");
    }
    else {
      $("#collapsibleNavbar a img").attr("src","images/default.png");    
    }
    })
});


function myVisible() {
  var x = document.getElementById("c_pass_confirm");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}





