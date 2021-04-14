<?php
require_once('../../config.php');
if (isset($_GET['act'])) {
  if ($_GET['act'] == 'delete') {
    $query = "DELETE FROM tbl_products WHERE id_product = '$_POST[id]'";
    $IMG = mysqli_query($koneksi, "SELECT img FROM tbl_products WHERE id_product = '$_POST[id]'");
    mysqli_query($koneksi, $query);
    $row = mysqli_fetch_array($IMG);
    $file_to_delete = '../../assets/img/products/' . $row['img'];
    unlink($file_to_delete);
  } else if ($_GET['act'] == 'save') {
    $randDate = date("dmHis");
    $id_product = 'PRD' . $randDate;
    $created_at = date("Y-m-d H-i-s");

    $name = $_POST['name'];
    $id_category = $_POST['id_category'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $description = $_POST['description'];

    $rand = date("dmYHis");
    $extension =  array('jpg', 'png', 'jpeg');
    $filename = $_FILES['img']['name'];
    $size = $_FILES['img']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $extension)) {
      echo "
    <script>
      alert('Pastika format file sudah benar');
    </script>";
    } else {
      if ($size < 1044070000) {
        $img = $rand . '_' . $filename;
        move_uploaded_file($_FILES['img']['tmp_name'], '../../assets/img/products/' . $img);
        $query = mysqli_query($koneksi, "INSERT INTO tbl_products(id_product,id_category, img, name, price, qty, description, created_at) VALUES('$id_product','$id_category', '$img','$name','$price','$qty','$description', '$created_at')");

        if ($query) {
          $data['results'] = 'success';
        } else {
          $data['results'] = 'failed';
        }
        mysqli_close($koneksi);
        if (mysqli_connect_errno()) {
          echo json_encode(mysqli_connect_error());
        } else {
          echo json_encode($data);
        }
      } else {
        echo "
        <script>
          alert('FAILED');
        </script>";
      }
    }
  } else if (($_GET['act'] == 'update')) {
    $rand = date("dmYHis");
    $extension =  array('jpg', 'png', 'jpeg');
    $filename = $_FILES['img']['name'];
    $size = $_FILES['img']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    $id_product = $_POST['id_product'];
    $name = $_POST['name'];
    $id_category = $_POST['id_category'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $description = $_POST['description'];

    if ($_FILES['img']['name'] == "") {
      $sql = ("UPDATE tbl_products SET id_category = '$id_category', name = '$name',price = '$price',qty = '$qty',description = '$description' WHERE id_product = '$id_product'");

      if (mysqli_query($koneksi, $sql)) {
        $data['results'] = 'success';
      } else {
        $data['results'] = 'failed';
      }
      echo json_encode($data);
    } else if (!in_array($ext, $extension)) {
      echo "
    <script>
      alert('Pastika format file sudah benar');
    </script>";
    } else {

      if ($size < 1044070000) {

        $img = $rand . '_' . $filename;
        move_uploaded_file($_FILES['img']['tmp_name'], '../../assets/img/products/' . $img);
        $sql = ("UPDATE tbl_products SET id_category = '$id_category', name = '$name',price = '$price',qty = '$qty',description = '$description', img = '$img' WHERE id_product = '$id_product'");

        // DELETE OLD PICTURE
        $IMG = mysqli_query($koneksi, "SELECT img FROM tbl_products WHERE id_product = '$id_product'");
        $row = mysqli_fetch_array($IMG);
        $file_to_delete = '../../assets/img/products/' . $row['img'];
        unlink($file_to_delete);

        if (mysqli_query($koneksi, $sql)) {
          $data['results'] = 'success';
        } else {
          $data['results'] = 'failed';
        }
        echo json_encode($data);
      }
    }
  }
}
