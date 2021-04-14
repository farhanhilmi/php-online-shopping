<?php
require_once('../config.php');
// include './config.php';

$webNameDB = mysqli_query($koneksi, "SELECT name from tbl_web_name");
$webName;
while ($result = mysqli_fetch_array($webNameDB)) {
  $webName = $result['name'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <link rel="stylesheet" href="css/style.css">

  <title><?php echo $webName; ?></title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white" id="navbar" data-spy="affix">
    <a class="navbar-brand" style="color: var(--bg-main)" href="#"><?php echo $webName; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="./index.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./products.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categories.php">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Customers</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user-circle fa-lg"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#" id="changeWebName">Change Web Title</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Sign Out</a>
          </div>
        </li>
      </ul>
    </div>
    <div id="top-shadow"></div>
  </nav>