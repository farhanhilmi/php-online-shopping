<?php
require_once('../config.php');
if (isset($_GET['act'])) {
  if ($_GET['act'] == 'delete') {
    $query = "DELETE FROM tbl_categories WHERE id_category = '$_POST[id]'";
    $IMG = mysqli_query($koneksi, "SELECT logo FROM tbl_categories WHERE id_category = '$_POST[id]'");
    mysqli_query($koneksi, $query);
    $row = mysqli_fetch_array($IMG);
    $file_to_delete = '../assets/img/category/' . $row['logo'];
    unlink($file_to_delete);
  } else if ($_GET['act'] == 'save') {
    $queryCode = "SELECT max(id_category) as maxCode FROM tbl_categories";
    $dataResult = mysqli_query($koneksi, $queryCode);
    $fetchData = mysqli_fetch_array($dataResult);
    $randomCode = $fetchData['maxCode'];

    $no = (int) substr($randomCode, 3, 3);
    $no++;

    $char = "CAT";
    $randomCode = $char . sprintf("%03s", $no);

    $id_category = $randomCode;
    $name = $_POST['name'];

    $rand = date("dmYHis");
    $extension =  array('jpg', 'png', 'jpeg');
    $filename = $_FILES['logo']['name'];
    $size = $_FILES['logo']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $extension)) {
      echo "
    <script>
      alert('Pastika format file sudah benar');
    </script>";
    } else {
      if ($size < 1044070000) {
        $img = $rand . '_' . $filename;
        move_uploaded_file($_FILES['logo']['tmp_name'], '../assets/img/category/' . $rand . '_' . $filename);
        $query = mysqli_query($koneksi, "INSERT INTO tbl_categories(id_category, name, logo) VALUES('$id_category', '$name', '$img')");

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
    $id_category = $_POST['id_category'];
    $name = $_POST['name'];

    $rand = date("dmYHis");
    $extension =  array('jpg', 'png', 'jpeg');
    $filename = $_FILES['logo']['name'];
    $size = $_FILES['logo']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if ($_FILES['logo']['name'] == "") {
      $sql = ("UPDATE tbl_categories SET name = '$name' WHERE id_category = '$id_category'");

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
        move_uploaded_file($_FILES['logo']['tmp_name'], '../assets/img/category/' . $rand . '_' . $filename);
        $sql = ("UPDATE tbl_categories SET name = '$name', logo = '$img' WHERE id_category = '$id_category'");

        // DELETE OLD PICTURE
        $IMG = mysqli_query($koneksi, "SELECT logo FROM tbl_categories WHERE id_category = '$id_category'");
        $row = mysqli_fetch_array($IMG);
        $file_to_delete = '../assets/img/category/' . $row['logo'];
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
