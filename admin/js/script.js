$(document).ready(function () {
  $("#table_topSelling").DataTable({
    info: false,
    dom: '<"top"l><bottam>',
    pageLength: 10,
    language: {
      lengthMenu: "<div class='tableTitle'><p>Top Selling Products</p></div>",
      zeroRecords: "No records",
    },
  });

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

  $("#top-banners").hover(
    function () {
      $("#topbannerHover").css("display", "block");
    },
    function () {
      $("#topbannerHover").css("display", "none");
    }
  );

  $("#changeWebName").click(function () {
    Swal.fire({
      title: "<small>Change website name / title</small>",
      icon: "warning",
      input: "text",
      inputAttributes: {
        autocapitalize: "off",
      },
      showCancelButton: true,
      confirmButtonText: "Change",
      showLoaderOnConfirm: true,
      preConfirm: (login) => {
        $.post("./changeWebName.php", { name: login }, function (res) {
          const response = JSON.parse(res);
          if (response.results !== "success") {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: "Change web name failed",
            });
            throw new Error("Failed change name");
          } else {
            Swal.fire({
              title: "Success",
              icon: "success",
              confirmButtonColor: "#3085d6",
              confirmButtonText: "OK",
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.reload();
              }
            });
          }
        }).catch((error) => {
          Swal.showValidationMessage(`Request failed: ${error}`);
        });
      },
      allowOutsideClick: () => !Swal.isLoading(),
    });
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
      // append slides to end
      if (e.direction == "left") {
        $(".carousel-item").eq(i).appendTo(".carousel-inner");
      } else {
        $(".carousel-item").eq(0).appendTo(".carousel-inner");
      }
    }
  }
});
