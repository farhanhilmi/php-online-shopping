$(document).ready(function () {
  const ReadData = () => {
    const data = "products/data_products.php";
    $("#contentData").load(data);
  };
  ReadData();

  $(document).on("click", "#addBtn", function (e) {
    $("#modalDialog").modal("show");
    $.post("products/form_add.php", function (html) {
      $("#modalContent").html(html);
    });
  });

  $("#modalDialog").on("submit", "#formAdd", function (e) {
    e.preventDefault();

    const dataform = new FormData(jQuery("form")[0]);
    jQuery.each(jQuery("#customFile")[0].files, function (i, file) {
      dataform.append("file-" + i, file);
    });

    $.ajax({
      url: "products/product_service.php?act=save",
      method: "POST",
      data: dataform,
      contentType: false,
      processData: false,
      cache: false,

      success: function (results) {
        const result = JSON.parse(results);
        if (result.results !== "success") {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Add Product Failed!",
          });
        } else {
          $("#name").val("");
          $("#id_category").val("");
          $("#price").val("");
          $("#qty").val("");
          $("#description").val("");
          $("#customFile").val("");
          $(".custom-file-label").text("Choose File");
          $("#modalDialog").modal("hide");
          ReadData();
          Swal.fire({
            icon: "success",
            title: "Success",
            text: "Add Product Success!",
          });
        }
      },
    });
  });

  $(document).on("click", "#EditButton", function (e) {
    e.preventDefault();
    $("#modalDialog").modal("show");
    $.post(
      "products/form_edit.php",
      { id: $(this).attr("data-id") },
      function (html) {
        $("#modalContent").html(html);
      }
    );
  });

  $("#modalDialog").on("submit", "#formEdit", function (e) {
    e.preventDefault();
    const dataform = new FormData(jQuery("form")[0]);
    jQuery.each(jQuery("#customFile")[0].files, function (i, file) {
      dataform.append("file-" + i, file);
    });

    $.ajax({
      url: "products/product_service.php?act=update",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      processData: false,
      cache: false,

      success: function (results) {
        const result = JSON.parse(results);
        if (result.results !== "success") {
          alert("UPDATE: ", result);
        } else {
          $("#name").val("");
          $("#id_category").val("");
          $("#price").val("");
          $("#qty").val("");
          $("#description").val("");
          $("#customFile").val("");
          $("#modalDialog").modal("hide");
          ReadData();
          Swal.fire({
            icon: "success",
            title: "Success",
            text: "Update Product Success!",
          });
        }
      },
    });
  });

  $(document).on("click", "#DeleteButton", function (e) {
    e.preventDefault();
    $("#modalDialog").modal("show");
    $.post(
      "products/form_delete.php",
      { id: $(this).attr("data-id") },
      function (html) {
        $("#modalContent").html(html);
      }
    );
  });

  $(document).on("click", "#btnDelete", function (e) {
    e.preventDefault();
    $.post(
      "products/product_service.php?act=delete",
      { id: $("#id_ProductDelete").val(), delete: true },
      function () {
        $("#modalDialog").modal("hide");
        ReadData();
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Delete Product Success!",
        });
      }
    );
  });
});
