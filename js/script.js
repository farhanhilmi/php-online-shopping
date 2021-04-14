$(document).ready(function () {
  const heightNavbar = $("#navbar").height();
  $("main").css("margin-top", `${heightNavbar + 70}px`);

  $(window).scroll(function () {
    var y = $(window).scrollTop();
    if (y > 0) {
      $("#top-shadow").css({ display: "block", opacity: y / 20 });
    } else {
      $("#top-shadow").css({ display: "block", opacity: y / 20 });
    }
  });

  $("#carousel-example div:nth-child(2)").addClass("active");

  $(".minus").click(function () {
    var $input = $(this).parent().find("input");
    var count = parseInt($input.val()) - 1;
    count = count < 1 ? 1 : count;
    $input.val(count);
    $input.change();
    return false;
  });
  $(".plus").click(function () {
    var $input = $(this).parent().find("input");
    $input.val(parseInt($input.val()) + 1);
    $input.change();
    return false;
  });
});

/*
    Carousel
*/
$("#carousel-example").on("slide.bs.carousel", function (e) {
  var $e = $(e.relatedTarget);
  var idx = $e.index();
  var itemsPerSlide = 5;
  var totalItems = $(".carousel-item").length;

  if (idx >= totalItems - (itemsPerSlide - 1)) {
    var it = itemsPerSlide - (totalItems - idx);
    for (var i = 0; i < it; i++) {
      if (e.direction == "left") {
        $(".carousel-item").eq(i).appendTo(".carousel-inner");
      } else {
        $(".carousel-item").eq(0).appendTo(".carousel-inner");
      }
    }
  }
});
