$(document).ready(function () {
  $("#table_categories").DataTable({
    info: false,
    dom: '<"top"fls><bottam>p',
    pageLength: 10,
    sDom:
      '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
    language: {
      lengthMenu:
        "<div class='tableTitle'><p>List of Product Categories</p></div>",
      search: "_INPUT_",
      searchPlaceholder: "Search...",
      zeroRecords: "No records",
    },
  });

  $("#table_banners").DataTable({
    info: false,
    dom: '<"top"fls><bottam>p',
    pageLength: 10,
    sDom:
      '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
    language: {
      lengthMenu: "Display _MENU_ records",
      search: "_INPUT_",
      searchPlaceholder: "Search...",
      zeroRecords: "No records",
    },
  });

  $("#table_products").DataTable({
    info: false,
    dom: '<"top"fls><bottam>p',
    pageLength: 10,
    sDom:
      '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
    language: {
      lengthMenu: "Display _MENU_ records",
      search: "_INPUT_",
      searchPlaceholder: "Search...",
      zeroRecords: "No records",
    },
  });

  const tableHeight = $(".table").height();
  $("main").css("min-height", `calc(${tableHeight}px + 7rem)`);

  document
    .querySelector(".custom-file-input")
    .addEventListener("change", function (e) {
      var fileName = document.getElementById("customFile").files[0].name;
      var nextSibling = e.target.nextElementSibling;
      nextSibling.innerText = fileName;
    });
});
