<?php
require_once('../config.php');
?>

<table id="table_categories" class="table table-borderless bg-white text-center">
  <thead>
    <tr>
      <th>CATEGORY</th>
      <th>IMAGE</th>
      <th>ACTION</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_categories ORDER BY id_category Desc");
    while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <td><?php echo $result['name'] ?></td>
        <td><img src="../assets/img/category/<?php echo $result['logo'] ?>" alt="" srcset=""></td>
        <td>
          <a id="EditButton" data-id="<?php echo $result['id_category'] ?>"><i class="fas fa-pencil-alt mr-3 text-warning"></i></a>
          <a id="DeleteButton" data-id="<?php echo $result['id_category'] ?>"> <i class="fas fa-trash-alt text-danger"></i></a>
        </td>
      </tr>

    <?php } ?>
  </tbody>
</table>

<script src="./js/datatables.js"></script>