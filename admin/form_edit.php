<?php
require_once('../config.php');
$data = mysqli_query($koneksi, "SELECT * FROM tbl_categories WHERE id_category = '$_POST[id]'");
$row = mysqli_fetch_array($data);
?>

<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLongTitle">Update Data</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <form role="form" method="POST" id="formEdit" enctype="multipart/form-data">
    <div class="form-group ">
      <label for="exampleInputEmail1">Category Name</label>
      <input type="text" name="name" id="nameUpdate" class="form-control" value="<?php echo $row['name'] ?>">
    </div>
    <div class="row">
      <div class="form-group col-md-9">
        <input type="hidden" value="<?php echo $row['id_category'] ?>" name="id_category" id="id_categoryUpdate">
        <label for="exampleInputPassword1">Image</label>
        <div class="custom-file">
          <input type="file" name="logo" class="custom-file-input" value="<?php echo $row['logo'] ?>" id="customFileUpdate">
          <label class="custom-file-label" for="customFile" style="overflow: hidden;">Choose file</label>
        </div>
      </div>
      <div class="form-group col-md-3 mr-0">
        <label for="exampleInputPassword1">Picture</label><br>
        <img src="../assets/img/category/<?php echo $row['logo'] ?>" id="imgSrc" style="height: 50px;">
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" name="save" class="btn btn-outline-info btn-sm">Save changes</button>
    </div>
  </form>
</div>