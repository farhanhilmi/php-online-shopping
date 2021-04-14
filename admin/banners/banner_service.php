<?php
require_once('../../config.php');
if (isset($_GET['act'])) {
  if ($_GET['act'] == 'delete') {
    $query = "DELETE FROM tbl_top_banner WHERE id = '$_POST[id]'";
    $IMG = mysqli_query($koneksi, "SELECT img FROM tbl_top_banner WHERE id = '$_POST[id]'");
    mysqli_query($koneksi, $query);
    $row = mysqli_fetch_array($IMG);
    $file_to_delete = '../../assets/img/banners/' . $row['img'];
    unlink($file_to_delete);
  } else if ($_GET['act'] == 'save') {
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
        move_uploaded_file($_FILES['img']['tmp_name'], '../../assets/img/banners/' . $img);
        $query = mysqli_query($koneksi, "INSERT INTO tbl_top_banner(description, img) VALUES( '$description', '$img')");

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
    $id = $_POST['id'];
    $description = $_POST['description'];

    $rand = date("dmYHis");
    $extension =  array('jpg', 'png', 'jpeg');
    $filename = $_FILES['img']['name'];
    $size = $_FILES['img']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if ($_FILES['img']['name'] == "") {
      $sql = ("UPDATE tbl_top_banner SET description = '$description' WHERE id = '$id'");

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
        move_uploaded_file($_FILES['img']['tmp_name'], '../../assets/img/banners/' . $img);
        $sql = ("UPDATE tbl_top_banner SET description = '$description', img = '$img' WHERE id = '$id'");

        // DELETE OLD PICTURE
        $IMG = mysqli_query($koneksi, "SELECT img FROM tbl_top_banner WHERE id = '$id'");
        $row = mysqli_fetch_array($IMG);
        $file_to_delete = '../../assets/img/banners/' . $row['img'];
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
