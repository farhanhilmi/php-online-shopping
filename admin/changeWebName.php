<?php

require_once('../config.php');

$query = mysqli_query($koneksi, "UPDATE tbl_web_name SET name = '$_POST[name]'");
if ($query) {
  $data['results'] = 'success';
} else {
  $data['results'] = 'failed';
}

if (mysqli_connect_errno()) {
  echo json_encode(mysqli_connect_error());
} else {
  echo json_encode($data);
}
