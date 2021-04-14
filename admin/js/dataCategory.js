$(document).ready(function () {
  const ReadData = () => {
    const data = "data_categories.php";
    $("#contentData").load(data);
  };
  ReadData();

  $("#formAdd").submit(function (e) {
    e.preventDefault();
    // const dataform = $("#formAdd").serialize();

    const dataform = new FormData(jQuery("form")[0]);
    jQuery.each(jQuery("#customFile")[0].files, function (i, file) {
      dataform.append("file-" + i, file);
    });

    $.ajax({
      url: "categories_service.php?act=save",
      method: "POST",
      data: dataform,
      contentType: false,
      processData: false,
      cache: false,

      success: function (results) {
        console.log(results);
        const result = JSON.parse(results);
        if (result.results !== "success") {
          // alert(result);
        } else {
          $("#name").val("");
          $("#customFile").val("");
          $(".custom-file-label").text("Choose File");
          ReadData();
          Swal.fire({
            icon: "success",
            title: "Success",
            text: "Add Category Success!",
          });
        }
      },
    });
  });

  $(document).on("click", "#EditButton", function (e) {
    e.preventDefault();
    $("#modalDialog").modal("show");
    $.post("form_edit.php", { id: $(this).attr("data-id") }, function (html) {
      $("#modalContent").html(html);
    });
  });

  $("#modalDialog").on("submit", "form", function (e) {
    e.preventDefault();
    const dataform = new FormData(jQuery("form")[0]);
    jQuery.each(jQuery("#customFile")[0].files, function (i, file) {
      dataform.append("file-" + i, file);
    });

    $.ajax({
      url: "categories_service.php?act=update",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      processData: false,
      cache: false,

      success: function (results) {
        console.log(results);
        const result = JSON.parse(results);
        if (result.results !== "success") {
          alert("UPDATE: ", result);
        } else {
          $("#modalDialog").modal("hide");
          ReadData();
          Swal.fire({
            icon: "success",
            title: "Success",
            text: "Update Category Success!",
          });
        }
      },
    });
  });

  $(document).on("click", "#DeleteButton", function (e) {
    e.preventDefault();
    $("#modalDialog").modal("show");
    $.post("form_delete.php", { id: $(this).attr("data-id") }, function (html) {
      $("#modalContent").html(html);
    });
  });

  $(document).on("click", "#btnDelete", function (e) {
    e.preventDefault();
    $.post(
      "categories_service.php?act=delete",
      { id: $("#id_categoryDelete").val(), delete: true },
      function () {
        $("#modalDialog").modal("hide");
        ReadData();
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Delete Category Success!",
        });
      }
    );
  });
});
