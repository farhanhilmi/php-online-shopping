<?php
require_once('../../config.php');
?>

<table id="table_banners" class="table table-borderless bg-white text-center">
  <thead>
    <tr>
      <th>Banner Image</th>
      <th>Description</th>
      <th>ACTION</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_top_banner ORDER BY id Desc");
    while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <td>
          <a href="../assets/img/banners/<?php echo $result['img'] ?>">
            <img src="../assets/img/banners/<?php echo $result['img'] ?>" style="height: 3rem; width:6rem;">
          </a>
        </td>
        <td class="align-middle"><?php echo $result['description'] ?></td>
        <td class="align-middle">
          <a id="EditButton" data-id="<?php echo $result['id'] ?>"><i class="fas fa-pencil-alt mr-3 text-warning"></i></a>
          <a id="DeleteButton" data-id="<?php echo $result['id'] ?>"> <i class="fas fa-trash-alt text-danger"></i></a>
        </td>
      </tr>

    <?php } ?>
  </tbody>
</table>

<script src="./js/datatables.js"></script>