<?php
require_once('../../config.php');
?>

<div class="mb-3 btn_add ">
  <button class="float-right ml-3" id="addBtn"><i class="fas fa-plus fa-md text-white"></i></button>
</div>
<table id="table_products" class="table table-borderless bg-white text-center">
  <thead>
    <tr>
      <th>ID</th>
      <th>Image</th>
      <th>Name</th>
      <th>QTY</th>
      <th>Category</th>
      <th>Price</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query = mysqli_query($koneksi, "SELECT tbl_products.*, tbl_categories.name as category  FROM tbl_products LEFT JOIN tbl_categories ON tbl_products.id_category = tbl_categories.id_category ORDER BY created_at Desc");
    while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <td class="align-middle"><?php echo $result['id_product'] ?></td>
        <td>
          <a href="../assets/img/products/<?php echo $result['img'] ?>">
            <img src="../assets/img/products/<?php echo $result['img'] ?>" style="height: 3rem; width:3rem;">
          </a>
        </td>
        <td class="align-middle"><?php echo $result['name'] ?></td>
        <td class="align-middle"><?php echo $result['qty'] ?></td>
        <td class="align-middle"><?php echo $result['category'] ?></td>
        <td class="align-middle"><?php echo $result['price'] ?></td>
        <td class="align-middle">
          <a id="EditButton" data-id="<?php echo $result['id_product'] ?>"><i class="fas fa-pencil-alt mr-3 text-warning"></i></a>
          <a id="DeleteButton" data-id="<?php echo $result['id_product'] ?>"> <i class="fas fa-trash-alt text-danger"></i></a>
        </td>
      </tr>

    <?php } ?>
  </tbody>
</table>

<script src="./js/datatables.js"></script>