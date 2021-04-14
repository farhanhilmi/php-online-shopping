<?php
require_once('./config.php');
function get_data($koneksi)
{
  $parameter = $_GET['product'];
  $product_id = substr($parameter, 0, strpos($parameter, "-"));
  $query = mysqli_query($koneksi, "SELECT * FROM tbl_products WHERE id_product = '$product_id'");
  $product = mysqli_fetch_array($query);

  if ($product['total_rating'] == '0') {
    $rating = 0;
  } else {
    $rating = round(((float)$product['rating'] / (int)$product['total_rating']), 1);
  }

  return array($product, $rating);
}

if (isset($_GET['act'])) {
  if ($_GET['act'] == 'rate') {
    $current_rating = $_POST['rating'];

    $query_rating = mysqli_query($koneksi, "SELECT * FROM tbl_products WHERE id_product = '$_POST[id]'");
    $product = mysqli_fetch_array($query_rating);
    $total_rating = (int)$product['total_rating'] + 1;

    $current_rating = (int)$_POST['rating'] + $product['rating'];

    $query = "UPDATE tbl_products SET rating = '$current_rating', total_rating = '$total_rating' WHERE id_product = '$_POST[id]'";
    mysqli_query($koneksi, $query);
    echo round($current_rating / $total_rating, 1);
  } else if ($_GET['act'] == 'add_to_cart') {
  }
}
